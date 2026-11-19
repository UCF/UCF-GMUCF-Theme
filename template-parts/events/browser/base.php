<?php
namespace GMUCF\Theme\TemplateParts\Events\Browser\Base;
use GMUCF\Theme\Includes\Events;


// Which edition of the events should be displayed.
// Override if specified
if ( isset( $_GET['edition'] ) ) {
	if ( strtolower( $_GET['edition'] ) === 'weekday' ) {
		$edition = EVENTS_WEEKDAY_EDITION;
	} else if ( strtolower( $_GET['edition'] ) === 'weekend' ) {
		$edition = EVENTS_WEEKEND_EDITION;
	}
} else {
	$edition = Events\get_events_edition();
}

if ( $edition === false ) {
	ob_start();
?>
<div style="width:500px;font-size:40px;margin:auto;text-align:center;">
There is no events edition due out today. Override by adding an `edition`
GET paramter to the URI with a value of either `weekday` or `weekend`.
</div>
<?php
	echo ob_get_clean();
	die();
}

switch ( $edition ) {
	case EVENTS_WEEKDAY_EDITION:
		extract( Events\get_weekday_events() );
		break;
	case EVENTS_WEEKEND_EDITION:
		extract( Events\get_weekend_events() );
		break;
}
?>
<!DOCTYPE HTML>
<html>
	<head>
		<meta http-equiv="Content-Type" content="text/html;charset=UTF-8">
		<title>This Week<?php echo ( $edition === EVENTS_WEEKEND_EDITION ? 'end' : '' ); ?> @ UCF</title>
		<style type="text/css">
			body {width:600px;margin:15px auto;font-family:"Helvetica Neue",Helvetica,sans-serif;font-weight:200;}

			#feedback {text-align: center;margin-bottom:25px;}

			#shoutout {font-size:30px;}

			h1 {font-weight:200;font-size:37px;border-bottom:1px solid #ddd;}
			h1 .highlight {color:#FFC907;font-weight:bold;}
			h1 .range {float:right;}

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
			#bottom {clear:both;border-top:1px solid #ddd;text-align:center;padding-top:20px;padding-bottom:20px;}
			#bottom #social {margin-bottom:10px;}
			#bottom #social a {display:inline-block;text-decoration:none;margin:0 4px;}
			#bottom #social img,
				#bottom #ucf img {border:0;display:block;}
			#bottom #ucf {display:inline-block;margin-bottom:10px;}
			#bottom #address {color:#333;font-size:13px;line-height:1.5em;}
			#bottom #address .name {font-weight:bold;text-transform:uppercase;letter-spacing:1.25px;}
			#bottom #address .name a {color:#000;text-decoration:none;}

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
		<div id="shoutout">UCF, check out:</div>
		<h1>
			This Week<?php echo ( $edition === EVENTS_WEEKEND_EDITION ? 'end' : '' ); ?> @ <span class="highlight">UCF</span>
			<span class="range">
				<?php echo $start_date->format( 'n/j' ) . '-' . $end_date->format( 'n/j' ); ?>
			</span>
		</h1>
		<div id="events">
		<?php
		// Use includes here instead of get_template_part
		// to preserve scope.
		switch ( $edition ) {
			case EVENTS_WEEKDAY_EDITION:
				include( 'weekday-events.php' );
				break;
			case EVENTS_WEEKEND_EDITION:
				include( 'weekend-events.php' );
				break;
		}
		?>
		</div>
		<div id="upcoming-submit">
			To see all upcoming events visit <a href="https://events.ucf.edu/upcoming/">https://events.ucf.edu</a><br />
			<a href="https://events.ucf.edu/manager/">Submit an event to the UCF Events Calendar</a>
		</div>
		<div id="bottom">
			<div id="social">
				<a id="facebook" class="ignore-external" href="https://www.facebook.com/ucf/"><img src="<?php echo GMUCF_THEME_IMG_URL; ?>/social/facebook-circle.png" alt="UCF on Facebook" width="42" height="42"></a>
				<a id="twitter" class="ignore-external" href="https://www.twitter.com/UCF/"><img src="<?php echo GMUCF_THEME_IMG_URL; ?>/social/twitter-circle.png" alt="UCF on Twitter" width="42" height="42"></a>
				<a id="instagram" class="ignore-external" href="https://www.instagram.com/ucf.edu"><img src="<?php echo GMUCF_THEME_IMG_URL; ?>/social/instagram-circle.png" alt="UCF on Instagram" width="42" height="42"></a>
				<a id="linkedin" class="ignore-external" href="https://www.linkedin.com/edu/university-of-central-florida-18118"><img src="<?php echo GMUCF_THEME_IMG_URL; ?>/social/linkedin-circle.png" alt="UCF on LinkedIn" width="42" height="42"></a>
				<a id="youtube" class="ignore-external" href="https://www.youtube.com/user/UCF/"><img src="<?php echo GMUCF_THEME_IMG_URL; ?>/social/youtube-circle.png" alt="UCF on YouTube" width="42" height="42"></a>
			</div>
			<a id="ucf" href="https://www.ucf.edu" class="ignore-external"><img src="<?php echo GMUCF_THEME_IMG_URL; ?>/stacked-logo-email.png" alt="UCF" width="100" height="100" style="height:100px;"></a>
			<div id="address">
				<div class="name"><a href="https://www.ucf.edu/" class="ignore-external">University of Central Florida</a></div>
				4000 Central Florida Blvd.
				<br />
				Orlando, FL 32816
				<br />
				407-823-2000
			</div>
		</div>
	</body>
</html>
