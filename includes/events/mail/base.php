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
				<td style="padding-top:30px;font-size:25px;font-weight:200;">
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
				<td>
					<div class="clear">&nbsp;</div>
					<? $weather = get_extended_weather(); ?>
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
											<img src="<?=bloginfo('stylesheet_directory')?>/static/img/weather/<?=$weather[4]['image']?>.png" />
										</td>
										<td>
											<span style="font-size:18px;font-weight:bold"><?=$weather[4]['high']?>&deg;</span>
											<br />
											<span style="font-size:12px;">High</span>
											<br />
											<span style="font-size:18px;font-weight:bold"><?=$weather[4]['low']?>&deg;</span>
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
			<? for($i = 0; $i < count($days); $i++) { 
					$day       = $days[$i];
					$title     = 'Today';
					$event_day = 'Monday';
					switch($i) {
						case 1:
							$title     = 'Tomorrow';
							$event_day = 'Tuesday';
							break;
						case 2:
							$title = $event_day = 'Wednesday';
							break;
						case 3:
							$title = $event_day = 'Thursday';
							break;
						case 4:
							$title = $event_day = 'Friday';
							break;
					}
					$title_date = date_add($start_date, new DateInterval('P0Y'.$i.'DT0H0M'));
			?>
			<tr>
				<td style="border-top:1px solid #ddd;padding-top:35px;padding-bottom:35px;">
					<span style="font-size:25px;font-weight:500;padding-right:15px;"><?=$title?>, <?=date('n/j', $title_date->getTimestamp())?></span>&nbsp;&nbsp;&nbsp;&nbsp;<a href="http://www.google.com" style="font-size:15px;color:#9d1a1a;">View all <?=$event_day?> events</a>
					<br /><br />
					<table width="600" border="0" align="center" cellpadding="0" bgcolor="#FFF" cellspacing="0" style="width: 600px; margin:0; background-color:#FFF;">
						<tr>
							<td style="width:200px;border-right:1px solid #ddd;vertical-align:top;padding-right:15px;">
								<span style="color:#1c658e;font-size:15px;font-weight:500;">MORNING</span>
								<br /><br />
								<? if(count($day['morning']) == 0){ ?>
								No Morning Events
								<? } else { ?>
									<? foreach($day['morning'] as $section=>$events){ ?>
										<div style="list-style-type:none;margin-bottom:5px;">
											<span style="color:#9d1a1a;font-weight:bold;font-size:12px;">
												<?=($section == '12:00 AM' ? 'Ongoing' : $section)?>
											</span>	
											<? foreach($events as $event){ ?>
											<div style="list-style-type:none;margin-bottom:15px;">
												<a href="<?=EVENTS_URL.'?eventdatetime_id='.$event->id?>" style="font-size:15px;color:#000000;text-decoration:underline;">
													<?=esc_html($event->title)?>
												</a>
											</div>
											<? } ?>
										</div>
									<? } ?>
								<? } ?>
							</td>
							<td style="width:200px;border-right:1px solid #ddd;padding-left:15px;vertical-align:top;padding-right:15px;">
								<span style="color:#1c658e;font-size:15px;font-weight:500;">AFTERNOON</span>
								<br /><br />
								<? if(count($day['afternoon']) == 0){ ?>
								No Afternoon Events
								<? } else { ?>
									<? foreach($day['afternoon'] as $section=>$events){ ?>
										<div style="list-style-type:none;margin-bottom:5px;">
											<span style="color:#9d1a1a;font-weight:bold;font-size:12px;">
												<?=($section == '12:00 AM' ? 'Ongoing' : $section)?>
											</span>	
											<? foreach($events as $event){ ?>
											<div style="list-style-type:none;margin-bottom:15px;">
												<a href="<?=EVENTS_URL.'?eventdatetime_id='.$event->id?>" style="font-size:15px;color:#000000;text-decoration:underline;">
													<?=esc_html($event->title)?>
												</a>
											</div>
											<? } ?>
										</div>
									<? } ?>
								<? } ?>
							</td>
							<td style="width:200px;padding-left:15px;vertical-align:top;">
								<span style="color:#1c658e;font-size:15px;font-weight:500;">EVENING</span>
								<br  /><br />
								<? if(count($day['evening']) == 0){ ?>
								No Evening Events
								<? } else { ?>
									<? foreach($day['evening'] as $section=>$events){ ?>
										<div style="list-style-type:none;margin-bottom:5px;">
											<span style="color:#9d1a1a;font-weight:bold;font-size:12px;">
												<?=($section == '12:00 AM' ? 'Ongoing' : $section)?>
											</span>	
											<? foreach($events as $event){ ?>
											<div style="list-style-type:none;margin-bottom:15px;">
												<a href="<?=EVENTS_URL.'?eventdatetime_id='.$event->id?>" style="font-size:15px;color:#000000;text-decoration:underline;">
													<?=esc_html($event->title)?>
												</a>
											</div>
											<? } ?>
										</div>
									<? } ?>
								<? } ?>
							</td>
						</tr>
					</table>
				</td>
			</tr>
			<? } ?>
			<tr>
				<td style="padding-top:30px;">
					<table width="600" border="0" align="center" cellpadding="0" bgcolor="#FFF" cellspacing="0" style="width: 600px; margin:0 auto; background-color:#FFF;padding-top:15px;border-top:1px solid #ddd;padding-bottom:15px;">
						<tr>
							<td style="width:360px;vertical-align:top;">
								<table border="0" align="left" cellpadding="0" bgcolor="#FFF" cellspacing="0" style="margin:0; background-color:#FFF;">
									<tr>
										<td colspan="3" style="font-size:22px;font-weight:100;padding-bottom:3px;">
											Get Social:
										</td>
									</tr>
									<tr>
										<td>
											<a href="http://www.facebook.com/ucf/" style="text-decoration:none;">
												<img style="border:0;" src="<?=bloginfo('stylesheet_directory')?>/static/img/facebook.png" />
											</a>
										</td>
										<td style="padding-left:10px;">
											<a href="http://www.youtube.com/user/UCF/" style="text-decoration:none;">
												<img style="border:0;" src="<?=bloginfo('stylesheet_directory')?>/static/img/youtube.png" />
											</a>
										</td>
										<td style="padding-left:10px;">
											<a href="http://www.twitter.com/UCF/" style="text-decoration:none;">
												<img style="border:0;" src="<?=bloginfo('stylesheet_directory')?>/static/img/twitter.png" />
											</a>
										</td>
									</tr>
								</table>
							</td>
							<td style="width:230px;padding-left:40px;vertical-align:top;">
								<a href="http://www.ucf.edu">
									<img src="<?=bloginfo('stylesheet_directory')?>/static/img/logo-no-opportunity.png" style="border:0"/>
								</a>
								<p style="line-height:1.4em;font-size:15px;margin:0;padding:0;">
									4000 Central Florida Blvd.
									<br />
									Orlando, FL 32816
									<br />
									407 823 2000
								</p>
							</td>
						</tr>
					</table>
				</td>
			</tr>
		</table>
	</body>
</html>