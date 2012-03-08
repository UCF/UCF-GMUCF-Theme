<?php

if(isset($_GET['events'])) {
	if(isset($_GET['accessible'])) {
		get_template_part('includes/events/browser/base');
	} else if(isset($_GET['text'])) {
		get_template_part('includes/events/text/base');
	} else {
		get_template_part('includes/events/mail/base');
	}
} else {
	if(isset($_GET['accessible'])) {
		get_template_part('includes/news/browser/base');
	} else if(isset($_GET['text'])) {
		get_template_part('includes/news/text/base');
	} else {
		get_template_part('includes/news/mail/base');
	}
}

?>
