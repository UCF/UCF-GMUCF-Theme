<?php
namespace GMUCF\Theme\Includes\TemplateRedirects;


/**
 * Convenience template redirects
 *
 * @author Chris Conover
 **/
function gmucf_template_redirect() {

	function display_gmucf_template( $template ) {
		global $wp_query;
		$wp_query->is_404 = false;
		header( "HTTP/1.1 200 OK" );
		get_template_part( $template );
		exit;
	}

	# Get the path without server host or leading blog stuff (e.g. /wp3/gmucf)
	$parts = explode($_SERVER['SERVER_NAME'], home_url('/'));
	if(count($parts) == 2) {
		if($parts[1] != '/') {
			$request_path = str_replace($parts[1], '', $_SERVER['REQUEST_URI']);
		} else {
			$request_path = substr($_SERVER['REQUEST_URI'], 1);
		}

		# Most to least specific
		$mapping = array(
			'news/mail/'           => function() { display_gmucf_template( 'template-parts/news/mail/base' ); },
			'news/text/'           => function() { display_gmucf_template( 'template-parts/news/text/base' ); },
			'news/'                => function() { display_gmucf_template( 'template-parts/news/browser/base' ); },
			'events/weekday/mail/' => function() { $_GET['edition'] = 'weekday'; display_gmucf_template( 'template-parts/events/mail/base' ); },
			'events/weekday/text/' => function() { $_GET['edition'] = 'weekday'; display_gmucf_template( 'template-parts/events/text/base' ); },
			'events/weekday/'      => function() { $_GET['edition'] = 'weekday'; display_gmucf_template( 'template-parts/events/browser/base' ); },
			'events/weekend/mail/' => function() { $_GET['edition'] = 'weekend'; display_gmucf_template( 'template-parts/events/mail/base' ); },
			'events/weekend/text/' => function() { $_GET['edition'] = 'weekend'; display_gmucf_template( 'template-parts/events/text/base' ); },
			'events/weekend/'      => function() { $_GET['edition'] = 'weekend'; display_gmucf_template( 'template-parts/events/browser/base' ); },
		);

		foreach($mapping as $path => $func) {
			if(stripos($request_path, $path) === 0) {
				call_user_func($func);
			}
		}
	}
}

add_action( 'template_redirect', __NAMESPACE__ . '\gmucf_template_redirect', 1 );