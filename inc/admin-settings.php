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
        'color_bg'          => '#f0fafb',
        'color_bg_soft'     => '#e8f7f9',
        'color_panel'       => '#ffffff',
        'color_ink'         => '#0c1a1d',
        'color_black'       => '#0a1416',
        'color_muted'       => '#4a6b70',
        'color_muted_2'     => '#6b9198',
        'color_gold'        => '#85D1DB',
        'color_gold_strong' => '#B3EBF2',
        'color_bronze'      => '#5bb8c4',
        'color_danger_soft' => '#edf9fb',
        // Appearance — Dark.
        'color_dark_bg'        => '#050a0b',
        'color_dark_text'      => '#e8f5f7',
        'color_dark_text_soft' => '#b0d5db',
        'color_dark_link'      => '#B6F2D1',
        'color_gold_hover'     => '#C9FDF2',
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
        'home_hero_bg_color'           => '',
        'home_hero_bg_image_id'        => 0,
        'home_hero_overlay'            => '0.7',
        'home_hero_text_color'         => '',
        'home_hero_kicker'             => 'For digital product creators who ship',
        'home_hero_title'              => 'Build Digital Products That Sell — Without the Guesswork',
        'home_hero_description'        => 'Practical guides, launch strategies, tool reviews, and direct advice for creators who want to build, price, and sell digital products with clarity and confidence.',
        'home_hero_cta_primary_text'   => 'Start Here',
        'home_hero_cta_primary_url'    => '/start-here/',
        'home_hero_cta_secondary_text' => 'Browse Guides',
        'home_hero_cta_secondary_url'  => '/blog/',
        'home_hero_proof'              => "Ship faster.\nSell smarter.\nNo hype needed.",
        // Home Page — Situations.
        'home_situations_enabled'      => '1',
        'home_situations_kicker'       => 'Start by situation',
        'home_situations_title'        => 'Choose the digital product challenge you are solving now.',
        'home_situations_items'        => "Getting started|I want to create my first digital product.|Learn how to pick a profitable idea, validate it, build an MVP, and get your first paying customers.|/start-here/\nProduct ideas|I don't know what to build.|Explore frameworks for finding product ideas based on your skills, audience pain points, and market demand.|/category/product-ideas/\nPricing|I don't know how to price my product.|Use guides that help you set the right price, create tiers, and position your offer for maximum perceived value.|/category/pricing/\nLaunch strategy|I need a plan to launch.|Read step-by-step launch strategies, pre-launch checklists, and promotion tactics that actually work.|/category/launch/\nTools|I need the right tools and platforms.|Compare tools for building, hosting, selling, and delivering digital products without overcomplicating your stack.|/tools/\nGrowth|I want to scale beyond my first sales.|Browse strategies for email marketing, content funnels, affiliates, and recurring revenue models.|/category/growth/",
        // Home Page — Featured Guides.
        'home_featured_enabled'        => '1',
        'home_featured_kicker'         => 'Featured guides',
        'home_featured_title'          => 'Start with the guides that make every launch easier.',
        'home_featured_link_text'      => 'All Guides',
        'home_featured_link_url'       => '/blog/',
        'home_featured_count'          => '3',
        // Home Page — Books Carousel.
        'home_books_enabled'           => '1',
        'home_books_kicker'            => 'Recommended reading',
        'home_books_title'             => 'Books worth reading before your next product decision.',
        'home_books_link_text'         => 'All Books',
        'home_books_link_url'          => '/books/',
        'home_books_count'             => '12',
        // Home Page — Resource Categories.
        'home_resources_enabled'       => '1',
        'home_resources_kicker'        => 'Resource categories',
        'home_resources_title'         => 'Tools, books, templates, and comparisons for real product decisions.',
        'home_resources_items'         => "Books|Books that help creators think better about products, pricing, marketing, and business models.|/books/\nTools|Simple tools for building, hosting, selling, delivering, and automating your digital products.|/tools/\nPlatforms|Platform guides for creators deciding where to sell, host courses, manage memberships, and accept payments.|/platforms/\nTemplates|Ready-to-use templates, checklists, swipe files, and frameworks to ship faster.|/templates/\nCase Studies|Real product launches analyzed — what worked, what didn't, and what you can learn from each.|/case-studies/\nWhat Not To Do|Common digital product mistakes explained clearly so you can avoid expensive detours.|/what-not-to-do/",
        // Home Page — Anti-Advice.
        'home_antiadvice_enabled'      => '1',
        'home_antiadvice_kicker'       => 'Bad advice to avoid',
        'home_antiadvice_title'        => 'Before you build another feature, know what can waste your time.',
        'home_antiadvice_description'  => 'The resource hub is not only about what to build. It also helps you avoid the common habits that make a digital product business heavier than it needs to be.',
        'home_antiadvice_items'        => "Building a complex product before validating that anyone will pay for it.\nSpending months on design polish instead of getting real feedback from real users.\nCopying someone else's funnel without understanding why it works for their audience.\nAdding features nobody asked for instead of marketing the product you already have.",
        // Home Page — Latest Guides.
        'home_latest_enabled'          => '1',
        'home_latest_kicker'           => 'Latest guides',
        'home_latest_title'            => 'New practical notes from the Digital Product library.',
        'home_latest_link_text'        => 'All Guides',
        'home_latest_link_url'         => '/blog/',
        'home_latest_count'            => '6',
        // Home Page — Newsletter CTA.
        'home_newsletter_enabled'      => '1',
        'home_newsletter_kicker'       => 'Not sure where to begin?',
        'home_newsletter_title'        => 'Use the start-here path before you collect more advice.',
        'home_newsletter_description'  => 'The fastest way to use this site is to start with one clear product challenge, read one useful guide, and apply the next practical step.',
        'home_newsletter_cta_text'     => 'Start With the Essentials',
        'home_newsletter_cta_url'      => '/start-here/',
        // Home Page — Final CTA.
        'home_final_enabled'           => '1',
        'home_final_kicker'            => 'Build with clarity',
        'home_final_title'             => 'A clearer way to create, launch, and sell digital products.',
        'home_final_description'       => 'Start with the resource path, then move into the guides, tools, and deeper strategies when the timing makes sense.',
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
    add_menu_page(
        __('DP Starter', 'dp-starter'),
        __('DP Starter', 'dp-starter'),
        'manage_options',
        'dp-starter-settings',
        'dp_starter_settings_page_render',
        'dashicons-art',
        3
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

    // Home Page — Hero appearance.
    $clean['home_hero_bg_color']    = isset($input['home_hero_bg_color']) && $input['home_hero_bg_color'] ? sanitize_hex_color($input['home_hero_bg_color']) : '';
    $clean['home_hero_bg_image_id'] = isset($input['home_hero_bg_image_id']) ? absint($input['home_hero_bg_image_id']) : 0;
    $clean['home_hero_overlay']     = isset($input['home_hero_overlay']) ? max(0, min(1, floatval($input['home_hero_overlay']))) : 0.7;
    $clean['home_hero_text_color']  = isset($input['home_hero_text_color']) && $input['home_hero_text_color'] ? sanitize_hex_color($input['home_hero_text_color']) : '';

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

    // Bump CSS cache-buster on every save.
    update_option('dp_starter_settings_version', time());

    return $clean;
}

