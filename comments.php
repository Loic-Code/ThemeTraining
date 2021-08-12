<?php

use ThemeTraining\CommentWalker;

$count = absint(get_comments_number());
if ($count > 0) : ?>
<?php else : ?>
    <h2> Laisser un commentaire </h2>
<?php endif; ?>

<?php

if (comments_open()) {
    comment_form([
        'title_reply' => '',
        'title_reply_to' => '',
        'logged_in_as' => '',
        'comment_notes_before' => '',
        'class_form' => 'comment-form',
    ]);
}