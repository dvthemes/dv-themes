<?php 

add_action( 'wp_head', 'cd_customizer_css');

function cd_customizer_css(){
?>

         <style type="text/css">

			body { background-color:<?php echo get_theme_mod('bg_color', 'transparent'); ?> !important; color:<?php echo get_theme_mod('text_color', '#000'); ?>; }

			body, p, span, a, img, ul, ol, input, button, textarea { color:<?php echo get_theme_mod('text_color', '#000'); ?>;
/*
				<?php if($txt_fonts == 'playfair'){ ?> 

					font-family: 'Playfair Display', serif; 

				<?php }elseif($txt_fonts == 'poppoins'){ ?> 

					font-family: 'Poppins', sans-serif;

				<?php }elseif($txt_fonts == 'antic'){ ?> 

					font-family: 'Antic', sans-serif;

				<?php }elseif($txt_fonts == 'medieval'){ ?> 

					font-family: 'MedievalSharp', cursive;

				<?php }elseif($txt_fonts == 'stick_bills'){ ?> 

					font-family: 'Stick No Bills', sans-serif;

				<?php }elseif($txt_fonts == 'sirin_stencil'){ ?> 

					font-family: 'Sirin Stencil', sans-serif;

				<?php }elseif($txt_fonts == 't_me_one'){ ?> 

					font-family: 'Text Me One', sans-serif;

				<?php }elseif($txt_fonts == 'open_sans'){ ?> 

					font-family: 'Open Sans', sans-serif;

				<?php } ?>

				font-size:<?php echo $font_t_size; ?>px;
*/
			}

			p { line-height: 180%; }

            h1 *, h2 *, h3 *, h4 *, h5 *, h6 *, label,

			h1, h2, h3, h4, h5, h6 { color:<?php echo get_theme_mod('heading_color', '#000'); ?>; 
/*
				<?php if($fonts == 'playfair'){ ?> 

					font-family: 'Playfair Display', serif; 

				<?php }elseif($fonts == 'poppoins'){ ?> 

					font-family: 'Poppins', sans-serif;

				<?php }elseif($fonts == 'black_ops'){ ?> 

					font-family: 'Black Ops One', system-ui;

				<?php }elseif($fonts == 'rowdies'){ ?> 

					font-family: 'Rowdies', sans-serif;

				<?php }elseif($fonts == 'medieval'){ ?> 

					font-family: 'MedievalSharp', cursive;

				<?php }elseif($fonts == 'stick_bills'){ ?> 

					font-family: 'Stick No Bills', sans-serif;

				<?php }elseif($fonts == 'sirin_stencil'){ ?> 

					font-family: 'Sirin Stencil', sans-serif;

				<?php }elseif($fonts == 'kumar'){ ?> 

					font-family: 'Kumar One', serif;

				<?php }elseif($fonts == 'open_sans'){ ?> 

					font-family: 'Open Sans', sans-serif;

				<?php }elseif($fonts == 'bebas'){ ?> 

					font-family: 'Bebas Neue', sans-serif;

				<?php } ?>

				font-weight:<?php echo $font_w; ?>;

				font-size:<?php echo $font_size; ?>px; */

			}

			@media(max-width:1130px) and (min-width: 768px){
				h1 *, h2 *, h3 *, h4 *, h5 *, h6 *, label, h1, h2, h3, h4, h5, h6 {
					font-size:<?php echo $font_size_ipad; ?>px;
				}
			}

			@media(max-width:767px){
				h1 *, h2 *, h3 *, h4 *, h5 *, h6 *, label, h1, h2, h3, h4, h5, h6 {
					font-size:<?php echo $font_size_m; ?>px;
				}
			}

			h1 *, h2 *, h3 *, h4 *, h5 *, h6 *, p * { color: inherit; font-size: inherit; }

			.header { <?php if($header_styl == 'header_styl_1'){ ?>position: sticky;<?php }elseif($header_styl == 'header_styl_2'){ ?>position:fixed;<?php } ?> }

			.header:before { background-color:<?php echo $header_bg; ?>; opacity:<?php echo $header_opacity; ?>;  }

			.header, .header ul li a {  border-color:<?php echo $border_color; ?> !important; }

			.header ul li a { color:<?php echo $menu_color; ?>; }

			.header ul li a:hover,

			.header ul li.current_page_item a { color:<?php echo $menu_a_color; ?>; background-color:<?php echo $m_bg_a_color; ?>; }

			

			#top_bar { background:<?php echo $topbar_bg; ?>; }

			#top_bar, #top_bar ul li a,

			#top_bar p { color:<?php echo $topbar_color; ?>; }

			

			#footer { background:<?php echo $footer_bg; ?>; }

			#footer, #footer ul li a, #footer *,

			#footer p { color:<?php echo $footer_color; ?>; }

			button, .btn { background:<?php echo $button_bg; ?>; color:<?php echo $button_color; ?>; }



         </style>

    <?php

}



