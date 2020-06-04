<?php
namespace GMUCF\Theme;

define( 'GMUCF_THEME_DIR', trailingslashit( get_stylesheet_directory() ) );


// Theme foundation
include_once GMUCF_THEME_DIR . 'includes/utilities.php';
include_once GMUCF_THEME_DIR . 'includes/config.php';
include_once GMUCF_THEME_DIR . 'includes/meta.php';

// Plugin extras/overrides

// ...


// --------------------------



if(isset($_GET['no_cache'])) {
	add_filter( 'wp_feed_cache_transient_lifetime', function( $a ) {
		return 0;
	});
	define('CLEAR_CACHE', TRUE);
} else {
	define('CLEAR_CACHE', FALSE);
}


/**
 * Custom fetch_feed, but with timeouts!  Literally identical to fetch_feed besides
 * the set_timeout() line (and CLEAR_CACHE handling).
 *
 * @return WP_Error|SimplePie WP_Error object on failure or SimplePie object on success
 */
function custom_fetch_feed( $url, $timeout=10 ) {
	require_once( ABSPATH . WPINC . '/feed.php' );

	if( CLEAR_CACHE ) {
		apply_filters( 'wp_feed_cache_transient_lifetime', 0, $url );
	} else {
		apply_filters( 'wp_feed_cache_transient_lifetime', 12 * HOUR_IN_SECONDS, $url );
	}

	$rss = fetch_feed( $url );

	if ( is_wp_error( $rss ) ) : // Checks that the object is created correctly
		return new WP_Error( 'simplepie-error', $rss->get_error_message() );
	endif;

	return $rss;
}



/**
 * Compare events based on start time
 *
 * @return integer
 * @author Chris Conover
 **/
function compare_event_starts($a, $b) {
	// Just take into account the time part of the start date time.
	// Otherwise events that are ongoing would be put in front.
	$a_parts = explode(' ', $a->starts);
	$b_parts = explode(' ', $b->starts);
	$a_start = strtotime($a_parts[4]);
	$b_start = strtotime($b_parts[4]);
	if($a_start == $b_start) {
		return 0;
	} else {
		return ($a_start > $b_start) ? +1 : -1;
	}
}

/**
 * Fetch events from UCF event system (with caching)
 *
 * @return array
 * @author Chris Conover
 **/
function get_event_data($options = array())
{
	$cache_key_prefix = 'events-';
	$default_options = array(
		'calendar_id' => EVENTS_CALENDAR_ID,
		'per_page'    => EVENTS_LIMIT,
		'format'      => 'json');

	$options = array_merge($default_options, $options);

	$cache_key = $cache_key_prefix.implode('', $options);

	if(CLEAR_CACHE || ($events = get_transient($cache_key)) === False) {
		$events = array();

		$url = EVENTS_URL.$options['y'].'/'.$options['m'].'/'.$options['d'].'/feed.json';

		$params = array(
			'per_page' => $options['per_page']
		);

		$url .= '?' . http_build_query( $params );

		$ch = curl_init($url);
		curl_setopt($ch, CURLOPT_AUTOREFERER, TRUE);
		curl_setopt($ch, CURLOPT_HEADER, 0);
		curl_setopt($ch, CURLOPT_TIMEOUT, HTTP_TIMEOUT);
		curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
		curl_setopt($ch, CURLOPT_FOLLOWLOCATION, TRUE);

		$raw_events = curl_exec($ch);

		if( $raw_events !== FALSE ) {
			if( !is_null($json_events = json_decode($raw_events)) ) {
				$events = $json_events;
			}
		} else {
			error_log('Curl error in GMUCF theme - get_event_data ('.$url.'): '.curl_error($ch), 0);
		}

		curl_close($ch);

		// Events aren't neccessarily sorted from earliest to latest start time
		usort($events, 'compare_event_starts');

		if(isset($options['limit']) && count($events) > $options['limit']) {
			$events = array_slice($events, 0, $options['limit']);
		}

		set_transient($cache_key, $events, EVENTS_CACHE_DURATION);
	}
	return $events;
}

