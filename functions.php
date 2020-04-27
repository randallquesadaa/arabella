<?php

    require_once get_template_directory() . '/class-wp-bootstrap-navwalker.php';

    function load_assets( ){
        
        //load BS
        //wp_enqueue_style('bootstrap_css', 'https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css');

        wp_enqueue_style('bootstrap_css', get_template_directory_uri() . '/css/bootstrap.min.css');
        
        //load stlye.css
        wp_enqueue_style( 'style', get_stylesheet_uri() );
        
        //load JS
        wp_enqueue_script( 'jquery', 'https://code.jquery.com/jquery-3.4.1.min.js');

        wp_enqueue_script( 'bootstrap_js', 'https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js');
        
    }
    add_action('wp_enqueue_scripts', 'load_assets');
                        
    //register nav menu
    //register_nav_menus( array('primary' => __( 'Primary Menu', 'THEMENAME' )));
    register_nav_menus( array(
        'primary' => __( 'Primary Menu', 'THEMENAME' ),
    ) );

    /*function remove_admin_login_header() {
        remove_action('wp_head', '_admin_bar_bump_cb');
    }
    add_action('get_header', 'remove_admin_login_header');*/

    //support featured image
    add_theme_support('post-thumbnails'); 
        
?>