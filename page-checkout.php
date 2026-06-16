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

    // Gather policy pages for footer links + modals.
    $policy_keys = array(
        'checkout_page_refund'   => __('Refund Policy', 'dp-starter'),
        'checkout_page_shipping' => __('Shipping Policy', 'dp-starter'),
        'checkout_page_privacy'  => __('Privacy Policy', 'dp-starter'),
        'checkout_page_terms'    => __('Terms of Service', 'dp-starter'),
        'checkout_page_contact'  => __('Contact', 'dp-starter'),
    );
    $policy_pages = array();
    foreach ($policy_keys as $key => $label) {
        $pid = (int) dp_starter_get_setting($key);
        if ($pid && get_post_status($pid) === 'publish') {
            $policy_pages[] = array(
                'id'      => $pid,
                'label'   => $label,
                'title'   => get_the_title($pid),
                'content' => apply_filters('the_content', get_post_field('post_content', $pid)),
            );
        }
    }
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

    <?php if (!empty($policy_pages)) : ?>
        <div class="dp-checkout-policies">
            <div class="dp-shell">
                <div class="dp-checkout-policies-links">
                    <?php foreach ($policy_pages as $i => $pp) : ?>
                        <?php if ($i > 0) : ?><span class="dp-checkout-policies-sep">&middot;</span><?php endif; ?>
                        <a href="#" class="dp-checkout-policy-link" data-modal="dp-policy-modal-<?php echo esc_attr($pp['id']); ?>"><?php echo esc_html($pp['label']); ?></a>
                    <?php endforeach; ?>
                </div>
            </div>
        </div>

        <?php foreach ($policy_pages as $pp) : ?>
            <div class="dp-modal-overlay" id="dp-policy-modal-<?php echo esc_attr($pp['id']); ?>" aria-hidden="true">
                <div class="dp-modal" role="dialog" aria-label="<?php echo esc_attr($pp['title']); ?>">
                    <div class="dp-modal-header">
                        <h2><?php echo esc_html($pp['title']); ?></h2>
                        <button type="button" class="dp-modal-close" aria-label="<?php esc_attr_e('Close', 'dp-starter'); ?>">
                            <svg width="20" height="20" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round"><line x1="18" y1="6" x2="6" y2="18"/><line x1="6" y1="6" x2="18" y2="18"/></svg>
                        </button>
                    </div>
                    <div class="dp-modal-body">
                        <?php echo wp_kses_post($pp['content']); ?>
                    </div>
                </div>
            </div>
        <?php endforeach; ?>

        <script>
        (function() {
            document.querySelectorAll('.dp-checkout-policy-link').forEach(function(link) {
                link.addEventListener('click', function(e) {
                    e.preventDefault();
                    var modal = document.getElementById(this.dataset.modal);
                    if (modal) {
                        modal.setAttribute('aria-hidden', 'false');
                        document.body.classList.add('dp-modal-open');
                    }
                });
            });

            function closeModal(overlay) {
                overlay.setAttribute('aria-hidden', 'true');
                document.body.classList.remove('dp-modal-open');
            }

            document.querySelectorAll('.dp-modal-overlay').forEach(function(overlay) {
                overlay.querySelector('.dp-modal-close').addEventListener('click', function() {
                    closeModal(overlay);
                });
                overlay.addEventListener('click', function(e) {
                    if (e.target === overlay) closeModal(overlay);
                });
            });

            document.addEventListener('keydown', function(e) {
                if (e.key === 'Escape') {
                    var open = document.querySelector('.dp-modal-overlay[aria-hidden="false"]');
                    if (open) closeModal(open);
                }
            });
        })();
        </script>
    <?php endif; ?>
</div>

<?php
endwhile;

get_footer();
