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

define('FEATURED_STORIES_RSS_URL', 'http://today.ucf.edu/tag/main-site-stories/feed/');
define('FEATURED_STORIES_MORE_URL', 'http://today.ucf.edu/');

define('ANNOUNCEMENTS_RSS_URL', 'http://www.ucf.edu/feeds/announcement/');

define('WEATHER_URL', 'http://www.weather.com/weather/today/Orlando+FL+32816:4:US');
define('WEATHER_EXTENDED_URL', 'http://www.weather.com/weather/tenday/32816');
define('WEATHER_CACHE_DURATION', 60 * 30); // weather

define('EVENTS_WEEKEND_EDITION', 0);
define('EVENTS_WEEKDAY_EDITION', 1);

define('WORD_OF_THE_DAY_URL', 'http://www.merriam-webster.com/word/index.xml');

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
	'Webmaster Tools' => array(
		new TextField(array(
			'name'        => 'Google WebMaster Verification',
			'id'          => THEME_OPTIONS_NAME.'[gw_verify]',
			'description' => 'Example: <em>9Wsa3fspoaoRE8zx8COo48-GCMdi5Kd-1qFpQTTXSIw</em>',
			'default'     => null,
			'value'       => $theme_options['gw_verify'],
		)),
		new TextField(array(
			'name'        => 'Yahoo! Site Explorer',
			'id'          => THEME_OPTIONS_NAME.'[yw_verify]',
			'description' => 'Example: <em>3236dee82aabe064</em>',
			'default'     => null,
			'value'       => $theme_options['yw_verify'],
		)),
		new TextField(array(
			'name'        => 'Bing Webmaster Center',
			'id'          => THEME_OPTIONS_NAME.'[bw_verify]',
			'description' => 'Example: <em>12C1203B5086AECE94EB3A3D9830B2E</em>',
			'default'     => null,
			'value'       => $theme_options['bw_verify'],
		)),
	),
	'Analytics' => array(
		new TextField(array(
			'name'        => 'Google Analytics Account',
			'id'          => THEME_OPTIONS_NAME.'[ga_account]',
			'description' => 'Example: <em>UA-9876543-21</em>. Leave blank for development.',
			'default'     => null,
			'value'       => $theme_options['ga_account'],
		)),
		new TextField(array(
			'name'        => 'Chartbeat UID',
			'id'          => THEME_OPTIONS_NAME.'[cb_uid]',
			'description' => 'Example: <em>1842</em>',
			'default'     => null,
			'value'       => $theme_options['cb_uid'],
		)),
		new TextField(array(
			'name'        => 'Chartbeat Domain',
			'id'          => THEME_OPTIONS_NAME.'[cb_domain]',
			'description' => 'Example: <em>some.domain.com</em>',
			'default'     => null,
			'value'       => $theme_options['cb_domain'],
		)),
	),
	'Facebook' => array(
		new RadioField(array(
			'name'        => 'Enable OpenGraph',
			'id'          => THEME_OPTIONS_NAME.'[enable_og]',
			'description' => 'Turn on the opengraph meta information used by Facebook.',
			'default'     => 1,
			'choices'     => array(
				'On'  => 1,
				'Off' => 0,
			),
			'value'       => $theme_options['enable_og'],
	    )),
		new TextField(array(
			'name'        => 'Facebook Admins',
			'id'          => THEME_OPTIONS_NAME.'[fb_admins]',
			'description' => 'Comma seperated facebook usernames or user ids of those responsible for administrating any facebook pages created from pages on this site. Example: <em>592952074, abe.lincoln</em>',
			'default'     => null,
			'value'       => $theme_options['fb_admins'],
		)),
	),
	'Search' => array(
		new RadioField(array(
			'name'        => 'Enable Google Search',
			'id'          => THEME_OPTIONS_NAME.'[enable_google]',
			'description' => 'Enable to use the google search appliance to power the search functionality.',
			'default'     => 1,
			'choices'     => array(
				'On'  => 1,
				'Off' => 0,
			),
			'value'       => $theme_options['enable_google'],
	    )),
		new TextField(array(
			'name'        => 'Search Domain',
			'id'          => THEME_OPTIONS_NAME.'[search_domain]',
			'description' => 'Domain to use for the built-in google search.  Useful for development or if the site needs to search a domain other than the one it occupies. Example: <em>some.domain.com</em>',
			'default'     => null,
			'value'       => $theme_options['search_domain'],
		)),
		new TextField(array(
			'name'        => 'Search Results Per Page',
			'id'          => THEME_OPTIONS_NAME.'[search_per_page]',
			'description' => 'Number of search results to show per page of results',
			'default'     => 10,
			'value'       => $theme_options['search_per_page'],
		)),
	)
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
	'http://universityheader.ucf.edu/bar/js/university-header.js',
	array('name' => 'jquery', 'src' => 'http://code.jquery.com/jquery-1.6.1.min.js',),
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
 * Fetches weather.com image ID and temp for today and tonight
 *
 * @return array
 * @author Chris Conover
 **/
