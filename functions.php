<?php

/**
 * Enqueue theme styles and scripts.
 *
 * Loads compiled CSS and JS files from the assets/dist directory.
 *
 * @return void
 */
function mytheme_enqueue_assets() {
    wp_enqueue_style(
        'mytheme-style',
        get_template_directory_uri() . '/assets/dist/main.css',
        [],
        '1.0'
    );

    wp_enqueue_script(
        'mytheme-script',
        get_template_directory_uri() . '/assets/dist/main.js',
        [],
        '1.0',
        true
    );
}
add_action('wp_enqueue_scripts', 'mytheme_enqueue_assets');

/**
 * Setup theme defaults and register supported features.
 *
 * - Enables title tag support
 * - Enables featured images (post thumbnails)
 * - Enables editor styles
 * - Registers navigation menus
 *
 * @return void
 */
function mytheme_setup() {
    add_theme_support('title-tag');
    add_theme_support('post-thumbnails');
    add_theme_support('editor-styles');

    register_nav_menus([
        'primary' => 'Primary Menu'
    ]);
}
add_action('after_setup_theme', 'mytheme_setup');

/**
 * Register custom page templates located in /templates directory.
 *
 * @param array $templates Existing page templates.
 * @return array Modified list of templates.
 */
function mytheme_page_templates($templates) {
    $templates['templates/template-home.php'] = 'Home Page1';
    $templates['templates/template-fullwidth.php'] = 'Full Width';

    return $templates;
}
add_filter('theme_page_templates', 'mytheme_page_templates');

/**
 * Load custom page templates from /templates directory.
 *
 * Overrides default template loading for pages if a custom template is selected.
 *
 * @param string $template Default template path.
 * @return string Modified template path.
 */
function mytheme_load_template($template) {
    if (is_page()) {
        $meta = get_post_meta(get_the_ID(), '_wp_page_template', true);

        if ($meta && file_exists(get_template_directory() . '/' . $meta)) {
            return get_template_directory() . '/' . $meta;
        }
    }
    return $template;
}
add_filter('template_include', 'mytheme_load_template');
