<?php
if(isset($_GET['accessible'])) {
	get_template_part('includes/browser/base');
} else if(isset($_GET['text'])) {
	get_template_part('includes/text/base');
} else {
	get_template_part('includes/mail/base');
}
?>
