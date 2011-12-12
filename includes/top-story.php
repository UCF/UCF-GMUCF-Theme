<?php
$thumbnail_src     = '';
$story_title       = '';
$story_description = '';
$read_more_uri     = '';

if( ($top_story = get_todays_top_story()) !== False && has_post_thumbnail($top_story->ID)) {
	$thumbnail_id  = get_post_thumbnail_id($top_story->ID);
	$image_details = wp_get_attachment_image_src($thumbnail_id, 'top_story');

	$thumbnail_src     = esc_html($image_details[0]);
	$story_title       = esc_html($top_story->post_title);
	$story_description = nl2br(esc_html($top_story->post_content));
	$read_more_uri     = esc_html(get_post_meta($top_story->ID, 'top_story_external_uri', True));

} else {
	$rss = fetch_feed(FEATURED_STORIES_RSS_URL.'?thumb=600x308');

	if(!is_wp_error($rss)) {
		$rss_items = $rss->get_items(0, $rss->get_item_quantity(15));
		$rss_item = $rss_items[0];

		foreach($rss_items as $rss_item) {

			$enclosure = $rss_item->get_enclosure();
			
			$thumbnail_src     = esc_html($enclosure->get_thumbnail());
			$story_title       = esc_html($rss_item->get_title());
			$story_description = truncate(nl2br(esc_html($rss_item->get_description())));
			$read_more_uri     = esc_html($rss_item->get_permalink());

			if($thumbnail_src != '') {
				set_transient('top_story_id', $rss_item->get_id());
				break;
			}
		}
	}
}
?>

<img style="border:none;" src="<?=$thumbnail_src?>" />
<table width="560" border="0" align="center" cellpadding="0" bgcolor="#FFF" cellspacing="0" style="width: 560px; margin:0 auto;padding-top:20px; background-color:#FFF;border-bottom:1px solid #ddd;">
	<tr>
		<td colspan="2" style="padding-bottom:15px;">
			<span style="font-size:30px;font-weight:100;"><?=$story_title?></span>
			<div style="padding-top:5px;font-weight:100;line-height:1.4em;padding-bottom:10px;font-size:18px">
					<?=$story_description?> <? if($read_more_uri != '') {?><a style="color:#9d1a1a;" href="<?=$read_more_uri?>">Read More.</a><?}?>
			</div>
		</td>
	</tr>
</table>