<?php get_header() ?>

<!-- Actualités -->

<h1 class="p-4">Actualités</h1>

<hr class="m-3">

<?php

$query = new WP_Query([
    'post_type' => 'post',
    'posts_per_page' => 3,
]);

$i = 1;

while ($query->have_posts()) : $query->the_post();

    if ($i % 2) {
        get_template_part('parts/homepage_actu_left', 'post');
    } else {
        get_template_part('parts/homepage_actu_right', 'post');
    }

    $i++;

?>

<?php endwhile;
wp_reset_postdata(); ?>

<!-- Bannière -->
</div>

        <?php get_template_part("parts/homepage_temoignage", 'post') ?>

<div class="row p-0 m-0">
    <?php $image = get_field('banner_middle') ?>
    <div class="banner d-flex flex-row" style="background-image: url('<?= $image['url'] ?>')">
    </div>
</div>

<div class="container pb-4">
    <!-- A propos -->

    <h1 class="p-4">Qui sommes nous ?</h1>

    <hr class="m-3">

    <p class="text-center p-5">Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry's standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. </p>

    <?php get_template_part('parts/homepage_staff', 'post'); ?>

    <?php
    get_footer() ?>
