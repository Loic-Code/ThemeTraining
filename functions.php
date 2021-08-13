<?php

function training_supports()
{
    add_theme_support('title-tag');
    add_theme_support('post-thumbnails');
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
    wp_register_style('font-awesome', 'https://use.fontawesome.com/releases/v5.15.4/css/all.css');
    if (!is_customize_preview()) {
        wp_deregister_script('jquery');
        wp_register_script('jquery', 'https://code.jquery.com/jquery-3.6.0.slim.min.js', [], false, true);
    }

    wp_enqueue_style('bootstrap');
    wp_enqueue_script('bootstrap');
    wp_enqueue_style('font-awesome');
    wp_enqueue_style('default-style', get_template_directory_uri() . '/style.css');
    wp_enqueue_style('front-style', get_template_directory_uri() . '/assets/front-style.css');
    wp_enqueue_style('aboutUs', get_template_directory_uri() . '/assets/about.css');
    wp_enqueue_style('testimonyPage', get_template_directory_uri() . '/assets/testimony.css');
    wp_enqueue_style('testimonyHome', get_template_directory_uri() . '/assets/home-testimony.css');
}

function training_menu_class($classes)
{
    $classes[] = 'nav-item';
    return $classes;
}

function training_menu_link_class($attrs)
{
    $attrs['class'] = 'nav-link';
    return $attrs;
}

add_action('after_setup_theme', 'training_supports');
add_action('wp_enqueue_scripts', 'training_register_assets');
add_filter('nav_menu_css_class', 'training_menu_class');
add_filter('nav_menu_link_attributes', 'training_menu_link_class');

require_once('includes/custom_type.php');

add_filter('query_vars', function ($qvars) {
    $qvars[] = 'testimony';
    return $qvars;
});

function training_get_page_by_template($template = '')
{
    $args = [
        'meta_key' => '_wp_page_template',
        'meta_value' => $template,
        'post_type' => 'temoignage',
    ];

    return get_pages($args)[0]->ID;
}


function training_get_testimonies_by_type($post_type){
    $query = new WP_Query(array(
        'post_type' => $post_type,
        'post_status' => 'publish'
    ));
    while ($query->have_posts()) {
        $query->the_post();
        $post_id = get_the_ID();
    }
    return $post_id;
    wp_reset_query();
}

function training_retrieve_all_testimonies($testimonies) {
    $i = 1;
        foreach ($testimonies as $testimony) {
            if ($testimony === get_field('temoignage') || $testimony === get_field('temoignage_' . $i)) {
                // On enregistre tout les témoignages dans un tableau
                $data[$i] = $testimony;
                $i++;
            }
        }
        return $data;
}

function training_testimonies_pagination(string $query_var, int $max_display, array $data) {
    // The page to display (Usually is received in a url parameter)
    $page = intval(get_query_var($query_var));
    // The number of records to display per page
    $page_size = $max_display;
    // Calculate total number of records, and total number of pages
    $total_records = count($data);
    $total_pages   = ceil($total_records / $page_size);
    // Validation: Page to display can not be greater than the total number of pages
    if ($page > $total_pages) {
        $page = $total_pages;
    }
    // Validation: Page to display can not be less than 1
    if ($page < 1) {
        $page = 1;
    }
    // Calculate the position of the first record of the page to display
    $offset = ($page - 1) * $page_size;
    // Get the subset of records to be displayed from the array
    $data = array_slice($data, $offset, $page_size);
    
    return [
        'data' => $data,
        'total_pages' => $total_pages,
        'page' => $page
    ];
}