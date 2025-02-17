<?php

function custom_blocks_enqueue_script() {

    wp_enqueue_script(
        'custom-blocks',
        get_template_directory_uri() . '/dv-builder/blocks/custom-block/custom-blocks.js',
        array('wp-blocks', 'wp-editor'),
        true
    );
 
 $options = get_option( 'sample_theme_options' );

    $address = $options['addressOpt'];
    $workinghours = get_theme_mod('c_hours', 'Website Hours');
    $webphone = $options['phnOpt'];
    $web_mail = $options['emlOpt'];
    $fbUrl = $options['fbUrl'];
    $linkdUrl = $options['linkdUrl'];
    $instUrl = $options['instUrl'];
    $xUrl = $options['xUrl'];
    $youtubeUrl = $options['youtubeUrl'];
    $tiktokUrl = $options['tiktokUrl'];
    $whtsAppUrl = $options['whtsAppUrl'];
    $pintUrl = $options['pintUrl'];
    $businessOpt = $options['businessOpt'];
    $cpyrt = $options['cpyrt'];

    $options = get_option('sample_theme_options');

   wp_localize_script(
    'custom-blocks',
    'simpleBlockOptions',
    array(
        'emailOpt' => $web_mail,
        'addressOpt' => $address,
        'phoneOpt' => $webphone,
        'hoursOpt' => $workinghours,
        'fbUrl' => $fbUrl,
        'linkdUrl' => $linkdUrl,
        'instUrl' => $instUrl,
        'xUrl' => $xUrl,
        'youtubeUrl' => $youtubeUrl,
        'tiktokUrl' => $tiktokUrl,
        'whtsAppUrl' => $youtubeUrl,
        'pintUrl' => $tiktokUrl,
        'businessaddr' => $businessOpt,
        'copyright' => $cpyrt,
    )
);
}

add_action('enqueue_block_editor_assets', 'custom_blocks_enqueue_script');
