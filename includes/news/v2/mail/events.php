<h2>Events</h2>

<h3>Today</h3>
<?php
$todays_events = get_todays_events();
if(count($todays_events) == 0) { ?>
	<p>There are no events today.</p>
<?php
} else {
	display_events($todays_events);
}
?>

<h3>Tomorrow</h3>
<?php
$tomorrows_events = get_tomorrows_events();
if(count($tomorrows_events) == 0) { ?>
	<p>There are no events tomorrow.</p>
<?php
} else {
	display_events($tomorrows_events);
}
?>
