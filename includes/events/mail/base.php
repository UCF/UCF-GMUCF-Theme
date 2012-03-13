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
		<title>This Week<?=($edition === EVENTS_WEEKEND_EDITION ? 'end' :'')?> at UCF</title>
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
				<div style="background-color:beige;text-align:center;font-size:16px;border-left:1px solid #333;border-right:1px solid #333;border-bottom:1px solid #333;padding:10px;margin-left:">
					Submit feedback to <a style="color:blue" href="mailto:webcom@ucf.edu?subject=GMUCF%20<?=$edition == EVENTS_WEEKEND_EDITION ? 'Weekend' : 'Weekday'?>%20Events%20Feedback">webcom@ucf.edu</a>
				</div>
			</tr>
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
			<?
			// Use includes here instead of get_template_part
			// to preserve scope.
			switch($edition) {
				case EVENTS_WEEKDAY_EDITION:
					include('weekday-weather.php');
					include('weekday-events.php');
					break;
				case EVENTS_WEEKEND_EDITION:
					include('weekend-weather.php');
					include('weekend-events.php');
					break;
			}
			?>
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