<?php
/**
 * Template Name: Lead Capture
 * Description: Focused landing page with lead capture form, no nav/footer distractions.
 *
 * @package DP_Starter
 */

if (!defined('ABSPATH')) {
    exit;
}

get_header();

while (have_posts()) :
    the_post();
    $page_kicker   = trim((string) get_post_meta(get_the_ID(), 'dp_page_kicker', true));
    $page_title    = dp_starter_page_display_title(get_the_ID());
    $form_note     = trim((string) get_post_meta(get_the_ID(), 'dp_page_aside_text', true));
    $checklist_raw = trim((string) get_post_meta(get_the_ID(), 'dp_lead_checklist', true));
    $checklist     = $checklist_raw ? array_filter(array_map('trim', explode("\n", $checklist_raw))) : array();

    // Policy pages (reuses checkout settings).
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

<section class="dp-section dp-lead-capture-section" id="access">
    <div class="dp-shell dp-lead-capture-layout">
        <div class="dp-lead-capture-copy">
            <?php if ($page_kicker) : ?>
                <p class="dp-kicker"><?php echo esc_html($page_kicker); ?></p>
            <?php endif; ?>
            <h1><?php echo esc_html($page_title); ?></h1>
            <?php
            $content = trim(get_the_content());
            if ($content) :
                ?>
                <div class="dp-lead-capture-desc"><?php echo wp_kses_post(apply_filters('the_content', $content)); ?></div>
            <?php endif; ?>
        </div>

        <?php
        $selected_form = trim((string) get_post_meta(get_the_ID(), 'dp_lead_form_id', true));
        $form_html     = $selected_form ? dp_starter_render_form($selected_form) : '';
        ?>
        <div class="dp-lead-form">
            <?php if ($form_note) : ?>
                <p class="dp-lead-form-note" id="dp-lead-form-note"><?php echo esc_html($form_note); ?></p>
            <?php endif; ?>

            <?php if ($form_html) : ?>
                <!-- Plugin form -->
                <?php echo wp_kses_post($form_html); ?>
            <?php else : ?>
                <!-- Built-in fallback form -->
                <form id="dp-lead-form">
                    <?php wp_nonce_field('dp_lead_capture', 'dp_lead_nonce'); ?>

                    <div class="dp-lead-form-row dp-lead-form-names">
                        <input id="dp-first-name" name="first_name" type="text" placeholder="<?php esc_attr_e('First name', 'dp-starter'); ?>" autocomplete="given-name" required>
                        <input id="dp-last-name" name="last_name" type="text" placeholder="<?php esc_attr_e('Last name', 'dp-starter'); ?>" autocomplete="family-name" required>
                    </div>

                    <div class="dp-lead-form-row">
                        <input id="dp-email" name="email" type="email" placeholder="you@example.com" autocomplete="email" required>
                    </div>

                    <button class="dp-button dp-button-primary dp-lead-form-submit" type="submit"><?php esc_html_e('Get Access', 'dp-starter'); ?></button>
                </form>
            <?php endif; ?>

            <?php if (!empty($checklist)) : ?>
                <ul class="dp-lead-form-list">
                    <?php foreach ($checklist as $item) : ?>
                        <li><?php echo esc_html($item); ?></li>
                    <?php endforeach; ?>
                </ul>
            <?php endif; ?>
        </div>
    </div>
</section>

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
                if (modal) { modal.setAttribute('aria-hidden', 'false'); document.body.classList.add('dp-modal-open'); }
            });
        });
        function closeModal(o) { o.setAttribute('aria-hidden', 'true'); document.body.classList.remove('dp-modal-open'); }
        document.querySelectorAll('.dp-modal-overlay').forEach(function(o) {
            o.querySelector('.dp-modal-close').addEventListener('click', function() { closeModal(o); });
            o.addEventListener('click', function(e) { if (e.target === o) closeModal(o); });
        });
        document.addEventListener('keydown', function(e) {
            if (e.key === 'Escape') { var o = document.querySelector('.dp-modal-overlay[aria-hidden="false"]'); if (o) closeModal(o); }
        });
    })();
    </script>
<?php endif; ?>

<script>
(function() {
    var form = document.getElementById('dp-lead-form');
    var note = document.getElementById('dp-lead-form-note');
    if (!form) return;

    form.addEventListener('submit', function(e) {
        e.preventDefault();
        var firstName = form.querySelector('[name="first_name"]').value.trim();
        var lastName  = form.querySelector('[name="last_name"]').value.trim();
        var email     = form.querySelector('[name="email"]').value.trim();

        if (!firstName || !lastName || !email) {
            note.textContent = '<?php echo esc_js(__('Please fill in all fields.', 'dp-starter')); ?>';
            return;
        }

        var btn = form.querySelector('button[type="submit"]');
        btn.disabled = true;
        btn.textContent = '<?php echo esc_js(__('Redirecting...', 'dp-starter')); ?>';
        note.textContent = '<?php echo esc_js(__('Thank you. Preparing the next step...', 'dp-starter')); ?>';

        var data = new FormData(form);
        data.append('action', 'dp_lead_capture');
        data.append('nonce', form.querySelector('[name="dp_lead_nonce"]').value);
        data.append('page_url', window.location.href);

        fetch('<?php echo esc_url(admin_url('admin-ajax.php')); ?>', {
            method: 'POST',
            body: data
        }).finally(function() {
            if (typeof fbq !== 'undefined') {
                fbq('track', 'Lead', { content_name: '<?php echo esc_js(dp_starter_get_setting('fb_lead_event_name') ?: get_bloginfo('name')); ?>' });
            }
            setTimeout(function() {
                window.location.href = '<?php echo esc_url(home_url('/offer/')); ?>';
            }, 500);
        });
    });
})();
</script>

<?php
endwhile;

get_footer();
