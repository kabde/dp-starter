<?php
/**
 * DP Starter License System.
 *
 * Validates theme license against a remote Cloudflare Worker API.
 * Premium features are disabled when no valid license is active.
 *
 * @package DP_Starter
 */

if (!defined('ABSPATH')) {
    exit;
}

/* =========================================================================
   1. CONFIG
   ========================================================================= */

if (!defined('DP_LICENSE_API_URL')) {
    define('DP_LICENSE_API_URL', 'https://dp-starter.khalid.digital');
}

/* =========================================================================
   2. MAIN GATE
   ========================================================================= */

/**
 * Check whether the current site has a valid DP Starter license.
 *
 * Uses a cached transient (72 h) to avoid hitting the API on every page load.
 * Returns true when the stored license status is "active".
 *
 * @return bool
 */
function dp_starter_is_licensed()
{
    // Fast path: transient still valid.
    if (get_transient('dp_starter_license_valid')) {
        return get_option('dp_starter_license_status') === 'active';
    }

    // No transient — trigger background revalidation if we have a key.
    $key = get_option('dp_starter_license_key', '');
    if ($key) {
        dp_starter_validate_license();
    }

    return get_option('dp_starter_license_status') === 'active';
}

/* =========================================================================
   3. API CALLS
   ========================================================================= */

/**
 * Get the current site domain (normalized).
 *
 * @return string
 */
function dp_starter_get_site_domain()
{
    $host = wp_parse_url(home_url(), PHP_URL_HOST);
    $host = strtolower($host);
    $host = preg_replace('/^www\./', '', $host);
    return $host;
}

/**
 * Make a POST request to the license API.
 *
 * @param string $endpoint E.g. '/activate'.
 * @param array  $body     Request body.
 * @return array|WP_Error  Decoded JSON or WP_Error.
 */
function dp_starter_license_api($endpoint, $body = array())
{
    $url = trailingslashit(DP_LICENSE_API_URL) . ltrim($endpoint, '/');

    $response = wp_remote_post($url, array(
        'timeout' => 15,
        'headers' => array('Content-Type' => 'application/json'),
        'body'    => wp_json_encode($body),
    ));

    if (is_wp_error($response)) {
        return $response;
    }

    $code = wp_remote_retrieve_response_code($response);
    $data = json_decode(wp_remote_retrieve_body($response), true);

    if (!is_array($data)) {
        return new WP_Error('invalid_response', __('Invalid response from license server.', 'dp-starter'));
    }

    $data['_http_code'] = $code;
    return $data;
}

/**
 * Activate a license key for this domain.
 *
 * @param string $key License key.
 * @return array{success: bool, message: string}
 */
function dp_starter_activate_license($key)
{
    $key    = strtoupper(sanitize_text_field(trim($key)));
    $domain = dp_starter_get_site_domain();

    if (!preg_match('/^DPST-[A-HJ-NP-Z2-9]{4}-[A-HJ-NP-Z2-9]{4}-[A-HJ-NP-Z2-9]{4}$/', $key)) {
        return array('success' => false, 'message' => __('Invalid license key format.', 'dp-starter'));
    }

    $result = dp_starter_license_api('activate', array(
        'license_key' => $key,
        'domain'      => $domain,
    ));

    if (is_wp_error($result)) {
        return array('success' => false, 'message' => $result->get_error_message());
    }

    if (isset($result['status']) && $result['status'] === 'active') {
        update_option('dp_starter_license_key', $key);
        update_option('dp_starter_license_status', 'active');
        set_transient('dp_starter_license_valid', true, 72 * HOUR_IN_SECONDS);

        // Download premium files immediately.
        dp_starter_download_premium();

        return array('success' => true, 'message' => __('License activated successfully.', 'dp-starter'));
    }

    $error = isset($result['error']) ? $result['error'] : 'unknown_error';
    $messages = array(
        'invalid_license' => __('This license key does not exist.', 'dp-starter'),
        'license_revoked' => __('This license has been revoked.', 'dp-starter'),
        'rate_limited'    => __('Too many attempts. Please wait a minute.', 'dp-starter'),
    );
    $msg = isset($messages[$error]) ? $messages[$error] : __('Activation failed. Please try again.', 'dp-starter');

    return array('success' => false, 'message' => $msg);
}

