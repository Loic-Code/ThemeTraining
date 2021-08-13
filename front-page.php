<?php get_header() ?>

<!-- Actualités -->

<h1 class="p-4">Actualités</h1>

<hr>

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
      <p class="text-light">Temoignage 1"</p>
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
    <div class="banner d-flex flex-row">
        <!--
        <p class="text-light text-center mx-4">Musique composé</p>
        <p class="text-light mx-4">Concert en cours</p>
        <p class="text-light mx-4">Fan</p>
        <p class="text-light mx-4">Membre du staff</p>
        -->
    </div>
</div>
<div class="container pb-4">
    <!-- A propos -->

    <h1 class="p-4">A propos</h1>

    <hr>

    <?php $personnels = get_fields(training_get_page_by_template('page-about.php')) ?>

    <main class="px-2 py-4">
        <?php if ($personnels): ?>
            <div class="row d-flex justify-content-around">
                <?php foreach ($personnels as $personnel): ?>
                    <?php if ($personnel['nom'] !== ''): ?>
                        <?php
                            /*
                             * params picture
                             */
                            $photo = $personnel['photo'];
                            $params = 'sizes';
                            $size = 'thumbnail';
                        ?>
                        <div class="card col-12 col-md-7 col-lg-5 col-xl-3 mt-2 mb-5 shadow me-xl-1">
                            <img src="<?= $photo[$params][$size] ?>" class="card-img-top mt-4 border" alt="<?= $photo['alt']=== '' ? 'photo de ' . esc_html($personnel['nom']) : $photo['alt'] ?>">
                            <div class="card-body">
                                <h5 class="card-title"> <?= esc_html(ucfirst($personnel['nom'])) ?> </h5>
                                <p class="card-text"> <?= esc_html(ucfirst($personnel['description'])) ?> </p>
                            </div>
                        </div>
                    <?php endif; ?>
                <?php endforeach; ?>
            </div>
        <?php endif; ?>
    </main>

    <?php get_footer() ?>