<?php
/**
 * Front page template.
 *
 * @package DP Starter_Resource
 */

if (!defined('ABSPATH')) {
    exit;
}

get_header();

$featured_count = (int) dp_starter_get_setting('home_featured_count');
if ($featured_count < 1) {
    $featured_count = 3;
}

$featured_query = new WP_Query(
    array(
        'posts_per_page'      => $featured_count,
        'ignore_sticky_posts' => true,
    )
);

$latest_count = (int) dp_starter_get_setting('home_latest_count');
if ($latest_count < 1) {
    $latest_count = 6;
}

$latest_query = new WP_Query(
    array(
        'posts_per_page'      => $latest_count,
        'ignore_sticky_posts' => true,
    )
);

$hero_proof_lines = array_filter(array_map('trim', explode("\n", dp_starter_get_setting('home_hero_proof'))));
?>

<section class="dp-home-hero dp-section" aria-labelledby="dp-home-title">
    <div class="dp-shell dp-home-hero-grid">
        <div class="dp-home-hero-copy">
            <p class="dp-kicker"><?php echo esc_html(dp_starter_get_setting('home_hero_kicker')); ?></p>
            <h1 id="dp-home-title"><?php echo esc_html(dp_starter_get_setting('home_hero_title')); ?></h1>
            <p class="dp-lede">
                <?php echo esc_html(dp_starter_get_setting('home_hero_description')); ?>
            </p>
            <div class="dp-hero-actions">
                <a class="dp-button dp-button-primary" href="<?php echo esc_url(home_url(dp_starter_get_setting('home_hero_cta_primary_url'))); ?>">
                    <?php echo esc_html(dp_starter_get_setting('home_hero_cta_primary_text')); ?>
                </a>
                <a class="dp-button dp-button-secondary" href="<?php echo esc_url(home_url(dp_starter_get_setting('home_hero_cta_secondary_url'))); ?>">
                    <?php echo esc_html(dp_starter_get_setting('home_hero_cta_secondary_text')); ?>
                </a>
            </div>
            <?php if (!empty($hero_proof_lines)) : ?>
                <div class="dp-hero-proofline">
                    <?php foreach ($hero_proof_lines as $proof) : ?>
                        <span><?php echo esc_html($proof); ?></span>
                    <?php endforeach; ?>
                </div>
            <?php endif; ?>
        </div>
    </div>
</section>

<?php if (dp_starter_get_setting('home_situations_enabled') === '1') :
    $situations_raw = array_filter(array_map('trim', explode("\n", dp_starter_get_setting('home_situations_items'))));
    $situations = array();
    foreach ($situations_raw as $line) {
        $parts = array_map('trim', explode('|', $line));
        if (count($parts) >= 4) {
            $situations[] = array(
                'label' => $parts[0],
                'title' => $parts[1],
                'copy'  => $parts[2],
                'url'   => $parts[3],
            );
        }
    }
?>
<section class="dp-section dp-section-soft" aria-labelledby="dp-situation-title">
    <div class="dp-shell">
        <div class="dp-section-heading">
            <p class="dp-kicker"><?php echo esc_html(dp_starter_get_setting('home_situations_kicker')); ?></p>
            <h2 id="dp-situation-title"><?php echo esc_html(dp_starter_get_setting('home_situations_title')); ?></h2>
        </div>

        <div class="dp-grid dp-grid-3 dp-situation-grid">
            <?php foreach ($situations as $situation) : ?>
                <article class="dp-card dp-situation-card">
                    <a class="dp-card-link" href="<?php echo esc_url(home_url($situation['url'])); ?>">
                        <div class="dp-card-body">
                            <span class="dp-pill"><?php echo esc_html($situation['label']); ?></span>
                            <h3><?php echo esc_html($situation['title']); ?></h3>
                            <p><?php echo esc_html($situation['copy']); ?></p>
                            <span class="dp-text-link"><?php esc_html_e('Explore this path', 'dp-starter'); ?></span>
                        </div>
                    </a>
                </article>
            <?php endforeach; ?>
        </div>
    </div>
</section>
<?php endif; ?>

