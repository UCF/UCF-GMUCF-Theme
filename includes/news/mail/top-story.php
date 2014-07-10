<?php
extract(get_top_story_details());
?>
<a href="<?=$read_more_uri?>" style="border:none;text-decoration:none;">
	<img class="responsiveimg" style="border:none;" src="<?=$thumbnail_src?>" />
</a>
<table class="tcollapse100" width="600" border="0" align="center" cellpadding="0" bgcolor="#FFF" cellspacing="0" style="width:600px; margin:0 auto;padding-top:20px; background-color:#FFF;border-bottom:1px solid #ddd;">
	<tr>
		<td colspan="2" style="padding-bottom:15px;">
			<a href="<?=$read_more_uri?>" style="color:#000001;text-decoration:none;">
				<span id="topstorytitle" style="font-size:30px;font-weight:100;color:#000001;"><?=$story_title?></span>
			</a>
			<div style="padding-top:5px;font-weight:100;line-height:1.4em;padding-bottom:10px;font-size:18px">
					<a href="<?=$read_more_uri?>" style="color:#000001;text-decoration:none;">
						<?=$story_description?>
					</a>
					<? if($read_more_uri != '') {?>
						<a style="color:#9d1a1a;text-decoration:underline;" href="<?=$read_more_uri?>">
							Read More.
						</a>
					<?}?>
			</div>
		</td>
	</tr>
</table>