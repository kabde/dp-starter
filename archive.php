<?php
/**
 * Generic archive template.
 *
 * @package DP Starter_Resource
 */

if (!defined('ABSPATH')) {
    exit;
}

get_header();
?>

<section class="dp-archive-hero dp-section" aria-labelledby="dp-archive-title">
    <div class="dp-shell">
        <p class="dp-kicker"><?php esc_html_e('Resource archive', 'dp-starter'); ?></p>
        <h1 id="dp-archive-title"><?php the_archive_title(); ?></h1>
        <?php if (get_the_archive_description()) : ?>
            <div class="dp-lede"><?php the_archive_description(); ?></div>
        <?php else : ?>
            <p class="dp-lede">
                <?php esc_html_e('Browse practical DP Starter resources, guides, and notes from this archive.', 'dp-starter'); ?>
            </p>
        <?php endif; ?>
    </div>
</section>

<section class="dp-section">
    <div class="dp-shell dp-archive-layout">
        <div>
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
                            'screen_reader_text' => __('Archive navigation', 'dp-starter'),
                        )
                    );
                    ?>
                </div>
            <?php else : ?>
                <div class="dp-empty-state">
                    <?php esc_html_e('No resources were found in this archive yet.', 'dp-starter'); ?>
                </div>
            <?php endif; ?>
        </div>

        <?php dp_starter_render_sidebar('dp-sidebar-blog'); ?>
    </div>
</section>

<?php
get_footer();
