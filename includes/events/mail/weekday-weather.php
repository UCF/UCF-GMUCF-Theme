<? 
$weather = get_weather('weather-extended'); 
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
								<img src="<?=bloginfo('stylesheet_directory')?>/static/img/weather/<?=$weather['day1']['imgCode']?>.png" />
							</td>
							<td>
								<span style="font-size:18px;font-weight:bold"><?=$weather['day1']['tempMaxN']?>&deg;</span>
								<br />
								<span style="font-size:12px;">High</span>
								<br />
								<span style="font-size:18px;font-weight:bold"><?=$weather['day1']['tempMinN']?>&deg;</span>
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
								<img src="<?=bloginfo('stylesheet_directory')?>/static/img/weather/<?=$weather['day2']['imgCode']?>.png" />
							</td>
							<td>
								<span style="font-size:18px;font-weight:bold"><?=$weather['day2']['tempMaxN']?>&deg;</span>
								<br />
								<span style="font-size:12px;">High</span>
								<br />
								<span style="font-size:18px;font-weight:bold"><?=$weather['day2']['tempMinN']?>&deg;</span>
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
								<img src="<?=bloginfo('stylesheet_directory')?>/static/img/weather/<?=$weather['day3']['imgCode']?>.png" />
							</td>
							<td>
								<span style="font-size:18px;font-weight:bold"><?=$weather['day3']['tempMaxN']?>&deg;</span>
								<br />
								<span style="font-size:12px;">High</span>
								<br />
								<span style="font-size:18px;font-weight:bold"><?=$weather['day3']['tempMinN']?>&deg;</span>
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
								<img src="<?=bloginfo('stylesheet_directory')?>/static/img/weather/<?=$weather['day4']['imgCode']?>.png" />
							</td>
							<td>
								<span style="font-size:18px;font-weight:bold"><?=$weather['day4']['tempMaxN']?>&deg;</span>
								<br />
								<span style="font-size:12px;">High</span>
								<br />
								<span style="font-size:18px;font-weight:bold"><?=$weather['day4']['tempMinN']?>&deg;</span>
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
								<? if($weather['day5']['imgCode'] == '') {?>
									<br />
									<span style="font-size:15px;font-weight:bold;">???</span>
								<? } else { ?>
									<img src="<?=bloginfo('stylesheet_directory')?>/static/img/weather/<?=$weather['day5']['imgCode']?>.png" />
								<? } ?>
							</td>
							<td>
								<span style="font-size:18px;font-weight:bold">
									<? if($weather['day5']['tempMaxN'] == '') {?>
										?
									<? } else { ?>
										<span style="font-size:18px;font-weight:bold"><?=$weather['day5']['tempMaxN']?>&deg;</span>
									<? } ?>
								</span>
								<br />
								<span style="font-size:12px;">High</span>
								<br />
								<span style="font-size:18px;font-weight:bold">
									<? if($weather['day5']['tempMinN'] == '') {?>
										?
									<? } else { ?>
										<span style="font-size:18px;font-weight:bold"><?=$weather['day5']['tempMinN']?>&deg;</span>
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