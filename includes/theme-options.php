<?php
	# Check for settings updated or updated, varies between wp versions
	$updated = ( bool ) ( ( isset( $_GET['settings-updated'] ) && $_GET['settings-updated'] === 'true' ) || ( isset( $_GET['updated'] ) && $_GET['updated'] === 'true' ) );
?>

<form method="post" action="options.php" id="theme-options">
	<div class="wrap">
		<h2><?php echo __( THEME_OPTIONS_PAGE_TITLE ); ?></h2>

		<?php if ( $updated ): ?>
		<div class="updated fade"><p><strong><?php echo __( 'Options saved' ); ?></strong></p></div>
		<?php endif; ?>

		<?php settings_fields( THEME_OPTIONS_GROUP ); ?>
		<table class="form-table">
			<?php foreach( Config::$theme_settings as $key => $setting): ?>
			<?php if( is_array( $setting ) ): $section = $setting; ?>
			<tr class="section">
				<td colspan="2">
					<h3><?php echo $key; ?></h3>
					<table class="form-table">
						<?php foreach( $section as $setting ): ?>
						<tr>
							<th scope="row"><?php echo $setting->label_html(); ?></th>
							<td class="field">
								<?php echo $setting->input_html(); ?>
								<?php echo $setting->description_html(); ?>
							</td>
						</tr>
						<?php endforeach; ?>
					</table>
				</td>
			</tr>
			<?php else:?>
			<tr>
				<th scope="row"><?php echo $setting->label_html(); ?></th>
				<td class="field">
					<?php echo $setting->input_html(); ?>
					<?php echo $setting->description_html(); ?>
				</td>
			</tr>
			<?php endif; ?>
			<?php endforeach; ?>
		</table>
		<div class="submit">
			<input type="submit" class="button-primary" value="<?php echo  __('Save Options'); ?>" />
		</div>
	</div>
</form>