function get_weather() {
	
	$cache_key = 'weather';

	// Default weather
	$weather = array(
		'today' => array(
				'image' =>30,
				'temp'  =>75
		),
		'tonight'=> array(
			'image' =>30,
			'temp'  =>65
		)
	);
	
	if(CLEAR_CACHE || ($weather = get_transient($cache_key)) === False) {
		$context = stream_context_create(array('http' => array('method'  => 'GET', 'timeout' => HTTP_TIMEOUT)));
		if( ($html = @file_get_contents(WEATHER_URL, false, $context)) !== False) {
			preg_match_all('/http:\/\/s\.imwx\.com\/v\.20120328\.084208\/img\/wxicon\/120\/(\d+)\.png/', $html, $image_matches);
			preg_match_all('/<p class="wx-temp">\s(\d{2,3})/', $html, $temp_matches);
			
			$weather['today']['image']   = $image_matches[1][0];
			$weather['today']['temp']    = $temp_matches[1][0];
			$weather['tonight']['image'] = $image_matches[1][1];
			$weather['tonight']['temp']  = $temp_matches[1][1];
		}

		set_transient($cache_key, $weather, WEATHER_CACHE_DURATION);
	}
	return $weather;
}


/**
 * Fetches weather.com image ID and temp for today and tonight
 *
 * @return array
 * @author Chris Conover
 **/
function get_extended_weather() {

	$cache_key = 'extended-weather';

	$weather = array(
		array('image'=>30, 'high'=>75, 'low'=>65),
		array('image'=>30, 'high'=>75, 'low'=>65),
		array('image'=>30, 'high'=>75, 'low'=>65),
		array('image'=>30, 'high'=>75, 'low'=>65),
		array('image'=>30, 'high'=>75, 'low'=>65),
		array('image'=>30, 'high'=>75, 'low'=>65),
		array('image'=>30, 'high'=>75, 'low'=>65),
		array('image'=>30, 'high'=>75, 'low'=>65),
		array('image'=>30, 'high'=>75, 'low'=>65),
		array('image'=>30, 'high'=>75, 'low'=>65),
	);

	if(CLEAR_CACHE || ($weather = get_transient($cache_key)) === False) {
		$weather = array();
		$context = stream_context_create(array('http' => array('method'  => 'GET', 'timeout' => HTTP_TIMEOUT)));
		if( ($html = @file_get_contents(WEATHER_EXTENDED_URL, false, $context)) !== False) {

			$start_point = '<div class="wx-24hour wx-module wx-grid3of6 wx-weather">';
			$start_point_index = stripos($html, $start_point);

			$length = stripos($html, '<div class="wx-module wx-mod1 wx-grid1of6 wx-media-top wx-top-stories wx-cool-tools">', $start_point_index) - ($start_point_index + strlen($start_point));

			$forecast_table = substr($html, $start_point_index + strlen($start_point), $length);

			# Images
			preg_match_all('/http:\/\/s.imwx.com\/v.20120328.084252\/img\/wxicon\/70\/(\d+).png/', $forecast_table, $image_matches);
			
			# High
			preg_match_all('/<p class="wx-temp">\s(\d{2,3})/', $forecast_table, $high_matches);
			
			# Lows
			preg_match_all('/<p class="wx-temp-alt">\s(\d{2,3})/', $forecast_table, $low_matches);

			for($i = 0; $i < 10; $i++) {
				$image = $image_matches[1][$i];
				$high  = $high_matches[1][$i];
				$low   = $low_matches[1][$i];
				array_push($weather, array('image'=>$image, 'high'=>$high, 'low'=>$low));
			}
			
			set_transient($cache_key, $weather, WEATHER_CACHE_DURATION);
		}
	}
	return $weather;
}

