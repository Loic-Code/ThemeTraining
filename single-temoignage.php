<?php
get_header();
?>

<h1 class='pt-4'>Pourquoi nous ?</h1>

<div class="row pt-4">

    <div class="col-md-6 m-auto">
        <?php
        $testimonies = get_fields();
        $i = 1;
        foreach ($testimonies as $testimony) {
            if ($testimony === get_field('temoignage') || $testimony === get_field('temoignage_' . $i)) {
                // On enregistre tout les témoignages dans un tableau
                $data[$i] = $testimony;
                $i++;
            }
        }
        // The page to display (Usually is received in a url parameter)
        $page = intval(get_query_var('testimony'));
        // The number of records to display per page
        $page_size = 3;
        // Calculate total number of records, and total number of pages
        $total_records = count($data);
        $total_pages   = ceil($total_records / $page_size);
        // Validation: Page to display can not be greater than the total number of pages
        if ($page > $total_pages) {
            $page = $total_pages;
        }
        // Validation: Page to display can not be less than 1
        if ($page < 1) {
            $page = 1;
        }
        // Calculate the position of the first record of the page to display
        $offset = ($page - 1) * $page_size;
        // Get the subset of records to be displayed from the array
        $data = array_slice($data, $offset, $page_size);
        ?>
        <?php foreach ($data as $row) { ?>

            <div class="testimonial rounded-pill d-flex justify-content-between p-3 my-4">
                <h3 class="testimonial-title titleRight text-center m-auto">
                    <?= $row['nom'] ?>
                    <small><?= $row['titre_du_message'] ?></small>
                </h3>
                <p class="description mx-3 p-4"><?= $row['message'] ?></p>
            </div>

        <?php } ?>
        <div class="d-flex justify-content-around testimony_arrow">
            <?php
        // Pagination
        $previous_page = $page - 1;
        $next_page = $page + 1;
        if ($page !== 1) {
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

    <div class="col-md-6 m-auto">
        <div id="carouselExampleControls" class="carousel vert slide mb-5" data-ride="carousel" data-interval="1">
            <div class="carousel-inner">
                <?php
                $j = 2;
                foreach ($testimonies as $page_image) {
                    if ($page_image === get_field('image_de_page_' . $j)) {
                ?>
                        <div class="carousel-item">
                            <img class="d-block mx-auto img-fluid" src="<?= get_field('image_de_page_' . $j)['url'] ?> " alt="Slide">
                        </div>
                    <?php
                        $j++;
                    } elseif ($page_image === get_field('image_de_page')) {
                    ?>
                        <div class="carousel-item active">
                            <img class="d-block mx-auto img-fluid" src="<?= get_field('image_de_page')['url'] ?> " alt="Slide">
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

</div>

<?php get_footer() ?>