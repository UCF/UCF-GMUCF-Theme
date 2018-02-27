if (typeof jQuery != 'undefined'){
	jQuery(document).ready(function($) {
		Webcom.slideshow($);
		Webcom.chartbeat($);
		Webcom.analytics($);
		Webcom.handleExternalLinks($);

		/* Theme Specific Code Here */
	});
}else{console.log('jQuery dependancy failed to load');}