/**
 * Wraps get_event_data and returns today's events
 *
 * @return array
 * @author Chris Conover
 **/
function get_todays_events($options = array()) {
	$date = getdate();
	$options = array_merge($options,array('y'=>$date['year'], 'm'=>$date['mon'], 'd'=>$date['mday']));
	return get_event_data($options);
}

/**
 * Wraps get_event_data and returns tomorrow's events
 *
 * @return array
 * @author Chris Conover
 **/
function get_tomorrows_events($options = array()) {
	$tomorrow = date_add((new DateTime()), new DateInterval('P0Y1DT0H0M'));
	$date = getdate($tomorrow->getTimestamp());
	$options = array_merge($options,array('y'=>$date['year'], 'm'=>$date['mon'], 'd'=>$date['mday']));
	return get_event_data($options);
}


/**
 * Returns the events HTML
 *
 * @return string
 * @author RJ Bruneel
 **/
function display_events($events) {
	$count = 0;
	ob_start();
		?>
		<ul>
		<?php
		foreach($events as $event) :
			if($count == 7) break;
			$start_timestamp = strtotime($event->starts);
		?>
			<li>
				<?php echo date('g:i', $start_timestamp) . date('A', $start_timestamp); ?>
				<a href="<?php echo $event->url?>">
					<?php echo esc_html($event->title); ?>
				</a>
			</li>
		<?php
			$count++;
		endforeach;
		?>
		</ul>
		<?php
	return ob_end_flush();
}


/**
 * Fetches today/tonight weather, extended weather and stores
 * it as transient data.
 *
 * @return array
 * @author Jo Dickson
 **/
function get_weather($cache_key) {
	$weather = array();
	$transient = get_transient($cache_key);

	// Always attempt to re-fetch weather if CLEAR_CACHE is set or if
	// previously stored transient data is bad
	if (!CLEAR_CACHE && !empty($transient)) { // empty() catches NULL or FALSE
		$weather = $transient;
	}
	else {
		// Get the url from which weather data is fetched
		switch ($cache_key) {
			case 'weather-extended':
				$json_url = WEATHER_URL_EXTENDED;
				break;
			case 'weather-today':
			default:
				$json_url = WEATHER_URL;
				break;
		}

		// Setup curl request and execute. Log errors if necessary.
		$ch = curl_init();
		$options = array(
			CURLOPT_URL => $json_url,
			CURLOPT_CONNECTTIMEOUT => WEATHER_HTTP_TIMEOUT,
			CURLOPT_RETURNTRANSFER => true
		);
		curl_setopt_array($ch, $options);

		$json = curl_exec($ch);
		if ($json !== false) {
			$json = json_decode($json, true); // Convert to array
			if (!$json['successfulFetch'] || $json['successfulFetch'] !== 'yes') {
				$weather = NULL;
			}
			else {
				if ($cache_key == 'weather-extended') {
					$weather = $json['days'];
				}
				else {
					$weather = $json;
				}
			}
		}
		else {
			$weather = NULL;
			error_log('Curl error in GMUCF theme when fetching weather: '.curl_error($ch), 0);
		}
		curl_close($ch);
		set_transient($cache_key, $weather, WEATHER_CACHE_DURATION);
	}

	return $weather;
}


/**
 * Translates the weather conditions from our feed
 * to a weather icon.
 * @author Jim Barnes
 * @since 1.2.0
 * @param $condition string | The weather condition
 * @return string | The css icon classes.
 **/
