<?php

class ConfigBlog
{
    public static function register()
    {
        add_filter('excerpt_length', [self::class, 'training_card_excerpt_length']);
        add_filter('excerpt_more', [self::class, 'training_excerpt_more']);
        add_filter('comment_form_defaults', [self::class, 'training_form_comment_bootstrap']);
    }

    // reduce excerpt
    public static function training_card_excerpt_length($length)
    {
        if (!is_single()) {
            return 20;
        }

        return $length;
    }

    //change [...] to ... in the excerpt
    private static function training_excerpt_more($more)
    {
        if (!is_single()) {
            return '...';
        }
        return $more;
    }

    //pagination bootstrap
    public static function training_bootstrap_pagination()
    {
        $pages = paginate_links(['type' => 'array']);
        if ($pages === null) {
            return;
        }
        ?>
        <nav aria-label="Page navigation example">
            <ul class="pagination">
                <?php
                foreach ($pages as $page) {
                    $active = strpos($page, 'current') !== false;
                    $class = 'page-item';
                    if ($active) {
                        $class .= ' active';
                    }
                    ?>
                    <li class="<?= $class ?>">
                        <?= str_replace('page-numbers', 'page-link', $page) ?>
                    </li>
                    <?php
                }
                ?>
            </ul>
        </nav>
        <?php
    }

    public static function training_form_comment_bootstrap(array $fields): array
    {
        $fields['comment_field'] = '<p class="comment-form-comment"><label for="comment">Commentaire <span class="required">*</span></label> <textarea id="comment" name="comment" cols="45" rows="5" required="required" class="form-control"></textarea></p>';

        $fields['fields']['author'] = '<p class="comment-form-author"><label for="author">Nom <span class="required">*</span></label> <input id="author" name="author" type="text" required="required" class="form-control"/></p>';

        $fields['fields']['email'] = '<p class="comment-form-email"><label for="email">E-mail <span class="required">*</span></label> <input id="email" name="email" type="email" aria-describedby="email-notes" required="required" class="form-control" /></p>';

        $fields['fields']['cookies'] = '';

        $fields['fields']['url'] = '';

        $fields['submit_button'] = '<input name="%1$s" type="submit" id="%2$s" class="%3$s btn btn-sm btn-primary" value="%4$s"/>';

        return $fields;
    }

}