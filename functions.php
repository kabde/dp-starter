<?php
/**
 * DP Starter Resource theme functions.
 *
 * @package DP Starter_Resource
 */

if (!defined('ABSPATH')) {
    exit;
}

// Load license system (must be first).
require_once get_template_directory() . '/inc/license.php';

// Load admin settings page.
require_once get_template_directory() . '/inc/admin-settings.php';

// Load widget areas and custom widgets.
require_once get_template_directory() . '/inc/widgets.php';

// Load premium features from license server (stored in DB).
dp_starter_load_premium_code();

if (!defined('DP_STARTER_VERSION')) {
    define('DP_STARTER_VERSION', '3.2.1');
}

if (!defined('DP_STARTER_THEME_DIR')) {
    define('DP_STARTER_THEME_DIR', get_template_directory());
}

if (!defined('DP_STARTER_THEME_URI')) {
    define('DP_STARTER_THEME_URI', get_template_directory_uri());
}

/* =========================================================================
   THEME AUTO-SETUP ON ACTIVATION
   ========================================================================= */

/**
 * Automatically create required pages and configure WordPress on theme activation.
 */
function dp_starter_on_activation()
{
    $pages = dp_starter_required_pages();

    foreach ($pages as $slug => $page) {
        if (get_page_by_path($slug)) {
            continue;
        }

        $post_id = wp_insert_post(array(
            'post_title'   => $page['title'],
            'post_name'    => $slug,
            'post_content' => $page['content'],
            'post_status'  => 'publish',
            'post_type'    => 'page',
        ));

        if ($post_id && !is_wp_error($post_id)) {
            if ($page['template']) {
                update_post_meta($post_id, '_wp_page_template', $page['template']);
            }
            if ($slug === 'home') {
                update_option('show_on_front', 'page');
                update_option('page_on_front', $post_id);
            }
            if ($slug === 'blog') {
                update_option('page_for_posts', $post_id);
            }
        }
    }

    // Set permalinks to post name if still on default.
    if (get_option('permalink_structure') === '') {
        update_option('permalink_structure', '/%postname%/');
    }

    flush_rewrite_rules();
}
add_action('after_switch_theme', 'dp_starter_on_activation');

/* =========================================================================
   THEME PAGES SETUP
   ========================================================================= */

/**
 * List of theme pages that should exist for full functionality.
 *
 * @return array<string, array{title: string, template: string, content: string}>
 */
function dp_starter_required_pages()
{
    return array(
        'home' => array(
            'title'    => __('Home', 'dp-starter'),
            'template' => '',
            'content'  => '',
        ),
        'start-here' => array(
            'title'    => __('Start Here', 'dp-starter'),
            'template' => '',
            'content'  => __('Welcome! This is your starting point.', 'dp-starter'),
        ),
        'books' => array(
            'title'    => __('Books', 'dp-starter'),
            'template' => 'page-books.php',
            'content'  => '',
        ),
        'tools' => array(
            'title'    => __('Tools', 'dp-starter'),
            'template' => 'page-tools.php',
            'content'  => '',
        ),
        'offer' => array(
            'title'    => __('Offer', 'dp-starter'),
            'template' => 'template-offer.php',
            'content'  => '',
        ),
        'blog' => array(
            'title'    => __('Blog', 'dp-starter'),
            'template' => '',
            'content'  => '',
        ),
    );
}

/**
 * Check which required pages exist.
 *
 * @return array<string, array{exists: bool, id: int, edit_url: string}>
 */
function dp_starter_check_pages()
{
    $pages = dp_starter_required_pages();
    $status = array();
    foreach ($pages as $slug => $page) {
        $existing = get_page_by_path($slug);
        $status[$slug] = array(
            'exists'   => (bool) $existing,
            'id'       => $existing ? $existing->ID : 0,
            'edit_url' => $existing ? get_edit_post_link($existing->ID, 'raw') : '',
        );
    }
    return $status;
}

/**
 * AJAX: Create missing theme pages.
 */
