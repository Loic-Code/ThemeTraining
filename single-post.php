<?php get_header() ?>
    <main class="p-4">
        <?php if (have_posts()): ?>
            <?php while (have_posts()) : the_post(); ?>
                <div class="d-flex flex-column align-items-center pt-3">
                    <div class="title mb-5">
                        <h1 class="text-center"><?= esc_html(ucfirst(the_title())) ?></h1>
                        <hr class="my-5">
                        <p class="text-center fst-italic text-muted h4 mb-3">Posté le <?= the_date() ?></p>
                        <p class="text-center fst-italic text-muted h5">Auteur : <?= ucfirst(get_the_author()) ?></p>
                    </div>
                    <?php if (get_the_post_thumbnail() !== ''): ?>
                        <?php the_post_thumbnail('full', ['class' => 'image-single-blog border rounded mb-5 col-12 h-20', 'alt' => 'Image du blog', 'data-aos' => "zoom-in-up", 'data-aos-duration' => 1000]) ?>
                    <?php else : ?>
                        <img src="https://upload.wikimedia.org/wikipedia/commons/thumb/a/ac/No_image_available.svg/1024px-No_image_available.svg.png"
                             class="image-single-blog border rounded mb-5 col-5 h-20" alt="pas d'image" data-aos="zoom-in-up" data-aos-duration="1000">
                    <?php endif; ?>
                </div>
                <?php the_content() ?>
                <div class="comments mt-5">
                    <?php
                    if (comments_open() || get_comments_number()) {
                        comments_template('/comments/comments-single-blog.php');
                    }
                    ?>
                </div>
            <?php endwhile; ?>
        <?php else: ?>
            <h2>Aucun article</h2>
        <?php endif; ?>
        <a class="btn btn-sm btn-primary mt-3" href="/blog">Retour</a>
    </main>

<?php get_footer() ?>