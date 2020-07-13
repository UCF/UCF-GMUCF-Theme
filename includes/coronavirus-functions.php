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
 * @return object|false
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


/**
 * Returns all email content data from the
 * Coronavirus email options feed.
 *
 * @since 3.1.0
 * @author Jo Dickson
 * @return object
 */
function get_email_content() {
	$options = fetch_options_data();
	if ( ! $options || ! isset( $options->email_content ) ) return false;

	return $options->email_content;
}


/**
 * Returns a template part for the provided
 * row of email content.
 *
 * @since 3.1.0
 * @author Jo Dickson
 * @param object $row Row of email content data
 * @return void
 */
function display_component( $row ) {
	$component = $row->acf_fc_layout ?? '';
	if ( ! $component ) return;

	// Pass along $row data to the template part:
	set_query_var( 'gmucf_coronavirus_current_row', $row );

	get_template_part( "template-parts/coronavirus/components/$component" );

	// Clean up afterwards:
	set_query_var( 'gmucf_coronavirus_current_row', false );
}


/**
 * Returns data for the current row being looped through.
 * For use in component template parts.
 *
 * @since 3.1.0
 * @author Jo Dickson
 * @return object
 */
function get_current_row() {
	return get_query_var( 'gmucf_coronavirus_current_row' );
}


/**
 * TODO
 * Format WYSIWYG-generated content for use in
 * Coronavirus email HTML
 *
 * @since 3.1.0
 * @author Jo Dickson
 * @param string $content Arbitrary HTML string
 * @return string Formatted content
 */
function format_wysiwyg_content( $content ) {
	return $content;
}