function get_weather_icon( $condition, $night=false ) {
	$icon_name = null;
	$icons_to_conditions = array(
		'day-sunny' => array(
			'fair',
			'default'
		),
		'hot' => array(
			'hot',
			'haze'
		),
		'cloudy' => array(
			'overcast',
			'partly cloudy',
			'mostly cloudy'
		),
		'snowflake-cold' => array(
			'blowing snow',
			'cold',
			'snow'
		),
		'showers' => array(
			'showers',
			'drizzle',
			'mixed rain/sleet',
			'mixed rain/hail',
			'mixed snow/sleet',
			'hail',
			'freezing drizzle'
		),
		'cloudy-gusts' => array(
			'windy'
		),
		'fog' => array(
			'dust',
			'smoke',
			'foggy'
		),
		'storm-showers' => array(
			'scattered thunderstorms',
			'scattered thundershowers',
			'scattered showers',
			'freezing rain',
			'isolated thunderstorms',
			'isolated thundershowers'
		),
		'lightning' => array(
			'tornado',
			'severe thunderstorms'
		)
	);

	$night_icons = array(
		'day-sunny' => 'night-clear',
		'hot' => 'night-clear',
		'cloudy' => 'night-cloudy',
		'snowflake-cold' => 'night-snow',
		'showers' => 'night-showers',
		'cloudy-gusts' => 'night-cloudy-gusts',
		'fog' => 'night-fog',
		'storm-showers' => 'night-storm-showers',
		'lightning' => 'night-lightning'
	);

	$condition = strtolower( $condition );

	foreach( $icons_to_conditions as $icon => $condition_array ) {
		if ( in_array( $condition, $condition_array ) ) {
			$icon_name = $icon;
		}
	}

	$icon_name = $icon_name ? $icon_name : 'day-sunny';

	if ( $night ) {
		return $night_icons[$icon_name];
	}

	return $icon_name;
}

/**
 * Today's top story if there is one
 *
 * @return post object
 * @author Chris Conover
 **/
//  function get_todays_top_story() {

// 	$today  = getdate();
// 	$params = array(
// 		'year'       => $today['year'],
// 		'monthnum'   => $today['mon'],
// 		'day'        => $today['mday'],
// 		'post_status'=> 'publish',
// 		'post_type'  => 'top_story'
// 	);

// 	$query = new WP_Query(http_build_query($params));
// 	return (count($query->posts) > 0) ? $query->posts[0] : False;
//  }

/**
 * Truncates a string based on word count
 *
 * @return string
 * @author Chris Conover
 **/
function truncate($string, $word_count=30) {
	$parts = explode(' ', $string, $word_count);
	return implode(' ', array_slice($parts, 0, count($parts) - 1)).'...';
}

/**
 * Logic for determining top story content
 *
 * @return array
 * @author Chris Conover
 **/
// function get_top_story_details() {
// 	$details = array(
// 		'thumbnail_src'     => '',
// 		'story_title'       => '',
// 		'story_description' => '',
// 		'read_more_uri'     => '');

// 	if( ($top_story = get_todays_top_story()) !== False && has_post_thumbnail($top_story->ID)) {
// 		$thumbnail_id  = get_post_thumbnail_id($top_story->ID);
// 		$image_details = wp_get_attachment_image_src($thumbnail_id, 'top_story');

// 		$details['thumbnail_src']     = remove_quotes($image_details[0]);
// 		$details['story_title']       = sanitize_for_email($top_story->post_title);
// 		$details['story_description'] = sanitize_for_email($top_story->post_content);
// 		$details['read_more_uri']     = remove_quotes(get_post_meta($top_story->ID, 'top_story_external_uri', True));

// 	} else {
// 		$rss = custom_fetch_feed( MAIN_SITE_STORIES_RSS_URL . '?thumb=gmucf_top_story', MAIN_SITE_STORIES_TIMEOUT );
// 		if(!is_wp_error($rss)) {
// 			$rss_items = $rss->get_items(0, $rss->get_item_quantity(15));
// 			$rss_item = $rss_items[0];

// 			foreach($rss_items as $rss_item) {

// 				$enclosure = $rss_item->get_enclosure();

// 				if($enclosure && in_array($enclosure->get_type(),get_valid_enclosure_types())) {

// 					$details['thumbnail_src']     = remove_quotes($enclosure->get_thumbnail());
// 					$details['story_title']       = sanitize_for_email($rss_item->get_title());
// 					$details['story_description'] = sanitize_for_email($rss_item->get_description());
// 					$details['read_more_uri']     = remove_quotes($rss_item->get_permalink());

// 					if($details['thumbnail_src'] != '') {
// 						set_transient('top_story_id', $rss_item->get_id());
// 						break;
// 					}
// 				}
// 			}
// 		} else {
// 			$error_string = $rss->get_error_message();
// 			error_log("GMUCF - get_top_story_details() - " . $error_string);
// 		}
// 	}
// 	return $details;
// }

