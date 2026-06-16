<?php
/**
 * Shop archive page — product listing.
 *
 * Overrides WooCommerce default archive-product.php.
 * Uses DP Starter hero + grid design.
 *
 * @package DP_Starter
 */

if (!defined('ABSPATH')) {
    exit;
}

get_header();
?>

<section class="dp-archive-hero dp-section" aria-labelledby="dp-shop-title">
    <div class="dp-shell">
        <?php if (is_shop()) : ?>
            <h1 id="dp-shop-title"><?php woocommerce_page_title(); ?></h1>
            <?php
            $shop_page_id = wc_get_page_id('shop');
            if ($shop_page_id > 0) {
                $shop_desc = get_post_meta($shop_page_id, 'dp_page_display_title', true);
                $shop_kicker = get_post_meta($shop_page_id, 'dp_page_kicker', true);
                if ($shop_kicker) {
                    echo '<p class="dp-kicker" style="order:-1;">' . esc_html($shop_kicker) . '</p>';
                }
                $excerpt = get_post_field('post_excerpt', $shop_page_id);
                $content = get_post_field('post_content', $shop_page_id);
                $desc = $excerpt ? $excerpt : trim(wp_strip_all_tags($content));
                if ($desc) {
                    echo '<p class="dp-lede">' . esc_html($desc) . '</p>';
                }
            }
            ?>
        <?php elseif (is_product_category()) : ?>
            <?php
            $term = get_queried_object();
            ?>
            <p class="dp-kicker"><?php esc_html_e('Category', 'dp-starter'); ?></p>
            <h1 id="dp-shop-title"><?php single_cat_title(); ?></h1>
            <?php if ($term && $term->description) : ?>
                <p class="dp-lede"><?php echo esc_html($term->description); ?></p>
            <?php endif; ?>
        <?php elseif (is_product_tag()) : ?>
            <p class="dp-kicker"><?php esc_html_e('Tag', 'dp-starter'); ?></p>
            <h1 id="dp-shop-title"><?php single_tag_title(); ?></h1>
        <?php elseif (is_search()) : ?>
            <p class="dp-kicker"><?php esc_html_e('Search results', 'dp-starter'); ?></p>
            <h1 id="dp-shop-title"><?php printf(esc_html__('Results for "%s"', 'dp-starter'), get_search_query()); ?></h1>
        <?php else : ?>
            <h1 id="dp-shop-title"><?php the_archive_title(); ?></h1>
        <?php endif; ?>
    </div>
</section>

<section class="dp-section dp-shop-section">
    <div class="dp-shell">

        <?php if (woocommerce_product_loop()) : ?>

            <div class="dp-shop-topbar">
                <?php woocommerce_result_count(); ?>
                <?php woocommerce_catalog_ordering(); ?>
            </div>

            <?php woocommerce_product_loop_start(); ?>

                <?php while (have_posts()) : the_post(); ?>
                    <?php wc_get_template_part('content', 'product'); ?>
                <?php endwhile; ?>

            <?php woocommerce_product_loop_end(); ?>

            <div class="dp-pagination">
                <?php
                $total   = isset($wp_query) ? (int) $wp_query->max_num_pages : 1;
                $current = max(1, get_query_var('paged'));
                if ($total > 1) {
                    echo '<div class="nav-links">';
                    echo wp_kses_post(paginate_links(array(
                        'total'     => $total,
                        'current'   => $current,
                        'mid_size'  => 1,
                        'prev_text' => __('&laquo; Previous', 'dp-starter'),
                        'next_text' => __('Next &raquo;', 'dp-starter'),
                    )));
                    echo '</div>';
                }
                ?>
            </div>

        <?php else : ?>
            <div class="dp-empty-state">
                <?php esc_html_e('No products were found matching your selection.', 'dp-starter'); ?>
            </div>
        <?php endif; ?>

    </div>
</section>

<?php
get_footer();
