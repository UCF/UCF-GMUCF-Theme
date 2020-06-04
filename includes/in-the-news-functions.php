<?php
/**
 * Functions related to announcement feed retrieval and display
 * in the News & Announcements emails
 */
namespace GMUCF\Theme\Includes\InTheNews;


/**
 * TODO description
 */
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
