<?php 
require get_template_directory() . '/dv-builder/theme-options/index.php';require get_template_directory() . '/dv-builder/blocks/custom-block/custom-blocks.php';require get_template_directory() . '/dv-builder/blocks/add-custom-attribute/attributes-for-blocks.php';
//require get_template_directory() . '/dv-builder/theme-options/customizer/customizer.php';//require get_template_directory() . '/dv-builder/functions.php';
//require get_template_directory() . '/dv-builder/meta-options/index.php';
//require get_template_directory() . '/dv-builder/import/import.php';
//require get_template_directory() . '/dv-builder/getwid/index.php';
//require get_template_directory() . '/dv-builder/import-export/index.php';
//require get_template_directory() . '/dv-builder/import-export/import-export.php';

/*=== REGISTER CATEGORY FOR PATTERN ===*/add_action( 'init', 'register_pattern_categories' );function register_pattern_categories() {	register_block_pattern_category( 'themeslug/fancybox', array( 		'label'       => __( 'Fancy Box', 'themeslug' ),		'description' => __( 'Fancy Box', 'themeslug' )	) );}
/*=== ADMIN EDITOR STYLING ===*/function block_editor_full_width() {	add_theme_support( 'editor-styles' );	add_editor_style( get_template_directory_uri() . '/dv-builder/assets/css/admin-style.css' );}add_action('after_setup_theme', 'block_editor_full_width');/*=== ADD OR REMOVE SCRIPTS ===*/function my_custom_script() {	wp_deregister_style('animate');	wp_dequeue_style('wp-block-library');	wp_enqueue_script('plugin-scripts');}add_action('wp_enqueue_scripts', 'my_custom_script');
/*=== REMOVE CONTECT FORM 7 STYLES ===*/add_filter( 'wpcf7_load_css', '__return_false' );
/*=== REMOVE DEFAULT PATTERNS ===*/add_action('after_setup_theme', function() {	remove_theme_support('core-block-patterns');});
/*=== LAZZY LOAD FUNCTION ===add_filter( 'the_content', 'my_lazyload_content_images' );
add_filter( 'widget_text', 'my_lazyload_content_images' );
add_filter( 'wp_get_attachment_image_attributes', 'my_lazyload_attachments', 10, 2 );
function my_lazyload_content_images( $content ) {
    if ( has_custom_logo() ) {
        return $content;
    }
    $content = preg_replace( '/(<img.+)(src)/Ui', '$1data-$2', $content );
    $content = preg_replace( '/(<img.+)(srcset)/Ui', '$1data-$2', $content );
    return $content;
}
function my_lazyload_attachments( $atts, $attachment ) {
    if ( has_custom_logo() && $attachment->ID === get_theme_mod( 'custom_logo' ) ) {
        return $atts;
    }
    $atts['data-src'] = $atts['src'];
    unset( $atts['src'] );
    if( isset( $atts['srcset'] ) ) {
        $atts['data-srcset'] = $atts['srcset'];
        unset( $atts['srcset'] );
    }
    return $atts;
}*/