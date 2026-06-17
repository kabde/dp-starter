<?php
/**
 * Theme header.
 *
 * @package DP_Starter
 */

if (!defined('ABSPATH')) {
    exit;
}
?>
<!doctype html>
<html <?php language_attributes(); ?>>
<head>
    <meta charset="<?php bloginfo('charset'); ?>">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <?php wp_head(); ?>
</head>
<body <?php body_class(); ?>>
<?php wp_body_open(); ?>
<div class="dp-site">
    <a class="screen-reader-text" href="#content"><?php esc_html_e('Skip to content', 'dp-starter'); ?></a>

    <header class="dp-site-header" data-dp-header>
        <a class="dp-brand" href="<?php echo esc_url(home_url('/')); ?>" aria-label="<?php esc_attr_e('Home', 'dp-starter'); ?>">
            <img class="dp-brand-logo" src="<?php echo esc_url(dp_starter_get_logo_url()); ?>" alt="<?php echo esc_attr(get_bloginfo('name')); ?>">
        </a>

        <?php if (has_nav_menu('primary')) : ?>
            <nav class="dp-desktop-nav" aria-label="<?php esc_attr_e('Primary navigation', 'dp-starter'); ?>">
                <?php
                wp_nav_menu(
                    array(
                        'theme_location' => 'primary',
                        'container'      => false,
                        'menu_class'     => 'dp-menu',
                        'depth'          => 1,
                    )
                );
                ?>
            </nav>
        <?php else : ?>
            <nav class="dp-desktop-nav">
                <?php dp_starter_fallback_menu('dp-menu'); ?>
            </nav>
            <a class="dp-header-cta" href="<?php echo esc_url(dp_starter_get_setting('cta_url') ?: home_url('/start-here/')); ?>">
                <?php echo esc_html(dp_starter_get_setting('cta_text') ?: __('Start Here', 'dp-starter')); ?>
            </a>
        <?php endif; ?>

        <button class="dp-menu-toggle" type="button" aria-expanded="false" data-dp-menu-toggle>
            <span></span>
            <span></span>
            <span></span>
            <span class="screen-reader-text"><?php esc_html_e('Menu', 'dp-starter'); ?></span>
        </button>
    </header>

    <!-- Mobile nav overlay — outside header -->
    <div class="dp-mobile-nav" id="dp-mobile-nav" data-dp-nav>
        <div class="dp-mobile-nav-header">
            <a class="dp-brand" href="<?php echo esc_url(home_url('/')); ?>">
                <img class="dp-brand-logo" src="<?php echo esc_url(dp_starter_get_logo_url()); ?>" alt="<?php echo esc_attr(get_bloginfo('name')); ?>">
            </a>
            <button class="dp-mobile-close" type="button" data-dp-menu-close aria-label="<?php esc_attr_e('Close menu', 'dp-starter'); ?>">
                <svg width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round"><line x1="18" y1="6" x2="6" y2="18"/><line x1="6" y1="6" x2="18" y2="18"/></svg>
            </button>
        </div>
        <?php
        if (has_nav_menu('primary')) {
            wp_nav_menu(
                array(
                    'theme_location' => 'primary',
                    'container'      => false,
                    'menu_class'     => 'dp-mobile-menu',
                    'depth'          => 1,
                )
            );
        } else {
            dp_starter_fallback_menu('dp-mobile-menu');
        }
        ?>
    </div>

    <main id="content" class="dp-main">
