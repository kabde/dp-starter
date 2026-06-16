<?php
/**
 * Books landing page.
 *
 * @package DP Starter_Resource
 */

if (!defined('ABSPATH')) {
    exit;
}

get_header();

while (have_posts()) :
    the_post();

    $paged = max(1, absint(get_query_var('paged')), absint(get_query_var('page')));

    $books_query = new WP_Query(
        array(
            'post_type'      => 'book',
            'post_status'    => 'publish',
            'posts_per_page' => 24,
            'paged'          => $paged,
            'meta_key'       => 'dp_book_published_date',
            'orderby'        => array(
                'meta_value_num' => 'DESC',
                'title'          => 'ASC',
            ),
            'order'          => 'DESC',
        )
    );
    ?>

    <?php
    $page_kicker = trim((string) get_post_meta(get_the_ID(), 'dp_page_kicker', true));
    $page_title  = dp_starter_page_display_title(get_the_ID());
    $page_desc   = has_excerpt() ? get_the_excerpt() : trim(wp_strip_all_tags(get_the_content()));
    ?>
    <article <?php post_class('dp-page dp-books-page'); ?>>
        <header class="dp-page-hero dp-section">
            <div class="dp-shell dp-page-hero-grid">
                <div>
                    <?php if ($page_kicker) : ?>
                        <p class="dp-kicker"><?php echo esc_html($page_kicker); ?></p>
                    <?php endif; ?>
                    <h1><?php echo esc_html($page_title); ?></h1>
                    <?php if ($page_desc) : ?>
                        <p class="dp-lede"><?php echo esc_html($page_desc); ?></p>
                    <?php endif; ?>
                </div>

                <div class="dp-books-hero-panel" aria-hidden="true">
                    <span><?php echo esc_html((string) $books_query->found_posts); ?></span>
                    <small><?php esc_html_e('published book notes', 'dp-starter'); ?></small>
                </div>
            </div>
        </header>

        <section class="dp-section">
            <div class="dp-shell">
                <?php if ($books_query->have_posts()) : ?>
                    <div class="dp-books-grid">
                        <?php
                        while ($books_query->have_posts()) :
                            $books_query->the_post();

                            $book_id      = get_the_ID();
                            $authors      = get_post_meta($book_id, 'dp_book_authors', true);
                            $cover_url    = get_post_meta($book_id, 'dp_book_cover_image_url', true);
                            $release_date = get_post_meta($book_id, 'dp_book_published_date', true);
                            $best_for     = get_post_meta($book_id, 'dp_book_best_for', true);
                            $why_relevant = get_post_meta($book_id, 'dp_book_why_relevant', true);
                            $summary      = $best_for ? $best_for : ($why_relevant ? $why_relevant : get_the_excerpt());
                            ?>
                            <article <?php post_class('dp-card dp-book-card dp-book-card-horizontal'); ?>>
                                <a class="dp-card-link" href="<?php the_permalink(); ?>">
                                    <div class="dp-book-card-cover">
                                        <?php if (has_post_thumbnail()) : ?>
                                            <?php the_post_thumbnail('dp-starter-square'); ?>
                                        <?php elseif ($cover_url) : ?>
                                            <img src="<?php echo esc_url($cover_url); ?>" alt="<?php echo esc_attr(get_the_title()); ?>">
                                        <?php else : ?>
                                            <div class="dp-book-cover-placeholder">
                                                <span><?php esc_html_e('Book', 'dp-starter'); ?></span>
                                            </div>
                                        <?php endif; ?>
                                    </div>

                                    <div class="dp-card-body">
                                        <span class="dp-pill"><?php esc_html_e('Book', 'dp-starter'); ?></span>
                                        <h2><?php the_title(); ?></h2>
                                        <?php if ($authors) : ?>
                                            <p class="dp-book-card-author"><?php echo esc_html($authors); ?></p>
                                        <?php endif; ?>
                                        <?php if ($release_date) : ?>
                                            <p class="dp-book-card-date">
                                                <?php
                                                printf(
                                                    /* translators: %s: book publication date. */
                                                    esc_html__('Released %s', 'dp-starter'),
                                                    esc_html($release_date)
                                                );
                                                ?>
                                            </p>
                                        <?php endif; ?>
                                        <?php if ($summary) : ?>
                                            <p><?php echo esc_html(dp_starter_trim_words($summary, 28)); ?></p>
                                        <?php endif; ?>
                                        <span class="dp-text-link"><?php esc_html_e('View book notes', 'dp-starter'); ?></span>
                                    </div>
                                </a>
                            </article>
                            <?php
                        endwhile;
                        wp_reset_postdata();
                        ?>
                    </div>

                    <?php if ($books_query->max_num_pages > 1) : ?>
                        <nav class="dp-pagination" aria-label="<?php esc_attr_e('Books navigation', 'dp-starter'); ?>">
                            <div class="nav-links">
                                <?php
                                echo wp_kses_post(
                                    paginate_links(
                                        array(
                                            'base'      => trailingslashit(get_permalink()) . '%_%',
                                            'format'    => '%#%/',
                                            'current'   => $paged,
                                            'total'     => $books_query->max_num_pages,
                                            'mid_size'  => 1,
                                            'prev_text' => __('&laquo; Previous', 'dp-starter'),
                                            'next_text' => __('Next &raquo;', 'dp-starter'),
                                        )
                                    )
                                );
                                ?>
                            </div>
                        </nav>
                    <?php endif; ?>
                <?php else : ?>
                    <div class="dp-empty-state">
                        <?php esc_html_e('No book notes are published yet.', 'dp-starter'); ?>
                    </div>
                <?php endif; ?>
            </div>
        </section>
    </article>

    <?php
endwhile;

get_footer();