<?php if (dp_starter_get_setting('home_featured_enabled') === '1') : ?>
<section class="dp-section" aria-labelledby="dp-featured-title">
    <div class="dp-shell">
        <div class="dp-section-heading dp-section-heading-row">
            <div>
                <p class="dp-kicker"><?php echo esc_html(dp_starter_get_setting('home_featured_kicker')); ?></p>
                <h2 id="dp-featured-title"><?php echo esc_html(dp_starter_get_setting('home_featured_title')); ?></h2>
            </div>
            <a class="dp-button dp-button-secondary" href="<?php echo esc_url(home_url(dp_starter_get_setting('home_featured_link_url'))); ?>">
                <?php echo esc_html(dp_starter_get_setting('home_featured_link_text')); ?>
            </a>
        </div>

        <?php if ($featured_query->have_posts()) : ?>
            <div class="dp-grid dp-grid-3">
                <?php
                while ($featured_query->have_posts()) :
                    $featured_query->the_post();
                    ?>
                    <article <?php post_class('dp-card dp-article-card'); ?>>
                        <a class="dp-card-link" href="<?php the_permalink(); ?>">
                            <?php if (has_post_thumbnail()) : ?>
                                <div class="dp-card-thumb">
                                    <?php the_post_thumbnail('dp-starter-card'); ?>
                                </div>
                            <?php endif; ?>
                            <div class="dp-card-body">
                                <span class="dp-pill"><?php echo esc_html(dp_starter_primary_category_name(get_the_ID())); ?></span>
                                <h3><?php the_title(); ?></h3>
                                <p><?php echo esc_html(dp_starter_trim_words(get_the_excerpt(), 24)); ?></p>
                                <div class="dp-meta">
                                    <span><?php echo esc_html(get_the_date()); ?></span>
                                    <span><?php echo esc_html(dp_starter_reading_time(get_the_ID())); ?></span>
                                </div>
                            </div>
                        </a>
                    </article>
                    <?php
                endwhile;
                wp_reset_postdata();
                ?>
            </div>
        <?php else : ?>
            <div class="dp-empty-state">
                <?php esc_html_e('Publish a few guides and they will appear here automatically.', 'dp-starter'); ?>
            </div>
        <?php endif; ?>
    </div>
</section>
<?php endif; ?>

<?php if (dp_starter_get_setting('home_books_enabled') === '1') :
    $books_count = (int) dp_starter_get_setting('home_books_count');
    if ($books_count < 1) {
        $books_count = 12;
    }

    $books_carousel = new WP_Query(array(
        'post_type'      => 'book',
        'post_status'    => 'publish',
        'posts_per_page' => $books_count,
        'orderby'        => 'date',
        'order'          => 'DESC',
        'meta_query'     => array(
            'relation' => 'OR',
            array(
                'key'     => '_thumbnail_id',
                'compare' => 'EXISTS',
            ),
            array(
                'key'     => 'dp_book_cover_image_url',
                'value'   => '',
                'compare' => '!=',
            ),
        ),
    ));

    if ($books_carousel->have_posts()) : ?>
<section class="dp-section dp-carousel-section dp-section-dark" aria-labelledby="dp-books-carousel-title">
    <div class="dp-shell">
        <div class="dp-section-heading dp-section-heading-row">
            <div>
                <p class="dp-kicker"><?php echo esc_html(dp_starter_get_setting('home_books_kicker')); ?></p>
                <h2 id="dp-books-carousel-title"><?php echo esc_html(dp_starter_get_setting('home_books_title')); ?></h2>
            </div>
            <a class="dp-button dp-button-secondary" href="<?php echo esc_url(home_url(dp_starter_get_setting('home_books_link_url'))); ?>">
                <?php echo esc_html(dp_starter_get_setting('home_books_link_text')); ?>
            </a>
        </div>
    </div>

    <div class="dp-carousel-track-wrap">
        <div class="dp-carousel-track">
            <?php while ($books_carousel->have_posts()) : $books_carousel->the_post();
                $cover_url = get_post_meta(get_the_ID(), 'dp_book_cover_image_url', true);
                $authors   = get_post_meta(get_the_ID(), 'dp_book_authors', true);
            ?>
                <a class="dp-carousel-card" href="<?php the_permalink(); ?>">
                    <div class="dp-carousel-cover">
                        <?php if (has_post_thumbnail()) : ?>
                            <?php the_post_thumbnail('dp-starter-square'); ?>
                        <?php elseif ($cover_url) : ?>
                            <img src="<?php echo esc_url($cover_url); ?>" alt="<?php echo esc_attr(get_the_title()); ?>">
                        <?php else : ?>
                            <div class="dp-book-cover-placeholder"><span><?php esc_html_e('Book', 'dp-starter'); ?></span></div>
                        <?php endif; ?>
                    </div>
                    <div class="dp-carousel-info">
                        <strong><?php the_title(); ?></strong>
                        <?php if ($authors) : ?>
                            <span><?php echo esc_html($authors); ?></span>
                        <?php endif; ?>
                    </div>
                </a>
            <?php endwhile; wp_reset_postdata(); ?>

            <?php /* Duplicate for seamless loop */ ?>
            <?php $books_carousel->rewind_posts(); ?>
            <?php while ($books_carousel->have_posts()) : $books_carousel->the_post();
                $cover_url = get_post_meta(get_the_ID(), 'dp_book_cover_image_url', true);
                $authors   = get_post_meta(get_the_ID(), 'dp_book_authors', true);
            ?>
                <a class="dp-carousel-card" href="<?php the_permalink(); ?>" aria-hidden="true" tabindex="-1">
                    <div class="dp-carousel-cover">
                        <?php if (has_post_thumbnail()) : ?>
                            <?php the_post_thumbnail('dp-starter-square'); ?>
                        <?php elseif ($cover_url) : ?>
                            <img src="<?php echo esc_url($cover_url); ?>" alt="">
                        <?php else : ?>
                            <div class="dp-book-cover-placeholder"><span><?php esc_html_e('Book', 'dp-starter'); ?></span></div>
                        <?php endif; ?>
                    </div>
                    <div class="dp-carousel-info">
                        <strong><?php the_title(); ?></strong>
                        <?php if ($authors) : ?>
                            <span><?php echo esc_html($authors); ?></span>
                        <?php endif; ?>
                    </div>
                </a>
            <?php endwhile; wp_reset_postdata(); ?>
        </div>
    </div>
