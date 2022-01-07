<?php
/**
 * Functions related to feed retrieval and display
 * of Coronavirus email content
 */
namespace GMUCF\Theme\Includes\Impact;


/**
 * Fetches Coronavirus email options from the
 * Coronavirus website.
 *
 * @since 3.3.0
 * @author Jim Barnes
 * @return object|false
 */
function fetch_options_data() {
	$options = get_fields( 'impact_options' );

	return (object) $options;
}


/**
 * Returns all email content data from the
 * Coronavirus email options feed.
 *
 * @since 3.3.0
 * @author Jim Barnes
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
	else if ( $row_type === 'two_column_row' && $component === 'image' ) {
		$component = 'image_sm';
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
 * @since 3.1.0
 * @author Jo Dickson
 * @param string $content Arbitrary HTML string
 * @return string Formatted content
 */
function format_paragraph_content( $content ) {
	$current_date = current_datetime();

	$content = \convert_p_tags( $content );
	$content = \convert_list_tags( $content, 'ul' );
	$content = \convert_list_tags( $content, 'ol' );
	$content = \convert_li_tags( $content );
	$content = convert_heading_tags( $content, 'h2', '24px' );
	$content = convert_heading_tags( $content, 'h3', '18px' );
	$content = apply_link_utm_params( $content, $current_date->format( 'Y-m-d' ) ); // namespaced function--not Email Editor Plugin's function
	$content = escape_chars( $content );

	return $content;
}


/**
 * Formats WYSIWYG-generated deck content for use
 * in Coronavirus email HTML.
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
 * We need slightly different heading styles than what are
 * provided in the UCF Email Editor Plugin, so custom
 * heading markup is defined here.
 *
 * @since 3.1.0
 * @author Jo Dickson
 * @param string $font_size Font size to apply to the generated markup
 * @return string Email-safe heading markup
 */
function get_heading_open_markup( $font_size='24px' ) {
	ob_start();
?>
<table class="paragraphtable" style="width: 100%;">
	<tbody>
		<tr>
			<td style="font-family: 'UCF-Sans-Serif-Alt', Helvetica, Arial, sans-serif; text-align: left; padding-bottom: 10px; font-size: <?php echo $font_size; ?>; font-weight: bold; line-height: 1.2;" align="left">
<?php
	return ob_get_clean();
}


/**
 * Converts heading tags to email-safe markup.
 *
 * @since 3.1.0
 * @author Jo Dickson
 * @param string $content Unmodified markup
 * @param string $heading_elem The heading element to replace (e.g. "h2", "h3")
 * @param string $font_size The font size to apply to the heading
 * @return string Modified email markup
 */
function convert_heading_tags( $content, $heading_elem, $font_size ) {
	$content = preg_replace( '/<' . $heading_elem .  '[^>]*>/', get_heading_open_markup( $font_size ), $content );
	$content = preg_replace( '/<\/' . $heading_elem .  '>/', \get_table_close_markup(), $content );

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


/**
 * Wrapper for the UCF Email Editor Plugin's
 * `format_url_utm_params()` function, using params
 * for Coronavirus emails defined in the Customizer.
 *
 * @since 3.1.1
 * @author Jo Dickson
 * @param string $url Arbitrary URL
 * @param string $content utm_content param to insert into the URL
 * @return string Formatted URL
 */
function format_url_utm_params( $url, $content='' ) {
	$pattern = \UCF_Email_Editor_Config::get_option_or_default( 'utm_replace_regex' );

	if ( preg_match( $pattern, $url ) ) {
		$source   = get_option( 'coronavirus_utm_source' );
		$medium   = get_option( 'coronavirus_utm_medium' );
		$campaign = get_option( 'coronavirus_utm_campaign' );

		$url = \format_url_utm_params( $url, $source, $medium, $campaign, $content );
	}

	return $url;
}


/**
 * Wrapper for the UCF Email Editor Plugin's
 * `apply_link_utm_params()` function, using params
 * for Coronavirus emails defined in the Customizer.
 *
 * @since 3.1.1
 * @author Jo Dickson
 * @param string $str Arbitrary HTML string
 * @param string $content utm_content param to insert into URLs
 * @return string Modified HTML string
 */
function apply_link_utm_params( $str, $content='' ) {
	$source   = get_option( 'coronavirus_utm_source' );
	$medium   = get_option( 'coronavirus_utm_medium' );
	$campaign = get_option( 'coronavirus_utm_campaign' );

	return \apply_link_utm_params( $str, $source, $medium, $campaign, $content );
}
