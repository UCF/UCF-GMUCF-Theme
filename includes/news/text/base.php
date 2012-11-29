<? header('Content-type: text/plain') ?>
Good <?=(int)date('G') >= 12 ? 'Afternoon' : 'Morning'?> UCF for <?=date('l, F j')?><? $weather = get_weather();?>

Today's High: <?=$weather['today']['temp']?>

Tonight's Low: <?=$weather['tonight']['temp']?><? $top_story_details = get_top_story_details()?>


-- Today's Top Stories

- <?= strip_tags($top_story_details['story_title']) ?>

<?= strip_tags($top_story_details['story_description']) ?>


<? foreach(get_featured_stories_details() as $detail) {?> 
- <?= strip_tags($detail['title']) ?>

<?= strip_tags($detail['description']) ?>

<? } ?>

<? $wotd = get_word_of_the_day(); ?>
<? if($wotd !== False) { ?>
-- Word of the Day
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

UCF Stands for Opportunity