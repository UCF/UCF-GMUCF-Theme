<?php
	disallow_direct_load('page.php');
	get_header();
?>
<div class="span12">
	<h2>Events</h2>
	<dl>
		<dt>Weekday</dt>
		<dd>
			<dl>
				<dt>Browser</dt>
				<dd><a href="<?php echo home_url('/events/weekday/') ?>"><?php echo home_url('/events/weekday/') ?></a></dd>
				<dt>Email</dt>
				<dd><a href="<?php echo home_url('/events/weekday/mail/') ?>"><?php echo home_url('/events/weekday/mail/') ?></a></dd>
				<dt>Text</dt>
				<dd><a href="<?php echo home_url('/events/weekday/text/') ?>"><?php echo home_url('/events/weekday/text/') ?></a></dd>
			</dl>
		</dd>
		<dt>Weekend</dt>
		<dd>
			<dl>
				<dt>Browser</dt>
				<dd><a href="<?php echo home_url('/events/weekend/') ?>"><?php echo home_url('/events/weekend/') ?></a></dd>
				<dt>Email</dt>
				<dd><a href="<?php echo home_url('/events/weekend/mail/') ?>"><?php echo home_url('/events/weekend/mail/') ?></a></dd>
				<dt>Text</dt>
				<dd><a href="<?php echo home_url('/events/weekend/text/') ?>"><?php echo home_url('/events/weekend/text/') ?></a></dd>
			</dl>
		</dd>
	</dl>
	<h2>News</h2>
	<dl>
		<dt>Browser</dt>
		<dd><a href="<?php echo home_url('/news/') ?>"><?php echo home_url('/news/') ?></a></dd>
		<dt>Email</dt>
		<dd><a href="<?php echo home_url('/news/mail/') ?>"><?php echo home_url('/news/mail/') ?></a></dd>
		<dt>Text</dt>
		<dd><a href="<?php echo home_url('/news/text/') ?>"><?php echo home_url('/news/text/') ?></a></dd>
	</dl>
</div>
<? get_footer(); ?>