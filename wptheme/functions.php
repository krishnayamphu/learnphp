<?php
add_action('after_setup_theme', 'wptheme_setup');

function wptheme_setup()
{
    register_nav_menus(array(
        'primary' => __('Primary Menu', 'wptheme'),
    ));
}
