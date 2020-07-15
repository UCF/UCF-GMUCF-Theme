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
 * @return object|false
 */
function get_email_content() {
	$options = fetch_options_data();
	if ( ! $options || ! isset( $options->email_content ) ) return false;

	return $options->email_content;
}


/**
 * Displays either a one-column or two-column row
 * of email content.
 *
 * @since 3.1.0
 * @author Jo Dickson
 * @param object $row Row of email content data
 * @return void
 */
function display_row( $row ) {
	$row_type = 'one_column_row';
	if ( isset( $row->acf_fc_layout ) && $row->acf_fc_layout === 'two_column_row' ) {
		$row_type = 'two_column_row';
	}

	// Pass along $row data to the template part:
	set_query_var( 'gmucf_coronavirus_current_row', $row );

	get_template_part( "template-parts/coronavirus/rows/$row_type" );

	// Clean up afterwards:
	set_query_var( 'gmucf_coronavirus_current_row', false );
}


/**
 * Returns a component template part for the provided
 * row of email content.
 *
 * @since 3.1.0
 * @author Jo Dickson
 * @param object $row Row of email content data
 * @param string $row_type Type of row that this component is being displayed in
 * @return void
 */
function display_component( $row, $row_type='one_column_row' ) {
	$component = $row->acf_fc_layout ?? '';
	if ( ! $component ) return;

	// Make row-specific adjustments as necessary:
	if ( $row_type === 'two_column_row' && $component === 'article' ) {
		$component = 'article_sm';
	}

	// Pass along $row data to the template part:
	set_query_var( 'gmucf_coronavirus_current_row', $row );

	get_template_part( "template-parts/coronavirus/components/$component" );

	// Clean up afterwards:
	set_query_var( 'gmucf_coronavirus_current_row', false );
}


/**
 * Returns data for the current row being looped through.
 * For use in row and component template parts.
 *
 * @since 3.1.0
 * @author Jo Dickson
 * @return object
 */
function get_current_row() {
	return get_query_var( 'gmucf_coronavirus_current_row' );
}


/**
 * Format WYSIWYG-generated paragraph content for use in
 * Coronavirus email HTML.
 *
 * Utilizes functions defined in the UCF Email Editor plugin.
 *
 * TODO update this function to strip all HTML tags except
 * for those supported by the "Email Content" WYSIWYG toolbar
 * in the CV Utilities plugin
 *
 * @since 3.1.0
 * @author Jo Dickson
 * @param string $content Arbitrary HTML string
 * @return string Formatted content
 */
function format_paragraph_content( $content ) {
	$content = \convert_p_tags( $content );
	$content = \convert_list_tags( $content, 'ul' );
	$content = \convert_list_tags( $content, 'ol' );
	$content = \convert_li_tags( $content );
	$content = escape_chars( $content );

	return $content;
}


/**
 * Formats WYSIWYG-generated deck content for use
 * in Coronavirus email HTML.
 *
 * TODO update this function to strip literally all
 * HTML except for <strong>/<em>
 *
 * @since 3.1.0
 * @author Jo Dickson
 * @param string $content Arbitrary HTML string
 * @return string Formatted content
 */
function format_deck_content( $content ) {
	// Strip <p> tags entirely (no replacement, since decks may
	// be wrapped within a link)
	$content = preg_replace( '/<p[^>]*>/', '', $content );
	$content = preg_replace( '/<\/p>/', '', $content );

	$content = escape_chars( $content );

	return $content;
}


/**
 * Escapes string content suitable for use in email HTML.
 *
 * @since 3.1.0
 * @author Jo Dickson
 * @param string Arbitrary string/HTML content
 * @return string Sanitized content
 */
function escape_chars( $content ) {
	return htmlspecialchars_decode( htmlentities( $content ) );
}
