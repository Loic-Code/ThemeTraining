<?php

add_action('customize_register', function (WP_Customize_Manager $manager) {

    $manager->add_section('montheme_apparence', [
        'title' => 'Personnalisation de l\'apparence',
    ]);

    $manager->add_setting('primary_color', [
        'default' => '#FEAA00',
        'sanitize_callback' => 'sanitize_hex_color'
    ]);

    $manager->add_setting('secondary_color', [
        'default' => '#FFFFFF',
        'sanitize_callback' => 'sanitize_hex_color'
    ]);

    $manager->add_setting('dark_color', [
        'default' => '#000000',
        'sanitize_callback' => 'sanitize_hex_color'
    ]);

    $manager->add_setting('light_color', [
        'default' => '#FFFFFF',
        'sanitize_callback' => 'sanitize_hex_color'
    ]);


    $manager->add_control(new WP_Customize_Color_Control($manager, 'primary_color', [
        'section' => 'montheme_apparence',
        'label' => 'Couleur primaire'
    ]));
    
    $manager->add_control(new WP_Customize_Color_Control($manager, 'secondary_color', [
        'section' => 'montheme_apparence',
        'label' => 'Couleur secondaire'
    ]));

    $manager->add_control(new WP_Customize_Color_Control($manager, 'dark_color', [
        'section' => 'montheme_apparence',
        'label' => 'Couleur sombre'
    ]));
    $manager->add_control(new WP_Customize_Color_Control($manager, 'light_color', [
        'section' => 'montheme_apparence',
        'label' => 'Couleur clair'
    ]));
});