/* =========================================================================
   5. ADMIN ENQUEUE
   ========================================================================= */

function dp_starter_admin_enqueue($hook)
{
    if ('toplevel_page_dp-starter-settings' !== $hook) {
        return;
    }
    wp_enqueue_media();
    wp_enqueue_style('wp-color-picker');
    wp_enqueue_script('wp-color-picker');
    wp_enqueue_script('jquery-ui-sortable');

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
                <div class="dp-admin-section">
                    <h2><?php esc_html_e('Theme Pages', 'dp-starter'); ?></h2>
                    <p class="description" style="margin-bottom:16px;">
                        <?php esc_html_e('These pages are required for full theme functionality. Click "Create Missing Pages" to set them up automatically.', 'dp-starter'); ?>
                    </p>
                    <?php
                    $page_status = dp_starter_check_pages();
                    $required_pages = dp_starter_required_pages();
                    ?>
                    <table class="widefat striped" style="max-width:600px;">
                        <thead>
                            <tr>
                                <th><?php esc_html_e('Page', 'dp-starter'); ?></th>
                                <th><?php esc_html_e('Slug', 'dp-starter'); ?></th>
                                <th><?php esc_html_e('Status', 'dp-starter'); ?></th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php foreach ($required_pages as $slug => $page) :
                                $status = $page_status[$slug];
                            ?>
                                <tr>
                                    <td><strong><?php echo esc_html($page['title']); ?></strong></td>
                                    <td><code>/<?php echo esc_html($slug); ?>/</code></td>
                                    <td>
                                        <?php if ($status['exists']) : ?>
                                            <span style="color:#2ecc71;font-weight:600;">&#10003; <?php esc_html_e('Exists', 'dp-starter'); ?></span>
                                            <a href="<?php echo esc_url($status['edit_url']); ?>" style="margin-left:8px;font-size:12px;"><?php esc_html_e('Edit', 'dp-starter'); ?></a>
                                        <?php else : ?>
                                            <span style="color:#e74c3c;font-weight:600;">&#10007; <?php esc_html_e('Missing', 'dp-starter'); ?></span>
                                        <?php endif; ?>
                                    </td>
                                </tr>
                            <?php endforeach; ?>
                        </tbody>
                    </table>
                    <p style="margin-top:16px;">
                        <button type="button" class="button button-primary" id="dp-setup-pages">
                            <?php esc_html_e('Create Missing Pages', 'dp-starter'); ?>
                        </button>
                        <span id="dp-setup-pages-msg" style="margin-left:12px;"></span>
                    </p>
                    <script>
                    (function(){
                        var btn = document.getElementById('dp-setup-pages');
                        var msg = document.getElementById('dp-setup-pages-msg');
                        btn.addEventListener('click', function() {
                            btn.disabled = true;
                            btn.textContent = '<?php echo esc_js(__('Creating...', 'dp-starter')); ?>';
                            msg.textContent = '';
                            var fd = new FormData();
                            fd.append('action', 'dp_setup_pages');
                            fd.append('nonce', '<?php echo esc_js(wp_create_nonce('dp_setup_pages')); ?>');
                            fetch('<?php echo esc_url(admin_url('admin-ajax.php')); ?>', { method: 'POST', body: fd })
                                .then(function(r) { return r.json(); })
                                .then(function(d) {
                                    msg.textContent = d.data || '';
                                    msg.style.color = d.success ? '#2ecc71' : '#e74c3c';
                                    setTimeout(function() { location.reload(); }, 1500);
                                })
                                .catch(function() {
                                    msg.textContent = '<?php echo esc_js(__('Error. Please try again.', 'dp-starter')); ?>';
                                    msg.style.color = '#e74c3c';
                                    btn.disabled = false;
                                    btn.textContent = '<?php echo esc_js(__('Create Missing Pages', 'dp-starter')); ?>';
                                });
                        });
                    })();
                    </script>
                </div>
                <?php if (function_exists('dp_starter_render_demo_section')) : ?>
                    <?php dp_starter_render_demo_section(); ?>
                <?php endif; ?>
            </div>

            <!-- ═══ APPEARANCE ═══ -->
            <div class="dp-tab-content" id="tab-appearance">

                <!-- Header & Navigation -->
                <div class="dp-admin-section">
                    <h2><?php esc_html_e('Header & Navigation', 'dp-starter'); ?></h2>
                    <p class="description"><?php esc_html_e('Controls the top bar, logo area, and navigation menu.', 'dp-starter'); ?></p>
                    <div class="dp-color-preview" id="dp-preview-header" style="margin:16px 0;border-radius:6px;overflow:hidden;">
                        <div data-dp-bg="color_dark_bg" data-dp-border-bottom="color_gold" style="display:flex;align-items:center;justify-content:space-between;padding:12px 20px;background:<?php echo esc_attr($s['color_dark_bg']); ?>;border-bottom:2px solid <?php echo esc_attr($s['color_gold']); ?>;">
                            <span data-dp-color="color_dark_text" style="font-weight:700;color:<?php echo esc_attr($s['color_dark_text']); ?>;font-size:14px;">Logo</span>
                            <div style="display:flex;gap:16px;align-items:center;">
                                <span data-dp-color="color_dark_link" style="color:<?php echo esc_attr($s['color_dark_link']); ?>;font-size:13px;">Menu Item</span>
                                <span data-dp-color="color_dark_link" style="color:<?php echo esc_attr($s['color_dark_link']); ?>;font-size:13px;">Menu Item</span>
                                <span data-dp-bg="color_gold" data-dp-color="color_black" data-dp-radius="border_radius" style="background:<?php echo esc_attr($s['color_gold']); ?>;color:<?php echo esc_attr($s['color_black']); ?>;padding:4px 14px;border-radius:<?php echo absint($s['border_radius']); ?>px;font-size:12px;font-weight:700;">CTA</span>
                            </div>
                        </div>
                    </div>
                    <table class="form-table">
                        <?php
                        $header_colors = array(
                            'color_dark_bg'   => __('Background', 'dp-starter'),
                            'color_dark_text' => __('Text', 'dp-starter'),
                            'color_dark_link' => __('Menu Links', 'dp-starter'),
                            'color_gold_hover' => __('Link Hover', 'dp-starter'),
                            'color_gold'      => __('Accent (border & CTA)', 'dp-starter'),
                        );
                        foreach ($header_colors as $key => $label) : ?>
                            <tr><th scope="row"><?php echo esc_html($label); ?></th><td>
                                <input type="text" class="dp-color-picker" name="dp_starter_settings[<?php echo esc_attr($key); ?>]" value="<?php echo esc_attr($s[$key]); ?>" data-default-color="<?php echo esc_attr($defaults[$key]); ?>">
                            </td></tr>
                        <?php endforeach; ?>
                    </table>
                </div>

                <!-- Content Area -->
                <div class="dp-admin-section">
                    <h2><?php esc_html_e('Content Area', 'dp-starter'); ?></h2>
                    <p class="description"><?php esc_html_e('Controls page backgrounds, text colors, cards, and accent colors for links and buttons.', 'dp-starter'); ?></p>
                    <div class="dp-color-preview" id="dp-preview-content" style="margin:16px 0;border-radius:6px;overflow:hidden;border:1px solid #e5e7eb;">
                        <div data-dp-bg="color_bg" style="background:<?php echo esc_attr($s['color_bg']); ?>;padding:20px;">
                            <p data-dp-color="color_ink" style="margin:0 0 8px;color:<?php echo esc_attr($s['color_ink']); ?>;font-weight:600;">Heading Text</p>
                            <p data-dp-color="color_muted" style="margin:0 0 8px;color:<?php echo esc_attr($s['color_muted']); ?>;font-size:13px;">Muted description text with a <span data-dp-color="color_bronze" style="color:<?php echo esc_attr($s['color_bronze']); ?>;text-decoration:underline;">link example</span></p>
                            <div style="display:flex;gap:8px;margin-top:12px;">
                                <div data-dp-bg="color_panel" data-dp-radius="border_radius" style="flex:1;background:<?php echo esc_attr($s['color_panel']); ?>;padding:12px;border-radius:<?php echo absint($s['border_radius']); ?>px;border:1px solid rgba(0,0,0,0.06);">
                                    <span data-dp-color="color_ink" style="font-size:12px;color:<?php echo esc_attr($s['color_ink']); ?>;font-weight:600;">Card</span>
                                </div>
                                <div data-dp-bg="color_bg_soft" data-dp-radius="border_radius" style="flex:1;background:<?php echo esc_attr($s['color_bg_soft']); ?>;padding:12px;border-radius:<?php echo absint($s['border_radius']); ?>px;">
                                    <span data-dp-color="color_muted_2" style="font-size:12px;color:<?php echo esc_attr($s['color_muted_2']); ?>;">Soft section</span>
                                </div>
                            </div>
                            <div style="margin-top:12px;">
                                <span data-dp-bg="color_gold" data-dp-color="color_black" data-dp-radius="border_radius" style="display:inline-block;background:<?php echo esc_attr($s['color_gold']); ?>;color:<?php echo esc_attr($s['color_black']); ?>;padding:6px 16px;border-radius:<?php echo absint($s['border_radius']); ?>px;font-size:12px;font-weight:700;">Button</span>
                                <span data-dp-border="color_gold" data-dp-color="color_ink" data-dp-radius="border_radius" style="display:inline-block;border:1px solid <?php echo esc_attr($s['color_gold']); ?>;color:<?php echo esc_attr($s['color_ink']); ?>;padding:6px 16px;border-radius:<?php echo absint($s['border_radius']); ?>px;font-size:12px;font-weight:700;margin-left:8px;">Secondary</span>
                            </div>
                        </div>
                    </div>
                    <table class="form-table">
                        <?php
                        $light_colors = array(
                            'color_bg'          => __('Page Background', 'dp-starter'),
                            'color_bg_soft'     => __('Soft Background (alternating sections)', 'dp-starter'),
                            'color_panel'       => __('Card / Panel', 'dp-starter'),
                            'color_ink'         => __('Primary Text', 'dp-starter'),
                            'color_black'       => __('Headings', 'dp-starter'),
                            'color_muted'       => __('Muted Text', 'dp-starter'),
                            'color_muted_2'     => __('Secondary Muted', 'dp-starter'),
                            'color_gold'        => __('Accent (buttons, badges, borders)', 'dp-starter'),
                            'color_gold_strong' => __('Accent Hover', 'dp-starter'),
                            'color_bronze'      => __('Links', 'dp-starter'),
                            'color_danger_soft' => __('Alert / Notice Background', 'dp-starter'),
                        );
                        foreach ($light_colors as $key => $label) : ?>
                            <tr><th scope="row"><?php echo esc_html($label); ?></th><td>
                                <input type="text" class="dp-color-picker" name="dp_starter_settings[<?php echo esc_attr($key); ?>]" value="<?php echo esc_attr($s[$key]); ?>" data-default-color="<?php echo esc_attr($defaults[$key]); ?>">
                            </td></tr>
                        <?php endforeach; ?>
                    </table>
                </div>

                <!-- Dark Sections -->
                <div class="dp-admin-section">
                    <h2><?php esc_html_e('Dark Sections', 'dp-starter'); ?></h2>
                    <p class="description"><?php esc_html_e('Used for hero areas, dark cards, carousel, and feature highlights. Also used by header and footer.', 'dp-starter'); ?></p>
                    <div class="dp-color-preview" id="dp-preview-dark" style="margin:16px 0;border-radius:6px;overflow:hidden;">
                        <div data-dp-bg="color_dark_bg" style="background:<?php echo esc_attr($s['color_dark_bg']); ?>;padding:20px;">
                            <p data-dp-color="color_dark_text" style="margin:0 0 4px;color:<?php echo esc_attr($s['color_dark_text']); ?>;font-weight:700;font-size:15px;">Dark Section Title</p>
                            <p data-dp-color="color_dark_text_soft" style="margin:0 0 12px;color:<?php echo esc_attr($s['color_dark_text_soft']); ?>;font-size:13px;">Supporting text in a dark hero or feature section</p>
                            <a href="#" data-dp-color="color_dark_link" style="color:<?php echo esc_attr($s['color_dark_link']); ?>;font-size:13px;text-decoration:none;" onclick="return false;">Link in dark section →</a>
                        </div>
                    </div>
                    <table class="form-table">
                        <?php
                        $dark_colors = array(
                            'color_dark_bg'        => __('Background', 'dp-starter'),
                            'color_dark_text'      => __('Text', 'dp-starter'),
                            'color_dark_text_soft' => __('Muted Text', 'dp-starter'),
                            'color_dark_link'      => __('Links', 'dp-starter'),
                        );
                        foreach ($dark_colors as $key => $label) : ?>
                            <tr><th scope="row"><?php echo esc_html($label); ?></th><td>
                                <input type="text" class="dp-color-picker" name="dp_starter_settings[<?php echo esc_attr($key); ?>]" value="<?php echo esc_attr($s[$key]); ?>" data-default-color="<?php echo esc_attr($defaults[$key]); ?>">
                            </td></tr>
                        <?php endforeach; ?>
                    </table>
                </div>

                <!-- Footer -->
                <div class="dp-admin-section">
                    <h2><?php esc_html_e('Footer', 'dp-starter'); ?></h2>
                    <p class="description"><?php esc_html_e('The footer inherits Dark Section colors. Customize the accent and social icon appearance here.', 'dp-starter'); ?></p>
                    <div class="dp-color-preview" id="dp-preview-footer" style="margin:16px 0;border-radius:6px;overflow:hidden;">
                        <div data-dp-bg="color_dark_bg" data-dp-border-top="color_gold" style="background:<?php echo esc_attr($s['color_dark_bg']); ?>;padding:16px 20px;border-top:2px solid <?php echo esc_attr($s['color_gold']); ?>;">
                            <div style="display:flex;align-items:center;justify-content:space-between;">
                                <div>
                                    <span data-dp-color="color_dark_text" style="color:<?php echo esc_attr($s['color_dark_text']); ?>;font-weight:700;font-size:13px;">Logo</span>
                                    <p data-dp-color="color_dark_text_soft" style="margin:4px 0 0;color:<?php echo esc_attr($s['color_dark_text_soft']); ?>;font-size:11px;">Tagline text</p>
                                </div>
                                <div style="display:flex;gap:8px;">
                                    <span data-dp-color="color_dark_link" style="display:inline-flex;align-items:center;justify-content:center;width:28px;height:28px;background:rgba(255,255,255,0.06);border-radius:50%;color:<?php echo esc_attr($s['color_dark_link']); ?>;font-size:11px;">f</span>
                                    <span data-dp-color="color_dark_link" style="display:inline-flex;align-items:center;justify-content:center;width:28px;height:28px;background:rgba(255,255,255,0.06);border-radius:50%;color:<?php echo esc_attr($s['color_dark_link']); ?>;font-size:11px;">t</span>
                                </div>
                            </div>
                        </div>
                    </div>
                    <p style="color:#666;font-size:13px;font-style:italic;margin:0 0 12px;">
                        <?php esc_html_e('Footer uses the Dark Section colors above. Change those to update the footer appearance.', 'dp-starter'); ?>
                    </p>
                </div>

                <!-- Layout & UI -->
                <div class="dp-admin-section">
                    <h2><?php esc_html_e('Layout & UI', 'dp-starter'); ?></h2>
                    <table class="form-table">
                        <tr><th scope="row"><?php esc_html_e('Border Radius', 'dp-starter'); ?></th><td>
                            <input type="number" name="dp_starter_settings[border_radius]" value="<?php echo esc_attr($s['border_radius']); ?>" min="0" max="50" class="small-text"> px
                            <div style="margin-top:8px;display:flex;gap:8px;align-items:center;">
                                <div style="width:40px;height:28px;background:<?php echo esc_attr($s['color_gold']); ?>;border-radius:<?php echo absint($s['border_radius']); ?>px;"></div>
                                <span style="font-size:12px;color:#666;"><?php esc_html_e('Preview', 'dp-starter'); ?></span>
                            </div>
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
                    <?php
                    $hero_bg_color = $s['home_hero_bg_color'] ?: $s['color_dark_bg'];
                    $hero_text_color = $s['home_hero_text_color'] ?: $s['color_dark_text'];
                    $hero_bg_image_url = $s['home_hero_bg_image_id'] ? wp_get_attachment_image_url($s['home_hero_bg_image_id'], 'large') : '';
                    ?>
                    <div class="dp-color-preview" id="dp-preview-hero" style="margin:16px 0;border-radius:6px;overflow:hidden;">
                        <div data-dp-bg="home_hero_bg_color" style="background:<?php echo esc_attr($hero_bg_color); ?>;<?php echo $hero_bg_image_url ? 'background-image:url(' . esc_url($hero_bg_image_url) . ');background-size:cover;background-position:center;' : ''; ?>padding:32px 24px;position:relative;">
                            <?php if ($hero_bg_image_url) : ?>
                                <div style="position:absolute;inset:0;background:rgba(0,0,0,<?php echo esc_attr($s['home_hero_overlay']); ?>);"></div>
                            <?php endif; ?>
                            <div style="position:relative;z-index:1;">
                                <p style="margin:0 0 4px;font-size:11px;text-transform:uppercase;letter-spacing:0.1em;color:<?php echo esc_attr($s['color_gold']); ?>;">Kicker</p>
                                <h3 data-dp-color="home_hero_text_color" style="margin:0 0 8px;font-size:18px;color:<?php echo esc_attr($hero_text_color); ?>;">Hero Title Text</h3>
                                <p style="margin:0 0 12px;font-size:13px;color:<?php echo esc_attr($s['color_dark_text_soft']); ?>;">Description text goes here</p>
                                <span style="display:inline-block;background:<?php echo esc_attr($s['color_gold']); ?>;color:<?php echo esc_attr($s['color_black']); ?>;padding:6px 16px;border-radius:<?php echo absint($s['border_radius']); ?>px;font-size:12px;font-weight:700;">CTA Button</span>
                            </div>
                        </div>
                    </div>
                    <table class="form-table">
                        <tr><th scope="row"><?php esc_html_e('Background Color', 'dp-starter'); ?></th><td>
                            <input type="text" class="dp-color-picker" name="dp_starter_settings[home_hero_bg_color]" value="<?php echo esc_attr($s['home_hero_bg_color']); ?>" data-default-color="<?php echo esc_attr($s['color_dark_bg']); ?>">
                            <p class="description"><?php esc_html_e('Leave empty to use Dark Section background.', 'dp-starter'); ?></p>
                        </td></tr>
                        <tr><th scope="row"><?php esc_html_e('Background Image', 'dp-starter'); ?></th><td>
                            <input type="hidden" name="dp_starter_settings[home_hero_bg_image_id]" id="dp-hero-bg-id" value="<?php echo esc_attr($s['home_hero_bg_image_id']); ?>">
                            <div id="dp-hero-bg-preview" class="dp-media-preview" <?php echo $hero_bg_image_url ? '' : 'style="display:none"'; ?>>
                                <?php if ($hero_bg_image_url) : ?><img src="<?php echo esc_url($hero_bg_image_url); ?>" alt=""><?php endif; ?>
                            </div>
                            <button type="button" class="button dp-media-upload" data-target="hero-bg"><?php esc_html_e('Select Image', 'dp-starter'); ?></button>
                            <button type="button" class="button dp-media-remove" data-target="hero-bg" <?php echo $s['home_hero_bg_image_id'] ? '' : 'style="display:none"'; ?>><?php esc_html_e('Remove', 'dp-starter'); ?></button>
                        </td></tr>
                        <tr><th scope="row"><?php esc_html_e('Overlay Opacity', 'dp-starter'); ?></th><td>
                            <input type="range" name="dp_starter_settings[home_hero_overlay]" value="<?php echo esc_attr($s['home_hero_overlay']); ?>" min="0" max="1" step="0.05" style="width:200px;vertical-align:middle;">
                            <span style="font-family:monospace;font-size:13px;margin-left:8px;"><?php echo esc_html($s['home_hero_overlay']); ?></span>
                            <p class="description"><?php esc_html_e('Dark overlay on the background image. 0 = transparent, 1 = fully dark.', 'dp-starter'); ?></p>
                        </td></tr>
                        <tr><th scope="row"><?php esc_html_e('Text Color', 'dp-starter'); ?></th><td>
                            <input type="text" class="dp-color-picker" name="dp_starter_settings[home_hero_text_color]" value="<?php echo esc_attr($s['home_hero_text_color']); ?>" data-default-color="<?php echo esc_attr($s['color_dark_text']); ?>">
                            <p class="description"><?php esc_html_e('Leave empty to use Dark Section text color.', 'dp-starter'); ?></p>
                        </td></tr>
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
                        <tr><th scope="row"><?php esc_html_e('Cards', 'dp-starter'); ?></th><td>
                            <div class="dp-repeater" data-name="home_situations_items" data-fields="label,title,description,url">
                                <?php
                                $sit_items = array_filter(explode("\n", $s['home_situations_items']));
                                foreach ($sit_items as $i => $line) :
                                    $parts = explode('|', $line);
                                    $lbl = $parts[0] ?? ''; $ttl = $parts[1] ?? ''; $desc = $parts[2] ?? ''; $url = $parts[3] ?? '';
                                ?>
                                <div class="dp-repeater-card">
                                    <div class="dp-repeater-card-header">
                                        <span class="dp-repeater-drag">&#9776;</span>
                                        <strong class="dp-repeater-card-title"><?php echo esc_html($lbl ?: __('Card', 'dp-starter') . ' ' . ($i + 1)); ?></strong>
                                        <span class="dp-repeater-toggle">&#9660;</span>
                                        <button type="button" class="dp-repeater-remove" title="<?php esc_attr_e('Remove', 'dp-starter'); ?>">&times;</button>
                                    </div>
                                    <div class="dp-repeater-card-body">
                                        <label><?php esc_html_e('Label', 'dp-starter'); ?></label>
                                        <input type="text" data-field="label" value="<?php echo esc_attr($lbl); ?>" class="regular-text">
                                        <label><?php esc_html_e('Title', 'dp-starter'); ?></label>
                                        <input type="text" data-field="title" value="<?php echo esc_attr($ttl); ?>" class="large-text">
                                        <label><?php esc_html_e('Description', 'dp-starter'); ?></label>
                                        <textarea data-field="description" rows="2" class="large-text"><?php echo esc_textarea($desc); ?></textarea>
                                        <label><?php esc_html_e('URL', 'dp-starter'); ?></label>
                                        <input type="text" data-field="url" value="<?php echo esc_attr($url); ?>" class="regular-text">
                                    </div>
                                </div>
                                <?php endforeach; ?>
                            </div>
                            <button type="button" class="button dp-repeater-add" data-target="home_situations_items"><?php esc_html_e('+ Add Card', 'dp-starter'); ?></button>
                            <textarea name="dp_starter_settings[home_situations_items]" class="dp-repeater-store" style="display:none;"><?php echo esc_textarea($s['home_situations_items']); ?></textarea>
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
                        <tr><th scope="row"><?php esc_html_e('Cards', 'dp-starter'); ?></th><td>
                            <div class="dp-repeater" data-name="home_resources_items" data-fields="title,description,url">
                                <?php
                                $res_items = array_filter(explode("\n", $s['home_resources_items']));
                                foreach ($res_items as $i => $line) :
                                    $parts = explode('|', $line);
                                    $ttl = $parts[0] ?? ''; $desc = $parts[1] ?? ''; $url = $parts[2] ?? '';
                                ?>
                                <div class="dp-repeater-card">
                                    <div class="dp-repeater-card-header">
                                        <span class="dp-repeater-drag">&#9776;</span>
                                        <strong class="dp-repeater-card-title"><?php echo esc_html($ttl ?: __('Card', 'dp-starter') . ' ' . ($i + 1)); ?></strong>
                                        <span class="dp-repeater-toggle">&#9660;</span>
                                        <button type="button" class="dp-repeater-remove" title="<?php esc_attr_e('Remove', 'dp-starter'); ?>">&times;</button>
                                    </div>
                                    <div class="dp-repeater-card-body">
                                        <label><?php esc_html_e('Title', 'dp-starter'); ?></label>
                                        <input type="text" data-field="title" value="<?php echo esc_attr($ttl); ?>" class="regular-text">
                                        <label><?php esc_html_e('Description', 'dp-starter'); ?></label>
                                        <textarea data-field="description" rows="2" class="large-text"><?php echo esc_textarea($desc); ?></textarea>
                                        <label><?php esc_html_e('URL', 'dp-starter'); ?></label>
                                        <input type="text" data-field="url" value="<?php echo esc_attr($url); ?>" class="regular-text">
                                    </div>
                                </div>
                                <?php endforeach; ?>
                            </div>
                            <button type="button" class="button dp-repeater-add" data-target="home_resources_items"><?php esc_html_e('+ Add Card', 'dp-starter'); ?></button>
                            <textarea name="dp_starter_settings[home_resources_items]" class="dp-repeater-store" style="display:none;"><?php echo esc_textarea($s['home_resources_items']); ?></textarea>
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
                            <div class="dp-repeater" data-name="home_antiadvice_items" data-fields="text">
                                <?php
                                $aa_items = array_filter(explode("\n", $s['home_antiadvice_items']));
                                foreach ($aa_items as $i => $line) :
                                    $text = trim($line);
                                ?>
                                <div class="dp-repeater-card">
                                    <div class="dp-repeater-card-header">
                                        <span class="dp-repeater-drag">&#9776;</span>
                                        <strong class="dp-repeater-card-title"><?php echo esc_html(mb_strimwidth($text, 0, 60, '...') ?: __('Item', 'dp-starter') . ' ' . ($i + 1)); ?></strong>
                                        <span class="dp-repeater-toggle">&#9660;</span>
                                        <button type="button" class="dp-repeater-remove" title="<?php esc_attr_e('Remove', 'dp-starter'); ?>">&times;</button>
                                    </div>
                                    <div class="dp-repeater-card-body">
                                        <label><?php esc_html_e('Text', 'dp-starter'); ?></label>
                                        <textarea data-field="text" rows="2" class="large-text"><?php echo esc_textarea($text); ?></textarea>
                                    </div>
                                </div>
                                <?php endforeach; ?>
                            </div>
                            <button type="button" class="button dp-repeater-add" data-target="home_antiadvice_items"><?php esc_html_e('+ Add Item', 'dp-starter'); ?></button>
                            <textarea name="dp_starter_settings[home_antiadvice_items]" class="dp-repeater-store" style="display:none;"><?php echo esc_textarea($s['home_antiadvice_items']); ?></textarea>
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
    .dp-sidebar-item.is-active { color: #fff; background: rgba(255,255,255,0.08); border-left-color: #85D1DB; }
    .dp-sidebar-item .dashicons { font-size: 16px; width: 16px; height: 16px; opacity: 0.65; }
    .dp-sidebar-item.is-active .dashicons { opacity: 1; color: #85D1DB; }

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

    /* ── Repeater ── */
    .dp-repeater { display:flex; flex-direction:column; gap:8px; margin-bottom:12px; }
    .dp-repeater-card { background:#fff; border:1px solid #e5e7eb; border-radius:6px; overflow:hidden; transition:box-shadow 150ms,border-color 150ms; }
    .dp-repeater-card:hover { border-color:#c3c4c7; }
    .dp-repeater-card.is-open { border-color:#85D1DB; box-shadow:0 0 0 1px rgba(133,209,219,0.3); }
    .dp-repeater-card-header { display:flex; align-items:center; gap:8px; padding:10px 14px; cursor:pointer; user-select:none; background:#fafbfc; border-bottom:1px solid transparent; transition:background 120ms; }
    .dp-repeater-card.is-open .dp-repeater-card-header { background:#f0fafb; border-bottom-color:#e5e7eb; }
    .dp-repeater-card-header:hover { background:#f0f6f7; }
    .dp-repeater-drag { cursor:grab; color:#9ca3af; font-size:16px; line-height:1; padding:2px 4px; flex-shrink:0; }
    .dp-repeater-drag:hover { color:#4b5563; }
    .dp-repeater-card-title { flex:1; font-size:13px; font-weight:600; color:#1d2327; white-space:nowrap; overflow:hidden; text-overflow:ellipsis; }
    .dp-repeater-toggle { display:inline-flex; align-items:center; justify-content:center; width:20px; height:20px; flex-shrink:0; transition:transform 200ms ease; color:#9ca3af; font-size:14px; }
    .dp-repeater-card.is-open .dp-repeater-toggle { transform:rotate(180deg); color:#374151; }
    .dp-repeater-remove { background:none; border:none; color:#9ca3af; font-size:18px; line-height:1; cursor:pointer; padding:2px 6px; border-radius:4px; flex-shrink:0; transition:all 120ms; }
    .dp-repeater-remove:hover { color:#dc2626; background:#fef2f2; }
    .dp-repeater-card-body { display:none; padding:16px; }
    .dp-repeater-card.is-open .dp-repeater-card-body { display:block; animation:dpFadeIn 150ms ease; }
    .dp-repeater-card-body label { display:block; font-size:12px; font-weight:600; color:#374151; margin:0 0 4px; text-transform:uppercase; letter-spacing:0.03em; }
    .dp-repeater-card-body label:not(:first-child) { margin-top:12px; }
    .dp-repeater-card-body input[type="text"], .dp-repeater-card-body textarea { width:100%; max-width:100%; }
    .dp-repeater-add { align-self:flex-start; margin-top:4px !important; }
    .dp-repeater .ui-sortable-placeholder { visibility:visible !important; background:#f0fafb; border:2px dashed #85D1DB; border-radius:6px; height:48px; margin-bottom:8px; }
    .dp-repeater-card.ui-sortable-helper { box-shadow:0 4px 16px rgba(0,0,0,0.12); transform:rotate(1deg); z-index:100; }

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
        .dp-sidebar-item.is-active { border-left: none; border-bottom-color: #85D1DB; }
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
                $panel.find('.dp-color-picker').wpColorPicker({
                    change: function(event, ui) {
                        // Update the input value immediately so previews can read it.
                        $(this).val(ui.color.toString());
                        dpUpdatePreviews();
                    },
                    clear: function() {
                        dpUpdatePreviews();
                    }
                });
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
        var allColorKeys = <?php echo wp_json_encode(array(
            'color_bg', 'color_bg_soft', 'color_panel', 'color_ink', 'color_black',
            'color_muted', 'color_muted_2', 'color_gold', 'color_gold_strong',
            'color_bronze', 'color_danger_soft',
            'color_dark_bg', 'color_dark_text', 'color_dark_text_soft',
            'color_dark_link', 'color_gold_hover',
        )); ?>;
        var defaultValues = {};
        var allDefaults = <?php echo wp_json_encode($defaults); ?>;
        allColorKeys.forEach(function(k) { if (allDefaults[k]) defaultValues[k] = allDefaults[k]; });
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

        /* ── Repeater fields ── */
        $(document).on('click', '.dp-repeater-card-header', function(e) {
            if ($(e.target).closest('.dp-repeater-remove').length) return;
            $(this).closest('.dp-repeater-card').toggleClass('is-open');
        });

        function dpSyncRepeater($repeater) {
            var fields = $repeater.data('fields').split(',');
            var lines = [];
            $repeater.find('.dp-repeater-card').each(function() {
                var $card = $(this);
                var parts = [];
                $.each(fields, function(_, field) {
                    var val = $card.find('[data-field="' + field + '"]').val() || '';
                    val = val.replace(/\|/g, '&#124;').replace(/\n/g, ' ');
                    parts.push(val);
                });
                lines.push(parts.join('|'));
            });
            $repeater.siblings('.dp-repeater-store').val(lines.join('\n'));
        }

        function dpUpdateCardTitle($card) {
            var $first = $card.find('.dp-repeater-card-body').find('input, textarea').first();
            var val = $first.val();
            val = val ? (val.length > 60 ? val.substring(0, 60) + '...' : val) : 'New card';
            $card.find('.dp-repeater-card-title').text(val);
        }

        $(document).on('input change', '.dp-repeater-card-body input, .dp-repeater-card-body textarea', function() {
            var $card = $(this).closest('.dp-repeater-card');
            dpUpdateCardTitle($card);
            dpSyncRepeater($card.closest('.dp-repeater'));
        });

        $('.dp-repeater-add').on('click', function() {
            var target = $(this).data('target');
            var $repeater = $('.dp-repeater[data-name="' + target + '"]');
            var fields = $repeater.data('fields').split(',');
            var labels = { label:'Label', title:'Title', description:'Description', url:'URL', text:'Text' };
            var html = '<div class="dp-repeater-card is-open"><div class="dp-repeater-card-header"><span class="dp-repeater-drag">&#9776;</span><strong class="dp-repeater-card-title">New card</strong><span class="dp-repeater-toggle">&#9660;</span><button type="button" class="dp-repeater-remove" title="Remove">&times;</button></div><div class="dp-repeater-card-body">';
            $.each(fields, function(_, f) {
                html += '<label>' + (labels[f] || f) + '</label>';
                html += (f === 'description' || f === 'text') ? '<textarea data-field="' + f + '" rows="2" class="large-text"></textarea>' : '<input type="text" data-field="' + f + '" value="" class="' + (f === 'url' || f === 'label' ? 'regular-text' : 'large-text') + '">';
            });
            html += '</div></div>';
            var $new = $(html);
            $repeater.append($new);
            $new.find('input, textarea').first().focus();
            if ($repeater.hasClass('ui-sortable')) $repeater.sortable('refresh');
            dpSyncRepeater($repeater);
        });

        $(document).on('click', '.dp-repeater-remove', function(e) {
            e.stopPropagation();
            var $card = $(this).closest('.dp-repeater-card');
            var $repeater = $card.closest('.dp-repeater');
            if (!confirm('Remove "' + $card.find('.dp-repeater-card-title').text() + '"?')) return;
            $card.slideUp(200, function() { $(this).remove(); dpSyncRepeater($repeater); });
        });

        $('.dp-repeater').sortable({
            handle: '.dp-repeater-drag',
            placeholder: 'ui-sortable-placeholder',
            tolerance: 'pointer',
            opacity: 0.85,
            update: function() { dpSyncRepeater($(this)); }
        });

        $('#dp-settings-form').on('submit', function() {
            $('.dp-repeater').each(function() { dpSyncRepeater($(this)); });
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

        /* ── Live color preview ── */
        function dpGetColor(key) {
            var $input = $('input[name="dp_starter_settings[' + key + ']"]');
            return $input.length ? $input.val() : '';
        }

        function dpUpdatePreviews() {
            // Update all elements with data-dp-* attributes
            $('[data-dp-bg]').each(function() {
                $(this).css('background-color', dpGetColor($(this).data('dp-bg')));
            });
            $('[data-dp-color]').each(function() {
                $(this).css('color', dpGetColor($(this).data('dp-color')));
            });
            $('[data-dp-border]').each(function() {
                $(this).css('border-color', dpGetColor($(this).data('dp-border')));
            });
            $('[data-dp-border-bottom]').each(function() {
                $(this).css('border-bottom-color', dpGetColor($(this).data('dp-border-bottom')));
            });
            $('[data-dp-border-top]').each(function() {
                $(this).css('border-top-color', dpGetColor($(this).data('dp-border-top')));
            });
            $('[data-dp-radius]').each(function() {
                var r = dpGetColor($(this).data('dp-radius'));
                $(this).css('border-radius', (parseInt(r, 10) || 0) + 'px');
            });
        }

        // Hook into wpColorPicker change event
        $(document).on('input change', '.dp-color-picker, input[name="dp_starter_settings[border_radius]"]', function() {
            dpUpdatePreviews();
        });

        // wpColorPicker triggers irischange on the hidden input
        $(document).on('irischange', '.dp-color-picker', function() {
            dpUpdatePreviews();
        });
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

/**
 * Convert hex color to RGB components string.
 *
 * @param string $hex Hex color (e.g. '#85D1DB').
 * @return string RGB components (e.g. '133, 209, 219').
 */
function dp_starter_hex_to_rgb($hex)
{
    $hex = ltrim($hex, '#');
    if (strlen($hex) === 3) {
        $hex = $hex[0] . $hex[0] . $hex[1] . $hex[1] . $hex[2] . $hex[2];
    }
    $r = hexdec(substr($hex, 0, 2));
    $g = hexdec(substr($hex, 2, 2));
    $b = hexdec(substr($hex, 4, 2));
    return "{$r}, {$g}, {$b}";
}

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
        // RGB versions for opacity variants.
        '--dp-gold-rgb'        => dp_starter_hex_to_rgb($s['color_gold']),
        '--dp-gold-strong-rgb' => dp_starter_hex_to_rgb($s['color_gold_strong']),
        '--dp-white-rgb'       => '255, 255, 255',
        '--dp-black-rgb'       => dp_starter_hex_to_rgb($s['color_black']),
        '--dp-dark-bg-rgb'     => dp_starter_hex_to_rgb($s['color_dark_bg']),
        '--dp-ink-rgb'         => dp_starter_hex_to_rgb($s['color_ink']),
        '--dp-shadow-rgb'      => '0, 0, 0',
        '--dp-error'           => '#c0392b',
        '--dp-error-rgb'       => '192, 57, 43',
        // Layout.
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
