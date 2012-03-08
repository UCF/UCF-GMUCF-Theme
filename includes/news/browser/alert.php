<?php

$alerts = get_posts(array('post_type'=>'alert', 'numberposts'=>1));
if(count($alerts) > 0) {
	$alert = $alerts[0];
?>
<div id="alert">
	<div id="alert_content">
		<h2><?=esc_html($alert->post_title)?></h2>
		<p>
			<?=nl2br(esc_html($alert->post_content))?>
		</p>
		<? if( ($alert_uri = get_post_meta($alert->ID, 'alert_external_uri', True)) !== '') { ?>
			<a href="<?=esc_html($alert_uri)?>">Click here for more information</a>
		<? } ?>
</div>
<?
}