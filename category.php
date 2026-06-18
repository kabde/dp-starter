<?php
/**
 * Category hub template.
 *
 * @package DP Starter_Resource
 */

if (!defined('ABSPATH')) {
    exit;
}

get_header();

$current_category = get_queried_object();
$siblings         = get_categories(
    array(
        'exclude'    => isset($current_category->term_id) ? array((int) $current_category->term_id) : array(),
        'number'     => 6,
        'hide_empty' => false,
    )
);
?>

<section class="dp-archive-hero dp-category-hero dp-section" aria-labelledby="dp-category-title">
    <div class="dp-shell dp-category-hero-grid">
        <div>
            <p class="dp-kicker"><?php esc_html_e('Topic hub', 'dp-starter'); ?></p>
            <h1 id="dp-category-title"><?php single_cat_title(); ?></h1>
            <?php
            $cat_description = category_description();
            if ($cat_description) : ?>
                <div class="dp-lede"><?php echo wp_kses_post($cat_description); ?></div>
            <?php endif; ?>
        </div>

        <?php
        $parent_cat = $current_category;
        if ($parent_cat && $parent_cat->parent) {
            $parent_cat = get_category($current_category->parent);
        }
        $parent_desc = ($parent_cat && $parent_cat->term_id !== $current_category->term_id) ? term_description($parent_cat->term_id) : '';
        ?>
        <?php if ($parent_desc) : ?>
            <aside class="dp-blog-brief">
                <span><?php echo esc_html($parent_cat->name); ?></span>
                <div><?php echo wp_kses_post($parent_desc); ?></div>
            </aside>
        <?php elseif (!$cat_description) : ?>
            <aside class="dp-blog-brief">
                <span><?php esc_html_e('Use this category', 'dp-starter'); ?></span>
                <p><?php esc_html_e('Pick one useful guide, apply it, then come back for the next decision instead of collecting more tactics.', 'dp-starter'); ?></p>
            </aside>
        <?php endif; ?>
    </div>
</section>

<section class="dp-section">
    <div class="dp-shell">
        <?php if (have_posts()) : ?>
            <?php the_post(); ?>
            <article <?php post_class('dp-featured-post'); ?>>
                <a class="dp-featured-post-link" href="<?php the_permalink(); ?>">
                    <div class="dp-featured-post-media">
                        <?php if (has_post_thumbnail()) : ?>
                            <?php the_post_thumbnail('dp-starter-hero'); ?>
                        <?php else : ?>
                            <img src="<?php echo esc_url(dp_starter_asset_image('what-is-included.jpg')); ?>" alt="<?php esc_attr_e('DP Starter category guide preview.', 'dp-starter'); ?>">
                        <?php endif; ?>
                    </div>
                    <div class="dp-featured-post-copy">
                        <span class="dp-pill"><?php esc_html_e('Suggested start', 'dp-starter'); ?></span>
                        <h2><?php the_title(); ?></h2>
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
                    <p class="dp-kicker"><?php esc_html_e('More from this topic', 'dp-starter'); ?></p>
                    <h2><?php esc_html_e('Keep going with related guides.', 'dp-starter'); ?></h2>
                </div>

                <div class="dp-grid dp-grid-3">
                    <?php
                    while (have_posts()) :
                        the_post();
                        get_template_part('template-parts/card-post', null, array('class' => 'dp-article-card-compact'));
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
                        'screen_reader_text' => __('Category navigation', 'dp-starter'),
                    )
                );
                ?>
            </div>
        <?php else : ?>
            <div class="dp-empty-state">
                <?php esc_html_e('This topic is ready, but no guides are published in it yet.', 'dp-starter'); ?>
            </div>
        <?php endif; ?>
    </div>
</section>

<?php if (!empty($siblings) && !is_wp_error($siblings)) : ?>
    <section class="dp-section dp-section-soft" aria-labelledby="dp-more-topics-title">
        <div class="dp-shell">
            <div class="dp-section-heading">
                <p class="dp-kicker"><?php esc_html_e('Related topics', 'dp-starter'); ?></p>
                <h2 id="dp-more-topics-title"><?php esc_html_e('Other topics to explore.', 'dp-starter'); ?></h2>
            </div>
            <div class="dp-topic-strip">
                <?php foreach ($siblings as $sibling) : ?>
                    <a class="dp-topic-card" href="<?php echo esc_url(get_category_link($sibling)); ?>">
                        <span><?php echo esc_html($sibling->name); ?></span>
                        <small>
                            <?php
                            echo esc_html(
                                sprintf(
                                    _n('%d article', '%d articles', (int) $sibling->count, 'dp-starter'),
                                    (int) $sibling->count
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

<?php
get_footer();
