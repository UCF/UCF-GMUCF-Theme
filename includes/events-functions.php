<?php
/**
 * Functions related to event feed retrieval and display
 * in the This Week/end @ UCF emails
 */
namespace GMUCF\Theme\Includes\Events;
use GMUCF\Theme\Includes\Utilities;


/**
 * Compare events based on start time
 *
 * @return integer
 * @author Chris Conover
 **/
function compare_event_starts($a, $b) {
	// Just take into account the time part of the start date time.
	// Otherwise events that are ongoing would be put in front.
	$a_parts = explode(' ', $a->starts);
	$b_parts = explode(' ', $b->starts);
	$a_start = strtotime($a_parts[4]);
	$b_start = strtotime($b_parts[4]);
	if($a_start == $b_start) {
		return 0;
	} else {
		return ($a_start > $b_start) ? +1 : -1;
	}
}


/**
 * Fetch events from UCF event system (with caching)
 *
 * @return array
 * @author Chris Conover
 **/
function get_event_data($options = array())
{
	$cache_key_prefix = 'events-';
	$default_options = array(
		'calendar_id' => get_option( 'events_calendar_id' ),
		'per_page'    => get_option( 'events_limit' ),
		'format'      => 'json');

	$options = array_merge($default_options, $options);

	$cache_key = $cache_key_prefix.implode('', $options);

	if(CLEAR_CACHE || ($events = get_transient($cache_key)) === False) {
		$events = array();

		$url = get_option( 'events_url' ) . $options['y'].'/'.$options['m'].'/'.$options['d'].'/feed.json';

		$params = array(
			'per_page' => $options['per_page']
		);

		$url .= '?' . http_build_query( $params );

		$ch = curl_init($url);
		curl_setopt($ch, CURLOPT_AUTOREFERER, TRUE);
		curl_setopt($ch, CURLOPT_HEADER, 0);
		curl_setopt($ch, CURLOPT_TIMEOUT, get_option( 'events_timeout' ));
		curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
		curl_setopt($ch, CURLOPT_FOLLOWLOCATION, TRUE);

		$raw_events = curl_exec($ch);

		if( $raw_events !== FALSE ) {
			if( !is_null($json_events = json_decode($raw_events)) ) {
				$events = $json_events;
			}
		} else {
			error_log('Curl error in GMUCF theme - get_event_data ('.$url.'): '.curl_error($ch), 0);
		}

		curl_close($ch);

		// Events aren't neccessarily sorted from earliest to latest start time
		usort($events, __NAMESPACE__ . '\compare_event_starts');

		if(isset($options['limit']) && count($events) > $options['limit']) {
			$events = array_slice($events, 0, $options['limit']);
		}

		set_transient($cache_key, $events, get_option( 'events_cache_duration' ));
	}
	return $events;
}


/**
 * Wraps get_event_data and returns today's events
 *
 * @return array
 * @author Chris Conover
 **/
function get_todays_events($options = array()) {
	$date = getdate();
	$options = array_merge($options,array('y'=>$date['year'], 'm'=>$date['mon'], 'd'=>$date['mday']));
	return get_event_data($options);
}


/**
 * Wraps get_event_data and returns tomorrow's events
 *
 * @return array
 * @author Chris Conover
 **/
function get_tomorrows_events($options = array()) {
	$tomorrow = date_add((new \DateTime()), new \DateInterval('P0Y1DT0H0M'));
	$date = getdate($tomorrow->getTimestamp());
	$options = array_merge($options,array('y'=>$date['year'], 'm'=>$date['mon'], 'd'=>$date['mday']));
	return get_event_data($options);
}


/**
 * Returns the events HTML
 *
 * @return string
 * @author RJ Bruneel
 **/
function display_events($events) {
	$count = 0;
	ob_start();
		?>
		<ul>
		<?php
		foreach($events as $event) :
			if($count == 7) break;
			$start_timestamp = strtotime($event->starts);
		?>
			<li>
				<?php echo date('g:i', $start_timestamp) . date('A', $start_timestamp); ?>
				<a href="<?php echo $event->url?>">
					<?php echo esc_html($event->title); ?>
				</a>
			</li>
		<?php
			$count++;
		endforeach;
		?>
		</ul>
		<?php
	return ob_end_flush();
}


