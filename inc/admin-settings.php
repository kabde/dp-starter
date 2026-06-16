<?php
/**
 * DP Starter Settings — tabbed admin page.
 *
 * @package DP_Starter
 */

if (!defined('ABSPATH')) {
    exit;
}

/* =========================================================================
   1. DEFAULTS
   ========================================================================= */

function dp_starter_settings_defaults()
{
    return array(
        // General.
        'logo_id'           => 0,
        'favicon_id'        => 0,
        // Appearance — Light.
        'color_bg'          => '#fffaf1',
        'color_bg_soft'     => '#fffaf2',
        'color_panel'       => '#ffffff',
        'color_ink'         => '#18130c',
        'color_black'       => '#14110a',
        'color_muted'       => '#5f5547',
        'color_muted_2'     => '#887b6a',
        'color_gold'        => '#ffc45e',
        'color_gold_strong' => '#f2a720',
        'color_bronze'      => '#b97824',
        'color_danger_soft' => '#fff3ed',
        // Appearance — Dark.
        'color_dark_bg'        => '#050607',
        'color_dark_text'      => '#f8f2e8',
        'color_dark_text_soft' => '#d9cfc0',
        'color_dark_link'      => '#d7cdbf',
        'color_gold_hover'     => '#ffd47f',
        // Appearance — Layout.
        'border_radius'     => '8',
        // Typography.
        'font_body'    => 'Inter',
        'font_heading' => 'Inter',
        // Checkout.
        'checkout_trust_text'    => 'Secure payment. Instant access after purchase. 30-day money-back guarantee.',
        'checkout_page_refund'   => 0,
        'checkout_page_shipping' => 0,
        'checkout_page_privacy'  => 0,
        'checkout_page_terms'    => 0,
        'checkout_page_contact'  => 0,
        // Header & Footer.
        'cta_text'          => 'Start Here',
        'cta_url'           => '/start-here/',
        'footer_tagline'    => '',
        'footer_copyright'  => '© {year} All rights reserved.',
        'footer_menu'       => 0,
        'footer_social_facebook'  => '',
        'footer_social_instagram' => '',
        'footer_social_linkedin'  => '',
        'footer_social_x'         => '',
        'footer_social_youtube'   => '',
        'footer_social_tiktok'    => '',
        // Maintenance.
        'maintenance_mode'        => '0',
        'maintenance_title'       => 'Coming Soon',
        'maintenance_description' => '',
        'maintenance_launch_date' => '',
        'maintenance_show_timer'  => '0',
        'maintenance_bg_id'       => 0,
        // Content Types.
        'cpt_books_label'          => 'Books',
        'cpt_books_label_singular' => 'Book',
        'cpt_books_slug'           => 'books',
        'cpt_adv_label'            => 'Advertorials',
        'cpt_adv_label_singular'   => 'Advertorial',
        'cpt_adv_slug'             => 'advertorials',
        'cpt_tools_label'          => 'Tools',
        'cpt_tools_label_singular' => 'Tool',
        'cpt_tools_slug'           => 'tools',
        // Home Page — Hero.
        'home_hero_kicker'             => 'For coaches building with clarity',
        'home_hero_title'              => 'Coaching Business Advice Without the Hype',
        'home_hero_description'        => 'Practical guides, tool recommendations, book notes, platform comparisons, and direct advice for coaches who want to become clearer, better equipped, and easier to hire.',
        'home_hero_cta_primary_text'   => 'Start Here',
        'home_hero_cta_primary_url'    => '/start-here/',
        'home_hero_cta_secondary_text' => 'Browse Guides',
        'home_hero_cta_secondary_url'  => '/blog/',
        'home_hero_proof'              => "Clarity first.\nTools second.\nNo pressure tactics.",
        // Home Page — Situations.
        'home_situations_enabled'      => '1',
        'home_situations_kicker'       => 'Start by situation',
        'home_situations_title'        => 'Choose the coaching-business problem you are solving now.',
        'home_situations_items'        => "New coach|I am a new coach and need a clean starting point.|Start with positioning, a simple offer, first conversations, and the mistakes worth avoiding early.|/start-here/\nClient acquisition|I need better ways to find clients.|Explore practical outreach, follow-up, referral, and visibility habits that do not rely on pressure.|/category/prospecting/\nOffer clarity|My offer is still too vague.|Use guides that help you explain the problem, promise, process, proof, and boundaries clearly.|/category/offer-positioning/\nSales|I dislike selling and closing.|Read advice on responsible sales conversations, objections, decisions, and honest next steps.|/category/sales-closing/\nTools|I need the right platforms.|Compare tools, platforms, templates, and lightweight systems before adding unnecessary complexity.|/tools/\nLearning path|I want books and learning resources worth studying.|Browse recommended books, programs, and resources with a practical coach-business lens.|/books/",
        // Home Page — Featured Guides.
        'home_featured_enabled'        => '1',
        'home_featured_kicker'         => 'Featured guides',
        'home_featured_title'          => 'Start with the guides that make every next step easier.',
        'home_featured_link_text'      => 'All Guides',
        'home_featured_link_url'       => '/blog/',
        'home_featured_count'          => '3',
        // Home Page — Books Carousel.
        'home_books_enabled'           => '1',
        'home_books_kicker'            => 'Recommended reading',
        'home_books_title'             => 'Books worth studying before your next business decision.',
        'home_books_link_text'         => 'All Books',
        'home_books_link_url'          => '/books/',
        'home_books_count'             => '12',
        // Home Page — Resource Categories.
        'home_resources_enabled'       => '1',
        'home_resources_kicker'        => 'Resource categories',
        'home_resources_title'         => 'Tools, books, platforms, templates, and comparisons for real decisions.',
        'home_resources_items'         => "Books|Books that help coaches think better about positioning, trust, offers, and client work.|/books/\nTools|Simple tools for websites, scheduling, notes, payments, content, delivery, and follow-up.|/tools/\nPlatforms|Platform guides for coaches deciding where to publish, connect, sell, and deliver.|/platforms/\nPrograms|Training programs and learning paths reviewed through a practical implementation lens.|/programs/\nTemplates|Prompts, checklists, scripts, and operating templates for building with less confusion.|/templates/\nWhat Not To Do|Common coaching-business mistakes explained clearly so you can avoid expensive detours.|/what-not-to-do/",
        // Home Page — Anti-Advice.
        'home_antiadvice_enabled'      => '1',
        'home_antiadvice_kicker'       => 'Bad advice to avoid',
        'home_antiadvice_title'        => 'Before you add another tactic, know what can waste your time.',
        'home_antiadvice_description'  => 'The resource hub is not only about what to try. It also helps you avoid the common habits that make a coaching business heavier than it needs to be.',
        'home_antiadvice_items'        => "Buying complicated software before you have a clear offer.\nCollecting certifications while avoiding real prospect conversations.\nCopying fake urgency tactics that damage trust before the relationship begins.\nBuilding a funnel so complex that you stop doing the simple work that creates clients.",
        // Home Page — Latest Guides.
        'home_latest_enabled'          => '1',
        'home_latest_kicker'           => 'Latest guides',
        'home_latest_title'            => 'New practical notes from the DP Starter library.',
        'home_latest_link_text'        => 'All Guides',
        'home_latest_link_url'         => '/blog/',
        'home_latest_count'            => '6',
        // Home Page — Newsletter CTA.
        'home_newsletter_enabled'      => '1',
        'home_newsletter_kicker'       => 'Not sure where to begin?',
        'home_newsletter_title'        => 'Use the start-here path before you collect more advice.',
        'home_newsletter_description'  => 'The fastest way to use this site is to start with one clear business problem, read one useful guide, and apply the next practical step.',
        'home_newsletter_cta_text'     => 'Start With the Essentials',
        'home_newsletter_cta_url'      => '/start-here/',
        // Home Page — Final CTA.
        'home_final_enabled'           => '1',
        'home_final_kicker'            => 'Build with clarity',
        'home_final_title'             => 'A clearer way to become easier to understand, trust, and hire.',
        'home_final_description'       => 'Start with the resource path, then move into the guides, tools, and deeper programs when the timing makes sense.',
        'home_final_cta_text'          => 'Start Here',
        'home_final_cta_url'           => '/start-here/',
        'home_final_image_id'          => 0,
        // Integrations.
        'fluentcrm_list_id'         => '1',
        'fluentcrm_tag_lead_id'     => '1',
        'fluentcrm_tag_facebook_id' => '3',
        'fluentcrm_tag_organic_id'  => '4',
        'fluentforms_form_id'       => '3',
        'fb_lead_event_name'        => '',
        // Advanced.
        'custom_css'   => '',
        'head_code'    => '',
        'footer_code'  => '',
    );
}

/* =========================================================================
   2. GETTER
   ========================================================================= */

function dp_starter_get_setting($key)
{
    $settings = get_option('dp_starter_settings', array());
    $defaults = dp_starter_settings_defaults();
    return isset($settings[$key]) && $settings[$key] !== '' ? $settings[$key] : (isset($defaults[$key]) ? $defaults[$key] : '');
}

function dp_starter_get_logo_url()
{
    $logo_id = (int) dp_starter_get_setting('logo_id');
    if ($logo_id) {
        $url = wp_get_attachment_image_url($logo_id, 'full');
        if ($url) {
            return $url;
        }
    }
    return dp_starter_asset_image('default-logo.png');
}

/* =========================================================================
   3. REGISTER
   ========================================================================= */

function dp_starter_admin_menu()
{
    add_theme_page(
        __('DP Starter Settings', 'dp-starter'),
        __('DP Starter Settings', 'dp-starter'),
        'manage_options',
        'dp-starter-settings',
        'dp_starter_settings_page_render'
    );
}
add_action('admin_menu', 'dp_starter_admin_menu');

function dp_starter_register_settings()
{
    register_setting('dp_starter_settings_group', 'dp_starter_settings', array(
        'type'              => 'array',
        'sanitize_callback' => 'dp_starter_sanitize_settings',
        'default'           => dp_starter_settings_defaults(),
    ));
}
add_action('admin_init', 'dp_starter_register_settings');

/* =========================================================================
   4. SANITIZE
   ========================================================================= */