function dp_starter_ajax_setup_pages()
{
    check_ajax_referer('dp_setup_pages', 'nonce');

    if (!current_user_can('manage_options')) {
        wp_send_json_error(__('Permission denied.', 'dp-starter'));
    }

    $pages = dp_starter_required_pages();
    $created = array();
    $skipped = array();

    foreach ($pages as $slug => $page) {
        $existing = get_page_by_path($slug);
        if ($existing) {
            $skipped[] = $page['title'];
            continue;
        }

        $post_data = array(
            'post_title'   => $page['title'],
            'post_name'    => $slug,
            'post_content' => $page['content'],
            'post_status'  => 'publish',
            'post_type'    => 'page',
        );

        $post_id = wp_insert_post($post_data);

        if ($post_id && !is_wp_error($post_id)) {
            if ($page['template']) {
                update_post_meta($post_id, '_wp_page_template', $page['template']);
            }
            // Set "Home" as the front page.
            if ($slug === 'home') {
                update_option('show_on_front', 'page');
                update_option('page_on_front', $post_id);
            }
            // Set "Blog" as the posts page.
            if ($slug === 'blog') {
                update_option('page_for_posts', $post_id);
            }
            $created[] = $page['title'];
        }
    }

    // Flush rewrite rules after creating pages.
    flush_rewrite_rules();

    $msg = '';
    if (!empty($created)) {
        $msg .= sprintf(__('Created: %s.', 'dp-starter'), implode(', ', $created));
    }
    if (!empty($skipped)) {
        $msg .= ' ' . sprintf(__('Already exist: %s.', 'dp-starter'), implode(', ', $skipped));
    }

    wp_send_json_success($msg ?: __('All pages already exist.', 'dp-starter'));
}
add_action('wp_ajax_dp_setup_pages', 'dp_starter_ajax_setup_pages');

if (!function_exists('dp_starter_setup')) {
    /**
     * Register theme support and navigation menus.
     */
    function dp_starter_setup()
    {
        load_theme_textdomain('dp-starter', DP_STARTER_THEME_DIR . '/languages');

        add_theme_support('automatic-feed-links');
        add_theme_support('title-tag');
        add_theme_support('post-thumbnails');
        add_theme_support('responsive-embeds');
        add_theme_support('align-wide');
        add_theme_support('editor-styles');
        add_theme_support('wp-block-styles');
        add_theme_support(
            'html5',
            array(
                'search-form',
                'comment-form',
                'comment-list',
                'gallery',
                'caption',
                'style',
                'script',
                'navigation-widgets',
            )
        );
        add_theme_support(
            'custom-logo',
            array(
                'height'      => 96,
                'width'       => 320,
                'flex-height' => true,
                'flex-width'  => true,
            )
        );

        add_theme_support('woocommerce');

        add_image_size('dp-starter-card', 720, 420, true);
        add_image_size('dp-starter-hero', 1440, 0, false);
        add_image_size('dp-starter-square', 640, 640, true);

        register_nav_menus(
            array(
                'primary' => __('Primary Menu', 'dp-starter'),
                'footer'  => __('Footer Menu', 'dp-starter'),
            )
        );
    }
}
add_action('after_setup_theme', 'dp_starter_setup');

/**
 * Set a comfortable content width for embeds and editor content.
 */
function dp_starter_content_width()
{
    $GLOBALS['content_width'] = apply_filters('dp_starter_content_width', 760);
}
add_action('after_setup_theme', 'dp_starter_content_width', 0);

/**
 * Enqueue theme assets.
 */
function dp_starter_enqueue_assets()
{
    $css_version = DP_STARTER_VERSION . '.' . absint(get_option('dp_starter_settings_version', 0));
    wp_enqueue_style(
        'dp-starter-style',
        get_stylesheet_uri(),
        array(),
        $css_version
    );

    $script_path = DP_STARTER_THEME_DIR . '/assets/js/theme.js';
    if (file_exists($script_path)) {
        wp_enqueue_script(
            'dp-starter-theme',
            DP_STARTER_THEME_URI . '/assets/js/theme.js',
            array(),
            DP_STARTER_VERSION,
            true
        );
    }
}
add_action('wp_enqueue_scripts', 'dp_starter_enqueue_assets');

/**
 * Enqueue editor styles.
 */
function dp_starter_editor_styles()
{
    add_editor_style('style.css');
}
add_action('after_setup_theme', 'dp_starter_editor_styles');

/**
 * Enable excerpts on pages for resource hub summaries.
 */
