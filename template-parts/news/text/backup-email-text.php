<?php
namespace GMUCF\Theme\TemplateParts\News\Text\BackupEmailText;
use GMUCF\Theme\Includes\UCFToday as UCFToday;
?>
TODAY'S TOP STORIES
========================

<?php foreach( UCFToday\get_featured_stories_details( 4 ) as $detail ) { ?>
<?php echo strip_tags( $detail['title'] ); ?>

<?php echo strip_tags( $detail['description'] ); ?>

<?php echo $detail['permalink']; ?>


<?php } ?>
