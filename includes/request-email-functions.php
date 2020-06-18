<?php
/**
 * Includes functions related to the Request Email form.
 */
namespace GMUCF\Theme\Includes\RequestEmail;


/**
 * Simplifies WYSIWYG editor toolbar buttons in all
 * Gravity Form WYSIWYG fields on this site.
 *
 * NOTE: while there are hooks available for targeting specific
 * forms' WYSIWYG toolbars, these toolbar settings get cached pretty
 * aggressively via cookies, and said cookies don't seem to make any
 * distinction between forms...so, there's not any point in
 * targeting specific forms/fields with this.
 *
 * Requires functions defined in the UCF Email Editor plugin.
 *
 * @since 3.0.1
 * @author Jo Dickson
 */
if ( function_exists( 'email_wysiwyg_toolbar_r1' ) ) {
	add_filter( 'gform_rich_text_editor_buttons', 'email_wysiwyg_toolbar_r1', 10, 0 );
}
if ( function_exists( 'email_wysiwyg_toolbar_r2' ) ) {
	add_filter( 'gform_rich_text_editor_buttons_row_two', 'email_wysiwyg_toolbar_r2', 10, 0 );
}
