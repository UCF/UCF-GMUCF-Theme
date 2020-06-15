<?php
namespace GMUCF\Theme\TemplateParts\News\Text\EmailText;
use GMUCF\Theme\Includes\UCFToday;


$gmucf_content = UCFToday\get_gmucf_email_options_feed_values();
$send_date     = $gmucf_content->gmucf_email_send_date;

$contents      = $gmucf_content->gmucf_email_content;

$email_content_grouped = array(
    'gmucf_stories' => array(),
    'spotlights'    => array()
);

foreach ( $contents as $content ) {
    $layout = $content->gmucf_layout;

    if ( $layout === 'gmucf_top_story' ) {
        $email_content_grouped['gmucf_stories'][] = $content;
    }

    if ( $layout === 'gmucf_featured_stories_row' ) {
        $featured_stories_row_content = $content->gmucf_featured_story_row;

        foreach ( $featured_stories_row_content as $featured_story_content ) {
            $email_content_grouped['gmucf_stories'][] = $featured_story_content;
        }
    }

    if ( $layout === 'gmucf_spotlight' ) {
        $email_content_grouped['gmucf_spotlights'][] = $content;
    }
}
?>
TODAY'S TOP STORIES
========================
<?php foreach ( $email_content_grouped['gmucf_stories'] as $story ) : ?>
<?php echo strip_tags( $story->gmucf_story_title ); ?>

<?php echo strip_tags( $story->gmucf_story_description ); ?>

<?php echo strip_tags( $story->gmucf_story_permalink ); ?>


<?php endforeach; ?>

Spotlights
========================
<?php foreach ( $email_content_grouped['gmucf_spotlights'] as $spotlight ) : ?>
<?php echo strip_tags( $spotlight->gmucf_spotlight_alt_text ); ?>

<?php echo strip_tags( $spotlight->gmucf_spotlight_link ); ?>


<?php endforeach; ?>