</section>
    <?php endif; ?>
<?php endif; ?>

<?php if (dp_starter_get_setting('home_resources_enabled') === '1') :
    $resources_raw = array_filter(array_map('trim', explode("\n", dp_starter_get_setting('home_resources_items'))));
    $resource_categories = array();
    foreach ($resources_raw as $line) {
        $parts = array_map('trim', explode('|', $line));
        if (count($parts) >= 3) {
            $resource_categories[] = array(
                'title' => $parts[0],
                'copy'  => $parts[1],
                'url'   => $parts[2],
            );
        }
    }
?>
<section class="dp-section dp-section-soft" aria-labelledby="dp-resource-title">
    <div class="dp-shell">
        <div class="dp-section-heading">
            <p class="dp-kicker"><?php echo esc_html(dp_starter_get_setting('home_resources_kicker')); ?></p>
            <h2 id="dp-resource-title"><?php echo esc_html(dp_starter_get_setting('home_resources_title')); ?></h2>
        </div>

        <div class="dp-grid dp-grid-3">
            <?php foreach ($resource_categories as $resource) : ?>
                <article class="dp-resource-card">
                    <a href="<?php echo esc_url(home_url($resource['url'])); ?>">
                        <h3><?php echo esc_html($resource['title']); ?></h3>
                        <p><?php echo esc_html($resource['copy']); ?></p>
                        <span class="dp-text-link"><?php esc_html_e('Browse category', 'dp-starter'); ?></span>
                    </a>
                </article>
            <?php endforeach; ?>
        </div>
    </div>
</section>
<?php endif; ?>

<?php if (dp_starter_get_setting('home_antiadvice_enabled') === '1') :
    $anti_advice = array_filter(array_map('trim', explode("\n", dp_starter_get_setting('home_antiadvice_items'))));
?>
<section class="dp-section dp-section-dark" aria-labelledby="dp-avoid-title">
    <div class="dp-shell dp-dark-editorial">
        <div>
            <p class="dp-kicker"><?php echo esc_html(dp_starter_get_setting('home_antiadvice_kicker')); ?></p>
            <h2 id="dp-avoid-title"><?php echo esc_html(dp_starter_get_setting('home_antiadvice_title')); ?></h2>
            <p class="dp-lede">
                <?php echo esc_html(dp_starter_get_setting('home_antiadvice_description')); ?>
            </p>
        </div>

        <div class="dp-avoid-list">
            <?php foreach ($anti_advice as $item) : ?>
                <div class="dp-avoid-item">
                    <span></span>
                    <p><?php echo esc_html($item); ?></p>
                </div>
            <?php endforeach; ?>
        </div>
    </div>
</section>
<?php endif; ?>

