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
		<title>This Week<?=($edition === EVENTS_WEEKEND_EDITION ? 'end' :'')?> at UCF</title>
		<style type="text/css">

		</style>
	</head>
	<body>
		<div class="shoutout">!@!Preferred Name!@!, check out:</div>
		<h1>
			This Week<?=($edition === EVENTS_WEEKEND_EDITION ? 'end' :'')?> at UCF
			<span class="range">
				<?=date('n/j', $start_date->getTimestamp()).'-'.date('n/j', $end_date->getTimestamp())?>
			</span>
		</h1>
		<ul class="weather">

		</ul>
		<ul class="events">

		</ul>
	</body>
</html>