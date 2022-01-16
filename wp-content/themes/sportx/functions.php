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
        filemtime('wp-content\themes\sportx\style.css'),
        'all'
    );
    wp_enqueue_style(
        'sportXMainStylesheet',
        get_template_directory_uri() . '/assets/css/main.css',
        array('sportXBootstrap', 'sportXFontAwesome'),
        filemtime('wp-content\themes\sportx\assets\css\main.css'),
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
        filemtime('wp-content\themes\sportx\assets\js\main.js'),
        true
    );
}

add_action(
    'wp_enqueue_scripts',
    'sportXRegisterScripts'
);

function register_venue_taxonomy()
{
    $labels = array(
        'name'                       => _x('Venue Taxonomies', 'Taxonomy General Name', 'SportX'),
        'singular_name'              => _x('Venue Taxonomy', 'Taxonomy Singular Name', 'SportX'),
        'menu_name'                  => __('Venue Taxonomy', 'SportX'),
        'all_items'                  => __('All Venue taxonomies', 'SportX'),
        'parent_item'                => __('Parent Item', 'SportX'),
        'parent_item_colon'          => __('Parent Item:', 'SportX'),
        'new_item_name'              => __('New Venue taxonomy Name', 'SportX'),
        'add_new_item'               => __('Add New Venue taxonomy', 'SportX'),
        'edit_item'                  => __('Edit Venue taxonomy', 'SportX'),
        'update_item'                => __('Update Venue taxonomy', 'SportX'),
        'view_item'                  => __('View Venue taxonomy', 'SportX'),
        'separate_items_with_commas' => __('Separate Venue taxonomies with commas', 'SportX'),
        'add_or_remove_items'        => __('Add or remove Venue taxonomies', 'SportX'),
        'choose_from_most_used'      => __('Choose from the most used Venue taxonomies', 'SportX'),
        'popular_items'              => __('Popular Venue taxonomies', 'SportX'),
        'search_items'               => __('Search Venue taxonomies', 'SportX'),
        'not_found'                  => __('No Venue taxonomies Found', 'SportX'),
        'no_terms'                   => __('No Venue taxonomies', 'SportX'),
        'items_list'                 => __('Venue taxonomies list', 'SportX'),
        'items_list_navigation'      => __('Venue taxonomies list navigation', 'SportX'),
    );
    $args = array(
        'labels'                     => $labels,
        'hierarchical'               => false,
        'public'                     => true,
        'show_ui'                    => true,
        'show_admin_column'          => true,
        'show_in_nav_menus'          => true,
        'show_tagcloud'              => true,
    );
    register_taxonomy('t_venue', array('team'), $args);
}
add_action('init', 'register_venue_taxonomy', 0);

function register_city_taxonomy()
{
    $labels = array(
        'name'                       => _x('Cities', 'Taxonomy General Name', 'SportX'),
        'singular_name'              => _x('City', 'Taxonomy Singular Name', 'SportX'),
        'menu_name'                  => __('City', 'SportX'),
        'all_items'                  => __('All Cities', 'SportX'),
        'parent_item'                => __('Parent Item', 'SportX'),
        'parent_item_colon'          => __('Parent Item:', 'SportX'),
        'new_item_name'              => __('New City Name', 'SportX'),
        'add_new_item'               => __('Add New City', 'SportX'),
        'edit_item'                  => __('Edit City', 'SportX'),
        'update_item'                => __('Update City', 'SportX'),
        'view_item'                  => __('View City', 'SportX'),
        'separate_items_with_commas' => __('Separate cities with commas', 'SportX'),
        'add_or_remove_items'        => __('Add or remove cities', 'SportX'),
        'choose_from_most_used'      => __('Choose from the most used cities', 'SportX'),
        'popular_items'              => __('Popular Cities', 'SportX'),
        'search_items'               => __('Search Cities', 'SportX'),
        'not_found'                  => __('No cities Found', 'SportX'),
        'no_terms'                   => __('No cities', 'SportX'),
        'items_list'                 => __('Cities list', 'SportX'),
        'items_list_navigation'      => __('Cities list navigation', 'SportX'),
    );
    $args = array(
        'labels'                     => $labels,
        'hierarchical'               => false,
        'public'                     => true,
        'show_ui'                    => true,
        'show_admin_column'          => true,
        'show_in_nav_menus'          => true,
        'show_tagcloud'              => true,
    );
    register_taxonomy('t_city', array('team', 'venue'), $args);
}
add_action('init', 'register_city_taxonomy', 0);

