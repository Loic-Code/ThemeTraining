<?php get_header() ?>

<!-- Actualités -->

<h1 class="py-4 text-center">Dernières actualités</h1>


<?php

$query = new WP_Query([
    'post_type' => 'post',
    'posts_per_page' => 3,
]);

while ($query->have_posts()) : $query->the_post();

    get_template_part('parts/homepage_actu', 'post');

    ?>

<?php endwhile; ?>

<?php
wp_reset_postdata();
$permalinkActus = get_the_permalink((get_post(get_option('page_for_posts', true)))->ID);
?>

<div class="d-flex justify-content-center">
    <a href="<?= $permalinkActus ?? '' ?>" class="btn btn--with-icon" data-aos="fade" data-aos-duration="1000"><i
                class="fas fa-plus"></i><span>D'ACTUALITÉS</span></a>
</div>

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
                    <p class="count-text"><?= $text ?></p>
                </div>

            <?php endforeach; ?>
        </div>
    </div>
</div>

<div class="container pb-4">
    <!-- A propos -->

    <h1 class="pt-4 text-center">Qui sommes nous ?</h1>

    <p class="describe-staff text-center p-5"><?php the_field('describe') ?></p>

    <?php get_template_part('parts/homepage_staff', 'post'); ?>
    <?php
    $permalinkAbout = get_the_permalink(
    (get_pages([
        'meta_key' => '_wp_page_template',
        'meta_value' => 'page-about.php'
    ])[0]->ID));
    ?>
    <div class="d-flex justify-content-center">
        <a href="<?= $permalinkAbout ?? '' ?>" class="btn btn--with-icon" data-aos="fade" data-aos-duration="1000"><i
                    class="fas fa-arrow-right"></i><span>VOIR LE STAFF</span></a>
    </div>

    <?php
    get_footer() ?>
