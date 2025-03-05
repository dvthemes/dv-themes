<?php 

/*============ FOOTER SETTINGS =============*/

$wp_customize->add_panel('general_settings', array( 'title' => __('General Settings', 'textdomain'), 'priority' => 30, ));



/*=== THEME COLOR SETTINGS ===*/

$wp_customize->add_section('background_image', array( 'title' => __('Website Colors', 'textdomain'), 'priority' => 10, 'panel' => 'general_settings', ));

$wp_customize->add_setting('bg_color', array(

	'default'           => '#fff',

	'transport'			=> 'refresh',

	'sanitize_callback' => 'sanitize_hex_color',

));

$wp_customize->add_control(new WP_Customize_Color_Control($wp_customize, 'bg_color', array(

	'label'    => __('Background Color'),

	'section'  => 'background_image',

	'settings' => 'bg_color',

	'priority' => 1,

)));

$wp_customize->add_setting('heading_color', array(

	'default'           => '#000',

	'sanitize_callback' => 'sanitize_hex_color',

));

$wp_customize->add_control(new WP_Customize_Color_Control($wp_customize, 'heading_color', array(

	'label'    => __('Heading Color'),

	'section'  => 'background_image',

	'settings' => 'heading_color',

	'priority' => 20,

)));

$wp_customize->add_setting('text_color', array(

	'default'           => '#000',

	'sanitize_callback' => 'sanitize_hex_color',

));

$wp_customize->add_control(new WP_Customize_Color_Control($wp_customize, 'text_color', array(

	'label'    => __('Text Color'),

	'section'  => 'background_image',

	'settings' => 'text_color',

	'priority' => 30,

)));

$wp_customize->add_setting('button_color', array(

	'default'           => '#000',

	'sanitize_callback' => 'sanitize_hex_color',

));

$wp_customize->add_control(new WP_Customize_Color_Control($wp_customize, 'button_color', array(

	'label'    => __('Button Background Color'),

	'section'  => 'background_image',

	'settings' => 'button_color',

	'priority' => 31,

)));

$wp_customize->add_setting('button_txt_color', array(

	'default'           => '#000',

	'sanitize_callback' => 'sanitize_hex_color',

));

$wp_customize->add_control(new WP_Customize_Color_Control($wp_customize, 'button_txt_color', array(

	'label'    => __('Button Text Color'),

	'section'  => 'background_image',

	'settings' => 'button_txt_color',

	'priority' => 32,

)));

/*=== THEME COLOR SETTINGS END ===*/



/*============ THEME FONTS SETTINGS =============*/

$wp_customize->add_section('typo_settings', array( 'title' => __('Website Fonts Style', 'textdomain'), 'priority' => 10, 'panel' => 'general_settings', ));

$wp_customize->add_setting('gnrl_fonts', array( 'default' => 'bebas', 'transport' => 'refresh', 'sanitize_callback' => 'sanitize_text_field', ));

$wp_customize->add_control('gnrl_fonts', array(

	'label' => __('Select Heading Fonts', 'textdomain'),

	'section' => 'typo_settings',

	'settings' => 'gnrl_fonts',

	'type' => 'select',

	'choices' => array(

		'bebas' => __('Bebas Neue', 'textdomain'),

		'poppoins' => __('Poppoins', 'textdomain'),

		'playfair' => __('Playfair', 'textdomain'),

		'open_sans' => __('Open Sans', 'textdomain'),

		'black_ops' => __('Black Ops', 'textdomain'),

		'rowdies' => __('Rowdies', 'textdomain'),

		'medieval' => __('Medieval', 'textdomain'),

		'stick_bills' => __('Stick Bills', 'textdomain'),

		'sirin_stencil' => __('Sirin Stencil', 'textdomain'),

		'kumar' => __('Stencil One', 'textdomain'),

	),

));

$wp_customize->add_setting('h_f_size', array( 'default' => '30', 'transport' => 'refresh', 'sanitize_callback' => 'absint', ));

$wp_customize->add_control('h_f_size', array(

	'label' => __('Heading Font Size(Desktop)', 'textdomain'),

	'section' => 'typo_settings',

	'type' => 'number',

));
$wp_customize->add_setting('h_f_size_m', array( 'default' => '22', 'transport' => 'refresh', 'sanitize_callback' => 'absint', ));

$wp_customize->add_control('h_f_size_m', array(

	'label' => __('Heading Font Size(Mobile)', 'textdomain'),

	'section' => 'typo_settings',

	'type' => 'number',

));
$wp_customize->add_setting('h_f_size_p', array( 'default' => '30', 'transport' => 'refresh', 'sanitize_callback' => 'absint', ));

$wp_customize->add_control('h_f_size_p', array(

	'label' => __('Heading Font Size(Ipad)', 'textdomain'),

	'section' => 'typo_settings',

	'type' => 'number',

));

$wp_customize->add_setting('font_w', array( 'default' => '400', 'transport' => 'refresh', 'sanitize_callback' => 'absint', ));

$wp_customize->add_control('font_w', array(

	'label' => __('Heading Font Weight', 'textdomain'),

	'section' => 'typo_settings',

	'type' => 'radio',

	'choices' => array(

		'400' => __('Normal', 'textdomain'),

		'600' => __('Bold', 'textdomain'),

		'800' => __('Extra Bold', 'textdomain'),

	),

));

$wp_customize->add_setting('txt_fonts', array( 'default' => 'poppoins', 'transport' => 'refresh', 'sanitize_callback' => 'sanitize_text_field', ));

$wp_customize->add_control('txt_fonts', array(

	'label' => __('Select Body Fonts', 'textdomain'),

	'section' => 'typo_settings',

	'settings' => 'txt_fonts',

	'type' => 'select',

	'choices' => array(

		'poppoins' => __('Poppoins', 'textdomain'),

		'open_sans' => __('Open Sans', 'textdomain'),

		'antic' => __('Antic', 'textdomain'),

		't_me_one' => __('Text Me One', 'textdomain'),

		'playfair' => __('Playfair', 'textdomain'),

		'medieval' => __('Medieval', 'textdomain'),

		'stick_bills' => __('Stick Bills', 'textdomain'),

		'sirin_stencil' => __('Sirin Stencil', 'textdomain'),

	),

));

$wp_customize->add_setting('h_f_t_size', array( 'default' => '16', 'transport' => 'refresh', 'sanitize_callback' => 'absint', ));

$wp_customize->add_control('h_f_t_size', array(

	'label' => __('Body Font Size', 'textdomain'),

	'section' => 'typo_settings',

	'type' => 'number',

));

/*============ THEME FONTS SETTINGS END =============*/