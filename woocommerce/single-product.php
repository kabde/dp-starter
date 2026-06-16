<?php
/**
 * Single product page template for WooCommerce.
 *
 * @package DP Starter_Resource
 */

if (!defined('ABSPATH')) {
    exit;
}

get_header();

while (have_posts()) :
    the_post();

    global $product;

    $pid        = $product->get_id();
    $category   = get_post_meta($pid, '_dp_offer_category', true);
    $price_note = get_post_meta($pid, '_dp_offer_price_note', true);
    $best_for   = get_post_meta($pid, '_dp_offer_best_for', true);
    $cta_text   = get_post_meta($pid, '_dp_offer_cta', true);
    $is_best    = get_post_meta($pid, '_dp_offer_best_seller', true) === '1';

    if (!$price_note) {
        $price_note = __('one-time access', 'dp-starter');
    }
    if (!$cta_text) {
        $cta_text = __('Order Now', 'dp-starter');
    }

    // Parse description into feature lines.
    $desc_raw   = $product->get_description();
    $desc_clean = wp_strip_all_tags($desc_raw);
    $features   = array_filter(array_map('trim', preg_split('/[\r\n]+/', $desc_clean)));
?>

    <article class="dp-product-page">
        <header class="dp-product-hero dp-section<?php echo $is_best ? ' dp-product-hero-featured' : ''; ?>">
            <div class="dp-shell dp-product-hero-grid">
                <div>
                    <?php if ($category) : ?>
                        <p class="dp-kicker"><?php echo esc_html($category); ?></p>
                    <?php endif; ?>

                    <?php if ($is_best) : ?>
                        <span class="dp-offer-badge"><?php esc_html_e('Best Seller', 'dp-starter'); ?></span>
                    <?php endif; ?>

                    <h1><?php the_title(); ?></h1>

                    <?php if ($product->get_short_description()) : ?>
                        <p class="dp-lede"><?php echo esc_html($product->get_short_description()); ?></p>
                    <?php endif; ?>
                </div>

                <div class="dp-product-buy-card">
                    <div class="dp-offer-price">
                        <span><?php echo wp_kses_post(wc_price($product->get_price())); ?></span>
                        <small><?php echo esc_html($price_note); ?></small>
                    </div>

                    <?php if ($best_for) : ?>
                        <div class="dp-offer-best-for"><?php echo esc_html($best_for); ?></div>
                    <?php endif; ?>

                    <a class="dp-button dp-button-primary" href="<?php echo esc_url(add_query_arg('add-to-cart', $pid, wc_get_checkout_url())); ?>">
                        <?php echo esc_html($cta_text); ?>
                    </a>

                    <div class="dp-product-meta-info">
                        <?php if ($product->is_downloadable()) : ?>
                            <span><?php esc_html_e('Digital download', 'dp-starter'); ?></span>
                        <?php endif; ?>
                        <span><?php esc_html_e('Instant access after payment', 'dp-starter'); ?></span>
                    </div>
                </div>
            </div>
        </header>

        <?php if (!empty($features)) : ?>
            <section class="dp-section">
                <div class="dp-shell dp-product-content">
                    <div>
                        <p class="dp-kicker"><?php esc_html_e('What is included', 'dp-starter'); ?></p>
                        <h2><?php esc_html_e('Everything inside this package.', 'dp-starter'); ?></h2>
                    </div>
                    <ul class="dp-product-features">
                        <?php foreach ($features as $feature) : ?>
                            <li><?php echo esc_html($feature); ?></li>
                        <?php endforeach; ?>
                    </ul>
                </div>
            </section>
        <?php endif; ?>

        <section class="dp-section dp-section-soft">
            <div class="dp-shell">
                <div class="dp-newsletter-band">
                    <div>
                        <p class="dp-kicker"><?php esc_html_e('Ready to start?', 'dp-starter'); ?></p>
                        <h2><?php echo esc_html($product->get_name()); ?></h2>
                        <div class="dp-offer-price">
                            <span><?php echo wp_kses_post(wc_price($product->get_price())); ?></span>
                            <small><?php echo esc_html($price_note); ?></small>
                        </div>
                    </div>
                    <a class="dp-button dp-button-primary" href="<?php echo esc_url(add_query_arg('add-to-cart', $pid, wc_get_checkout_url())); ?>">
                        <?php echo esc_html($cta_text); ?>
                    </a>
                </div>
            </div>
        </section>
    </article>

<?php
endwhile;

get_footer();
