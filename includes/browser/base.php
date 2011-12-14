<?=get_header()?>
<div id="content">
	<h1>Good Morning, Patrick.</h1>
	<?=get_template_part('includes/browser/top-story')?>
	<?=get_template_part('includes/browser/alert')?>
	<div id="left">
		<?=get_template_part('includes/browser/featured-stories')?>
		<?=get_template_part('includes/browser/announcements')?>
	</div>
	<div id="right">
		<?=get_template_part('includes/browser/events')?>
	</div>
</div>
<?=get_footer()?>