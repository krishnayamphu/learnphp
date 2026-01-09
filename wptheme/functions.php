<?php
if (! file_exists(get_template_directory() . '/inc/class-wp-bootstrap-navwalker.php')) {
    // File does not exist... return an error.
    return new WP_Error('class-wp-bootstrap-navwalker-missing', __('It appears the class-wp-bootstrap-navwalker.php file may be missing.', 'wp-bootstrap-navwalker'));
} else {
    // File exists... require it.
    require_once get_template_directory() . '/inc/class-wp-bootstrap-navwalker.php';
}


add_action('after_setup_theme', 'wptheme_setup');

function wptheme_setup()
{
    register_nav_menus(array(
        'primary' => __('Primary Menu', 'wptheme'),
    ));
}
