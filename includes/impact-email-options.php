<?php
/**
 * Functions for adding and supporting the
 * Impact Email Editor Options Page.
 */
function impact_add_impact_options_page() {
	if ( function_exists( 'acf_add_options_page' ) ) {
		acf_add_options_page( array(
			'page_title' 	  => 'Impact Email',
			'post_id'         => 'impact_options',
			'menu_title'	  => 'Impact Email',
			'menu_slug' 	  => 'impact-email',
			'capability'	  => 'administrator',
			'icon_url'        => 'dashicons-email-alt',
			'redirect'        => false,
			'updated_message' => 'Impact Email Options Updated'
		) );
	}
}

add_action( 'init', 'impact_add_impact_options_page', 10, 0 );
