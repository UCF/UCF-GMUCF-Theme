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
function get_event_data($options = array()) {
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
function get_todays_events( $options=array() ) {
	$today = current_datetime();
	$options = array_merge(
		$options,
		array(
			'y' => $today->format( 'Y' ),
			'm' => $today->format( 'n' ),
			'd' => $today->format( 'j' )
		)
	);
	return get_event_data( $options );
}


/**
 * Wraps get_event_data and returns tomorrow's events
 *
 * @return array
 * @author Chris Conover
 **/
function get_tomorrows_events( $options = array() ) {
	$tomorrow = current_datetime()->add( date_interval_create_from_date_string( '1 day' ) );
	$options = array_merge(
		$options,
		array(
			'y' => $today->format( 'Y' ),
			'm' => $today->format( 'n' ),
			'd' => $today->format( 'j' )
		)
	);
	return get_event_data( $options );
}


/**
 * Which edition of the events should be displayed
 *
 * @return integer constant
 * @author Chris Conover
 **/
function get_events_edition() {
	$dw = wp_date( 'w' );
	if ( $dw === 1 ) {
		return EVENTS_WEEKDAY_EDITION;
	} else if ( $dw === 5 ) {
		return EVENTS_WEEKEND_EDITION;
	} else {
		return false;
	}
}


/**
 * Utilizes event_get_data to fetch the date range
 * and events for the next weekday edition of the event
 * version starting from the nearest monday going forward
 *
 * @author Jo Dickson
 * @param array $options Options to pass to `get_event_data()`
 * @return array Event data grouped by day + time of day
 **/
function get_weekday_events( $options=array() ) {
	$day_start = Utilities\get_next_monday_diff(); // Today might not be Monday
	$num_days = 5;
	return get_events_range( $options, $day_start, $num_days );
}


/**
 * Utilizes event_get_data to fetch the date range
 * and events for the next weekend edition of the event
 * version starting from the nearest monday going forward
 *
 * @author Jo Dickson
 * @param array $options Options to pass to `get_event_data()` for each day
 * @return array Event data grouped by day + time of day
 **/
function get_weekend_events( $options=array() ) {
	$day_start = Utilities\get_next_friday_diff(); // Today might not be Friday
	$num_days = 4;
	return get_events_range( $options, $day_start, $num_days );
}


/**
 * Returns a grouped range of events based on a start date
 * and number of days' worth of events to retrieve.
 *
 * @since 3.0.0
 * @author Chris Conover, Jo Dickson
 * @param array $options Options to pass to `get_event_data()` for each day
 * @param int $day_start Numeric representation of the day of the week to start retrieving events for
 * @param int $num_days The number of days to retrieve events for
 * @return array Event data grouped by day + time of day
 */
function get_events_range( $options=array(), $day_start=1, $num_days=5 ) {
	$days      = array();
	$day_limit = $num_days - 1;

	// Fetch the events for the given range of days
	$start_date = null;
	$end_date   = null;

	for ( $i = 0; $i <= $day_limit; $i++ ) {
		$date = current_datetime()->add(
			date_interval_create_from_date_string( ( $day_start + $i ) . ' days' )
		);

		if ( $i === 0 ) {
			$start_date = $date;
		} else if ( $i === $day_limit ) {
			$end_date = $date;
		}

		$options = array_merge(
			$options,
			array(
				'y' => $date->format( 'Y' ),
				'm' => $date->format( 'n' ),
				'd' => $date->format( 'j' )
			)
		);
		array_push( $days, get_event_data( $options ) );
	}

	// Organize the events by half hour interval
	$organized_days = array();

	foreach ( $days as $day ) {
		$organized_day = array(
			'morning'   => array(),
			'afternoon' => array(),
			'evening'   => array()
		);

		foreach ( $day as $event ) {
			$start      = date_create_from_format( DATE_RFC2822, $event->starts );
			$start_hour = (int)$start->format( 'G' );
			$part       = $start->format( 'g:i A' );

			if ( $start_hour < 12 ) {
				$section = 'morning';
			} else if ( $start_hour >= 12 && $start_hour < 18 ) {
				$section = 'afternoon';
			} else if ( $start_hour >= 18 ) {
				$section = 'evening';
			}

			if ( isset( $organized_day[$section][$part] ) ) {
				array_push( $organized_day[$section][$part], $event );
			} else {
				$organized_day[$section][$part] = array( $event );
			}
		}

		array_push( $organized_days, $organized_day );
	}

	return array(
		'days'       => $organized_days,
		'start_date' => $start_date,
		'end_date'   => $end_date
	);
}
