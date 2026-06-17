<?php
/**
 * Tools landing page.
 *
 * @package DP Starter_Resource
 */

if (!defined('ABSPATH')) {
    exit;
}

get_header();

while (have_posts()) :
    the_post();

    $paged = max(1, absint(get_query_var('paged')), absint(get_query_var('page')));

    $tools_query = new WP_Query(
        array(
            'post_type'      => 'tool',
            'post_status'    => 'publish',
            'posts_per_page' => 24,
            'paged'          => $paged,
            'orderby'        => array(
                'menu_order' => 'ASC',
                'title'      => 'ASC',
            ),
        )
    );

    $workflows = get_terms(
        array(
            'taxonomy'   => 'tool_workflow',
            'hide_empty' => true,
            'orderby'    => 'name',
            'order'      => 'ASC',
        )
    );

    $page_kicker = trim((string) get_post_meta(get_the_ID(), 'dp_page_kicker', true));
    $page_title  = dp_starter_page_display_title(get_the_ID());
    $page_desc   = has_excerpt() ? get_the_excerpt() : trim(wp_strip_all_tags(get_the_content()));
    ?>

    <article <?php post_class('dp-page dp-tools-page'); ?>>
        <header class="dp-page-hero dp-section">
            <div class="dp-shell dp-page-hero-grid">
                <div>
                    <?php if ($page_kicker) : ?>
                        <p class="dp-kicker"><?php echo esc_html($page_kicker); ?></p>
                    <?php endif; ?>
                    <h1><?php echo esc_html($page_title); ?></h1>
                    <?php if ($page_desc) : ?>
                        <p class="dp-lede"><?php echo esc_html($page_desc); ?></p>
                    <?php else : ?>
                        <p class="dp-lede">
                            <?php esc_html_e('Compare practical tools for building, selling, delivering, and automating your digital products without building a bloated tech stack.', 'dp-starter'); ?>
                        </p>
                    <?php endif; ?>
                </div>

                <div class="dp-tools-hero-panel">
                    <span><?php echo esc_html((string) $tools_query->found_posts); ?></span>
                    <small><?php esc_html_e('tools with expert notes', 'dp-starter'); ?></small>
                </div>
            </div>
        </header>

        <section class="dp-section dp-section-soft">
            <div class="dp-shell">
                <div class="dp-section-heading">
                    <p class="dp-kicker"><?php esc_html_e('Start with the workflow', 'dp-starter'); ?></p>
                    <h2><?php esc_html_e('Before you buy another tool, ask what part of your workflow it supports.', 'dp-starter'); ?></h2>
                </div>

                <?php if (!empty($workflows) && !is_wp_error($workflows)) : ?>
                    <div class="dp-tool-workflow-grid">
                        <?php foreach ($workflows as $workflow) : ?>
                            <a class="dp-tool-workflow-card" href="<?php echo esc_url(get_term_link($workflow)); ?>">
                                <span><?php echo esc_html((string) $workflow->count); ?></span>
                                <strong><?php echo esc_html($workflow->name); ?></strong>
                            </a>
                        <?php endforeach; ?>
                    </div>
                <?php endif; ?>
            </div>
        </section>

        <section class="dp-section">
            <div class="dp-shell">
                <div class="dp-section-heading dp-section-heading-row">
                    <div>
                        <p class="dp-kicker"><?php esc_html_e('Tool library', 'dp-starter'); ?></p>
                        <h2><?php esc_html_e('Tools reviewed through a practical business lens.', 'dp-starter'); ?></h2>
                    </div>
                </div>

                <?php if ($tools_query->have_posts()) : ?>
                    <div class="dp-tools-grid">
                        <?php
                        while ($tools_query->have_posts()) :
                            $tools_query->the_post();
                            get_template_part('template-parts/card-tool');
                        endwhile;
                        wp_reset_postdata();
                        ?>
                    </div>

                    <?php if ($tools_query->max_num_pages > 1) : ?>
                        <nav class="dp-pagination" aria-label="<?php esc_attr_e('Tools navigation', 'dp-starter'); ?>">
                            <div class="nav-links">
                                <?php
                                echo wp_kses_post(
                                    paginate_links(
                                        array(
                                            'base'      => trailingslashit(get_permalink()) . '%_%',
                                            'format'    => '%#%/',
                                            'current'   => $paged,
                                            'total'     => $tools_query->max_num_pages,
                                            'mid_size'  => 1,
                                            'prev_text' => __('&laquo; Previous', 'dp-starter'),
                                            'next_text' => __('Next &raquo;', 'dp-starter'),
                                        )
                                    )
                                );
                                ?>
                            </div>
                        </nav>
                    <?php endif; ?>
                <?php else : ?>
                    <div class="dp-empty-state">
                        <?php esc_html_e('No tool notes are published yet.', 'dp-starter'); ?>
                    </div>
                <?php endif; ?>
            </div>
        </section>

        <section class="dp-section dp-section-dark">
            <div class="dp-shell dp-dark-editorial">
                <div>
                    <p class="dp-kicker"><?php esc_html_e('Our principle', 'dp-starter'); ?></p>
                    <h2><?php esc_html_e('Tools support the system. They do not replace it.', 'dp-starter'); ?></h2>
                    <p class="dp-lede">
                        <?php esc_html_e('A bigger tech stack will not fix an unclear offer, random outreach, or inconsistent follow-up. Start with your core workflow, then choose the smallest tools that help you execute it.', 'dp-starter'); ?>
                    </p>
                </div>
                <div class="dp-avoid-list">
                    <div class="dp-avoid-item"><span></span><p><?php esc_html_e('Do not buy a funnel before your offer is clear.', 'dp-starter'); ?></p></div>
                    <div class="dp-avoid-item"><span></span><p><?php esc_html_e('Do not automate a follow-up process you have not tested manually.', 'dp-starter'); ?></p></div>
                    <div class="dp-avoid-item"><span></span><p><?php esc_html_e('Do not polish content that does not create useful conversations.', 'dp-starter'); ?></p></div>
                </div>
            </div>
        </section>
    </article>

    <?php
endwhile;

get_footer();
