<?php
/**
 * Handle all theme configuration here
 */
namespace GMUCF\Theme\Includes\Config;
use GMUCF\Theme\Includes\Utilities as Utils;


define( 'GMUCF_THEME_URL', get_template_directory_uri() );
define( 'GMUCF_THEME_STATIC_URL', GMUCF_THEME_URL . '/static' );
define( 'GMUCF_THEME_CSS_URL', GMUCF_THEME_STATIC_URL . '/css' );
define( 'GMUCF_THEME_JS_URL', GMUCF_THEME_STATIC_URL . '/js' );
define( 'GMUCF_THEME_IMG_URL', GMUCF_THEME_STATIC_URL . '/img' );
define( 'GMUCF_THEME_TEMPLATE_PARTS_PATH', 'template-parts' );
define( 'GMUCF_THEME_CUSTOMIZER_PREFIX', 'gmucf_' );
define( 'GMUCF_THEME_CUSTOMIZER_DEFAULTS', serialize( array(
	'news_utm_source'                  => 'gmucf',
	'news_utm_medium'                  => 'email',
	'news_utm_campaign'                => 'news_announcement_email', // TODO add method that returns complete UTM query param set with utm_content=date("Y-m-d")
	// 'events_utm_source'             => '',
	// 'events_utm_medium'             => '',
	// 'events_utm_campaign'           => '',
	'events_url'                       => 'https://events.ucf.edu',
	'events_calendar_id'               => 1,
	'events_limit'                     => 25,
	'events_cache_duration'            => 60 * 10, // seconds
	'events_timeout'                   => 5, // seconds
	'gmucf_email_options_url'          => 'https://www.ucf.edu/news/wp-json/ucf-news/v1/gmucf-email-options/',
	'gmucf_email_options_json_timeout' => 15, // seconds
	'main_site_stories_url'            => 'https://www.ucf.edu/news/feed/',
	'main_site_stories_more_url'       => 'https://www.ucf.edu/news/',
	'main_site_stories_timeout'        => 15, // seconds
	'announcements_url'                => 'https://www.ucf.edu/announcements/api/announcements/?time=thisweek&exclude_ongoing=True&format=json',
	'announcements_more_url'           => 'https://www.ucf.edu/announcements/',
	'in_the_news_url'                  => 'https://www.ucf.edu/news/wp-json/ucf-news/v1/external-stories/',
	'in_the_news_more_url'             => 'https://www.ucf.edu/news/in-the-news/',
	'in_the_news_item_count'           => 4,
	'in_the_news_json_timeout'         => 15, // seconds
	'weather_service_today_url'        => 'https://weather.smca.ucf.edu/?data=forecastToday',
	'weather_service_extended_url'     => 'https://weather.smca.ucf.edu/?data=forecastExtended',
	'weather_service_cache_duration'   => 60 * 15, // seconds
	'weather_service_timeout'          => 10, // seconds
) ) );

define( 'EVENTS_WEEKEND_EDITION', 0 );
define( 'EVENTS_WEEKDAY_EDITION', 1 );


/**
 * Initialization functions to be fired early when WordPress loads the theme.
 *
 * @since 3.0.0
 * @author Jo Dickson
 * @return void
 */
function init() {
	add_theme_support( 'post-thumbnails' );
	add_theme_support( 'html5', array( 'comment-list', 'comment-form', 'search-form', 'gallery', 'caption' ) );
	add_theme_support( 'title-tag' );

	// Enforce default option values when `get_option()` is
	// called.  Assumes that all default values defined in
	// GMUCF_THEME_CUSTOMIZER_DEFAULTS correspond to a
	// theme option (not a theme mod).
	// TODO not working???
	$options = unserialize( GMUCF_THEME_CUSTOMIZER_DEFAULTS );
	foreach ( $options as $option_name => $option_default ) {
		add_filter( 'default_option_{$option_name}', function( $get_option_default, $option, $passed_default ) {
			// If get_option() was passed a unique default value, prioritize it
			if ( $passed_default ) {
				return $get_option_default;
			}
			return $option_default;
		}, 10, 3 );
	}
}

add_action( 'after_setup_theme', __NAMESPACE__ . '\init' );


/**
 * Defines sections used in the WordPress Customizer.
 *
 * @author Jo Dickson
 * @since 3.0.0
 * @return void
 */
