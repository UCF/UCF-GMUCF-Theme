<?php header( 'Content-Type: text/plain' ); ?>
UCF TODAY
<?php echo date( 'l, F j, Y' ) ?>

<?php $weather = get_weather( 'weather-today' ); if ( !empty( $weather ) ) { ?>
High: <?php echo $weather['today']['tempN']; ?> Low: <?php echo $weather['tonight']['tempN'] ?>
<?php } ?>

<?php $top_story_details = get_top_story_details(); ?>


TODAY'S TOP STORIES

<?php echo strip_tags( $top_story_details['story_title'] ); ?>

<?php echo strip_tags( $top_story_details['story_description'] ); ?>

<?php echo $top_story_details['read_more_uri']; ?>


<?php foreach( get_featured_stories_details( 4 ) as $detail ) { ?>
<?php echo strip_tags( $detail['title'] ); ?>

<?php echo strip_tags( $detail['description'] ); ?>

<?php echo $detail['permalink']; ?>


<?php } ?>


UCF IN THE NEWS

<?php foreach( get_in_the_news_stories() as $story ) { ?>
<?php echo strip_tags( $story->link_text ); ?> (<?php echo trim( strip_tags( $story->source ) ); ?>)
<?php echo $story->url; ?>


<?php } ?>


ANNOUNCEMENTS

<?php foreach( get_announcement_details() as $announcement ) { ?>
<?php echo strip_tags( $announcement['title'] ); ?>

<?php echo $announcement['permalink']; ?>


<?php } ?>


UNIVERSITY OF CENTRAL FLORIDA
4000 Central Florida Blvd.
Orlando, FL 32816
407-823-2000
