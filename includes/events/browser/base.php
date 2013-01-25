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
<!DOCTYPE HTML>
<html>
	<head>
		<meta http-equiv="Content-Type" content="text/html;charset=UTF-8">
		<title>This Week<?=($edition === EVENTS_WEEKEND_EDITION ? 'end' :'')?> @ UCF</title>
		<style type="text/css">
			body {width:600px;margin:15px auto;font-family:"Helvetica Neue",Helvetica,sans-serif;font-weight:200;}
			
			#feedback {text-align: center;margin-bottom:25px;}
			
			#shoutout {font-size:30px;}
			
			h1 {font-weight:200;font-size:37px;border-bottom:1px solid #ddd;}
			h1 .highlight {color:#FFC907;font-weight:bold;}
			h1 .range {float:right;}

			.weather {border-bottom:1px solid #ddd;}
			.weather .day {float:left;border-left:1px solid #ddd;width:110px;padding-left:11px;}
			.weather .day:first-child {border-left:none;padding-left:0;}
			.weather .day h2 {font-size:10px;font-weight:bold;margin:0;text-transform:uppercase;}
			.weather .day .day-image {float:left;}
			.weather .day .temp {font-size:12px;}
			.weather .day .temp strong {font-size:18px;}
			#weekend-weather .day {width:141px;}
			#weekend-weather .temp {padding-left:95px;}

			#events .day {clear:left;padding-bottom:30px;border-bottom:1px solid #DDD;}
			#events .day h2 {font-weight:500;font-size:25px;margin-bottom:0;}
			#events .day h2 a {font-size:15px;color:#9d1a1a;text-decoration:none;padding-left:15px;}
			#events .day h3 {color:#1C658E;font-size:15px;font-weight:500;text-transform:uppercase;margin-top:0;}
			#events .morning,
			#events .afternoon,
			#events .evening {width:179px;float:left;border-left:1px solid #DDD;padding-left:15px;padding-right:15px;margin-top:20px;}
			#events .morning {border-left:none;padding-left:0;}
			#events .evening {padding-right:0;}

			#upcoming-submit {text-align:center;margin-top:25px;margin-bottom:25px;font-size:23px;}
			#upcoming-submit a {color:#a42929;}
			#upcoming-submit a:last-child {font-size:14px;}

			/* Bottom */
			#bottom {clear:both;border-top:1px solid #ddd;}
			#bottom #social,
				#bottom #ucf {border:none;padding:0;}
			#bottom #social {float:left;}
			#bottom #social h2 {font-family:Helvetica,sans-serif;font-weight:100;margin-bottom:5px;}
			#bottom #social a {text-indent:-300em;width:51px;height:51px;display:block;float:left;margin-left:10px;}
			#bottom #social #facebook {background:#FFF url('<?=bloginfo('stylesheet_directory')?>/static/img/facebook.png') no-repeat center center;margin-left:0;}
			#bottom #social #youtube {background:#FFF url('<?=bloginfo('stylesheet_directory')?>/static/img/youtube.png') no-repeat center center;}
			#bottom #social #twitter {background:#FFF url('<?=bloginfo('stylesheet_directory')?>/static/img/twitter.png') no-repeat center center;}
			#bottom #ucf {
				display:block;
				background:#FFF url('<?=bloginfo('stylesheet_directory')?>/static/img/logo-no-opportunity.png') no-repeat top left;
				text-decoration:none;padding-top:61px;
				float:right;
				color:#333;
				margin-top:20px;
				line-height: 1.5em;
				font-size:13px;
			}

			/* Footer */
			#footer {display:none;}
		</style>
		<script type="text/javascript" src="https://ajax.googleapis.com/ajax/libs/jquery/1.8.3/jquery.min.js"></script>
		<script type="text/javascript">
			$().ready(function() {
				$('.day')
					.each(function(index, day) {
						var day       = $(day),
							morning   = day.find('.morning'),
							afternoon = day.find('.afternoon'),
							evening   = day.find('.evening'),
							height    = Math.max(morning.height(), afternoon.height(), evening.height());
						morning.height(height);
						afternoon.height(height);
						evening.height(height);
					});
			});
		</script>
	</head>
	<body>
		<div id="feedback">Send us your <a href="http://atucf.smca.ucf.edu/feedback">comments &amp; feedback</a></div>
		<div id="shoutout">UCF, check out:</div>
		<h1>
			This Week<?=($edition === EVENTS_WEEKEND_EDITION ? 'end' :'')?> @ <span class="highlight">UCF</span>
			<span class="range">
				<?=date('n/j', $start_date->getTimestamp()).'-'.date('n/j', $end_date->getTimestamp())?>
			</span>
		</h1>
		<?
		// Use includes here instead of get_template_part
		// to preserve scope.
		switch($edition) {
			case EVENTS_WEEKDAY_EDITION:
				include('weekday-weather.php');
				break;
			case EVENTS_WEEKEND_EDITION:
				include('weekend-weather.php');
				break;
		}
		?>
		<div id="events">
		<?
		// Use includes here instead of get_template_part
		// to preserve scope.
		switch($edition) {
			case EVENTS_WEEKDAY_EDITION:
				include('weekday-events.php');
				break;
			case EVENTS_WEEKEND_EDITION:
				include('weekend-events.php');
				break;
		}
		?>
		</div>
		<div id="upcoming-submit">
			To see all upcoming events visit <a href="http://events.ucf.edu/?upcoming=true">http://events.ucf.edu</a><br />
			<a href="https://eventsadmin.smca.ucf.edu/">Submit an event to the UCF Events Calendar</a>
		</div>
		<div id="bottom">
			<div id="social">
				<h2>Get Social</h2>
				<a id="facebook" class="ignore-external" href="http://www.facebook.com/ucf/">UCF on Facebook</a>
				<a id="youtube" class="ignore-external" href="http://www.youtube.com/user/UCF/">UCF on Youtube</a>
				<a id="twitter" class="ignore-external" href="http://www.twitter.com/UCF/">UCF on Twitter</a>
			</div>
			<a id="ucf" href="http://www.ucf.edu" class="ignore-external">
				4000 Central Florida Blvd.
				<br />
				Orlando, FL 32816
				<br />
				407.823.2000
			</a>
			<div style="clear:both;">
				<a class="ignore-external" href="http://www.wunderground.com/?apiref=360d941adbeaa2a1">
				<span style="font-size: 10px;color:#000000;">Weather data provided by wunderground.com</span><br/>
				<img src="<?=bloginfo('stylesheet_directory')?>/static/img/weather-logo.gif" alt="Wunderground.com" title="Wunderground.com" />
				</a>
			</div>
		</div>
	</body>
</html>