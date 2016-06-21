<?php

function register_my_menus()
{
    register_nav_menus(
        array(
            'header-menu' => __('header menu')
        )
    );
}

add_action('init', 'register_my_menus');

remove_action('wp_head', 'print_emoji_detection_script', 7);
remove_action('wp_print_styles', 'print_emoji_styles');


