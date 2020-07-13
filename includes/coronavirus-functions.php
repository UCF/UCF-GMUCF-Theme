<?php
/**
 * Functions related to feed retrieval and display
 * of Coronavirus email content
 */
namespace GMUCF\Theme\Includes\Coronavirus;
use GMUCF\Theme\Includes\Utilities;


/**
 * Fetches Coronavirus email options from the
 * Coronavirus website.
 *
 * @since 3.1.0
 * @author Jo Dickson
 */
function fetch_options_data() {
	$feed_url = get_option( 'coronavirus_email_options_url' );
	if ( ! $feed_url ) {
		error_log( 'GMUCF - Could not retrieve options data for Coronavirus email - no feed URL set' );
	}

	$json = Utilities\fetch_json( $feed_url );
	if ( ! $json ) {
		error_log( 'GMUCF - Could not retrieve options data for Coronavirus email' );
	}

	return $json;
}
