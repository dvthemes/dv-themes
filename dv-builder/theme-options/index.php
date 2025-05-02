<?php 
function theme_options() {
    add_menu_page('Theme page title', 'DV Theme', 'manage_options', 'theme-options', 'dv_options', '', 3);

    add_submenu_page('theme-options', 'Pre-built websites', 'Pre-built websites', 'manage_options', 'pre-built-websites', 'pre_built_websites');
    add_submenu_page('theme-options', 'Theme Options', 'Theme Options', 'manage_options', 'theme-settings', 'theme_r_options');
    add_submenu_page('theme-options', 'Maintenance Mode', 'Maintenance Mode', 'manage_options', 'maintenance-mode', 'maintenance_mode');

    $saved_license_key = get_option('MaximusGrier');
    if (!empty($saved_license_key)) {
        add_submenu_page('theme-options', 'Import Data', 'Import Data', 'manage_options', 'ai1wm_import', 'import_data');
    }
    add_submenu_page('theme-options', 'License Key', 'License Key', 'manage_options', 'license-key', 'license_key');
    add_submenu_page('theme-options', 'Manual & Support', 'Manual & Support', 'manage_options', 'manual-support', 'manual_support');
}

add_action('admin_menu', 'theme_options');


add_action( 'admin_init', 'theme_options_init' );
function theme_options_init(){
 register_setting( 'sample_options', 'sample_theme_options');
} 

function import_data() {
?>
<link rel='stylesheet' href='<?php echo get_template_directory_uri() . '/dv-builder/assets/css/theme-options.css'; ?>' />
<div class="theme_option">
	
	<header class="dashboard-head">
		<div class="logo"></div>
		<div class="menu-wrapper">
			<ul class="dashboard-menu">
				<li><a href="<?php echo get_site_url(); ?>/wp-admin/admin.php?page=theme-options"><span class="mfn-icon"><img src="https://dvthemes.com/assets/theme-images/icons/dashboard-icon.svg" /></span>Dashboard</a></li>
				<li><a href="<?php echo get_site_url(); ?>/wp-admin/admin.php?page=pre-built-websites"><span class="mfn-icon"><img src="https://dvthemes.com/assets/theme-images/icons/websites-icon.svg" /></span>Pre-built Websites</a></li>
				<li><a href="<?php echo get_site_url(); ?>/wp-admin/admin.php?page=theme-settings"><span class="mfn-icon"><img src="https://dvthemes.com/assets/theme-images/icons/theme-options-icon.svg" /></span>Theme Options</a></li>
				<li><a href="<?php echo get_site_url(); ?>/wp-admin/admin.php?page=maintenance-mode"><span class="mfn-icon"><img src="https://dvthemes.com/assets/theme-images/icons/maintenance-icon.svg" /></span>Maintenance Mode</a></li>
				<li class="active"><a href="<?php echo get_site_url(); ?>/wp-admin/admin.php?page=dv-importer"><span class="mfn-icon"><img src="https://dvthemes.com/assets/theme-images/icons/support-icon.svg" /></span>Import Data</a></li>
				<li><a href="<?php echo get_site_url(); ?>/wp-admin/admin.php?page=manual-support"><span class="mfn-icon"><img src="https://dvthemes.com/assets/theme-images/icons/support-icon.svg" /></span>Support</a></li>
				<li><a href="<?php echo get_site_url(); ?>/wp-admin/admin.php?page=license-key"><span class="mfn-icon"><img style="width: 100%;" src="https://dvthemes.com/assets/theme-images/icons/key-icon.svg" /></span>License Key</a></li>
			</ul>
		</div>
	</header>
	
	<div class="tabPanel">
		<div id="general_options" class="cstmTab" style="display:block;">
			<h2>Import Data</h2>
			
			<?php
			// Check if file is uploaded
			if (isset($_FILES['file']) && $_FILES['file']['error'] === UPLOAD_ERR_OK) {
				// Define the path to store the uploaded file
				$upload_dir = wp_upload_dir(); // Get WordPress upload directory
				$upload_file = $upload_dir['path'] . '/' . basename($_FILES['file']['name']);

				// Move uploaded file to the upload directory
				if (move_uploaded_file($_FILES['file']['tmp_name'], $upload_file)) {
					// Load WordPress
					define('WP_USE_THEMES', false);
					require_once( dirname( dirname( dirname( dirname( dirname( __DIR__ ) ) ) ) ) . '/wp-load.php' );

					// Parse XML file and insert data into WordPress
					$xml_data = simplexml_load_file($upload_file);
					if ($xml_data) {
						foreach ($xml_data->channel->item as $item) {
							$post_data = array(
								'post_title' => (string)$item->title,
								'post_content' => (string)$item->{'content:encoded'},
								'post_date' => (string)$item->pubDate,
								'post_type' => (string)$item->{'wp:post_type'},
								'post_status' => (string)$item->{'wp:status'},
							);
							wp_insert_post($post_data);
						}
						echo 'Data imported successfully!';
					} else {
						echo 'Failed to parse XML file!';
					}
				} else {
					// Display error message if file move failed
					echo 'File move failed!';
				}
			} else {
				// Display error message if file upload failed
				if(isset($_FILES['file']) && $_FILES['file']['error'] !== UPLOAD_ERR_OK) {
					echo 'File upload failed with error code: ' . $_FILES['file']['error'];
				}
			}
			?>
			
			<form action="" method="post" enctype="multipart/form-data">
				<input type="file" name="file" accept=".xml">
				<button type="submit">Upload and Export</button>
			</form>
		</div>
	</div>
	
</div>
<?php } 

