<?=get_header()?>
<div id="content">
	<h1>Good Morning, Patrick.</h1>
	<?=get_template_part('includes/browser/top-story')?>
	<div class="narrow">
		<?=get_template_part('includes/browser/alert')?>

		<div id="left" >
			<?=get_template_part('includes/browser/featured-stories')?>
			<?=get_template_part('includes/browser/announcements')?>
		</div>
		<div id="right">
			<?=get_template_part('includes/browser/events')?>
		</div>
		<div id="bottom" class="clearfix">
			<div id="social">
				<h2>Get Social</h2>
				<a id="facebook" class="ignore-external" href="http://www.facebook.com/ucf/">UCF on Facebook</a>
				<a id="youtube" class="ignore-external" href="http://www.youtube.com/user/UCF/">UCF on Youtube</a>
				<a id="twitter" class="ignore-external" href="http://www.twitter.com/UCF/">UCF on Twitter</a>
			</div>
			<a id="ucf" href="http://www.ucf.edu">
				4000 Central Florida Blvd.
				<br />
				Orlando, FL 32816
				<br />
				407.823.2000
			</a>
		</div>
	</div>
</div>
<?=get_footer()?>