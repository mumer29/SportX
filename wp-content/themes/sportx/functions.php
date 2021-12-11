<?php

function sportXThemeSupport()
{
    add_theme_support('title-tag');
}

add_action(
    'after_setup_theme',
    'sportXThemeSupport'
);

function sportXMenus()
{
    $locations = array(
        'left' => 'Main navbar left of brand',
        'right' => 'Main navbar right of brand'
    );

    register_nav_menus($locations);
}

add_action(
    'init',
    'sportXMenus'
);

function sportXRegisterStyles()
{
    $version = wp_get_theme()->get('Version');
    wp_enqueue_style(
        'sportXFontAwesome',
        get_template_directory_uri() . '/node_modules/@fortawesome/fontawesome-free/css/all.min.css',
        array(),
        '5.15.4',
        'all'
    );
    wp_enqueue_style(
        'sportXBootstrap',
        get_template_directory_uri() . '/node_modules/bootstrap/dist/css/bootstrap.min.css',
        array(),
        '5.1.3',
        'all'
    );
    wp_enqueue_style(
        'sportXStylesheet',
        get_template_directory_uri() . '/style.css',
        array('sportXBootstrap', 'sportXFontAwesome'),
        $version,
        'all'
    );
    wp_enqueue_style(
        'sportXMainStylesheet',
        get_template_directory_uri() . '/assets/css/main.css',
        array('sportXBootstrap', 'sportXFontAwesome'),
        '2.1',
        'all'
    );
}

add_action('wp_enqueue_scripts', 'sportXRegisterStyles');

function sportXRegisterScripts()
{
    $version = wp_get_theme()->get('Version');
    wp_enqueue_script(
        'sportXFontAwesome',
        get_template_directory_uri() . '/node_modules/@fortawesome/fontawesome-free/js/all.min.js',
        array(),
        '5.15.4',
        true
    );
    wp_enqueue_script(
        'sportXJQuery',
        get_template_directory_uri() . '/node_modules/jquery/dist/jquery.min.js',
        array(),
        '3.6.0',
        true
    );
    wp_enqueue_script(
        'sportXPopperJS',
        get_template_directory_uri() . '/node_modules/@popperjs/core/dist/umd/popper.min.js',
        array(),
        '2.11.0',
        true
    );
    wp_enqueue_script(
        'sportXBootstrap',
        get_template_directory_uri() . '/node_modules/bootstrap/dist/js/bootstrap.min.js',
        array("sportXJQuery", "sportXPopperJS"),
        '5.1.3',
        true
    );
    wp_enqueue_script(
        'sportXMain',
        get_template_directory_uri() . '/assets/js/main.js',
        array(),
        '2.1',
        true
    );
}

add_action(
    'wp_enqueue_scripts',
    'sportXRegisterScripts'
);