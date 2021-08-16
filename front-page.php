<?php get_header() ?>

<h1>HOMEPAGE</h1>

<?php


// Testimony parts
$post_type = 'temoignage';

training_get_testimonies_by_type($post_type);
$testimonies = get_fields($post_id);
$data = training_retrieve_all_testimonies($testimonies);
?>
<section class="testimonials-clean">
    <div class="container">
        <div class="intro">
            <h2 class="text-center">Testimonials </h2>
            <!-- A faire : champ ACF pour déscription -->
            <p class="text-center">Our customers love us! Read what they have to say below. Aliquam sed justo ligula. Vestibulum nibh erat, pellentesque ut laoreet vitae.</p>
        </div>
        <div class="row people">
            <?php
            foreach ($data as $row) {
            ?>
                <div class="col-md-6 col-lg-4 item">
                    <div class="box">
                        <p class="description"><?= $row['message'] ?></p>
                    </div>
                    <div class="author">
                        <h5 class="name"><?= $row['nom'] ?></h5>
                        <p class="title"><?= $row['titre_du_message'] ?></p>
                    </div>
                </div>
            <?php
            }
            ?>
        </div>
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
</section>
<?php
get_footer() ?>
