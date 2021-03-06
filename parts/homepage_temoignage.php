<?php

// Testimony parts
$post_type = 'temoignage';

$post_id = training_get_testimonies_by_type($post_type);
$testimonies = get_fields($post_id);
$data = training_retrieve_all_testimonies($testimonies);
$i = 1;
$j = 1;
?>
<div class="banner-testimony">
    <h1 class="text-light text-center p-5">Qu'en disent nos utilisateurs ?</h1>
    <div class="d-flex justify-content-around flex-column flex-lg-row align-items-center">
        <?php
        // On récupère les témoignages
        foreach ($data as $row) {
            if (isset($row['nom'])) {
                $alltestimonies[$i] = $row;
                $i++;
            }
        }
        // On affiches les témoignages aléatoirement
        shuffle($alltestimonies);
        foreach ($alltestimonies as $testimony) {
            if ($j <= 3) {
        ?>

                <figure class="testimony my-5" data-aos="fade-up" data-aos-duration="1000">
                    <blockquote class="d-flex align-items-center"><span class="mx-auto text-center fst-italic"><?= $testimony['message'] ?></span></blockquote>
                    <div class="author">
                        <img src="<?= $testimony['photo'] ?>" alt="sq-sample1" data-aos="fade" data-aos-duration="3000" />
                        <h5><?= $testimony['nom'] ?><span><?= $testimony['titre_du_message'] ?></span></h5>
                    </div>
                </figure>
        <?php
                $j++;
            }
        }
        ?>
    </div>
</div>