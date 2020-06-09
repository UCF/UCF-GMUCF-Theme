<?php
/**
 * Functions related to announcement feed retrieval and display
 * in the News & Announcements emails
 */
namespace GMUCF\Theme\Includes\Announcements;
use GMUCF\Theme\Includes\Utilities;


/**
 * Fetch announcement info from RSS feed
 *
 * @return array
 * @author Chris Conover
 **/
function get_announcement_details( $announcement_ids=array() ) {
	$announcements = array();
	$announcements_json_url = get_option( 'announcements_url' );
	if ( ! $announcements_json_url ) return $announcements;

	/**
	 * First check to see if there are specific announcement_ids to pull.
	 * If there are, we need to get the data from each announcement.
	 */

	// Slice up the default URL to remove query params and trailing slash
	$base_url       = preg_replace( "/\/\?.*/", "", $announcements_json_url );
	$front_base_url = preg_replace( "/^(.*)(.*\/api).*$/", "$1", $announcements_json_url );

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
					'title' => Utilities\sanitize_for_email( $item->title ),
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
	$response      = wp_remote_get( $announcements_json_url );
	$response_code = wp_remote_retrieve_response_code( $response );

	if( is_array( $response ) && $response_code < 400 ) {
		$items = json_decode( wp_remote_retrieve_body( $response ) );
		foreach($items as $item) {
			array_push(
				$announcements,
				array(
					'title'     => Utilities\sanitize_for_email( $item->title ),
					'permalink' => "$front_base_url/$item->slug"
				)
			);
		}
	} else {
		$error_string = $response->get_error_message();
		error_log("GMUCF - get_announcement_details() - " . $error_string);
	}
	return array_slice( $announcements, 0, 3 );
}
