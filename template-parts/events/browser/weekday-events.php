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
<div class="day">
	<h2><?php echo $title; ?>, <?php echo $title_date->format( 'n/j' ); ?> <a href="<?php echo $all_events_link; ?>" style="font-size:15px;color:#9d1a1a;">View all <?php echo $event_day; ?> events</a></h2>
	<div class="morning">
		<h3>Morning</h3>
		<?php if ( count( $day['morning'] ) === 0 ) : ?>
			No Morning Events
		<?php else : ?>
			<?php foreach ( $day['morning'] as $section => $events ) : ?>
				<div style="list-style-type:none;margin-bottom:5px;">
					<span style="color:#9d1a1a;font-weight:bold;font-size:12px;">
						<?php echo ( $section === '12:00 AM' ? 'All Day' : $section ); ?>
					</span>
					<?php foreach ( $events as $event ) : ?>
						<div style="margin-bottom:15px;color:blue;">
							<a href="<?php echo $event->url; ?>" style="font-size:15px;color:#222222;text-decoration:underline;">
								<?php echo esc_html( $event->title ); ?>
							</a>
						</div>
					<?php endforeach; ?>
				</div>
			<?php endforeach; ?>
		<?php endif; ?>
	</div>
	<div class="afternoon">
		<h3>Afternoon</h3>
		<?php if ( count( $day['afternoon'] ) === 0 ) : ?>
			No Afternoon Events
		<?php else : ?>
			<?php foreach ( $day['afternoon'] as $section => $events ) : ?>
				<div style="list-style-type:none;margin-bottom:5px;">
					<span style="color:#9d1a1a;font-weight:bold;font-size:12px;">
						<?php echo ( $section === '12:00 AM' ? 'All Day' : $section ); ?>
					</span>
					<?php foreach ( $events as $event ) : ?>
						<div style="margin-bottom:15px;color:blue;">
							<a href="<?php echo $event->url; ?>" style="font-size:15px;color:#222222;text-decoration:underline;">
								<?php echo esc_html( $event->title ); ?>
							</a>
						</div>
					<?php endforeach; ?>
				</div>
			<?php endforeach; ?>
		<?php endif; ?>
	</div>
	<div class="evening">
		<h3>Evening</h3>
		<?php if ( count( $day['evening'] ) === 0 ) : ?>
		No Evening Events
		<?php else : ?>
			<?php foreach ( $day['evening'] as $section => $events ) : ?>
				<div style="list-style-type:none;margin-bottom:5px;">
					<span style="color:#9d1a1a;font-weight:bold;font-size:12px;">
						<?php echo ( $section === '12:00 AM' ? 'Ongoing' : $section ); ?>
					</span>
					<?php foreach ( $events as $event ) : ?>
						<div style="margin-bottom:15px;color:blue;">
							<a href="<?php echo $event->url; ?>" style="font-size:15px;color:#222222;text-decoration:underline;">
								<?php echo esc_html( $event->title ); ?>
							</a>
						</div>
					<?php endforeach; ?>
				</div>
			<?php endforeach; ?>
		<?php endif; ?>
	</div>
	<div style="clear:left">&nbsp;</div>
</div>
<?php endfor; ?>
