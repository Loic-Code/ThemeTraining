<div class="card mb-3 m-3" data-aos="fade-up" data-aos-duration="1000">
    <div class="row flex-row-reverse">
        <div class="col-md-6 col-lg-4 col-xl-3">
            <?php if (get_the_post_thumbnail() !== '') : ?>
                <?php the_post_thumbnail('card-header', ['class' => 'img-fluid h-100 col-12', 'alt' => 'Image du blog']) ?>
            <?php else : ?>
                <img src="https://upload.wikimedia.org/wikipedia/commons/thumb/a/ac/No_image_available.svg/1024px-No_image_available.svg.png" class="img-fluid" alt="pas d'image">
            <?php endif; ?>
        </div>
        <div class="col-md-6 col-lg-8 col-xl-9">
            <div class="card-body">
                <h5 class="card-title"><?php the_title() ?></h5>
                <p class="card-text"><?php the_content() ?></p>
            </div>
            <div class="d-flex justify-content-center">
                <a href="<?php the_permalink() ?>"><button type="button" class="btn btn-outline-primary m-2">Voir l'article</button></a>
            </div>
        </div>
    </div>
</div>