function register_country_taxonomy()
{
    $labels = array(
        'name'                       => _x('Countries', 'Taxonomy General Name', 'SportX'),
        'singular_name'              => _x('Country', 'Taxonomy Singular Name', 'SportX'),
        'menu_name'                  => __('Country', 'SportX'),
        'all_items'                  => __('All Countries', 'SportX'),
        'parent_item'                => __('Parent Item', 'SportX'),
        'parent_item_colon'          => __('Parent Item:', 'SportX'),
        'new_item_name'              => __('New Country Name', 'SportX'),
        'add_new_item'               => __('Add New Country', 'SportX'),
        'edit_item'                  => __('Edit Country', 'SportX'),
        'update_item'                => __('Update Country', 'SportX'),
        'view_item'                  => __('View Country', 'SportX'),
        'separate_items_with_commas' => __('Separate countries with commas', 'SportX'),
        'add_or_remove_items'        => __('Add or remove countries', 'SportX'),
        'choose_from_most_used'      => __('Choose from the most used countries', 'SportX'),
        'popular_items'              => __('Popular Countries', 'SportX'),
        'search_items'               => __('Search Countries', 'SportX'),
        'not_found'                  => __('No countries Found', 'SportX'),
        'no_terms'                   => __('No countries', 'SportX'),
        'items_list'                 => __('Countries list', 'SportX'),
        'items_list_navigation'      => __('Countries list navigation', 'SportX'),
    );
    $args = array(
        'labels'                     => $labels,
        'hierarchical'               => false,
        'public'                     => true,
        'show_ui'                    => true,
        'show_admin_column'          => true,
        'show_in_nav_menus'          => true,
        'show_tagcloud'              => true,
    );
    register_taxonomy('t_country', array('team', 'venue'), $args);
}
add_action('init', 'register_country_taxonomy', 0);

function register_surface_taxonomy()
{
    $labels = array(
        'name'                       => _x('Surfaces', 'Taxonomy General Name', 'SportX'),
        'singular_name'              => _x('Surface', 'Taxonomy Singular Name', 'SportX'),
        'menu_name'                  => __('Surface', 'SportX'),
        'all_items'                  => __('All Surfaces', 'SportX'),
        'parent_item'                => __('Parent Item', 'SportX'),
        'parent_item_colon'          => __('Parent Item:', 'SportX'),
        'new_item_name'              => __('New Surface Name', 'SportX'),
        'add_new_item'               => __('Add New Surface', 'SportX'),
        'edit_item'                  => __('Edit Surface', 'SportX'),
        'update_item'                => __('Update Surface', 'SportX'),
        'view_item'                  => __('View Surface', 'SportX'),
        'separate_items_with_commas' => __('Separate Surfaces with commas', 'SportX'),
        'add_or_remove_items'        => __('Add or remove Surfaces', 'SportX'),
        'choose_from_most_used'      => __('Choose from the most used Surfaces', 'SportX'),
        'popular_items'              => __('Popular Surfaces', 'SportX'),
        'search_items'               => __('Search Surfaces', 'SportX'),
        'not_found'                  => __('No Surfaces Found', 'SportX'),
        'no_terms'                   => __('No Surfaces', 'SportX'),
        'items_list'                 => __('Surfaces list', 'SportX'),
        'items_list_navigation'      => __('Surfaces list navigation', 'SportX'),
    );
    $args = array(
        'labels'                     => $labels,
        'hierarchical'               => false,
        'public'                     => true,
        'show_ui'                    => true,
        'show_admin_column'          => true,
        'show_in_nav_menus'          => true,
        'show_tagcloud'              => true,
    );
    register_taxonomy('t_surface', array('venue'), $args);
}
add_action('init', 'register_surface_taxonomy', 0);

function register_season_taxonomy()
{
    $labels = array(
        'name'                       => _x('Seasons', 'Taxonomy General Name', 'SportX'),
        'singular_name'              => _x('Season', 'Taxonomy Singular Name', 'SportX'),
        'menu_name'                  => __('Season', 'SportX'),
        'all_items'                  => __('All Seasons', 'SportX'),
        'parent_item'                => __('Parent Item', 'SportX'),
        'parent_item_colon'          => __('Parent Item:', 'SportX'),
        'new_item_name'              => __('New Season Name', 'SportX'),
        'add_new_item'               => __('Add New Season', 'SportX'),
        'edit_item'                  => __('Edit Season', 'SportX'),
        'update_item'                => __('Update Season', 'SportX'),
        'view_item'                  => __('View Season', 'SportX'),
        'separate_items_with_commas' => __('Separate Seasons with commas', 'SportX'),
        'add_or_remove_items'        => __('Add or remove Seasons', 'SportX'),
        'choose_from_most_used'      => __('Choose from the most used Seasons', 'SportX'),
        'popular_items'              => __('Popular Seasons', 'SportX'),
        'search_items'               => __('Search Seasons', 'SportX'),
        'not_found'                  => __('No Seasons Found', 'SportX'),
        'no_terms'                   => __('No Seasons', 'SportX'),
        'items_list'                 => __('Seasons list', 'SportX'),
        'items_list_navigation'      => __('Seasons list navigation', 'SportX'),
    );
    $args = array(
        'labels'                     => $labels,
        'hierarchical'               => false,
        'public'                     => true,
        'show_ui'                    => true,
        'show_admin_column'          => true,
        'show_in_nav_menus'          => true,
        'show_tagcloud'              => true,
    );
    register_taxonomy('t_season', array('league', 'fixture'), $args);
}
add_action('init', 'register_season_taxonomy', 0);

