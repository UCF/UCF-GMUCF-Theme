Good Morning UCF for <?=date('l, F j')?><? $weather = get_weather('weather-today'); if (!empty($weather)) { ?>

Today's High: <?=$weather['today']['tempN']?>

Tonight's Low: <?=$weather['tonight']['tempN']?><? $top_story_details = get_top_story_details()?>
<?php } ?>

-- Today's Top Stories

- <?= strip_tags($top_story_details['story_title']) ?>

<?= strip_tags($top_story_details['story_description']) ?>

<? foreach(get_featured_stories_details() as $detail) {?> 
- <?= strip_tags($detail['title']) ?>

<?= strip_tags($detail['description']) ?>

<? } ?>

<? $wotd = get_word_of_the_day(); ?>
<? if($wotd !== False) { ?>
-- Word of the Day, Provided by dictionary.com

<?=$wotd['word']?> - \<?=$wotd['pronunciation']?>\ - <?=$wotd['partofspeech']?>

<? foreach($wotd['definitions'] as $part=>$definitions) { ?>
<? if($part != $wotd['partofspeech']) { ?><?=$part?>
<? } ?><? $count = 1; ?>
<? foreach($definitions as $definition) { ?><?=$count?>. <?=$definition?><? $count++;?><? } ?>
<? } ?>
<? } ?>


-- Announcements

<? foreach(get_announcement_details() as $announcement) { ?>
- <?=strip_tags($announcement['title'])?>

<? } ?>


<?php 
# Because of insanity, the fetch_feed function changes the Content-Type header
# somehow. I didn't bother tracking it down because I don't care. Just force
# the Content-Type down here instead of at the top.

header('Content-Type: text/plain');
?>