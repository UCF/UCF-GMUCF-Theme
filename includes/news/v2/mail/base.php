<!DOCTYPE html PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN" "http://www.w3.org/TR/html4/loose.dtd">
<html lang="en"><head><meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
    <meta name="format-detection" content="telephone=no">
    <meta name="viewport" content="initial-scale=1.0"><!-- So that mobile webkit will display zoomed in -->
    <title>Good <?=(int)date('G') >= 12 ? 'Afternoon' : 'Morning'?> UCF - <?=date('F j')?></title>
</head>
<body>

	<?php echo get_template_part('includes/news/v2/mail/header'); ?>
	<?php echo get_template_part('includes/news/v2/mail/alert'); ?>
	<?php echo get_template_part('includes/news/v2/mail/top-story'); ?>
	<?php echo get_template_part('includes/news/v2/mail/featured-stories'); ?>
	<?php echo get_template_part('includes/news/v2/mail/events'); ?>
	<?php echo get_template_part('includes/news/v2/mail/announcements'); ?>
	<?php echo get_template_part('includes/news/v2/mail/footer'); ?>

</body>
</html>
