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
		$weather = get_weekday_weather();
		break;
	case EVENTS_WEEKEND_EDITION:
		extract(get_weekend_events());
		$weather = get_weekend_weather();
		break;
}
header('Content-type: text/plain');
?>
This Week<?=($edition === EVENTS_WEEKEND_EDITION ? 'end' :'')?> @ UCF

-- Weather

<?php
if ($weather !== NULL) {
	switch($edition) {
		case EVENTS_WEEKDAY_EDITION:
			echo 'Today:     '.$weather[0]['high'].' High, '.$weather[0]['low'].' Low'."\n";
			echo 'Tomorrow:  '.$weather[1]['high'].' High, '.$weather[1]['low'].' Low'."\n";
			echo 'Wednesday: '.$weather[2]['high'].' High, '.$weather[2]['low'].' Low'."\n";
			echo 'Thursday:  '.$weather[3]['high'].' High, '.$weather[3]['low'].' Low'."\n";
			echo 'Friday:    '.$weather[4]['high'].' High, '.$weather[4]['low'].' Low'."\n";
			break;
		case EVENTS_WEEKEND_EDITION:
			echo 'Today:    '.$weather[0]['high'].' High, '.$weather[0]['low'].' Low'."\n";
			echo 'Tomorrow: '.$weather[1]['high'].' High, '.$weather[1]['low'].' Low'."\n";
			echo 'Sunday:   '.$weather[2]['high'].' High, '.$weather[2]['low'].' Low'."\n";
			echo 'Monday:   '.$weather[3]['high'].' High, '.$weather[3]['low'].' Low'."\n";
			break;
	}
}
?>

-- Events

<? 
for($i = 0; $i < count($days); $i++) { 
	$day       = $days[$i];
	$title     = 'Today';

	switch($edition) {
		case EVENTS_WEEKDAY_EDITION:
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
		break;
		case EVENTS_WEEKEND_EDITION:
			switch($i) {
				case 1:
					$title     = 'Tomorrow';
					$event_day = 'Saturday';
					break;
				case 2:
					$title = $event_day = 'Sunday';
					break;
				case 3:
					$title = $event_day = 'Monday';
					break;
			}
		break;
	}

	# date_add modifies the passed object in place. want $start_date to stay the
	# same so make a copy of it.
	# http://www.php.net/manual/en/datetime.add.php#102193
	$_start_date          = new DateTime(date('c', $start_date->getTimestamp()));
	$title_date           = date_add($_start_date, new DateInterval('P'.$i.'D'));
	$title_date_timestamp = $title_date->getTimestamp();
	$all_events_link      = EVENTS_URL.'?y='.date('Y', $title_date_timestamp).'&m='.date('n',$title_date_timestamp).'&d='.date('j', $title_date_timestamp);

	if($i > 0) {
		echo "\n\n\n";
	}
	echo '> '.$title."\n";
	echo '>> Morning'."\n";

	if(count($day['morning']) == 0){
			echo '   No Morning Events'."\n";
	} else {
		foreach($day['morning'] as $section=>$events) {
			echo '   - '.($section == '12:00 AM' ? 'All Day' : $section)."\n";
			foreach($events as $event){
				echo '    '.strip_tags($event->title).' - '.(EVENTS_URL.'?eventdatetime_id='.$event->id)."\n";
			}
		}
	}

	echo '>> Afternoon'."\n";

	if(count($day['afternoon']) == 0){
			echo '   No Afternoon Events'."\n";
	} else {
		foreach($day['afternoon'] as $section=>$events) {
			echo '   - '.($section == '12:00 AM' ? 'All Day' : $section)."\n";
			foreach($events as $event){
				echo '    '.strip_tags($event->title).' - '.(EVENTS_URL.'?eventdatetime_id='.$event->id)."\n";
			}
		}
	}

	echo '>> Evening'."\n";

	if(count($day['evening']) == 0){
			echo '   No Evening Events'."\n";
	} else {
		foreach($day['evening'] as $section=>$events) {
			echo '   - '.($section == '12:00 AM' ? 'All Day' : $section)."\n";
			foreach($events as $event){
				echo '    '.strip_tags($event->title).' - '.(EVENTS_URL.'?eventdatetime_id='.$event->id)."\n";
			}
		}
	}
}
?>


Please submit your comments and feedback to feedback@ucf.edu



Weather data provided by wunderground.com.

