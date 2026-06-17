<?php
/**
 * Main fallback template.
 *
 * Main fallback template.
 *
 * @package DP Starter_Resource
 */

if (!defined('ABSPATH')) {
    exit;
}

get_header();
?>
<section class="dp-section">
    <div class="dp-shell">
        <p class="dp-kicker"><?php esc_html_e('DP Starter Resource', 'dp-starter'); ?></p>
        <h1><?php esc_html_e('Resources and Guides', 'dp-starter'); ?></h1>
        <p class="dp-lede">
            <?php esc_html_e('Practical resources, guides, tools, and notes for digital product creators.', 'dp-starter'); ?>
        </p>

        <?php if (have_posts()) : ?>
            <div class="dp-grid dp-grid-3">
                <?php
                while (have_posts()) :
                    the_post();
                    get_template_part('template-parts/card-post', null, array('class' => 'dp-article-card-compact'));
                endwhile;
                ?>
            </div>

            <div class="dp-pagination">
                <?php
                the_posts_pagination(
                    array(
                        'mid_size'           => 1,
                        'prev_text'          => __('Previous', 'dp-starter'),
                        'next_text'          => __('Next', 'dp-starter'),
                        'screen_reader_text' => __('Posts navigation', 'dp-starter'),
                    )
                );
                ?>
            </div>
        <?php else : ?>
            <div class="dp-empty-state">
                <?php esc_html_e('No content found yet.', 'dp-starter'); ?>
            </div>
        <?php endif; ?>
    </div>
</section>
<?php
get_footer();