function dp_starter_sanitize_settings($input)
{
    $clean    = array();
    $defaults = dp_starter_settings_defaults();

    // Media IDs.
    $clean['logo_id']    = isset($input['logo_id']) ? absint($input['logo_id']) : 0;
    $clean['favicon_id'] = isset($input['favicon_id']) ? absint($input['favicon_id']) : 0;

    // Colors.
    $color_keys = array(
        'color_bg', 'color_bg_soft', 'color_panel', 'color_ink', 'color_black',
        'color_muted', 'color_muted_2', 'color_gold', 'color_gold_strong',
        'color_bronze', 'color_danger_soft',
        'color_dark_bg', 'color_dark_text', 'color_dark_text_soft',
        'color_dark_link', 'color_gold_hover',
    );
    foreach ($color_keys as $key) {
        $val = isset($input[$key]) ? sanitize_hex_color($input[$key]) : '';
        $clean[$key] = $val ? $val : $defaults[$key];
    }

    $clean['border_radius'] = isset($input['border_radius']) ? absint($input['border_radius']) : 8;

    // Typography.
    $allowed_fonts = dp_starter_google_fonts_list();
    $clean['font_body']    = isset($input['font_body']) && isset($allowed_fonts[$input['font_body']]) ? $input['font_body'] : $defaults['font_body'];
    $clean['font_heading'] = isset($input['font_heading']) && isset($allowed_fonts[$input['font_heading']]) ? $input['font_heading'] : $defaults['font_heading'];

    // Header & Footer.
    $clean['cta_text']       = isset($input['cta_text']) ? sanitize_text_field($input['cta_text']) : $defaults['cta_text'];
    $clean['cta_url']        = isset($input['cta_url']) ? esc_url_raw($input['cta_url']) : $defaults['cta_url'];
    $clean['footer_tagline'] = isset($input['footer_tagline']) ? sanitize_textarea_field($input['footer_tagline']) : '';
    $clean['footer_copyright'] = isset($input['footer_copyright']) ? sanitize_text_field($input['footer_copyright']) : $defaults['footer_copyright'];
    $clean['footer_menu']    = isset($input['footer_menu']) ? intval($input['footer_menu']) : 0;

    $social_keys = array('footer_social_facebook', 'footer_social_instagram', 'footer_social_linkedin', 'footer_social_x', 'footer_social_youtube', 'footer_social_tiktok');
    foreach ($social_keys as $key) {
        $clean[$key] = isset($input[$key]) ? esc_url_raw($input[$key]) : '';
    }

    // Maintenance.
    // Checkout.
    $clean['checkout_trust_text'] = isset($input['checkout_trust_text']) ? sanitize_text_field($input['checkout_trust_text']) : $defaults['checkout_trust_text'];
    $checkout_page_keys = array('checkout_page_refund', 'checkout_page_shipping', 'checkout_page_privacy', 'checkout_page_terms', 'checkout_page_contact');
    foreach ($checkout_page_keys as $key) {
        $clean[$key] = isset($input[$key]) ? absint($input[$key]) : 0;
    }

    $clean['maintenance_mode']        = !empty($input['maintenance_mode']) ? '1' : '0';
    $clean['maintenance_title']       = isset($input['maintenance_title']) ? sanitize_text_field($input['maintenance_title']) : $defaults['maintenance_title'];
    $clean['maintenance_description'] = isset($input['maintenance_description']) ? sanitize_textarea_field($input['maintenance_description']) : '';
    $clean['maintenance_launch_date'] = isset($input['maintenance_launch_date']) ? sanitize_text_field($input['maintenance_launch_date']) : '';
    $clean['maintenance_show_timer']  = !empty($input['maintenance_show_timer']) ? '1' : '0';
    $clean['maintenance_bg_id']       = isset($input['maintenance_bg_id']) ? absint($input['maintenance_bg_id']) : 0;

    // Content Types.
    $cpt_text_keys = array('cpt_books_label', 'cpt_books_label_singular', 'cpt_adv_label', 'cpt_adv_label_singular', 'cpt_tools_label', 'cpt_tools_label_singular');
    foreach ($cpt_text_keys as $key) {
        $clean[$key] = isset($input[$key]) && trim($input[$key]) !== '' ? sanitize_text_field($input[$key]) : $defaults[$key];
    }
    $cpt_slug_keys = array('cpt_books_slug', 'cpt_adv_slug', 'cpt_tools_slug');
    foreach ($cpt_slug_keys as $key) {
        $raw = isset($input[$key]) ? sanitize_title($input[$key]) : '';
        $clean[$key] = $raw !== '' ? $raw : $defaults[$key];
    }

    // Auto-flush rewrite rules if CPT slug changed.
    $old = get_option('dp_starter_settings', array());
    foreach ($cpt_slug_keys as $key) {
        $old_val = isset($old[$key]) ? $old[$key] : $defaults[$key];
        if ($clean[$key] !== $old_val) {
            add_action('shutdown', 'flush_rewrite_rules');
            break;
        }
    }

    // Home Page — text fields.
    $home_text_keys = array(
        'home_hero_kicker', 'home_hero_title', 'home_hero_cta_primary_text', 'home_hero_cta_secondary_text',
        'home_situations_kicker', 'home_situations_title',
        'home_featured_kicker', 'home_featured_title', 'home_featured_link_text',
        'home_books_kicker', 'home_books_title', 'home_books_link_text',
        'home_resources_kicker', 'home_resources_title',
        'home_antiadvice_kicker', 'home_antiadvice_title',
        'home_latest_kicker', 'home_latest_title', 'home_latest_link_text',
        'home_newsletter_kicker', 'home_newsletter_title', 'home_newsletter_cta_text',
        'home_final_kicker', 'home_final_title', 'home_final_cta_text',
    );
    foreach ($home_text_keys as $key) {
        $clean[$key] = isset($input[$key]) ? sanitize_text_field($input[$key]) : $defaults[$key];
    }

    // Home Page — textarea fields.
    $home_textarea_keys = array(
        'home_hero_description', 'home_hero_proof',
        'home_situations_items', 'home_resources_items',
        'home_antiadvice_description', 'home_antiadvice_items',
        'home_newsletter_description', 'home_final_description',
    );
    foreach ($home_textarea_keys as $key) {
        $clean[$key] = isset($input[$key]) ? sanitize_textarea_field($input[$key]) : $defaults[$key];
    }

    // Home Page — URL fields.
    $home_url_keys = array(
        'home_hero_cta_primary_url', 'home_hero_cta_secondary_url',
        'home_featured_link_url', 'home_books_link_url', 'home_latest_link_url',
        'home_newsletter_cta_url', 'home_final_cta_url',
    );
    foreach ($home_url_keys as $key) {
        $clean[$key] = isset($input[$key]) ? esc_url_raw($input[$key]) : $defaults[$key];
    }

    // Home Page — checkboxes (enabled toggles).
    $home_toggle_keys = array(
        'home_situations_enabled', 'home_featured_enabled', 'home_books_enabled',
        'home_resources_enabled', 'home_antiadvice_enabled', 'home_latest_enabled',
        'home_newsletter_enabled', 'home_final_enabled',
    );
    foreach ($home_toggle_keys as $key) {
        $clean[$key] = !empty($input[$key]) ? '1' : '0';
    }

    // Home Page — number fields.
    $clean['home_featured_count'] = isset($input['home_featured_count']) ? max(1, min(12, absint($input['home_featured_count']))) : 3;
    $clean['home_books_count']    = isset($input['home_books_count']) ? max(1, min(24, absint($input['home_books_count']))) : 12;
    $clean['home_latest_count']   = isset($input['home_latest_count']) ? max(1, min(12, absint($input['home_latest_count']))) : 6;

    // Home Page — media.
    $clean['home_final_image_id'] = isset($input['home_final_image_id']) ? absint($input['home_final_image_id']) : 0;

    // Integrations.
    $clean['fluentcrm_list_id']         = isset($input['fluentcrm_list_id']) ? absint($input['fluentcrm_list_id']) : 1;
    $clean['fluentcrm_tag_lead_id']     = isset($input['fluentcrm_tag_lead_id']) ? absint($input['fluentcrm_tag_lead_id']) : 1;
    $clean['fluentcrm_tag_facebook_id'] = isset($input['fluentcrm_tag_facebook_id']) ? absint($input['fluentcrm_tag_facebook_id']) : 3;
    $clean['fluentcrm_tag_organic_id']  = isset($input['fluentcrm_tag_organic_id']) ? absint($input['fluentcrm_tag_organic_id']) : 4;
    $clean['fluentforms_form_id']       = isset($input['fluentforms_form_id']) ? absint($input['fluentforms_form_id']) : 3;
    $clean['fb_lead_event_name']        = isset($input['fb_lead_event_name']) ? sanitize_text_field($input['fb_lead_event_name']) : '';

    // Advanced — raw code, capability check.
    $code_keys = array('custom_css', 'head_code', 'footer_code');
    foreach ($code_keys as $key) {
        if (current_user_can('unfiltered_html') && isset($input[$key])) {
            $clean[$key] = wp_unslash($input[$key]);
        } else {
            $clean[$key] = isset($old[$key]) ? $old[$key] : '';
        }
    }

    return $clean;
}

/* =========================================================================
   5. ADMIN ENQUEUE
   ========================================================================= */

function dp_starter_admin_enqueue($hook)
{
    if ('appearance_page_dp-starter-settings' !== $hook) {
        return;
    }
    wp_enqueue_media();
    wp_enqueue_style('wp-color-picker');
    wp_enqueue_script('wp-color-picker');

    // CodeMirror for Advanced tab.
    $cm_settings = array('type' => 'text/css');
    wp_enqueue_code_editor($cm_settings);
}
add_action('admin_enqueue_scripts', 'dp_starter_admin_enqueue');

/* =========================================================================
   6. RENDER — Tabbed admin page
   ========================================================================= */

