<?php
namespace GMUCF\Theme\TemplateParts\News\Browser\Header;

$current_date = current_datetime();
?>
<table class="tableCollapse" width="100%" border="0" align="center" cellpadding="0" bgcolor="#FFF" cellspacing="0" style="width:100%; margin:0; background-color:#fff;">
	<tr>
		<td style="padding-top: 20px; padding-bottom: 20px; padding-left: 0; padding-right: 0; text-align: center; border-bottom: 3px solid #fc0;">
			<a href="https://www.ucf.edu/news/"><img src="<?php echo GMUCF_THEME_IMG_URL; ?>/logo-today.png" alt="UCF Today" border="0" width="250" height="34"></a>
		</td>
	</tr>

	<tr>
		<td class="montserratlight" style="padding-top: 5px; padding-left: 0; padding-right: 0; font-weight: 400; font-size: 14px; line-height: 20px; color: #757575; text-transform: uppercase;">
			<?php echo $current_date->format( 'l, F j, Y' ); ?>
		</td>
	</tr>

	<tr>
		<td class="montserratlight" style="font-family: Helvetica, Arial, sans-serif; font-size: 18px; font-weight: bold; padding-bottom: 20px; padding-top: 30px; padding-left: 0; padding-right: 0; text-align: left;" align="left">
			<h2 style="margin-top: 0; margin-bottom: 0; font-weight: normal;">Good <?php echo ( int )$current_date->format( 'G' ) >= 12 ? 'Afternoon' : 'Morning'; ?>, UCF.</h2>
		</td>
	</tr>
</table>