/**
 * Logic for determining featured stories content
 *
 * @return array
 * @author Chris Conover
 **/
function get_featured_stories_details( $limit = 2 ) {
	$stories = array();

	$rss = custom_fetch_feed( MAIN_SITE_STORIES_RSS_URL.'?thumb=gmucf_featured_story', MAIN_SITE_STORIES_TIMEOUT );

	if( !is_wp_error( $rss ) ) {
		$rss_items = $rss->get_items( 0, $rss->get_item_quantity( 15 ) );

		$count = 0;
		$top_story_id = get_transient( 'top_story_id' );
		foreach( $rss_items as $rss_item ) {
			if( $count == $limit ) break;
			if( $top_story_id !== $rss_item->get_id() ) {
				$story = array(
					'thumbnail_src' => '',
					'title'         => '',
					'description'   => '',
					'permalink'     => ''
				);
				$enclosure = $rss_item->get_enclosure();
				if( $enclosure && in_array( $enclosure->get_type(),get_valid_enclosure_types() ) && ( $thumbnail = $enclosure->get_thumbnail() ) ) {
					$image = $enclosure->get_link();
					$story['image'] = remove_quotes( $image );
					$story['thumbnail_src'] = remove_quotes( $thumbnail );
				} else {
					$story['thumbnail_src'] = remove_quotes( get_bloginfo( 'stylesheet_directory', 'raw' ).'/static/img/no-photo.png' );
				}
				$story['title']       = sanitize_for_email( $rss_item->get_title() );
				$story['description'] = sanitize_for_email( $rss_item->get_description() );
				$story['permalink']   = remove_quotes( $rss_item->get_permalink() );
				array_push( $stories, $story );
				$count++;
			}
		}
	} else {
		$error_string = $rss->get_error_message();
		error_log( "GMUCF - get_featured_stories_details() - " . $error_string );
	}
	return $stories;
}

/**
 * Fetch gmucf options page values
 *
 * @return array $gmucf_email_options Contains the data from the GMUCF Email Options feed.
 **/
function get_gmucf_email_options_feed_values() {
	$gmucf_email_options = array();

	$response = wp_remote_get( GMUCF_EMAIL_OPTIONS_JSON_URL . '?' . time(), array( 'timeout' => GMUCF_EMAIL_OPTIONS_JSON_TIMEOUT ) );

	if ( is_array( $response ) ) {
		$items = json_decode( wp_remote_retrieve_body( $response ) );

		if ( $items ) {
			$gmucf_email_options = $items;
		}
	} else {
		$error_string = $response->error;
		error_log( "GMUCF - get_gmucf_email_options_feed_values() - " . $error_string );
	}

	return $gmucf_email_options;
}

/**
 * Fetch announcement info from RSS feed
 *
 * @return array
 * @author Chris Conover
 **/
function get_announcement_details( $announcement_ids=array() ) {
	$announcements = array();

	/**
	 * First check to see if there are specific announcement_ids to pull.
	 * If there are, we need to get the data from each announcement.
	 */

	// Slice up the default URL to remove query params and trailing slash
	$base_url       = preg_replace( "/\/\?.*/", "", ANNOUNCEMENTS_JSON_URL );
	$front_base_url = preg_replace( "/^(.*)(.*\/api).*$/", "$1", ANNOUNCEMENTS_JSON_URL );

	if ( ! empty( $announcement_ids ) ) {
		foreach( $announcement_ids as $announcement_id ) {
			$response      = wp_remote_get( "$base_url/$announcement_id/", array( 'timeout' => 5 ) );
			$response_code = wp_remote_retrieve_response_code( $response );

			// Continue loop if error code is returned
			if ( $response_code > 400 ) continue;

			$item = json_decode( wp_remote_retrieve_body( $response ) );

			array_push(
				$announcements,
				array(
					'title' => sanitize_for_email( $item->title ),
					'permalink' => "$front_base_url/$item->slug"
				)
			);
		}

		/**
		 * If we have at least one announcement in the array after looping
		 * through, then we're done and can return out.
		 */
		if ( count( $announcements ) > 0 ) {
			return $announcements;
		}
	}


	/**
	 * If specific announcements weren't provided,
	 * go ahead and retrieve announcements normally.
	 */
	$response      = wp_remote_get( ANNOUNCEMENTS_JSON_URL );
	$response_code = wp_remote_retrieve_response_code( $response );

	if( is_array( $response ) && $response_code < 400 ) {
		$items = json_decode( wp_remote_retrieve_body( $response ) );
		foreach($items as $item) {
			array_push(
				$announcements,
				array(
					'title'     => sanitize_for_email( $item->title ),
					'permalink' => "$front_base_url/$item->slug"
				)
			);
		}
	} else {
		$error_string = $response['error'];
		error_log("GMUCF - get_announcement_details() - " . $error_string);
	}
	return array_slice( $announcements, 0, 3 );
}

