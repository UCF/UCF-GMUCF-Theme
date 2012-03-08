<?php

# Which edition of the events should be displayed.
# Override if specified
if(isset($_GET['edition'])) {
	if(strtolower($_GET['edition']) == 'weekday') {
		$edition = EVENTS_WEEKDAY_EDITION;
	} else if(strtolower($_GET['edition']) == 'weekend') {
		$edition = EVENTS_WEEKEND_EDITION;
	}
} else {
	$edition = get_events_edition();
}

if($edition === False) {
	echo '<div style="width:500px;font-size:40px;margin:auto;text-align:center;">';
	echo 'There is no events edition due out today. Override by adding an `edition`';
	echo ' GET paramter to the URI with a value of either `weekday` or `weekend`.</div>';
	die();
}

switch($edition) {
	case EVENTS_WEEKDAY_EDITION:
		extract(get_weekday_events());
		break;
	case EVENTS_WEEKEND_EDITION:
		extract(get_weekend_events());
		break;
}
?>
<html lang="en">
	<head>
		<meta http-equiv="Content-Type" content="text/html;charset=UTF-8">
		<meta name="format-detection" content="telephone=no" />
		<meta name="viewport" content="width=640" />
		<title>Good Morning UCF - <?=date('F j')?></title>
		<style type="text/css">
			<!--
			html, body { margin:0px; padding:0; background-color:#FFF; color:#333; font-family:"Helvetica Neue", Helvetica, sans-serif; }
			-->
			body {width:600px;margin:auto;}
			* {zoom:1;}
			a {color:#333;text-decoration:none;}
		</style>
	</head>
	<body bgcolor="#FFF">
		<table width="600" border="0" align="center" cellpadding="0" bgcolor="#FFF" cellspacing="0" style="width: 600px; margin:0; background-color:#FFF;">
			<tr>
				<td style="padding-top:30px;font-size:20px;font-weight:200;">
					!@!First Name!@!, check out:
				</td>
			</tr>
			<tr>
				<td style="padding-top:30px;border-bottom:1px solid #dddddd;">
					<table width="600" border="0" align="center" cellpadding="0" bgcolor="#FFF" cellspacing="0" style="width: 600px; margin:0; background-color:#FFF;">
						<tr>
							<td style="width:365px;font-size:37px;font-weight:200;">
								This Week<?=($edition === EVENTS_WEEKEND_EDITION ? 'end' :'')?> at <span style="color:#ffc907;font-weight:bold">UCF</span>
							</td>
							<td style="width:235px;font-size:37px;font-weight:200;text-align:right;">
								<?=date('n/j', $start_date->getTimestamp()).'-'.date('n/j', $end_date->getTimestamp())?>
							</td>
						</tr>
					</table>
				</td>
			</tr>
			<tr>
				<? $weather = get_extended_weather(); ?>
				<table width="600" border="0" align="center" cellpadding="0" bgcolor="#FFF" cellspacing="0" style="width: 600px; margin:0; background-color:#FFF;">
						<tr>
							<td style="width:120px;">
								<table width="120" border="0" align="center" cellpadding="0" bgcolor="#FFF" cellspacing="0" style="width: 120px; margin:0; background-color:#FFF;">
									<tr>
										<td style="width:60px">
											<span>TODAY</span>
											<img src="<?=bloginfo('stylesheet_directory')?>/static/img/weather/<?=$weather[0]['image']?>.png" />
										</td>
										<td>
											<?=$weather[0]['high']?>&deg;
											<br />
											High
											<br />
											<?=$weather[0]['low']?>&deg;
											<br />
											Low
										</td>
									</tr>
								</table>
							</td>
							<td style="width:120px;">
								<table width="120" border="0" align="center" cellpadding="0" bgcolor="#FFF" cellspacing="0" style="width: 120px; margin:0; background-color:#FFF;">
									<tr>
										<td style="width:60px">
											<span>TOMORROW</span>
											<img src="<?=bloginfo('stylesheet_directory')?>/static/img/weather/<?=$weather[1]['image']?>.png" />
										</td>
										<td>
											<?=$weather[1]['high']?>&deg;
											<br />
											High
											<br />
											<?=$weather[1]['low']?>&deg;
											<br />
											Low
										</td>
									</tr>
								</table>
							</td>
							<td style="width:120px;">
								<table width="120" border="0" align="center" cellpadding="0" bgcolor="#FFF" cellspacing="0" style="width: 120px; margin:0; background-color:#FFF;">
									<tr>
										<td style="width:60px">
											<span>WEDNESDAY</span>
											<img src="<?=bloginfo('stylesheet_directory')?>/static/img/weather/<?=$weather[2]['image']?>.png" />
										</td>
										<td>
											<?=$weather[2]['high']?>&deg;
											<br />
											High
											<br />
											<?=$weather[2]['low']?>&deg;
											<br />
											Low
										</td>
									</tr>
								</table>
							</td>
							<td style="width:120px;">
								<table width="120" border="0" align="center" cellpadding="0" bgcolor="#FFF" cellspacing="0" style="width: 120px; margin:0; background-color:#FFF;">
									<tr>
										<td style="width:60px">
											<span>THURSDAY</span>
											<img src="<?=bloginfo('stylesheet_directory')?>/static/img/weather/<?=$weather[3]['image']?>.png" />
										</td>
										<td>
											<?=$weather[3]['high']?>&deg;
											<br />
											High
											<br />
											<?=$weather[3]['low']?>&deg;
											<br />
											Low
										</td>
									</tr>
								</table>
							</td>
							<td style="width:120px;">
								<table width="120" border="0" align="center" cellpadding="0" bgcolor="#FFF" cellspacing="0" style="width: 120px; margin:0; background-color:#FFF;">
									<tr>
										<td style="width:60px">
											<span>FRIDAY</span>
											<img src="<?=bloginfo('stylesheet_directory')?>/static/img/weather/<?=$weather[4]['image']?>.png" />
										</td>
										<td>
											<?=$weather[4]['high']?>&deg;
											<br />
											High
											<br />
											<?=$weather[4]['low']?>&deg;
											<br />
											Low
										</td>
									</tr>
								</table>
							</td>
						</tr>
					</table>
			</tr>
		</table>
	</body>
</html>