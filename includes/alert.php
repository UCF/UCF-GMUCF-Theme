<?php

$alerts = get_posts(array('post_type'=>'alert', 'numberposts'=>1));
if(count($alerts) > 0) {
	$alert = $alerts[0];
?>

<tr>
	<td  colspan="2" style="border-bottom:1px solid #ddd;padding:3px 0;">
		<table width="100%" border="0" align="center" cellpadding="0" bgcolor="#feedce" cellspacing="0" style="width: 100%;padding:20px 15px; background-color:#feedce;">
			<tr>
				<td>
					<span style="display:block;margin:0;padding:0;color:#e84a13;font-size:100%;font-weight:bold;"><?=esc_html($alert->post_title)?></span>
					<p style="padding:10px 0 0 0;margin:0;font-weight:100;font-size:140%;line-height:1.4em;">
						<?=nl2br(esc_html($alert->post_content))?>
					</p>
					<? if( ($alert_uri = get_post_meta($alert->ID, 'alert_external_uri', True)) !== '') { ?>
					<p style="margin:0;padding:20px 0 0 0;">
						<a style="color:#333;font-size:140%;font-weight:100;" href="<?=esc_html($alert_uri)?>">Click here for more information</a>
					</p>
					<? } ?>
				</td>
			</tr>
		</table>
	</td>
</tr>
<?
}