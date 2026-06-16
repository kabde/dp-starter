<?php
/**
 * Reusable post card.
 *
 * @package DP Starter_Resource
 */

if (!defined('ABSPATH')) {
    exit;
}

$card_class = !empty($args['class']) ? ' ' . sanitize_html_class($args['class']) : '';
$show_thumb = !isset($args['show_thumbnail']) || (bool) $args['show_thumbnail'];
?>

<article <?php post_class('dp-card dp-article-card' . $card_class); ?>>
    <a class="dp-card-link" href="<?php the_permalink(); ?>">
        <?php if ($show_thumb) : ?>
            <div class="dp-card-thumb">
                <?php if (has_post_thumbnail()) : ?>
                    <?php the_post_thumbnail('dp-starter-card'); ?>
                <?php else : ?>
                    <img src="<?php echo esc_url(dp_starter_asset_image('how-it-works.png')); ?>" alt="<?php esc_attr_e('DP Starter guide preview.', 'dp-starter'); ?>">
                <?php endif; ?>
            </div>
        <?php endif; ?>

        <div class="dp-card-body">
            <span class="dp-pill"><?php echo esc_html(dp_starter_primary_category_name(get_the_ID())); ?></span>
            <h3><?php the_title(); ?></h3>
            <p><?php echo esc_html(dp_starter_trim_words(get_the_excerpt(), 22)); ?></p>
            <div class="dp-meta">
                <span><?php echo esc_html(get_the_date()); ?></span>
                <span><?php echo esc_html(dp_starter_reading_time(get_the_ID())); ?></span>
            </div>
        </div>
    </a>
</article>
