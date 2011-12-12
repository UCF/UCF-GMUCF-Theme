<?php
if(isset($_GET['accessible'])) {
	get_template_part('includes/browser/base');
} else {
	get_template_part('includes/mail/base');
}
?>
