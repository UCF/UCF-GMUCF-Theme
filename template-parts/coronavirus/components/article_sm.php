<?php
namespace GMUCF\Theme\TemplateParts\Coronavirus\Components\Article;
use GMUCF\Theme\Includes\Coronavirus;


$row       = Coronavirus\get_current_row();
$thumbnail = $row->thumbnail;
$title     = Coronavirus\escape_chars( $row->article_title );
$deck      = Coronavirus\format_wysiwyg_content( $row->article_deck );
$href      = $row->links_to;
?>
<tr>
	<td style="text-align: left; padding-bottom: 30px;" align="left">
		<table style="text-align: center; width: 100%;" width="100%" align="center">
			<tbody>
				<?php if ( $thumbnail ): ?>
				<tr>
					<td style="text-align: left; padding-bottom: 15px;" align="left">
						<?php if ( $href ): ?>
						<a href="<?php echo $href; ?>">
						<?php endif; ?>
							<img class="img-fluid" width="275" src="<?php echo $thumbnail; ?>" alt="" style="max-width: 100%;">
						<?php if ( $href ): ?>
						</a>
						<?php endif; ?>
					</td>
				</tr>
				<?php endif; ?>
				<?php if ( $title ): ?>
				<tr>
					<td style="font-family: 'UCF-Sans-Serif-Alt', Helvetica, Arial, sans-serif; text-align: left; padding-top: 5px; padding-bottom: 10px; font-size: 18px; font-weight: bold; line-height: 1.2;" align="left">
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
					<td style="font-family: 'UCF-Sans-Serif-Alt', Helvetica, Arial, sans-serif; line-height: 1.5; text-align: left; padding-bottom: 45px; font-size: 13px;" align="left">
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
