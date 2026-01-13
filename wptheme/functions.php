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
    add_theme_support('post-thumbnails');

    // Add custom image sizes
    add_image_size('wptheme-featured', 1200, 630, true);
    add_image_size('wptheme-thumbnail', 300, 200, true);
}

add_action('widgets_init', 'wptheme_widgets_init');

function wptheme_widgets_init()
{
    register_sidebar(array(
        'name'          => __('Sidebar', 'wptheme'),
        'id'            => 'sidebar-1',
        'description'   => __('Add widgets here to appear in your sidebar.', 'wptheme'),
        'before_widget' => '<section id="%1$s" class="widget %2$s">',
        'after_widget'  => '</section>',
        'before_title'  => '<h2 class="widget-title">',
        'after_title'   => '</h2>',
    ));

    register_sidebar(array(
        'name'          => __('Footer 1', 'wptheme'),
        'id'            => 'footer-1',
        'description'   => __('Add widgets here to appear in your footer.', 'wptheme'),
        'before_widget' => '<aside id="%1$s" class="widget %2$s">',
        'after_widget'  => '</aside>',
        'before_title'  => '<h4 class="widget-title">',
        'after_title'   => '</h4>',
    ));
}
