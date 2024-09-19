<?php
namespace GMUCF\Theme\Includes\TemplateRedirects;


/**
 * Utility function that loads a template part.
 * Intended as a means of short-circuiting template
 * loading in the `template_redirect` action.
 *
 * @since 1.0.3
 * @author Chris Conover
 * @param string $template Template part path to load
 * @return void
 */
function display_gmucf_template( $template ) {
	global $wp_query;
	$wp_query->is_404 = false;
	header( 'HTTP/1.1 200 OK' );
	get_template_part( $template );
	exit;
}


/**
 * Convenience template redirects
 *
 * @since 1.0.3
 * @author Chris Conover
 * @return void
 */
function gmucf_template_redirect() {
	// Get the path component
    $request_path = parse_url($_SERVER['REQUEST_URI'], PHP_URL_PATH);
    $request_path = ltrim($request_path, '/'); // Remove leading slash
	var_dump($request_path);
	// Most to least specific
	$mapping = array(
		'gmucf/news/mail/'           => function() { display_gmucf_template( 'template-parts/news/mail/base' ); },
		'gmucf/news/text/'           => function() { display_gmucf_template( 'template-parts/news/text/base' ); },
		'gmucf/news/'                => function() { display_gmucf_template( 'template-parts/news/browser/base' ); },
		'gmucf/events/weekday/mail/' => function() { $_GET['edition'] = 'weekday'; display_gmucf_template( 'template-parts/events/mail/base' ); },
		'gmucf/events/weekday/text/' => function() { $_GET['edition'] = 'weekday'; display_gmucf_template( 'template-parts/events/text/base' ); },
		'gmucf/events/weekday/'      => function() { $_GET['edition'] = 'weekday'; display_gmucf_template( 'template-parts/events/browser/base' ); },
		'gmucf/events/weekend/mail/' => function() { $_GET['edition'] = 'weekend'; display_gmucf_template( 'template-parts/events/mail/base' ); },
		'gmucf/events/weekend/text/' => function() { $_GET['edition'] = 'weekend'; display_gmucf_template( 'template-parts/events/text/base' ); },
		'gmucf/events/weekend/'      => function() { $_GET['edition'] = 'weekend'; display_gmucf_template( 'template-parts/events/browser/base' ); },
		'gmucf/coronavirus/mail/'    => function() { display_gmucf_template( 'template-parts/coronavirus/mail/base' ); },
		'gmucf/coronavirus/'  => function() { display_gmucf_template( 'template-parts/coronavirus/browser/base' ); },
		'gmucf/icymi/mail/'    => function() { display_gmucf_template( 'template-parts/coronavirus/mail/base' ); },
		'gmucf/icymi/'         => function() { display_gmucf_template( 'template-parts/coronavirus/browser/base' ); },

	);

	foreach ( $mapping as $path => $func ) {
		if ( stripos( $request_path, $path ) === 0 ) {
			call_user_func( $func );
			return;
		}
	}
}

add_action( 'template_redirect', __NAMESPACE__ . '\gmucf_template_redirect', 1 );
