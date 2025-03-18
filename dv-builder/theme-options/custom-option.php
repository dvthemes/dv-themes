<?php global $select_options; if ( ! isset( $_REQUEST['settings-updated'] ) ) $_REQUEST['settings-updated'] = false;  ?>
<link rel='stylesheet' href='<?php echo get_template_directory_uri() . '/dv-builder/assets/css/theme-options.css'; ?>' />
<link rel='stylesheet' href='<?php echo get_template_directory_uri() . '/dv-builder/assets/css/preloader.css'; ?>' />
<div class="theme_option">
	
	<header class="dashboard-head">
		<div class="logo"></div>
		<div class="menu-wrapper">
			<ul class="dashboard-menu">
				<li><a href="<?php echo get_site_url(); ?>/wp-admin/admin.php?page=theme-options"><span class="mfn-icon"><img src="<?php echo get_template_directory_uri(); ?>/dv-builder/assets/images/icons/dashboard-icon.svg" /></span>Dashboard</a></li>
				<li><a href="<?php echo get_site_url(); ?>/wp-admin/admin.php?page=pre-built-websites"><span class="mfn-icon"><img src="<?php echo get_template_directory_uri(); ?>/dv-builder/assets/images/icons/websites-icon.svg" /></span>Pre-built Websites</a></li>
				<li class="active"><a href="<?php echo get_site_url(); ?>/wp-admin/admin.php?page=theme-settings"><span class="mfn-icon"><img src="<?php echo get_template_directory_uri(); ?>/dv-builder/assets/images/icons/theme-options-icon.svg" /></span>Theme Options</a></li>
				<li><a href="<?php echo get_site_url(); ?>/wp-admin/admin.php?page=maintenance-mode"><span class="mfn-icon"><img src="<?php echo get_template_directory_uri(); ?>/dv-builder/assets/images/icons/maintenance-icon.svg" /></span>Maintenance Mode</a></li>
				<li><a href="<?php echo get_site_url(); ?>/wp-admin/admin.php?page=ai1wm_import"><span class="mfn-icon"><img src="<?php echo get_template_directory_uri(); ?>/dv-builder/assets/images/icons/support-icon.svg" /></span>Import Data</a></li>
				<li><a href="<?php echo get_site_url(); ?>/wp-admin/admin.php?page=manual-support"><span class="mfn-icon"><img src="<?php echo get_template_directory_uri(); ?>/dv-builder/assets/images/icons/support-icon.svg" /></span>Support</a></li>
				<li><a href="<?php echo get_site_url(); ?>/wp-admin/admin.php?page=license-key"><span class="mfn-icon"><img style="width: 100%;" src="<?php echo get_template_directory_uri(); ?>/dv-builder/assets/images/icons/key-icon.svg" /></span>License Key</a></li>
			</ul>
		</div>
	</header> 

