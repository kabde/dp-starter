<?php
/**
 * Checkout page template — focused, distraction-free layout.
 *
 * @package DP_Starter
 */

if (!defined('ABSPATH')) {
    exit;
}

get_header();

while (have_posts()) :
    the_post();
    $page_kicker = trim((string) get_post_meta(get_the_ID(), 'dp_page_kicker', true));
    $page_title  = dp_starter_page_display_title(get_the_ID());

?>

<div class="dp-checkout-page">
    <header class="dp-checkout-header dp-page-hero dp-section">
        <div class="dp-shell">
            <?php if ($page_kicker) : ?>
                <p class="dp-kicker"><?php echo esc_html($page_kicker); ?></p>
            <?php endif; ?>
            <h1><?php echo esc_html($page_title); ?></h1>
        </div>
    </header>

    <div class="dp-section dp-checkout-body">
        <div class="dp-shell dp-checkout-layout">
            <?php the_content(); ?>
        </div>
    </div>

    <!-- Policy links are rendered in footer.php when focused mode is active -->
</div>

<?php
endwhile;

get_footer();
