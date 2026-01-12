<?php
if (! file_exists(get_template_directory() . '/inc/class-wp-bootstrap-navwalker.php')) {
    return new WP_Error('class-wp-bootstrap-navwalker-missing', __('It appears the class-wp-bootstrap-navwalker.php file may be missing.', 'wp-bootstrap-navwalker'));
} else {
    require_once get_template_directory() . '/inc/class-wp-bootstrap-navwalker.php';
}

if (! file_exists(get_template_directory() . '/inc/template-functions.php')) {
    return new WP_Error('template-functions.php', __('It appears the template-functions.php file may be missing.', 'template-functions'));
} else {
    require_once get_template_directory() . '/inc/template-functions.php';
}


add_action('after_setup_theme', 'wptheme_setup');

function wptheme_setup()
{
    // Register navigation menus
    register_nav_menus(array(
        'primary' => __('Primary Menu', 'wptheme'),
    ));

    // Add theme support
    // add_theme_support('post-thumbnails');

    // Add custom image sizes
    // add_image_size('wptheme-featured', 1200, 630, true);
    // add_image_size('wptheme-thumbnail', 300, 200, true);
}
