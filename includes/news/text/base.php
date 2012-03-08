<? header('Content-type: text/plain') ?>
Good Morning UCF for <?=date('l, F j')?><? $weather = get_weather();?>

Today's High: <?=$weather['today']['temp']?>

Tonight's Low: <?=$weather['tonight']['temp']?><? $top_story_details = get_top_story_details()?>


-- Today's Top Stories

- <?= strip_tags($top_story_details['story_title']) ?>

<?= strip_tags($top_story_details['story_description']) ?>


<? foreach(get_featured_stories_details() as $detail) {?> 
- <?= strip_tags($detail['title']) ?>

<?= strip_tags($detail['description']) ?>

<? } ?>

-- Today's Events

<? 	$count = 0;
	foreach(get_todays_events() as $event) { 
		if($count == 7) break;
		$start_timestamp = strtotime($event->starts); ?>
- <?=date('g:iA', $start_timestamp)?> - <?= strip_tags($event->title) ?>

<? 		$count++;
	} 
?>


-- Tomorrows's Events

<? 	$count = 0;
	foreach(get_tomorrows_events() as $event) { 
		if($count == 7) break;
		$start_timestamp = strtotime($event->starts); ?>
- <?=date('g:iA', $start_timestamp)?> - <?= strip_tags($event->title) ?>

<? 		$count++;
	} 
?>

-- Announcements

<? foreach(get_announcement_details() as $announcement) { ?>
- <?=strip_tags($announcement['title'])?>

<? } ?>

UCF Stands for Opportunity