<?php

function training_supports() {
    add_theme_support( 'title-tag' );
    add_theme_support( 'menus' );
    add_theme_support( 'html5' );
    register_nav_menu( 'header', 'En tête du menu' );
    register_nav_menu( 'footer', 'Pied de page' );
}

//import des differnet assets
function training_register_assets() {
    wp_register_style( 'bootstrap', 'https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css' );
    wp_register_script( 'bootstrap', 'https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js', [], false, true );
    if ( ! is_customize_preview() ) {
        wp_deregister_script( 'jquery' );
        wp_register_script( 'jquery', 'https://code.jquery.com/jquery-3.6.0.slim.min.js', [], false, true );
    }
    wp_enqueue_style( 'bootstrap' );
    wp_enqueue_script( 'bootstrap' );
}

add_action( 'after_setup_theme', 'training_supports' );
add_action( 'wp_enqueue_scripts', 'training_register_assets' );