<?php get_header() ?>
<?php require_once 'options/PaginateCustom.php';
$paginatCustom = new PaginateCustom('post');
$articles = $paginatCustom->searchPosts();
?>
<main class="p-4">
    <h1 class="mb-4">Blog</h1>
    <?php if ($articles->have_posts()): ?>
        <div class="row d-flex justify-content-around">
            <?php $i = 1 ?>
            <?php while ($articles->have_posts()) : $articles->the_post(); ?>
                <div class="card mb-3 p-0"
                    <?php if ($i % 2) : ?>
                        data-aos="fade-right" data-aos-duration="1000"
                    <?php else: ?>
                        data-aos="fade-left" data-aos-duration="1000"
                    <?php endif; ?>
                >
                    <div class="row <?= $i % 2 ? 'flex-row-reverse' : '' ?>">
                        <div class="col-md-6 col-lg-4 col-xl-3">
                            <?php if (get_the_post_thumbnail() !== ''): ?>
                                <?php the_post_thumbnail('card-header', ['class' => 'img-fluid h-100 col-12', 'alt' => 'Image du blog']) ?>
                            <?php else : ?>
                                <img src="https://upload.wikimedia.org/wikipedia/commons/thumb/a/ac/No_image_available.svg/1024px-No_image_available.svg.png"
                                     class="img-fluid" alt="pas d'image">
                            <?php endif; ?>
                        </div>
                        <div class="col-md-6 col-lg-8 col-xl-9">
                            <div class="card-body">
                                <h2 class="card-title"> <?= esc_html(ucfirst(the_title())) ?> </h2>
                                <p class="fst-italic"><?= the_date() ?></p>
                                <p class="card-text"> <?php the_excerpt() ?> </p>
                                <?php $commentaireNumber = absint(get_comments_number()); ?>
                                <?php if ($commentaireNumber > 0): ?>
                                    <p><?= get_comments_number() ?>
                                        commentaire<?= $commentaireNumber > 1 ? 's' : '' ?></p>
                                <?php else : ?>
                                    <p class="fst-italic">Aucun commentaire</p>
                                <?php endif; ?>
                                <a href="<?php the_permalink() ?>" class="car-link btn btn-primary">Voir plus</a>
                            </div>
                        </div>
                    </div>
                </div>
                <?php $i++ ?>
            <?php endwhile; ?>
            <?php $paginatCustom->paginateBootstrap(); ?>
        </div>
    <?php else: ?>
        <h2>Aucun article</h2>
    <?php endif; ?>
</main>
<?php get_footer() ?>



