<?php
/**
 * Functions related to weather data retrieval and display
 * in the News & Announcements and This Week/end @ UCF emails
 */
namespace GMUCF\Theme\Includes\Weather;


/**
 * Fetches today/tonight weather, extended weather and stores
 * it as transient data.
 *
 * @since 1.0.10
 * @author Jo Dickson
 * @param string $cache_key Transient key to pull existing cached data from
 * @return array
 */
function get_weather( $cache_key ) {
	$weather   = array();
	$transient = get_transient( $cache_key );

	// Always attempt to re-fetch weather if CLEAR_CACHE is set or if
	// previously stored transient data is bad
	if ( ! CLEAR_CACHE && ! empty( $transient ) ) { // empty() catches `null` or `false`
		$weather = $transient;
	}
	else {
		// Get the url from which weather data is fetched
		switch ( $cache_key ) {
			case 'weather-extended':
				$json_url = get_option( 'weather_service_extended_url' );
				break;
			case 'weather-today':
			default:
				$json_url = get_option( 'weather_service_today_url' );
				break;
		}

		if ( $json_url ) {
			// Setup curl request and execute. Log errors if necessary.

			$dt = microtime();

			$ch = curl_init();
			$options = array(
				CURLOPT_URL            => "$json_url?request_time=$dt",
				CURLOPT_CONNECTTIMEOUT => get_option( 'weather_service_timeout' ),
				CURLOPT_RETURNTRANSFER => true
			);
			curl_setopt_array( $ch, $options );

			$json = curl_exec( $ch );

			if ( $json !== false ) {
				$json = json_decode( $json, true ); // Convert to array
				if ( ! $json['successfulFetch'] || $json['successfulFetch'] !== 'yes' ) {
					$weather = null;
				}
				else {
					if ( $cache_key === 'weather-extended' ) {
						$weather = $json['days'];
					}
					else {
						$weather = $json;
					}
				}
			}
			else {
				$weather = null;
				error_log( 'Curl error in GMUCF theme when fetching weather: ' . curl_error( $ch ), 0 );
			}
			curl_close( $ch );
		}
		else {
			$weather = null;
		}

		set_transient( $cache_key, $weather, get_option( 'weather_service_cache_duration' ) );
	}

	return $weather;
}


/**
 * Translates the weather conditions from our feed
 * to a modern weather icon.
 *
 * @author Jim Barnes
 * @since 1.2.0
 * @param $condition string The human-friendly weather condition name ("condition" value from the weather service)
 * @return string URL for a weather icon
 */
function get_weather_icon( $condition, $night=false ) {
	$icon_name = null;
	$icons_to_conditions = array(
		'day-sunny' => array(
			'fair',
			'default'
		),
		'hot' => array(
			'hot',
			'haze'
		),
		'cloudy' => array(
			'overcast',
			'partly cloudy',
			'mostly cloudy'
		),
		'snowflake-cold' => array(
			'blowing snow',
			'cold',
			'snow'
		),
		'showers' => array(
			'showers',
			'drizzle',
			'mixed rain/sleet',
			'mixed rain/hail',
			'mixed snow/sleet',
			'hail',
			'freezing drizzle'
		),
		'cloudy-gusts' => array(
			'windy'
		),
		'fog' => array(
			'dust',
			'smoke',
			'foggy'
		),
		'storm-showers' => array(
			'scattered thunderstorms',
			'scattered thundershowers',
			'scattered showers',
			'freezing rain',
			'isolated thunderstorms',
			'isolated thundershowers'
		),
		'lightning' => array(
			'tornado',
			'severe thunderstorms'
		)
	);

	$night_icons = array(
		'day-sunny' => 'night-clear',
		'hot' => 'night-clear',
		'cloudy' => 'night-cloudy',
		'snowflake-cold' => 'night-snow',
		'showers' => 'night-showers',
		'cloudy-gusts' => 'night-cloudy-gusts',
		'fog' => 'night-fog',
		'storm-showers' => 'night-storm-showers',
		'lightning' => 'night-lightning'
	);

	$condition = strtolower( $condition );

	foreach( $icons_to_conditions as $icon => $condition_array ) {
		if ( in_array( $condition, $condition_array ) ) {
			$icon_name = $icon;
		}
	}

	$icon_name = $icon_name ? $icon_name : 'day-sunny';

	if ( $night ) {
		$icon_name = $night_icons[$icon_name];
	}

	return GMUCF_THEME_IMG_URL . '/weather/' . $icon_name . '.png';
}


/**
 * Returns a "classic" weather icon based on the provided
 * weather status image code.
 *
 * @since 3.0.0
 * @author Jo Dickson
 * @param int $img_code "imgCode" value for a forecast from the weather service
 * @return string URL for a weather icon
 */
function get_weather_icon_classic( $img_code ) {
	return GMUCF_THEME_IMG_URL . '/weather/' . $img_code . '.png';
}
