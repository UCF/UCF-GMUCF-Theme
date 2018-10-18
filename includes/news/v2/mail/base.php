<!DOCTYPE html PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN" "http://www.w3.org/TR/html4/loose.dtd">
<html lang="en">
<head>
	<meta http-equiv="Content-Type" content="text/html; charset=utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<meta name="format-detection" content="telephone=no">
	<title>Good
		<?php echo (int)date('G') >= 12 ? 'Afternoon' : 'Morning'; ?> UCF -
		<?php echo date('F j'); ?>
	</title>
	<?php echo get_template_part('includes/news/v2/mail/style'); ?>
</head>

<body>
	<table class="body">
		<tr>
			<td class="float-center" align="center" valign="top">
				<center>
					<table class="spacer float-center">
						<tbody>
							<tr>
								<td height="16px" style="font-size:16px;line-height:16px;">&#xA0;</td>
							</tr>
						</tbody>
					</table>
					<table align="center" class="container float-center">
						<tbody>
							<tr>
								<td>
									<table class="spacer">
										<tbody>
											<tr>
												<td height="16px" style="font-size:16px;line-height:16px;">&#xA0;</td>
											</tr>
										</tbody>
									</table>
									<table class="row">
										<tbody>
											<tr>
												<th class="small-12 large-12 columns first last">
													<table>
														<?php echo get_template_part('includes/news/v2/mail/header'); ?>
													</table>
												</th>
											</tr>
										</tbody>
									</table>
									<table class="row">
										<tbody>
											<tr>
												<th class="small-12 large-12 columns first last">
													<table>
														<?php echo get_template_part('includes/news/v2/mail/top-story'); ?>
													</table>
												</th>
											</tr>
										</tbody>
									</table>
									<table class="row">
										<tbody>
											<tr>
												<th class="small-12 large-12 columns first last">
													<table>
														<?php echo get_template_part('includes/news/v2/mail/featured-stories'); ?>
													</table>
												</th>
											</tr>
										</tbody>
									</table>
									<table class="row">
										<tbody>
											<tr>
												<th class="small-12 large-12 columns first last">
													<table>
														<?php echo get_template_part('includes/news/v2/mail/events'); ?>
													</table>
												</th>
											</tr>
										</tbody>
									</table>
									<table class="row">
										<tbody>
											<tr>
												<th class="small-12 large-12 columns first last">
													<table>
														<?php echo get_template_part('includes/news/v2/mail/announcements'); ?>
													</table>
												</th>
											</tr>
										</tbody>
									</table>
									<table class="row">
										<tbody>
											<tr>
												<th class="small-12 large-12 columns first last">
													<table>
														<?php echo get_template_part('includes/news/v2/mail/footer'); ?>
													</table>
												</th>
											</tr>
										</tbody>
									</table>
								</td>
							</tr>
						</tbody>
					</table>
				</center>
			</td>
		</tr>
	</table>
</body>

</html>