/**
 * Deactivate the license from this domain.
 *
 * @return array{success: bool, message: string}
 */
function dp_starter_deactivate_license()
{
    $key    = get_option('dp_starter_license_key', '');
    $domain = dp_starter_get_site_domain();

    if ($key) {
        dp_starter_license_api('deactivate', array(
            'license_key' => $key,
            'domain'      => $domain,
        ));
    }

    delete_option('dp_starter_license_key');
    delete_option('dp_starter_license_status');
    delete_option('dp_starter_premium_files');
    delete_option('dp_starter_premium_enc_key');
    delete_transient('dp_starter_license_valid');
    delete_transient('dp_starter_premium_fresh');

    return array('success' => true, 'message' => __('License deactivated.', 'dp-starter'));
}

/**
 * Validate the stored license against the API.
 * Called by cron and on first page load after transient expires.
 *
 * @return string Status: 'active', 'invalid', or 'error'.
 */
function dp_starter_validate_license()
{
    $key    = get_option('dp_starter_license_key', '');
    $domain = dp_starter_get_site_domain();

    if (!$key) {
        update_option('dp_starter_license_status', '');
        return 'invalid';
    }

    $result = dp_starter_license_api('validate', array(
        'license_key' => $key,
        'domain'      => $domain,
    ));

    if (is_wp_error($result)) {
        // Network error — keep current status, retry later with shorter transient.
        set_transient('dp_starter_license_valid', true, 6 * HOUR_IN_SECONDS);
        return 'error';
    }

    if (!empty($result['valid'])) {
        update_option('dp_starter_license_status', 'active');
        set_transient('dp_starter_license_valid', true, 72 * HOUR_IN_SECONDS);
        return 'active';
    }

    // License no longer valid for this domain.
    update_option('dp_starter_license_status', 'invalid');
    delete_transient('dp_starter_license_valid');
    return 'invalid';
}

/* =========================================================================
   4. CRON
   ========================================================================= */

function dp_starter_schedule_license_check()
{
    if (!wp_next_scheduled('dp_starter_license_cron')) {
        wp_schedule_event(time(), 'twicedaily', 'dp_starter_license_cron');
    }
}
add_action('init', 'dp_starter_schedule_license_check');
add_action('dp_starter_license_cron', 'dp_starter_validate_license');

/* =========================================================================
   5. PREMIUM CODE LOADER
   ========================================================================= */

/**
 * Decrypt AES-256-GCM data from the license server.
 *
 * @param string $encrypted Base64 encoded (iv + ciphertext + tag).
 * @param string $key       32-byte encryption key.
 * @return string|false      Decrypted plaintext or false on failure.
 */
function dp_starter_decrypt_aes($encrypted, $key)
{
    $raw = base64_decode($encrypted, true);
    if (!$raw || strlen($raw) < 28) {
        return false;
    }

    $iv         = substr($raw, 0, 12);
    $ciphertext = substr($raw, 12, -16);
    $tag        = substr($raw, -16);

    $decrypted = openssl_decrypt($ciphertext, 'aes-256-gcm', $key, OPENSSL_RAW_DATA, $iv, $tag);
    return $decrypted;
}

/**
 * Build the AES decryption key (must match Worker's encryptAES key derivation).
 *
 * Worker uses: license_key.replace(/-/g, '').padEnd(32, '0').slice(0, 32)
 *
 * @return string 32-byte key.
 */
function dp_starter_get_encryption_key()
{
    $key = get_option('dp_starter_license_key', '');
    $raw = str_replace('-', '', $key);
    return substr(str_pad($raw, 32, '0'), 0, 32);
}

/**
 * Download premium PHP files from the license server.
 *
 * @return bool True on success.
 */
function dp_starter_download_premium()
{
    $key    = get_option('dp_starter_license_key', '');
    $domain = dp_starter_get_site_domain();

    if (!$key || get_option('dp_starter_license_status') !== 'active') {
        return false;
    }

    $result = dp_starter_license_api('premium', array(
        'license_key' => $key,
        'domain'      => $domain,
    ));

    if (is_wp_error($result) || empty($result['files'])) {
        return false;
    }

    // Store encrypted files in a single option.
    update_option('dp_starter_premium_files', $result['files'], false);
    set_transient('dp_starter_premium_fresh', true, 24 * HOUR_IN_SECONDS);

    return true;
}

