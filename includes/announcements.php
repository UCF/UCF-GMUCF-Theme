<?php
$rss = fetch_feed(ANNOUNCEMENTS_RSS_URL);

if(!is_wp_error($rss)) {
	$rss_items = $rss->get_items(0, $rss->get_item_quantity(4));
	?>
	<span style="font-size:150%;font-weight:100;display:block;padding-bottom:40px;">UCF Announcements</span>
	<?
	foreach($rss_items as $item) { ?>
		<p style="padding-bottom:20px;padding-top:0;margin:0;">
			<a style="font-weight:100;color:#9d1a1a;" href="<?=$item->get_permalink()?>">
				<?=$item->get_title()?>
			</a>
		</p>
	<?
	}
}