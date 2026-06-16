<?php
/**
 * Theme footer.
 *
 * @package DP_Starter
 */

if (!defined('ABSPATH')) {
    exit;
}

$footer_menu_setting = (int) dp_starter_get_setting('footer_menu');
$footer_copyright    = dp_starter_get_setting('footer_copyright');
$cta_url             = dp_starter_get_setting('cta_url');
$cta_text            = dp_starter_get_setting('cta_text');

// Social links.
$social_links = array();
$social_map   = array(
    'footer_social_facebook'  => array('label' => 'Facebook',  'icon' => '<path d="M18 2h-3a5 5 0 0 0-5 5v3H7v4h3v8h4v-8h3l1-4h-4V7a1 1 0 0 1 1-1h3z"/>'),
    'footer_social_instagram' => array('label' => 'Instagram', 'icon' => '<rect width="20" height="20" x="2" y="2" rx="5" ry="5"/><path d="M16 11.37A4 4 0 1 1 12.63 8 4 4 0 0 1 16 11.37z"/><line x1="17.5" y1="6.5" x2="17.51" y2="6.5"/>'),
    'footer_social_linkedin'  => array('label' => 'LinkedIn',  'icon' => '<path d="M16 8a6 6 0 0 1 6 6v7h-4v-7a2 2 0 0 0-2-2 2 2 0 0 0-2 2v7h-4v-7a6 6 0 0 1 6-6z"/><rect width="4" height="12" x="2" y="9"/><circle cx="4" cy="4" r="2"/>'),
    'footer_social_x'         => array('label' => 'X',         'icon' => '<path d="M4 4l6.5 8L4 20h2l5.5-6.8L16 20h4l-6.8-8.4L20 4h-2l-5.2 6.4L8 4H4z"/>'),
    'footer_social_youtube'   => array('label' => 'YouTube',   'icon' => '<path d="M22.54 6.42a2.78 2.78 0 0 0-1.94-2C18.88 4 12 4 12 4s-6.88 0-8.6.46a2.78 2.78 0 0 0-1.94 2A29 29 0 0 0 1 12a29 29 0 0 0 .46 5.58A2.78 2.78 0 0 0 3.4 19.6C5.12 20 12 20 12 20s6.88 0 8.6-.46a2.78 2.78 0 0 0 1.94-2A29 29 0 0 0 23 12a29 29 0 0 0-.46-5.58z"/><polygon points="9.75 15.02 15.5 12 9.75 8.98 9.75 15.02"/>'),
    'footer_social_tiktok'    => array('label' => 'TikTok',    'icon' => '<path d="M9 12a4 4 0 1 0 4 4V4a5 5 0 0 0 5 5"/>'),
);
foreach ($social_map as $key => $data) {
    $url = trim(dp_starter_get_setting($key));
    if ($url) {
        $social_links[] = array('url' => $url, 'label' => $data['label'], 'icon' => $data['icon']);
    }
}
?>
    </main>

    <footer class="dp-site-footer">
        <div class="dp-shell dp-footer-grid">
            <div class="dp-footer-brand">
                <a href="<?php echo esc_url(home_url('/')); ?>" aria-label="<?php esc_attr_e('Home', 'dp-starter'); ?>">
                    <img class="dp-footer-logo" src="<?php echo esc_url(dp_starter_get_logo_url()); ?>" alt="<?php echo esc_attr(get_bloginfo('name')); ?>">
                </a>
                <?php $tagline = dp_starter_get_setting('footer_tagline'); ?>
                <?php if ($tagline) : ?>
                    <p><?php echo esc_html($tagline); ?></p>
                <?php endif; ?>

                <?php if (!empty($social_links)) : ?>
                    <div class="dp-footer-social">
                        <?php foreach ($social_links as $social) : ?>
                            <a href="<?php echo esc_url($social['url']); ?>" target="_blank" rel="noopener noreferrer" aria-label="<?php echo esc_attr($social['label']); ?>">
                                <svg width="20" height="20" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><?php echo $social['icon']; ?></svg>
                            </a>
                        <?php endforeach; ?>
                    </div>
                <?php endif; ?>
            </div>

            <?php if ($footer_menu_setting !== -1) : ?>
                <nav class="dp-footer-nav" aria-label="<?php esc_attr_e('Footer navigation', 'dp-starter'); ?>">
                    <?php
                    if ($footer_menu_setting > 0) {
                        // Specific menu selected in settings.
                        wp_nav_menu(array(
                            'menu'       => $footer_menu_setting,
                            'container'  => false,
                            'menu_class' => 'dp-footer-menu',
                            'depth'      => 1,
                            'fallback_cb' => false,
                        ));
                    } elseif (has_nav_menu('footer')) {
                        // Use footer menu location.
                        wp_nav_menu(array(
                            'theme_location' => 'footer',
                            'container'      => false,
                            'menu_class'     => 'dp-footer-menu',
                            'depth'          => 1,
                        ));
                    }
                    ?>
                </nav>
            <?php endif; ?>

            <?php if ($cta_url && $cta_text) : ?>
                <a class="dp-button dp-button-primary dp-footer-cta" href="<?php echo esc_url($cta_url); ?>">
                    <?php echo esc_html($cta_text); ?>
                </a>
            <?php endif; ?>
        </div>

        <?php if ($footer_copyright) : ?>
            <div class="dp-footer-bottom">
                <div class="dp-shell">
                    <p><?php echo esc_html(str_replace('{year}', date('Y'), $footer_copyright)); ?></p>
                </div>
            </div>
        <?php endif; ?>
    </footer>
</div>
<?php wp_footer(); ?>
</body>
</html>
