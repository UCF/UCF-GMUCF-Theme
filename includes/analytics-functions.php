<?php
/**
 * Functions related to analytics/email tracking
 */
namespace GMUCF\Theme\Includes\Analytics;


/**
 * Returns the provided URL formatted with UTM
 * parameters for the News & Announcement emails.
 *
 * Respects existing query params in the URL, but replaces
 * existing UTM params if present.
 *
 * @since 3.0.0
 * @author Jo Dickson
 * @param string $url Arbitrary URL linking to external content
 * @return string formatted URL
 */
function format_url_news_announcements_utm_params( $url='' ) {
	$source   = get_option( 'news_utm_source' );
	$medium   = get_option( 'news_utm_medium' );
	$campaign = get_option( 'news_utm_campaign' );
	$content  = wp_date( 'Y-m-d' );

	$url_base = '';
	$existing_params = '';
	$existing_url_split = explode( '?', $url, 1 );
	if ( is_array( $existing_url_split ) ) {
		$url_base = $existing_url_split[0];
		if ( isset( $existing_url_split[1] ) ) {
			$existing_params = $existing_url_split[1];
		}
	}

	parse_str( parse_url( $url, PHP_URL_QUERY ), $params_array );
	if ( is_array( $params_array ) ) {
		$params_array['source'] = $source;
		$params_array['medium'] = $medium;
		$params_array['campaign'] = $campaign;
		$params_array['content'] = $content;
	}

	return $url_base . '?' . http_build_query( $params_array );

	return $url;
}
