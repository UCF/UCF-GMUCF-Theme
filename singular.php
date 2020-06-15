<?php get_header(); the_post(); ?>

<article class="<?php echo $post->post_status; ?>">
	<div class="container mt-4 mt-sm-5 mb-5 pb-sm-4">
		<h1 class="mb-4 mb-sm-5">
			<?php the_title(); ?>
		</h1>
		<?php the_content(); ?>
	</div>
</article>

<?php get_footer(); ?>
