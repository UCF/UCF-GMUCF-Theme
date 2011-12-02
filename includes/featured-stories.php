<?php
$rss = fetch_feed(FEATURED_STORIES_RSS_URL.'?thumb=95');

if(!is_wp_error($rss)) {
	$rss_items = $rss->get_items(1, $rss->get_item_quantity(3));
	?>	
	<table width="100%" border="0" align="center" cellpadding="0" bgcolor="#FFF" cellspacing="0" style="width:100%; margin:0; background-color:#FFF;">
	<?
		foreach($rss_items as $rss_item) {
			$enclosure = $rss_item->get_enclosure();
	?>
		<tr>
			<td style="vertical-align:top;padding-bottom:40px;">
				<a style="color:#333;text-decoration:none;" href="<?=$rss_item->get_permalink()?>">
					<? if($enclosure && ($thumbnail = $enclosure->get_thumbnail())) { ?>
					<img src="<?=$thumbnail?>" style="border:none;" />
					<? } else { ?>
					<img src="<?=bloginfo('stylesheet_directory')?>/static/img/no-photo.png" style="border:none;" />
					<? } ?>
				</a>
			</td>
			<td style="padding-left:20px;padding-bottom:40px;">
				<a style="font-size:16px;color:#333;text-decoration:none;font-weight:bold;" href="<?=$rss_item->get_permalink()?>"
					<span style="line-height:1.3em;">
						<?=$rss_item->get_title()?>
					</span>
					<p style="font-family:Georgia,serif;font-size:14px;margin:3px 0 0 0;font-weight:100;line-height:1.4em;">
						<?=$rss_item->get_description();?>
					</p>
				</a>
			</td>
		</tr>
	<? } ?>
	</table>
	<a style="font-weight:100;color:#9d1a1a;font-size:16px;" href="<?=FEATURED_STORIES_MORE_URL?>">More UCF Stories</a>
<?
}
