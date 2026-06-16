<?php
/**
 * Search results template.
 *
 * @package DP Starter_Resource
 */

if (!defined('ABSPATH')) {
    exit;
}

get_header();

$search_query = get_search_query();
?>

<section class="dp-archive-hero dp-section" aria-labelledby="dp-search-title">
    <div class="dp-shell">
        <p class="dp-kicker"><?php esc_html_e('Search', 'dp-starter'); ?></p>
        <h1 id="dp-search-title">
            <?php
            printf(
                /* translators: %s is the search query. */
                esc_html__('Search results for "%s"', 'dp-starter'),
                esc_html($search_query)
            );
            ?>
        </h1>
        <div class="dp-search-form-wrap">
            <?php get_search_form(); ?>
        </div>
    </div>
</section>

<section class="dp-section">
    <div class="dp-shell">
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
                        'screen_reader_text' => __('Search navigation', 'dp-starter'),
                    )
                );
                ?>
            </div>
        <?php else : ?>
            <div class="dp-empty-state dp-search-empty">
                <h2><?php esc_html_e('No matching resources yet.', 'dp-starter'); ?></h2>
                <p><?php esc_html_e('Try searching for offer, clients, tools, books, or follow-up.', 'dp-starter'); ?></p>
                <?php get_search_form(); ?>
            </div>
        <?php endif; ?>
    </div>
</section>

<?php
get_footer();