function register_status_taxonomy()
{
    $labels = array(
        'name'                       => _x('Statuses', 'Taxonomy General Name', 'SportX'),
        'singular_name'              => _x('Status', 'Taxonomy Singular Name', 'SportX'),
        'menu_name'                  => __('Status', 'SportX'),
        'all_items'                  => __('All Statuses', 'SportX'),
        'parent_item'                => __('Parent Item', 'SportX'),
        'parent_item_colon'          => __('Parent Item:', 'SportX'),
        'new_item_name'              => __('New Status Name', 'SportX'),
        'add_new_item'               => __('Add New Status', 'SportX'),
        'edit_item'                  => __('Edit Status', 'SportX'),
        'update_item'                => __('Update Status', 'SportX'),
        'view_item'                  => __('View Status', 'SportX'),
        'separate_items_with_commas' => __('Separate Statuses with commas', 'SportX'),
        'add_or_remove_items'        => __('Add or remove Statuses', 'SportX'),
        'choose_from_most_used'      => __('Choose from the most used Statuses', 'SportX'),
        'popular_items'              => __('Popular Statuses', 'SportX'),
        'search_items'               => __('Search Statuses', 'SportX'),
        'not_found'                  => __('No Statuses Found', 'SportX'),
        'no_terms'                   => __('No Statuses', 'SportX'),
        'items_list'                 => __('Statuses list', 'SportX'),
        'items_list_navigation'      => __('Statuses list navigation', 'SportX'),
    );
    $args = array(
        'labels'                     => $labels,
        'hierarchical'               => false,
        'public'                     => true,
        'show_ui'                    => true,
        'show_admin_column'          => true,
        'show_in_nav_menus'          => true,
        'show_tagcloud'              => true,
    );
    register_taxonomy('t_status', array('fixture'), $args);
}
add_action('init', 'register_status_taxonomy', 0);

function register_league_taxonomy()
{
    $labels = array(
        'name'                       => _x('League taxonomies', 'Taxonomy General Name', 'SportX'),
        'singular_name'              => _x('League taxonomy', 'Taxonomy Singular Name', 'SportX'),
        'menu_name'                  => __('League taxonomy', 'SportX'),
        'all_items'                  => __('All League taxonomies', 'SportX'),
        'parent_item'                => __('Parent Item', 'SportX'),
        'parent_item_colon'          => __('Parent Item:', 'SportX'),
        'new_item_name'              => __('New League taxonomy Name', 'SportX'),
        'add_new_item'               => __('Add New League taxonomy', 'SportX'),
        'edit_item'                  => __('Edit League taxonomy', 'SportX'),
        'update_item'                => __('Update League taxonomy', 'SportX'),
        'view_item'                  => __('View League taxonomy', 'SportX'),
        'separate_items_with_commas' => __('Separate League taxonomies with commas', 'SportX'),
        'add_or_remove_items'        => __('Add or remove League taxonomies', 'SportX'),
        'choose_from_most_used'      => __('Choose from the most used League taxonomies', 'SportX'),
        'popular_items'              => __('Popular League taxonomies', 'SportX'),
        'search_items'               => __('Search League taxonomies', 'SportX'),
        'not_found'                  => __('No League taxonomies Found', 'SportX'),
        'no_terms'                   => __('No League taxonomies', 'SportX'),
        'items_list'                 => __('League taxonomies list', 'SportX'),
        'items_list_navigation'      => __('League taxonomies list navigation', 'SportX'),
    );
    $args = array(
        'labels'                     => $labels,
        'hierarchical'               => false,
        'public'                     => true,
        'show_ui'                    => true,
        'show_admin_column'          => true,
        'show_in_nav_menus'          => true,
        'show_tagcloud'              => true,
    );
    register_taxonomy('t_league', array('fixture'), $args);
}
add_action('init', 'register_league_taxonomy', 0);

function register_team_taxonomy()
{
    $labels = array(
        'name'                       => _x('Team taxonomies', 'Taxonomy General Name', 'SportX'),
        'singular_name'              => _x('Team taxonomy', 'Taxonomy Singular Name', 'SportX'),
        'menu_name'                  => __('Team taxonomy', 'SportX'),
        'all_items'                  => __('All Team taxonomies', 'SportX'),
        'parent_item'                => __('Parent Item', 'SportX'),
        'parent_item_colon'          => __('Parent Item:', 'SportX'),
        'new_item_name'              => __('New Team taxonomy Name', 'SportX'),
        'add_new_item'               => __('Add New Team taxonomy', 'SportX'),
        'edit_item'                  => __('Edit Team taxonomy', 'SportX'),
        'update_item'                => __('Update Team taxonomy', 'SportX'),
        'view_item'                  => __('View Team taxonomy', 'SportX'),
        'separate_items_with_commas' => __('Separate Team taxonomies with commas', 'SportX'),
        'add_or_remove_items'        => __('Add or remove Team taxonomies', 'SportX'),
        'choose_from_most_used'      => __('Choose from the most used Team taxonomies', 'SportX'),
        'popular_items'              => __('Popular Team taxonomies', 'SportX'),
        'search_items'               => __('Search Team taxonomies', 'SportX'),
        'not_found'                  => __('No Team taxonomies Found', 'SportX'),
        'no_terms'                   => __('No Team taxonomies', 'SportX'),
        'items_list'                 => __('Team taxonomies list', 'SportX'),
        'items_list_navigation'      => __('Team taxonomies list navigation', 'SportX'),
    );
    $args = array(
        'labels'                     => $labels,
        'hierarchical'               => false,
        'public'                     => true,
        'show_ui'                    => true,
        'show_admin_column'          => true,
        'show_in_nav_menus'          => true,
        'show_tagcloud'              => true,
    );
    register_taxonomy('t_team', array('fixture'), $args);
}
add_action('init', 'register_team_taxonomy', 0);

