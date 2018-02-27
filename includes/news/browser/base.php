<?=get_header()?>
<div id="content">
	<h1>Good <?=(int)date('G') >= 12 ? 'Afternoon' : 'Morning'?>, UCF.</h1>
	<?=get_template_part('includes/news/browser/top-story')?>
	<hr />
	<?=get_template_part('includes/news/browser/alert')?>
	<?=get_template_part('includes/news/browser/featured-stories')?>
	<hr />
	<?=get_template_part('includes/news/browser/announcements')?>
	<div id="bottom" class="clearfix">
		<div id="social">
			<h2>Get Social</h2>
			<a id="facebook" class="ignore-external" href="https://www.facebook.com/ucf/">UCF on Facebook</a>
			<a id="twitter" class="ignore-external" href="https://www.twitter.com/UCF/">UCF on Twitter</a>
			<a id="instagram" class="ignore-external" href="https://www.instagram.com/ucf.edu">UCF on Instagram</a>
			<a id="youtube" class="ignore-external" href="https://www.youtube.com/user/UCF/">UCF on Youtube</a>
		</div>
		<a id="ucf" href="https://www.ucf.edu" class="ignore-external">
			4000 Central Florida Blvd.
			<br />
			Orlando, FL 32816
			<br />
			407.823.2000
		</a>
	</div>
</div>
<?=get_footer()?>
