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
        <div class="wrapper d-flex justify-content-between text-center" data-aos="fade-up" data-aos-duration="1000">
            <?php
            $keys_numbers = get_fields();
            $keys = $keys_numbers['keys_numbers'];
            ?>
            <?php foreach ($keys as $key): ?>
            <?php

            $icon = $key['icon'];
            $number = $key['number'];
            $text = $key['text'];

            ?>
            
            <div class="counter col_third m-1">
                <i class="<?= $icon ?> fa-2x"></i>
                <h2 class="timer count-title count-number" data-to="<?= $number ?>" data-speed="1500"></h2>
                <p class="count-text"><?=  $text ?></p>
            </div>
            
            <?php endforeach; ?>
        </div>
    </div>
</div>

<div class="container pb-4">
    <!-- A propos -->

    <h1 class="p-4">Qui sommes nous ?</h1>

    <hr class="m-3">

    <p class="text-center p-5"><?php the_field('describe') ?></p>

    <?php get_template_part('parts/homepage_staff', 'post'); ?>

    <?php
    get_footer() ?>