<?php if (dp_starter_get_setting('home_latest_enabled') === '1') : ?>
<section class="dp-section" aria-labelledby="dp-latest-title">
    <div class="dp-shell">
        <div class="dp-section-heading dp-section-heading-row">
            <div>
                <p class="dp-kicker"><?php echo esc_html(dp_starter_get_setting('home_latest_kicker')); ?></p>
                <h2 id="dp-latest-title"><?php echo esc_html(dp_starter_get_setting('home_latest_title')); ?></h2>
            </div>
            <a class="dp-button dp-button-secondary" href="<?php echo esc_url(home_url(dp_starter_get_setting('home_latest_link_url'))); ?>">
                <?php echo esc_html(dp_starter_get_setting('home_latest_link_text')); ?>
            </a>
        </div>

        <?php if ($latest_query->have_posts()) : ?>
            <div class="dp-grid dp-grid-3">
                <?php
                while ($latest_query->have_posts()) :
                    $latest_query->the_post();
                    ?>
                    <article <?php post_class('dp-card dp-article-card dp-article-card-compact'); ?>>
                        <a class="dp-card-link" href="<?php the_permalink(); ?>">
                            <div class="dp-card-body">
                                <span class="dp-pill"><?php echo esc_html(dp_starter_primary_category_name(get_the_ID())); ?></span>
                                <h3><?php the_title(); ?></h3>
                                <p><?php echo esc_html(dp_starter_trim_words(get_the_excerpt(), 20)); ?></p>
                                <div class="dp-meta">
                                    <span><?php echo esc_html(get_the_date()); ?></span>
                                    <span><?php echo esc_html(dp_starter_reading_time(get_the_ID())); ?></span>
                                </div>
                            </div>
                        </a>
                    </article>
                    <?php
                endwhile;
                wp_reset_postdata();
                ?>
            </div>
        <?php else : ?>
            <div class="dp-empty-state">
                <?php esc_html_e('The latest articles will appear here as soon as posts are published.', 'dp-starter'); ?>
            </div>
        <?php endif; ?>
    </div>
</section>
<?php endif; ?>

<?php if (dp_starter_get_setting('home_newsletter_enabled') === '1') : ?>
<section class="dp-section dp-section-soft" aria-labelledby="dp-update-title">
    <div class="dp-shell">
        <div class="dp-newsletter-band">
            <div>
                <p class="dp-kicker"><?php echo esc_html(dp_starter_get_setting('home_newsletter_kicker')); ?></p>
                <h2 id="dp-update-title"><?php echo esc_html(dp_starter_get_setting('home_newsletter_title')); ?></h2>
                <p>
                    <?php echo esc_html(dp_starter_get_setting('home_newsletter_description')); ?>
                </p>
            </div>
            <a class="dp-button dp-button-primary" href="<?php echo esc_url(home_url(dp_starter_get_setting('home_newsletter_cta_url'))); ?>">
                <?php echo esc_html(dp_starter_get_setting('home_newsletter_cta_text')); ?>
            </a>
        </div>
    </div>
</section>
<?php endif; ?>

<?php if (dp_starter_get_setting('home_final_enabled') === '1') :
    $final_image_id = dp_starter_get_setting('home_final_image_id');
    $final_image_url = '';
    if ($final_image_id) {
        $final_image_url = wp_get_attachment_image_url((int) $final_image_id, 'large');
    }
    if (!$final_image_url) {
        $final_image_url = dp_starter_asset_image('cta-footer.png');
    }
?>
<section class="dp-final-cta" aria-labelledby="dp-final-title">
    <div class="dp-shell dp-final-cta-grid">
        <div>
            <p class="dp-kicker"><?php echo esc_html(dp_starter_get_setting('home_final_kicker')); ?></p>
            <h2 id="dp-final-title"><?php echo esc_html(dp_starter_get_setting('home_final_title')); ?></h2>
            <p>
                <?php echo esc_html(dp_starter_get_setting('home_final_description')); ?>
            </p>
            <a class="dp-button dp-button-primary" href="<?php echo esc_url(home_url(dp_starter_get_setting('home_final_cta_url'))); ?>">
                <?php echo esc_html(dp_starter_get_setting('home_final_cta_text')); ?>
            </a>
        </div>
        <img src="<?php echo esc_url($final_image_url); ?>" alt="<?php esc_attr_e('DP Starter resource library preview.', 'dp-starter'); ?>">
    </div>
</section>
<?php endif; ?>

<?php
get_footer();
