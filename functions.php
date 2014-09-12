<?php
date_default_timezone_set('America/New_York');

# Set theme constants
#define('DEBUG', True);                  # Always on
#define('DEBUG', False);                 # Always off
define('DEBUG', isset($_GET['debug'])); # Enable via get parameter
define('THEME_URL', get_bloginfo('stylesheet_directory'));
define('THEME_DIR', get_stylesheet_directory());
define('THEME_INCLUDES_DIR', THEME_DIR.'/includes');
define('THEME_STATIC_URL', THEME_URL.'/static');
define('THEME_IMG_URL', THEME_STATIC_URL.'/img');
define('THEME_JS_URL', THEME_STATIC_URL.'/js');
define('THEME_CSS_URL', THEME_STATIC_URL.'/css');
define('THEME_OPTIONS_GROUP', 'settings');
define('THEME_OPTIONS_NAME', 'theme');
define('THEME_OPTIONS_PAGE_TITLE', 'Theme Options');

$theme_options = get_option(THEME_OPTIONS_NAME);
define('GA_ACCOUNT', $theme_options['ga_account']);
define('CB_UID', $theme_options['cb_uid']);
define('CB_DOMAIN', $theme_options['cb_domain']);

define('EVENTS_URL', 'http://events.ucf.edu');
define('EVENTS_CALENDAR_ID', 1);
define('EVENTS_CACHE_DURATION', 60 * 10); // seconds

define('FEATURED_STORIES_RSS_URL', !empty($theme_options['featured_stories_url']) ? $theme_options['featured_stories_url'] : 'http://today.ucf.edu/tag/main-site-stories/feed/');
define('FEATURED_STORIES_MORE_URL', 'http://today.ucf.edu/');
define('FEATURED_STORIES_TIMEOUT', 15); // seconds

define('ANNOUNCEMENTS_RSS_URL', !empty($theme_options['announcements_url']) ? $theme_options['announcements_url'] : 'http://www.ucf.edu/announcements/?role=all&keyword=&time=thisweek&output=rss&include_ongoing=0');
define('ANNOUNCEMENTS_MORE_URL', 'http://www.ucf.edu/announcements/');

define('WEATHER_URL', !empty($theme_options['weather_service_url']) ? $theme_options['weather_service_url'].'?data=forecastToday' : 'http://weather.smca.ucf.edu/?data=forecastToday');
define('WEATHER_URL_EXTENDED', !empty($theme_options['weather_service_url']) ? $theme_options['weather_service_url'].'?data=forecastExtended' : 'http://weather.smca.ucf.edu/?data=forecastExtended');
define('WEATHER_CACHE_DURATION', 60 * 15); // seconds
define('WEATHER_HTTP_TIMEOUT', !empty($theme_options['weather_service_timeout']) ? (int)$theme_options['weather_service_timeout'] : 10);

define('EVENTS_WEEKEND_EDITION', 0);
define('EVENTS_WEEKDAY_EDITION', 1);

define('WORD_OF_THE_DAY_URL', 'http://api-pub.dictionary.com/v001?vid=%s&type=wotd');
define('WORD_OF_THE_DAY_CACHE_DURATION', 60 * 60);
define('WORD_OF_THE_DAY_HTTP_TIMEOUT', 25); // This service is so slow. PEDDLE FASTER, DICTIONARY.COM!

define('HTTP_TIMEOUT', 3); //seconds

# Custom Image Sizes
add_image_size('top_story', 600, 308, True);

require_once('functions-base.php');     # Base theme functions
require_once('custom-post-types.php');  # Where per theme post types are defined
require_once('shortcodes.php');         # Per theme shortcodes
require_once('functions-admin.php');    # Admin/login functions


/**
 * Set config values including meta tags, registered custom post types, styles,
 * scripts, and any other statically defined assets that belong in the Config
 * object.
 **/
Config::$custom_post_types = array(
	'Alert', 'TopStory'
);