function register_team_post_type()
{
    $labels = array(
        'name'                  => _x('Teams', 'Post Type General Name', 'SportX'),
        'singular_name'         => _x('Team', 'Post Type Singular Name', 'SportX'),
        'menu_name'             => __('Teams', 'SportX'),
        'name_admin_bar'        => __('Teams', 'SportX'),
        'archives'              => __('Team Archives', 'SportX'),
        'attributes'            => __('Team Attributes', 'SportX'),
        'parent_item_colon'     => __('Parent Item:', 'SportX'),
        'all_items'             => __('All Teams', 'SportX'),
        'add_new_item'          => __('Add New Team', 'SportX'),
        'add_new'               => __('Add New', 'SportX'),
        'new_item'              => __('New Team', 'SportX'),
        'edit_item'             => __('Edit Team', 'SportX'),
        'update_item'           => __('Update Item', 'SportX'),
        'view_item'             => __('View Team', 'SportX'),
        'view_items'            => __('View Teams', 'SportX'),
        'search_items'          => __('Search Teams', 'SportX'),
        'not_found'             => __('No teams found', 'SportX'),
        'not_found_in_trash'    => __('No teams found in Trash', 'SportX'),
        'featured_image'        => __('Featured Image', 'SportX'),
        'set_featured_image'    => __('Set featured image', 'SportX'),
        'remove_featured_image' => __('Remove featured image', 'SportX'),
        'use_featured_image'    => __('Use as featured image', 'SportX'),
        'insert_into_item'      => __('Insert into team', 'SportX'),
        'uploaded_to_this_item' => __('Uploaded to this team', 'SportX'),
        'items_list'            => __('Teams list', 'SportX'),
        'items_list_navigation' => __('Teams list navigation', 'SportX'),
        'filter_items_list'     => __('Filter teams list', 'SportX'),
    );
    $args = array(
        'label'                 => __('Team', 'SportX'),
        'description'           => __('Football team', 'SportX'),
        'labels'                => $labels,
        'supports'              => array('title', 'editor'),
        'taxonomies'            => array('t_country', 't_venue', 't_city'),
        'hierarchical'          => false,
        'public'                => true,
        'show_ui'               => true,
        'show_in_menu'          => true,
        'menu_position'         => 5,
        'menu_icon'             => 'dashicons-groups',
        'show_in_admin_bar'     => true,
        'show_in_nav_menus'     => true,
        'can_export'            => true,
        'has_archive'           => true,
        'exclude_from_search'   => false,
        'publicly_queryable'    => true,
        'capability_type'       => 'page',
    );
    register_post_type('team', $args);
}
add_action('init', 'register_team_post_type', 0);

function register_venue_post_type()
{
    $labels = array(
        'name'                  => _x('Venues', 'Post Type General Name', 'SportX'),
        'singular_name'         => _x('Venue', 'Post Type Singular Name', 'SportX'),
        'menu_name'             => __('Venues', 'SportX'),
        'name_admin_bar'        => __('Venues', 'SportX'),
        'archives'              => __('Venue Archives', 'SportX'),
        'attributes'            => __('Venue Attributes', 'SportX'),
        'parent_item_colon'     => __('Parent Item:', 'SportX'),
        'all_items'             => __('All Venues', 'SportX'),
        'add_new_item'          => __('Add New Venue', 'SportX'),
        'add_new'               => __('Add New', 'SportX'),
        'new_item'              => __('New Venue', 'SportX'),
        'edit_item'             => __('Edit Venue', 'SportX'),
        'update_item'           => __('Update Venue', 'SportX'),
        'view_item'             => __('View Venue', 'SportX'),
        'view_items'            => __('View Venues', 'SportX'),
        'search_items'          => __('Search Venue', 'SportX'),
        'not_found'             => __('No venues found', 'SportX'),
        'not_found_in_trash'    => __('No venues found in Trash', 'SportX'),
        'featured_image'        => __('Featured Image', 'SportX'),
        'set_featured_image'    => __('Set featured image', 'SportX'),
        'remove_featured_image' => __('Remove featured image', 'SportX'),
        'use_featured_image'    => __('Use as featured image', 'SportX'),
        'insert_into_item'      => __('Insert into Venue', 'SportX'),
        'uploaded_to_this_item' => __('Uploaded to this Venue', 'SportX'),
        'items_list'            => __('Venues list', 'SportX'),
        'items_list_navigation' => __('Venues list navigation', 'SportX'),
        'filter_items_list'     => __('Filter venues list', 'SportX'),
    );
    $args = array(
        'label'                 => __('Venue', 'SportX'),
        'description'           => __('Venue', 'SportX'),
        'labels'                => $labels,
        'supports'              => array('title', 'editor'),
        'taxonomies'            => array('t_country', 't_city', 't_surface'),
        'hierarchical'          => false,
        'public'                => true,
        'show_ui'               => true,
        'show_in_menu'          => true,
        'menu_position'         => 5,
        'menu_icon'             => 'dashicons-location',
        'show_in_admin_bar'     => true,
        'show_in_nav_menus'     => true,
        'can_export'            => true,
        'has_archive'           => true,
        'exclude_from_search'   => false,
        'publicly_queryable'    => true,
        'capability_type'       => 'page',
    );
    register_post_type('venue', $args);
}
add_action('init', 'register_venue_post_type', 0);