function dp_starter_page_excerpts()
{
    add_post_type_support('page', 'excerpt');
}
add_action('init', 'dp_starter_page_excerpts');

/**
 * Get all available forms from supported plugins.
 *
 * @return array<int|string, string> Form ID => Form title.
 */
function dp_starter_get_available_forms()
{
    $forms = array();
    global $wpdb;

    // Fluent Forms.
    $table = $wpdb->prefix . 'fluentform_forms';
    if ($wpdb->get_var($wpdb->prepare("SHOW TABLES LIKE %s", $table)) === $table) {
        $results = $wpdb->get_results($wpdb->prepare("SELECT id, title FROM {$table} WHERE status = %s ORDER BY title ASC", 'published'));
        foreach ($results as $row) {
            $forms['fluentform_' . $row->id] = '[Fluent Forms] ' . $row->title;
        }
    }

    // WPForms.
    if (function_exists('wpforms')) {
        $wpforms = get_posts(array('post_type' => 'wpforms', 'posts_per_page' => -1, 'post_status' => 'publish', 'orderby' => 'title', 'order' => 'ASC'));
        foreach ($wpforms as $f) {
            $forms['wpforms_' . $f->ID] = '[WPForms] ' . $f->post_title;
        }
    }

    // Contact Form 7.
    if (class_exists('WPCF7_ContactForm')) {
        $cf7 = get_posts(array('post_type' => 'wpcf7_contact_form', 'posts_per_page' => -1, 'post_status' => 'publish', 'orderby' => 'title', 'order' => 'ASC'));
        foreach ($cf7 as $f) {
            $forms['cf7_' . $f->ID] = '[CF7] ' . $f->post_title;
        }
    }

    // FluentCRM Forms.
    if (defined('FLUENTCRM')) {
        global $wpdb;
        $fcrm_table = $wpdb->prefix . 'fc_meta';
        if ($wpdb->get_var($wpdb->prepare("SHOW TABLES LIKE %s", $fcrm_table)) === $fcrm_table) {
            $fcrm_forms = $wpdb->get_results($wpdb->prepare("SELECT id, value FROM {$fcrm_table} WHERE object_type = %s AND `key` = %s LIMIT 0", 'FluentCrm\\App\\Models\\Funnel', 'funnel'));
            // FluentCRM free doesn't have standalone forms — uses Fluent Forms integration.
            // If FluentCRM Pro with forms, they'd be here.
        }
    }

    // MailPoet.
    if (class_exists('\MailPoet\API\API')) {
        try {
            $mailpoet_forms = get_posts(array(
                'post_type'      => 'mailpoet_page',
                'posts_per_page' => -1,
                'post_status'    => 'publish',
                'orderby'        => 'title',
                'order'          => 'ASC',
            ));
            // MailPoet stores forms in its own table.
            global $wpdb;
            $mp_table = $wpdb->prefix . 'mailpoet_forms';
            if ($wpdb->get_var($wpdb->prepare("SHOW TABLES LIKE %s", $mp_table)) === $mp_table) {
                $mp_forms = $wpdb->get_results("SELECT id, name FROM {$mp_table} WHERE deleted_at IS NULL ORDER BY name ASC"); // phpcs:ignore WordPress.DB.PreparedSQL.InterpolatedNotPrepared -- table name from $wpdb->prefix, no user input
                foreach ($mp_forms as $mf) {
                    $forms['mailpoet_' . $mf->id] = '[MailPoet] ' . $mf->name;
                }
            }
        } catch (\Exception $e) {
            // MailPoet not fully initialized.
        }
    }

    return $forms;
}

/**
 * Render a form by its composite ID (plugin_id format).
 *
 * @param string $form_key e.g. "fluentform_3", "wpforms_12", "cf7_5".
 * @return string HTML output.
 */
function dp_starter_render_form($form_key)
{
    if (!$form_key || '0' === $form_key) {
        return '';
    }

    if (strpos($form_key, 'fluentform_') === 0) {
        $id = (int) str_replace('fluentform_', '', $form_key);
        return do_shortcode('[fluentform id="' . $id . '"]');
    }

    if (strpos($form_key, 'wpforms_') === 0) {
        $id = (int) str_replace('wpforms_', '', $form_key);
        return do_shortcode('[wpforms id="' . $id . '"]');
    }

    if (strpos($form_key, 'cf7_') === 0) {
        $id = (int) str_replace('cf7_', '', $form_key);
        return do_shortcode('[contact-form-7 id="' . $id . '"]');
    }

    if (strpos($form_key, 'mailpoet_') === 0) {
        $id = (int) str_replace('mailpoet_', '', $form_key);
        return do_shortcode('[mailpoet_form id="' . $id . '"]');
    }

    return '';
}