function get_in_the_news_stories() {
	$stories = array();

	$args = array(
		'limit' => IN_THE_NEWS_ITEM_COUNT
	);

	$arg_string = '?' . http_build_query( $args );

	$response = wp_remote_get( IN_THE_NEWS_JSON_URL . $arg_string, array( 'timeout' => IN_THE_NEWS_JSON_TIMEOUT ) );

	if ( is_array( $response ) ) {
		$items = json_decode( wp_remote_retrieve_body( $response ) );

		if ( $items ) {
			$stories = $items;
		}
	} else {
		$error_string = $response->error;
		error_log( "GMUCF - get_in_the_news_stories() - " . $error_string );
	}

	return $stories;
}

/**
 * Return a list of valid enclosure mime types
 *
 * @return array
 * @author Chris Conover
 **/
function get_valid_enclosure_types() {
	return array('image/jpeg','image/png','image/jpg');
}

/**
 * Which edition of the events should be displayed
 *
 * @return integer constant
 * @author Chris Conover
 **/
function get_events_edition() {
	$dw = date('w');
	if($dw == 1) {
		return EVENTS_WEEKDAY_EDITION;
	} else if($dw == 5) {
		return EVENTS_WEEKEND_EDITION;
	} else {
		return False;
	}
}

/**
 * Utilizes event_get_data to fetch the date range
 * and events for the next weekday edition of the event
 * version starting from the nearest monday going forward
 *
 * @return array
 * @author Chris Conover
 **/
function get_weekday_events($options = array()) {
	$days = array();

	// Today might not be Monday
	$day_diff = get_next_monday_diff();

	// Fetch the events for Monday through Friday
	$start_date = NULL;
	$end_date   = NULL;
	for($i = 0; $i < 5; $i++) {
		$date = date_add((new DateTime()), new DateInterval('P0Y'.($day_diff + $i).'DT0H0M'));

		if($i == 0) {
			$start_date = $date;
		} else if($i == 4) {
			$end_date = $date;
		}

		$date_parts  = getdate($date->getTimestamp());
		$options     = array_merge($options,array('y'=>$date_parts['year'], 'm'=>$date_parts['mon'], 'd'=>$date_parts['mday']));
		array_push($days, get_event_data($options));
	}

	// Organize the events by half our interval
	$organized_days = array();
	foreach($days as $day) {
		$organized_day = array('morning'=>array(),'afternoon'=>array(),'evening'=>array());
		foreach($day as $event) {
			$start_timestamp = strtotime($event->starts);
			$start_hour      = (int)date('G', $start_timestamp);

			$part = date('g:i A', $start_timestamp);

			if($start_hour < 12) {
				$section = 'morning';
			} else if($start_hour >= 12 && $start_hour < 18) {
				$section = 'afternoon';
			} else if($start_hour >= 18) {
				$section = 'evening';
			}

			if(isset($organized_day[$section][$part])) {
				array_push($organized_day[$section][$part], $event);
			} else {
				$organized_day[$section][$part] = array($event);
			}
		}
		array_push($organized_days, $organized_day);
	}
	return array('days'=>$organized_days, 'start_date'=>$start_date, 'end_date'=>$end_date);
}

