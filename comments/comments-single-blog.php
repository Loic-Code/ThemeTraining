<?php

use Training\CommentWalker;

$count = absint(get_comments_number());

?>

<?php if ($count > 0): ?>
    <h2><?= $count ?> commentaire<?= $count > 1 ? 's' : '' ?></h2>
<?php else: ?>
    <h2>Laisser un commentaire</h2>
<?php endif; ?>

<?php if (comments_open()): ?>
    <?php comment_form([
        'title_reply' => '' ,
    ]); ?>
<?php endif; ?>

<div class="mt-5">
    <?php wp_list_comments(['style' => 'div', 'walker' => new CommentWalker(), 'avatar_size' => 150]) ?>
</div>

<div class="mt-3">
    <?php paginate_comments_links() ?>
</div>
