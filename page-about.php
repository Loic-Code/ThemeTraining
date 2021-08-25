<?php
/*
Template Name: A Propos
Template Post Type: page
 */
?>
<?php
get_header();
$personnels = get_fields();
?>
    <div>
        <h1 class="px-2 py-4 ms-4"><?php the_title() ?></h1>
        <p class="px-2 py-4 ms-4"><?=$personnels['description'] ?></p>
    </div>
<?php
require_once 'parts/homepage_staff.php';
get_footer()
?>