<?php
/**
 * Template Name: Offer Page
 * Description: Displays WooCommerce products as offer cards with manual selection or category filter.
 *
 * @package DP_Starter
 */

if (!defined('ABSPATH')) {
    exit;
}

get_header();

while (have_posts()) :
    the_post();

    // Page hero fields.
    $offer_kicker = trim((string) get_post_meta(get_the_ID(), 'dp_page_kicker', true));
    $offer_title  = dp_starter_page_display_title(get_the_ID());
    $offer_desc   = has_excerpt() ? get_the_excerpt() : trim(wp_strip_all_tags(get_the_content()));

    // Fetch products using priority logic (premium feature).
    $products = function_exists('dp_starter_get_offer_products') ? dp_starter_get_offer_products(get_the_ID()) : array();

    // Identify the best seller product.
    $featured_product = null;
    foreach ($products as $product) {
        if (get_post_meta($product->get_id(), '_dp_offer_best_seller', true) === '1') {
            $featured_product = $product;
            break;
        }
    }
?>

<section class="dp-offer-hero dp-section" aria-labelledby="dp-offer-title">
    <div class="dp-shell dp-offer-hero-grid">
        <div class="dp-offer-hero-copy">
            <?php if ($offer_kicker) : ?>
                <p class="dp-kicker"><?php echo esc_html($offer_kicker); ?></p>
            <?php endif; ?>
            <h1 id="dp-offer-title"><?php echo esc_html($offer_title); ?></h1>
            <?php if ($offer_desc) : ?>
                <p><?php echo esc_html($offer_desc); ?></p>
            <?php endif; ?>
        </div>

        <?php if ($featured_product) : ?>
            <aside class="dp-offer-recommendation" aria-label="<?php esc_attr_e('Best seller offer', 'dp-starter'); ?>">
                <span class="dp-offer-badge"><?php esc_html_e('Best seller', 'dp-starter'); ?></span>
                <h2><?php echo esc_html($featured_product->get_name()); ?></h2>
                <?php if ($featured_product->get_short_description()) : ?>
                    <p><?php echo esc_html($featured_product->get_short_description()); ?></p>
                <?php endif; ?>
                <a class="dp-button dp-button-primary" href="#product-<?php echo esc_attr($featured_product->get_id()); ?>">
                    <?php esc_html_e('Go to Best Seller', 'dp-starter'); ?>
                </a>
            </aside>
        <?php endif; ?>
    </div>
</section>

<?php
    $section_title = trim((string) get_post_meta(get_the_ID(), 'dp_page_aside_title', true));
    $section_desc  = trim((string) get_post_meta(get_the_ID(), 'dp_page_aside_text', true));
?>

<?php if (!empty($products)) : ?>
<section class="dp-section dp-offer-section" id="offers">
    <div class="dp-shell">
        <?php if ($section_title || $section_desc) : ?>
            <div class="dp-offer-section-intro">
                <?php if ($section_title) : ?>
                    <h2><?php echo esc_html($section_title); ?></h2>
                <?php endif; ?>
                <?php if ($section_desc) : ?>
                    <p><?php echo esc_html($section_desc); ?></p>
                <?php endif; ?>
            </div>
        <?php endif; ?>

        <div class="dp-offer-cards">
            <?php foreach ($products as $i => $product) :
                if (function_exists('dp_starter_render_product_card')) {
                    dp_starter_render_product_card($product, $i);
                }
            endforeach; ?>
        </div>
    </div>
</section>
<?php endif; ?>

<?php
endwhile;

get_footer();