function dv_options() {
?>
<link rel='stylesheet' href='<?php echo get_template_directory_uri() . '/dv-builder/assets/css/theme-options.css'; ?>' />
<div class="theme_option">
	
	<header class="dashboard-head">
		<div class="logo"></div>
		<div class="menu-wrapper">
			<ul class="dashboard-menu">
				<li class="active"><a href="<?php echo get_site_url(); ?>/wp-admin/admin.php?page=theme-options"><span class="mfn-icon"><img src="https://dvthemes.com/assets/theme-images/icons/dashboard-icon.svg" /></span>Dashboard</a></li>
				<li><a href="<?php echo get_site_url(); ?>/wp-admin/admin.php?page=pre-built-websites"><span class="mfn-icon"><img src="https://dvthemes.com/assets/theme-images/icons/websites-icon.svg" /></span>Pre-built Websites</a></li>
				<li><a href="<?php echo get_site_url(); ?>/wp-admin/admin.php?page=theme-settings"><span class="mfn-icon"><img src="https://dvthemes.com/assets/theme-images/icons/theme-options-icon.svg" /></span>Theme Options</a></li>
				<li><a href="<?php echo get_site_url(); ?>/wp-admin/admin.php?page=maintenance-mode"><span class="mfn-icon"><img src="https://dvthemes.com/assets/theme-images/icons/maintenance-icon.svg" /></span>Maintenance Mode</a></li>
				<li><a href="<?php echo get_site_url(); ?>/wp-admin/admin.php?page=dv-importer"><span class="mfn-icon"><img src="https://dvthemes.com/assets/theme-images/icons/support-icon.svg" /></span>Import Data</a></li>
				<li><a href="<?php echo get_site_url(); ?>/wp-admin/admin.php?page=manual-support"><span class="mfn-icon"><img src="https://dvthemes.com/assets/theme-images/icons/support-icon.svg" /></span>Support</a></li>
				<li><a href="<?php echo get_site_url(); ?>/wp-admin/admin.php?page=license-key"><span class="mfn-icon"><img style="width: 100%;" src="https://dvthemes.com/assets/theme-images/icons/key-icon.svg" /></span>License Key</a></li>
			</ul>
		</div>
	</header>
<?php
$api_url = 'https://dvthemes.com/backend/dv-themes-dashboard/api.php';
$response = wp_remote_get($api_url);
$uploaded_data = null;
if (is_wp_error($response)) {
    error_log('API request failed: ' . $response->get_error_message());
} else {
    $data = json_decode(wp_remote_retrieve_body($response), true);

    if (isset($data['data'])) {
        $uploaded_data = $data['data'];
    }
}
?>
<div class="tabPanel">
    <div id="general_options" class="cstmTab" style="display:block;">
        <h2>Dashboard</h2>
        <div class="dv_dash_box">
            <div class="card-content blue_box">
                <div class="cnt_f">
                    <h3><?php echo $uploaded_data['dv_title'];?></h3>
            <p>
           <?php  echo isset($uploaded_data['description']) ? esc_html($uploaded_data['description'])  : 'Let us guide you through this process. Promise, it won\'t take more than a couple of seconds.'; ?>
            </p>

            <a href="<?php echo $uploaded_data['button_link']?>" class="btn"><?php echo $uploaded_data['button_text'];?></a>
            </div>
          </div>
          <div class="img_box s_box">
                <img src="<?php 
                    echo isset($uploaded_data['image']) ? esc_url($uploaded_data['image']) : 'https://api.muffingroup.com/promo/images/join-fb-community.jpg'; ?>" alt="Promotional Image">
           </div>
       </div>
   </div>
</div>

	
</div>
<?php } 