function dp_starter_settings_page_render()
{
    if (!current_user_can('manage_options')) {
        return;
    }

    $defaults  = dp_starter_settings_defaults();
    $settings  = get_option('dp_starter_settings', array());
    $s         = wp_parse_args($settings, $defaults);
    $fonts_list = dp_starter_google_fonts_list();
    $nav_menus  = wp_get_nav_menus();

    $logo_url    = $s['logo_id'] ? wp_get_attachment_image_url($s['logo_id'], 'medium') : '';
    $favicon_url = $s['favicon_id'] ? wp_get_attachment_image_url($s['favicon_id'], 'thumbnail') : '';
    $maint_bg_url = $s['maintenance_bg_id'] ? wp_get_attachment_image_url($s['maintenance_bg_id'], 'large') : '';

    $licensed = dp_starter_is_licensed();

    $tabs = array(
        'license'       => array('label' => __('License', 'dp-starter'),        'icon' => 'dashicons-lock'),
        'general'       => array('label' => __('General', 'dp-starter'),        'icon' => 'dashicons-admin-settings'),
        'appearance'    => array('label' => __('Appearance', 'dp-starter'),     'icon' => 'dashicons-art'),
        'typography'    => array('label' => __('Typography', 'dp-starter'),     'icon' => 'dashicons-editor-textcolor'),
        'header-footer' => array('label' => __('Header & Footer', 'dp-starter'), 'icon' => 'dashicons-align-center'),
        'home-page'     => array('label' => __('Home Page', 'dp-starter'),      'icon' => 'dashicons-admin-home'),
    );

    if ($licensed) {
        $tabs['maintenance']   = array('label' => __('Maintenance', 'dp-starter'),    'icon' => 'dashicons-hammer');
        $tabs['content-types'] = array('label' => __('Content Types', 'dp-starter'),  'icon' => 'dashicons-database');
        $tabs['integrations']  = array('label' => __('Integrations', 'dp-starter'),   'icon' => 'dashicons-admin-plugins');
    }

    $tabs['advanced'] = array('label' => __('Advanced', 'dp-starter'), 'icon' => 'dashicons-admin-generic');
    ?>
    <div class="wrap" id="dp-settings-wrap">
        <div class="dp-settings-header">
            <h1><?php esc_html_e('DP Starter', 'dp-starter'); ?></h1>
            <span class="dp-settings-version">v<?php echo esc_html(defined('DP_STARTER_VERSION') ? DP_STARTER_VERSION : '3.1.0'); ?></span>
        </div>

        <div class="dp-settings-layout">
            <nav class="dp-settings-sidebar">
                <?php foreach ($tabs as $id => $tab) : ?>
                    <a href="#<?php echo esc_attr($id); ?>" class="dp-sidebar-item" data-tab="<?php echo esc_attr($id); ?>">
                        <span class="dashicons <?php echo esc_attr($tab['icon']); ?>"></span>
                        <?php echo esc_html($tab['label']); ?>
                    </a>
                <?php endforeach; ?>
            </nav>

            <div class="dp-settings-panel">
                <form method="post" action="options.php" id="dp-settings-form">
                    <?php settings_fields('dp_starter_settings_group'); ?>

            <!-- ═══ LICENSE ═══ -->
            <div class="dp-tab-content" id="tab-license">
                <?php dp_starter_render_license_tab(); ?>
            </div>

            <!-- ═══ GENERAL ═══ -->
            <div class="dp-tab-content" id="tab-general">
                <div class="dp-admin-section">
                    <h2><?php esc_html_e('Identity', 'dp-starter'); ?></h2>
                    <table class="form-table">
                        <tr>
                            <th scope="row"><?php esc_html_e('Logo', 'dp-starter'); ?></th>
                            <td>
                                <input type="hidden" name="dp_starter_settings[logo_id]" id="dp-logo-id" value="<?php echo esc_attr($s['logo_id']); ?>">
                                <div id="dp-logo-preview" class="dp-media-preview" <?php echo $logo_url ? '' : 'style="display:none"'; ?>>
                                    <?php if ($logo_url) : ?><img src="<?php echo esc_url($logo_url); ?>" alt=""><?php endif; ?>
                                </div>
                                <button type="button" class="button dp-media-upload" data-target="logo"><?php esc_html_e('Upload Logo', 'dp-starter'); ?></button>
                                <button type="button" class="button dp-media-remove" data-target="logo" <?php echo $s['logo_id'] ? '' : 'style="display:none"'; ?>><?php esc_html_e('Remove', 'dp-starter'); ?></button>
                                <p class="description"><?php esc_html_e('PNG with transparent background, 320×96 px or larger.', 'dp-starter'); ?></p>
                            </td>
                        </tr>
                        <tr>
                            <th scope="row"><?php esc_html_e('Favicon', 'dp-starter'); ?></th>
                            <td>
                                <input type="hidden" name="dp_starter_settings[favicon_id]" id="dp-favicon-id" value="<?php echo esc_attr($s['favicon_id']); ?>">
                                <div id="dp-favicon-preview" class="dp-media-preview dp-media-preview-small" <?php echo $favicon_url ? '' : 'style="display:none"'; ?>>
                                    <?php if ($favicon_url) : ?><img src="<?php echo esc_url($favicon_url); ?>" alt=""><?php endif; ?>
                                </div>
                                <button type="button" class="button dp-media-upload" data-target="favicon"><?php esc_html_e('Upload Favicon', 'dp-starter'); ?></button>
                                <button type="button" class="button dp-media-remove" data-target="favicon" <?php echo $s['favicon_id'] ? '' : 'style="display:none"'; ?>><?php esc_html_e('Remove', 'dp-starter'); ?></button>
                                <p class="description"><?php esc_html_e('Optional. If empty, the logo is used. 512×512 px recommended.', 'dp-starter'); ?></p>
                            </td>
                        </tr>
                    </table>
                </div>
            </div>

            <!-- ═══ APPEARANCE ═══ -->
            <div class="dp-tab-content" id="tab-appearance">
                <div class="dp-admin-section">
                    <h2><?php esc_html_e('Light Palette', 'dp-starter'); ?></h2>
                    <table class="form-table">
                        <?php
                        $light_colors = array(
                            'color_bg'          => __('Background', 'dp-starter'),
                            'color_bg_soft'     => __('Soft Background', 'dp-starter'),
                            'color_panel'       => __('Panel / Card', 'dp-starter'),
                            'color_ink'         => __('Primary Text', 'dp-starter'),
                            'color_black'       => __('Dark / Black', 'dp-starter'),
                            'color_muted'       => __('Muted Text', 'dp-starter'),
                            'color_muted_2'     => __('Secondary Muted', 'dp-starter'),
                            'color_gold'        => __('Gold Accent', 'dp-starter'),
                            'color_gold_strong' => __('Gold Strong (hover)', 'dp-starter'),
                            'color_bronze'      => __('Bronze / Links', 'dp-starter'),
                            'color_danger_soft' => __('Alert Background', 'dp-starter'),
                        );
                        foreach ($light_colors as $key => $label) : ?>
                            <tr><th scope="row"><?php echo esc_html($label); ?></th><td>
                                <input type="text" class="dp-color-picker" name="dp_starter_settings[<?php echo esc_attr($key); ?>]" value="<?php echo esc_attr($s[$key]); ?>" data-default-color="<?php echo esc_attr($defaults[$key]); ?>">
                            </td></tr>
                        <?php endforeach; ?>
                    </table>
                </div>

                <div class="dp-admin-section">
                    <h2><?php esc_html_e('Dark Palette (header, hero, footer)', 'dp-starter'); ?></h2>
                    <table class="form-table">
                        <?php
                        $dark_colors = array(
                            'color_dark_bg'        => __('Dark Background', 'dp-starter'),
                            'color_dark_text'      => __('Dark Section — Text', 'dp-starter'),
                            'color_dark_text_soft' => __('Dark Section — Muted', 'dp-starter'),
                            'color_dark_link'      => __('Dark Section — Links', 'dp-starter'),
                            'color_gold_hover'     => __('Gold Hover', 'dp-starter'),
                        );
                        foreach ($dark_colors as $key => $label) : ?>
                            <tr><th scope="row"><?php echo esc_html($label); ?></th><td>
                                <input type="text" class="dp-color-picker" name="dp_starter_settings[<?php echo esc_attr($key); ?>]" value="<?php echo esc_attr($s[$key]); ?>" data-default-color="<?php echo esc_attr($defaults[$key]); ?>">
                            </td></tr>
                        <?php endforeach; ?>
                    </table>
                </div>

                <div class="dp-admin-section">
                    <h2><?php esc_html_e('Layout', 'dp-starter'); ?></h2>
                    <table class="form-table">
                        <tr><th scope="row"><?php esc_html_e('Border Radius (px)', 'dp-starter'); ?></th><td>
                            <input type="number" name="dp_starter_settings[border_radius]" value="<?php echo esc_attr($s['border_radius']); ?>" min="0" max="50" class="small-text"> px
                        </td></tr>
                    </table>
                    <p><button type="button" class="button" id="dp-reset-colors"><?php esc_html_e('Reset All Colors to Defaults', 'dp-starter'); ?></button></p>
                </div>
            </div>

            <!-- ═══ TYPOGRAPHY ═══ -->
            <div class="dp-tab-content" id="tab-typography">
                <div class="dp-admin-section">
                    <h2><?php esc_html_e('Fonts', 'dp-starter'); ?></h2>
                    <p class="description"><?php esc_html_e('Loaded from Google Fonts CDN.', 'dp-starter'); ?></p>
                    <table class="form-table">
                        <tr><th scope="row"><?php esc_html_e('Heading Font', 'dp-starter'); ?></th><td>
                            <select name="dp_starter_settings[font_heading]" id="dp-font-heading" style="min-width:260px;">
                                <?php foreach ($fonts_list as $name => $param) : ?>
                                    <option value="<?php echo esc_attr($name); ?>" <?php selected($s['font_heading'], $name); ?>><?php echo esc_html($name); ?></option>
                                <?php endforeach; ?>
                            </select>
                        </td></tr>
                        <tr><th scope="row"><?php esc_html_e('Body Font', 'dp-starter'); ?></th><td>
                            <select name="dp_starter_settings[font_body]" id="dp-font-body" style="min-width:260px;">
                                <?php foreach ($fonts_list as $name => $param) : ?>
                                    <option value="<?php echo esc_attr($name); ?>" <?php selected($s['font_body'], $name); ?>><?php echo esc_html($name); ?></option>
                                <?php endforeach; ?>
                            </select>
                        </td></tr>
                    </table>
                    <div id="dp-font-preview" style="margin-top:16px; padding:20px; border:1px solid #ddd; border-radius:6px; background:#fafafa;">
                        <p style="margin:0 0 8px; font-size:13px; color:#666;"><?php esc_html_e('Preview', 'dp-starter'); ?></p>
                        <h3 id="dp-font-preview-heading" style="margin:0 0 8px; font-size:1.4rem;">The quick brown fox jumps over the lazy dog</h3>
                        <p id="dp-font-preview-body" style="margin:0; font-size:1rem; color:#333;">Lorem ipsum dolor sit amet, consectetur adipiscing elit. Sed do eiusmod tempor incididunt ut labore.</p>
                    </div>
                </div>
            </div>

            <!-- ═══ HEADER & FOOTER ═══ -->
            <div class="dp-tab-content" id="tab-header-footer">
                <div class="dp-admin-section">
                    <h2><?php esc_html_e('Header CTA Button', 'dp-starter'); ?></h2>
                    <table class="form-table">
                        <tr><th scope="row"><?php esc_html_e('Button Text', 'dp-starter'); ?></th><td>
                            <input type="text" name="dp_starter_settings[cta_text]" value="<?php echo esc_attr($s['cta_text']); ?>" class="regular-text">
                        </td></tr>
                        <tr><th scope="row"><?php esc_html_e('Button URL', 'dp-starter'); ?></th><td>
                            <input type="url" name="dp_starter_settings[cta_url]" value="<?php echo esc_attr($s['cta_url']); ?>" class="regular-text">
                        </td></tr>
                    </table>
                </div>

                <div class="dp-admin-section">
                    <h2><?php esc_html_e('Checkout', 'dp-starter'); ?></h2>
                    <table class="form-table">
                        <tr><th scope="row"><?php esc_html_e('Trust Text', 'dp-starter'); ?></th><td>
                            <input type="text" name="dp_starter_settings[checkout_trust_text]" value="<?php echo esc_attr($s['checkout_trust_text']); ?>" class="large-text">
                            <p class="description"><?php esc_html_e('Displayed under the Place Order button to reassure buyers.', 'dp-starter'); ?></p>
                        </td></tr>
                    </table>

                    <h3 style="margin-top:18px;"><?php esc_html_e('Policy Links (popup on checkout)', 'dp-starter'); ?></h3>
                    <p class="description"><?php esc_html_e('Select pages to show as popup links at the bottom of the checkout. Leave empty to hide.', 'dp-starter'); ?></p>
                    <?php
                    $all_pages = get_pages(array('post_status' => 'publish', 'sort_column' => 'post_title'));
                    $policy_fields = array(
                        'checkout_page_refund'   => __('Refund Policy', 'dp-starter'),
                        'checkout_page_shipping' => __('Shipping Policy', 'dp-starter'),
                        'checkout_page_privacy'  => __('Privacy Policy', 'dp-starter'),
                        'checkout_page_terms'    => __('Terms of Service', 'dp-starter'),
                        'checkout_page_contact'  => __('Contact', 'dp-starter'),
                    );
                    ?>
                    <table class="form-table">
                        <?php foreach ($policy_fields as $key => $label) : ?>
                            <tr><th scope="row"><?php echo esc_html($label); ?></th><td>
                                <select name="dp_starter_settings[<?php echo esc_attr($key); ?>]">
                                    <option value="0"><?php esc_html_e('— None —', 'dp-starter'); ?></option>
                                    <?php foreach ($all_pages as $pg) : ?>
                                        <option value="<?php echo esc_attr($pg->ID); ?>" <?php selected($s[$key], $pg->ID); ?>><?php echo esc_html($pg->post_title); ?></option>
                                    <?php endforeach; ?>
                                </select>
                            </td></tr>
                        <?php endforeach; ?>
                    </table>
                </div>

                <div class="dp-admin-section">
                    <h2><?php esc_html_e('Footer', 'dp-starter'); ?></h2>
                    <table class="form-table">
                        <tr><th scope="row"><?php esc_html_e('Tagline', 'dp-starter'); ?></th><td>
                            <textarea name="dp_starter_settings[footer_tagline]" rows="2" class="large-text"><?php echo esc_textarea($s['footer_tagline']); ?></textarea>
                        </td></tr>
                        <tr><th scope="row"><?php esc_html_e('Copyright', 'dp-starter'); ?></th><td>
                            <input type="text" name="dp_starter_settings[footer_copyright]" value="<?php echo esc_attr($s['footer_copyright']); ?>" class="regular-text">
                            <p class="description"><?php esc_html_e('Use {year} for the current year.', 'dp-starter'); ?></p>
                        </td></tr>
                        <tr><th scope="row"><?php esc_html_e('Footer Menu', 'dp-starter'); ?></th><td>
                            <select name="dp_starter_settings[footer_menu]">
                                <option value="0"><?php esc_html_e('— Use footer menu location —', 'dp-starter'); ?></option>
                                <option value="-1" <?php selected($s['footer_menu'], -1); ?>><?php esc_html_e('— None (hide menu) —', 'dp-starter'); ?></option>
                                <?php foreach ($nav_menus as $menu) : ?>
                                    <option value="<?php echo esc_attr($menu->term_id); ?>" <?php selected($s['footer_menu'], $menu->term_id); ?>><?php echo esc_html($menu->name); ?></option>
                                <?php endforeach; ?>
                            </select>
                        </td></tr>
                    </table>
                </div>

                <div class="dp-admin-section">
                    <h2><?php esc_html_e('Social Links', 'dp-starter'); ?></h2>
                    <p class="description"><?php esc_html_e('Leave empty to hide. Icons appear in the footer.', 'dp-starter'); ?></p>
                    <table class="form-table">
                        <?php
                        $socials = array(
                            'footer_social_facebook'  => 'Facebook',
                            'footer_social_instagram' => 'Instagram',
                            'footer_social_linkedin'  => 'LinkedIn',
                            'footer_social_x'         => 'X (Twitter)',
                            'footer_social_youtube'   => 'YouTube',
                            'footer_social_tiktok'    => 'TikTok',
                        );
                        foreach ($socials as $key => $label) : ?>
                            <tr><th scope="row"><?php echo esc_html($label); ?></th><td>
                                <input type="url" name="dp_starter_settings[<?php echo esc_attr($key); ?>]" value="<?php echo esc_attr($s[$key]); ?>" class="regular-text" placeholder="https://">
                            </td></tr>
                        <?php endforeach; ?>
                    </table>
                </div>
            </div>

            <!-- ═══ HOME PAGE ═══ -->
            <div class="dp-tab-content" id="tab-home-page">
                <!-- Hero -->
                <div class="dp-admin-section">
                    <h2><?php esc_html_e('Hero', 'dp-starter'); ?></h2>
                    <table class="form-table">
                        <tr><th scope="row"><?php esc_html_e('Kicker', 'dp-starter'); ?></th><td>
                            <input type="text" name="dp_starter_settings[home_hero_kicker]" value="<?php echo esc_attr($s['home_hero_kicker']); ?>" class="regular-text">
                        </td></tr>
                        <tr><th scope="row"><?php esc_html_e('Title', 'dp-starter'); ?></th><td>
                            <input type="text" name="dp_starter_settings[home_hero_title]" value="<?php echo esc_attr($s['home_hero_title']); ?>" class="large-text">
                        </td></tr>
                        <tr><th scope="row"><?php esc_html_e('Description', 'dp-starter'); ?></th><td>
                            <textarea name="dp_starter_settings[home_hero_description]" rows="3" class="large-text"><?php echo esc_textarea($s['home_hero_description']); ?></textarea>
                        </td></tr>
                        <tr><th scope="row"><?php esc_html_e('Primary CTA', 'dp-starter'); ?></th><td>
                            <input type="text" name="dp_starter_settings[home_hero_cta_primary_text]" value="<?php echo esc_attr($s['home_hero_cta_primary_text']); ?>" style="width:200px" placeholder="Text">
                            <input type="url" name="dp_starter_settings[home_hero_cta_primary_url]" value="<?php echo esc_attr($s['home_hero_cta_primary_url']); ?>" style="width:300px" placeholder="URL">
                        </td></tr>
                        <tr><th scope="row"><?php esc_html_e('Secondary CTA', 'dp-starter'); ?></th><td>
                            <input type="text" name="dp_starter_settings[home_hero_cta_secondary_text]" value="<?php echo esc_attr($s['home_hero_cta_secondary_text']); ?>" style="width:200px" placeholder="Text">
                            <input type="url" name="dp_starter_settings[home_hero_cta_secondary_url]" value="<?php echo esc_attr($s['home_hero_cta_secondary_url']); ?>" style="width:300px" placeholder="URL">
                        </td></tr>
                        <tr><th scope="row"><?php esc_html_e('Proof points', 'dp-starter'); ?></th><td>
                            <textarea name="dp_starter_settings[home_hero_proof]" rows="3" class="large-text" placeholder="One per line"><?php echo esc_textarea($s['home_hero_proof']); ?></textarea>
                            <p class="description"><?php esc_html_e('One item per line. Displayed as badges under the CTA buttons.', 'dp-starter'); ?></p>
                        </td></tr>
                    </table>
                </div>

                <!-- Situations -->
                <div class="dp-admin-section">
                    <h2>
                        <label><input type="checkbox" name="dp_starter_settings[home_situations_enabled]" value="1" <?php checked($s['home_situations_enabled'], '1'); ?>>
                        <?php esc_html_e('Situations', 'dp-starter'); ?></label>
                    </h2>
                    <table class="form-table">
                        <tr><th scope="row"><?php esc_html_e('Kicker', 'dp-starter'); ?></th><td>
                            <input type="text" name="dp_starter_settings[home_situations_kicker]" value="<?php echo esc_attr($s['home_situations_kicker']); ?>" class="regular-text">
                        </td></tr>
                        <tr><th scope="row"><?php esc_html_e('Title', 'dp-starter'); ?></th><td>
                            <input type="text" name="dp_starter_settings[home_situations_title]" value="<?php echo esc_attr($s['home_situations_title']); ?>" class="large-text">
                        </td></tr>
                        <tr><th scope="row"><?php esc_html_e('Items', 'dp-starter'); ?></th><td>
                            <textarea name="dp_starter_settings[home_situations_items]" rows="8" class="large-text"><?php echo esc_textarea($s['home_situations_items']); ?></textarea>
                            <p class="description"><?php esc_html_e('One card per line. Format: Label|Title|Description|URL', 'dp-starter'); ?></p>
                        </td></tr>
                    </table>
                </div>

                <!-- Featured Guides -->
                <div class="dp-admin-section">
                    <h2>
                        <label><input type="checkbox" name="dp_starter_settings[home_featured_enabled]" value="1" <?php checked($s['home_featured_enabled'], '1'); ?>>
                        <?php esc_html_e('Featured Guides', 'dp-starter'); ?></label>
                    </h2>
                    <table class="form-table">
                        <tr><th scope="row"><?php esc_html_e('Kicker', 'dp-starter'); ?></th><td>
                            <input type="text" name="dp_starter_settings[home_featured_kicker]" value="<?php echo esc_attr($s['home_featured_kicker']); ?>" class="regular-text">
                        </td></tr>
                        <tr><th scope="row"><?php esc_html_e('Title', 'dp-starter'); ?></th><td>
                            <input type="text" name="dp_starter_settings[home_featured_title]" value="<?php echo esc_attr($s['home_featured_title']); ?>" class="large-text">
                        </td></tr>
                        <tr><th scope="row"><?php esc_html_e('Link', 'dp-starter'); ?></th><td>
                            <input type="text" name="dp_starter_settings[home_featured_link_text]" value="<?php echo esc_attr($s['home_featured_link_text']); ?>" style="width:200px" placeholder="Text">
                            <input type="url" name="dp_starter_settings[home_featured_link_url]" value="<?php echo esc_attr($s['home_featured_link_url']); ?>" style="width:300px" placeholder="URL">
                        </td></tr>
                        <tr><th scope="row"><?php esc_html_e('Number of posts', 'dp-starter'); ?></th><td>
                            <input type="number" name="dp_starter_settings[home_featured_count]" value="<?php echo esc_attr($s['home_featured_count']); ?>" min="1" max="12" class="small-text">
                        </td></tr>
                    </table>
                </div>

                <!-- Books Carousel -->
                <div class="dp-admin-section">
                    <h2>
                        <label><input type="checkbox" name="dp_starter_settings[home_books_enabled]" value="1" <?php checked($s['home_books_enabled'], '1'); ?>>
                        <?php esc_html_e('Books Carousel', 'dp-starter'); ?></label>
                    </h2>
                    <table class="form-table">
                        <tr><th scope="row"><?php esc_html_e('Kicker', 'dp-starter'); ?></th><td>
                            <input type="text" name="dp_starter_settings[home_books_kicker]" value="<?php echo esc_attr($s['home_books_kicker']); ?>" class="regular-text">
                        </td></tr>
                        <tr><th scope="row"><?php esc_html_e('Title', 'dp-starter'); ?></th><td>
                            <input type="text" name="dp_starter_settings[home_books_title]" value="<?php echo esc_attr($s['home_books_title']); ?>" class="large-text">
                        </td></tr>
                        <tr><th scope="row"><?php esc_html_e('Link', 'dp-starter'); ?></th><td>
                            <input type="text" name="dp_starter_settings[home_books_link_text]" value="<?php echo esc_attr($s['home_books_link_text']); ?>" style="width:200px" placeholder="Text">
                            <input type="url" name="dp_starter_settings[home_books_link_url]" value="<?php echo esc_attr($s['home_books_link_url']); ?>" style="width:300px" placeholder="URL">
                        </td></tr>
                        <tr><th scope="row"><?php esc_html_e('Number of books', 'dp-starter'); ?></th><td>
                            <input type="number" name="dp_starter_settings[home_books_count]" value="<?php echo esc_attr($s['home_books_count']); ?>" min="1" max="24" class="small-text">
                        </td></tr>
                    </table>
                </div>

                <!-- Resource Categories -->
                <div class="dp-admin-section">
                    <h2>
                        <label><input type="checkbox" name="dp_starter_settings[home_resources_enabled]" value="1" <?php checked($s['home_resources_enabled'], '1'); ?>>
                        <?php esc_html_e('Resource Categories', 'dp-starter'); ?></label>
                    </h2>
                    <table class="form-table">
                        <tr><th scope="row"><?php esc_html_e('Kicker', 'dp-starter'); ?></th><td>
                            <input type="text" name="dp_starter_settings[home_resources_kicker]" value="<?php echo esc_attr($s['home_resources_kicker']); ?>" class="regular-text">
                        </td></tr>
                        <tr><th scope="row"><?php esc_html_e('Title', 'dp-starter'); ?></th><td>
                            <input type="text" name="dp_starter_settings[home_resources_title]" value="<?php echo esc_attr($s['home_resources_title']); ?>" class="large-text">
                        </td></tr>
                        <tr><th scope="row"><?php esc_html_e('Items', 'dp-starter'); ?></th><td>
                            <textarea name="dp_starter_settings[home_resources_items]" rows="8" class="large-text"><?php echo esc_textarea($s['home_resources_items']); ?></textarea>
                            <p class="description"><?php esc_html_e('One card per line. Format: Title|Description|URL', 'dp-starter'); ?></p>
                        </td></tr>
                    </table>
                </div>

                <!-- Anti-Advice -->
                <div class="dp-admin-section">
                    <h2>
                        <label><input type="checkbox" name="dp_starter_settings[home_antiadvice_enabled]" value="1" <?php checked($s['home_antiadvice_enabled'], '1'); ?>>
                        <?php esc_html_e('Anti-Advice', 'dp-starter'); ?></label>
                    </h2>
                    <table class="form-table">
                        <tr><th scope="row"><?php esc_html_e('Kicker', 'dp-starter'); ?></th><td>
                            <input type="text" name="dp_starter_settings[home_antiadvice_kicker]" value="<?php echo esc_attr($s['home_antiadvice_kicker']); ?>" class="regular-text">
                        </td></tr>
                        <tr><th scope="row"><?php esc_html_e('Title', 'dp-starter'); ?></th><td>
                            <input type="text" name="dp_starter_settings[home_antiadvice_title]" value="<?php echo esc_attr($s['home_antiadvice_title']); ?>" class="large-text">
                        </td></tr>
                        <tr><th scope="row"><?php esc_html_e('Description', 'dp-starter'); ?></th><td>
                            <textarea name="dp_starter_settings[home_antiadvice_description]" rows="3" class="large-text"><?php echo esc_textarea($s['home_antiadvice_description']); ?></textarea>
                        </td></tr>
                        <tr><th scope="row"><?php esc_html_e('Items', 'dp-starter'); ?></th><td>
                            <textarea name="dp_starter_settings[home_antiadvice_items]" rows="5" class="large-text"><?php echo esc_textarea($s['home_antiadvice_items']); ?></textarea>
                            <p class="description"><?php esc_html_e('One item per line.', 'dp-starter'); ?></p>
                        </td></tr>
                    </table>
                </div>

                <!-- Latest Guides -->
                <div class="dp-admin-section">
                    <h2>
                        <label><input type="checkbox" name="dp_starter_settings[home_latest_enabled]" value="1" <?php checked($s['home_latest_enabled'], '1'); ?>>
                        <?php esc_html_e('Latest Guides', 'dp-starter'); ?></label>
                    </h2>
                    <table class="form-table">
                        <tr><th scope="row"><?php esc_html_e('Kicker', 'dp-starter'); ?></th><td>
                            <input type="text" name="dp_starter_settings[home_latest_kicker]" value="<?php echo esc_attr($s['home_latest_kicker']); ?>" class="regular-text">
                        </td></tr>
                        <tr><th scope="row"><?php esc_html_e('Title', 'dp-starter'); ?></th><td>
                            <input type="text" name="dp_starter_settings[home_latest_title]" value="<?php echo esc_attr($s['home_latest_title']); ?>" class="large-text">
                        </td></tr>
                        <tr><th scope="row"><?php esc_html_e('Link', 'dp-starter'); ?></th><td>
                            <input type="text" name="dp_starter_settings[home_latest_link_text]" value="<?php echo esc_attr($s['home_latest_link_text']); ?>" style="width:200px" placeholder="Text">
                            <input type="url" name="dp_starter_settings[home_latest_link_url]" value="<?php echo esc_attr($s['home_latest_link_url']); ?>" style="width:300px" placeholder="URL">
                        </td></tr>
                        <tr><th scope="row"><?php esc_html_e('Number of posts', 'dp-starter'); ?></th><td>
                            <input type="number" name="dp_starter_settings[home_latest_count]" value="<?php echo esc_attr($s['home_latest_count']); ?>" min="1" max="12" class="small-text">
                        </td></tr>
                    </table>
                </div>

                <!-- Newsletter CTA -->
                <div class="dp-admin-section">
                    <h2>
                        <label><input type="checkbox" name="dp_starter_settings[home_newsletter_enabled]" value="1" <?php checked($s['home_newsletter_enabled'], '1'); ?>>
                        <?php esc_html_e('Newsletter CTA', 'dp-starter'); ?></label>
                    </h2>
                    <table class="form-table">
                        <tr><th scope="row"><?php esc_html_e('Kicker', 'dp-starter'); ?></th><td>
                            <input type="text" name="dp_starter_settings[home_newsletter_kicker]" value="<?php echo esc_attr($s['home_newsletter_kicker']); ?>" class="regular-text">
                        </td></tr>
                        <tr><th scope="row"><?php esc_html_e('Title', 'dp-starter'); ?></th><td>
                            <input type="text" name="dp_starter_settings[home_newsletter_title]" value="<?php echo esc_attr($s['home_newsletter_title']); ?>" class="large-text">
                        </td></tr>
                        <tr><th scope="row"><?php esc_html_e('Description', 'dp-starter'); ?></th><td>
                            <textarea name="dp_starter_settings[home_newsletter_description]" rows="3" class="large-text"><?php echo esc_textarea($s['home_newsletter_description']); ?></textarea>
                        </td></tr>
                        <tr><th scope="row"><?php esc_html_e('CTA', 'dp-starter'); ?></th><td>
                            <input type="text" name="dp_starter_settings[home_newsletter_cta_text]" value="<?php echo esc_attr($s['home_newsletter_cta_text']); ?>" style="width:200px" placeholder="Text">
                            <input type="url" name="dp_starter_settings[home_newsletter_cta_url]" value="<?php echo esc_attr($s['home_newsletter_cta_url']); ?>" style="width:300px" placeholder="URL">
                        </td></tr>
                    </table>
                </div>

                <!-- Final CTA -->
                <div class="dp-admin-section">
                    <h2>
                        <label><input type="checkbox" name="dp_starter_settings[home_final_enabled]" value="1" <?php checked($s['home_final_enabled'], '1'); ?>>
                        <?php esc_html_e('Final CTA', 'dp-starter'); ?></label>
                    </h2>
                    <table class="form-table">
                        <tr><th scope="row"><?php esc_html_e('Kicker', 'dp-starter'); ?></th><td>
                            <input type="text" name="dp_starter_settings[home_final_kicker]" value="<?php echo esc_attr($s['home_final_kicker']); ?>" class="regular-text">
                        </td></tr>
                        <tr><th scope="row"><?php esc_html_e('Title', 'dp-starter'); ?></th><td>
                            <input type="text" name="dp_starter_settings[home_final_title]" value="<?php echo esc_attr($s['home_final_title']); ?>" class="large-text">
                        </td></tr>
                        <tr><th scope="row"><?php esc_html_e('Description', 'dp-starter'); ?></th><td>
                            <textarea name="dp_starter_settings[home_final_description]" rows="3" class="large-text"><?php echo esc_textarea($s['home_final_description']); ?></textarea>
                        </td></tr>
                        <tr><th scope="row"><?php esc_html_e('CTA', 'dp-starter'); ?></th><td>
                            <input type="text" name="dp_starter_settings[home_final_cta_text]" value="<?php echo esc_attr($s['home_final_cta_text']); ?>" style="width:200px" placeholder="Text">
                            <input type="url" name="dp_starter_settings[home_final_cta_url]" value="<?php echo esc_attr($s['home_final_cta_url']); ?>" style="width:300px" placeholder="URL">
                        </td></tr>
                        <tr><th scope="row"><?php esc_html_e('Image', 'dp-starter'); ?></th><td>
                            <?php $final_img_url = $s['home_final_image_id'] ? wp_get_attachment_image_url($s['home_final_image_id'], 'medium') : ''; ?>
                            <input type="hidden" name="dp_starter_settings[home_final_image_id]" id="dp-home-final-img-id" value="<?php echo esc_attr($s['home_final_image_id']); ?>">
                            <div id="dp-home-final-img-preview" class="dp-media-preview" <?php echo $final_img_url ? '' : 'style="display:none"'; ?>>
                                <?php if ($final_img_url) : ?><img src="<?php echo esc_url($final_img_url); ?>" alt=""><?php endif; ?>
                            </div>
                            <button type="button" class="button dp-media-upload" data-target="home-final-img"><?php esc_html_e('Select Image', 'dp-starter'); ?></button>
                            <button type="button" class="button dp-media-remove" data-target="home-final-img" <?php echo $s['home_final_image_id'] ? '' : 'style="display:none"'; ?>><?php esc_html_e('Remove', 'dp-starter'); ?></button>
                            <p class="description"><?php esc_html_e('If empty, uses the default theme CTA image.', 'dp-starter'); ?></p>
                        </td></tr>
                    </table>
                </div>
            </div>

            <!-- ═══ MAINTENANCE ═══ -->
            <?php if ($licensed) : ?>
            <div class="dp-tab-content" id="tab-maintenance">
                <div class="dp-admin-section">
                    <h2><?php esc_html_e('Maintenance / Coming Soon', 'dp-starter'); ?></h2>
                    <table class="form-table">
                        <tr><th scope="row"><?php esc_html_e('Enable', 'dp-starter'); ?></th><td>
                            <label>
                                <input type="checkbox" name="dp_starter_settings[maintenance_mode]" value="1" <?php checked($s['maintenance_mode'], '1'); ?>>
                                <?php esc_html_e('Site visible only to logged-in users', 'dp-starter'); ?>
                            </label>
                        </td></tr>
                        <tr><th scope="row"><?php esc_html_e('Title', 'dp-starter'); ?></th><td>
                            <input type="text" name="dp_starter_settings[maintenance_title]" value="<?php echo esc_attr($s['maintenance_title']); ?>" class="regular-text">
                        </td></tr>
                        <tr><th scope="row"><?php esc_html_e('Description', 'dp-starter'); ?></th><td>
                            <textarea name="dp_starter_settings[maintenance_description]" rows="3" class="large-text"><?php echo esc_textarea($s['maintenance_description']); ?></textarea>
                        </td></tr>
                        <tr><th scope="row"><?php esc_html_e('Launch Date', 'dp-starter'); ?></th><td>
                            <input type="date" name="dp_starter_settings[maintenance_launch_date]" value="<?php echo esc_attr($s['maintenance_launch_date']); ?>">
                        </td></tr>
                        <tr><th scope="row"><?php esc_html_e('Countdown Timer', 'dp-starter'); ?></th><td>
                            <label>
                                <input type="checkbox" name="dp_starter_settings[maintenance_show_timer]" value="1" <?php checked($s['maintenance_show_timer'], '1'); ?>>
                                <?php esc_html_e('Show countdown timer on the maintenance page', 'dp-starter'); ?>
                            </label>
                        </td></tr>
                        <tr><th scope="row"><?php esc_html_e('Background Image', 'dp-starter'); ?></th><td>
                            <input type="hidden" name="dp_starter_settings[maintenance_bg_id]" id="dp-maint-bg-id" value="<?php echo esc_attr($s['maintenance_bg_id']); ?>">
                            <div id="dp-maint-bg-preview" class="dp-media-preview" <?php echo $maint_bg_url ? '' : 'style="display:none"'; ?>>
                                <?php if ($maint_bg_url) : ?><img src="<?php echo esc_url($maint_bg_url); ?>" alt="" style="max-height:150px;"><?php endif; ?>
                            </div>
                            <button type="button" class="button dp-media-upload" data-target="maint-bg"><?php esc_html_e('Select Image', 'dp-starter'); ?></button>
                            <button type="button" class="button dp-media-remove" data-target="maint-bg" <?php echo $s['maintenance_bg_id'] ? '' : 'style="display:none"'; ?>><?php esc_html_e('Remove', 'dp-starter'); ?></button>
                        </td></tr>
                    </table>
                </div>
            </div>

            <!-- ═══ CONTENT TYPES ═══ -->
            <div class="dp-tab-content" id="tab-content-types">
                <div class="dp-admin-section">
                    <h2><?php esc_html_e('Books', 'dp-starter'); ?></h2>
                    <table class="form-table">
                        <tr><th scope="row"><?php esc_html_e('Label (plural)', 'dp-starter'); ?></th><td>
                            <input type="text" name="dp_starter_settings[cpt_books_label]" value="<?php echo esc_attr($s['cpt_books_label']); ?>" class="regular-text" placeholder="Books">
                        </td></tr>
                        <tr><th scope="row"><?php esc_html_e('Label (singular)', 'dp-starter'); ?></th><td>
                            <input type="text" name="dp_starter_settings[cpt_books_label_singular]" value="<?php echo esc_attr($s['cpt_books_label_singular']); ?>" class="regular-text" placeholder="Book">
                        </td></tr>
                        <tr><th scope="row"><?php esc_html_e('URL Slug', 'dp-starter'); ?></th><td>
                            <input type="text" name="dp_starter_settings[cpt_books_slug]" value="<?php echo esc_attr($s['cpt_books_slug']); ?>" class="regular-text" placeholder="books">
                            <p class="description"><?php echo esc_html(home_url('/')); ?><strong><?php echo esc_html($s['cpt_books_slug']); ?></strong>/</p>
                        </td></tr>
                    </table>
                </div>
                <div class="dp-admin-section">
                    <h2><?php esc_html_e('Advertorials', 'dp-starter'); ?></h2>
                    <table class="form-table">
                        <tr><th scope="row"><?php esc_html_e('Label (plural)', 'dp-starter'); ?></th><td>
                            <input type="text" name="dp_starter_settings[cpt_adv_label]" value="<?php echo esc_attr($s['cpt_adv_label']); ?>" class="regular-text" placeholder="Advertorials">
                        </td></tr>
                        <tr><th scope="row"><?php esc_html_e('Label (singular)', 'dp-starter'); ?></th><td>
                            <input type="text" name="dp_starter_settings[cpt_adv_label_singular]" value="<?php echo esc_attr($s['cpt_adv_label_singular']); ?>" class="regular-text" placeholder="Advertorial">
                        </td></tr>
                        <tr><th scope="row"><?php esc_html_e('URL Slug', 'dp-starter'); ?></th><td>
                            <input type="text" name="dp_starter_settings[cpt_adv_slug]" value="<?php echo esc_attr($s['cpt_adv_slug']); ?>" class="regular-text" placeholder="advertorials">
                            <p class="description"><?php echo esc_html(home_url('/')); ?><strong><?php echo esc_html($s['cpt_adv_slug']); ?></strong>/</p>
                        </td></tr>
                    </table>
                </div>
                <div class="dp-admin-section">
                    <h2><?php esc_html_e('Tools', 'dp-starter'); ?></h2>
                    <table class="form-table">
                        <tr><th scope="row"><?php esc_html_e('Label (plural)', 'dp-starter'); ?></th><td>
                            <input type="text" name="dp_starter_settings[cpt_tools_label]" value="<?php echo esc_attr($s['cpt_tools_label']); ?>" class="regular-text" placeholder="Tools">
                        </td></tr>
                        <tr><th scope="row"><?php esc_html_e('Label (singular)', 'dp-starter'); ?></th><td>
                            <input type="text" name="dp_starter_settings[cpt_tools_label_singular]" value="<?php echo esc_attr($s['cpt_tools_label_singular']); ?>" class="regular-text" placeholder="Tool">
                        </td></tr>
                        <tr><th scope="row"><?php esc_html_e('URL Slug', 'dp-starter'); ?></th><td>
                            <input type="text" name="dp_starter_settings[cpt_tools_slug]" value="<?php echo esc_attr($s['cpt_tools_slug']); ?>" class="regular-text" placeholder="tools">
                            <p class="description"><?php echo esc_html(home_url('/')); ?><strong><?php echo esc_html($s['cpt_tools_slug']); ?></strong>/</p>
                        </td></tr>
                    </table>
                </div>
            </div>

            <!-- ═══ INTEGRATIONS ═══ -->
            <div class="dp-tab-content" id="tab-integrations">
                <div class="dp-admin-section">
                    <h2><?php esc_html_e('FluentCRM', 'dp-starter'); ?></h2>
                    <table class="form-table">
                        <tr>
                            <th scope="row"><?php esc_html_e('Default List ID', 'dp-starter'); ?></th>
                            <td>
                                <input type="number" name="dp_starter_settings[fluentcrm_list_id]" value="<?php echo esc_attr($s['fluentcrm_list_id']); ?>" class="small-text" min="1">
                                <p class="description"><?php esc_html_e('FluentCRM list ID for new leads from the capture form.', 'dp-starter'); ?></p>
                            </td>
                        </tr>
                        <tr>
                            <th scope="row"><?php esc_html_e('Lead Tag ID', 'dp-starter'); ?></th>
                            <td>
                                <input type="number" name="dp_starter_settings[fluentcrm_tag_lead_id]" value="<?php echo esc_attr($s['fluentcrm_tag_lead_id']); ?>" class="small-text" min="1">
                                <p class="description"><?php esc_html_e('Tag applied to every new lead.', 'dp-starter'); ?></p>
                            </td>
                        </tr>
                        <tr>
                            <th scope="row"><?php esc_html_e('Facebook Ads Tag ID', 'dp-starter'); ?></th>
                            <td>
                                <input type="number" name="dp_starter_settings[fluentcrm_tag_facebook_id]" value="<?php echo esc_attr($s['fluentcrm_tag_facebook_id']); ?>" class="small-text" min="1">
                                <p class="description"><?php esc_html_e('Tag applied when lead comes from Facebook Ads (fbclid detected).', 'dp-starter'); ?></p>
                            </td>
                        </tr>
                        <tr>
                            <th scope="row"><?php esc_html_e('Organic Tag ID', 'dp-starter'); ?></th>
                            <td>
                                <input type="number" name="dp_starter_settings[fluentcrm_tag_organic_id]" value="<?php echo esc_attr($s['fluentcrm_tag_organic_id']); ?>" class="small-text" min="1">
                                <p class="description"><?php esc_html_e('Tag applied when lead arrives organically (no fbclid).', 'dp-starter'); ?></p>
                            </td>
                        </tr>
                    </table>
                </div>
                <div class="dp-admin-section">
                    <h2><?php esc_html_e('Fluent Forms', 'dp-starter'); ?></h2>
                    <table class="form-table">
                        <tr>
                            <th scope="row"><?php esc_html_e('Lead Form ID', 'dp-starter'); ?></th>
                            <td>
                                <input type="number" name="dp_starter_settings[fluentforms_form_id]" value="<?php echo esc_attr($s['fluentforms_form_id']); ?>" class="small-text" min="1">
                                <p class="description"><?php esc_html_e('Fluent Forms ID used to store lead capture submissions.', 'dp-starter'); ?></p>
                            </td>
                        </tr>
                    </table>
                </div>
                <div class="dp-admin-section">
                    <h2><?php esc_html_e('Facebook Pixel', 'dp-starter'); ?></h2>
                    <table class="form-table">
                        <tr>
                            <th scope="row"><?php esc_html_e('Lead Event Name', 'dp-starter'); ?></th>
                            <td>
                                <input type="text" name="dp_starter_settings[fb_lead_event_name]" value="<?php echo esc_attr($s['fb_lead_event_name']); ?>" class="regular-text" placeholder="<?php echo esc_attr(get_bloginfo('name')); ?>">
                                <p class="description"><?php esc_html_e('Content name sent with the Facebook Lead event. Defaults to your site name.', 'dp-starter'); ?></p>
                            </td>
                        </tr>
                    </table>
                </div>
            </div>
            <?php endif; ?>

            <!-- ═══ ADVANCED ═══ -->
            <div class="dp-tab-content" id="tab-advanced">
                <div class="dp-admin-section">
                    <h2><?php esc_html_e('Custom CSS', 'dp-starter'); ?></h2>
                    <textarea name="dp_starter_settings[custom_css]" id="dp-custom-css" rows="10" class="large-text code"><?php echo esc_textarea($s['custom_css']); ?></textarea>
                </div>
                <div class="dp-admin-section">
                    <h2><?php esc_html_e('Head Code', 'dp-starter'); ?></h2>
                    <p class="description"><?php esc_html_e('Injected before &lt;/head&gt;. Use for analytics, pixels, meta tags.', 'dp-starter'); ?></p>
                    <textarea name="dp_starter_settings[head_code]" id="dp-head-code" rows="8" class="large-text code"><?php echo esc_textarea($s['head_code']); ?></textarea>
                </div>
                <div class="dp-admin-section">
                    <h2><?php esc_html_e('Footer Code', 'dp-starter'); ?></h2>
                    <p class="description"><?php esc_html_e('Injected before &lt;/body&gt;. Use for chat widgets, tracking scripts.', 'dp-starter'); ?></p>
                    <textarea name="dp_starter_settings[footer_code]" id="dp-footer-code" rows="8" class="large-text code"><?php echo esc_textarea($s['footer_code']); ?></textarea>
                </div>
            </div>

                    <?php submit_button(__('Save Settings', 'dp-starter')); ?>
                </form>
            </div><!-- .dp-settings-panel -->
        </div><!-- .dp-settings-layout -->
    </div>

    <style>
    /* ── Layout ── */
    #dp-settings-wrap { max-width: 1140px; margin-top: 20px; }
    .dp-settings-header { display: flex; align-items: center; gap: 12px; margin-bottom: 20px; }
    .dp-settings-header h1 { margin: 0; font-size: 1.6rem; font-weight: 800; color: #1d2327; }
    .dp-settings-version { background: #f0f0f1; color: #787c82; font-size: 11px; font-weight: 600; padding: 2px 8px; border-radius: 10px; }
    .dp-settings-layout { display: grid; grid-template-columns: 220px 1fr; gap: 0; min-height: 600px; border: 1px solid #c3c4c7; border-radius: 8px; overflow: hidden; background: #f6f7f7; }

    /* ── Sidebar ── */
    .dp-settings-sidebar { background: #1d2327; padding: 12px 0; display: flex; flex-direction: column; }
    .dp-sidebar-item { display: flex; align-items: center; gap: 10px; padding: 11px 20px; color: #bbc8d4; text-decoration: none; font-size: 13px; font-weight: 500; transition: all 120ms; border-left: 3px solid transparent; }
    .dp-sidebar-item:hover { color: #fff; background: rgba(255,255,255,0.06); }
    .dp-sidebar-item:focus { color: #fff; box-shadow: none; outline: none; }
    .dp-sidebar-item.is-active { color: #fff; background: rgba(255,255,255,0.08); border-left-color: #f0b849; }
    .dp-sidebar-item .dashicons { font-size: 16px; width: 16px; height: 16px; opacity: 0.65; }
    .dp-sidebar-item.is-active .dashicons { opacity: 1; color: #f0b849; }

    /* ── Panel ── */
    .dp-settings-panel { background: #fff; padding: 28px 32px; overflow-y: auto; }
    .dp-tab-content { display: none; }
    .dp-tab-content.is-active { display: block; animation: dpFadeIn 200ms ease; }
    @keyframes dpFadeIn { from { opacity: 0; transform: translateY(6px); } to { opacity: 1; transform: translateY(0); } }

    /* ── Sections ── */
    .dp-admin-section { background: #f9fafb; border: 1px solid #e5e7eb; border-radius: 8px; padding: 24px 28px; margin: 0 0 20px; }
    .dp-admin-section h2 { margin: 0 0 16px; padding: 0 0 12px; border-bottom: 1px solid #e5e7eb; font-size: 1.05em; font-weight: 700; color: #1d2327; }
    .dp-admin-section .form-table th { font-weight: 600; color: #374151; padding-top: 16px; }
    .dp-admin-section .form-table td { padding-top: 12px; }

    /* ── Media ── */
    .dp-media-preview { margin-bottom: 10px; }
    .dp-media-preview img { max-width: 300px; max-height: 100px; border: 1px solid #e5e7eb; border-radius: 6px; padding: 8px; background: #fff; }
    .dp-media-preview-small img { max-width: 64px; max-height: 64px; }
    .dp-media-upload, .dp-media-remove { margin-right: 8px !important; }

    /* ── Submit button ── */
    .dp-settings-panel .submit { margin-top: 8px; padding-top: 20px; border-top: 1px solid #e5e7eb; }
    .dp-settings-panel #submit { background: #1d2327; border-color: #1d2327; color: #fff; border-radius: 6px; padding: 6px 24px; font-weight: 600; transition: background 120ms; }
    .dp-settings-panel #submit:hover { background: #2c3338; }

    /* ── Responsive ── */
    @media (max-width: 960px) {
        .dp-settings-layout { grid-template-columns: 1fr; }
        .dp-settings-sidebar { flex-direction: row; flex-wrap: wrap; padding: 8px; gap: 4px; }
        .dp-sidebar-item { padding: 8px 12px; border-left: none; border-bottom: 2px solid transparent; font-size: 12px; }
        .dp-sidebar-item.is-active { border-left: none; border-bottom-color: #f0b849; }
        .dp-sidebar-item .dashicons { display: none; }
        .dp-settings-panel { padding: 20px 16px; }
    }
    </style>

    <script>
    jQuery(function($) {
        /* ── Tab navigation ── */
        var $tabs = $('.dp-sidebar-item');
        var $panels = $('.dp-tab-content');
        var colorPickersInitialized = {};

        function activateTab(id) {
            $tabs.removeClass('is-active');
            $panels.removeClass('is-active');
            $tabs.filter('[data-tab="' + id + '"]').addClass('is-active');
            var $panel = $('#tab-' + id).addClass('is-active');

            // Init color pickers on first show (avoids width:0 bug).
            if (!colorPickersInitialized[id]) {
                $panel.find('.dp-color-picker').wpColorPicker();
                colorPickersInitialized[id] = true;
            }

            // Init CodeMirror on first show.
            if (id === 'advanced' && !window.dpCMInitialized) {
                window.dpCMInitialized = true;
                if (typeof wp.codeEditor !== 'undefined') {
                    wp.codeEditor.initialize($('#dp-custom-css'), { type: 'text/css' });
                    wp.codeEditor.initialize($('#dp-head-code'), { type: 'text/html' });
                    wp.codeEditor.initialize($('#dp-footer-code'), { type: 'text/html' });
                }
            }

            window.location.hash = id;
        }

        $tabs.on('click', function(e) {
            e.preventDefault();
            activateTab($(this).data('tab'));
        });

        // Persist tab after save — append hash to form action.
        $('#dp-settings-form').on('submit', function() {
            var hash = window.location.hash.replace('#', '');
            if (hash) {
                var $action = $(this);
                var url = $action.attr('action');
                // Store in a hidden field so we can read it after redirect.
                if (!$('#dp-active-tab').length) {
                    $action.append('<input type="hidden" id="dp-active-tab" name="dp_active_tab" value="' + hash + '">');
                } else {
                    $('#dp-active-tab').val(hash);
                }
            }
        });

        // Activate tab from hash or default to 'general'.
        var hash = window.location.hash.replace('#', '');
        // Also check for tab stored in URL params (after redirect).
        if (!hash) {
            var urlParams = new URLSearchParams(window.location.search);
            hash = urlParams.get('dp_active_tab') || 'general';
        }
        activateTab(hash || 'general');

        /* ── Reset colors ── */
        var allDefaults = <?php echo wp_json_encode(array_merge($light_colors, $dark_colors)); ?>;
        var defaultValues = <?php echo wp_json_encode(array_intersect_key($defaults, array_merge($light_colors, $dark_colors))); ?>;
        $('#dp-reset-colors').on('click', function() {
            if (!confirm('<?php echo esc_js(__('Reset all colors to defaults?', 'dp-starter')); ?>')) return;
            $.each(defaultValues, function(key, val) {
                $('input[name="dp_starter_settings[' + key + ']"]').val(val).wpColorPicker('color', val);
            });
        });

        /* ── Media uploads ── */
        function openMedia(target, title) {
            var frame = wp.media({ title: title, multiple: false, library: { type: 'image' } });
            frame.on('select', function() {
                var att = frame.state().get('selection').first().toJSON();
                var url = (att.sizes && att.sizes.medium) ? att.sizes.medium.url : att.url;
                if (target === 'favicon' && att.sizes && att.sizes.thumbnail) url = att.sizes.thumbnail.url;
                if (target === 'maint-bg' && att.sizes && att.sizes.large) url = att.sizes.large.url;
                $('#dp-' + target + '-id').val(att.id);
                $('#dp-' + target + '-preview').html('<img src="' + url + '" alt="" style="max-height:150px;">').show();
                $('.dp-media-remove[data-target="' + target + '"]').show();
            });
            frame.open();
        }
        $('.dp-media-upload').on('click', function(e) {
            e.preventDefault();
            openMedia($(this).data('target'), '<?php echo esc_js(__('Select Image', 'dp-starter')); ?>');
        });
        $('.dp-media-remove').on('click', function(e) {
            e.preventDefault();
            var t = $(this).data('target');
            $('#dp-' + t + '-id').val('0');
            $('#dp-' + t + '-preview').hide().html('');
            $(this).hide();
        });

        /* ── Font preview ── */
        var gapi = 'https://fonts.googleapis.com/css2?';
        var fonts = <?php echo wp_json_encode($fonts_list); ?>;
        var $fontLink = $('<link rel="stylesheet" id="dp-font-preview-css">').appendTo('head');
        function updateFontPreview() {
            var b = $('#dp-font-body').val(), h = $('#dp-font-heading').val();
            var f = [];
            if (fonts[b]) f.push('family=' + fonts[b]);
            if (h !== b && fonts[h]) f.push('family=' + fonts[h]);
            $fontLink.attr('href', gapi + f.join('&') + '&display=swap');
            $('#dp-font-preview-body').css('font-family', '"' + b + '", sans-serif');
            $('#dp-font-preview-heading').css('font-family', '"' + h + '", sans-serif');
        }
        $('#dp-font-body, #dp-font-heading').on('change', updateFontPreview);
        updateFontPreview();
    });
    </script>
    <?php
}

/* =========================================================================
   7. GOOGLE FONTS
   ========================================================================= */

function dp_starter_google_fonts_list()
{
    return array(
        // ── Sans-Serif (Modern / Clean) ──
        'Inter'               => 'Inter:wght@400;500;600;700;800;900',
        'DM Sans'             => 'DM+Sans:wght@400;500;600;700',
        'Plus Jakarta Sans'   => 'Plus+Jakarta+Sans:wght@400;500;600;700;800',
        'Outfit'              => 'Outfit:wght@400;500;600;700;800',
        'Manrope'             => 'Manrope:wght@400;500;600;700;800',
        'Space Grotesk'       => 'Space+Grotesk:wght@400;500;600;700',
        'Sora'                => 'Sora:wght@400;500;600;700;800',
        'Figtree'             => 'Figtree:wght@400;500;600;700;800;900',
        'Geist'               => 'Geist:wght@400;500;600;700;800;900',
        'Bricolage Grotesque' => 'Bricolage+Grotesque:wght@400;500;600;700;800',
        'Albert Sans'         => 'Albert+Sans:wght@400;500;600;700;800;900',
        'General Sans'        => 'General+Sans:wght@400;500;600;700',
        'Satoshi'             => 'Satoshi:wght@400;500;600;700;800;900',
        'Onest'               => 'Onest:wght@400;500;600;700;800;900',
        'Instrument Sans'     => 'Instrument+Sans:wght@400;500;600;700',
        'Switzer'             => 'Switzer:wght@400;500;600;700;800;900',
        'Urbanist'            => 'Urbanist:wght@400;500;600;700;800;900',
        'Lexend'              => 'Lexend:wght@400;500;600;700;800;900',
        'Lexend Deca'         => 'Lexend+Deca:wght@400;500;600;700;800;900',
        'Red Hat Display'     => 'Red+Hat+Display:wght@400;500;600;700;800;900',
        'Red Hat Text'        => 'Red+Hat+Text:wght@400;500;600;700',
        'Wix Madefor Display' => 'Wix+Madefor+Display:wght@400;500;600;700;800',
        'Schibsted Grotesk'   => 'Schibsted+Grotesk:wght@400;500;600;700;800;900',
        'Hanken Grotesk'      => 'Hanken+Grotesk:wght@400;500;600;700;800;900',
        'Be Vietnam Pro'      => 'Be+Vietnam+Pro:wght@400;500;600;700;800;900',

        // ── Sans-Serif (Classic / Popular) ──
        'Poppins'             => 'Poppins:wght@400;500;600;700;800;900',
        'Montserrat'          => 'Montserrat:wght@400;500;600;700;800;900',
        'Raleway'             => 'Raleway:wght@400;500;600;700;800;900',
        'Open Sans'           => 'Open+Sans:wght@400;500;600;700;800',
        'Lato'                => 'Lato:wght@400;700;900',
        'Nunito'              => 'Nunito:wght@400;500;600;700;800;900',
        'Nunito Sans'         => 'Nunito+Sans:wght@400;500;600;700;800;900',
        'Rubik'               => 'Rubik:wght@400;500;600;700;800;900',
        'Work Sans'           => 'Work+Sans:wght@400;500;600;700;800;900',
        'IBM Plex Sans'       => 'IBM+Plex+Sans:wght@400;500;600;700',
        'Source Sans 3'       => 'Source+Sans+3:wght@400;500;600;700;800;900',
        'Roboto'              => 'Roboto:wght@400;500;700;900',
        'Roboto Flex'         => 'Roboto+Flex:wght@400;500;600;700;800;900',
        'Noto Sans'           => 'Noto+Sans:wght@400;500;600;700;800;900',
        'Karla'               => 'Karla:wght@400;500;600;700;800',
        'Barlow'              => 'Barlow:wght@400;500;600;700;800;900',
        'Barlow Condensed'    => 'Barlow+Condensed:wght@400;500;600;700;800;900',
        'Mulish'              => 'Mulish:wght@400;500;600;700;800;900',
        'Cabin'               => 'Cabin:wght@400;500;600;700',
        'Overpass'            => 'Overpass:wght@400;500;600;700;800;900',
        'Mukta'               => 'Mukta:wght@400;500;600;700;800',
        'Exo 2'               => 'Exo+2:wght@400;500;600;700;800;900',
        'Josefin Sans'        => 'Josefin+Sans:wght@400;500;600;700',
        'Quicksand'           => 'Quicksand:wght@400;500;600;700',
        'Comfortaa'           => 'Comfortaa:wght@400;500;600;700',
        'Archivo'             => 'Archivo:wght@400;500;600;700;800;900',
        'Libre Franklin'      => 'Libre+Franklin:wght@400;500;600;700;800;900',
        'Maven Pro'           => 'Maven+Pro:wght@400;500;600;700;800;900',
        'Catamaran'           => 'Catamaran:wght@400;500;600;700;800;900',
        'Kanit'               => 'Kanit:wght@400;500;600;700;800;900',
        'Titillium Web'       => 'Titillium+Web:wght@400;600;700;900',
        'Signika Negative'    => 'Signika+Negative:wght@400;500;600;700',
        'Assistant'           => 'Assistant:wght@400;500;600;700;800',
        'Heebo'               => 'Heebo:wght@400;500;600;700;800;900',

        // ── Serif (Elegant / Editorial) ──
        'Playfair Display'    => 'Playfair+Display:wght@400;500;600;700;800;900',
        'Lora'                => 'Lora:wght@400;500;600;700',
        'Merriweather'        => 'Merriweather:wght@400;700;900',
        'Source Serif 4'      => 'Source+Serif+4:wght@400;500;600;700;800;900',
        'Fraunces'            => 'Fraunces:wght@400;500;600;700;800;900',
        'DM Serif Display'    => 'DM+Serif+Display:wght@400',
        'DM Serif Text'       => 'DM+Serif+Text:wght@400',
        'Instrument Serif'    => 'Instrument+Serif:wght@400',
        'Crimson Text'        => 'Crimson+Text:wght@400;600;700',
        'Crimson Pro'         => 'Crimson+Pro:wght@400;500;600;700;800;900',
        'Libre Baskerville'   => 'Libre+Baskerville:wght@400;700',
        'Noto Serif'          => 'Noto+Serif:wght@400;500;600;700;800;900',
        'PT Serif'            => 'PT+Serif:wght@400;700',
        'Bitter'              => 'Bitter:wght@400;500;600;700;800;900',
        'Spectral'            => 'Spectral:wght@400;500;600;700;800',
        'Cormorant Garamond'  => 'Cormorant+Garamond:wght@400;500;600;700',
        'EB Garamond'         => 'EB+Garamond:wght@400;500;600;700;800',
        'Old Standard TT'     => 'Old+Standard+TT:wght@400;700',
        'Cardo'               => 'Cardo:wght@400;700',
        'Vollkorn'            => 'Vollkorn:wght@400;500;600;700;800;900',
        'Alegreya'            => 'Alegreya:wght@400;500;600;700;800;900',
        'Newsreader'          => 'Newsreader:wght@400;500;600;700;800',
        'Literata'            => 'Literata:wght@400;500;600;700;800;900',
        'Brygada 1918'        => 'Brygada+1918:wght@400;500;600;700',
        'Bodoni Moda'         => 'Bodoni+Moda:wght@400;500;600;700;800;900',

        // ── Display / Decorative ──
        'Abril Fatface'       => 'Abril+Fatface:wght@400',
        'Bebas Neue'          => 'Bebas+Neue:wght@400',
        'Oswald'              => 'Oswald:wght@400;500;600;700',
        'Anton'               => 'Anton:wght@400',
        'Righteous'           => 'Righteous:wght@400',
        'Passion One'         => 'Passion+One:wght@400;700;900',
        'Alfa Slab One'       => 'Alfa+Slab+One:wght@400',
        'Bungee'              => 'Bungee:wght@400',
        'Fredoka'             => 'Fredoka:wght@400;500;600;700',
        'Lilita One'          => 'Lilita+One:wght@400',

        // ── Monospace ──
        'JetBrains Mono'      => 'JetBrains+Mono:wght@400;500;600;700;800',
        'Fira Code'           => 'Fira+Code:wght@400;500;600;700',
        'Source Code Pro'     => 'Source+Code+Pro:wght@400;500;600;700;800;900',
        'IBM Plex Mono'       => 'IBM+Plex+Mono:wght@400;500;600;700',
        'Space Mono'          => 'Space+Mono:wght@400;700',
        'Roboto Mono'         => 'Roboto+Mono:wght@400;500;600;700',
        'Inconsolata'         => 'Inconsolata:wght@400;500;600;700;800;900',

        // ── Handwriting / Script ──
        'Caveat'              => 'Caveat:wght@400;500;600;700',
        'Dancing Script'      => 'Dancing+Script:wght@400;500;600;700',
        'Pacifico'            => 'Pacifico:wght@400',
        'Satisfy'             => 'Satisfy:wght@400',
        'Great Vibes'         => 'Great+Vibes:wght@400',
        'Kalam'               => 'Kalam:wght@400;700',
    );
}

function dp_starter_enqueue_google_fonts()
{
    $fonts_list   = dp_starter_google_fonts_list();
    $body_font    = dp_starter_get_setting('font_body');
    $heading_font = dp_starter_get_setting('font_heading');
    $families = array();
    if (isset($fonts_list[$body_font])) {
        $families[] = $fonts_list[$body_font];
    }
    if ($heading_font !== $body_font && isset($fonts_list[$heading_font])) {
        $families[] = $fonts_list[$heading_font];
    }
    if (!empty($families)) {
        $url = 'https://fonts.googleapis.com/css2?' . implode('&', array_map(function ($f) {
            return 'family=' . $f;
        }, $families)) . '&display=swap';
        wp_enqueue_style('dp-starter-google-fonts', $url, array(), null);
    }
}
add_action('wp_enqueue_scripts', 'dp_starter_enqueue_google_fonts', 5);

/* =========================================================================
   8. DYNAMIC CSS OUTPUT
   ========================================================================= */

function dp_starter_dynamic_css()
{
    $defaults = dp_starter_settings_defaults();
    $settings = get_option('dp_starter_settings', array());
    $s = wp_parse_args($settings, $defaults);

    $map = array(
        '--dp-bg'             => $s['color_bg'],
        '--dp-bg-soft'        => $s['color_bg_soft'],
        '--dp-panel'          => $s['color_panel'],
        '--dp-ink'            => $s['color_ink'],
        '--dp-black'          => $s['color_black'],
        '--dp-muted'          => $s['color_muted'],
        '--dp-muted-2'        => $s['color_muted_2'],
        '--dp-gold'           => $s['color_gold'],
        '--dp-gold-strong'    => $s['color_gold_strong'],
        '--dp-bronze'         => $s['color_bronze'],
        '--dp-danger-soft'    => $s['color_danger_soft'],
        '--dp-dark-bg'        => $s['color_dark_bg'],
        '--dp-dark-text'      => $s['color_dark_text'],
        '--dp-dark-text-soft' => $s['color_dark_text_soft'],
        '--dp-dark-link'      => $s['color_dark_link'],
        '--dp-gold-hover'     => $s['color_gold_hover'],
        '--dp-radius'         => absint($s['border_radius']) . 'px',
        '--dp-font-body'      => '"' . $s['font_body'] . '", ui-sans-serif, system-ui, -apple-system, sans-serif',
        '--dp-font-heading'   => '"' . $s['font_heading'] . '", ui-sans-serif, system-ui, -apple-system, sans-serif',
    );

    $css = ":root {\n";
    foreach ($map as $var => $val) {
        $css .= "  {$var}: {$val};\n";
    }
    $css .= "}\n";

    echo "<style id=\"dp-starter-dynamic-css\">\n" . $css . "</style>\n";
}
add_action('wp_head', 'dp_starter_dynamic_css', 20);

/* =========================================================================
   9. CUSTOM CSS & CODE INJECTION
   ========================================================================= */

function dp_starter_output_custom_css()
{
    $css = trim(dp_starter_get_setting('custom_css'));
    if ($css) {
        echo "<style id=\"dp-starter-custom-css\">\n" . $css . "\n</style>\n";
    }
}
add_action('wp_head', 'dp_starter_output_custom_css', 99);

function dp_starter_output_head_code()
{
    $code = trim(dp_starter_get_setting('head_code'));
    if ($code) {
        echo $code . "\n";
    }
}
if (dp_starter_is_licensed()) {
    add_action('wp_head', 'dp_starter_output_head_code', 100);
}

function dp_starter_output_footer_code()
{
    $code = trim(dp_starter_get_setting('footer_code'));
    if ($code) {
        echo $code . "\n";
    }
}
if (dp_starter_is_licensed()) {
    add_action('wp_footer', 'dp_starter_output_footer_code', 99);
}

/* =========================================================================
   10. FAVICON
   ========================================================================= */

function dp_starter_dynamic_favicon()
{
    $favicon_id = (int) dp_starter_get_setting('favicon_id');
    if ($favicon_id) {
        $url = wp_get_attachment_image_url($favicon_id, 'full');
        if ($url) {
            dp_starter_output_favicon_tags($url);
            return;
        }
    }
    $logo_id = (int) dp_starter_get_setting('logo_id');
    if ($logo_id) {
        $url = wp_get_attachment_image_url($logo_id, 'thumbnail');
        if ($url) {
            dp_starter_output_favicon_tags($url);
            return;
        }
    }
}
add_action('wp_head', 'dp_starter_dynamic_favicon', 5);

function dp_starter_output_favicon_tags($url)
{
    echo '<link rel="icon" href="' . esc_url($url) . '">' . "\n";
    echo '<link rel="icon" sizes="32x32" href="' . esc_url($url) . '">' . "\n";
    echo '<link rel="icon" sizes="192x192" href="' . esc_url($url) . '">' . "\n";
    echo '<link rel="apple-touch-icon" href="' . esc_url($url) . '">' . "\n";
}
