<?php 

/*============ FOOTER SETTINGS =============*/

$wp_customize->add_panel('footer_set', array( 'title' => __('Footer Settings', 'textdomain'), 'priority' => 85, ));



$wp_customize->add_section('footer_c_color', array( 'title' => __('General Settings', 'textdomain'), 'priority' => 10, 'panel' => 'footer_set', ));

$wp_customize->add_setting('footer_bg', array( 'default' => '#000', 'transport' => 'refresh', 'sanitize_callback' => 'sanitize_hex_color', ));

$wp_customize->add_control(new WP_Customize_Color_Control($wp_customize, 'footer_bg', array(

	'label'    => __('Background Color'),

	'section'  => 'footer_c_color',

	'settings' => 'footer_bg',

	'priority' => 10,

)));

$wp_customize->add_setting('footer_color', array( 'default' => '#000', 'transport' => 'refresh', 'sanitize_callback' => 'sanitize_hex_color', ));

$wp_customize->add_control(new WP_Customize_Color_Control($wp_customize, 'footer_color', array(

	'label'    => __('Text Color'),

	'section'  => 'footer_c_color',

	'settings' => 'footer_color',

	'priority' => 10,

)));

$wp_customize->add_setting('footer_logo', array( 'default' => 'l_show', 'transport' => 'refresh', 'sanitize_callback' => 'sanitize_text_field', ));

$wp_customize->add_control('footer_logo', array(

	'label' => __('Footer Logo', 'textdomain'),

	'section' => 'footer_c_color',

	'type' => 'select',

	'choices' => array(

		'l_show' => __('Show', 'textdomain'),

		'l_hide' => __('Hide', 'textdomain'),

	),

));



$wp_customize->add_setting('footer_text', array( 'default' => '', 'transport' => 'refresh', 'sanitize_callback' => 'wp_kses_post', ));

$wp_customize->add_control('footer_text', array(

	'label' => __('Footer Text Col 1', 'textdomain'),

	'section' => 'footer_c_color',

	'type' => 'textarea',

));

$wp_customize->add_setting('footer_text2', array( 'default' => 'lorem', 'transport' => 'refresh', 'sanitize_callback' => 'wp_kses_post', ));

$wp_customize->add_control('footer_text2', array(

	'label' => __('Footer Text Col 2', 'textdomain'),

	'section' => 'footer_c_color',

	'type' => 'textarea',

));

$wp_customize->add_setting('footer_text3', array( 'default' => 'lorem', 'transport' => 'refresh', 'sanitize_callback' => 'wp_kses_post', ));

$wp_customize->add_control('footer_text3', array(

	'label' => __('Footer Text Col 3', 'textdomain'),

	'section' => 'footer_c_color',

	'type' => 'textarea',

));

$wp_customize->add_setting('footer_text4', array( 'default' => 'lorem', 'transport' => 'refresh', 'sanitize_callback' => 'wp_kses_post', ));

$wp_customize->add_control('footer_text4', array(

	'label' => __('Footer Text Col 4', 'textdomain'),

	'section' => 'footer_c_color',

	'type' => 'textarea',

));





$wp_customize->add_setting('social_icn', array( 'default' => '', 'transport' => 'refresh', 'sanitize_callback' => 'sanitize_text_field', ));

$wp_customize->add_control('social_icn', array( 'label' => __('Social Icons', 'textdomain'), 

	'section' => 'footer_c_color',

	'type' => 'checkbox',

));

$wp_customize->add_setting('social_icon_h_text', array( 'default' => '', 'transport' => 'refresh', 'sanitize_callback' => 'sanitize_text_field', ));

$wp_customize->add_control('social_icon_h_text', array(

	'label' => __('Social Icon Heading Text', 'textdomain'),

	'section' => 'footer_c_color',

	'type' => 'text',

	'active_callback' => 'is_social_checked',

));

