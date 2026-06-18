<?php
/**
 * 404 template.
 *
 * @package DP Starter_Resource
 */

if (!defined('ABSPATH')) {
    exit;
}

get_header();
?>

<section class="dp-error-page dp-section" aria-labelledby="dp-error-title">
    <div class="dp-shell dp-error-grid">
        <div>
            <p class="dp-kicker"><?php esc_html_e('Page not found', 'dp-starter'); ?></p>
            <h1 id="dp-error-title"><?php esc_html_e('This resource is not here anymore.', 'dp-starter'); ?></h1>
            <p class="dp-lede">
                <?php esc_html_e('Use the links below or search the site to find the practical guide you need.', 'dp-starter'); ?>
            </p>
            <div class="dp-error-actions">
                <a class="dp-button dp-button-primary" href="<?php echo esc_url(home_url('/start-here/')); ?>"><?php esc_html_e('Start Here', 'dp-starter'); ?></a>
                <a class="dp-button dp-button-secondary" href="<?php echo esc_url(home_url('/blog/')); ?>"><?php esc_html_e('Browse Guides', 'dp-starter'); ?></a>
            </div>
        </div>

        <div class="dp-error-panel">
            <?php get_search_form(); ?>
            <div class="dp-error-links">
                <a href="<?php echo esc_url(home_url('/tools/')); ?>"><?php esc_html_e('Tools', 'dp-starter'); ?></a>
                <a href="<?php echo esc_url(home_url('/books/')); ?>"><?php esc_html_e('Books', 'dp-starter'); ?></a>
            </div>
        </div>
    </div>
</section>

<?php
get_footer();