<div class="thm_box">
	<?php echo "<h1>". __( 'Custom Theme Options', 'customtheme' ) . "</h1>"; ?>
	<?php if ( false !== $_REQUEST['settings-updated'] ) : ?>
		<div class="saved_alert">
			<strong><?php _e( 'Options saved', 'customtheme' ); ?></strong>
		</div>
	<?php endif; ?> 

	<form method="post" action="options.php">
		<?php 
			settings_fields( 'sample_options' );
			 $options = get_option( 'sample_theme_options' );
			if(function_exists( 'wp_enqueue_media' )){
				wp_enqueue_media();
			}else{
				wp_enqueue_style('thickbox');
				wp_enqueue_script('media-upload');
				wp_enqueue_script('thickbox');
			}
		?>
		<div class="tabPanel">

			<ul class="tabTrgr">
				<li> <a href="javascript:;" data-tab="#general_settings" class="active">General Settings</a> </li>
				<li> <a href="javascript:;" data-tab="#preloader_settings">Preloader Settings</a> </li>
			</ul>

			<div id="general_settings" class="cstmTab">

				<h2>General Settings</h2>
				<table>
					<tbody>
						<tr class="img">							<th>Logo:</th>							<td>								<img class="header_logo" src="<?php if(!empty($options['logourl'])){ esc_attr_e( $options['logourl'] ); } ?>" height="50" width="50"/>								<input class="header_logo_url" type="hidden" name="sample_theme_options[logourl]" value="<?php if(!empty($options['logourl'])){ esc_attr_e( $options['logourl'] ); } ?>">								<a href="#" class="header_logo_upload btn">Upload</a>							</td>						</tr>
						<tr class="img">							<th>FavIcon Image:</th>							<td>								<img class="fav_logo" src="<?php echo esc_url( get_site_icon_url( 50 ) ); ?>" height="50" width="50"/>								<input class="fav_logo_url" type="hidden" name="site_icon" value="<?php echo esc_attr( get_option( 'site_icon' ) ); ?>">								<a href="#" class="fav_logo_upload btn">Upload</a>							</td>						</tr>						<tr>							<th>Site Title</th>							<td><input id="sample_theme_options[titleOpt]" type="text" name="sample_theme_options[titleOpt]" value="<?php if(!empty($options['titleOpt'])){ esc_attr_e( $options['titleOpt'] ); } ?>" /></td>						</tr>						<tr>						<tr>							<th>Tag Line</th>							<td><input id="sample_theme_options[tagline]" type="text" name="sample_theme_options[tagline]" value="<?php if(!empty($options['tagline'])){ esc_attr_e( $options['tagline'] ); } ?>" /></td>						</tr>												<tr>							<th>Edit Header</th>							<td>								<a href="<?php echo get_site_url(); ?>/wp-admin/site-editor.php?postType=wp_template_part&postId=dv-themes-child%2F%2Fheader&canvas=edit" target="blank" class="btn" style="margin: 0;">Click Here to Edit the Header</a> </td>							</td>						</tr>												<tr>							<th>Edit Footer</th>							<td>								<a href="<?php echo get_site_url(); ?>/wp-admin/site-editor.php?postType=wp_template_part&postId=dv-themes-child%2F%2Ffooter&canvas=edit" target="blank" class="btn" style="margin: 0;">Click Here to Edit the Footer</a> </td>							</td>						</tr>
					</tbody>
				</table> 
			</div>
			<div id="preloader_settings" class="cstmTab">
				
				<table>
					<tbody>
						<tr>
							<th>Preloader:</th>
							<td>
								<div class="switch-options">
									<?php 
										if(empty($options['preLoader'])){
											$preLoader = 0; 
										}else{
											$preLoader = $options['preLoader'];  
										}
									?>
									<label class="cb-enable <?php if($preLoader == 1){ echo 'selected'; } ?>">Yes</label>
									<label class="cb-disable <?php if($preLoader == 0){ echo 'selected'; } ?>">No</label>
									<input type="hidden" class="checkbox checkbox-input" id="preLoader" name="sample_theme_options[preLoader]" value="<?php echo $preLoader; ?>">
								</div>
							</td>
						</tr>
						<tr>
							<td class="tbale_inr" colspan="2">
								<table>
									<tbody>
										<tr>
											<td>
												<?php 
													if(empty($options['loaderCode'])){
														$loaderCode = 'whirlpool'; 
													}else{
														$loaderCode = $options['loaderCode']; 
													} 
												?>
												<div id="preLoders">
													<?php if ( has_custom_logo()){ ?>
														<div class="load_atr" data-attr="web_logo"><?php the_custom_logo(); ?></div>
													<?php } ?>
													<div class="load_atr" data-attr="whirlpool"><div class="preloader-whirlpool"><div class="whirlpool"></div></div></div>
													<div class="load_atr" data-attr="floating-circles"><div class="preloader-floating-circles"><div class="f_circleG" id="frotateG_01"></div><div class="f_circleG" id="frotateG_02"></div><div class="f_circleG" id="frotateG_03"></div><div class="f_circleG" id="frotateG_04"></div><div class="f_circleG" id="frotateG_05"></div><div class="f_circleG" id="frotateG_06"></div><div class="f_circleG" id="frotateG_07"></div><div class="f_circleG" id="frotateG_08"></div></div></div>
													<div class="load_atr" data-attr="double-torus"><div class="preloader-double-torus"></div></div>
													<div class="load_atr" data-attr="tube-tunnel"><div class="preloader-tube-tunnel"></div></div>
													<div class="load_atr" data-attr="speed-wheel"><div class="preloader-speeding-wheel"></div></div>
													<div class="load_atr" data-attr="loading-wrap"><div class="preloader-loading-wrapper"><div class="cssload-loading"><i></i><i></i></div></div></div>
													<div class="load_atr" data-attr="dot-load"><div class="preloader-dot-loading"><div class="cssload-loading"><i></i><i></i><i></i><i></i></div></div></div>
													<div class="load_atr" data-attr="circle-load"><div class="preloader-circle-loading-wrapper"><div class="cssload-loader"></div></div></div>
													<div class="load_atr" data-attr="circle-rotator"><div class="preloader-dot-circle-rotator"></div></div>
													<div class="load_atr" data-attr="equalizer"><div class="preloader-equalizer"><ul><li></li><li></li><li></li><li></li><li></li><li></li></ul></div></div>
													<div class="load_atr" data-attr="bubbling"><div class="preloader-bubblingG"><span id="bubblingG_1"></span><span id="bubblingG_2"></span><span id="bubblingG_3"></span></div></div>
													<div class="load_atr" data-attr="Text"><div class="preloader-fountainTextG"><div id="fountainTextG_1" class="fountainTextG">L</div><div id="fountainTextG_2" class="fountainTextG">o</div><div id="fountainTextG_3" class="fountainTextG">a</div><div id="fountainTextG_4" class="fountainTextG">d</div><div id="fountainTextG_5" class="fountainTextG">i</div><div id="fountainTextG_6" class="fountainTextG">n</div><div id="fountainTextG_7" class="fountainTextG">g</div></div></div>
													<div class="load_atr" data-attr="orbit"><div class="preloader-orbit-loading"><div class="cssload-inner cssload-one"></div><div class="cssload-inner cssload-two"></div><div class="cssload-inner cssload-three"></div></div></div>
													<div class="load_atr" data-attr="jackhammer"><div class="preloader-jackhammer"><ul class="cssload-flex-container"><li><span class="cssload-loading"></span></li></ul></div></div>
													<div class="load_atr" data-attr="swapping"><div class="preloader-square-swapping"><div class="cssload-square-part cssload-square-green"></div><div class="cssload-square-part cssload-square-pink"></div><div class="cssload-square-blend"></div></div></div>
												</div>
												<input type="hidden" id="loaderCode" name="sample_theme_options[loaderCode]" value="<?php echo $loaderCode; ?>">
											</td>
										</tr>
									</tbody>
								</table>
							</td>
						</tr>
					</tbody>
				</table> 
				
			</div>

		</div>
		<input class="btn" type="submit" value="<?php _e( 'Save Options', 'customtheme' ); ?>" />
	</form>