Config::$body_classes = array('default',);

/**
 * Configure theme settings, see abstract class Field's descendants for
 * available fields. -- functions-base.php
 **/
Config::$theme_settings = array(
	'Word of the Day' => array(
		new TextField(array(
			'name'        => 'Dictionary.com API Key',
			'id'          => THEME_OPTIONS_NAME.'[dictionary_api_key]',
			'description' => '',
			'default'     => null,
			'value'       => $theme_options['dictionary_api_key'],
		)),
	),
	'Weather Service' => array(
		new TextField(array(
			'name'        => 'Weather Service URL',
			'id'          => THEME_OPTIONS_NAME.'[weather_service_url]',
			'description' => 'URL to the SMCA weather service used to grab weather data.  Useful for development when testing the weather service on different environments.  Defaults to weather.smca.ucf.edu (do not specify a custom feed--this is done for you.)',
			'default'     => 'http://weather.smca.ucf.edu/',
			'value'       => $theme_options['weather_service_url'],
		)),
		new TextField(array(
			'name'        => 'Weather Service Timeout',
			'id'          => THEME_OPTIONS_NAME.'[weather_service_timeout]',
			'description' => 'Number of seconds to wait before timing out a weather service request.  Default is 10 seconds.',
			'default'     => 10,
			'value'       => $theme_options['weather_service_timeout'],
		)),
	),
	'UCF Today Featured Stories Feed' => array(
		new TextField(array(
			'name'        => 'Featured Stories Feed URL',
			'id'          => THEME_OPTIONS_NAME.'[featured_stories_url]',
			'description' => 'URL to the UCF Today Main Site Stories feed.  Useful for development when testing on different environments.  Defaults to http://today.ucf.edu/tag/main-site-stories/feed/',
			'default'     => 'http://today.ucf.edu/tag/main-site-stories/feed/',
			'value'       => $theme_options['featured_stories_url'],
		)),
	),
	'UCF Announcements Feed' => array(
		new TextField(array(
			'name'        => 'Announcements Feed URL',
			'id'          => THEME_OPTIONS_NAME.'[announcements_url]',
			'description' => 'URL to the UCF Announcements feed.  Useful for development when testing on different environments.  Defaults to http://www.ucf.edu/announcements/?role=all&keyword=&time=thisweek&output=rss&include_ongoing=0',
			'default'     => 'http://www.ucf.edu/announcements/?role=all&keyword=&time=thisweek&output=rss&include_ongoing=0',
			'value'       => $theme_options['announcements_url'],
		)),
	),
);

Config::$links = array(
	array('rel' => 'shortcut icon', 'href' => THEME_IMG_URL.'/favicon.ico',),
	array('rel' => 'alternate', 'type' => 'application/rss+xml', 'href' => get_bloginfo('rss_url'),),
);

Config::$styles = array(
	array('admin' => True, 'src' => THEME_CSS_URL.'/admin.css',),
	'http://universityheader.ucf.edu/bar/css/bar.css',
	THEME_CSS_URL.'/jquery.css',
	THEME_CSS_URL.'/yahoo.css',
	THEME_CSS_URL.'/blueprint-screen.css',
	array('media' => 'print', 'src' => THEME_CSS_URL.'/blueprint-print.css',),
	THEME_CSS_URL.'/webcom-base.css',
	get_bloginfo('stylesheet_url'),
);

Config::$scripts = array(
	array('admin' => True, 'src' => THEME_JS_URL.'/admin.js',),
	'//universityheader.ucf.edu/bar/js/university-header.js',
	array('name' => 'jquery', 'src' => '//code.jquery.com/jquery-1.6.1.min.js',),
	THEME_JS_URL.'/jquery-extras.js',
	array('name' => 'base-script',  'src' => THEME_JS_URL.'/webcom-base.js',),
	array('name' => 'theme-script', 'src' => THEME_JS_URL.'/script.js',),
);

