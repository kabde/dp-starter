<?php
/**
 * Offer page template — displays WooCommerce products dynamically.
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

    // Fetch all published products, ordered by price.
    $products = wc_get_products(array(
        'status'  => 'publish',
        'limit'   => -1,
        'orderby' => 'price',
        'order'   => 'ASC',
    ));

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
                $pid         = $product->get_id();
                $is_featured = get_post_meta($pid, '_dp_offer_best_seller', true) === '1';
                $number      = str_pad($i + 1, 2, '0', STR_PAD_LEFT);
                $category    = get_post_meta($pid, '_dp_offer_category', true);
                $price_note  = get_post_meta($pid, '_dp_offer_price_note', true);
                $best_for    = get_post_meta($pid, '_dp_offer_best_for', true);
                $cta_text    = get_post_meta($pid, '_dp_offer_cta', true);

                if (!$cta_text) {
                    $cta_text = __('Order Now', 'dp-starter');
                }
            ?>
                <article class="dp-offer-card<?php echo $is_featured ? ' dp-offer-card-featured' : ''; ?>" id="product-<?php echo esc_attr($pid); ?>">
                    <?php if ($is_featured) : ?>
                        <div class="dp-offer-ribbon"><?php esc_html_e('Best Seller', 'dp-starter'); ?></div>
                    <?php endif; ?>

                    <div class="dp-offer-card-head">
                        <span class="dp-offer-number"><?php echo esc_html($number); ?></span>
                        <?php if ($category) : ?>
                            <span class="dp-offer-type"><?php echo esc_html($category); ?></span>
                        <?php endif; ?>
                    </div>

                    <h3><?php echo esc_html($product->get_name()); ?></h3>

                    <div class="dp-offer-price">
                        <span><?php echo wp_kses_post(wc_price($product->get_price())); ?></span>
                        <?php if ($price_note) : ?>
                            <small><?php echo esc_html($price_note); ?></small>
                        <?php endif; ?>
                    </div>

                    <?php if ($product->get_short_description()) : ?>
                        <p class="dp-offer-card-summary"><?php echo esc_html($product->get_short_description()); ?></p>
                    <?php endif; ?>

                    <?php if ($best_for) : ?>
                        <div class="dp-offer-best-for"><?php echo esc_html($best_for); ?></div>
                    <?php endif; ?>

                    <?php
                    $description = $product->get_description();
                    if ($description) :
                        $desc_clean = wp_strip_all_tags($description);
                        $lines = preg_split('/[\r\n]+/', $desc_clean);
                        $lines = array_filter(array_map('trim', $lines));
                        if (!empty($lines)) : ?>
                            <ul class="dp-offer-features">
                                <?php foreach ($lines as $line) : ?>
                                    <li><?php echo esc_html($line); ?></li>
                                <?php endforeach; ?>
                            </ul>
                        <?php endif;
                    endif; ?>

                    <a class="dp-button <?php echo $is_featured ? 'dp-button-primary' : 'dp-button-secondary'; ?>" href="<?php echo esc_url(add_query_arg('add-to-cart', $pid, wc_get_checkout_url())); ?>">
                        <?php echo esc_html($cta_text); ?>
                    </a>
                </article>
            <?php endforeach; ?>
        </div>
    </div>
</section>
<?php endif; ?>

<?php
endwhile;

get_footer();