</div>

</div>

<script>
	jQuery(document).ready(function($) {
		
		<?php if($preLoader == 1){ ?>
			jQuery('#preLoders > div[data-attr="<?php echo $loaderCode; ?>"]').addClass('selected');
		<?php } ?>
		jQuery('#preLoders .load_atr').click(function(){
			var src = jQuery(this).data('attr');
			jQuery('#preLoders .load_atr').removeClass('selected');
			jQuery(this).addClass('selected');
			jQuery('#loaderCode').val(src);
		});
		jQuery('.switch-options label.cb-enable').click(function(){
			jQuery(this).closest('.switch-options').find('label').removeClass('selected');
			jQuery(this).addClass('selected'); 
			jQuery(this).closest('.switch-options').find('.checkbox').val(1);
		});
		jQuery('.switch-options label.cb-disable').click(function(){
			jQuery(this).closest('.switch-options').find('label').removeClass('selected');
			jQuery(this).addClass('selected'); 
			jQuery(this).closest('.switch-options').find('.checkbox').val(0);
		});
		jQuery('.tabPanel .cstmTab:first').show();
				
		jQuery('.tabPanel .cstmTab:first').show();
		jQuery('.tabTrgr li a').click(function () {
			var src = jQuery(this).data('tab');
			jQuery('.tabTrgr li a').removeClass('active');
			jQuery('.tabPanel .cstmTab').hide();
			jQuery(this).addClass('active').closest('.tabPanel').find(src+'.cstmTab').fadeIn();
		});
        jQuery('.header_logo_upload').click(function(e) {
            e.preventDefault();
            var custom_uploader = wp.media({
                title: 'Custom Image',
                button: { text: 'Upload Image' },
                multiple: false
            }).on('select', function() {
                var attachment = custom_uploader.state().get('selection').first().toJSON();
                jQuery('.header_logo').attr('src', attachment.url);
                jQuery('.header_logo_url').val(attachment.url);
            }).open();
        });
		jQuery('.fav_logo_upload').click(function(e) {
            e.preventDefault();
            var custom_uploader = wp.media({
                title: 'Custom Image',
                button: { text: 'Upload Image' },
                multiple: false
            }).on('select', function() {
                var attachment = custom_uploader.state().get('selection').first().toJSON();
                $('.fav_logo').attr('src', attachment.url);
            $('.fav_logo_url').val(attachment.id);
            $.post(ajaxurl, {
                action: 'update_site_icon',
                site_icon: attachment.id
            }, function(response) {
                if (response.success) {
                   // console.log('Site icon updated successfully');
                }
            });
        }).open();
    });
});


</script>
