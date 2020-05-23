<?php

//LOAD STYLESHEET
function load_css()
{
    wp_register_style('bootstrap', get_template_directory_uri().'/css/bootstrap.min.css', array(), false, 'all');
    wp_enqueue_style('bootstrap');

    wp_register_style('style', get_template_directory_uri().'/css/style.css', array(), false, 'all');
    wp_enqueue_style('style');

    wp_enqueue_style('fontawesome', 'https://pro.fontawesome.com/releases/v5.10.0/css/all.css');
}

add_action ('wp_enqueue_scripts','load_css');

//LOAD JAVASCRIPT
function load_js()
{
    wp_enqueue_script('jquery');
    wp_register_script('bootstrap', get_template_directory_uri() . '/js/bootstrap.min.js', 'jquery', false, true);
    wp_enqueue_script('bootstrap');
    wp_register_script('scroll', get_template_directory_uri() . '/js/smooth-scroll.min.js', 'jquery', false, true);
    wp_enqueue_script('scroll');
    
}

add_action('wp_enqueue_scripts', 'load_js');

//THEME OPTIONS
add_theme_support('menus');
add_theme_support('post-thumbnails');
add_theme_support( 'custom-header');

function arabella_add_woocommerce_support() {
    add_theme_support( 'woocommerce' );
}

add_action( 'after_setup_theme', 'arabella_add_woocommerce_support' );

//MENUS
register_nav_menus(
    array(
        'top-menu' => 'Top Menu Location'
    )
);

/**
 * Register Custom Navigation Walker
 */
function register_navwalker(){
	require_once get_template_directory() . '/class-wp-bootstrap-navwalker.php';
}
add_action( 'after_setup_theme', 'register_navwalker' );





function change_woocommerce_field_markup( $field, $key, $args, $value ) {
    //  Remove the .form-row class from the current field wrapper
    $field = str_replace('form-row', '', $field);

    //  Wrap the field (and its wrapper) in a new custom div, adding .form-row so the reshuffling works as expected, and adding the field priority
    $field = '<div class="form-check form-row single-field-wrapper" data-priority="' . $args['priority'] . '">' . $field . '</div>';

    return $field;
}
add_filter( 'woocommerce_form_field', 'change_woocommerce_field_markup', 10, 4 );