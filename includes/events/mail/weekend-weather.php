<tr>
	<td>
		<div class="clear">&nbsp;</div>
		<? $weather = get_weekend_weather(); ?>
		<table width="600" border="0" align="center" cellpadding="0" bgcolor="#FFF" cellspacing="0" style="width: 600px; margin:auto; background-color:#FFF;">
			<tr>
				<td style="width:120px;border-right:1px solid #ddd;padding-right:15px;">
					<table width="110" border="0" align="center" cellpadding="0" bgcolor="#FFF" cellspacing="0" style="width:120px; margin:0; background-color:#FFF;">
						<tr>
							<td style="width:90px">
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
				<td style="width:120px;border-right:1px solid #ddd;padding-left:20px;padding-right:15px;">
					<table width="110" border="0" align="center" cellpadding="0" bgcolor="#FFF" cellspacing="0" style="width:120px; margin:0; background-color:#FFF;">
						<tr>
							<td style="width:90px">
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
				<td style="width:120px;border-right:1px solid #ddd;padding-left:20px;padding-right:15px;">
					<table width="110" border="0" align="center" cellpadding="0" bgcolor="#FFF" cellspacing="0" style="width:120px; margin:0; background-color:#FFF;">
						<tr>
							<td style="width:90px">
								<span style="font-size:10px;font-weight:bold;">SUNDAY</span>
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
				<td style="width:120px;padding-left:20px;">
					<table width="110" border="0" align="center" cellpadding="0" bgcolor="#FFF" cellspacing="0" style="width:120px; margin:0; background-color:#FFF;">
						<tr>
							<td style="width:90px">
								<span style="font-size:10px;font-weight:bold;">MONDAY</span>
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
		</table>
		<div class="clear">&nbsp;</div>
	</td>
</tr>