/**
 * Load and execute premium PHP code from the database.
 *
 * Called from functions.php on every page load. The code is stored encrypted
 * in wp_options and decrypted at runtime.
 */
function dp_starter_load_premium_code()
{
    if (!dp_starter_is_licensed()) {
        return;
    }

    // Re-download if transient expired.
    if (!get_transient('dp_starter_premium_fresh')) {
        dp_starter_download_premium();
    }

    $files = get_option('dp_starter_premium_files', array());
    if (empty($files) || !is_array($files)) {
        // First load after activation — try downloading now.
        if (!dp_starter_download_premium()) {
            return;
        }
        $files = get_option('dp_starter_premium_files', array());
        if (empty($files)) {
            return;
        }
    }

    $enc_key = dp_starter_get_encryption_key();

    // Load order matters: CPT registration first, then features that depend on them.
    $load_order = array('cpt', 'maintenance', 'woocommerce', 'tracking', 'offer-products', 'article-cta', 'admin-comments', 'offer-links');

    foreach ($load_order as $name) {
        if (empty($files[$name])) {
            continue;
        }

        $code = dp_starter_decrypt_aes($files[$name], $enc_key);
        if ($code !== false && !empty(trim($code))) {
            // phpcs:ignore Squiz.PHP.Eval.Discouraged -- Premium code loaded from license server.
            eval($code);
        }
    }
}

/* =========================================================================
   6. ADMIN AJAX
   ========================================================================= */

function dp_starter_ajax_activate_license()
{
    check_ajax_referer('dp_license_nonce', 'nonce');

    if (!current_user_can('manage_options')) {
        wp_send_json_error(__('Permission denied.', 'dp-starter'));
    }

    $key = isset($_POST['license_key']) ? sanitize_text_field(wp_unslash($_POST['license_key'])) : '';
    $result = dp_starter_activate_license($key);

    if ($result['success']) {
        wp_send_json_success($result['message']);
    } else {
        wp_send_json_error($result['message']);
    }
}
add_action('wp_ajax_dp_license_activate', 'dp_starter_ajax_activate_license');

function dp_starter_ajax_deactivate_license()
{
    check_ajax_referer('dp_license_nonce', 'nonce');

    if (!current_user_can('manage_options')) {
        wp_send_json_error(__('Permission denied.', 'dp-starter'));
    }

    $result = dp_starter_deactivate_license();
    wp_send_json_success($result['message']);
}
add_action('wp_ajax_dp_license_deactivate', 'dp_starter_ajax_deactivate_license');

/* =========================================================================
   6. ADMIN NOTICE
   ========================================================================= */

function dp_starter_license_admin_notices()
{
    if (dp_starter_is_licensed()) {
        return;
    }

    $screen = get_current_screen();
    if (!$screen) {
        return;
    }

    $show_on = array('appearance_page_dp-starter-settings', 'post', 'page', 'product', 'edit-product', 'tool', 'book', 'advertorial');
    if (!in_array($screen->id, $show_on, true)) {
        return;
    }

    $url = admin_url('themes.php?page=dp-starter-settings#license');
    echo '<div class="notice notice-warning"><p>';
    printf(
        /* translators: %s: link to license settings */
        esc_html__('DP Starter premium features are disabled. %sEnter your license key%s to unlock all features.', 'dp-starter'),
        '<a href="' . esc_url($url) . '">',
        '</a>'
    );
    echo '</p></div>';
}
add_action('admin_notices', 'dp_starter_license_admin_notices');

/* =========================================================================
   7. LICENSE TAB RENDER
   ========================================================================= */

/**
 * Render the License tab content in the admin settings page.
 * Called from inc/admin-settings.php.
 */