function pre_built_websites() {
?>
<link rel='stylesheet' href='<?php echo get_template_directory_uri() . '/dv-builder/assets/css/theme-options.css'; ?>' />
<div class="theme_option">
	
	<header class="dashboard-head">
		<div class="logo"></div>
		<div class="menu-wrapper">
			<ul class="dashboard-menu">
				<li><a href="<?php echo get_site_url(); ?>/wp-admin/admin.php?page=theme-options"><span class="mfn-icon"><img src="https://dvthemes.com/assets/theme-images/icons/dashboard-icon.svg" /></span>Dashboard</a></li>
				<li class="active"><a href="<?php echo get_site_url(); ?>/wp-admin/admin.php?page=pre-built-websites"><span class="mfn-icon"><img src="https://dvthemes.com/assets/theme-images/icons/websites-icon.svg" /></span>Pre-built Websites</a></li>
				<li><a href="<?php echo get_site_url(); ?>/wp-admin/admin.php?page=theme-settings"><span class="mfn-icon"><img src="https://dvthemes.com/assets/theme-images/icons/theme-options-icon.svg" /></span>Theme Options</a></li>
				<li><a href="<?php echo get_site_url(); ?>/wp-admin/admin.php?page=maintenance-mode"><span class="mfn-icon"><img src="https://dvthemes.com/assets/theme-images/icons/maintenance-icon.svg" /></span>Maintenance Mode</a></li>
				<li><a href="<?php echo get_site_url(); ?>/wp-admin/admin.php?page=dv-importer"><span class="mfn-icon"><img src="https://dvthemes.com/assets/theme-images/icons/support-icon.svg" /></span>Import Data</a></li>
				<li><a href="<?php echo get_site_url(); ?>/wp-admin/admin.php?page=manual-support"><span class="mfn-icon"><img src="https://dvthemes.com/assets/theme-images/icons/support-icon.svg" /></span>Support</a></li>
				<li><a href="<?php echo get_site_url(); ?>/wp-admin/admin.php?page=license-key"><span class="mfn-icon"><img style="width: 100%;" src="https://dvthemes.com/assets/theme-images/icons/key-icon.svg" /></span>License Key</a></li>
			</ul>
		</div>
	</header>

	<?php
$api_url_pre_built = 'https://dvthemes.com/backend/dv-themes-dashboard/pre_built_api.php';
$built_response = wp_remote_get($api_url_pre_built);
$built_uploaded_data = null;
if (is_wp_error($built_response)) {
    error_log('API request failed: ' . $built_response->get_error_message());
} else {
    $pre_built_data = json_decode(wp_remote_retrieve_body($built_response), true);

    if (!empty($pre_built_data['pre_built_data']) && is_array($pre_built_data['pre_built_data'])) {
        $built_uploaded_data = $pre_built_data['pre_built_data'];
    }
}
?>

	<div class="tabPanel">
		<div id="skins" class="cstmTab" style="display:block;">
			<h2>Pre-built Websites</h2>
			<div class="items">
				 <?php if (!empty($built_uploaded_data) && is_array($built_uploaded_data)): ?>
				<?php foreach ($built_uploaded_data as $built_uploaded_datas): ?>
					<?php
						$title = $built_uploaded_datas['title'] ?? '';
						$web_link = $built_uploaded_datas['web_link'] ?? '#';
						$thumbnail = $built_uploaded_datas['thumbnail'] ?? '';
					?>
					<div class="item skin wordpress">
						<a href="<?php echo htmlspecialchars($web_link); ?>" target="_blank">
							<div class="shadow">
								<p class="image">
									<img src="<?php echo htmlspecialchars($thumbnail); ?>" alt="<?php echo htmlspecialchars($title); ?>">
								</p>
							</div>
							<span><?php echo htmlspecialchars($title); ?></span>
						</a>
					</div>
				<?php endforeach; ?>
			<?php endif; ?>
			
			</div>
		</div>
	</div>
	
</div>
	
<?php } 