function register_league_post_type()
{
    $labels = array(
        'name'                  => _x('Leagues', 'Post Type General Name', 'SportX'),
        'singular_name'         => _x('League', 'Post Type Singular Name', 'SportX'),
        'menu_name'             => __('League', 'SportX'),
        'name_admin_bar'        => __('League', 'SportX'),
        'archives'              => __('League Archives', 'SportX'),
        'attributes'            => __('League Attributes', 'SportX'),
        'parent_item_colon'     => __('Parent Item:', 'SportX'),
        'all_items'             => __('All Leagues', 'SportX'),
        'add_new_item'          => __('Add New League', 'SportX'),
        'add_new'               => __('Add New', 'SportX'),
        'new_item'              => __('New League', 'SportX'),
        'edit_item'             => __('Edit League', 'SportX'),
        'update_item'           => __('Update League', 'SportX'),
        'view_item'             => __('View League', 'SportX'),
        'view_items'            => __('View Leagues', 'SportX'),
        'search_items'          => __('Search League', 'SportX'),
        'not_found'             => __('No Leagues found', 'SportX'),
        'not_found_in_trash'    => __('No Leagues found in Trash', 'SportX'),
        'featured_image'        => __('Featured Image', 'SportX'),
        'set_featured_image'    => __('Set featured image', 'SportX'),
        'remove_featured_image' => __('Remove featured image', 'SportX'),
        'use_featured_image'    => __('Use as featured image', 'SportX'),
        'insert_into_item'      => __('Insert into League', 'SportX'),
        'uploaded_to_this_item' => __('Uploaded to this League', 'SportX'),
        'items_list'            => __('Leagues list', 'SportX'),
        'items_list_navigation' => __('Leagues list navigation', 'SportX'),
        'filter_items_list'     => __('Filter Leagues list', 'SportX'),
    );
    $args = array(
        'label'                 => __('League', 'SportX'),
        'description'           => __('League', 'SportX'),
        'labels'                => $labels,
        'supports'              => array('title', 'editor'),
        'taxonomies'            => array('t_country', 't_season'),
        'hierarchical'          => false,
        'public'                => true,
        'show_ui'               => true,
        'show_in_menu'          => true,
        'menu_position'         => 5,
        'menu_icon'             => 'dashicons-networking',
        'show_in_admin_bar'     => true,
        'show_in_nav_menus'     => true,
        'can_export'            => true,
        'has_archive'           => true,
        'exclude_from_search'   => false,
        'publicly_queryable'    => true,
        'capability_type'       => 'page',
    );
    register_post_type('league', $args);
}
add_action('init', 'register_league_post_type', 0);

function register_fixture_post_type()
{
    $labels = array(
        'name'                  => _x('Fixtures', 'Post Type General Name', 'SportX'),
        'singular_name'         => _x('Fixture', 'Post Type Singular Name', 'SportX'),
        'menu_name'             => __('Fixture', 'SportX'),
        'name_admin_bar'        => __('Fixture', 'SportX'),
        'archives'              => __('Fixture Archives', 'SportX'),
        'attributes'            => __('Fixture Attributes', 'SportX'),
        'parent_item_colon'     => __('Parent Item:', 'SportX'),
        'all_items'             => __('All Fixtures', 'SportX'),
        'add_new_item'          => __('Add New Fixture', 'SportX'),
        'add_new'               => __('Add New', 'SportX'),
        'new_item'              => __('New Fixture', 'SportX'),
        'edit_item'             => __('Edit Fixture', 'SportX'),
        'update_item'           => __('Update Fixture', 'SportX'),
        'view_item'             => __('View Fixture', 'SportX'),
        'view_items'            => __('View Fixtures', 'SportX'),
        'search_items'          => __('Search Fixture', 'SportX'),
        'not_found'             => __('No Fixtures found', 'SportX'),
        'not_found_in_trash'    => __('No Fixtures found in Trash', 'SportX'),
        'featured_image'        => __('Featured Image', 'SportX'),
        'set_featured_image'    => __('Set featured image', 'SportX'),
        'remove_featured_image' => __('Remove featured image', 'SportX'),
        'use_featured_image'    => __('Use as featured image', 'SportX'),
        'insert_into_item'      => __('Insert into Fixtures', 'SportX'),
        'uploaded_to_this_item' => __('Uploaded to this Fixture', 'SportX'),
        'items_list'            => __('Fixtures list', 'SportX'),
        'items_list_navigation' => __('Fixtures list navigation', 'SportX'),
        'filter_items_list'     => __('Filter Fixtures list', 'SportX'),
    );
    $args = array(
        'label'                 => __('Fixture', 'SportX'),
        'description'           => __('Fixture', 'SportX'),
        'labels'                => $labels,
        'supports'              => array('title', 'editor'),
        'taxonomies'            => array('t_venue', 't_status', 't_league', 't_team', 't_season'),
        'hierarchical'          => false,
        'public'                => true,
        'show_ui'               => true,
        'show_in_menu'          => true,
        'menu_position'         => 5,
        'menu_icon'             => 'dashicons-megaphone',
        'show_in_admin_bar'     => true,
        'show_in_nav_menus'     => true,
        'can_export'            => true,
        'has_archive'           => true,
        'exclude_from_search'   => false,
        'publicly_queryable'    => true,
        'capability_type'       => 'page',
    );
    register_post_type('fixture', $args);
}
add_action('init', 'register_fixture_post_type', 0);

