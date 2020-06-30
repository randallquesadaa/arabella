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

//Custom Español

function lwp_es_callout($wp_customize){
    $wp_customize->add_section('lwp-es-callout-section', array(
        'title'=> 'Español'
    ));

    $wp_customize->add_setting('lwp-es-home-callout-title', array(
        'default'=> 'Bienvenido'
    ));

    $wp_customize->add_control(new WP_Customize_Control($wp_customize, '
    lwp-es-home-callout-title-control', array(
        'label'=>'Titulo de Inicio',
        'section'=>'lwp-es-callout-section',
        'settings'=>'lwp-es-home-callout-title'
    )));

    $wp_customize->add_setting('lwp-es-contact-callout-title', array(
        'default'=> 'Acerca de nosotros y como contactarnos'
    ));

    $wp_customize->add_control(new WP_Customize_Control($wp_customize, '
    lwp-es-contact-callout-title-control', array(
        'label'=>'Titulo de Contacto',
        'section'=>'lwp-es-callout-section',
        'settings'=>'lwp-es-contact-callout-title'
    )));
    
}

add_action('customize_register', 'lwp_es_callout');

//Custom English

function lwp_en_callout($wp_customize){
    $wp_customize->add_section('lwp-en-callout-section', array(
        'title'=> 'English'
    ));

    $wp_customize->add_setting('lwp-en-home-callout-title', array(
        'default'=> 'Welcome'
    ));

    $wp_customize->add_control(new WP_Customize_Control($wp_customize, '
    lwp-en-home-callout-title-control', array(
        'label'=>'Title Home',
        'section'=>'lwp-en-callout-section',
        'settings'=>'lwp-en-home-callout-title'
    )));

    $wp_customize->add_setting('lwp-en-contact-callout-title', array(
        'default'=> 'About us and how to contact us'
    ));

    $wp_customize->add_control(new WP_Customize_Control($wp_customize, '
    lwp-en-contact-callout-title-control', array(
        'label'=>'Title Contact',
        'section'=>'lwp-en-callout-section',
        'settings'=>'lwp-en-contact-callout-title'
    )));
    
}

add_action('customize_register', 'lwp_en_callout');

//Custom Image

function lwp_img_callout($wp_customize){

    $wp_customize->add_section('lwp-img-callout-section', array(
        'title'=> 'Img'
    ));

    $wp_customize->add_setting('lwp-img-callout-imgHome');

    $wp_customize->add_control(new WP_Customize_Cropped_Image_Control($wp_customize, '
    lwp-img-callout-imgHome-control', array(
        'label'=>'Img Home',
        'section'=>'lwp-img-callout-section',
        'settings'=>'lwp-img-callout-imgHome',
        'width'=>1920,
        'height'=>800
    )));

    $wp_customize->add_setting('lwp-img-callout-imgContact');

    $wp_customize->add_control(new WP_Customize_Cropped_Image_Control($wp_customize, '
    lwp-img-callout-imgContact-control', array(
        'label'=>'Img Contact',
        'section'=>'lwp-img-callout-section',
        'settings'=>'lwp-img-callout-imgContact',
        'width'=>1920,
        'height'=>800
    )));
}

add_action('customize_register', 'lwp_img_callout');

//Custom Contact

function lwp_contact_callout($wp_customize){
    $wp_customize->add_section('lwp-contact-callout-section', array(
        'title'=> 'Contact'
    ));

    $wp_customize->add_setting('lwp-en-home-callout-email', array(
        'default'=> 'example@example.com'
    ));

    $wp_customize->add_control(new WP_Customize_Control($wp_customize, '
    lwp-contact-callout-email-control', array(
        'label'=>'Email',
        'section'=>'lwp-contact-callout-section',
        'settings'=>'lwp-en-home-callout-email'
    )));

    $wp_customize->add_setting('lwp-en-contact-callout-number', array(
        'default'=> '88888888'
    ));

    $wp_customize->add_control(new WP_Customize_Control($wp_customize, '
    lwp-contact-callout-number-control', array(
        'label'=>'Number',
        'section'=>'lwp-contact-callout-section',
        'settings'=>'lwp-en-contact-callout-number'
    )));
    
}

add_action('customize_register', 'lwp_contact_callout');