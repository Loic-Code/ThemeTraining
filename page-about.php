<?php
/*
Template Name: A Propos
Template Post Type: page
 */
?>
<?php get_header() ?>

<?php $personnels = get_fields() ?>

    <main class="px-2 py-4">
        <h1 class="ms-4 mb-4"><?php the_title() ?></h1>
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
                            <img src="<?= $photo[$params][$size] ?>" class="card-img-top mt-4 border" alt="<?= $photo['alt'] ?>">
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


    <!-- /container -->
<?php get_footer() ?>