function theme_r_options() {
	require get_template_directory() . '/dv-builder/theme-options/custom-option.php';	
} 


function maintenance_mode() {
	global $select_options; if ( ! isset( $_REQUEST['settings-updated'] ) ) $_REQUEST['settings-updated'] = false; 
?>
<link rel='stylesheet' href='<?php echo get_template_directory_uri() . '/dv-builder/assets/css/theme-options.css'; ?>' />

<div class="theme_option">
	<header class="dashboard-head">
		<div class="logo"></div>
		<div class="menu-wrapper">
			<ul class="dashboard-menu">
				<li><a href="<?php echo get_site_url(); ?>/wp-admin/admin.php?page=theme-options"><span class="mfn-icon"><img src="https://dvthemes.com/assets/theme-images/icons/dashboard-icon.svg" /></span>Dashboard</a></li>
				<li><a href="<?php echo get_site_url(); ?>/wp-admin/admin.php?page=pre-built-websites"><span class="mfn-icon"><img src="https://dvthemes.com/assets/theme-images/icons/websites-icon.svg" /></span>Pre-built Websites</a></li>
				<li><a href="<?php echo get_site_url(); ?>/wp-admin/admin.php?page=theme-settings"><span class="mfn-icon"><img src="https://dvthemes.com/assets/theme-images/icons/theme-options-icon.svg" /></span>Theme Options</a></li>
				<li class="active"><a href="<?php echo get_site_url(); ?>/wp-admin/admin.php?page=maintenance-mode"><span class="mfn-icon"><img src="https://dvthemes.com/assets/theme-images/icons/maintenance-icon.svg" /></span>Maintenance Mode</a></li>
				<li><a href="<?php echo get_site_url(); ?>/wp-admin/admin.php?page=dv-importer"><span class="mfn-icon"><img src="https://dvthemes.com/assets/theme-images/icons/support-icon.svg" /></span>Import Data</a></li>
				<li><a href="<?php echo get_site_url(); ?>/wp-admin/admin.php?page=manual-support"><span class="mfn-icon"><img src="https://dvthemes.com/assets/theme-images/icons/support-icon.svg" /></span>Support</a></li>
				<li><a href="<?php echo get_site_url(); ?>/wp-admin/admin.php?page=license-key"><span class="mfn-icon"><img style="width: 100%;" src="https://dvthemes.com/assets/theme-images/icons/key-icon.svg" /></span>License Key</a></li>
			</ul>
		</div>
	</header>
	<?php if ( false !== $_REQUEST['settings-updated'] ) : ?>
		<div class="saved_alert">
			<strong><?php _e( 'Options saved', 'customtheme' ); ?></strong>
		</div>
	<?php endif; ?> 

	<form method="post" action="options.php">
		<?php 
			settings_fields( 'sample_options' ); $options = get_option( 'sample_theme_options' ); 
			if(function_exists( 'wp_enqueue_media' )){
				wp_enqueue_media();
			}else{
				wp_enqueue_style('thickbox');
				wp_enqueue_script('media-upload');
				wp_enqueue_script('thickbox');
			}
		?>
		<div class="tabPanel">
			<div id="under_construction" class="cstmTab" style="display:block;">
				<h2>Maintenance Modes</h2>
				<table>
					<tbody>
						<tr>
							<th style="width:20%;">Maintenance Mode</th>
							<td>
								<div class="switch-options">
									<?php 
										if(empty($options['dv_mode'])){ 
											$dv_mode = 0; 
										}else{
											$dv_mode = $options['dv_mode'];  
										} 
									?>
									<label class="cb-enable <?php if($dv_mode == 1){ echo 'selected'; } ?>">Yes</label>
									<label class="cb-disable <?php if($dv_mode == 0){ echo 'selected'; } ?>">No</label>
									<input type="hidden" class="checkbox checkbox-input" id="dv_mode" name="sample_theme_options[dv_mode]" value="<?php echo $dv_mode; ?>">
								</div>
								
							</td>
						</tr>
						<tr>
							<th style="width:20%;">Edit Maintenance Page</th>
							<td>								<a href="<?php echo get_site_url(); ?>/wp-admin/edit.php?s=Under+Construction&post_status=all&post_type=page&action=-1&m=0&paged=1&action2=-1" target="blank" class="btn" style="margin: 0;">Click here.</a> </td>
							</td>
						</tr>
						<!--<tr>
							<th style="width:20%;">Light Mode</th>
							<td>
								<div class="switch-options">
									<?php 
										if (!isset($options['dv_mode']) || empty($options['dv_mode'])) {
											$dl_mode = 0;
										}else{
											$dl_mode = $options['dl_mode'];  
										}
									?>
									<label class="cb-enable <?php if($dl_mode == 1){ echo 'selected'; } ?>">On</label>
									<label class="cb-disable <?php if($dl_mode == 0){ echo 'selected'; } ?>">Off</label>
									<input type="hidden" class="checkbox checkbox-input" id="dl_mode" name="sample_theme_options[dl_mode]" value="<?php echo $dl_mode; ?>">
								</div>
							</td>
						</tr>
						<tr class="img">
							<th>Background Image:</th>
							<td>
								<?php if(empty($options['dv_mode_img'])){ ?>
									<input readonly class="header_logo_url" type="text" name="sample_theme_options[dv_mode_img]" value="">
								<?php
								}else{ ?>
									<input readonly class="header_logo_url" type="hidden" name="sample_theme_options[dv_mode_img]" value="<?php esc_attr_e( $options['dv_mode_img'] ); ?>">
									<img class="header_logo" src="<?php esc_attr_e( $options['dv_mode_img'] ); ?>" height="50" width="50" />
								<?php } ?><br>
								<a href="#" class="header_logo_upload btn">Upload</a>
							</td>
						</tr>
						<tr>
							<th>Title</th>
							<td><input id="sample_theme_options[under_cons_hd]" type="text" name="sample_theme_options[under_cons_hd]" value="<?php if(!empty($options['under_cons_hd'])){ esc_attr_e( $options['under_cons_hd'] ); } ?>"></td>
						</tr>
						<tr>
							<th>Text</th>
							<td>
								<textarea id="sample_theme_options[under_cons_cnt]" class="large-text" name="sample_theme_options[under_cons_cnt]"><?php if(!empty($options['under_cons_cnt'])){ echo esc_textarea( $options['under_cons_cnt'] ); } ?></textarea>
							</td>
						</tr>
						<tr>
							<th style="width:20%;">Social Icons</th>
							<td>
								<div class="switch-options">
									<?php 
										if(empty($options['socMedia'])){ 
											$socMedia = 0; 
										}else{
											$socMedia = $options['socMedia'];  
										} 
									?>
									<label class="cb-enable <?php if($socMedia == 1){ echo 'selected'; } ?>">Yes</label>
									<label class="cb-disable <?php if($socMedia == 0){ echo 'selected'; } ?>">No</label>
									<input type="hidden" class="checkbox checkbox-input" id="socMedia" name="sample_theme_options[socMedia]" value="<?php echo $socMedia; ?>">
								</div>
								<p>You can include the social links by <a href="<?php echo get_site_url(); ?>/wp-admin/customize.php" target="blank">clicking here</a> and go to the Social Icons tab. </p>
							</td>
						</tr>-->
					</tbody>
				</table> 
			</div>
		</div>
		<input class="btn" type="submit" value="<?php _e( 'Save Options', 'customtheme' ); ?>" />
	</form>
</div>

<script>
	jQuery(document).ready(function($) {
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
		
    });
( function() { 'use strict';
  let images = document.querySelectorAll('img[data-src]');
              
  document.addEventListener('DOMContentLoaded', onReady);
  function onReady() {
    // Show above-the-fold images first
    showImagesOnView();

    // scroll listener
    window.addEventListener( 'scroll', showImagesOnView, false );
  }
  
  // Show the image if reached on viewport
  function showImagesOnView( e ) {
    
    for( let i of images ) {
      if( i.getAttribute('src') ) { continue; } // SKIP if already displayed
      
      // Compare the position of image and scroll
      let bounding = i.getBoundingClientRect();
      let isOnView = bounding.top >= 0 &&
      bounding.left >= 0 &&
      bounding.bottom <= (window.innerHeight || document.documentElement.clientHeight) &&
      bounding.right <= (window.innerWidth || document.documentElement.clientWidth);
      
      if( isOnView ) {
        i.setAttribute( 'src', i.dataset.src );
        if( i.getAttribute('data-srcset') ) {
          i.setAttribute( 'srcset', i.dataset.srcset );
        }
      }
    }
  }
              
})();
</script>
<?php } 
function manual_support() {
?>
<link rel='stylesheet' href='<?php echo get_template_directory_uri() . '/dv-builder/assets/css/theme-options.css'; ?>' />
<div class="theme_option">
	
	<header class="dashboard-head">
		<div class="logo"></div>
		<div class="menu-wrapper">
			<ul class="dashboard-menu">
				<li><a href="<?php echo get_site_url(); ?>/wp-admin/admin.php?page=theme-options"><span class="mfn-icon"><img src="https://dvthemes.com/assets/theme-images/icons/dashboard-icon.svg" /></span>Dashboard</a></li>
				<li><a href="<?php echo get_site_url(); ?>/wp-admin/admin.php?page=pre-built-websites"><span class="mfn-icon"><img src="https://dvthemes.com/assets/theme-images/icons/websites-icon.svg" /></span>Pre-built Websites</a></li>
				<li><a href="<?php echo get_site_url(); ?>/wp-admin/admin.php?page=theme-settings"><span class="mfn-icon"><img src="https://dvthemes.com/assets/theme-images/icons/theme-options-icon.svg" /></span>Theme Options</a></li>
				<li><a href="<?php echo get_site_url(); ?>/wp-admin/admin.php?page=maintenance-mode"><span class="mfn-icon"><img src="https://dvthemes.com/assets/theme-images/icons/maintenance-icon.svg" /></span>Maintenance Mode</a></li>
				<li><a href="<?php echo get_site_url(); ?>/wp-admin/admin.php?page=dv-importer"><span class="mfn-icon"><img src="https://dvthemes.com/assets/theme-images/icons/support-icon.svg" /></span>Import Data</a></li>
				<li class="active"><a href="<?php echo get_site_url(); ?>/wp-admin/admin.php?page=manual-support"><span class="mfn-icon"><img src="https://dvthemes.com/assets/theme-images/icons/support-icon.svg" /></span>Support</a></li>
				<li><a href="<?php echo get_site_url(); ?>/wp-admin/admin.php?page=license-key"><span class="mfn-icon"><img style="width: 100%;" src="https://dvthemes.com/assets/theme-images/icons/key-icon.svg" /></span>License Key</a></li>
			</ul>
		</div>
	</header>
	
	<div class="tabPanel">
		<div id="general_options" class="cstmTab" style="display:block;">
			<h2>Support</h2>
			<div class="card-content cnt_clrd">
				<div class="card-box">
					<div class="support-item" style="border-right: 1px solid rgba(48, 64, 80, .1);">
						<img src="https://dvthemes.com/assets/theme-images/icons/yes-icon.svg" />
						<h5>Item support <span class="include">includes</span>: </h5>
						<p>Responding to questions or problems regarding the item and its features.</p>
						<p>Fixing bugs and reported issues.</p>
						<p>Providing updates to ensure compatibility with new WordPress versions.</p>
					</div>
					<div class="support-item">
						<img src="https://dvthemes.com/assets/theme-images/icons/no-icon.svg" />
						<h5>Item support does <span class="include">not include</span>: </h5>
						<p>Customization and installation services.</p>
						<p>Support for third party software and plugins.</p>
					</div>
				</div>
			</div>
			
			<div class="card-content blue_box">
				<div class="cnt_f">
					<h3>Can't find <br> what you need? </h3>
					<p>Submit a ticket and get help.</p>
					<a target="_blank" href="https://dvthemes.com/dv_themes_user_dashboard/login_form.php" class="btn">Create a ticket</a>
				</div>
			</div>
			<!-- <form id="createTicketForm" style="display: none;">
				<label for="ticketDescription">Describe your Query:</label><br>
				<textarea id="ticketDescription" name="ticketDescription" rows="4" cols="50" required></textarea><br><br>
				<button type="submit" class="btn">Submit Ticket</button>
			</form> -->
			
		</div>
	</div>
	
</div>
<script type="text/javascript">
// document.addEventListener('DOMContentLoaded', function () {
//   const formElement = document.getElementById('createTicketForm');
//   if (formElement) {
//     formElement.addEventListener('submit', function (event) {
//       event.preventDefault();
//       const ticketDescription = document.getElementById('ticketDescription').value;
//       fetch(ajax_object.ajaxurl, {
//         method: 'POST',
//         headers: {
//           'Content-Type': 'application/x-www-form-urlencoded',
//         },
//         body: new URLSearchParams({
//           action: 'create_ticket',
//           ticket_description: ticketDescription,
//         }),
//       })
//       .then(response => response.json())
//       .then(data => {
//         alert(data.message);
//         document.getElementById('createTicketModal').style.display = 'none';
//       })
//       .catch(error => console.error('Error:', error));
//     });
//   } else {
//     console.error('Form element createTicketForm not found!');
//   }
// });
// document.addEventListener('DOMContentLoaded', function() {
//   document.getElementById('ticket_box').onclick = function() {
//     const modal = document.getElementById('createTicketForm');
//     if (modal.style.display === 'block') {
//       modal.style.display = 'none';  
//     } else {
//       modal.style.display = 'block'; 
//     }
//   };
//   document.querySelector('.close').onclick = function() {
//     document.getElementById('createTicketForm').style.display = 'none';
//   };
// });
</script>
<?php }

