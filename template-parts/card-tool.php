<?php
/**
 * Reusable tool card.
 *
 * @package DP Starter_Resource
 */

if (!defined('ABSPATH')) {
    exit;
}

$tool_id   = get_the_ID();
$logo_url  = get_post_meta($tool_id, 'dp_tool_logo_url', true);
$verdict   = get_post_meta($tool_id, 'dp_tool_one_line_verdict', true);
$best_for  = get_post_meta($tool_id, 'dp_tool_best_for', true);
$summary   = $verdict ? $verdict : ($best_for ? $best_for : get_the_excerpt());
$workflows = get_the_terms($tool_id, 'tool_workflow');
$stages    = get_the_terms($tool_id, 'tool_stage');
?>

<article <?php post_class('dp-card dp-tool-card'); ?>>
    <a class="dp-card-link" href="<?php the_permalink(); ?>">
        <div class="dp-tool-card-media">
            <?php if (has_post_thumbnail()) : ?>
                <?php the_post_thumbnail('dp-starter-square'); ?>
            <?php elseif ($logo_url) : ?>
                <img src="<?php echo esc_url($logo_url); ?>" alt="<?php echo esc_attr(get_the_title()); ?>">
            <?php else : ?>
                <div class="dp-tool-logo-placeholder">
                    <span><?php echo esc_html(substr(get_the_title(), 0, 1)); ?></span>
                </div>
            <?php endif; ?>
        </div>

        <div class="dp-card-body">
            <?php if (!empty($workflows) && !is_wp_error($workflows)) : ?>
                <span class="dp-pill"><?php echo esc_html($workflows[0]->name); ?></span>
            <?php else : ?>
                <span class="dp-pill"><?php esc_html_e('Tool', 'dp-starter'); ?></span>
            <?php endif; ?>

            <h2><?php the_title(); ?></h2>

            <?php if (!empty($stages) && !is_wp_error($stages)) : ?>
                <p class="dp-tool-card-stage"><?php echo esc_html($stages[0]->name); ?></p>
            <?php endif; ?>

            <?php if ($summary) : ?>
                <p><?php echo esc_html(dp_starter_trim_words($summary, 28)); ?></p>
            <?php endif; ?>

            <span class="dp-text-link"><?php esc_html_e('Read the expert take', 'dp-starter'); ?></span>
        </div>
    </a>
</article>