/**
 * Page hero custom fields: kicker, display title, aside.
 */
function dp_starter_page_hero_fields()
{
    return array(
        'dp_page_kicker'      => array('label' => __('Kicker (small text above title)', 'dp-starter'), 'type' => 'text'),
        'dp_page_display_title' => array('label' => __('Display Title (overrides page title on frontend)', 'dp-starter'), 'type' => 'text'),
        'dp_page_aside_title' => array('label' => __('Aside box title', 'dp-starter'), 'type' => 'text'),
        'dp_page_aside_text'  => array('label' => __('Aside box text', 'dp-starter'), 'type' => 'textarea'),
        'dp_lead_checklist'   => array('label' => __('Lead form checklist (one item per line, used by Lead Capture template)', 'dp-starter'), 'type' => 'textarea'),
        'dp_lead_form_id'     => array('label' => __('Lead form (select a form or leave empty for built-in)', 'dp-starter'), 'type' => 'form_select'),
    );
}

function dp_starter_add_page_hero_metabox()
{
    add_meta_box(
        'dp_starter_page_hero',
        __('Page Hero Settings', 'dp-starter'),
        'dp_starter_render_page_hero_metabox',
        'page',
        'normal',
        'high'
    );
}
add_action('add_meta_boxes', 'dp_starter_add_page_hero_metabox');

function dp_starter_render_page_hero_metabox($post)
{
    wp_nonce_field('dp_starter_page_hero', 'dp_starter_page_hero_nonce');

    // Text fields.
    foreach (dp_starter_page_hero_fields() as $key => $field) {
        $value = get_post_meta($post->ID, $key, true);
        echo '<p><label for="' . esc_attr($key) . '"><strong>' . esc_html($field['label']) . '</strong></label><br>';
        if ('textarea' === $field['type']) {
            echo '<textarea id="' . esc_attr($key) . '" name="' . esc_attr($key) . '" rows="3" style="width:100%;">' . esc_textarea($value) . '</textarea>';
        } elseif ('form_select' === $field['type']) {
            $forms = dp_starter_get_available_forms();
            echo '<select id="' . esc_attr($key) . '" name="' . esc_attr($key) . '" style="min-width:300px;">';
            echo '<option value="0">' . esc_html__('— Built-in form (First name, Last name, Email) —', 'dp-starter') . '</option>';
            foreach ($forms as $fid => $fname) {
                echo '<option value="' . esc_attr($fid) . '"' . selected($value, $fid, false) . '>' . esc_html($fname) . '</option>';
            }
            echo '</select>';
        } else {
            echo '<input id="' . esc_attr($key) . '" name="' . esc_attr($key) . '" type="text" value="' . esc_attr($value) . '" style="width:100%;">';
        }
        echo '</p>';
    }

    // Hero background image field.
    $bg_id  = (int) get_post_meta($post->ID, 'dp_page_hero_bg_id', true);
    $bg_url = $bg_id ? wp_get_attachment_image_url($bg_id, 'large') : '';
    ?>
    <hr>
    <p><strong><?php esc_html_e('Hero Background Image', 'dp-starter'); ?></strong></p>
    <p class="description"><?php esc_html_e('Optional. Replaces the dark background with a full-width image. Recommended size: 1440x600 px minimum.', 'dp-starter'); ?></p>
    <div id="dp-hero-bg-wrap">
        <input type="hidden" name="dp_page_hero_bg_id" id="dp-hero-bg-id" value="<?php echo esc_attr($bg_id); ?>">
        <div id="dp-hero-bg-preview" style="<?php echo $bg_url ? '' : 'display:none;'; ?> margin: 10px 0;">
            <?php if ($bg_url) : ?>
                <img src="<?php echo esc_url($bg_url); ?>" alt="" style="max-width:100%; max-height:200px; border-radius:4px; border:1px solid #ddd;">
            <?php endif; ?>
        </div>
        <button type="button" class="button" id="dp-hero-bg-upload"><?php esc_html_e('Select Image', 'dp-starter'); ?></button>
        <button type="button" class="button" id="dp-hero-bg-remove" <?php echo $bg_id ? '' : 'style="display:none;"'; ?>><?php esc_html_e('Remove', 'dp-starter'); ?></button>
    </div>
    <script>
    jQuery(function($) {
        var frame;
        $('#dp-hero-bg-upload').on('click', function(e) {
            e.preventDefault();
            if (frame) { frame.open(); return; }
            frame = wp.media({ title: '<?php echo esc_js(__('Select Hero Background', 'dp-starter')); ?>', multiple: false, library: { type: 'image' } });
            frame.on('select', function() {
                var att = frame.state().get('selection').first().toJSON();
                var url = (att.sizes && att.sizes.large) ? att.sizes.large.url : att.url;
                $('#dp-hero-bg-id').val(att.id);
                $('#dp-hero-bg-preview').html('<img src="' + url + '" alt="" style="max-width:100%;max-height:200px;border-radius:4px;border:1px solid #ddd;">').show();
                $('#dp-hero-bg-remove').show();
            });
            frame.open();
        });
        $('#dp-hero-bg-remove').on('click', function(e) {
            e.preventDefault();
            $('#dp-hero-bg-id').val('0');
            $('#dp-hero-bg-preview').hide().html('');
            $(this).hide();
        });
    });
    </script>
    <?php
}

