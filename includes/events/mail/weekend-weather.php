<? 
$weather = get_weather('weather-extended'); 
if (!empty($weather)) {
?>
<tr>
	<td>
		<div class="clear">&nbsp;</div>
		<table width="600" border="0" align="center" cellpadding="0" bgcolor="#FFF" cellspacing="0" style="width: 600px; margin:auto; background-color:#FFF;">
			<tr>
				<td style="width:120px;border-right:1px solid #ddd;padding-right:15px;">
					<table width="110" border="0" align="center" cellpadding="0" bgcolor="#FFF" cellspacing="0" style="width:120px; margin:0; background-color:#FFF;">
						<tr>
							<td style="width:90px">
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
				<td style="width:120px;border-right:1px solid #ddd;padding-left:20px;padding-right:15px;">
					<table width="110" border="0" align="center" cellpadding="0" bgcolor="#FFF" cellspacing="0" style="width:120px; margin:0; background-color:#FFF;">
						<tr>
							<td style="width:90px">
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
				<td style="width:120px;border-right:1px solid #ddd;padding-left:20px;padding-right:15px;">
					<table width="110" border="0" align="center" cellpadding="0" bgcolor="#FFF" cellspacing="0" style="width:120px; margin:0; background-color:#FFF;">
						<tr>
							<td style="width:90px">
								<span style="font-size:10px;font-weight:bold;"><?=strtoupper(date('l', strtotime($weather['day3']['date'])))?></span>
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
				<td style="width:120px;padding-left:20px;">
					<table width="110" border="0" align="center" cellpadding="0" bgcolor="#FFF" cellspacing="0" style="width:120px; margin:0; background-color:#FFF;">
						<tr>
							<td style="width:90px">
								<span style="font-size:10px;font-weight:bold;"><?=strtoupper(date('l', strtotime($weather['day4']['date'])))?></span>
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
		</table>
		<div class="clear">&nbsp;</div>
	</td>
</tr>
<?php } ?>