function license_key() {
?>
<link rel='stylesheet' href='<?php echo get_template_directory_uri() . '/dv-builder/assets/css/theme-options.css'; ?>' />
<div class="theme_option">
	
	<header class="dashboard-head">
		<div class="logo"></div>
		<div class="menu-wrapper">
			<ul class="dashboard-menu">
				<li><a href="<?php echo get_site_url(); ?>/wp-admin/admin.php?page=theme-options"><span class="mfn-icon"><img src="https://dvthemes.com/assets/theme-images/icons/dashboard-icon.svg" /></span>Dashboard</a></li>
				<li><a href="<?php echo get_site_url(); ?>/wp-admin/admin.php?page=pre-built-websites"><span class="mfn-icon"><img src="https://dvthemes.com/assets/theme-images/icons/websites-icon.svg" /></span>Pre-built Websites</a></li>
				<li><a href="<?php echo get_site_url(); ?>/wp-admin/admin.php?page=theme-settings"><span class="mfn-icon"><img src="https://dvthemes.com/assets/theme-images/icons/theme-options-icon.svg" /></span>Theme Options</a></li>
				<li><a href="<?php echo get_site_url(); ?>/wp-admin/admin.php?page=maintenance-mode"><span class="mfn-icon"><img src="https://dvthemes.com/assets/theme-images/icons/maintenance-icon.svg" /></span>Maintenance Mode</a></li>
				<li><a href="<?php echo get_site_url(); ?>/wp-admin/admin.php?page=dv-importer"><span class="mfn-icon"><img src="https://dvthemes.com/assets/theme-images/icons/support-icon.svg" /></span>Import Data</a></li>
				<li class="active"><a href="<?php echo get_site_url(); ?>/wp-admin/admin.php?page=manual-support"><span class="mfn-icon"><img src="https://dvthemes.com/assets/theme-images/icons/support-icon.svg" /></span>Support</a></li>
				<li><a href="<?php echo get_site_url(); ?>/wp-admin/admin.php?page=license-key"><span class="mfn-icon"><img style="width: 100%;" src="https://dvthemes.com/assets/theme-images/icons/key-icon.svg" /></span>License Key</a></li>
			</ul>
		</div>
	</header>
	
	<div class="tabPanel">
		<div id="general_options" class="cstmTab" style="display:block;">
			<h2>License Key</h2>
<?php
if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['submit_license_key'])) {
    $license_key = sanitize_text_field($_POST['license_keyword']);
    $response = wp_remote_post('https://dvthemes.com/backend/dv-themes-dashboard/license_api.php', [
        'method' => 'POST',
        'body' => [
            'license_keyword' => $license_key,
        ],
    ]);
    if (is_wp_error($response)) {
        echo '<p>Error: Unable to connect to the server.</p>';
    } else {
        $response_body = wp_remote_retrieve_body($response);
        $response_data = json_decode($response_body, true);

        if ($response_data['status'] === 'success') {
        update_option('MaximusGrier', $license_key);
            echo '<p style="color: green;">' . esc_html($response_data['message']) . '</p>';
        } else {
            echo '<p style="color: red;">' . esc_html($response_data['message']) . '</p>';
        }
    }
}

