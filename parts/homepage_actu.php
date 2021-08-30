<?php
$dates = training_get_month_name(get_the_date('d/m'));
$btnText = $btnText ?? 'VOIR L\'ARTICLE';
$view = $view ?? true;
?>

<div class="main-actu bg-light mb-5" data-aos="fade-up" data-aos-duration="1000">
    <div class="contain-image">
        <div class="date">
            <span class="date-box">
                <span><?= $dates['day']; ?></span>
                <span><?= $dates['month']; ?></span>
            </span>
        </div>
        <?php $image = wp_get_attachment_image_url(get_post_thumbnail_id(), 'full'); ?>
        <?php if ($image): ?>
        <div class="image" style="background-image: url('<?= $image ?>');">
            <?php else: ?>
            <div class="image"
                 style="background-image: url('https://upload.wikimedia.org/wikipedia/commons/thumb/a/ac/No_image_available.svg/1024px-No_image_available.svg.png');">
                <?php endif ?>
            </div>
        </div>
        <div class="text row bg-light d-flex flex-row pb-3">
            <span class="title mt-1 p-3"><?php the_title() ?></span>
            <div class="d-flex flex-row mb-2">
                <?php if ($view === true): ?>
                    <a href="<?php the_permalink() ?>">
                <span class="author m-2">
                    <i class="fas fa-edit"></i>
                    <?php the_author() ?>
                </span>
                    </a>
                <?php else: ?>
                    <span class="author m-2">
                    <i class="fas fa-edit"></i>
                    <?php the_author() ?>
                </span>
                <?php endif; ?>
                <?php if ($view === true): ?>
                    <a href="<?php the_permalink() ?>">
                <span class="commentary m-2">
                    <i class="far fa-comment"></i>
                    <?= get_comments_number() ?>
                </span>
                    </a>
                <?php else: ?>
                    <span class="commentary m-2">
                    <i class="far fa-comment"></i>
                    <?= get_comments_number() ?>
                </span>
                <?php endif; ?>
            </div>
            <span class="text m-2"><?php the_excerpt() ?></span>
            <a href="<?php the_permalink() ?>" class="btn btn--with-icon"><i
                        class="fas fa-arrow-right"></i><span><?= $btnText ?></span></a>
        </div>
    </div>