function call_api($endpoint, $params)
{
    $curl = curl_init();

    curl_setopt_array($curl, array(
        CURLOPT_URL => 'https://v3.football.api-sports.io/' . $endpoint . $params,
        CURLOPT_RETURNTRANSFER => true,
        CURLOPT_ENCODING => '',
        CURLOPT_MAXREDIRS => 10,
        CURLOPT_TIMEOUT => 0,
        CURLOPT_FOLLOWLOCATION => true,
        CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
        CURLOPT_CUSTOMREQUEST => 'GET',
        CURLOPT_HTTPHEADER => array(
            'x-rapidapi-key: 4895cc0abec32e71c835525b6f063694',
            'x-rapidapi-host: v3.football.api-sports.io'
        ),
    ));

    $certificate_location = '../../../cacert.pem';
    curl_setopt($curl, CURLOPT_SSL_VERIFYHOST, $certificate_location);
    curl_setopt($curl, CURLOPT_SSL_VERIFYPEER, $certificate_location);

    $response = curl_exec($curl);

    if (curl_errno($curl)) {
        $error_msg = curl_error($curl);
    }

    if (isset($error_msg)) {
        var_dump($error_msg);
        die();
    }

    curl_close($curl);
    return $response;
}

function insert_specific_term($termName, $taxName, $optionsArr)
{
    if ($termName == null) {
        $termName = "N/A";
        $optionsArr['slug'] = "N/A" . $optionsArr['slug'];
    }
    $termIds = term_exists($optionsArr['slug'], $taxName);
    if ($termIds === null) {
        $termInsertResult = wp_insert_term($termName, $taxName, $optionsArr);
        if (is_wp_error($termInsertResult)) {
            var_dump($termInsertResult);
            die();
        } else {
            return $termInsertResult;
        }
    } else {
        return $termIds;
    }
}

function insert_specific_post($postTitle, $postName, $postType)
{
    if ($postTitle == null) {
        $postName = "N/A" . $postName;
        $postTitle = "N/A";
    }
    $postId = get_page_by_path($postName, OBJECT, $postType);
    if ($postId === null) {
        $postInsertResult = wp_insert_post(
            [
                'post_title' => $postTitle,
                'post_name' => $postName,
                'post_type' => $postType,
                'post_status' => 'publish',
                'comment_status' => 'closed',
                'ping_status' => 'closed'
            ],
            true
        );
        if (is_wp_error($postInsertResult)) {
            var_dump($postInsertResult);
            die();
        } else {
            return $postInsertResult;
        }
    } else {
        return $postId->ID;
    }
}

function insert_countries_in_wp()
{
    $countries = json_decode(call_api('countries', ''));
    foreach ($countries->response as $index => $country) {
        $countryTermIds = insert_specific_term($country->name, 't_country', [
            'slug' => sanitize_title('t_' . $country->name),
        ]);
        $fillable = [
            'field_61e2cdb635c83' => 'code',
            'field_61e2cdbe35c84' => 'flag'
        ];
        foreach ($fillable as $key => $name) {
            update_field($key, $country->$name, 't_country_' . $countryTermIds['term_id']);
        }
    }
}

// add_action('init', 'insert_countries_in_wp', 1);

