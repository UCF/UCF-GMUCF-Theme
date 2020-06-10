<?php
/**
 * General utilities unique to this theme
 */
namespace GMUCF\Theme\Includes\Utilities;


/**
 * Returns a theme option's default value.
 *
 * @since 3.0.0
 * @author Jo Dickson
 * @param string $option_name The name of the option
 * @return mixed Option default value, or false if a default is not set
 **/
function get_option_default( $option_name ) {
	$defaults = unserialize( GMUCF_THEME_CUSTOMIZER_DEFAULTS );
	if ( $defaults && isset( $defaults[$option_name] ) ) {
		return $defaults[$option_name];
	}
	return false;
}


/**
 * Enables the constant CLEAR_CACHE used throughout
 * this theme to force feed transient expiration via
 * the GET param `no_cache`.
 */
if ( isset( $_GET['no_cache'] ) ) {
	add_filter( 'wp_feed_cache_transient_lifetime', function( $a ) {
		return 0;
	} );
	define( 'CLEAR_CACHE', true );
} else {
	define( 'CLEAR_CACHE', false );
}


/**
 * Custom fetch_feed, but with timeouts!  Literally identical to fetch_feed
 * besides the set_timeout() line (and CLEAR_CACHE handling).
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
		return new \WP_Error( 'simplepie-error', $rss->get_error_message() );
	endif;

	return $rss;
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
 * Calculate how many days ahead the next
 * Monday is from today
 *
 * @return integer
 * @author Chris Conover
 **/
 function get_next_monday_diff() {
	$current_day = wp_date( 'w' );
	$day_diff    = 0;

	switch ( $current_day ) {
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
 * Calculate how many days ahead the next
 * Friday is from today
 *
 * @return integer
 * @author Chris Conover
 **/
 function get_next_friday_diff() {
	$current_day = wp_date( 'w' );
	$day_diff    = 0;

	switch ( $current_day ) {
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
