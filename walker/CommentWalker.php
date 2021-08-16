<?php
/**
 * Comment API: Walker_Comment class
 *
 * @package WordPress
 * @subpackage Comments
 * @since 4.4.0
 */

namespace Training;

use Walker_Comment;

/**
 * Core walker class used to create an HTML list of comments.
 *
 * @since 2.7.0
 *
 * @see Walker
 */
class CommentWalker extends Walker_Comment
{
    /**
     * Starts the list before the elements are added.
     *
     * @param string $output Used to append additional content (passed by reference).
     * @param int $depth Optional. Depth of the current comment. Default 0.
     * @param array $args Optional. Uses 'style' argument for type of HTML list. Default empty array.
     * @since 2.7.0
     *
     * @see Walker::start_lvl()
     * @global int $comment_depth
     *
     */
    public function start_lvl(&$output, $depth = 0, $args = array())
    {
        $GLOBALS['comment_depth'] = $depth + 1;

        switch ($args['style']) {
            case 'div':
                $output .= '<div class="ms-4 mt-3 mb-3">';
                break;
            case 'ol':
                $output .= '<ol class="children">' . "\n";
                break;
            case 'ul':
            default:
                $output .= '<ul class="children">' . "\n";
                break;
        }
    }

    /**
     * Ends the list of items after the elements are added.
     *
     * @param string $output Used to append additional content (passed by reference).
     * @param int $depth Optional. Depth of the current comment. Default 0.
     * @param array $args Optional. Will only append content if style argument value is 'ol' or 'ul'.
     *                       Default empty array.
     * @since 2.7.0
     *
     * @see Walker::end_lvl()
     * @global int $comment_depth
     *
     */
    public function end_lvl(&$output, $depth = 0, $args = array())
    {
        $GLOBALS['comment_depth'] = $depth + 1;

        switch ($args['style']) {
            case 'div':
                $output .= '</div>';
                break;
            case 'ol':
                $output .= "</ol><!-- .children -->\n";
                break;
            case 'ul':
            default:
                $output .= "</ul><!-- .children -->\n";
                break;
        }
    }

    /**
     * Outputs a single comment.
     *
     * @param WP_Comment $comment Comment to display.
     * @param int $depth Depth of the current comment.
     * @param array $args An array of arguments.
     * @see wp_list_comments()
     *
     * @since 3.6.0
     *
     */
    protected function comment($comment, $depth, $args)
    {
        if ('div' === $args['style']) {
            $tag = 'div';
            $add_below = 'comment';
        } else {
            $tag = 'li';
            $add_below = 'div-comment';
        }

        $commenter = wp_get_current_commenter();
        $show_pending_links = isset($commenter['comment_author']) && $commenter['comment_author'];

        if ($commenter['comment_author_email']) {
            $moderation_note = __('Your comment is awaiting moderation.');
        } else {
            $moderation_note = __('Your comment is awaiting moderation. This is a preview; your comment will be visible after it has been approved.');
        }
        ?>
        <<?php echo $tag; ?><?php comment_class($this->has_children ? 'parent' : '', $comment); ?> id="comment-<?php comment_ID(); ?>">
        <?php if ('div' !== $args['style']) : ?>
        <div id="div-comment-<?php comment_ID(); ?>" class="comment-body">
    <?php endif; ?>
        <div class="comment-author vcard">
            <?php
            if (0 != $args['avatar_size']) {
                echo get_avatar($comment, $args['avatar_size']);
            }
            ?>
            <?php
            $comment_author = get_comment_author_link($comment);

            if ('0' == $comment->comment_approved && !$show_pending_links) {
                $comment_author = get_comment_author($comment);
            }

            printf(
            /* translators: %s: Comment author link. */
                __('%s <span class="says">says:</span>'),
                sprintf('<cite class="fn">%s</cite>', $comment_author)
            );
            ?>
        </div>
        <?php if ('0' == $comment->comment_approved) : ?>
        <em class="comment-awaiting-moderation"><?php echo $moderation_note; ?></em>
        <br/>
    <?php endif; ?>

        <div class="comment-meta commentmetadata">
            <?php
            printf(
                '<a href="%s">%s</a>',
                esc_url(get_comment_link($comment, $args)),
                sprintf(
                /* translators: 1: Comment date, 2: Comment time. */
                    __('%1$s at %2$s'),
                    get_comment_date('', $comment),
                    get_comment_time()
                )
            );

            edit_comment_link(__('(Edit)'), ' &nbsp;&nbsp;', '');
            ?>
        </div>

        <?php
        comment_text(
            $comment,
            array_merge(
                $args,
                array(
                    'add_below' => $add_below,
                    'depth' => $depth,
                    'max_depth' => $args['max_depth'],
                )
            )
        );
        ?>

        <?php
        comment_reply_link(
            array_merge(
                $args,
                array(
                    'add_below' => $add_below,
                    'depth' => $depth,
                    'max_depth' => $args['max_depth'],
                    'before' => '<div class="reply">',
                    'after' => '</div>',
                )
            )
        );
        ?>

        <?php if ('div' !== $args['style']) : ?>
        </div>
    <?php endif; ?>
        <?php
    }

