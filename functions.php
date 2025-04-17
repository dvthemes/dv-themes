<?php
require get_template_directory() . '/dv-builder/dv-options.php';
if ( ! function_exists( 'twentytwentyfive_post_format_setup' ) ) :	function twentytwentyfive_post_format_setup() {		add_theme_support( 'post-formats', array( 'aside', 'audio', 'chat', 'gallery', 'image', 'link', 'quote', 'status', 'video' ) );	}endif;add_action( 'after_setup_theme', 'twentytwentyfive_post_format_setup' );
if ( ! function_exists( 'twentytwentyfive_editor_style' ) ) :	function twentytwentyfive_editor_style() {		add_editor_style( get_parent_theme_file_uri( 'assets/css/editor-style.css' ) );	}endif;add_action( 'after_setup_theme', 'twentytwentyfive_editor_style' );
if ( ! function_exists( 'twentytwentyfive_enqueue_styles' ) ) :
	function dv_themes_enqueue_styles() {
		wp_enqueue_style( 'dvthemes-style', get_parent_theme_file_uri( 'style.css' ), array(), wp_get_theme()->get( 'Version' ) );
		wp_enqueue_style( 'dvthemes-child-style', get_stylesheet_directory_uri().'/style.css' );
		/*=== INNER PAGE CSS ===*/
		if (!is_front_page() && !is_home()) {
			wp_enqueue_style('inner-pages-style', get_stylesheet_directory_uri() . '/assets/css/inner-pages.css', array(), 'all');
		}
		/*=== UNDER CONSTRUCTION PAGE CSS ===*/
		if ( get_page_template_slug() === 'under-construction' ) {
			wp_enqueue_style( 'under-construction-style', get_parent_theme_file_uri() . '/dv-builder/maintenance-mode/uc_style.css', array(), '1.0', 'all' );
			wp_enqueue_script('under-construction-scripts', get_parent_theme_file_uri() . '/dv-builder/maintenance-mode/uc_script.js', array(), '1.0', 'all');
		}	
		wp_enqueue_script('plugin-scripts', get_stylesheet_directory_uri() . '/assets/js/scripts.js', array('jquery'), '1.0', true);
	}endif;
add_action( 'wp_enqueue_scripts', 'dv_themes_enqueue_styles' );


if ( ! function_exists( 'twentytwentyfive_block_styles' ) ) :
	function twentytwentyfive_block_styles() {
		register_block_style(
			'core/list',
			array(
				'name'         => 'checkmark-list',
				'label'        => __( 'Checkmark', 'twentytwentyfive' ),
				'inline_style' => '
				ul.is-style-checkmark-list {
					list-style-type: "\2713";
				}

				ul.is-style-checkmark-list li {
					padding-inline-start: 1ch;
				}',
			)
		);
	}
endif;
add_action( 'init', 'twentytwentyfive_block_styles' );

// Registers pattern categories.
if ( ! function_exists( 'twentytwentyfive_pattern_categories' ) ) :
	function twentytwentyfive_pattern_categories() {

		register_block_pattern_category(
			'twentytwentyfive_page',
			array(
				'label'       => __( 'Pages', 'twentytwentyfive' ),
				'description' => __( 'A collection of full page layouts.', 'twentytwentyfive' ),
			)
		);

		register_block_pattern_category(
			'twentytwentyfive_post-format',
			array(
				'label'       => __( 'Post formats', 'twentytwentyfive' ),
				'description' => __( 'A collection of post format patterns.', 'twentytwentyfive' ),
			)
		);
	}
endif;
add_action( 'init', 'twentytwentyfive_pattern_categories' );

// Registers block binding sources.
if ( ! function_exists( 'twentytwentyfive_register_block_bindings' ) ) :
	function twentytwentyfive_register_block_bindings() {
		register_block_bindings_source(
			'twentytwentyfive/format',
			array(
				'label'              => _x( 'Post format name', 'Label for the block binding placeholder in the editor', 'twentytwentyfive' ),
				'get_value_callback' => 'twentytwentyfive_format_binding',
			)
		);
	}
endif;
add_action( 'init', 'twentytwentyfive_register_block_bindings' );

// Registers block binding callback function for the post format name.
if ( ! function_exists( 'twentytwentyfive_format_binding' ) ) :
	function twentytwentyfive_format_binding() {
		$post_format_slug = get_post_format();

		if ( $post_format_slug && 'standard' !== $post_format_slug ) {
			return get_post_format_string( $post_format_slug );
		}
	}
endif;

add_action('init', 'underconstruction');

function underconstruction() {
    $options = get_option('sample_theme_options');

    if (isset($options['dv_mode'])) {
        $slug = $options['dv_mode'] === '1' ? 'under-construction' : 'home';
        $page = get_page_by_path($slug);

        if ($page) {
            update_option('page_on_front', $page->ID);
            update_option('show_on_front', 'page');
        }
    }
}


function add_custom_php_to_header() {	echo '<div class="cursor_arrow"><span class="circle-cursor--inner"></span><span class="circle-cursor--outer"></span></div>';	if ( is_home() || is_front_page() ) { 		$options = get_option('sample_theme_options');			require get_template_directory() . '/dv-builder/pre-loader.php';		}	}add_action('wp_head', 'add_custom_php_to_header');
add_action('wp_ajax_update_site_icon', function() {    if (!isset($_POST['site_icon']) || empty($_POST['site_icon'])) {        wp_send_json_error(['message' => 'Invalid image']);    }    update_option('site_icon', intval($_POST['site_icon']));    wp_send_json_success(['message' => 'Favicon updated successfully']);});
add_action('update_option_sample_theme_options', function($old_value, $new_value) {    if (isset($new_value['titleOpt'])) {        update_option('blogname', sanitize_text_field($new_value['titleOpt']));    }    if (isset($new_value['tagline'])) {        update_option('blogdescription', sanitize_text_field($new_value['tagline']));    }    if (isset($new_value['logourl'])) {        $attachment_id = attachment_url_to_postid($new_value['logourl']);        if ($attachment_id) {            update_option('site_logo', $attachment_id);		}	}
}, 10, 2);
function create_dvuser_role() {    if (!get_role('dvuser')) {        $role = add_role('dvuser', __('Dvuser'), []);        if ($role) {            global $wp_roles;            $all_capabilities = [];            foreach ($wp_roles->roles as $role_name => $role_info) { $all_capabilities = array_merge($all_capabilities, $role_info['capabilities']); }            foreach ($all_capabilities as $cap => $value) { $role->add_cap($cap, true); }        }    }}add_action('init', 'create_dvuser_role');
function hide_plugins_menu_for_dvuser() {    $current_user = wp_get_current_user();    if (in_array('dvuser', (array)$current_user->roles)) {        remove_menu_page('plugins.php');     }}add_action('admin_menu', 'hide_plugins_menu_for_dvuser', 999);
function redirect_dvuser_from_plugins_page() {    $current_user = wp_get_current_user();    if (in_array('dvuser', (array)$current_user->roles)) {        if (strpos($_SERVER['REQUEST_URI'], 'plugins.php') !== false) { wp_redirect(admin_url()); exit; }    }}add_action('admin_init', 'redirect_dvuser_from_plugins_page');




