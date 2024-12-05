<?php
// Enqueue parent and child theme styles
function my_theme_enqueue_styles() {
    $parent_style = 'twentytwentyfive-style';
    wp_enqueue_style( $parent_style, get_template_directory_uri() . '/style.css' );

    wp_enqueue_style( 'child-style',
        get_stylesheet_directory_uri() . '/style.css', 
        array( $parent_style ), 
        wp_get_theme()->get('Version')
    );

    wp_enqueue_style( 'custom-style', get_stylesheet_directory_uri() . '/customstyle.css', array( 'child-style' ) 
    );
    wp_enqueue_style( 'child-custom-style-css', get_stylesheet_directory_uri() . '/assets/css/custom-style.css', array( 'child-style' ) 
    );
}
add_action( 'wp_enqueue_scripts', 'my_theme_enqueue_styles' );


// Register navigation menus
function my_theme_register_menus() {
    register_nav_menus(
        array(
            'primary' => __( 'Primary Menu', 'my-theme' ),
            'header-top-menu' => __( 'Header Main Menu', 'my-theme' ),
            'footer'  => __( 'Footer Menu', 'my-theme' ),
            'footer-social'  => __( 'Footer Social Menu', 'my-theme' ),
        )
    );
}
add_action( 'after_setup_theme', 'my_theme_register_menus' );



function my_theme_widgets_init() {
    register_sidebar( array(
        'name'          => 'Sidebar',
        'id'            => 'sidebar-1',
        'before_widget' => '<div class="widget">',
        'after_widget'  => '</div>',
        'before_title'  => '<h2 class="widget-title">',
        'after_title'   => '</h2>',
    ) );
    register_sidebar( array(
        'name'          => 'Footer Social Links',
        'id'            => 'footer-socail-links',
        'before_widget' => '<div class="widget">',
        'after_widget'  => '</div>',
        'before_title'  => '<h2 class="widget-title">',
        'after_title'   => '</h2>',
    ) );

}
add_action( 'widgets_init', 'my_theme_widgets_init' );





/*
Plugin Name: Custom Post Types
Description: Add post types for custom articles
Author: Hostinger Dev
*/
// Hook ht_custom_post_custom_article() to the init action hook
add_action( 'init', 'ht_custom_post_custom_article' );
// The custom function to register a custom article post type
function ht_custom_post_custom_article() {
    // Set the labels. This variable is used in the $args array
    $labels = array(
        'name'               => __( 'Custom Articles' ),
        'singular_name'      => __( 'Custom Article' ),
        'add_new'            => __( 'Add New Custom Article' ),
        'add_new_item'       => __( 'Add New Custom Article' ),
        'edit_item'          => __( 'Edit Custom Article' ),
        'new_item'           => __( 'New Custom Article' ),
        'all_items'          => __( 'All Custom Articles' ),
        'view_item'          => __( 'View Custom Article' ),
        'search_items'       => __( 'Search Custom Article' ),
        'featured_image'     => 'Poster',
        'set_featured_image' => 'Add Poster'
    );
// The arguments for our post type, to be entered as parameter 2 of register_post_type()
    $args = array(
        'labels'            => $labels,
        'description'       => 'Holds our custom article post specific data',
        'public'            => true,
        'menu_position'     => 5,
        'supports'          => array( 'title', 'editor', 'thumbnail', 'excerpt', 'comments', 'custom-fields' ),
        'has_archive'       => true,
        'show_in_admin_bar' => true,
        'show_in_nav_menus' => true,
        'query_var'         => true,
    );
    // Call the actual WordPress function
    // Parameter 1 is a name for the post type
    // Parameter 2 is the $args array
    register_post_type('article', $args);
}


// add_action( 'admin_footer', 'custom_admin_footer_message' );
// function custom_admin_footer_message() {
//     echo '<p>My Custom Admin Footer Message</p>';
// }
