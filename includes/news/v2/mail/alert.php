<?php
$alerts = get_posts( array( 'post_type'=>'alert', 'numberposts' => 1 ) );
if( count( $alerts ) > 0 ) {
	$alert = $alerts[0];
?>
	<h2><?php echo esc_html( $alert->post_title ); ?></h2>
	<p><?php echo nl2br( esc_html( $alert->post_content ) ); ?></p>
	<? if( ( $alert_uri = get_post_meta( $alert->ID, 'alert_external_uri', True ) ) !== '' ) { ?>
		<a href="<?php echo esc_html( $alert_uri ); ?>">Get more information</a>
	<? } ?>
<?
}
