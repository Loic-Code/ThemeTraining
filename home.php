<?php get_header() ?>
<?php require_once 'options/PaginateCustom.php';
$paginatCustom = new PaginateCustom('post');
$articles = $paginatCustom->searchPosts();
?>
<main class="p-4">
    <h1 class="mb-4"><?= get_queried_object()->post_title ?></h1>
    <?php if ($articles->have_posts()): ?>
        <div class="row d-flex justify-content-around">
            <?php while ($articles->have_posts()) : $articles->the_post(); ?>
                <?php require 'parts/homepage_actu.php' ?>
            <?php endwhile; ?>
            <?php $paginatCustom->render(); ?>
        </div>
    <?php else: ?>
        <h2>Aucun article</h2>
    <?php endif; ?>
</main>
<?php get_footer() ?>



