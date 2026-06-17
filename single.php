<?php
/**
 * Single post template.
 *
 * @package DP Starter_Resource
 */

if (!defined('ABSPATH')) {
    exit;
}

get_header();

while (have_posts()) :
    the_post();

    $is_advertorial = 'advertorial' === get_post_type();
    $related_query  = $is_advertorial ? null : new WP_Query(
        array(
            'post__not_in'        => array(get_the_ID()),
            'posts_per_page'      => 3,
            'ignore_sticky_posts' => true,
            'category__in'        => wp_get_post_categories(get_the_ID()),
        )
    );
    ?>

    <article <?php post_class('dp-single'); ?>>
        <header class="dp-single-hero dp-section">
            <div class="dp-shell dp-single-hero-grid">
                <div>
                    <?php if ($is_advertorial) : ?>
                        <span class="dp-pill"><?php esc_html_e('Advertorial', 'dp-starter'); ?></span>
                    <?php else : ?>
                        <a class="dp-pill" href="<?php echo esc_url(dp_starter_primary_category_link(get_the_ID())); ?>">
                            <?php echo esc_html(dp_starter_primary_category_name(get_the_ID())); ?>
                        </a>
                    <?php endif; ?>
                    <h1><?php the_title(); ?></h1>
                    <?php if (has_excerpt()) : ?>
                        <p class="dp-lede"><?php echo esc_html(get_the_excerpt()); ?></p>
                    <?php endif; ?>
                    <div class="dp-single-meta">
                        <span><?php echo esc_html(get_the_author()); ?></span>
                        <span><?php echo esc_html(get_the_date()); ?></span>
                        <span><?php echo esc_html(dp_starter_reading_time(get_the_ID())); ?></span>
                    </div>
                </div>

                <?php if (has_post_thumbnail()) : ?>
                    <div class="dp-single-hero-media">
                        <?php the_post_thumbnail('dp-starter-hero'); ?>
                    </div>
                <?php endif; ?>
            </div>
        </header>

        <div class="dp-section">
            <div class="dp-shell dp-single-layout<?php echo $is_advertorial ? ' dp-single-layout-full' : ''; ?>">
                <main>
                    <?php get_template_part('template-parts/content-single'); ?>

                    <?php dp_starter_render_article_cta(get_the_ID()); ?>

                    <?php if (!$is_advertorial) : ?>
                        <nav class="dp-post-nav" aria-label="<?php esc_attr_e('Article navigation', 'dp-starter'); ?>">
                            <div><?php previous_post_link('%link', esc_html__('Previous article', 'dp-starter')); ?></div>
                            <div><?php next_post_link('%link', esc_html__('Next article', 'dp-starter')); ?></div>
                        </nav>
                    <?php endif; ?>

                    <?php
                    if (comments_open() || get_comments_number()) {
                        comments_template();
                    }
                    ?>
                </main>

                <?php if (!$is_advertorial) : ?>
                    <?php dp_starter_render_sidebar('dp-sidebar-blog'); ?>
                <?php endif; ?>
            </div>
        </div>
    </article>

    <?php if ($related_query && $related_query->have_posts()) : ?>
        <section class="dp-section dp-section-soft" aria-labelledby="dp-related-title">
            <div class="dp-shell">
                <div class="dp-section-heading">
                    <p class="dp-kicker"><?php esc_html_e('Related guides', 'dp-starter'); ?></p>
                    <h2 id="dp-related-title"><?php esc_html_e('Keep building from here.', 'dp-starter'); ?></h2>
                </div>
                <div class="dp-grid dp-grid-3">
                    <?php
                    while ($related_query->have_posts()) :
                        $related_query->the_post();
                        get_template_part('template-parts/card-post', null, array('class' => 'dp-article-card-compact'));
                    endwhile;
                    wp_reset_postdata();
                    ?>
                </div>
            </div>
        </section>
    <?php endif; ?>
    <?php
endwhile;

get_footer();
