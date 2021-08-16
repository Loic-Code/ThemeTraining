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
<div id=" carousel carouselExampleControls" class="carousel slide" data-bs-ride="carousel">
  <div class="carousel-inner">
    <div class="carousel-item active">
      <p class="text-light">"Temoignage 1"</p>
    </div>
    <div class="carousel-item">
    <p class="text-light">"Temoignage 2"</p>
    </div>
    <div class="carousel-item">
    <p class="text-light">"Temoignage 3"</p>
    </div>
  </div>
  <button class="carousel-control-prev" type="button" data-bs-target="#carouselExampleControls" data-bs-slide="prev">
    <span class="carousel-control-prev-icon" aria-hidden="true"></span>
    <span class="visually-hidden">Previous</span>
  </button>
  <button class="carousel-control-next" type="button" data-bs-target="#carouselExampleControls" data-bs-slide="next">
    <span class="carousel-control-next-icon" aria-hidden="true"></span>
    <span class="visually-hidden">Next</span>
  </button>
</div>
<div class="row p-0 m-0">
<?php $image = get_field('banner_middle') ?>
    <div class="banner d-flex flex-row" style="background-image: url('<?= $image['url'] ?>')">
    </div>
</div>
<div class="container pb-4">
    <!-- A propos -->

    <h1 class="p-4">Qui sommes nous ?</h1>

    <hr class="m-3">

    <?php get_template_part('parts/homepage_staff', 'post'); ?>

    <?php get_footer() ?>