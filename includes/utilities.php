<?php
/**
 * General utilities unique to this theme
 */
namespace GMUCF\Theme\Includes\Utilities;


/**
 * Returns a theme option's default value.
 *
 * @since 3.0.0
 * @author Jo Dickson
 * @param string $option_name The name of the option
 * @return mixed Option default value, or false if a default is not set
 **/
function get_option_default( $option_name ) {
	$defaults = unserialize( GMUCF_THEME_CUSTOMIZER_DEFAULTS );
	if ( $defaults && isset( $defaults[$option_name] ) ) {
		return $defaults[$option_name];
	}
	return false;
}
