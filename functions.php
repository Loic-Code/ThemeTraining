<?php

function training_supports()
{
    add_theme_support('title-tag');
    add_theme_support( 'post-thumbnails' );
    add_theme_support('menus');
    add_theme_support('html5');
    add_theme_support('widgets');
    register_nav_menu('header', 'En tête du menu');
    register_nav_menu('footer', 'Pied de page');
    add_image_size('card-header', 350, 300, true);
}

//import des different assets
function training_register_assets()
{
    wp_register_style('bootstrap', 'https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css');
    wp_register_script('bootstrap', 'https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js', [], false, true);
    if (!is_customize_preview()) {
        wp_deregister_script('jquery');
        wp_register_script('jquery', 'https://code.jquery.com/jquery-3.6.0.slim.min.js', [], false, true);
    }
    wp_enqueue_style('bootstrap');
    wp_enqueue_script('bootstrap');
    wp_enqueue_style('default-style', get_template_directory_uri() . '/style.css');
    wp_enqueue_style('front-style', get_template_directory_uri() . '/assets/front-style.css');
    wp_enqueue_style('aboutUs', get_template_directory_uri() . '/assets/about.css');
}

function training_menu_class($classes) {
    $classes[] = 'nav-item';
    return $classes;
}

function training_menu_link_class($attrs) {
    $attrs['class'] = 'nav-link';
    return $attrs;
}

function training_get_page_by_template($template = '')
{
    $args = [
        'meta_key' => '_wp_page_template',
        'meta_value' => $template,
    ];

    return get_pages($args)[0]->ID;
}

add_action('after_setup_theme', 'training_supports');
add_action('wp_enqueue_scripts', 'training_register_assets');
add_filter('nav_menu_css_class', 'training_menu_class');
add_filter('nav_menu_link_attributes', 'training_menu_link_class');