    /**
     * Outputs a comment in the HTML5 format.
     *
     * @param WP_Comment $comment Comment to display.
     * @param int $depth Depth of the current comment.
     * @param array $args An array of arguments.
     * @see wp_list_comments()
     *
     * @since 3.6.0
     *
     */
    protected function html5_comment($comment, $depth, $args)
    {
        $tag = ('div' === $args['style']) ? 'div' : 'li';

        $commenter = wp_get_current_commenter();
        $show_pending_links = !empty($commenter['comment_author']);

        if ($commenter['comment_author_email']) {
            $moderation_note = __('Your comment is awaiting moderation.');
        } else {
            $moderation_note = __('Your comment is awaiting moderation. This is a preview; your comment will be visible after it has been approved.');
        }
        ?>
        <<?php echo $tag; ?> id="comment-<?php comment_ID(); ?>" <?php comment_class($this->has_children ? 'parent mb-5' : 'mb-5', $comment); ?>>
        <article id="div-comment-<?php comment_ID(); ?>" class="comment-body row" data-aos="fade-up" data-aos-duration="500">
            <div class="comment-meta col-2">
                <div class="comment-author vcard">
                    <?php
                    if (0 != $args['avatar_size']) {
                        echo get_avatar($comment, $args['avatar_size'], '', 'Logo utilisateur', ['class' => 'logo-comment']);
                    }
                    ?>

                </div><!-- .comment-author -->

            </div><!-- .comment-meta -->

            <div class="comment-content col-md-10">

                <?php
                $comment_author = get_comment_author_link($comment);

                if ('0' == $comment->comment_approved && !$show_pending_links) {
                    $comment_author = get_comment_author($comment);
                }

                printf(
                /* translators: %s: Comment author link. */
                    __('%s <span class="says">says:</span>'),
                    sprintf('<b class="fn">%s</b>', $comment_author)
                );
                ?>

                <div class="comment-metadata">
                    <?php
                    printf(
                        '<a href="%s"><time datetime="%s">%s</time></a>',
                        esc_url(get_comment_link($comment, $args)),
                        get_comment_time('c'),
                        sprintf(
                        /* translators: 1: Comment date, 2: Comment time. */
                            __('%1$s at %2$s'),
                            get_comment_date('', $comment),
                            get_comment_time()
                        )
                    );

                    edit_comment_link(__('Edit'), ' <span class="edit-link">', '</span>');
                    ?>
                </div><!-- .comment-metadata -->

                <?php if ('0' == $comment->comment_approved) : ?>
                    <em class="comment-awaiting-moderation"><?php echo $moderation_note; ?></em>
                <?php endif; ?>

                <?php comment_text(); ?>

                <?php
                if ('1' == $comment->comment_approved || $show_pending_links) {
                    comment_reply_link(
                        array_merge(
                            $args,
                            array(
                                'add_below' => 'div-comment',
                                'depth' => $depth,
                                'max_depth' => $args['max_depth'],
                                'before' => '<div class="reply col-md-12 mb-4">',
                                'after' => '</div>',
                            )
                        )
                    );
                }
                ?>
            </div><!-- .comment-content -->
        </article><!-- .comment-body -->
        <?php
    }
}
