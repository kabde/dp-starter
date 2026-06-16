<?php
/**
 * Comments template.
 *
 * @package DP Starter_Resource
 */

if (!defined('ABSPATH')) {
    exit;
}

if (post_password_required()) {
    return;
}
?>

<section id="comments" class="dp-comments" aria-labelledby="dp-comments-title">
    <h2 id="dp-comments-title">
        <?php
        printf(
            esc_html(
                _n(
                    '%d comment',
                    '%d comments',
                    get_comments_number(),
                    'dp-starter'
                )
            ),
            (int) get_comments_number()
        );
        ?>
    </h2>

    <?php if (have_comments()) : ?>
        <ol class="dp-comment-list">
            <?php
            wp_list_comments(
                array(
                    'style'      => 'ol',
                    'short_ping' => true,
                    'avatar_size' => 48,
                )
            );
            ?>
        </ol>

        <?php the_comments_pagination(); ?>
    <?php else : ?>
        <p class="dp-comments-empty"><?php esc_html_e('No comments yet.', 'dp-starter'); ?></p>
    <?php endif; ?>

    <?php
    if (!comments_open() && get_comments_number()) :
        ?>
        <p class="dp-comments-closed"><?php esc_html_e('Comments are closed.', 'dp-starter'); ?></p>
    <?php endif; ?>

    <?php
    comment_form(
        array(
            'class_form'         => 'dp-comment-form',
            'title_reply_before' => '<h3 id="reply-title" class="comment-reply-title">',
            'title_reply_after'  => '</h3>',
        )
    );
    ?>
</section>