Config::$metas = array(
	array('charset' => 'utf-8',),
);
if ($theme_options['gw_verify']){
	Config::$metas[] = array(
		'name'    => 'google-site-verification',
		'content' => htmlentities($theme_options['gw_verify']),
	);
}
if ($theme_options['yw_verify']){
	Config::$metas[] = array(
		'name'    => 'y_key',
		'content' => htmlentities($theme_options['yw_verify']),
	);
}
if ($theme_options['bw_verify']){
	Config::$metas[] = array(
		'name'    => 'msvalidate.01',
		'content' => htmlentities($theme_options['bw_verify']),
	);
}


/* Custom Theme Functions */

if(isset($_GET['no_cache'])) {
	add_filter( 'wp_feed_cache_transient_lifetime', create_function('$a', 'return 0;') );
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
	require_once( ABSPATH . WPINC . '/class-feed.php' );

	$feed = new SimplePie();

	$feed->set_sanitize_class( 'WP_SimplePie_Sanitize_KSES' );
	// We must manually overwrite $feed->sanitize because SimplePie's
	// constructor sets it before we have a chance to set the sanitization class
	$feed->sanitize = new WP_SimplePie_Sanitize_KSES();

	$feed->set_cache_class( 'WP_Feed_Cache' );
	$feed->set_file_class( 'WP_SimplePie_File' );

	$feed->set_timeout($timeout);

	$feed->set_feed_url( $url );
	if(CLEAR_CACHE) {
		$feed->set_cache_duration(0);
	}
	else {
		$feed->set_cache_duration( apply_filters( 'wp_feed_cache_transient_lifetime', 12 * HOUR_IN_SECONDS, $url ) );
	}
	do_action_ref_array( 'wp_feed_options', array( &$feed, $url ) );
	$feed->init();
	$feed->handle_content_type();

	if ( $feed->error() )
		return new WP_Error( 'simplepie-error', $feed->error() );

	return $feed;
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
	$a_start = strtotime($a_parts[1]);
	$b_start = strtotime($b_parts[1]);
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
		'format'      => 'json');

	$options = array_merge($default_options, $options);

	$cache_key = $cache_key_prefix.implode('', $options);

	if(CLEAR_CACHE || ($events = get_transient($cache_key)) === False) {
		$events = array();
		$context = stream_context_create(array('http' => array('method'  => 'GET', 'timeout' => HTTP_TIMEOUT)));

		if( ($raw_events = @file_get_contents(EVENTS_URL.'?'.http_build_query($options), false, $context)) !== FALSE ) {
			if( !is_null($json_events = json_decode($raw_events)) ) {
				$events = $json_events;
			}
		}

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
 * Today's top story if there is one
 *
 * @return post object
 * @author Chris Conover
 **/
 function get_todays_top_story() {

 	$today  = getdate();
 	$params = array(
 		'year'       => $today['year'],
 		'monthnum'   => $today['mon'],
 		'day'        => $today['mday'],
 		'post_status'=> 'publish',
 		'post_type'  => 'top_story'
	);

	$query = new WP_Query(http_build_query($params));
	return (count($query->posts) > 0) ? $query->posts[0] : False;
 }

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
function get_top_story_details() {
	$details = array(
		'thumbnail_src'     => '',
		'story_title'       => '',
		'story_description' => '',
		'read_more_uri'     => '');

	if( ($top_story = get_todays_top_story()) !== False && has_post_thumbnail($top_story->ID)) {
		$thumbnail_id  = get_post_thumbnail_id($top_story->ID);
		$image_details = wp_get_attachment_image_src($thumbnail_id, 'top_story');

		$details['thumbnail_src']     = remove_quotes($image_details[0]);
		$details['story_title']       = sanitize_for_email($top_story->post_title);
		$details['story_description'] = sanitize_for_email($top_story->post_content);
		$details['read_more_uri']     = remove_quotes(get_post_meta($top_story->ID, 'top_story_external_uri', True));

	} else {
		$rss = custom_fetch_feed(FEATURED_STORIES_RSS_URL.'?thumb=gmucf_top_story', FEATURED_STORIES_TIMEOUT);
		if(!is_wp_error($rss)) {
			$rss_items = $rss->get_items(0, $rss->get_item_quantity(15));
			$rss_item = $rss_items[0];

			foreach($rss_items as $rss_item) {

				$enclosure = $rss_item->get_enclosure();

				if($enclosure && in_array($enclosure->get_type(),get_valid_enclosure_types())) {

					$details['thumbnail_src']     = remove_quotes($enclosure->get_thumbnail());
					$details['story_title']       = sanitize_for_email($rss_item->get_title());
					$details['story_description'] = truncate(sanitize_for_email($rss_item->get_description()));
					$details['read_more_uri']     = remove_quotes($rss_item->get_permalink());

					if($details['thumbnail_src'] != '') {
						set_transient('top_story_id', $rss_item->get_id());
						break;
					}
				}
			}
		} else {
			$error_string = $rss->get_error_message();
			error_log("GMUCF - get_top_story_details() - " . $error_string);
		}
	}
	return $details;
}

/**
 * Logic for determining top story content
 *
 * @return array
 * @author Chris Conover
 **/
function get_featured_stories_details() {
	$stories = array();

	$rss = custom_fetch_feed(FEATURED_STORIES_RSS_URL.'?thumb=gmucf_featured_story', FEATURED_STORIES_TIMEOUT);

	if(!is_wp_error($rss)) {
		$rss_items = $rss->get_items(0, $rss->get_item_quantity(15));

		$count = 0;
		$top_story_id = get_transient('top_story_id');
		foreach($rss_items as $rss_item) {
			if($count == 3) break;
			if($top_story_id !== $rss_item->get_id()) {
				$story = array(
					'thumbnail_src' => '',
					'title'         => '',
					'description'   => '',
					'permalink'     => ''
				);
				$enclosure = $rss_item->get_enclosure();
				if($enclosure && in_array($enclosure->get_type(),get_valid_enclosure_types()) && ($thumbnail = $enclosure->get_thumbnail())) {
					$story['thumbnail_src'] = remove_quotes($thumbnail);
 				} else {
					$story['thumbnail_src'] = remove_quotes(get_bloginfo('stylesheet_directory', 'raw').'/static/img/no-photo.png');
				}
				$story['title']       = sanitize_for_email($rss_item->get_title());
				$story['description'] = truncate(sanitize_for_email($rss_item->get_description()));
				$story['permalink']   = remove_quotes($rss_item->get_permalink());
				array_push($stories, $story);
				$count++;
			}
		}
	} else {
		$error_string = $rss->get_error_message();
		error_log("GMUCF - get_featured_stories_details() - " . $error_string);
	}
	return $stories;
}

/**
 * Fetch announcment info from RSS feed
 *
 * @return array
 * @author Chris Conover
 **/
function get_announcement_details() {
	$announcements = array();

	$rss = custom_fetch_feed(ANNOUNCEMENTS_RSS_URL);
	if(!is_wp_error($rss)) {
		$rss_items = $rss->get_items(0, $rss->get_item_quantity(4));
		foreach($rss_items as $rss_item) {
			array_push(
				$announcements,
				array(
					'title'     => sanitize_for_email($rss_item->get_title()),
					# Permalinks come in encoded for some reason
					'permalink' => remove_quotes(html_entity_decode($rss_item->get_permalink()))
				)
			);
		}
	} else {
		$error_string = $rss->get_error_message();
		error_log("GMUCF - get_announcement_details() - " . $error_string);
	}
	return $announcements;
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
 * Fetch word of the day
 *
 * @return array
 * @author Chris Conover
 **/
function get_word_of_the_day() {


	$cache_key = 'wotd';


	if( !is_null($api_key = get_theme_option('dictionary_api_key')) ) {
		$wotd_url = sprintf(WORD_OF_THE_DAY_URL, $api_key);
		$context  = stream_context_create(array('http' => array('method'  => 'GET', 'timeout' => WORD_OF_THE_DAY_HTTP_TIMEOUT)));

		if(CLEAR_CACHE || ($wotd = get_transient($cache_key)) === False) {
			$wotd = array(
				'word'          => NULL,
				'pronunciation' => NULL,
				'partofspeech'  => NULL,
				'definitions'   => array(),
				'examples'      => array()
			);

			if( ($raw_xml = @file_get_contents($wotd_url, false, $context)) !== False && ($xml = simplexml_load_string($raw_xml)) !== False ) {
				if(isset($xml->entry->word) && isset($xml->entry->partofspeech) && isset($xml->entry->pronunciation)) {
					$wotd['word']          = (string)$xml->entry->word;
					$wotd['partofspeech']  = (string)$xml->entry->partofspeech;
					$wotd['pronunciation'] = (string)$xml->entry->pronunciation;

					if(isset($xml->entry->definitions)) {
						foreach($xml->entry->definitions->definition as $definition) {
							if(isset($definition->partofspeech) && isset($definition->data)) {
								$wotd['definitions'][(string)$definition->partofspeech][] = (string)$definition->data;
							}
						}
					}
					if(isset($xml->entry->examples)) {
						foreach($xml->entry->examples->example as $example) {
							if(isset($example->quote) && isset($example->source) && isset($example->author)) {
								$quote  = (string)$example->quote;
								$source = (string)$example->source;
								$author = (string)$example->author;
								if($quote != '' && $source != '' && $author != '') {
									$wotd['examples'][] = array(
										'quote'  => $quote,
										'source' => $source,
										'author' => $author
									);
								}
							}
						}
					}
					set_transient($cache_key, $wotd, WORD_OF_THE_DAY_CACHE_DURATION);
					return $wotd;
				} else {
					return False;
				}
			} else {
				return False;
			}
		} else {
			return $wotd;
		}
	} else {
		return False;
	}
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
function get_theme_option($name) {
	global $theme_options;

	if(isset($theme_options[$name]) && $theme_options[$name] != '') {
		return $theme_options[$name];
	} else {
		return NULL;
	}
}

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
			'news/mail/'           => create_function('', 'display_gmucf_template(\'includes/news/mail/base\');'),
			'news/text/'           => create_function('', 'display_gmucf_template(\'includes/news/text/base\');'),
			'news/'                => create_function('', 'display_gmucf_template(\'includes/news/browser/base\');'),
			'events/weekday/mail/' => create_function('', '$_GET[\'edition\'] = \'weekday\';display_gmucf_template(\'includes/events/mail/base\');'),
			'events/weekday/text/' => create_function('', '$_GET[\'edition\'] = \'weekday\';display_gmucf_template(\'includes/events/text/base\');'),
			'events/weekday/'      => create_function('', '$_GET[\'edition\'] = \'weekday\';display_gmucf_template(\'includes/events/browser/base\');'),
			'events/weekend/mail/' => create_function('', '$_GET[\'edition\'] = \'weekend\';display_gmucf_template(\'includes/events/mail/base\');'),
			'events/weekend/text/' => create_function('', '$_GET[\'edition\'] = \'weekend\';display_gmucf_template(\'includes/events/text/base\');'),
			'events/weekend/'      => create_function('', '$_GET[\'edition\'] = \'weekend\';display_gmucf_template(\'includes/events/browser/base\');'),);

		foreach($mapping as $path => $func) {
			if(stripos($request_path, $path) === 0) {
				call_user_func($func);
			}
		}
	}
}
add_action('template_redirect', 'gmucf_template_redirect', 1);

?>