/**
 * Wraps get_extended_weather to slice out the
 * weekday weather
 *
 * @return array
 * @author Chris Conover
 **/
function get_weekday_weather() {
	return array_slice(get_extended_weather(), get_next_monday_diff(), 5);
}

/**
 * Wraps get_extended_weather to slice out the
 * weekend weather
 *
 * @return array
 * @author Chris Conover
 **/
function get_weekend_weather() {
	return array_slice(get_extended_weather(), get_next_friday_diff(), 4);
}

/**
 * Today's top story if ther is one
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

		$details['thumbnail_src']     = $image_details[0];
		$details['story_title']       = esc_html($top_story->post_title);
		$details['story_description'] = nl2br(esc_html($top_story->post_content));
		$details['read_more_uri']     = get_post_meta($top_story->ID, 'top_story_external_uri', True);

	} else {
		$rss = fetch_feed(FEATURED_STORIES_RSS_URL.'?thumb=600x308');
		if(!is_wp_error($rss)) {
			$rss_items = $rss->get_items(0, $rss->get_item_quantity(15));
			$rss_item = $rss_items[0];

			foreach($rss_items as $rss_item) {

				$enclosure = $rss_item->get_enclosure();

				if($enclosure && in_array($enclosure->get_type(),get_valid_enclosure_types())) {

					$details['thumbnail_src']     = $enclosure->get_thumbnail();
					$details['story_title']       = esc_html($rss_item->get_title());
					$details['story_description'] = truncate(nl2br(esc_html($rss_item->get_description())));
					$details['read_more_uri']     = $rss_item->get_permalink();

					if($details['thumbnail_src'] != '') {
						set_transient('top_story_id', $rss_item->get_id());
						break;
					}
				}
			}
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

	$rss = fetch_feed(FEATURED_STORIES_RSS_URL.'?thumb=95');

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
					$story['thumbnail_src'] = $thumbnail;
 				} else {
					$story['thumbnail_src'] = get_bloginfo('stylesheet_directory', 'raw').'/static/img/no-photo.png';
				}
				$story['title']       = esc_html($rss_item->get_title());
				$story['description'] = truncate(esc_html($rss_item->get_description()));
				$story['permalink']   = $rss_item->get_permalink();
				array_push($stories, $story);
				$count++;
			}
		}
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

	$rss = fetch_feed(ANNOUNCEMENTS_RSS_URL);
	if(!is_wp_error($rss)) {
		$rss_items = $rss->get_items(0, $rss->get_item_quantity(4));
		foreach($rss_items as $rss_item) {
			array_push(
				$announcements,
				array(
					'title'     => esc_html($rss_item->get_title()),
					# Permalinks come in encoded for some reason
					'permalink' => html_entity_decode($rss_item->get_permalink())
				)
			);
		}
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
	
	$wotd = array();
	$rss = fetch_feed(WORD_OF_THE_DAY_URL);
	if(!is_wp_error($rss)) {
		$rss_items = $rss->get_items(0, $rss->get_item_quantity(4));
		if(isset($rss_items[0])) {
			$all_parts = explode('</p>', $rss_items[0]->get_description());
			if(count($all_parts) >= 2) {
				$word_parts = explode('<br />', $all_parts[1], 2);
				if(count($word_parts) == 2) {
					$wotd['word']       = strip_tags($word_parts[0]);
					$wotd['definition'] = strip_tags($word_parts[1]);
				} else {
					$wotd['word'] = strip_tags($all_parts[1]);
				}
				$wotd['examples']     = isset($all_parts[2]) ? $all_parts[2] : '';
				$wotd['did_you_know'] = isset($all_parts[3]) ? $all_parts[3] : '';
			}

		}
	}
	return $wotd;
}

?>