$wp_customize->add_setting('social_loc', array( 'default' => 'social_column_1', 'transport' => 'refresh', 'sanitize_callback' => 'sanitize_text_field', ));

$wp_customize->add_control('social_loc', array( 'label' => __('Social Icons Position', 'textdomain'), 

	'section' => 'footer_c_color',

	'type' => 'select',

	'active_callback' => 'is_social_checked',

	'choices' => array(

		'social_column_1' => __('COLUMN 1', 'textdomain'),

		'social_column_2' => __('COLUMN 2', 'textdomain'),

		'social_column_3' => __('COLUMN 3', 'textdomain'),

		'social_column_4' => __('COLUMN 4', 'textdomain'),

		'social_copyright' => __('COPYRIGHT', 'textdomain'),

	),

));



function is_social_checked($control) {

	return $control->manager->get_setting('social_icn')->value() === '1';

}



$wp_customize->add_setting('copyright_show', array( 'default' => 'copy_show', 'transport' => 'refresh', 'sanitize_callback' => 'sanitize_text_field', ));

$wp_customize->add_control('copyright_show', array( 'label' => __('Copyright Text', 'textdomain'), 

	'section' => 'footer_c_color',

	'type' => 'radio',

	'choices' => array(

		'copy_show' => __('Show', 'textdomain'),

		'copy_hide' => __('Hide', 'textdomain'),

	),

));

$wp_customize->add_setting('copy_text', array( 'default' => '', 'transport' => 'refresh', 'sanitize_callback' => 'sanitize_text_field', ));

$wp_customize->add_control('copy_text', array( 'label' => __('Copyright Text', 'textdomain'), 

	'section' => 'footer_c_color',

	'type' => 'textarea',

));



$wp_customize->add_section('footer_column', array( 'title' => __('Footer Column', 'textdomain'), 'priority' => 10, 'panel' => 'footer_set', ));

$wp_customize->add_setting('footer_style', array( 'default' => 'footer_1', 'transport' => 'refresh', 'sanitize_callback' => 'sanitize_text_field', ));

$wp_customize->add_control('footer_style', array( 'label' => __('Footer Styles', 'textdomain'), 

	'section' => 'footer_column',

	'type' => 'select',

	'choices' => array(

		'default_footer' => __('Default', 'textdomain'),

		'footer_1' => __('1 Column Layout', 'textdomain'),

		'footer_2' => __('2 Column Layout', 'textdomain'),

		'footer_3' => __('3 Column Layout', 'textdomain'),

		'footer_4' => __('4 Column Layout', 'textdomain'),

	),

));

$wp_customize->add_setting('footer_col_text', array( 'default' => '', 'transport' => 'refresh', 'sanitize_callback' => 'sanitize_text_field', ));

$wp_customize->add_control('footer_col_text', array( 'label' => __('COLUMN 1 HEADING TEXT', 'textdomain'), 

	'section' => 'footer_column',

	'type' => 'text',

));

$wp_customize->add_setting('footer_col_1', array( 'default' => 'f_co_1', 'transport' => 'refresh', 'sanitize_callback' => 'sanitize_text_field', ));

$wp_customize->add_control('footer_col_1', array( 'label' => __('COLUMN 1 OPTION', 'textdomain'), 'section' => 'footer_column',

	'type' => 'radio',

	'choices' => array(

		'f_co_1' => __('Website Logo', 'textdomain'),

		'f_co_2' => __('Menu', 'textdomain'),

		'f_co_3' => __('Text Area', 'textdomain'),

		'f_co_4' => __('Contact Details', 'textdomain'),

		'f_co_5' => __('Hide', 'textdomain'),

	),

));

$wp_customize->add_setting('footer_col_text_2', array( 'default' => '', 'transport' => 'refresh', 'sanitize_callback' => 'sanitize_text_field', ));

$wp_customize->add_control('footer_col_text_2', array( 'label' => __('COLUMN 2 HEADING TEXT', 'textdomain'), 

	'section' => 'footer_column',

	'type' => 'text',

));

