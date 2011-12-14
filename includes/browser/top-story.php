<?php
extract(get_top_story_details());
?>
<img src="<?=$thumbnail_src?>" />
<div class="narrow">
	<h2><?=$story_title?></h2>
	<p>
		<?=$story_description?> <? if($read_more_uri != '') {?><a id="read_more" href="<?=$read_more_uri?>">Read More.</a><?}?>
	</p>
</div>