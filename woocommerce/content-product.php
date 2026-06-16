<?php
/**
 * Product card for the shop loop.
 *
 * @package DP_Starter
 */

if (!defined('ABSPATH')) {
    exit;
}

global $product;

if (!$product || !$product->is_visible()) {
    return;
}

$pid         = $product->get_id();
$is_best     = get_post_meta($pid, '_dp_offer_best_seller', true) === '1';
?>
<li <?php wc_product_class('dp-shop-card', $product); ?>>
    <a class="dp-shop-card-link" href="<?php the_permalink(); ?>">
        <div class="dp-shop-card-media">
            <?php if ($product->is_on_sale()) : ?>
                <span class="dp-shop-badge-sale"><?php esc_html_e('Sale', 'dp-starter'); ?></span>
            <?php endif; ?>
            <?php if ($is_best) : ?>
                <span class="dp-shop-badge-best"><?php esc_html_e('Best Seller', 'dp-starter'); ?></span>
            <?php endif; ?>
            <?php if (has_post_thumbnail()) : ?>
                <?php the_post_thumbnail('dp-starter-card'); ?>
            <?php else : ?>
                <?php echo wc_placeholder_img('dp-starter-card'); ?>
            <?php endif; ?>
        </div>

        <div class="dp-shop-card-body">
            <h3 class="dp-shop-card-title"><?php the_title(); ?></h3>

            <?php if ($product->get_short_description()) : ?>
                <p class="dp-shop-card-desc"><?php echo esc_html(wp_trim_words(wp_strip_all_tags($product->get_short_description()), 15, '...')); ?></p>
            <?php endif; ?>

            <div class="dp-shop-card-price">
                <?php echo $product->get_price_html(); ?>
            </div>
        </div>
    </a>

    <div class="dp-shop-card-actions">
        <?php
        echo apply_filters(
            'woocommerce_loop_add_to_cart_link',
            sprintf(
                '<a href="%s" data-quantity="1" class="dp-button dp-button-primary dp-shop-add-to-cart %s" %s>%s</a>',
                esc_url($product->add_to_cart_url()),
                esc_attr(implode(' ', array_filter(array(
                    'button',
                    'product_type_' . $product->get_type(),
                    $product->is_purchasable() && $product->is_in_stock() ? 'add_to_cart_button' : '',
                    $product->supports('ajax_add_to_cart') && $product->is_purchasable() && $product->is_in_stock() ? 'ajax_add_to_cart' : '',
                )))),
                wc_implode_html_attributes(array(
                    'data-product_id'  => $product->get_id(),
                    'data-product_sku' => $product->get_sku(),
                    'aria-label'       => $product->add_to_cart_description(),
                    'rel'              => 'nofollow',
                )),
                esc_html($product->add_to_cart_text())
            ),
            $product
        );
        ?>
    </div>
</li>
