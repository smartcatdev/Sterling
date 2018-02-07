<?php

/**
 * Kenza Theme Customizer
 *
 * @package Kenza
 */



function kenza_customize_enqueue() {
    wp_enqueue_script( 'kenza-customizer-js', get_template_directory_uri() . '/inc/js/customizer.js', array( 'jquery', 'customize-controls' ), false, true );
}

if( !function_exists( 'kenza_pro_init' ) ) :
    add_action( 'customize_controls_enqueue_scripts', 'kenza_customize_enqueue' );
endif;




/**
 * Add postMessage support for site title and description for the Theme Customizer.
 *
 * @param WP_Customize_Manager $wp_customize Theme Customizer object.
 */
function kenza_customize_register( $wp_customize ) {
    
    $wp_customize->get_setting( 'blogname' )->transport         = 'postMessage';
    $wp_customize->get_setting( 'blogdescription' )->transport  = 'postMessage';
    
    $wp_customize->get_setting( 'header_textcolor' )->default   = '#999';
    $wp_customize->get_setting( 'header_textcolor' )->transport = 'postMessage';

    if ( isset( $wp_customize->selective_refresh ) ) {
        $wp_customize->selective_refresh->add_partial( 'blogname', array(
            'selector'        => '.site-title a',
            'render_callback' => 'kenza_customize_partial_blogname',
        ) );
        $wp_customize->selective_refresh->add_partial( 'blogdescription', array(
            'selector'        => '.site-description',
            'render_callback' => 'kenza_customize_partial_blogdescription',
        ) );
    }

    require_once trailingslashit( get_template_directory() ) . 'inc/customizer-panels/logo.php';
    require_once trailingslashit( get_template_directory() ) . 'inc/customizer-panels/general.php';
    require_once trailingslashit( get_template_directory() ) . 'inc/customizer-panels/appearance.php';
    require_once trailingslashit( get_template_directory() ) . 'inc/customizer-panels/footer.php';
    require_once trailingslashit( get_template_directory() ) . 'inc/customizer-panels/404.php';
    require_once trailingslashit( get_template_directory() ) . 'inc/customizer-panels/frontpage.php';

    $wp_customize->get_section ( 'background_image' )->panel = 'kenza_appearance_panel';
    $wp_customize->get_section ( 'colors' )->panel = 'kenza_appearance_panel';
    $wp_customize->get_section ( 'colors' )->title = __( 'Background color', 'kenza' );
    $wp_customize->get_section ( 'static_front_page' )->panel = 'kenza_frontpage_panel';
    $wp_customize->get_section ( 'header_image' )->priority = 1;
    $wp_customize->get_section ( 'title_tagline' )->priority = 1;
    $wp_customize->get_section ( 'title_tagline' )->title = __( 'Site Identity & Logo', 'kenza' );

    // Custom Logo Height Value
    $wp_customize->add_setting( 'kenza_header_height', array (
        'default'               => 50,
        'transport'             => 'refresh',
        'sanitize_callback'     => 'kenza_sanitize_integer',
    ) );
    $wp_customize->add_control( 'kenza_header_height', array(
        'type'                  => 'number',
        'section'               => 'header_image',
        'label'                 => __( 'Custom Header Height', 'kenza' ),
        'description'           => __( 'Set in percentage.', 'kenza' ),
        'input_attrs'           => array(
            'min' => 20,
            'max' => 100,
            'step' => 5,
    ) ) );
    
}
add_action( 'customize_register', 'kenza_customize_register' );

/**
 * Render the site title for the selective refresh partial.
 *
 * @return void
 */
function kenza_customize_partial_blogname() {
    bloginfo( 'name' );
}

/**
 * Render the site tagline for the selective refresh partial.
 *
 * @return void
 */
function kenza_customize_partial_blogdescription() {
    bloginfo( 'description' );
}

/**
 * Binds JS handlers to make Theme Customizer preview reload changes asynchronously.
 */
function kenza_customize_preview_js() {
    wp_enqueue_script( 'kenza-customizer', get_template_directory_uri() . '/js/customizer.js', array( 'customize-preview' ), KENZA_VERSION, true );
}
add_action( 'customize_preview_init', 'kenza_customize_preview_js' );

function kenza_sanitize_font( $input ) {
    
    $valid_keys = kenza_fonts();
    
    if ( array_key_exists( $input, $valid_keys ) ) {
        return $input;
    } else {
        return '';
    }  
    
}

function kenza_sanitize_on_off_toggle( $input ) {
    
    $valid_keys = array(
        'on'        => __( 'On', 'kenza' ),
        'off'       => __( 'Off', 'kenza' ),
    );
    
    if ( array_key_exists( $input, $valid_keys ) ) {
        return $input;
    } else {
        return '';
    }
    
}

function kenza_sanitize_integer( $input ) {
    return intval( $input );
}

/**
 * 
 * @param type $input
 * @param type $setting
 * @return string validated color choice
 */
function kenza_sanitize_color( $input, $setting ) {
    
    // Ensure input is a slug
    $input = sanitize_key( $input );
    
    // Get list of choices from the control
    // associated with the setting
    $choices = $setting->manager->get_control( $setting->id )->choices;
    
    // If the input is a valid key, return it;
    // otherwise, return the default
    $keys = array_map( 'sanitize_hex_color_no_hash', array_keys( $choices ) );
    return ( in_array( $input, $keys ) ? $input : $setting->default );
    
}