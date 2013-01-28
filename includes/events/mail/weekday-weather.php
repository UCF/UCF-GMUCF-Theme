<? 
$weather = get_weekday_weather(); 
if (!empty($weather)) {
?>
<tr>
	<td>
		<div class="clear">&nbsp;</div>
		<table width="600" border="0" align="center" cellpadding="0" bgcolor="#FFF" cellspacing="0" style="width: 600px; margin:0; background-color:#FFF;">
			<tr>
				<td style="width:110px;border-right:1px solid #ddd;padding-left:10px;">
					<table width="110" border="0" align="center" cellpadding="0" bgcolor="#FFF" cellspacing="0" style="width: 110px; margin:0; background-color:#FFF;">
						<tr>
							<td style="width:60px">
								<span style="font-size:10px;font-weight:bold;">TODAY</span>
								<img src="<?=bloginfo('stylesheet_directory')?>/static/img/weather/<?=$weather[0]['image']?>.png" />
							</td>
							<td>
								<span style="font-size:18px;font-weight:bold"><?=$weather[0]['high']?>&deg;</span>
								<br />
								<span style="font-size:12px;">High</span>
								<br />
								<span style="font-size:18px;font-weight:bold"><?=$weather[0]['low']?>&deg;</span>
								<br />
								<span style="font-size:12px;">Low</span>
							</td>
						</tr>
					</table>
				</td>
				<td style="width:110px;border-right:1px solid #ddd;padding-left:10px;">
					<table width="110" border="0" align="center" cellpadding="0" bgcolor="#FFF" cellspacing="0" style="width: 110px; margin:0; background-color:#FFF;">
						<tr>
							<td style="width:60px">
								<span style="font-size:10px;font-weight:bold;">TOMORROW</span>
								<img src="<?=bloginfo('stylesheet_directory')?>/static/img/weather/<?=$weather[1]['image']?>.png" />
							</td>
							<td>
								<span style="font-size:18px;font-weight:bold"><?=$weather[1]['high']?>&deg;</span>
								<br />
								<span style="font-size:12px;">High</span>
								<br />
								<span style="font-size:18px;font-weight:bold"><?=$weather[1]['low']?>&deg;</span>
								<br />
								<span style="font-size:12px;">Low</span>
							</td>
						</tr>
					</table>
				</td>
				<td style="width:110px;border-right:1px solid #ddd;padding-left:10px;">
					<table width="110" border="0" align="center" cellpadding="0" bgcolor="#FFF" cellspacing="0" style="width: 110px; margin:0; background-color:#FFF;">
						<tr>
							<td style="width:60px">
								<span style="font-size:10px;font-weight:bold;">WEDNESDAY</span>
								<img src="<?=bloginfo('stylesheet_directory')?>/static/img/weather/<?=$weather[2]['image']?>.png" />
							</td>
							<td>
								<span style="font-size:18px;font-weight:bold"><?=$weather[2]['high']?>&deg;</span>
								<br />
								<span style="font-size:12px;">High</span>
								<br />
								<span style="font-size:18px;font-weight:bold"><?=$weather[2]['low']?>&deg;</span>
								<br />
								<span style="font-size:12px;">Low</span>
							</td>
						</tr>
					</table>
				</td>
				<td style="width:110px;border-right:1px solid #ddd;padding-left:10px;">
					<table width="110" border="0" align="center" cellpadding="0" bgcolor="#FFF" cellspacing="0" style="width: 110px; margin:0; background-color:#FFF;">
						<tr>
							<td style="width:60px">
								<span style="font-size:10px;font-weight:bold;">THURSDAY</span>
								<img src="<?=bloginfo('stylesheet_directory')?>/static/img/weather/<?=$weather[3]['image']?>.png" />
							</td>
							<td>
								<span style="font-size:18px;font-weight:bold"><?=$weather[3]['high']?>&deg;</span>
								<br />
								<span style="font-size:12px;">High</span>
								<br />
								<span style="font-size:18px;font-weight:bold"><?=$weather[3]['low']?>&deg;</span>
								<br />
								<span style="font-size:12px;">Low</span>
							</td>
						</tr>
					</table>
				</td>
				<td style="width:110px;padding-left:10px;">
					<table width="110" border="0" align="center" cellpadding="0" bgcolor="#FFF" cellspacing="0" style="width: 110px; margin:0; background-color:#FFF;">
						<tr>
							<td style="width:60px">
								<span style="font-size:10px;font-weight:bold;">FRIDAY</span>
								<? if($weather[4]['image'] == '') {?>
									<br />
									<span style="font-size:15px;font-weight:bold;">???</span>
								<? } else { ?>
									<img src="<?=bloginfo('stylesheet_directory')?>/static/img/weather/<?=$weather[4]['image']?>.png" />
								<? } ?>
							</td>
							<td>
								<span style="font-size:18px;font-weight:bold">
									<? if($weather[4]['high'] == '') {?>
										?
									<? } else { ?>
										<?=$weather[4]['high']?>&deg;
									<? } ?>
								</span>
								<br />
								<span style="font-size:12px;">High</span>
								<br />
								<span style="font-size:18px;font-weight:bold">
									<? if($weather[4]['low'] == '') {?>
										?
									<? } else { ?>
										<?=$weather[4]['low']?>&deg;
									<? } ?>
								</span>
								<br />
								<span style="font-size:12px;">Low</span>
							</td>
						</tr>
					</table>
				</td>
			</tr>
		</table>
		<div class="clear">&nbsp;</div>
	</td>
</tr>
<?php } ?>