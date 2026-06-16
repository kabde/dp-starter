<?php
/**
 * Page content wrapper.
 *
 * @package DP Starter_Resource
 */

if (!defined('ABSPATH')) {
    exit;
}
?>

<div class="dp-entry-content dp-page-content">
    <?php
    the_content();

    wp_link_pages(
        array(
            'before' => '<div class="dp-page-links">' . esc_html__('Pages:', 'dp-starter'),
            'after'  => '</div>',
        )
    );
    ?>
</div>

<?php
edit_post_link(
    esc_html__('Edit page', 'dp-starter'),
    '<p class="dp-edit-link">',
    '</p>'
);
