<?php
/**
 * Sidebar: blog categories navigation.
 *
 * @package DP Starter_Resource
 */

if (!defined('ABSPATH')) {
    exit;
}

// Funnel-ordered category slugs.
$funnel_order = array(
    'offer-positioning',
    'prospecting',
    'sales-closing',
    'client-retention',
    'what-not-to-do',
    'ai-prompts-and-skills',
);

$all_sidebar  = get_categories(array(
    'parent'     => 0,
    'hide_empty' => false,
    'exclude'    => array(get_cat_ID('uncategorized')),
));
$by_slug = array();
foreach ($all_sidebar as $c) {
    $by_slug[$c->slug] = $c;
}
$sidebar_cats = array();
foreach ($funnel_order as $slug) {
    if (isset($by_slug[$slug])) {
        $sidebar_cats[] = $by_slug[$slug];
        unset($by_slug[$slug]);
    }
}
foreach ($by_slug as $c) {
    $sidebar_cats[] = $c;
}
$current_cats  = is_single() ? wp_get_post_categories(get_the_ID()) : array();
$queried       = get_queried_object();
$current_term  = (is_category() && $queried) ? (int) $queried->term_id : 0;
?>
<aside class="dp-sidebar" aria-label="<?php esc_attr_e('Blog categories', 'dp-starter'); ?>">
    <div class="dp-sidebar-header">
        <p class="dp-kicker"><?php esc_html_e('Browse by topic', 'dp-starter'); ?></p>
    </div>
    <nav class="dp-sidebar-nav">
        <?php foreach ($sidebar_cats as $cat) :
            $children = get_categories(array(
                'parent'     => $cat->term_id,
                'hide_empty' => true,
                'orderby'    => 'name',
                'order'      => 'ASC',
            ));
            $is_active     = in_array($cat->term_id, $current_cats, true) || $current_term === $cat->term_id;
            $is_ancestor   = $current_term && term_is_ancestor_of($cat->term_id, $current_term, 'category');
            $has_children  = !empty($children);
            $open          = $is_active || $is_ancestor;

            // Count including children
            $total = (int) $cat->count;
            foreach ($children as $child) {
                $total += (int) $child->count;
            }
        ?>
            <div class="dp-sidebar-group<?php echo ($is_active || $is_ancestor) ? ' is-active' : ''; ?>">
                <a class="dp-sidebar-link" href="<?php echo esc_url(get_category_link($cat)); ?>"<?php echo $is_active ? ' aria-current="page"' : ''; ?>>
                    <span class="dp-sidebar-link-name"><?php echo esc_html($cat->name); ?></span>
                    <?php if ($total > 0) : ?>
                        <span class="dp-sidebar-link-count"><?php echo (int) $total; ?></span>
                    <?php endif; ?>
                </a>
                <?php if ($has_children) : ?>
                    <ul class="dp-sidebar-children<?php echo $open ? ' is-open' : ''; ?>">
                        <?php foreach ($children as $child) :
                            $child_active = in_array($child->term_id, $current_cats, true) || $current_term === $child->term_id;
                        ?>
                            <li>
                                <a href="<?php echo esc_url(get_category_link($child)); ?>"<?php echo $child_active ? ' aria-current="page"' : ''; ?>>
                                    <span><?php echo esc_html($child->name); ?></span>
                                    <?php if ($child->count > 0) : ?>
                                        <span class="dp-sidebar-link-count"><?php echo (int) $child->count; ?></span>
                                    <?php endif; ?>
                                </a>
                            </li>
                        <?php endforeach; ?>
                    </ul>
                <?php endif; ?>
            </div>
        <?php endforeach; ?>
    </nav>
</aside>
