<?php $top_story_details = get_top_story_details(); ?>
TODAY'S TOP STORIES
========================
<?php echo strip_tags( $top_story_details['story_title'] ); ?>

<?php echo strip_tags( $top_story_details['story_description'] ); ?>

<?php echo $top_story_details['read_more_uri']; ?>


<?php foreach( get_featured_stories_details( 4 ) as $detail ) { ?>
<?php echo strip_tags( $detail['title'] ); ?>

<?php echo strip_tags( $detail['description'] ); ?>

<?php echo $detail['permalink']; ?>


<?php } ?>
