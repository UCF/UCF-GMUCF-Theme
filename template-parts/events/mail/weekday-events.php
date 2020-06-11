<?php
for ( $i = 0; $i < count( $days ); $i++ ) :
	$day       = $days[$i];
	$title     = 'Today';
	$event_day = 'Monday';
	switch( $i ) {
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

	$title_date      = $start_date->add( date_interval_create_from_date_string( $i . ' days' ) );
	$all_events_link = get_option( 'events_url' ) . $title_date->format( 'Y/n/j/' );
?>
<tr>
	<td class="ccollapse100p" style="border-top:1px solid #ddd;padding-top:35px;padding-bottom:35px;">
		<span class="event-date" style="font-size:25px;font-weight:500;padding-right:15px;"><?php echo $title; ?>, <?php echo $title_date->format( 'n/j' ); ?></span>&nbsp;&nbsp;&nbsp;&nbsp;<a class="view-day-events" href="<?php echo $all_events_link; ?>" style="font-size:15px;color:#9d1a1a;">View all <?php echo $event_day; ?> events</a>
		<br class="linebreak" /><br class="linebreak" />
		<table class="t600" width="600" border="0" align="center" cellpadding="0" bgcolor="#FFF" cellspacing="0" style="width: 600px; margin:0; background-color:#FFF;">
			<tr>
				<td class="ccollapse100pb" style="width:200px;border-right:1px solid #ddd;vertical-align:top;padding-right:15px;">
					<span class="time-group-header" style="color:#1c658e;font-size:15px;font-weight:500;">MORNING</span>
					<br class="linebreak" /><br class="linebreak" />
					<?php if ( count( $day['morning'] ) === 0 ) : ?>
					<span class="fallback-event-msg">No Morning Events</span>
					<?php else : ?>
						<?php foreach ( $day['morning'] as $section => $events ) : ?>
							<div style="list-style-type:none;margin-bottom:5px;">
								<span class="time" style="color:#9d1a1a;font-weight:bold;font-size:12px;">
									<?php echo ( $section === '12:00 AM' ? 'All Day' : $section ); ?>
								</span>
								<?php foreach ( $events as $event ) : ?>
									<div class="event" style="margin-bottom:15px;color:blue;">
										<a class="event-link" href="<?php echo $event->url; ?>" style="font-size:15px;color:#222222;text-decoration:underline;">
											<?php echo esc_html( $event->title ); ?>
										</a>
									</div>
								<?php endforeach; ?>
							</div>
						<?php endforeach; ?>
					<?php endif; ?>
				</td>
				<td class="ccollapse100pb" style="width:200px;border-right:1px solid #ddd;padding-left:15px;vertical-align:top;padding-right:15px;">
					<span class="time-group-header" style="color:#1c658e;font-size:15px;font-weight:500;">AFTERNOON</span>
					<br class="linebreak" /><br class="linebreak" />
					<?php if ( count( $day['afternoon'] ) === 0 ) : ?>
					<span class="fallback-event-msg">No Afternoon Events</span>
					<?php else : ?>
						<?php foreach ( $day['afternoon'] as $section => $events ) : ?>
							<div style="list-style-type:none;margin-bottom:5px;">
								<span class="time" style="color:#9d1a1a;font-weight:bold;font-size:12px;">
									<?php echo ( $section === '12:00 AM' ? 'All Day' : $section ); ?>
								</span>
								<?php foreach ( $events as $event ) : ?>
								<div class="event" style="margin-bottom:15px;color:blue;">
									<a class="event-link" href="<?php echo $event->url; ?>" style="font-size:15px;color:#222222;text-decoration:underline;">
										<?php echo esc_html( $event->title ); ?>
									</a>
								</div>
								<?php endforeach; ?>
							</div>
						<?php endforeach; ?>
					<?php endif; ?>
				</td>
				<td class="ccollapse100" style="width:200px;padding-left:15px;vertical-align:top;">
					<span class="time-group-header" style="color:#1c658e;font-size:15px;font-weight:500;">EVENING</span>
					<br class="linebreak" /><br class="linebreak" />
					<?php if ( count( $day['evening'] ) === 0 ) : ?>
					<span class="fallback-event-msg">No Evening Events</span>
					<?php else : ?>
						<?php foreach ( $day['evening'] as $section => $events ) : ?>
							<div style="list-style-type:none;margin-bottom:5px;">
								<span class="time" style="color:#9d1a1a;font-weight:bold;font-size:12px;">
									<?php echo ( $section === '12:00 AM' ? 'Ongoing' : $section ); ?>
								</span>
								<?php foreach ( $events as $event ) : ?>
								<div class="event" style="margin-bottom:15px;color:blue;">
									<a class="event-link" href="<?php echo $event->url; ?>" style="font-size:15px;color:#222222;text-decoration:underline;">
										<?php echo esc_html( $event->title ); ?>
									</a>
								</div>
								<?php endforeach; ?>
							</div>
						<?php endforeach; ?>
					<?php endif; ?>
				</td>
			</tr>
		</table>
	</td>
</tr>
<?php endfor; ?>