function define_customizer_sections( $wp_customize ) {
	$wp_customize->add_section(
		'weather',
		array(
			'title' => 'Weather Data'
		)
	);

	$wp_customize->add_section(
		'ucf_today_gmucf_options',
		array(
			'title' => 'UCF Today GMUCF Options'
		)
	);

	$wp_customize->add_section(
		'announcements',
		array(
			'title' => 'Announcements Data'
		)
	);

	$wp_customize->add_section(
		'in_the_news',
		array(
			'title' => 'UCF In The News Data'
		)
	);

	$wp_customize->add_section(
		'events',
		array(
			'title' => 'Events Data'
		)
	);

	$wp_customize->add_section(
		'analytics',
		array(
			'title' => 'Analytics'
		)
	);
}

add_action( 'customize_register', __NAMESPACE__ . '\define_customizer_sections', 11 );


/**
 * Defines the controls used in the WordPress Customizer
 *
 * @author Jo Dickson
 * @since 3.0.0
 * @return void
 */
function define_customizer_controls( $wp_customize ) {
	//
	// UCF Today GMUCF Options
	//
	$wp_customize->add_setting(
		'gmucf_email_options_url',
		array (
			'type'    => 'option',
			'default' => Utils\get_option_default( 'gmucf_email_options_url' )
		)
	);
	$wp_customize->add_control(
		'gmucf_email_options_url',
		array(
			'label'       => 'GMUCF Email Options Feed URL',
			'description' => 'URL to the UCF Today GMUCF Email Options feed.',
			'section'     => 'ucf_today_gmucf_options',
			'type'        => 'text'
		)
	);

	$wp_customize->add_setting(
		'gmucf_email_options_json_timeout',
		array (
			'type'    => 'option',
			'default' => Utils\get_option_default( 'gmucf_email_options_json_timeout' )
		)
	);
	$wp_customize->add_control(
		'gmucf_email_options_json_timeout',
		array(
			'label'       => 'GMUCF Email Options Feed Timeout',
			'description' => 'Number of seconds to wait before timing out a request to the UCF Today GMUCF Email Options feed.',
			'section'     => 'ucf_today_gmucf_options',
			'type'        => 'number'
		)
	);

	$wp_customize->add_setting(
		'main_site_stories_url',
		array (
			'type'    => 'option',
			'default' => Utils\get_option_default( 'main_site_stories_url' )
		)
	);
	$wp_customize->add_control(
		'main_site_stories_url',
		array(
			'label'       => 'Main Site Stories Feed URL',
			'description' => 'URL to the UCF Today Main Site Stories feed. This feed\'s content is used if the GMUCF Email Options feed\'s <code>send_date</code> value does not match today\'s date.',
			'section'     => 'ucf_today_gmucf_options',
			'type'        => 'text'
		)
	);

	$wp_customize->add_setting(
		'main_site_stories_more_url',
		array (
			'type'    => 'option',
			'default' => Utils\get_option_default( 'main_site_stories_more_url' )
		)
	);
	$wp_customize->add_control(
		'main_site_stories_more_url',
		array(
			'label'       => 'Main Site Stories "More" URL',
			'description' => 'URL that directs users to read more news stories.',
			'section'     => 'ucf_today_gmucf_options',
			'type'        => 'text'
		)
	);

	$wp_customize->add_setting(
		'main_site_stories_timeout',
		array (
			'type'    => 'option',
			'default' => Utils\get_option_default( 'main_site_stories_timeout' )
		)
	);
	$wp_customize->add_control(
		'main_site_stories_timeout',
		array(
			'label'       => 'Main Site Stories Timeout',
			'description' => 'Number of seconds to wait before timing out a request to the Main Site Stories feed.',
			'section'     => 'ucf_today_gmucf_options',
			'type'        => 'number'
		)
	);

	//
	// Announcements Options
	//
	$wp_customize->add_setting(
		'announcements_url',
		array (
			'type'    => 'option',
			'default' => Utils\get_option_default( 'announcements_url' )
		)
	);
	$wp_customize->add_control(
		'announcements_url',
		array(
			'label'       => 'Announcements Feed URL',
			'description' => 'URL to the UCF Announcements feed.',
			'section'     => 'announcements',
			'type'        => 'text'
		)
	);

	$wp_customize->add_setting(
		'announcements_more_url',
		array (
			'type'    => 'option',
			'default' => Utils\get_option_default( 'announcements_more_url' )
		)
	);
	$wp_customize->add_control(
		'announcements_more_url',
		array(
			'label'       => 'Announcements "More" URL',
			'description' => 'URL that directs users to browse more announcements.',
			'section'     => 'announcements',
			'type'        => 'text'
		)
	);

	//
	// UCF In The News Options
	//
	$wp_customize->add_setting(
		'in_the_news_url',
		array (
			'type'    => 'option',
			'default' => Utils\get_option_default( 'in_the_news_url' )
		)
	);
	$wp_customize->add_control(
		'in_the_news_url',
		array(
			'label'       => 'In The News JSON URL',
			'description' => 'URL of the external-stories feed on UCF Today.',
			'section'     => 'in_the_news',
			'type'        => 'text'
		)
	);

	$wp_customize->add_setting(
		'in_the_news_more_url',
		array (
			'type'    => 'option',
			'default' => Utils\get_option_default( 'in_the_news_more_url' )
		)
	);
	$wp_customize->add_control(
		'in_the_news_more_url',
		array(
			'label'       => 'In The News "More" URL',
			'description' => 'URL that directs users to browse more In The News articles.',
			'section'     => 'in_the_news',
			'type'        => 'text'
		)
	);

	$wp_customize->add_setting(
		'in_the_news_item_count',
		array (
			'type'    => 'option',
			'default' => Utils\get_option_default( 'in_the_news_item_count' )
		)
	);
	$wp_customize->add_control(
		'in_the_news_item_count',
		array(
			'label'       => 'In the News Story Count',
			'description' => 'The number of external stories to retrieve.',
			'section'     => 'in_the_news',
			'type'        => 'number'
		)
	);

	$wp_customize->add_setting(
		'in_the_news_json_timeout',
		array (
			'type'    => 'option',
			'default' => Utils\get_option_default( 'in_the_news_json_timeout' )
		)
	);
	$wp_customize->add_control(
		'in_the_news_json_timeout',
		array(
			'label'       => 'In The News Feed Timeout',
			'description' => 'Number of seconds to wait before timing out a request to the In The News feed.',
			'section'     => 'in_the_news',
			'type'        => 'number'
		)
	);

	//
	// Events Options
	//
	$wp_customize->add_setting(
		'events_url',
		array (
			'type' => 'option',
			'default' => Utils\get_option_default( 'events_url' )
		)
	);
	$wp_customize->add_control(
		'events_url',
		array(
			'label'       => 'Events Feed URL',
			'description' => 'URL to the UCF Events feed.',
			'section'     => 'events',
			'type'        => 'text'
		)
	);

	$wp_customize->add_setting(
		'events_calendar_id',
		array (
			'type' => 'option',
			'default' => Utils\get_option_default( 'events_calendar_id' )
		)
	);
	$wp_customize->add_control(
		'events_calendar_id',
		array(
			'label'       => 'Events Calendar ID',
			'description' => 'ID of the calendar in the events system to retrieve events from.',
			'section'     => 'events',
			'type'        => 'number'
		)
	);

	$wp_customize->add_setting(
		'events_limit',
		array (
			'type' => 'option',
			'default' => Utils\get_option_default( 'events_limit' )
		)
	);
	$wp_customize->add_control(
		'events_limit',
		array(
			'label'       => 'Events Limit',
			'description' => 'The number of events to include, per day, in the events email. The events system accepts a value from 1 to 100.',
			'section'     => 'events',
			'type'        => 'number'
		)
	);

	$wp_customize->add_setting(
		'events_cache_duration',
		array (
			'type' => 'option',
			'default' => Utils\get_option_default( 'events_cache_duration' )
		)
	);
	$wp_customize->add_control(
		'events_cache_duration',
		array(
			'label'       => 'Events Feed Cache Duration',
			'description' => 'How long, in seconds, retrieved event data should be cached.',
			'section'     => 'events',
			'type'        => 'number'
		)
	);

	$wp_customize->add_setting(
		'events_timeout',
		array (
			'type' => 'option',
			'default' => Utils\get_option_default( 'events_timeout' )
		)
	);
	$wp_customize->add_control(
		'events_timeout',
		array(
			'label'       => 'Events Feed Timeout',
			'description' => 'Number of seconds to wait before timing out a request to the Events system feed.',
			'section'     => 'events',
			'type'        => 'number'
		)
	);

	//
	// Weather
	//
	$wp_customize->add_setting(
		'weather_service_today_url',
		array (
			'type' => 'option',
			'default' => Utils\get_option_default( 'weather_service_today_url' )
		)
	);
	$wp_customize->add_control(
		'weather_service_today_url',
		array(
			'label'       => 'Weather Service URL - Today\'s Weather',
			'description' => 'URL to the weather service used to grab current-day weather data.',
			'section'     => 'weather',
			'type'        => 'text'
		)
	);

	$wp_customize->add_setting(
		'weather_service_extended_url',
		array (
			'type' => 'option',
			'default' => Utils\get_option_default( 'weather_service_extended_url' )
		)
	);
	$wp_customize->add_control(
		'weather_service_extended_url',
		array(
			'label'       => 'Weather Service URL - Extended Weather',
			'description' => 'URL to the weather service used to grab extended forecast weather data.',
			'section'     => 'weather',
			'type'        => 'text'
		)
	);

	$wp_customize->add_setting(
		'weather_service_cache_duration',
		array (
			'type' => 'option',
			'default' => Utils\get_option_default( 'weather_service_cache_duration' )
		)
	);
	$wp_customize->add_control(
		'weather_service_cache_duration',
		array(
			'label'       => 'Weather Data Cache Duration',
			'description' => 'How long, in seconds, retrieved weather data should be cached.',
			'section'     => 'weather',
			'type'        => 'number'
		)
	);

	$wp_customize->add_setting(
		'weather_service_timeout',
		array (
			'type' => 'option',
			'default' => Utils\get_option_default( 'weather_service_timeout' )
		)
	);
	$wp_customize->add_control(
		'weather_service_timeout',
		array(
			'label'       => 'Weather Service Timeout',
			'description' => 'Number of seconds to wait before timing out a weather service request.',
			'section'     => 'weather',
			'type'        => 'number'
		)
	);

	//
	// Analytics
	//
	$wp_customize->add_setting(
		'news_utm_source',
		array (
			'type' => 'option',
			'default' => Utils\get_option_default( 'news_utm_source' )
		)
	);
	$wp_customize->add_control(
		'news_utm_source',
		array(
			'label'       => 'News & Announcements - UTM Source',
			'description' => 'The UTM "source" value to set on News & Announcement email links.',
			'section'     => 'analytics',
			'type'        => 'text'
		)
	);

	$wp_customize->add_setting(
		'news_utm_medium',
		array (
			'type' => 'option',
			'default' => Utils\get_option_default( 'news_utm_medium' )
		)
	);
	$wp_customize->add_control(
		'news_utm_medium',
		array(
			'label'       => 'News & Announcements - UTM Medium',
			'description' => 'The UTM "medium" value to set on News & Announcement email links.',
			'section'     => 'analytics',
			'type'        => 'text'
		)
	);

	$wp_customize->add_setting(
		'news_utm_campaign',
		array (
			'type' => 'option',
			'default' => Utils\get_option_default( 'news_utm_campaign' )
		)
	);
	$wp_customize->add_control(
		'news_utm_campaign',
		array(
			'label'       => 'News & Announcements - UTM Campaign',
			'description' => 'The UTM "campaign" value to set on News & Announcement email links.',
			'section'     => 'analytics',
			'type'        => 'text'
		)
	);
}

