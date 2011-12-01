<?php
$rss = fetch_feed(FEATURED_STORIES_RSS_URL.'?thumb=600x308');

if(!is_wp_error($rss)) {
	$rss_items = $rss->get_items(0, $rss->get_item_quantity(1));
	$rss_item = $rss_items[0];
	$enclosure = $rss_item->get_enclosure();
	$thumbnail = $enclosure->get_thumbnail();
	?>
	<img src="<?=$thumbnail?>" />
	<table width="560" border="0" align="center" cellpadding="0" bgcolor="#FFF" cellspacing="0" style="width: 560px; margin:0 auto;padding-top:20px; background-color:#FFF;border-bottom:1px solid #ddd;">
		<tr>
			<td colspan="2" style="padding-bottom:15px;">
				<span style="font-size:190%;font-weight:100;"><?=$rss_item->get_title()?></span>
				<div style="padding-top:5px;font-weight:100;line-height:1.4em;padding-bottom:10px;font-size:100%">
						<?=$rss_item->get_description()?> <a style="color:#9d1a1a;" href="<?=$rss_item->get_permalink()?>">Read More.</a>
				</div>
			</td>
		</tr>
	</table>
<?
}
?>