function my_customizer_settings($wp_customize) {


	/*============ TOPBAR SETTINGS =============*/

	$wp_customize->add_section('topbar_sec', array( 'title' => __('Topbar Settings', 'textdomain'), 'priority' => 81, ));

	$wp_customize->add_setting('top_bar_opt', array( 'default' => '', 'transport' => 'refresh', 'sanitize_callback' => 'sanitize_text_field', ));

    $wp_customize->add_control('top_bar_opt', array(

        'label' => __('TOP BAR', 'textdomain'),

        'section' => 'topbar_sec',

        'type' => 'checkbox',

    ));

	$wp_customize->add_setting('topbar_bg', array( 'default' => '#000', 'sanitize_callback' => 'sanitize_hex_color', ));

    $wp_customize->add_control(new WP_Customize_Color_Control($wp_customize, 'topbar_bg', array(

        'label'    => __('Background Color'),

        'section'  => 'topbar_sec',

        'settings' => 'topbar_bg',

		'active_callback' => 'is_top_bar_opt_checked',

		'priority' => 10,

    )));

	$wp_customize->add_setting('topbar_color', array( 'default' => '#fff', 'sanitize_callback' => 'sanitize_hex_color', ));

    $wp_customize->add_control(new WP_Customize_Color_Control($wp_customize, 'topbar_color', array(

        'label'    => __('Text Color'),

        'section'  => 'topbar_sec',

        'settings' => 'topbar_color',

		'active_callback' => 'is_top_bar_opt_checked',

		'priority' => 10,

    )));

	$wp_customize->add_setting('tbar_content', array( 'default' => '', 'transport' => 'refresh', 'sanitize_callback' => 'sanitize_text_field', ));

    $wp_customize->add_control('tbar_content', array(

        'label' => __('TOP BAR CONTENT', 'textdomain'),

        'section' => 'topbar_sec',

        'type' => 'text',

		'active_callback' => 'is_top_bar_opt_checked',

    ));

	$wp_customize->add_setting('tbar_alignmen', array( 'default' => 'align_c', 'transport' => 'refresh', 'sanitize_callback' => 'sanitize_text_field', ));

    $wp_customize->add_control('tbar_alignmen', array(

        'label' => __('CONTENT AlIGNMENT', 'textdomain'),

        'section' => 'topbar_sec',

        'type' => 'radio',

		'choices' => array(

			'align_c' => __('Center', 'textdomain'),

			'align_l' => __('Left', 'textdomain'),

			'align_r' => __('Right', 'textdomain'),

		),

		'active_callback' => 'is_top_bar_opt_checked',

    ));

	$wp_customize->add_setting('tbar_social', array( 'default' => '', 'transport' => 'refresh', 'sanitize_callback' => 'sanitize_text_field', ));

    $wp_customize->add_control('tbar_social', array(

        'label' => __('SHOW SOCIAL MEDIA ICONS', 'textdomain'),

        'section' => 'topbar_sec',

        'type' => 'checkbox',

		'active_callback' => 'is_top_bar_opt_checked',

    ));

	$wp_customize->add_setting('tbar_social_s_facebook', array( 'default' => '1', 'transport' => 'refresh', 'sanitize_callback' => 'sanitize_text_field', ));

    $wp_customize->add_control('tbar_social_s_facebook', array(

        'label' => __('Facebook', 'textdomain'),

        'section' => 'topbar_sec',

        'type' => 'checkbox',

		'active_callback' => 'is_top_bar_opt_checked',

    ));

    $wp_customize->add_setting('tbar_social_c_twitter', array( 'default' => '1', 'transport' => 'refresh', 'sanitize_callback' => 'sanitize_text_field', ));

    $wp_customize->add_control('tbar_social_c_twitter', array(

        'label' => __('Twitter', 'textdomain'),

        'section' => 'topbar_sec',

        'type' => 'checkbox',

		'active_callback' => 'is_top_bar_opt_checked',

    ));

	$wp_customize->add_setting('tbar_social_c_youtube', array( 'default' => '1', 'transport' => 'refresh', 'sanitize_callback' => 'sanitize_text_field', ));

    $wp_customize->add_control('tbar_social_c_youtube', array(

        'label' => __('Youtube', 'textdomain'),

        'section' => 'topbar_sec',

        'type' => 'checkbox',

		'active_callback' => 'is_top_bar_opt_checked',

    ));        


	$wp_customize->add_setting('tbar_social_c_instagram', array( 'default' => '1', 'transport' => 'refresh', 'sanitize_callback' => 'sanitize_text_field', ));

    $wp_customize->add_control('tbar_social_c_instagram', array(

        'label' => __('Instagram', 'textdomain'),

        'section' => 'topbar_sec',

        'type' => 'checkbox',

		'active_callback' => 'is_top_bar_opt_checked',

    ));   

	$wp_customize->add_setting('tbar_social_c_linkedin', array( 'default' => '1', 'transport' => 'refresh', 'sanitize_callback' => 'sanitize_text_field', ));

    $wp_customize->add_control('tbar_social_c_linkedin', array(

        'label' => __('LinkedIn', 'textdomain'),

        'section' => 'topbar_sec',

        'type' => 'checkbox',

		'active_callback' => 'is_top_bar_opt_checked',

    ));   

	$wp_customize->add_setting('tbar_social_c_pinterest', array( 'default' => '1', 'transport' => 'refresh', 'sanitize_callback' => 'sanitize_text_field', ));

    $wp_customize->add_control('tbar_social_c_pinterest', array(

        'label' => __('Pinterest', 'textdomain'),

        'section' => 'topbar_sec',

        'type' => 'checkbox',

		'active_callback' => 'is_top_bar_opt_checked',

    ));  

	$wp_customize->add_setting('tbar_social_c_tiktok', array( 'default' => '1', 'transport' => 'refresh', 'sanitize_callback' => 'sanitize_text_field', ));

    $wp_customize->add_control('tbar_social_c_tiktok', array(

        'label' => __('Tiktok', 'textdomain'),

        'section' => 'topbar_sec',

        'type' => 'checkbox',

		'active_callback' => 'is_top_bar_opt_checked',

    ));

	$wp_customize->add_setting('tbar_social_c_whatsapp', array( 'default' => '1', 'transport' => 'refresh', 'sanitize_callback' => 'sanitize_text_field', ));

    $wp_customize->add_control('tbar_social_c_whatsapp', array(

        'label' => __('WhatsApp', 'textdomain'),

        'section' => 'topbar_sec',

        'type' => 'checkbox',

		'active_callback' => 'is_top_bar_opt_checked',

    ));         
	function is_top_bar_opt_checked($control) {

		return $control->manager->get_setting('top_bar_opt')->value() === '1';

	}

	/*============ TOPBAR SETTINGS END =============*/
	

	/*============ CONTACT SETTINGS =============*/

	$wp_customize->add_section('contact_sec', array( 'title' => __('Contact Details', 'textdomain'), 'priority' => 88, ));

	$wp_customize->add_setting('c_address', array( 'default' => '', 'transport' => 'refresh', 'sanitize_callback' => 'sanitize_text_field', ));

    $wp_customize->add_control('c_address', array(

        'label' => __('Address', 'textdomain'),

        'section' => 'contact_sec',

        'type' => 'textarea',

    ));

	$wp_customize->add_setting('c_email', array( 'default' => '', 'transport' => 'refresh', 'sanitize_callback' => 'sanitize_text_field', ));

    $wp_customize->add_control('c_email', array(

        'label' => __('Email', 'textdomain'),

        'section' => 'contact_sec',

        'type' => 'text',

    ));

	$wp_customize->add_setting('c_phone', array( 'default' => '', 'transport' => 'refresh', 'sanitize_callback' => 'sanitize_text_field', ));

    $wp_customize->add_control('c_phone', array(

        'label' => __('Phone', 'textdomain'),

        'section' => 'contact_sec',

        'type' => 'text',

    ));

	$wp_customize->add_setting('c_hours', array( 'default' => '', 'transport' => 'refresh', 'sanitize_callback' => 'sanitize_text_field', ));

    $wp_customize->add_control('c_hours', array(

        'label' => __('Working Hours', 'textdomain'),

        'section' => 'contact_sec',

        'type' => 'textarea',

    ));

	/*============ CONTACT SETTINGS END =============*/

	

	/*============ SOCIAL ICONS SETTINGS =============*/

	$wp_customize->add_section('social_sec', array( 'title' => __('Social Icons', 'textdomain'), 'priority' => 88, ));



	$wp_customize->add_setting('social_bg_clr', array( 'default' => '#ffffff00', 'sanitize_callback' => 'sanitize_hex_color', ));

    $wp_customize->add_control(new WP_Customize_Color_Control($wp_customize, 'social_bg_clr', array(

        'label'    => __('Background Color'),

        'section'  => 'social_sec',

        'settings' => 'social_bg_clr',

		'priority' => 10,

    )));

	$wp_customize->add_setting('social_clr', array( 'default' => '#000', 'sanitize_callback' => 'sanitize_hex_color', ));

    $wp_customize->add_control(new WP_Customize_Color_Control($wp_customize, 'social_clr', array(

        'label'    => __('Icon Color'),

        'section'  => 'social_sec',

        'settings' => 'social_clr',

		'priority' => 10,

    )));



	$wp_customize->add_setting('s_facebook', array( 'default' => '', 'transport' => 'refresh', 'sanitize_callback' => 'sanitize_text_field', ));

    $wp_customize->add_control('s_facebook', array(

        'label' => __('Facebook', 'textdomain'),

        'section' => 'social_sec',

        'type' => 'text',

    ));

	$wp_customize->add_setting('c_twitter', array( 'default' => '', 'transport' => 'refresh', 'sanitize_callback' => 'sanitize_text_field', ));

    $wp_customize->add_control('c_twitter', array(

        'label' => __('X / Twitter', 'textdomain'),

        'section' => 'social_sec',

        'type' => 'text',

    ));

	$wp_customize->add_setting('c_youtube', array( 'default' => '', 'transport' => 'refresh', 'sanitize_callback' => 'sanitize_text_field', ));

    $wp_customize->add_control('c_youtube', array(

        'label' => __('Youtube', 'textdomain'),

        'section' => 'social_sec',

        'type' => 'text',

    ));

	$wp_customize->add_setting('c_instagram', array( 'default' => '', 'transport' => 'refresh', 'sanitize_callback' => 'sanitize_text_field', ));

    $wp_customize->add_control('c_instagram', array(

        'label' => __('Instagram', 'textdomain'),

        'section' => 'social_sec',

        'type' => 'text',

    ));

	$wp_customize->add_setting('c_linkedin', array( 'default' => '', 'transport' => 'refresh', 'sanitize_callback' => 'sanitize_text_field', ));

    $wp_customize->add_control('c_linkedin', array(

        'label' => __('LinkedIn', 'textdomain'),

        'section' => 'social_sec',

        'type' => 'text',

    ));

	$wp_customize->add_setting('c_pinterest', array( 'default' => '', 'transport' => 'refresh', 'sanitize_callback' => 'sanitize_text_field', ));

    $wp_customize->add_control('c_pinterest', array(

        'label' => __('Pinterest', 'textdomain'),

        'section' => 'social_sec',

        'type' => 'text',

    ));

	$wp_customize->add_setting('c_tiktok', array( 'default' => '', 'transport' => 'refresh', 'sanitize_callback' => 'sanitize_text_field', ));

    $wp_customize->add_control('c_tiktok', array(

        'label' => __('Tiktok', 'textdomain'),

        'section' => 'social_sec',

        'type' => 'text',

    ));

	$wp_customize->add_setting('c_whatsapp', array( 'default' => '', 'transport' => 'refresh', 'sanitize_callback' => 'sanitize_text_field', ));

    $wp_customize->add_control('c_whatsapp', array(

        'label' => __('WhatsApp', 'textdomain'),

        'section' => 'social_sec',

        'type' => 'text',

    ));

	/*============ CONTACT SETTINGS END =============*/

	

	/*=== REMOVE SECTIONS ===*/

	$wp_customize->remove_section('colors');

	$wp_customize->remove_section('static_front_page');

}



	function customizer_styles() {

		wp_register_style('custom-style', get_template_directory_uri() . '/dv-builder/assets/css/customizer.css', array(), '1.0', 'all');

		wp_enqueue_style('custom-style');

	}

	add_action('admin_enqueue_scripts', 'customizer_styles');



add_action('customize_register', 'my_customizer_settings');