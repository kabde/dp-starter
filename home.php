<?php
/**
 * Blog index template.
 *
 * @package DP Starter_Resource
 */

if (!defined('ABSPATH')) {
    exit;
}

get_header();

// Get top-level categories with posts, sorted by post count (most active first).
$all_cats   = get_categories(array('parent' => 0, 'hide_empty' => true, 'exclude' => get_cat_ID('uncategorized')));
$categories = array();
foreach ($all_cats as $cat) {
    // Include subcategory counts.
    $children = get_categories(array('child_of' => $cat->term_id, 'hide_empty' => true));
    $total    = (int) $cat->count;
    foreach ($children as $child) {
        $total += (int) $child->count;
    }
    $cat->count   = $total;
    $categories[] = $cat;
}
usort($categories, function ($a, $b) {
    return $b->count - $a->count;
});
$categories = array_slice($categories, 0, 6);
?>

<?php
$blog_page_id     = (int) get_option('page_for_posts');
$blog_title       = $blog_page_id ? dp_starter_page_display_title($blog_page_id) : __('Blog', 'dp-starter');
$blog_page        = $blog_page_id ? get_post($blog_page_id) : null;
$blog_content     = $blog_page ? trim(wp_strip_all_tags($blog_page->post_content)) : '';
$blog_excerpt     = $blog_page ? trim($blog_page->post_excerpt) : '';
$blog_description = $blog_excerpt ? $blog_excerpt : $blog_content;
$blog_kicker      = $blog_page_id ? trim((string) get_post_meta($blog_page_id, 'dp_page_kicker', true)) : '';
$aside_title      = $blog_page_id ? trim((string) get_post_meta($blog_page_id, 'dp_page_aside_title', true)) : '';
$aside_text       = $blog_page_id ? trim((string) get_post_meta($blog_page_id, 'dp_page_aside_text', true)) : '';
?>
<section class="dp-blog-hero dp-section" aria-labelledby="dp-blog-title">
    <div class="dp-shell dp-blog-hero-grid">
        <div>
            <?php if ($blog_kicker) : ?>
                <p class="dp-kicker"><?php echo esc_html($blog_kicker); ?></p>
            <?php endif; ?>
            <h1 id="dp-blog-title"><?php echo esc_html($blog_title); ?></h1>
            <?php if ($blog_description) : ?>
                <p class="dp-lede"><?php echo esc_html($blog_description); ?></p>
            <?php endif; ?>
        </div>

        <?php if ($aside_title || $aside_text) : ?>
            <aside class="dp-blog-brief" aria-label="<?php echo esc_attr($aside_title ?: __('Info', 'dp-starter')); ?>">
                <?php if ($aside_title) : ?>
                    <span><?php echo esc_html($aside_title); ?></span>
                <?php endif; ?>
                <?php if ($aside_text) : ?>
                    <p><?php echo esc_html($aside_text); ?></p>
                <?php endif; ?>
            </aside>
        <?php endif; ?>
    </div>
</section>

<?php if (!empty($categories) && !is_wp_error($categories)) : ?>
    <section class="dp-section dp-section-soft dp-blog-categories" aria-labelledby="dp-blog-categories-title">
        <div class="dp-shell">
            <div class="dp-section-heading dp-section-heading-row">
                <div>
                    <p class="dp-kicker"><?php esc_html_e('Browse by topic', 'dp-starter'); ?></p>
                    <h2 id="dp-blog-categories-title"><?php esc_html_e('Choose the problem you are solving now.', 'dp-starter'); ?></h2>
                </div>
            </div>

            <div class="dp-topic-strip">
                <?php foreach ($categories as $category) : ?>
                    <a class="dp-topic-card" href="<?php echo esc_url(get_category_link($category)); ?>">
                        <span><?php echo esc_html($category->name); ?></span>
                        <small>
                            <?php
                            echo esc_html(
                                sprintf(
                                    /* translators: %d is the number of published posts in this category. */
                                    _n('%d article', '%d articles', (int) $category->count, 'dp-starter'),
                                    (int) $category->count
                                )
                            );
                            ?>
                        </small>
                    </a>
                <?php endforeach; ?>
            </div>
        </div>
    </section>