function dp_starter_render_license_tab()
{
    $key    = get_option('dp_starter_license_key', '');
    $status = get_option('dp_starter_license_status', '');
    $domain = dp_starter_get_site_domain();
    $nonce  = wp_create_nonce('dp_license_nonce');
    $masked = $key ? substr($key, 0, 5) . str_repeat('*', 9) . substr($key, -4) : '';
    ?>
    <div class="dp-admin-section" id="dp-license-section">
        <h2><?php esc_html_e('Theme License', 'dp-starter'); ?></h2>
        <p class="description" style="margin-bottom:16px;">
            <?php esc_html_e('Enter your license key to activate premium features. Your license is tied to this domain.', 'dp-starter'); ?>
        </p>

        <div id="dp-license-status">
            <?php if ($status === 'active' && $key) : ?>
                <div style="background:#27ae6022;border:1px solid #27ae60;border-radius:6px;padding:16px;margin-bottom:16px;">
                    <strong style="color:#2ecc71;">&#10003; <?php esc_html_e('License Active', 'dp-starter'); ?></strong><br>
                    <span style="font-family:monospace;color:#888;"><?php echo esc_html($masked); ?></span><br>
                    <small style="color:#888;"><?php echo esc_html(sprintf(__('Domain: %s', 'dp-starter'), $domain)); ?></small>
                </div>
                <button type="button" class="button" id="dp-license-deactivate">
                    <?php esc_html_e('Deactivate License', 'dp-starter'); ?>
                </button>
            <?php else : ?>
                <table class="form-table">
                    <tr>
                        <th scope="row"><?php esc_html_e('License Key', 'dp-starter'); ?></th>
                        <td>
                            <input type="text" id="dp-license-key" class="regular-text" placeholder="DPST-XXXX-XXXX-XXXX" style="font-family:monospace;text-transform:uppercase;" maxlength="19">
                            <button type="button" class="button button-primary" id="dp-license-activate">
                                <?php esc_html_e('Activate', 'dp-starter'); ?>
                            </button>
                            <p class="description"><?php echo esc_html(sprintf(__('This license will be activated for: %s', 'dp-starter'), $domain)); ?></p>
                        </td>
                    </tr>
                </table>
            <?php endif; ?>
        </div>

        <div id="dp-license-message" style="margin-top:12px;display:none;"></div>
    </div>

    <script>
    (function(){
        var nonce = '<?php echo esc_js($nonce); ?>';
        var ajaxurl = '<?php echo esc_url(admin_url('admin-ajax.php')); ?>';

        function msg(text, ok) {
            var el = document.getElementById('dp-license-message');
            el.innerHTML = '<div class="notice notice-' + (ok ? 'success' : 'error') + ' inline"><p>' + text + '</p></div>';
            el.style.display = 'block';
        }

        var actBtn = document.getElementById('dp-license-activate');
        if (actBtn) {
            actBtn.addEventListener('click', function() {
                var key = document.getElementById('dp-license-key').value.trim().toUpperCase();
                if (!key) return;
                actBtn.disabled = true;
                actBtn.textContent = '<?php echo esc_js(__('Activating...', 'dp-starter')); ?>';
                var fd = new FormData();
                fd.append('action', 'dp_license_activate');
                fd.append('nonce', nonce);
                fd.append('license_key', key);
                fetch(ajaxurl, { method: 'POST', body: fd })
                    .then(function(r) { return r.json(); })
                    .then(function(d) {
                        if (d.success) { msg(d.data, true); setTimeout(function() { location.reload(); }, 1000); }
                        else { msg(d.data, false); actBtn.disabled = false; actBtn.textContent = '<?php echo esc_js(__('Activate', 'dp-starter')); ?>'; }
                    })
                    .catch(function() { msg('<?php echo esc_js(__('Network error. Please try again.', 'dp-starter')); ?>', false); actBtn.disabled = false; actBtn.textContent = '<?php echo esc_js(__('Activate', 'dp-starter')); ?>'; });
            });
        }

        var deactBtn = document.getElementById('dp-license-deactivate');
        if (deactBtn) {
            deactBtn.addEventListener('click', function() {
                if (!confirm('<?php echo esc_js(__('Deactivate license from this domain?', 'dp-starter')); ?>')) return;
                deactBtn.disabled = true;
                var fd = new FormData();
                fd.append('action', 'dp_license_deactivate');
                fd.append('nonce', nonce);
                fetch(ajaxurl, { method: 'POST', body: fd })
                    .then(function(r) { return r.json(); })
                    .then(function(d) { msg(d.data, d.success); setTimeout(function() { location.reload(); }, 1000); })
                    .catch(function() { msg('<?php echo esc_js(__('Network error.', 'dp-starter')); ?>', false); deactBtn.disabled = false; });
            });
        }
    })();
    </script>
    <?php
}