/**
 * Utilizes event_get_data to fetch the date range
 * and events for the next weekend edition of the event
 * version starting from the nearest monday going forward
 *
 * @return array
 * @author Chris Conover
 **/
function get_weekend_events($options = array()) {
	$days = array();

	// Today might not be Friday
	$day_diff = get_next_friday_diff();

	// Fetch the events for Monday through Friday
	$start_date = NULL;
	$end_date   = NULL;
	for($i = 0; $i < 4; $i++) {
		$date = date_add((new DateTime()), new DateInterval('P0Y'.($day_diff + $i).'DT0H0M'));

		if($i == 0) {
			$start_date = $date;
		} else if($i == 3) {
			$end_date = $date;
		}

		$date_parts  = getdate($date->getTimestamp());
		$options     = array_merge($options,array('y'=>$date_parts['year'], 'm'=>$date_parts['mon'], 'd'=>$date_parts['mday']));
		array_push($days, get_event_data($options));
	}

	// Organize the events by half our interval
	$organized_days = array();
	foreach($days as $day) {
		$organized_day = array('morning'=>array(),'afternoon'=>array(),'evening'=>array());
		foreach($day as $event) {
			$start_timestamp = strtotime($event->starts);
			$start_hour      = (int)date('G', $start_timestamp);

			$part = date('g:i A', $start_timestamp);

			if($start_hour < 12) {
				$section = 'morning';
			} else if($start_hour >= 12 && $start_hour < 18) {
				$section = 'afternoon';
			} else if($start_hour >= 18) {
				$section = 'evening';
			}

			if(isset($organized_day[$section][$part])) {
				array_push($organized_day[$section][$part], $event);
			} else {
				$organized_day[$section][$part] = array($event);
			}
		}
		array_push($organized_days, $organized_day);
	}
	return array('days'=>$organized_days, 'start_date'=>$start_date, 'end_date'=>$end_date);
}

/**
 * Calculate the how mnay days ahead the next
 * Monday is from today
 *
 * @return integer
 * @author Chris Conover
 **/
 function get_next_monday_diff() {
	$current_day = date('w');
	$day_diff    = 0;

	switch($current_day) {
		case 0:
			$day_diff = 1;
			break;
		case 1:
			$day_diff = 0;
			break;
		case 2:
			$day_diff = 6;
			break;
		case 3:
			$day_diff = 5;
			break;
		case 4:
			$day_diff = 4;
			break;
		case 5:
			$day_diff = 3;
			break;
		case 6:
			$day_diff = 2;
			break;
	}
	return $day_diff;
}

/**
 * Calculate the how mnay days ahead the next
 * Friday is from today
 *
 * @return integer
 * @author Chris Conover
 **/
 function get_next_friday_diff() {
	$current_day = date('w');
	$day_diff    = 0;

	switch($current_day) {
		case 0:
			$day_diff = 5;
			break;
		case 1:
			$day_diff = 4;
			break;
		case 2:
			$day_diff = 3;
			break;
		case 3:
			$day_diff = 2;
			break;
		case 4:
			$day_diff = 1;
			break;
		case 5:
			$day_diff = 0;
			break;
		case 6:
			$day_diff = 6;
			break;
	}
	return $day_diff;
}

/**
 * Sanitize a string for output in an email template
 *
 * @return string
 * @author Chris Conover
 **/
function sanitize_for_email($s) {

	# Approximate ASCII viewable
	# Assume everything incoming is UTF-8.
	# If it's not, it should be converted before it gets here.
	$s = iconv('UTF-8', 'ASCII//TRANSLIT', $s);

	# Convert any new lines to break tags
	$s = nl2br($s);

	# Strip any remaining HTML
	$s = strip_tags($s, '<br>');

	return $s;
}

/**
 * Removes double quotes from a string. Used
 * form incoming URLs so thay can't break out of
 * their HREF or SRC attributes
 *
 * @return string
 * @author Chris Conover
 */
function remove_quotes($s) {
	return str_replace('"', '', $s);
}

