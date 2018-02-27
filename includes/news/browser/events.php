<div id="todays_events">
	<h2>Today @ UCF</h2>
	<?
	$todays_events = get_todays_events(array('limit'=>7));
	if(count($todays_events) == 0) { ?>
		<p>There are no events today.</p>
	<? } else { ?>
	<ul class="events">
	<?	foreach($todays_events as $event) {
			$start_timestamp = strtotime($event->starts);
		?>
			<li class="clear clearfix">
				<div class="date">
					<span style="font-weight:bold;">
						<?=date('g:i', $start_timestamp)?>
					</span>
					<br />
					<?=date('A', $start_timestamp)?>
				</div>
				<a href="<?=EVENTS_URL.'?eventdatetime_id='.$event->id?>">
					<?=esc_html($event->title)?>
				</a>
			</li>
		<?
		}
	}
	?>
	</ul>
	<div class="clear">&nbsp;</div>
</div>
<div id="tomorrows_events">
	<h2>Tomororw @ UCF</h2>
	<?
	$tomorrows_events = get_tomorrows_events(array('limit'=>7));
	if(count($tomorrows_events) == 0) { ?>
		<p>There are no events today.</p>
	<? } else { ?>
	<ul class="events">
	<?	foreach($tomorrows_events as $event) {
			$start_timestamp = strtotime($event->starts);
		?>
			<li class="clear clearfix">
				<div class="date">
					<span style="font-weight:bold;">
						<?=date('g:i', $start_timestamp)?>
					</span>
					<br />
					<?=date('A', $start_timestamp)?>
				</div>
				<a href="<?=EVENTS_URL.'?eventdatetime_id='.$event->id?>">
					<?=esc_html($event->title)?>
				</a>
			</li>
		<?
		}
	}
	?>
	</ul>
	<div class="clear">&nbsp;</div>
	<a href="https://events.ucf.edu">More Events</a>
</div>
