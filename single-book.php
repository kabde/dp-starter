<?php
/**
 * Single book template.
 *
 * @package DP Starter_Resource
 */

if (!defined('ABSPATH')) {
    exit;
}

get_header();

while (have_posts()) :
    the_post();

    $book_id       = get_the_ID();
    $subtitle      = get_post_meta($book_id, 'dp_book_subtitle', true);
    $authors       = get_post_meta($book_id, 'dp_book_authors', true);
    $publisher     = get_post_meta($book_id, 'dp_book_publisher', true);
    $published     = get_post_meta($book_id, 'dp_book_published_date', true);
    $page_count    = get_post_meta($book_id, 'dp_book_page_count', true);
    $isbn_13       = get_post_meta($book_id, 'dp_book_isbn_13', true);
    $asin          = get_post_meta($book_id, 'dp_book_asin', true);
    $cover_url     = get_post_meta($book_id, 'dp_book_cover_image_url', true);
    $affiliate_url = get_post_meta($book_id, 'dp_book_current_affiliate_url', true);
    $amazon_url    = get_post_meta($book_id, 'dp_book_future_amazon_url', true);
    $best_for      = get_post_meta($book_id, 'dp_book_best_for', true);
    $why_relevant  = get_post_meta($book_id, 'dp_book_why_relevant', true);
    $angle         = get_post_meta($book_id, 'dp_book_editorial_angle', true);
    $limitations   = get_post_meta($book_id, 'dp_book_limitations', true);
    $book_url      = $affiliate_url ? $affiliate_url : $amazon_url;
    $has_analysis  = $best_for || $why_relevant || $angle || $limitations;
    ?>

    <article <?php post_class('dp-single dp-book-single'); ?>>
        <header class="dp-single-hero dp-section">
            <div class="dp-shell dp-single-hero-grid dp-book-hero-grid">
                <div>
                    <a class="dp-pill" href="<?php echo esc_url(home_url('/books/')); ?>">
                        <?php esc_html_e('Books', 'dp-starter'); ?>
                    </a>
                    <h1><?php the_title(); ?></h1>
                    <?php if ($subtitle) : ?>
                        <p class="dp-lede"><?php echo esc_html($subtitle); ?></p>
                    <?php elseif (has_excerpt()) : ?>
                        <p class="dp-lede"><?php echo esc_html(get_the_excerpt()); ?></p>
                    <?php endif; ?>
                    <div class="dp-single-meta">
                        <?php if ($authors) : ?>
                            <span><?php echo esc_html($authors); ?></span>
                        <?php endif; ?>
                        <?php if ($publisher) : ?>
                            <span><?php echo esc_html($publisher); ?></span>
                        <?php endif; ?>
                        <?php if ($published) : ?>
                            <span><?php echo esc_html($published); ?></span>
                        <?php endif; ?>
                    </div>
                </div>

                <div class="dp-book-cover-wrap">
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
            </div>
        </header>

        <div class="dp-section">
            <div class="dp-shell dp-single-layout">
                <main>
                    <?php if ($has_analysis) : ?>
                        <section class="dp-book-analysis" aria-label="<?php esc_attr_e('Book analysis', 'dp-starter'); ?>">
                            <?php if ($best_for) : ?>
                                <div>
                                    <h2><?php esc_html_e('Best for', 'dp-starter'); ?></h2>
                                    <p><?php echo esc_html($best_for); ?></p>
                                </div>
                            <?php endif; ?>
                            <?php if ($why_relevant) : ?>
                                <div>
                                    <h2><?php esc_html_e('Why it matters', 'dp-starter'); ?></h2>
                                    <p><?php echo esc_html($why_relevant); ?></p>
                                </div>
                            <?php endif; ?>
                            <?php if ($angle) : ?>
                                <div>
                                    <h2><?php esc_html_e('Editorial angle', 'dp-starter'); ?></h2>
                                    <p><?php echo esc_html($angle); ?></p>
                                </div>
                            <?php endif; ?>
                            <?php if ($limitations) : ?>
                                <div>
                                    <h2><?php esc_html_e('Limitations', 'dp-starter'); ?></h2>
                                    <p><?php echo esc_html($limitations); ?></p>
                                </div>
                            <?php endif; ?>
                        </section>
                    <?php elseif (trim(get_the_content())) : ?>
                        <?php get_template_part('template-parts/content-single'); ?>
                    <?php endif; ?>
                </main>

                <aside class="dp-resource-sidebar dp-book-sidebar" aria-label="<?php esc_attr_e('Book details', 'dp-starter'); ?>">
                    <p class="dp-kicker"><?php esc_html_e('Book details', 'dp-starter'); ?></p>

                    <?php if ($book_url) : ?>
                        <a class="dp-book-buy-link" href="<?php echo esc_url($book_url); ?>" rel="sponsored nofollow noopener" target="_blank">
                            <?php esc_html_e('Buy the book', 'dp-starter'); ?>
                        </a>
                    <?php endif; ?>

                    <dl class="dp-book-facts">
                        <?php if ($authors) : ?>
                            <div><dt><?php esc_html_e('Author', 'dp-starter'); ?></dt><dd><?php echo esc_html($authors); ?></dd></div>
                        <?php endif; ?>
                        <?php if ($page_count) : ?>
                            <div><dt><?php esc_html_e('Pages', 'dp-starter'); ?></dt><dd><?php echo esc_html($page_count); ?></dd></div>
                        <?php endif; ?>
                        <?php if ($isbn_13) : ?>
                            <div><dt><?php esc_html_e('ISBN 13', 'dp-starter'); ?></dt><dd><?php echo esc_html($isbn_13); ?></dd></div>
                        <?php endif; ?>
                        <?php if ($asin) : ?>
                            <div><dt><?php esc_html_e('ASIN', 'dp-starter'); ?></dt><dd><?php echo esc_html($asin); ?></dd></div>
                        <?php endif; ?>
                    </dl>

                    <a href="<?php echo esc_url(home_url('/books/')); ?>"><?php esc_html_e('All Books', 'dp-starter'); ?></a>
                    <a href="<?php echo esc_url(home_url('/blog/')); ?>"><?php esc_html_e('All Guides', 'dp-starter'); ?></a>
                </aside>
            </div>
        </div>
    </article>
    <?php
endwhile;

get_footer();
