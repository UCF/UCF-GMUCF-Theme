<?php
$rss = fetch_feed(FEATURED_STORIES_RSS_URL);

if(!is_wp_error($rss)) {
	$rss_items = $rss->get_items(0, $rss->get_item_quantity(3));
	?>	
	<table width="100%" border="0" align="center" cellpadding="0" bgcolor="#FFF" cellspacing="0" style="width:100%; margin:0; background-color:#FFF;">
	<?
		foreach($rss_items as $rss_item) {
			$enclosure = $rss_item->get_enclosure();
	?>
		<tr>
			<td style="vertical-align:top;padding-bottom:40px;">
				<? if($enclosure && ($thumbnail = $enclosure->get_thumbnail())) { ?>
				<img src="<?=$thumbnail?>" />
				<? } else { ?>
				<img src="<?=bloginfo('stylesheet_directory')?>/static/img/no-photo.png" />
				<? } ?>
			</td>
			<td style="padding-left:20px;padding-bottom:40px;">
				<span style="font-weight:bold;font-size:95%;line-height:1.3em;">
					<?=$rss_item->get_title()?>
				</span>
				<p style="font-family:Georgia,serif;font-size:85%;margin:3px 0 0 0;font-weight:100;line-height:1.4em;">
					<?=$rss_item->get_description();?>
				</p>
			</td>
		</tr>
	<? } ?>
	</table>
	<a style="font-weight:100;color:#9d1a1a;" href="<?=FEATURED_STORIES_MORE_URL?>">More UCF Stories</a>
<?
}
