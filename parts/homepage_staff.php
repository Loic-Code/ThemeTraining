<?php $personnels = get_fields(training_get_page_by_templates('page-about.php')) ?>

<main class="px-2 py-4">
    <?php if ($personnels) : ?>
        <div class="row d-flex justify-content-around">
            <?php $i = 1;
            foreach ($personnels as $personnel) : ?>
                <?php if ($i <= 3) : ?>
                    <?php if ($personnel['nom'] !== '') : ?>
                        <?php
                        /*
                         * params picture
                         */
                        $photo = $personnel['photo'];
                        $params = 'sizes';
                        $size = 'thumbnail';

                        ?>
                        <figure class="profile mb-5" data-aos="fade-up" data-aos-duration="1000">
                            <div class="profile-image"><img src="<?= $photo[$params][$size] ?>" alt="staff" data-aos="fade" data-aos-duration="2000" />
                                <div class="icons">
                                    <a class="mx-4" href="<?= $personnel['facebook'] ?>"><i class="ion-social-facebook"></i></a>
                                    <a class="mx-4" href="<?= $personnel['twitter'] ?>"> <i class="ion-social-twitter"></i></a>
                                    <a class="mx-4" href="<?= $personnel['instagram'] ?>"> <i class="ion-social-instagram"></i></a>
                                </div>
                            </div>
                            <figcaption>
                                <h3><?= esc_html(ucfirst($personnel['nom'])) ?></h3>
                                <h4>Public Relations</h4>
                                <p><?= esc_html(ucfirst($personnel['description'])) ?></p>
                            </figcaption>
                            <div class="banner-staff"></div>
                        </figure>
                    <?php endif; ?>
                <?php endif; ?>
            <?php $i++;
            endforeach; ?>
        </div>
    <?php endif; ?>
    <div class="d-flex justify-content-center">
        <a href="<?php the_permalink() ?>" class="btn btn--with-icon" data-aos="fade" data-aos-duration="1000"><i class="fas fa-arrow-right"></i>VOIR LE STAFF</a>
    </div>
</main>