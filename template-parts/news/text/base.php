<?php
namespace GMUCF\Theme\TemplateParts\News\Text\Base;
use GMUCF\Theme\Includes\UCFToday;
use GMUCF\Theme\Includes\InTheNews;


header( 'Content-Type: text/plain' );

$current_date = current_datetime();
?>
UCF TODAY
<?php echo $current_date->format( 'l, F j, Y' ); ?>


<?php
$gmucf_content = UCFToday\get_gmucf_email_options_feed_values();
$send_date     = $gmucf_content->gmucf_email_send_date ?? null;

if ( $send_date === $current_date->format( 'm/d/Y' ) ) {
    echo get_template_part( 'template-parts/news/text/email-text' );
} else {
    echo get_template_part( 'template-parts/news/text/backup-email-text' );
}
?>

UCF IN THE NEWS
========================
<?php foreach ( InTheNews\get_in_the_news_stories() as $story ) : ?>
- <?php echo strip_tags( $story->link_text ); ?> <?php if ( ! empty( $story->source ) ) : ?>(<?php echo trim( strip_tags( $story->source ) ); ?>)<?php endif; ?>

  <?php echo $story->url; ?>


<?php endforeach; ?>



UNIVERSITY OF CENTRAL FLORIDA
4000 Central Florida Blvd.
Orlando, FL 32816
407-823-2000
