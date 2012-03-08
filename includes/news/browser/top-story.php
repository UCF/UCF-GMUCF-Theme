<?php
extract(get_top_story_details());
?>
<div id="top_story">
	<a class="ignore-external" href="<?=$read_more_uri?>"><img src="<?=$thumbnail_src?>" /></a>
	<div class="narrow">
		<h2><a class="ignore-external" href="<?=$read_more_uri?>"><?=$story_title?></a></h2>
		<p>
			<a href="<?=$read_more_uri?>" class="ignore-external">
				<?=$story_description?>
			</a> <? if($read_more_uri != '') {?><a id="read_more" href="<?=$read_more_uri?>">Read More.</a><?}?>
		</p>
	</div>
</div>