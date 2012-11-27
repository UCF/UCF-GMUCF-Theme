<?=get_header()?>
<div id="content">
	<h1>Good <?=(int)date('G') >= 12 ? 'Afternoon' : 'Morning'?>, UCF.</h1>
	<?=get_template_part('includes/news/browser/top-story')?>
	<hr />
	<?=get_template_part('includes/news/browser/alert')?>
	<?=get_template_part('includes/news/browser/featured-stories')?>
	<? $wotd = get_word_of_the_day(); ?>
	<? if($wotd !== False) { ?>
	<hr />
	<div id="wotd" style="clear:both;">
		<h2>Word of the Day</h2>
		<span id="word"><b><?=$wotd['word']?></b> <strong>-</strong> \<?=$wotd['pronunciation']?>\ <strong>-</strong> <em><?=$wotd['partofspeech']?></em></span>
		<br />
		<? foreach($wotd['definitions'] as $part=>$definitions) { ?>
			<? if($part != $wotd['partofspeech']) { ?>
				<p><em><?=$part?></em></p>
			<? } ?>
			<? $count = 1; ?>
			<? foreach($definitions as $definition) { ?>
				<p><?=$count?>. <?=$definition?></p>
				<? $count++;?>
			<? } ?>
		<? } ?>
		<? if(count($wotd['examples']) > 0) { ?>
			<? foreach($wotd['examples'] as $example) { ?>
			<p class="quote">&ldquo;<?=$example['quote']?>&rdquo;<br />&mdash;<?=$example['source']?>, <?=$example['author']?></p>
			<? } ?>
		<? } ?>
		<div id="credit-link">
			<a href="http://www.dictionary.com" class="ignore-external">
				<img src="<?=bloginfo('stylesheet_directory')?>/static/img/dictionary.com-attribution.png"/>
			</a>
		</div>
	</div>
	<? } ?>
	<hr />
	<?=get_template_part('includes/news/browser/announcements')?>
	<div id="bottom" class="clearfix">
		<div id="social">
			<h2>Get Social</h2>
			<a id="facebook" class="ignore-external" href="http://www.facebook.com/ucf/">UCF on Facebook</a>
			<a id="youtube" class="ignore-external" href="http://www.youtube.com/user/UCF/">UCF on Youtube</a>
			<a id="twitter" class="ignore-external" href="http://www.twitter.com/UCF/">UCF on Twitter</a>
		</div>
		<a id="ucf" href="http://www.ucf.edu" class="ignore-external">
			4000 Central Florida Blvd.
			<br />
			Orlando, FL 32816
			<br />
			407.823.2000
		</a>
	</div>
</div>
<?=get_footer()?>