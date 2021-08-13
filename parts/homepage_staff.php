<main class="px-2 py-4">
    <h1 class="ms-4 mb-4"><?php the_title() ?></h1>
    <div class="row d-flex justify-content-around">
        <div class="card col-12 col-md-7 col-lg-5 col-xl-3 mt-2 mb-5 shadow me-xl-1">
            <img src="<?= $photo[$params][$size] ?>" class="card-img-top mt-4 border" alt="<?= $photo['alt'] === '' ? 'photo de ' . esc_html($personnel['nom']) : $photo['alt'] ?>">
            <div class="card-body">
                <h5 class="card-title"> <?= esc_html(ucfirst($personnel['nom'])) ?> </h5>
                <p class="card-text"> <?= esc_html(ucfirst($personnel['description'])) ?> </p>
            </div>
        </div>
    </div>
</main>