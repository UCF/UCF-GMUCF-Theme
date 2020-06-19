<?php
/**
 * Functions related to analytics/email tracking
 */
namespace GMUCF\Theme\Includes\Analytics;


/**
 * Returns the provided URL formatted with UTM
 * parameters for the News & Announcement emails.
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

	if ( function_exists( 'format_url_utm_params' ) ) {
		$url = format_url_utm_params( $url, $source, $medium, $campaign, $content );
	}

	return $url;
}