if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['dis_license_key'])) {
   
    delete_option('MaximusGrier');

    echo '<p style="color: red; font-weight: bold;">License key disconnected successfully.</p>';
}

$saved_license_key = get_option('MaximusGrier');

if (!empty($saved_license_key)) {

    echo '<p style="color: green; font-weight: bold;">&#x2022; Connected</p>';
    echo '<form method="POST">
            <button type="submit" name="dis_license_key" class="btn">Disconnect</button>
          </form>';
} else {
   
    echo '<p style="color: red; font-weight: bold;">&#x2022; Not Connected</p>';
}
?>
<form method="post" action="">
    <div class="card-content cnt_clrd">
        <div class="card-box">
            <label for="license_keyword">License Key:</label>
            <input type="text" name="license_keyword" id="license_keyword" placeholder="Enter Correct License Key">
        </div>
    </div>
    <div class="cnt_f">
        <button type="submit" name="submit_license_key" class="btn">Submit Key</button>
    </div>
</form>
		</div>
	</div>
	
</div>
<?php 

$saved_license_key = get_option('MaximusGrier');

if (!empty($saved_license_key)) {

    $pattern_folder = get_template_directory() . '/patterns';

    if (file_exists($pattern_folder) && count(glob("$pattern_folder/*")) > 0) {
        echo '<p style="color: green; font-weight: bold;">Patterns already installed.</p>';
    } else {

      //  echo '<p style="color: orange; font-weight: bold;">Installing patterns...</p>';

  
        require_once ABSPATH . 'wp-admin/includes/file.php';
        require_once ABSPATH . 'wp-admin/includes/class-wp-upgrader.php';
        WP_Filesystem();

   
        class Silent_Skin extends WP_Upgrader_Skin {
            public function feedback($string, ...$args) {}
        }

        $skin = new Silent_Skin();
        $upgrader = new WP_Upgrader($skin);

        $zip_url = 'https://dvthemes.com/download_plugins/patterns.zip';

        if (!file_exists($pattern_folder)) {
            mkdir($pattern_folder, 0755, true);
        }

  
        $result = $upgrader->run([
            'package' => $zip_url,
            'destination' => $pattern_folder,
            'clear_destination' => false,
            'abort_if_destination_exists' => false,
            'hook_extra' => [],
        ]);
if (!is_wp_error($result)) {
    echo '<div id="pattern-success-msg" style="color: green; font-weight: bold;">Patterns have been installed successfully!</div>';
    echo '<script>
        setTimeout(function() {
            var msg = document.getElementById("pattern-success-msg");
            if (msg) {
                msg.style.display = "none";
            }
        }, 20000); // 20 seconds
    </script>';
} else {
            echo '<p style="color: red;">Error installing patterns: ' . $result->get_error_message() . '</p>';
        }
    }
}
?>


<?php } ?>

