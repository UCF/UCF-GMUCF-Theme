<?php
/**
 * Functions related to announcement feed retrieval and display
 * in the News & Announcements emails
 */
namespace GMUCF\Theme\Includes\InTheNews;


/**
 * Returns In The News story data
 */
function get_in_the_news_stories() {
	$stories    = array();
	$json_url   = get_option( 'in_the_news_url' );
	$item_count = get_option( 'in_the_news_item_count' );
	$timeout    = get_option( 'in_the_news_json_timeout' );

	$args = array(
		'limit' => $item_count
	);

	$arg_string = '?' . http_build_query( $args );

	$response = wp_remote_get( $json_url . $arg_string, array( 'timeout' => $timeout ) );

	if ( is_array( $response ) ) {
		$items = json_decode( wp_remote_retrieve_body( $response ) );

		if ( $items ) {
			$stories = $items;
		}
	} else {
		$error_string = $response->get_error_message();
		error_log( "GMUCF - get_in_the_news_stories() - " . $error_string );
	}

	return $stories;
}
