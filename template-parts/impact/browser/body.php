<?php
namespace GMUCF\Theme\TemplateParts\Impact\Browser\Body;
use GMUCF\Theme\Includes\Impact;


$content = Impact\get_impact_email_content();
if ( $content ) {
	foreach ( $content as $row ) :
		$title        = $row['article_title'];
		$deck         = Impact\format_deck_content( $row['article_deck'] );
		$link         = $row['article_link'];
		$thumbnail = null;

		if ( $row['article_image'] ) {
			$thumbnail_array = wp_get_attachment_image_src( $row['article_image'], 'full' );
			if ( is_array( $thumbnail_array ) ) {
				$thumbnail = $thumbnail_array[0];
			}
		}
?>
<tr>
	<td style="padding-bottom: 20px; padding-top: 20px; padding-left: 0; padding-right: 0; border-bottom: 1px solid #aaa;">
		<table class="tableCollapse" style="border-spacing: 0; border-collapse: collapse;" width="600" border="0" align="center">
		<tbody>
			<tr>
			<td style="padding-left: 0; padding-right: 0;">
				<a href="<?php echo $link; ?>">
					<img src="<?php echo $thumbnail; ?>" class="responsiveimg" alt="" border="0">
				</a>
			</td>
			</tr>
			<tr>
			<td class="montserratbold" style="padding-left: 0; padding-right: 0; font-family: Helvetica, Arial, sans-serif; font-size: 24px; font-weight: bold; padding-top: 15px; padding-bottom: 4px; line-height: 1.1; color: #000; text-align: left;" align="left">
				<a href="<?php echo $link; ?>" style="color: #000; text-decoration: none;">
					<?php echo $title; ?>
				</a>
			</td>
			</tr>
			<tr>
			<td class="montserratlight" style="padding-left: 0; padding-right: 0; font-family: Helvetica, Arial, sans-serif; font-size: 16px; line-height: 1.6; color: #000; text-align: left;" align="left">
				<?php echo $deck; ?>
				<a href="<?php echo $link; ?>"  style="color: #006699; text-decoration: underline;">More &hellip;</a>
			</td>
			</tr>
		</tbody>
		</table>
	</td>
</tr>
<?php
	endforeach;
}
?>
