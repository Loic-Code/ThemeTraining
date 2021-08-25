<?php
get_header();
?>

<h1 class='pt-4'>Pourquoi nous ?</h1>

<div class="row pt-4 d-flex justify-content-arround">

    <div class="col-md-5 m-auto d-flex flex-column">
        <?php
        // On recupère tous les champs ACF
        $testimonies = get_fields();
        // On filtre pour récuperer les champs "testimonies"
        $data = training_retrieve_all_testimonies($testimonies);
        // Logique pour pagination
        $pagination_data = training_testimonies_pagination('testimony', 2, $data);

        $page = $pagination_data['page'];
        $total_pages = $pagination_data['total_pages'];
        $testimonials = $pagination_data['data'];

        ?>

        <?php

        // On affiche les testimonies
        foreach ($testimonials as $row) { ?>

            <figure class="testimony mt-3 mx-auto" data-aos="fade-up" data-aos-duration="1000">
                <blockquote class="d-flex align-items-center"><span class="mx-auto text-center fst-italic"><?= $row['message'] ?></span></blockquote>
                <div class="author">
                    <img src="https://s3-us-west-2.amazonaws.com/s.cdpn.io/331810/sq-sample1.jpg" alt="sq-sample1" />
                    <h5><?= $row['nom'] ?><span><?= $row['titre_du_message'] ?></span></h5>
                </div>
            </figure>

        <?php } ?>
        <div class="d-flex justify-content-around testimony_arrow">
            <?php

            // Pagination
            $previous_page = $page - 1;
            $next_page = $page + 1;
            if ($page > 1) {
            ?>
                <a href="<?= add_query_arg(
                                'testimony',
                                $previous_page,
                                get_the_permalink()
                            ); ?>">

                    <i class="fas fa-chevron-left"></i></a>
            <?php }
            if ($page < $total_pages) { ?>
                <a href="<?= add_query_arg(
                                'testimony',
                                $next_page,
                                get_the_permalink()
                            ); ?>"><i class="fas fa-chevron-right"></i></a>
            <?php } ?>
        </div>
    </div>

    <div class="col-md-5 m-auto">
        <div id="carouselExampleControls" class="carousel vert slide mb-5" data-ride="carousel" data-interval="1" data-aos="fade-left">
            <div class="carousel-inner">
                <?php
                // On ajoute les images
                $j = 2;
                foreach ($testimonies as $page_image) {
                    // On verifie si il s'agit d'une image_de_page_x
                    if ($page_image === get_field('image_de_page_' . $j)) {
                ?>
                        <div class="carousel-item">
                            <img class="d-block mx-auto page_image" src="<?= get_field('image_de_page_' . $j)['url'] ?> " alt="Slide">
                        </div>
                    <?php
                        $j++;
                        // On verifie si il s'agit d'une image_de_page
                    } elseif ($page_image === get_field('image_de_page')) {
                    ?>
                        <div class="carousel-item active">
                            <img class="d-block mx-auto page_image" src="<?= get_field('image_de_page')['url'] ?> " alt="Slide">
                        </div>

                <?php
                    }
                }
                ?>
            </div>
            <a class="carousel-control-prev" href="#carouselExampleControls" role="button" data-bs-slide="prev">
                <span class="carousel-control-prev-icon bg-dark rounded-circle" aria-hidden="true"></span>
                <span class="sr-only">Previous</span>
            </a>
            <a class="carousel-control-next" href="#carouselExampleControls" role="button" data-bs-slide="next">
                <span class="carousel-control-next-icon bg-dark rounded-circle" aria-hidden="true"></span>
                <span class="sr-only">Next</span>
            </a>
        </div>
    </div>

    <!-- Container div -->
</div>

</body>



<?php get_footer() ?>