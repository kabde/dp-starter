<?php
/**
 * DP Starter widget areas and custom widgets.
 *
 * @package DP_Starter
 */

if (!defined('ABSPATH')) {
    exit;
}

/**
 * Register widget areas (sidebars).
 */
function dp_starter_register_sidebars()
{
    $shared = array(
        'before_widget' => '<div id="%1$s" class="dp-widget %2$s">',
        'after_widget'  => '</div>',
        'before_title'  => '<p class="dp-kicker">',
        'after_title'   => '</p>',
    );

    register_sidebar(array_merge($shared, array(
        'name'        => __('Blog Sidebar', 'dp-starter'),
        'id'          => 'dp-sidebar-blog',
        'description' => __('Appears on blog posts and archives.', 'dp-starter'),
    )));

    register_sidebar(array_merge($shared, array(
        'name'        => __('Book Sidebar', 'dp-starter'),
        'id'          => 'dp-sidebar-book',
        'description' => __('Appears on book pages.', 'dp-starter'),
    )));

    register_sidebar(array_merge($shared, array(
        'name'        => __('Page Sidebar', 'dp-starter'),
        'id'          => 'dp-sidebar-page',
        'description' => __('Appears on static pages (if the page layout includes a sidebar).', 'dp-starter'),
    )));
}
add_action('widgets_init', 'dp_starter_register_sidebars');

/**
 * Custom widget: DP Categories — replicates the theme's category sidebar design.
 */
class DP_Starter_Categories_Widget extends WP_Widget
{
    public function __construct()
    {
        parent::__construct(
            'dp_starter_categories',
            __('DP Starter — Categories', 'dp-starter'),
            array('description' => __('Displays blog categories with counts, using the theme sidebar design.', 'dp-starter'))
        );
    }

    public function widget($args, $instance)
    {
        $title     = !empty($instance['title']) ? $instance['title'] : __('Browse by topic', 'dp-starter');
        $max_cats  = !empty($instance['max_cats']) ? (int) $instance['max_cats'] : 0;
        $show_children = !empty($instance['show_children']);

        $all_cats = get_categories(array(
            'parent'     => 0,
            'hide_empty' => true,
            'exclude'    => array(get_cat_ID('uncategorized')),
        ));

        // Sort by post count (most active first).
        $categories = array();
        foreach ($all_cats as $cat) {
            $children = get_categories(array('child_of' => $cat->term_id, 'hide_empty' => true));
            $total    = (int) $cat->count;
            foreach ($children as $child) {
                $total += (int) $child->count;
            }
            $cat->total_count = $total;
            $categories[]     = $cat;
        }
        usort($categories, function ($a, $b) {
            return $b->total_count - $a->total_count;
        });

        if ($max_cats > 0) {
            $categories = array_slice($categories, 0, $max_cats);
        }

        if (empty($categories)) {
            return;
        }

        $current_cats = is_single() ? wp_get_post_categories(get_the_ID()) : array();
        $queried      = get_queried_object();
        $current_term = (is_category() && $queried) ? (int) $queried->term_id : 0;

        echo $args['before_widget'];
        ?>
        <aside class="dp-sidebar" aria-label="<?php echo esc_attr($title); ?>">
            <div class="dp-sidebar-header">
                <?php echo $args['before_title'] . esc_html($title) . $args['after_title']; ?>
            </div>
            <nav class="dp-sidebar-nav">
                <?php foreach ($categories as $cat) :
                    $children     = $show_children ? get_categories(array('parent' => $cat->term_id, 'hide_empty' => true, 'orderby' => 'name', 'order' => 'ASC')) : array();
                    $is_active    = in_array($cat->term_id, $current_cats, true) || $current_term === $cat->term_id;
                    $is_ancestor  = $current_term && term_is_ancestor_of($cat->term_id, $current_term, 'category');
                    $has_children = !empty($children);
                    $open         = $is_active || $is_ancestor;
                ?>
                    <div class="dp-sidebar-group<?php echo ($is_active || $is_ancestor) ? ' is-active' : ''; ?>">
                        <a class="dp-sidebar-link" href="<?php echo esc_url(get_category_link($cat)); ?>"<?php echo $is_active ? ' aria-current="page"' : ''; ?>>
                            <span class="dp-sidebar-link-name"><?php echo esc_html($cat->name); ?></span>
                            <?php if ($cat->total_count > 0) : ?>
                                <span class="dp-sidebar-link-count"><?php echo (int) $cat->total_count; ?></span>
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
        <?php
        echo $args['after_widget'];
    }

    public function form($instance)
    {
        $title         = !empty($instance['title']) ? $instance['title'] : __('Browse by topic', 'dp-starter');
        $max_cats      = !empty($instance['max_cats']) ? (int) $instance['max_cats'] : 0;
        $show_children = !empty($instance['show_children']);
        ?>
        <p>
            <label for="<?php echo esc_attr($this->get_field_id('title')); ?>"><?php esc_html_e('Title:', 'dp-starter'); ?></label>
            <input class="widefat" id="<?php echo esc_attr($this->get_field_id('title')); ?>" name="<?php echo esc_attr($this->get_field_name('title')); ?>" type="text" value="<?php echo esc_attr($title); ?>">
        </p>
        <p>
            <label for="<?php echo esc_attr($this->get_field_id('max_cats')); ?>"><?php esc_html_e('Max categories (0 = all):', 'dp-starter'); ?></label>
            <input class="tiny-text" id="<?php echo esc_attr($this->get_field_id('max_cats')); ?>" name="<?php echo esc_attr($this->get_field_name('max_cats')); ?>" type="number" min="0" value="<?php echo esc_attr($max_cats); ?>">
        </p>
        <p>
            <input type="checkbox" id="<?php echo esc_attr($this->get_field_id('show_children')); ?>" name="<?php echo esc_attr($this->get_field_name('show_children')); ?>" value="1" <?php checked($show_children); ?>>
            <label for="<?php echo esc_attr($this->get_field_id('show_children')); ?>"><?php esc_html_e('Show subcategories', 'dp-starter'); ?></label>
        </p>
        <?php
    }

    public function update($new_instance, $old_instance)
    {
        $instance = array();
        $instance['title']         = sanitize_text_field($new_instance['title'] ?? '');
        $instance['max_cats']      = absint($new_instance['max_cats'] ?? 0);
        $instance['show_children'] = !empty($new_instance['show_children']);
        return $instance;
    }
}

/**
 * Register custom widgets.
 */
function dp_starter_register_widgets()
{
    register_widget('DP_Starter_Categories_Widget');
}
add_action('widgets_init', 'dp_starter_register_widgets');

/**
 * Render a sidebar area if it has widgets. Returns true if rendered.
 *
 * @param string $sidebar_id Widget area ID.
 * @return bool
 */
function dp_starter_render_sidebar($sidebar_id)
{
    if (!is_active_sidebar($sidebar_id)) {
        return false;
    }

    echo '<aside class="dp-sidebar" aria-label="' . esc_attr__('Sidebar', 'dp-starter') . '">';
    dynamic_sidebar($sidebar_id);
    echo '</aside>';
    return true;
}