/**
 * Which edition of the events should be displayed
 *
 * @return integer constant
 * @author Chris Conover
 **/
function get_events_edition() {
	$dw = date('w');
	if($dw == 1) {
		return EVENTS_WEEKDAY_EDITION;
	} else if($dw == 5) {
		return EVENTS_WEEKEND_EDITION;
	} else {
		return False;
	}
}


/**
 * Utilizes event_get_data to fetch the date range
 * and events for the next weekday edition of the event
 * version starting from the nearest monday going forward
 *
 * @return array
 * @author Chris Conover
 **/
function get_weekday_events($options = array()) {
	$days = array();

	// Today might not be Monday
	$day_diff = Utilities\get_next_monday_diff();

	// Fetch the events for Monday through Friday
	$start_date = NULL;
	$end_date   = NULL;
	for($i = 0; $i < 5; $i++) {
		$date = date_add((new \DateTime()), new \DateInterval('P0Y'.($day_diff + $i).'DT0H0M'));

		if($i == 0) {
			$start_date = $date;
		} else if($i == 4) {
			$end_date = $date;
		}

		$date_parts  = getdate($date->getTimestamp());
		$options     = array_merge($options,array('y'=>$date_parts['year'], 'm'=>$date_parts['mon'], 'd'=>$date_parts['mday']));
		array_push($days, get_event_data($options));
	}

	// Organize the events by half our interval
	$organized_days = array();
	foreach($days as $day) {
		$organized_day = array('morning'=>array(),'afternoon'=>array(),'evening'=>array());
		foreach($day as $event) {
			$start_timestamp = strtotime($event->starts);
			$start_hour      = (int)date('G', $start_timestamp);

			$part = date('g:i A', $start_timestamp);

			if($start_hour < 12) {
				$section = 'morning';
			} else if($start_hour >= 12 && $start_hour < 18) {
				$section = 'afternoon';
			} else if($start_hour >= 18) {
				$section = 'evening';
			}

			if(isset($organized_day[$section][$part])) {
				array_push($organized_day[$section][$part], $event);
			} else {
				$organized_day[$section][$part] = array($event);
			}
		}
		array_push($organized_days, $organized_day);
	}
	return array('days'=>$organized_days, 'start_date'=>$start_date, 'end_date'=>$end_date);
}


/**
 * Utilizes event_get_data to fetch the date range
 * and events for the next weekend edition of the event
 * version starting from the nearest monday going forward
 *
 * @return array
 * @author Chris Conover
 **/
function get_weekend_events($options = array()) {
	$days = array();

	// Today might not be Friday
	$day_diff = Utilities\get_next_friday_diff();

	// Fetch the events for Monday through Friday
	$start_date = NULL;
	$end_date   = NULL;
	for($i = 0; $i < 4; $i++) {
		$date = date_add((new \DateTime()), new \DateInterval('P0Y'.($day_diff + $i).'DT0H0M'));

		if($i == 0) {
			$start_date = $date;
		} else if($i == 3) {
			$end_date = $date;
		}

		$date_parts  = getdate($date->getTimestamp());
		$options     = array_merge($options,array('y'=>$date_parts['year'], 'm'=>$date_parts['mon'], 'd'=>$date_parts['mday']));
		array_push($days, get_event_data($options));
	}

	// Organize the events by half our interval
	$organized_days = array();
	foreach($days as $day) {
		$organized_day = array('morning'=>array(),'afternoon'=>array(),'evening'=>array());
		foreach($day as $event) {
			$start_timestamp = strtotime($event->starts);
			$start_hour      = (int)date('G', $start_timestamp);

			$part = date('g:i A', $start_timestamp);

			if($start_hour < 12) {
				$section = 'morning';
			} else if($start_hour >= 12 && $start_hour < 18) {
				$section = 'afternoon';
			} else if($start_hour >= 18) {
				$section = 'evening';
			}

			if(isset($organized_day[$section][$part])) {
				array_push($organized_day[$section][$part], $event);
			} else {
				$organized_day[$section][$part] = array($event);
			}
		}
		array_push($organized_days, $organized_day);
	}
	return array('days'=>$organized_days, 'start_date'=>$start_date, 'end_date'=>$end_date);
}
