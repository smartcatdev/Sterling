<?php
/**
 * Sterling Theme Customizer
 *
 * @package Sterling
 */
/**
 * Add postMessage support for site title and description for the Theme Customizer.
 *
 * @param WP_Customize_Manager $wp_customize Theme Customizer object.
 */
function sterling_customize_register( $wp_customize ) {
	$wp_customize->get_setting( 'blogname' )->transport         = 'postMessage';
	$wp_customize->get_setting( 'blogdescription' )->transport  = 'postMessage';
	$wp_customize->get_setting( 'header_textcolor' )->transport = 'postMessage';

	if ( isset( $wp_customize->selective_refresh ) ) {
		$wp_customize->selective_refresh->add_partial( 'blogname', array(
			'selector'        => '.site-title a',
			'render_callback' => 'sterling_customize_partial_blogname',
		) );
		$wp_customize->selective_refresh->add_partial( 'blogdescription', array(
			'selector'        => '.site-description',
			'render_callback' => 'sterling_customize_partial_blogdescription',
		) );
	}
                
        include_once get_template_directory() . '/inc/customizer-panels/header.php';
        include_once get_template_directory() . '/inc/customizer-panels/appearance.php';
        include_once get_template_directory() . '/inc/customizer-panels/footer.php';
        include_once get_template_directory() . '/inc/customizer-panels/404.php';
        
        $wp_customize->get_section ( 'background_image' )->panel = 'sterling_appearance_panel';
        $wp_customize->get_section ( 'colors' )->panel = 'sterling_appearance_panel';
        $wp_customize->get_section ( 'header_image' )->panel = 'sterling_header';
        
}
add_action( 'customize_register', 'sterling_customize_register' );

/**
 * Render the site title for the selective refresh partial.
 *
 * @return void
 */
function sterling_customize_partial_blogname() {
	bloginfo( 'name' );
}

/**
 * Render the site tagline for the selective refresh partial.
 *
 * @return void
 */
function sterling_customize_partial_blogdescription() {
	bloginfo( 'description' );
}

/**
 * Binds JS handlers to make Theme Customizer preview reload changes asynchronously.
 */
function sterling_customize_preview_js() {
	wp_enqueue_script( 'sterling-customizer', get_template_directory_uri() . '/js/customizer.js', array( 'customize-preview' ), '20151215', true );
}
add_action( 'customize_preview_init', 'sterling_customize_preview_js' );

function sterling_sanitize_font( $input ) {
    
    $valid_keys = sterling_fonts();
    
    if ( array_key_exists( $input, $valid_keys ) ) {
        return $input;
    } else {
        return '';
    }  
    
}
    
/**
 * 
 * @param type $input
 * @param type $setting
 * @return string validated color choice
 */
function sterling_sanatize_color( $input, $setting ) {
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