/**
 * Enqueue media uploader on page edit screens for the hero background field.
 */
function dp_starter_enqueue_page_hero_media($hook)
{
    if ('post.php' === $hook || 'post-new.php' === $hook) {
        $screen = get_current_screen();
        if ($screen && 'page' === $screen->post_type) {
            wp_enqueue_media();
        }
    }
}
add_action('admin_enqueue_scripts', 'dp_starter_enqueue_page_hero_media');

function dp_starter_save_page_hero_meta($post_id)
{
    if (!isset($_POST['dp_starter_page_hero_nonce']) || !wp_verify_nonce(sanitize_text_field(wp_unslash($_POST['dp_starter_page_hero_nonce'])), 'dp_starter_page_hero')) {
        return;
    }
    if (defined('DOING_AUTOSAVE') && DOING_AUTOSAVE) {
        return;
    }
    if (!current_user_can('edit_post', $post_id)) {
        return;
    }

    // Save text fields.
    foreach (dp_starter_page_hero_fields() as $key => $field) {
        if (!isset($_POST[$key])) {
            continue;
        }
        $raw   = wp_unslash($_POST[$key]);
        $value = 'textarea' === $field['type'] ? sanitize_textarea_field($raw) : sanitize_text_field($raw);
        update_post_meta($post_id, $key, $value);
    }

    // Save hero background image.
    if (isset($_POST['dp_page_hero_bg_id'])) {
        update_post_meta($post_id, 'dp_page_hero_bg_id', absint($_POST['dp_page_hero_bg_id']));
    }
}
add_action('save_post_page', 'dp_starter_save_page_hero_meta');

/**
 * Helper: get the display title for a page (custom field or fallback to WP title).
 */
function dp_starter_page_display_title($post_id = null)
{
    $post_id = $post_id ? absint($post_id) : get_the_ID();
    $custom  = trim((string) get_post_meta($post_id, 'dp_page_display_title', true));
    return $custom ? $custom : get_the_title($post_id);
}

/**
 * Fix pagination on static pages that use custom WP_Query.
 *
 * WordPress ignores /page/N/ on static pages by default.
 * This injects 'paged' from the 'page' query var so paginate_links() works
 * on any page template, regardless of its slug.
 */
function dp_starter_fix_static_page_pagination($query)
{
    if (!is_admin() && $query->is_main_query() && $query->is_page()) {
        $page = (int) $query->get('page');
        if ($page > 1) {
            $query->set('paged', $page);
        }
    }
}
add_action('pre_get_posts', 'dp_starter_fix_static_page_pagination');

/**
 * Prevent 404 on paginated static pages.
 *
 * WordPress returns 404 for /page-slug/2/ because it thinks "2" is a child page.
 * This intercepts the 404 and redirects to the correct paginated page.
 */
