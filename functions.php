<?php

require_once 'vendor/autoload.php';
require_once 'rest/RestApi.php';

function my_theme_enqueue_styles() {

    $parent_style = 'parent-style'; // This is 'twentyfifteen-style' for the Twenty Fifteen theme.

    wp_enqueue_style( $parent_style, get_template_directory_uri() . '/style.css' );
    wp_enqueue_style( 'child-style',
        get_stylesheet_directory_uri() . '/style.css',
        array( $parent_style ),
        wp_get_theme()->get('Version')
    );
}
add_action( 'wp_enqueue_scripts', 'my_theme_enqueue_styles' );


function create_post_type() {
    register_post_type( 'books',
        array(
            'labels' => array(
                'name' => 'Books',
                'singular_name' => 'Books'
            ),
            'public' => true,
            'has_archive' => true,
            'show_in_menu' => true,
            'show_in_rest' => true,
        )
    );

    register_post_type( 'todos',
        array(
            'labels' => array(
                'name' => 'Todos',
                'singular_name' => 'Todos'
            ),
            'public' => true,
            'has_archive' => true,
            'show_in_menu' => true,
            'show_in_rest' => true,
        )
    );
}
add_action( 'init', 'create_post_type' );

/**
 * REST API
 */
$restApi = new RestApi();



