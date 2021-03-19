<?php
namespace GMUCF\Theme\TemplateParts\Coronavirus\Components\Article;
use GMUCF\Theme\Includes\Coronavirus;


$current_date = current_datetime();
$row          = Coronavirus\get_current_row();
$thumbnail    = $row->thumbnail;
$title        = Coronavirus\escape_chars( $row->article_title );
$deck         = Coronavirus\format_deck_content( $row->article_deck );
$href         = Coronavirus\format_url_utm_params( $row->links_to, $current_date->format( 'Y-m-d' ) );
?>
<tr>
	<td style="text-align: left; padding-bottom: 40px;" align="left">
		<table style="text-align: center; width: 100%;" width="100%" align="center">
			<tbody>
				<?php if ( $thumbnail ): ?>
				<tr>
					<td style="font-family: 'UCF-Sans-Serif-Alt', Helvetica, Arial, sans-serif; font-size: 14px; line-height: 1.5; text-align: left; padding-bottom: 15px;" align="left">
						<?php if ( $href ): ?>
						<a href="<?php echo $href; ?>">
						<?php endif; ?>
							<img class="img-fluid" width="580" src="<?php echo $thumbnail; ?>" alt="" style="max-width: 100%;">
						<?php if ( $href ): ?>
						</a>
						<?php endif; ?>
					</td>
				</tr>
				<?php endif; ?>
				<?php if ( $title ): ?>
				<tr>
					<td style="font-family: 'UCF-Sans-Serif-Alt', Helvetica, Arial, sans-serif; text-align: left; padding-bottom: 10px; font-size: 24px; font-weight: bold; line-height: 1.2;" align="left">
						<?php if ( $href ): ?>
						<a href="<?php echo $href; ?>" style="color: #000; text-decoration: none;">
						<?php endif; ?>
							<?php echo $title; ?>
						<?php if ( $href ): ?>
						</a>
						<?php endif; ?>
					</td>
				</tr>
				<?php endif; ?>
				<?php if ( $deck ): ?>
				<tr>
					<td style="font-family: 'UCF-Sans-Serif-Alt', Helvetica, Arial, sans-serif; font-size: 14px; line-height: 1.5; text-align: left;" align="left">
						<?php if ( $href ): ?>
						<a href="<?php echo $href; ?>" style="color: #000; text-decoration: none;">
						<?php endif; ?>
							<?php echo $deck; ?>
						<?php if ( $href ): ?>
						</a>
						<?php endif; ?>
					</td>
				</tr>
				<?php endif; ?>
			</tbody>
		</table>
	</td>
</tr>