$wp_customize->add_setting('footer_col_2', array( 'default' => 'f_co_2', 'transport' => 'refresh', 'sanitize_callback' => 'sanitize_text_field', ));

$wp_customize->add_control('footer_col_2', array( 'label' => __('COLUMN 2 OPTION', 'textdomain'), 'section' => 'footer_column',

	'type' => 'radio',

	'choices' => array(

		'f_co_1' => __('Website Logo', 'textdomain'),

		'f_co_2' => __('Menu', 'textdomain'),

		'f_co_3' => __('Text Area', 'textdomain'),

		'f_co_4' => __('Contact Details', 'textdomain'),

		'f_co_5' => __('Hide', 'textdomain'),

	),

));

$wp_customize->add_setting('footer_col_text_3', array( 'default' => '', 'transport' => 'refresh', 'sanitize_callback' => 'sanitize_text_field', ));

$wp_customize->add_control('footer_col_text_3', array( 'label' => __('COLUMN 2 HEADING TEXT', 'textdomain'), 

	'section' => 'footer_column',

	'type' => 'text',

));

$wp_customize->add_setting('footer_col_3', array( 'default' => 'f_co_3', 'transport' => 'refresh', 'sanitize_callback' => 'sanitize_text_field', ));

$wp_customize->add_control('footer_col_3', array( 'label' => __('COLUMN 3 OPTION', 'textdomain'), 'section' => 'footer_column',

	'type' => 'radio',

	'choices' => array(

		'f_co_1' => __('Website Logo', 'textdomain'),

		'f_co_2' => __('Menu', 'textdomain'),

		'f_co_3' => __('Text Area', 'textdomain'),

		'f_co_4' => __('Contact Details', 'textdomain'),

		'f_co_5' => __('Hide', 'textdomain'),

	),

));

$wp_customize->add_setting('footer_col_text_4', array( 'default' => '', 'transport' => 'refresh', 'sanitize_callback' => 'sanitize_text_field', ));

$wp_customize->add_control('footer_col_text_4', array( 'label' => __('COLUMN 2 HEADING TEXT', 'textdomain'), 

	'section' => 'footer_column',

	'type' => 'text',

));

$wp_customize->add_setting('footer_col_4', array( 'default' => 'f_co_4', 'transport' => 'refresh', 'sanitize_callback' => 'sanitize_text_field', ));

$wp_customize->add_control('footer_col_4', array( 'label' => __('COLUMN 4 OPTION', 'textdomain'), 'section' => 'footer_column',

	'type' => 'radio',

	'choices' => array(

		'f_co_1' => __('Website Logo', 'textdomain'),

		'f_co_2' => __('Menu', 'textdomain'),

		'f_co_3' => __('Text Area', 'textdomain'),

		'f_co_4' => __('Contact Details', 'textdomain'),

		'f_co_5' => __('Hide', 'textdomain'),

	),

));



$wp_customize->add_section('footer_options', array( 'title' => __('Footer Bottom Text', 'textdomain'), 'priority' => 10, 'panel' => 'footer_set', ));



/*

$wp_customize->add_setting('footer_logo', array( 'default' => 'l_show', 'transport' => 'refresh', 'sanitize_callback' => 'sanitize_text_field', ));

$wp_customize->add_control('footer_logo', array(

	'label' => __('Footer Logo', 'textdomain'),

	'section' => 'footer_options',

	'type' => 'select',

	'choices' => array(

		'l_show' => __('Show', 'textdomain'),

		'l_hide' => __('Hide', 'textdomain'),

	),

));



$wp_customize->add_setting('footer_text', array( 'default' => '', 'transport' => 'refresh', 'sanitize_callback' => 'wp_kses_post', ));

$wp_customize->add_control('footer_text', array(

	'label' => __('Footer Text', 'textdomain'),

	'section' => 'footer_options',

	'type' => 'textarea',

));*/









/*============ FOOTER SETTINGS END =============*/