<?php endif; ?>

<section class="dp-section" aria-labelledby="dp-blog-feed-title">
    <div class="dp-shell">
        <?php if (have_posts()) : ?>
            <?php
            the_post();
            ?>

            <div class="dp-section-heading">
                <p class="dp-kicker"><?php esc_html_e('Start here', 'dp-starter'); ?></p>
                <h2 id="dp-blog-feed-title"><?php esc_html_e('The latest useful guide.', 'dp-starter'); ?></h2>
            </div>

            <article <?php post_class('dp-featured-post'); ?>>
                <a class="dp-featured-post-link" href="<?php the_permalink(); ?>">
                    <div class="dp-featured-post-media">
                        <?php if (has_post_thumbnail()) : ?>
                            <?php the_post_thumbnail('dp-starter-hero'); ?>
                        <?php endif; ?>
                    </div>
                    <div class="dp-featured-post-copy">
                        <span class="dp-pill"><?php echo esc_html(dp_starter_primary_category_name(get_the_ID())); ?></span>
                        <h3><?php the_title(); ?></h3>
                        <p><?php echo esc_html(dp_starter_trim_words(get_the_excerpt(), 34)); ?></p>
                        <div class="dp-meta">
                            <span><?php echo esc_html(get_the_date()); ?></span>
                            <span><?php echo esc_html(dp_starter_reading_time(get_the_ID())); ?></span>
                        </div>
                    </div>
                </a>
            </article>

            <?php if (have_posts()) : ?>
                <div class="dp-section-heading dp-blog-list-heading">
                    <p class="dp-kicker"><?php esc_html_e('More guides', 'dp-starter'); ?></p>
                    <h2><?php esc_html_e('Keep building with better decisions.', 'dp-starter'); ?></h2>
                </div>

                <div class="dp-grid dp-grid-3 dp-blog-grid">
                    <?php
                    while (have_posts()) :
                        the_post();
                        ?>
                        <article <?php post_class('dp-card dp-article-card dp-article-card-compact'); ?>>
                            <a class="dp-card-link" href="<?php the_permalink(); ?>">
                                <?php if (has_post_thumbnail()) : ?>
                                    <div class="dp-card-thumb">
                                        <?php the_post_thumbnail('dp-starter-card'); ?>
                                    </div>
                                <?php endif; ?>
                                <div class="dp-card-body">
                                    <span class="dp-pill"><?php echo esc_html(dp_starter_primary_category_name(get_the_ID())); ?></span>
                                    <h3><?php the_title(); ?></h3>
                                    <p><?php echo esc_html(dp_starter_trim_words(get_the_excerpt(), 22)); ?></p>
                                    <div class="dp-meta">
                                        <span><?php echo esc_html(get_the_date()); ?></span>
                                        <span><?php echo esc_html(dp_starter_reading_time(get_the_ID())); ?></span>
                                    </div>
                                </div>
                            </a>
                        </article>
                        <?php
                    endwhile;
                    ?>
                </div>
            <?php endif; ?>

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
                <?php esc_html_e('No guides are published yet. Add your first article and it will appear here.', 'dp-starter'); ?>
            </div>
        <?php endif; ?>
    </div>
</section>

<?php
$cta_url  = dp_starter_get_setting('cta_url');
$cta_text = dp_starter_get_setting('cta_text');
if ($cta_url && $cta_text) : ?>
<section class="dp-section dp-section-soft">
    <div class="dp-shell">
        <div class="dp-newsletter-band">
            <a class="dp-button dp-button-primary" href="<?php echo esc_url($cta_url); ?>">
                <?php echo esc_html($cta_text); ?>
            </a>
        </div>
    </div>
</section>
<?php endif; ?>

<?php
get_footer();
