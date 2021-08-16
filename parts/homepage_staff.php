<?php $personnels = get_fields(training_get_page_by_template('page-about.php')) ?>

<main class="px-2 py-4">
    <?php if ($personnels) : ?>
        <div class="row d-flex justify-content-around">
            <?php $i = 1;
            foreach ($personnels as $personnel) : ?>
                <?php if ($i <= 6) : ?>
                    <?php if ($personnel['nom'] !== '') : ?>
                        <?php
                        /*
                         * params picture
                         */
                        $photo = $personnel['photo'];
                        $params = 'sizes';
                        $size = 'thumbnail';
                        ?>
                        <div class="card col-12 col-md-7 col-lg-5 col-xl-3 mt-2 mb-5 shadow me-xl-1">
                            <div class="d-flex justify-content-center">
                                <img src="<?= $photo[$params][$size] ?>" class="card-img-top mt-4 border" alt="<?= $photo['alt'] === '' ? 'photo de ' . esc_html($personnel['nom']) : $photo['alt'] ?>">
                            </div>
                            <div class="card-body">
                                <h5 class="card-title"> <?= esc_html(ucfirst($personnel['nom'])) ?> </h5>
                                <p class="card-text"> <?= esc_html(ucfirst($personnel['description'])) ?> </p>
                            </div>
                        </div>
                    <?php endif; ?>
                <?php endif; ?>
            <?php $i++;
            endforeach; ?>
        </div>
    <?php endif; ?>
</main>