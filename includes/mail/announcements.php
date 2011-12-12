<?php
$rss = fetch_feed(ANNOUNCEMENTS_RSS_URL);

if(!is_wp_error($rss)) {
	$rss_items = $rss->get_items(0, $rss->get_item_quantity(4));
	?>
	<p style="font-size:22px;font-weight:100;display:block;">UCF Announcements</p>
	<?
	foreach($rss_items as $item) { ?>
		<p style="padding-top:0;margin:0;">
			<a style="font-weight:100;color:#9d1a1a;font-size:16px;" href="<?=$item->get_permalink()?>">
				<?=esc_html($item->get_title())?>
			</a>
		</p>
		<br />
	<?
	}
}