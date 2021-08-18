<?php

require_once 'walker/CommentWalker.php';

function training_supports()
{
    add_theme_support('title-tag');
    add_theme_support('post-thumbnails');
    add_theme_support('custom-header');
    add_theme_support('custom-logo');
    add_theme_support('menus');
    add_theme_support('html5');
    add_theme_support('widgets');
    register_nav_menu('header', 'En tête du menu');
    register_nav_menu('footer', 'Pied de page');
    add_image_size('card-header', 300, 250, true);
}

function training_custom_logo_setup() {
    $defaults = array(
        'flex-height'          => true,
        'flex-width'           => true,
        'header-text'          => array( 'site-title', 'site-description' ),
        'unlink-homepage-logo' => true, 
    );
 
    add_theme_support( 'custom-logo', $defaults );
}
 


//import des different assets
function training_register_assets()
{
    //css
    wp_register_style('bootstrap', 'https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css');
    wp_register_style('font-awesome', 'https://use.fontawesome.com/releases/v5.15.4/css/all.css');
    wp_register_style('AOSStyle', 'https://unpkg.com/aos@next/dist/aos.css');
    wp_enqueue_style('bootstrap');
    wp_enqueue_style('AOS_animate', 'https://unpkg.com/aos@2.3.1/dist/aos.css');
    wp_enqueue_style('default-style', get_template_directory_uri() . '/style.css');
    wp_enqueue_style('front-style', get_template_directory_uri() . '/assets/front-style.css');
    wp_enqueue_style('aboutUs', get_template_directory_uri() . '/assets/about.css');
    wp_enqueue_style('single-blog', get_template_directory_uri() . '/assets/single-blog.css');
    wp_enqueue_style('font-awesome');
    wp_enqueue_style('AOSStyle');
    wp_enqueue_style('testimonyPage', get_template_directory_uri() . '/assets/testimony.css');
    wp_enqueue_style('testimonyHome', get_template_directory_uri() . '/assets/home-testimony.css');
    wp_enqueue_style('contactPage', get_template_directory_uri() . '/assets/contact.css');
    wp_enqueue_style('footer', get_template_directory_uri() . '/assets/footer.css');

    //js
    wp_register_script('bootstrap', 'https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js', [], false, true);
    if (!is_customize_preview()) {
        wp_deregister_script('jquery');
        wp_register_script('jquery', 'https://code.jquery.com/jquery-3.6.0.slim.min.js', [], false, true);
    }
    wp_enqueue_script('bootstrap');
    wp_enqueue_script('AOS', 'https://unpkg.com/aos@2.3.1/dist/aos.js', false, null, true);
    wp_enqueue_script('tilt-js', get_template_directory_uri() . '/assets/js/tilt.js', [], false, true);
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

function training_get_page_by_templates($template = '')
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
add_action( 'after_setup_theme', 'training_custom_logo_setup' );


require_once 'options/ConfigBlog.php';
ConfigBlog::register();

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


function training_get_testimonies_by_type($post_type)
{
    // On creer un objet WP_Query avec un post type spécifique et un status publier
    $query = new WP_Query(array(
        'post_type' => $post_type,
        'post_status' => 'publish'
    ));
    // On boucle sur WP_Query
    while ($query->have_posts()) {
        $query->the_post();
        $post_id = get_the_ID();
    }
    // On retourne les poste_id pour les postes ayant le type $post_type
    wp_reset_query();
    return $post_id ?? null;
}

function training_retrieve_all_testimonies($testimonies)
{
    $i = 1;
    foreach ($testimonies as $testimony) {
        // Si le champ correspond a temoignage ou temoignage_x alors on traite
        if ($testimony === get_field('temoignage') || $testimony === get_field('temoignage_' . $i)) {
            // On enregistre tout les témoignages dans un tableau
            $data[$i] = $testimony;
            $i++;
        }
    }
    return $data ?? $testimonies;
}

function training_testimonies_pagination(string $query_var, int $max_display, array $data): array
{
    // The page to display (Usually     wp_reset_query();is received in a url parameter)
    $page = intval(get_query_var($query_var));
    // The number of records to display per page
    $page_size = $max_display;
    // Calculate total number of records, and total number of pages
    $total_records = count($data);
    $total_pages = ceil($total_records / $page_size);
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
};

require_once('includes/perso_info_theme_settings.php');

require_once('includes/Color_theme_setting.php');