add_action( 'customize_register', __NAMESPACE__ . '\define_customizer_controls', 10 );


/**
 * Remove old blogroll Links and Comments admin pages.
 *
 * @since 3.0.0
 * @author Jo Dickson
 * @return void
 **/
function kill_unused_admin_pages() {
	remove_menu_page( 'link-manager.php' );
	remove_menu_page( 'edit-comments.php' );
}

add_action( 'admin_menu', __NAMESPACE__ . '\kill_unused_admin_pages' );


/**
 * Convenience template redirects
 *
 * @author Chris Conover
 **/
function gmucf_template_redirect() {

	function display_gmucf_template( $template ) {
		global $wp_query;
		$wp_query->is_404 = false;
		header( "HTTP/1.1 200 OK" );
		get_template_part( $template );
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
			'news/mail/'           => function() { display_gmucf_template( 'template-parts/news/mail/base' ); },
			'news/text/'           => function() { display_gmucf_template( 'template-parts/news/text/base' ); },
			'news/'                => function() { display_gmucf_template( 'template-parts/news/browser/base' ); },
			'events/weekday/mail/' => function() { $_GET['edition'] = 'weekday'; display_gmucf_template( 'template-parts/events/mail/base' ); },
			'events/weekday/text/' => function() { $_GET['edition'] = 'weekday'; display_gmucf_template( 'template-parts/events/text/base' ); },
			'events/weekday/'      => function() { $_GET['edition'] = 'weekday'; display_gmucf_template( 'template-parts/events/browser/base' ); },
			'events/weekend/mail/' => function() { $_GET['edition'] = 'weekend'; display_gmucf_template( 'template-parts/events/mail/base' ); },
			'events/weekend/text/' => function() { $_GET['edition'] = 'weekend'; display_gmucf_template( 'template-parts/events/text/base' ); },
			'events/weekend/'      => function() { $_GET['edition'] = 'weekend'; display_gmucf_template( 'template-parts/events/browser/base' ); },
		);

		foreach($mapping as $path => $func) {
			if(stripos($request_path, $path) === 0) {
				call_user_func($func);
			}
		}
	}
}

add_action( 'template_redirect', __NAMESPACE__ . '\gmucf_template_redirect', 1 );