function insert_venues_in_wp($country)
{
    if ($country == null) $country = 'Croatia';
    $venues = json_decode(call_api('venues', '?country=' . $country));
    foreach ($venues->response as $index => $venue) {
        insert_specific_term($venue->name, 't_venue', [
            'slug' => sanitize_title('t_' . $venue->name . '-' . $venue->id),
        ]);
        $countryTermIds = term_exists($country, 't_country');
        $surfaceTermIds = insert_specific_term($venue->surface, 't_surface', [
            'slug' => sanitize_title('t_' . $venue->surface),
        ]);
        $cityTermIds = insert_specific_term($venue->city, 't_city', [
            'slug' => sanitize_title('t_' . $venue->city),
        ]);
        $venueCPTInsertResult = insert_specific_post(
            $venue->name,
            sanitize_title($venue->name . '-' . $venue->id),
            'venue',
        );
        $fillable = [
            'field_61e3062c80095' => 'id',
            'field_61e3063680097' => 'address',
            'field_61e3064480098' => 'capacity',
            'field_61e3063080096' => 'image'
        ];
        foreach ($fillable as $key => $name) {
            update_field($key, $venue->$name, $venueCPTInsertResult);
        }
        wp_set_object_terms(
            $venueCPTInsertResult,
            get_term($countryTermIds['term_id'])->name,
            't_country',
            true
        );
        wp_set_object_terms(
            $venueCPTInsertResult,
            get_term($surfaceTermIds['term_id'])->name,
            't_surface',
            true
        );
        wp_set_object_terms(
            $venueCPTInsertResult,
            get_term($cityTermIds['term_id'])->name,
            't_city',
            true
        );
    }
}

// add_action('init', 'insert_venues_in_wp', 0);

function insert_teams_in_wp($country)
{
    if ($country == null) $country = 'Croatia';
    $teams = json_decode(call_api('teams', '?country=' . $country));
    foreach ($teams->response as $index => $team) {
        $venue = $team->venue;
        $team = $team->team;
        $venueTermIds = insert_specific_term($venue->name, 't_venue', [
            'slug' => sanitize_title('t_' . $venue->name . '-' . $venue->id),
        ]);
        insert_specific_term($team->name, 't_team', [
            'slug' => sanitize_title('t_' . $team->name . '-' . $team->id),
        ]);
        $countryTermIds = term_exists($team->country, 't_country');
        $cityTermIds = insert_specific_term($venue->city, 't_city', [
            'slug' => sanitize_title('t_' . $venue->city),
        ]);
        $teamCPTInsertResult = insert_specific_post(
            $team->name,
            sanitize_title($team->name . '-' . $team->id),
            'team',
        );
        $fillable = [
            'field_61e34bf727f72' => 'id',
            'field_61e34bfc27f73' => 'founded',
            'field_61e34c0727f74' => 'national',
            'field_61e34c1027f75' => 'logo'
        ];
        foreach ($fillable as $key => $name) {
            if ($name == 'national') {
                update_field($key, $team->$name ? 'national' : 'not national', $teamCPTInsertResult);
            } else {
                update_field($key, $team->$name, $teamCPTInsertResult);
            }
        }
        wp_set_object_terms(
            $teamCPTInsertResult,
            get_term($countryTermIds['term_id'])->name,
            't_country',
            true
        );
        wp_set_object_terms(
            $teamCPTInsertResult,
            get_term($venueTermIds['term_id'])->name,
            't_venue',
            true
        );
        wp_set_object_terms(
            $teamCPTInsertResult,
            get_term($cityTermIds['term_id'])->name,
            't_city',
            true
        );
    }
}

// add_action('init', 'insert_teams_in_wp', 0);

function insert_leagues_in_wp($country)
{
    if ($country == null) $country = 'Croatia';
    $leagues = json_decode(call_api('leagues', '?country=' . $country));
    foreach ($leagues->response as $index => $league) {
        $countryName = $league->country->name;
        $seasons = $league->seasons;
        $league = $league->league;
        insert_specific_term($league->name, 't_league', [
            'slug' => sanitize_title('t_' . $league->name . '-' . $league->id),
        ]);
        $countryTermIds = term_exists($countryName, 't_country');
        $leagueCPTInsertResult = insert_specific_post(
            $league->name,
            sanitize_title($league->name . '-' . $league->id),
            'league',
        );
        $fillable_league = [
            'field_61e357392fe12' => 'id',
            'field_61e3573f2fe13' => 'type',
            'field_61e357452fe14' => 'logo',
        ];
        foreach ($fillable_league as $key => $name) {
            update_field($key, $league->$name, $leagueCPTInsertResult);
        }
        foreach ($seasons as $season) {
            $seasonTermIds = insert_specific_term($season->year, 't_season', [
                'slug' => sanitize_title('t_' . $season->year),
            ]);
            $fillable_season = [
                'field_61e354c72dc3b' => 'start',
                'field_61e3561a2dc3c' => 'end',
                'field_61e356242dc3d' => 'current',
            ];
            foreach ($fillable_season as $key => $name) {
                if ($name == 'current') {
                    update_field($key, $season->$name ? 'current' : 'not current', 't_season_' . $seasonTermIds['term_id']);
                } else {
                    update_field($key, $season->$name, 't_season_' . $seasonTermIds['term_id']);
                }
            }
            wp_set_object_terms(
                $leagueCPTInsertResult,
                get_term($seasonTermIds['term_id'])->name,
                't_season',
                true
            );
        }
        wp_set_object_terms(
            $leagueCPTInsertResult,
            get_term($countryTermIds['term_id'])->name,
            't_country',
            true
        );
    }
}

// add_action('init', 'insert_leagues_in_wp', 0);