function dp_starter_fix_static_page_404()
{
    if (!is_404()) {
        return;
    }

    $request = isset($GLOBALS['wp']->request) ? trim((string) $GLOBALS['wp']->request, '/') : '';
    if (!$request) {
        return;
    }

    // Check if URL matches /page-slug/N/ pattern.
    if (preg_match('#^(.+?)/(\d+)$#', $request, $m)) {
        $slug    = $m[1];
        $page_nr = (int) $m[2];
        $page    = get_page_by_path($slug);

        if ($page && 'publish' === $page->post_status) {
            // It's a real page with a number suffix — treat as pagination.
            $GLOBALS['wp_query']->is_404  = false;
            $GLOBALS['wp_query']->is_page = true;
            $GLOBALS['wp_query']->queried_object    = $page;
            $GLOBALS['wp_query']->queried_object_id = $page->ID;
            $GLOBALS['wp_query']->post              = $page;
            $GLOBALS['wp_query']->posts             = array($page);
            $GLOBALS['wp_query']->found_posts       = 1;
            $GLOBALS['wp_query']->post_count        = 1;
            $GLOBALS['wp_query']->max_num_pages     = 1;
            set_query_var('page', $page_nr);
            set_query_var('pagename', $slug);
            status_header(200);
        }
    }
}
add_action('template_redirect', 'dp_starter_fix_static_page_404', 1);

/**
 * Return the URI for a bundled theme image.
 *
 * @param string $filename Image filename inside assets/images.
 * @return string
 */
function dp_starter_asset_image($filename)
{
    $filename = ltrim((string) $filename, '/');
    return esc_url(DP_STARTER_THEME_URI . '/assets/images/' . $filename);
}

/**
 * Estimate reading time for a post.
 *
 * @param int|null $post_id Optional post ID.
 * @return string
 */
function dp_starter_reading_time($post_id = null)
{
    $post = get_post($post_id);
    if (!$post) {
        return '';
    }

    $word_count = str_word_count(wp_strip_all_tags($post->post_content));
    $minutes    = max(1, (int) ceil($word_count / 220));

    return sprintf(
        /* translators: %d is the estimated number of reading minutes. */
        _n('%d min read', '%d min read', $minutes, 'dp-starter'),
        $minutes
    );
}

/**
 * Return the primary category name for a post.
 *
 * @param int|null $post_id Optional post ID.
 * @return string
 */
function dp_starter_primary_category_name($post_id = null)
{
    $categories = get_the_category($post_id);
    if (empty($categories) || is_wp_error($categories)) {
        return __('Guide', 'dp-starter');
    }

    return $categories[0]->name;
}

/**
 * Return the primary category link for a post.
 *
 * @param int|null $post_id Optional post ID.
 * @return string
 */
function dp_starter_primary_category_link($post_id = null)
{
    $categories = get_the_category($post_id);
    if (empty($categories) || is_wp_error($categories)) {
        return home_url('/blog/');
    }

    return get_category_link($categories[0]);
}

/**
 * Trim text to a safe excerpt.
 *
 * @param string $text Text to trim.
 * @param int    $words Maximum words.
 * @return string
 */
function dp_starter_trim_words($text, $words = 24)
{
    return wp_trim_words(wp_strip_all_tags((string) $text), $words, '...');
}

/**
 * Render a useful default menu before WordPress menus are configured.
 *
 * @param string $class_name Menu class.
 * @return void
 */
function dp_starter_fallback_menu($class_name = 'dp-menu')
{
    $items = array(
        __('Guides', 'dp-starter')     => home_url('/blog/'),
        __('Tools', 'dp-starter')      => home_url('/tools/'),
        __('Books', 'dp-starter')      => home_url('/books/'),
        __('Platforms', 'dp-starter')  => home_url('/platforms/'),
        __('Programs', 'dp-starter')   => home_url('/programs/'),
    );
    ?>
    <ul class="<?php echo esc_attr($class_name); ?>">
        <?php foreach ($items as $label => $url) : ?>
            <li>
                <a href="<?php echo esc_url($url); ?>"><?php echo esc_html($label); ?></a>
            </li>
        <?php endforeach; ?>
    </ul>
    <?php
}
