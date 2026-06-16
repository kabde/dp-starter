<?php
/**
 * Static page template.
 *
 * @package DP Starter_Resource
 */

if (!defined('ABSPATH')) {
    exit;
}

get_header();

while (have_posts()) :
    the_post();
    ?>

    <?php
    $page_kicker      = trim((string) get_post_meta(get_the_ID(), 'dp_page_kicker', true));
    $page_title       = dp_starter_page_display_title(get_the_ID());
    $page_aside_title = trim((string) get_post_meta(get_the_ID(), 'dp_page_aside_title', true));
    $page_aside_text  = trim((string) get_post_meta(get_the_ID(), 'dp_page_aside_text', true));
    $hero_bg_id       = (int) get_post_meta(get_the_ID(), 'dp_page_hero_bg_id', true);
    $hero_bg_url      = $hero_bg_id ? wp_get_attachment_image_url($hero_bg_id, 'full') : '';
    $hero_style       = $hero_bg_url ? ' style="background-image:url(' . esc_url($hero_bg_url) . ');"' : '';
    $hero_class       = 'dp-page-hero dp-section' . ($hero_bg_url ? ' dp-page-hero-has-bg' : '');
    ?>
    <article <?php post_class('dp-page'); ?>>
        <header class="<?php echo esc_attr($hero_class); ?>"<?php echo $hero_style; ?>>
            <div class="dp-shell dp-page-hero-grid">
                <div>
                    <?php if ($page_kicker) : ?>
                        <p class="dp-kicker"><?php echo esc_html($page_kicker); ?></p>
                    <?php endif; ?>
                    <h1><?php echo esc_html($page_title); ?></h1>
                    <?php if (has_excerpt()) : ?>
                        <p class="dp-lede"><?php echo esc_html(get_the_excerpt()); ?></p>
                    <?php endif; ?>
                </div>

                <?php if ($page_aside_title || $page_aside_text) : ?>
                    <aside class="dp-page-aside">
                        <?php if ($page_aside_title) : ?>
                            <span><?php echo esc_html($page_aside_title); ?></span>
                        <?php endif; ?>
                        <?php if ($page_aside_text) : ?>
                            <p><?php echo esc_html($page_aside_text); ?></p>
                        <?php endif; ?>
                    </aside>
                <?php elseif (has_post_thumbnail()) : ?>
                    <div class="dp-page-hero-media">
                        <?php the_post_thumbnail('dp-starter-hero'); ?>
                    </div>
                <?php endif; ?>
            </div>
        </header>

        <section class="dp-section">
            <div class="dp-narrow">
                <?php get_template_part('template-parts/content-page'); ?>
            </div>
        </section>
    </article>

    <?php
endwhile;

get_footer();
