<?php
/**
 * Functions related to retrieval of curated news
 * articles or fallback content from UCF Today
 */
namespace GMUCF\Theme\Includes\UCFToday;
use GMUCF\Theme\Includes\Utilities as Utilities;


/**
 * Logic for determining featured stories content
 *
 * @return array
 * @author Chris Conover
 **/
function get_featured_stories_details( $limit = 2 ) {
	$stories = array();
	$main_site_stories_rss_url = get_option( 'main_site_stories_url' );
	$main_site_stories_timeout = get_option( 'main_site_stories_timeout' );

	$rss = Utilities\custom_fetch_feed( $main_site_stories_rss_url . '?thumb=gmucf_featured_story', $main_site_stories_timeout );

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
	$options_url = get_option( 'gmucf_email_options_url' );
	$options_timeout = get_option( 'gmucf_email_options_json_timeout' );
	$gmucf_email_options = array();

	$response = wp_remote_get( $options_url . '?' . time(), array( 'timeout' => $options_timeout ) );

	if ( is_array( $response ) ) {
		$items = json_decode( wp_remote_retrieve_body( $response ) );

		if ( $items ) {
			$gmucf_email_options = $items;
		}
	} else {
		$error_string = $response->get_error_message();
		error_log( "GMUCF - get_gmucf_email_options_feed_values() - " . $error_string );
	}

	return $gmucf_email_options;
}
