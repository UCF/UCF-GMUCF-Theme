<?php
/**
 * Includes functions that handle registration/enqueuing of meta tags, styles,
 * and scripts in the document head and footer.
 */
namespace GMUCF\Theme\Includes\Meta;


/**
 * Enqueue front-end css and js.
 *
 * @author Jo Dickson
 * @since 3.0.0
 * @return void
 */
function enqueue_frontend_assets() {
	wp_enqueue_style( 'athena-framework-css-cdn', 'https://cdn.ucf.edu/athena-framework/latest/css/framework.min.css', null );

	wp_enqueue_script( 'ucf-header', '//universityheader.ucf.edu/bar/js/university-header.js?use-1200-breakpoint=1', null, null, true );
	wp_enqueue_script( 'wp-a11y' );
	wp_enqueue_script( 'tether', 'https://cdnjs.cloudflare.com/ajax/libs/tether/1.4.0/js/tether.min.js', null, null, true );
	wp_enqueue_script( 'athena-framework-js-cdn', 'https://cdn.ucf.edu/athena-framework/latest/js/framework.min.js', array( 'jquery', 'tether' ), $theme_version, true );
}

add_action( 'wp_enqueue_scripts', __NAMESPACE__ . '\enqueue_frontend_assets' );


/**
 * De-register and re-register a newer version of jquery early in the
 * document head.
 *
 * @author Jo Dickson
 * @since 3.0.0
 * @return void
 */
function enqueue_jquery() {
	// Deregister jquery and re-register newer version in the document head.
	wp_deregister_script( 'jquery' );
	wp_register_script( 'jquery', 'https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js', null, null, false );
	wp_enqueue_script( 'jquery' );
}

add_action( 'wp_enqueue_scripts', __NAMESPACE__ . '\enqueue_jquery', 1 );


/**
 * Meta tags to insert into the document head.
 *
 * @since 3.0.0
 * @author Jo Dickson
 * @return void
 */
function add_meta_tags() {
?>
<meta charset="utf-8">
<meta http-equiv="X-UA-Compatible" content="IE=Edge">
<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
<?php
}

add_action( 'wp_head', __NAMESPACE__ . '\add_meta_tags', 1 );


/**
 * Remove unneeded meta tags generated by WordPress.
 * Some of these may already be handled by security plugins.
 */
remove_action( 'wp_head', 'wp_generator' );
remove_action( 'wp_head', 'wp_shortlink_wp_head', 10, 0 );
remove_action( 'wp_head', 'print_emoji_detection_script', 7 );
remove_action( 'wp_print_styles', 'print_emoji_styles' );
add_filter( 'emoji_svg_url', '__return_false' );


/**
 * Adds ID attribute to UCF Header script.
 *
 * @since 3.0.0
 * @author Jo Dickson
 * @return void
 */
function add_id_to_ucfhb( $url ) {
	if (
		( false !== strpos( $url, 'bar/js/university-header.js' ) )
		|| ( false !== strpos( $url, 'bar/js/university-header-full.js' ) )
	) {
		remove_filter( 'clean_url', __NAMESPACE__ . '\add_id_to_ucfhb', 10, 3 );
		return "$url' id='ucfhb-script";
	}
	return $url;
}

add_filter( 'clean_url', __NAMESPACE__ . '\add_id_to_ucfhb', 10, 1 );


/**
 * Sets a default favicon if a site icon is not already set.
 *
 * @since 3.0.0
 * @author Jo Dickson
 * @return void
 */
function add_favicon_default() {
	if ( ! has_site_icon() ):
?>
<link rel="shortcut icon" href="<?php echo GMUCF_THEME_URL . '/favicon.ico'; ?>" />
<?php
	endif;
}

add_action( 'wp_head', __NAMESPACE__ . '\add_favicon_default' );