function insert_fixtures_in_wp()
{
    $leagues = get_posts([
        'post_type' => 'league',
        'post_status' => 'publish',
        'numberposts' => -1
    ]);
    foreach ($leagues as $league) {
        $post_meta = get_post_meta($league->ID);
        $seasons = wp_get_object_terms($league->ID, 't_season', array('fields' => 'names'));
        $count = "0";
        foreach ($seasons as $season) {
            $count = $count + 1;
            if ($count == 5) {
                echo "sleep";
                sleep(60);
                echo "sleep done";
                $count = 1;
            }
            $fixtures = json_decode(call_api('fixtures', '?league=' . $post_meta['id'][0] . '&season=' . $season));
            var_dump($fixtures);
            foreach ($fixtures->response as $index => $fixture) {
                $venue = $fixture->fixture->venue;
                $status = $fixture->fixture->status;
                $league = $fixture->league;
                $team_home = $fixture->teams->home;
                $team_away = $fixture->teams->away;
                $goals = $fixture->goals;
                $fixture = $fixture->fixture;
                $venueTermIds = insert_specific_term($venue->name, 't_venue', [
                    'slug' => sanitize_title('t_' . $venue->name . '-' . $venue->id),
                ]);
                $seasonTermIds = insert_specific_term($season, 't_season', [
                    'slug' => sanitize_title('t_' . $season),
                ]);
                $statusTermIds = insert_specific_term($status->long, 't_status', [
                    'slug' => sanitize_title('t_' . $status->long),
                ]);
                $leagueTermIds = insert_specific_term($league->name, 't_league', [
                    'slug' => sanitize_title('t_' . $league->name . '-' . $league->id),
                ]);
                $teamHomeTermIds = insert_specific_term($team_home->name, 't_team', [
                    'slug' => sanitize_title('t_' . $team_home->name . '-' . $team_home->id),
                ]);
                $teamAwayTermIds = insert_specific_term($team_away->name, 't_team', [
                    'slug' => sanitize_title('t_' . $team_away->name . '-' . $team_away->id),
                ]);
                $fixtureCPTInsertResult = insert_specific_post(
                    $team_home->name . '-' . $team_away->name,
                    sanitize_title($team_home->name . '-' . $team_away->name . '-' . $fixture->id),
                    'fixture',
                );
                $fillable = [
                    'field_61e35f4a443e7' => 'id',
                    'field_61e35f56443e8' => 'timezone',
                    'field_61e35f5f443e9' => 'timestamp',
                    'field_61e35fbc443ea' => 'referee',
                    'field_61e360ad443eb' => 'home_name',
                    'field_61e361f5443ec' => 'home_winner',
                    'field_61e361fe443ed' => 'away_name',
                    'field_61e36204443ee' => 'away_winner',
                    'field_61e36221443ef' => 'goals_home',
                    'field_61e36232443f0' => 'away_goals',
                ];
                foreach ($fillable as $key => $name) {
                    switch ($name) {
                        case "id":
                            update_field($key, $fixture->id, $fixtureCPTInsertResult);
                            break;
                        case "timezone":
                            update_field($key, $fixture->timezone, $fixtureCPTInsertResult);
                            break;
                        case "timestamp":
                            update_field($key, $fixture->timestamp, $fixtureCPTInsertResult);
                            break;
                        case "referee":
                            update_field($key, $fixture->referee, $fixtureCPTInsertResult);
                            break;
                        case "home_name":
                            update_field($key, $team_home->name, $fixtureCPTInsertResult);
                            break;
                        case "home_winner":
                            update_field($key, $team_home->winner ? 'Won' : 'Lost', $fixtureCPTInsertResult);
                            break;
                        case "away_name":
                            update_field($key, $team_away->name, $fixtureCPTInsertResult);
                            break;
                        case "away_winner":
                            update_field($key, $team_away->winner ? 'Won' : 'Lost', $fixtureCPTInsertResult);
                            break;
                        case "goals_home":
                            update_field($key, $goals->home, $fixtureCPTInsertResult);
                            break;
                        case "away_goals":
                            update_field($key, $goals->away, $fixtureCPTInsertResult);
                            break;
                    }
                }
                wp_set_object_terms(
                    $fixtureCPTInsertResult,
                    get_term($venueTermIds['term_id'])->name,
                    't_venue',
                    true
                );
                wp_set_object_terms(
                    $fixtureCPTInsertResult,
                    get_term($seasonTermIds['term_id'])->name,
                    't_season',
                    true
                );
                wp_set_object_terms(
                    $fixtureCPTInsertResult,
                    get_term($statusTermIds['term_id'])->name,
                    't_status',
                    true
                );
                wp_set_object_terms(
                    $fixtureCPTInsertResult,
                    get_term($leagueTermIds['term_id'])->name,
                    't_league',
                    true
                );
                wp_set_object_terms(
                    $fixtureCPTInsertResult,
                    get_term($teamHomeTermIds['term_id'])->name,
                    't_tean',
                    true
                );
                wp_set_object_terms(
                    $fixtureCPTInsertResult,
                    get_term($teamAwayTermIds['term_id'])->name,
                    't_team',
                    true
                );
            }
        }
    }
}

add_action('init', 'insert_fixtures_in_wp', 0);