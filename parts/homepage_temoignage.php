<?php

// Testimony parts
$post_type = 'temoignage';

$post_id = training_get_testimonies_by_type($post_type);
$testimonies = get_fields($post_id);
$data = training_retrieve_all_testimonies($testimonies);
$i = 1;

?>
<section class="home-testimony">
    <div id="carouselExampleControls" class="carousel slide pb-5" data-bs-ride="carousel">
        <div class="carousel-inner" data-aos="fade-up" data-aos-duration="1000">
            <h1 class="text-center m-2 pt-4">Témoignages</h1>

            <?php
            foreach ($data as $row) {
                if ($row['nom']) {
                    if ($i == 1) { ?>

                        <div class="carousel-item active">
                            <div class="box my-5 p-2">
                                <h5 class="name"><?= $row['nom'] ?></h5>
                                <p class="title"><?= $row['titre_du_message'] ?></p>
                                <p class="description"><?= $row['message'] ?></p>
                            </div>
                        </div>

                    <?php $i++;
                    } ?>

                    <div class="carousel-item">
                        <div class="box my-5 p-2">
                            <h5 class="name"><?= $row['nom'] ?></h5>
                            <p class="title"><?= $row['titre_du_message'] ?></p>
                            <p class="description"><?= $row['message'] ?></p>
                        </div>
                    </div>

            <?php
                }
            } ?>

        </div>
    </div>
</section>