/**
 * Return a theme option value if it exists and isn't blank or NULL.
 *
 * @return string or NULL
 * @author Chris Conover
 **/
// function get_theme_option($name) {
// 	global $theme_options;

// 	if(isset($theme_options[$name]) && $theme_options[$name] != '') {
// 		return $theme_options[$name];
// 	} else {
// 		return NULL;
// 	}
// }

/**
 * Convenience template redirects
 *
 * @author Chris Conover
 **/
function gmucf_template_redirect() {

	function display_gmucf_template($template) {
		global $wp_query;
		$wp_query->is_404 = False;
		header("HTTP/1.1 200 OK");
		get_template_part($template);
		exit;
	}

	# Get the path without server host or leading blog stuff (e.g. /wp3/gmucf)
	$parts = explode($_SERVER['SERVER_NAME'], home_url('/'));
	if(count($parts) == 2) {
		if($parts[1] != '/') {
			$request_path = str_replace($parts[1], '', $_SERVER['REQUEST_URI']);
		} else {
			$request_path = substr($_SERVER['REQUEST_URI'], 1);
		}

		# Most to least specific
		$mapping = array(
			'news/mail/'           => function() { display_gmucf_template( 'includes/news/mail/base' ); },
			'news/text/'           => function() { display_gmucf_template( 'includes/news/text/base' ); },
			'news/'                => function() { display_gmucf_template( 'includes/news/browser/base' ); },
			'events/weekday/mail/' => function() { $_GET['edition'] = 'weekday'; display_gmucf_template( 'includes/events/mail/base' ); },
			'events/weekday/text/' => function() { $_GET['edition'] = 'weekday'; display_gmucf_template( 'includes/events/text/base' ); },
			'events/weekday/'      => function() { $_GET['edition'] = 'weekday'; display_gmucf_template( 'includes/events/browser/base' ); },
			'events/weekend/mail/' => function() { $_GET['edition'] = 'weekend'; display_gmucf_template( 'includes/events/mail/base' ); },
			'events/weekend/text/' => function() { $_GET['edition'] = 'weekend'; display_gmucf_template( 'includes/events/text/base' ); },
			'events/weekend/'      => function() { $_GET['edition'] = 'weekend'; display_gmucf_template( 'includes/events/browser/base' ); },
		);

		foreach($mapping as $path => $func) {
			if(stripos($request_path, $path) === 0) {
				call_user_func($func);
			}
		}
	}
}
add_action('template_redirect', 'gmucf_template_redirect', 1);

function display_social_share( $permalink, $title ) {
	ob_start();
	$title = urlencode( $title );
	?>
	<tr>
		<td class="montserratlight" style="padding-top: 25px; padding-left: 0; padding-right: 0; text-align: right;" align="right">
			<span class="montserratlight" style="color: #757575; font-family: Helvetica, Arial, sans-serif; font-weight: 400; font-size: 16px; line-height: 21px; vertical-align: top; padding-right: 6px;">Share: </span>
			<a href="http://www.facebook.com/sharer.php?u=<?php echo $permalink; ?>" style="display: inline-block; height: 20px; width: 20px; padding-right: 6px;"><img src="<?php echo bloginfo( 'stylesheet_directory' ); ?>/static/img/social/facebook-share.png" alt="Share on Facebook" width="20" height="20"></a>
			<a href="https://twitter.com/intent/tweet?text=<?php echo $title; ?>&url=<?php echo $permalink; ?>" style="display: inline-block; height: 20px; width: 20px; padding-right: 6px;"><img src="<?php echo bloginfo( 'stylesheet_directory' ); ?>/static/img/social/twitter-share.png" alt="Share on Twitter" width="20" height="20"></a>
			<a href="http://www.linkedin.com/shareArticle?mini=true&url=<?php echo $permalink; ?>&title=<?php echo $title; ?>&source=ucf.edu" style="display: inline-block; height: 20px; width: 20px;"><img src="<?php echo bloginfo( 'stylesheet_directory' ); ?>/static/img/social/linkedin-share.png" alt="Share on LinkedIn" width="20" height="20"></a>
		</td>
	</tr>
	<?php
	return ob_get_clean();
}

?>
