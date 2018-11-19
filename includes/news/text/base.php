<?php header( 'Content-Type: text/plain' ); ?>
UCF TODAY
<?php echo date( 'l, F j, Y' ) ?>

<?php
$weather = get_weather( 'weather-today' );
if ( !empty( $weather ) ) : ?>
High: <?php echo $weather['today']['tempN']; ?> Low: <?php echo $weather['tonight']['tempN'] ?>
<?php endif; ?>




<?php
$gmucf_content = get_gmucf_email_options_feed_values();
$send_date     = $gmucf_content->gmucf_email_send_date;

if ( $send_date === date( 'm/d/Y' ) ) {
    echo get_template_part( 'includes/news/text/email-text' );
} else {
    echo get_template_part( 'includes/news/text/backup-email-text' );
}
?>

UCF IN THE NEWS
========================
<?php foreach( get_in_the_news_stories() as $story ) : ?>
- <?php echo strip_tags( $story->link_text ); ?> <?php if ( !empty( $story->source ) ) : ?>(<?php echo trim( strip_tags( $story->source ) ); ?>)<?php endif; ?>

  <?php echo $story->url; ?>


<?php endforeach; ?>

<?php
$announcements = get_announcement_details();

if ( count( $announcements ) != 0 ) :
?>
ANNOUNCEMENTS
========================
<?php foreach( $announcements as $announcement ) : ?>
- <?php echo strip_tags( $announcement['title'] ); ?>

  <?php echo $announcement['permalink']; ?>


<?php endforeach; ?>
<?php endif; ?>


UNIVERSITY OF CENTRAL FLORIDA
4000 Central Florida Blvd.
Orlando, FL 32816
407-823-2000
