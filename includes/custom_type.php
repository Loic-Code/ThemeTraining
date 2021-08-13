<?php

function themeTraining_types() {
    register_post_type('temoignage', [
        'label' => 'Témoignage',
        'public' => true,
        'menu_position' => 3,
        'menu_icon' => 'dashicons-format-quote',
        'supports' => ['title', 'editor', 'thumbnail'],
        'show_in_rest' => true,
        'has_archive' => true,
    ]);
}
add_action('init', 'themeTraining_types');