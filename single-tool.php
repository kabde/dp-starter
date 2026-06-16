<?php
/**
 * Single tool template.
 *
 * @package DP Starter_Resource
 */

if (!defined('ABSPATH')) {
    exit;
}

get_header();

while (have_posts()) :
    the_post();

    $tool_id     = get_the_ID();
    $website_url = get_post_meta($tool_id, 'dp_tool_website_url', true);
    $logo_url    = get_post_meta($tool_id, 'dp_tool_logo_url', true);
    $verdict     = get_post_meta($tool_id, 'dp_tool_one_line_verdict', true);
    $best_for    = get_post_meta($tool_id, 'dp_tool_best_for', true);
    $not_for     = get_post_meta($tool_id, 'dp_tool_not_for', true);
    $when_use    = get_post_meta($tool_id, 'dp_tool_when_to_use', true);
    $when_not    = get_post_meta($tool_id, 'dp_tool_when_not_to_use', true);
    $take        = get_post_meta($tool_id, 'dp_tool_expert_take', true);
    $setup       = get_post_meta($tool_id, 'dp_tool_simple_setup', true);
    $loop_fit    = get_post_meta($tool_id, 'dp_tool_loop_fit', true);
    $mistake     = get_post_meta($tool_id, 'dp_tool_common_mistake', true);
    $alternative = get_post_meta($tool_id, 'dp_tool_simpler_alternative', true);
    $cta_title   = get_post_meta($tool_id, 'dp_tool_cta_title', true);
    $cta_text    = get_post_meta($tool_id, 'dp_tool_cta_text', true);
    $cta_url     = get_post_meta($tool_id, 'dp_tool_cta_url', true);
    $sources     = get_post_meta($tool_id, 'dp_tool_source_notes', true);
    $workflows   = get_the_terms($tool_id, 'tool_workflow');
    $categories  = get_the_terms($tool_id, 'tool_category');
    $stages      = get_the_terms($tool_id, 'tool_stage');
    $verdicts    = get_the_terms($tool_id, 'tool_verdict');
    ?>

    <article <?php post_class('dp-single dp-tool-single'); ?>>
        <header class="dp-single-hero dp-section">
            <div class="dp-shell dp-single-hero-grid dp-tool-hero-grid">
                <div>
                    <a class="dp-pill" href="<?php echo esc_url(home_url('/tools/')); ?>">
                        <?php esc_html_e('Tools', 'dp-starter'); ?>
                    </a>
                    <h1><?php the_title(); ?></h1>
                    <?php if ($verdict) : ?>
                        <p class="dp-lede"><?php echo esc_html($verdict); ?></p>
                    <?php elseif (has_excerpt()) : ?>
                        <p class="dp-lede"><?php echo esc_html(get_the_excerpt()); ?></p>
                    <?php endif; ?>
                    <div class="dp-single-meta">
                        <?php if (!empty($workflows) && !is_wp_error($workflows)) : ?>
                            <span><?php echo esc_html($workflows[0]->name); ?></span>
                        <?php endif; ?>
                        <?php if (!empty($stages) && !is_wp_error($stages)) : ?>
                            <span><?php echo esc_html($stages[0]->name); ?></span>
                        <?php endif; ?>
                        <?php if (!empty($verdicts) && !is_wp_error($verdicts)) : ?>
                            <span><?php echo esc_html($verdicts[0]->name); ?></span>
                        <?php endif; ?>
                    </div>
                </div>

                <div class="dp-tool-logo-wrap">
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
            </div>
        </header>

        <div class="dp-section">
            <div class="dp-shell dp-single-layout">
                <main>
                    <section class="dp-tool-analysis" aria-label="<?php esc_attr_e('Tool analysis', 'dp-starter'); ?>">
                        <?php
                        $analysis_blocks = array(
                            __('Best for', 'dp-starter')                        => $best_for,
                            __('Not best for', 'dp-starter')                    => $not_for,
                            __('When to use it', 'dp-starter')                  => $when_use,
                            __('When not to use it', 'dp-starter')              => $when_not,
                            __('Expert take', 'dp-starter')                     => $take,
                            __('Simple setup for a new coach', 'dp-starter')    => $setup,
                            __('How it fits the workflow', 'dp-starter')        => $loop_fit,
                            __('Common mistake', 'dp-starter')                  => $mistake,
                            __('Simpler alternative', 'dp-starter')             => $alternative,
                        );

                        foreach ($analysis_blocks as $heading => $copy) :
                            if (!$copy) {
                                continue;
                            }
                            ?>
                            <div>
                                <h2><?php echo esc_html($heading); ?></h2>
                                <p><?php echo nl2br(esc_html($copy)); ?></p>
                            </div>
                        <?php endforeach; ?>
                    </section>

                    <?php if (trim(get_the_content())) : ?>
                        <?php get_template_part('template-parts/content-single'); ?>
                    <?php endif; ?>

                    <?php if ($cta_url || $cta_title || $cta_text) : ?>
                        <section class="dp-tool-cta">
                            <?php if ($cta_title) : ?>
                                <h2><?php echo esc_html($cta_title); ?></h2>
                            <?php endif; ?>
                            <?php if ($cta_text) : ?>
                                <p><?php echo esc_html($cta_text); ?></p>
                            <?php endif; ?>
                            <?php if ($cta_url) : ?>
                                <a class="dp-button dp-button-primary" href="<?php echo esc_url($cta_url); ?>" target="_blank" rel="noopener noreferrer">
                                    <?php esc_html_e('Build the system behind your tools', 'dp-starter'); ?>
                                </a>
                            <?php endif; ?>
                        </section>
                    <?php endif; ?>
                </main>

                <aside class="dp-resource-sidebar dp-tool-sidebar" aria-label="<?php esc_attr_e('Tool details', 'dp-starter'); ?>">
                    <p class="dp-kicker"><?php esc_html_e('Tool details', 'dp-starter'); ?></p>

                    <?php if ($website_url) : ?>
                        <a class="dp-tool-visit-link" href="<?php echo esc_url($website_url); ?>" rel="nofollow noopener" target="_blank">
                            <?php esc_html_e('Visit official site', 'dp-starter'); ?>
                        </a>
                    <?php endif; ?>

                    <dl class="dp-tool-facts">
                        <?php if (!empty($workflows) && !is_wp_error($workflows)) : ?>
                            <div><dt><?php esc_html_e('Workflow', 'dp-starter'); ?></dt><dd><?php echo esc_html($workflows[0]->name); ?></dd></div>
                        <?php endif; ?>
                        <?php if (!empty($categories) && !is_wp_error($categories)) : ?>
                            <div><dt><?php esc_html_e('Category', 'dp-starter'); ?></dt><dd><?php echo esc_html($categories[0]->name); ?></dd></div>
                        <?php endif; ?>
                        <?php if (!empty($stages) && !is_wp_error($stages)) : ?>
                            <div><dt><?php esc_html_e('Stage', 'dp-starter'); ?></dt><dd><?php echo esc_html($stages[0]->name); ?></dd></div>
                        <?php endif; ?>
                        <?php if (!empty($verdicts) && !is_wp_error($verdicts)) : ?>
                            <div><dt><?php esc_html_e('Verdict', 'dp-starter'); ?></dt><dd><?php echo esc_html($verdicts[0]->name); ?></dd></div>
                        <?php endif; ?>
                    </dl>

                    <a href="<?php echo esc_url(home_url('/tools/')); ?>"><?php esc_html_e('All Tools', 'dp-starter'); ?></a>
                    <a href="<?php echo esc_url(home_url('/blog/')); ?>"><?php esc_html_e('All Guides', 'dp-starter'); ?></a>
                </aside>
            </div>
        </div>
    </article>
    <?php
endwhile;

get_footer();
