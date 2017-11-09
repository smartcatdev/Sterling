<?php
$wp_customize->add_panel( 'kenza_footer', array (
    'title'                 => __( 'Footer', 'kenza' ),
    'description'           => __( 'Customize your footer', 'kenza' ),
    'priority'              => 4
) );

    $wp_customize->add_section( 'kenza_social_links', array (
        'title'                 => __( 'Social Links', 'kenza' ),
        'panel'                 => 'kenza_footer'
    ) );
    
        // Twitter Link---------------------------------------------------------
        $wp_customize->add_setting( 'kenza_twitter_link', array (
            'default'               => '',
            'transport'             => 'refresh',
            'sanitize_callback'     => 'esc_url_raw',
        ) );
        $wp_customize->add_control( 'kenza_twitter_link', array (
            'type'                  => 'text',
            'section'               => 'kenza_social_links',
            'label'                 => __( 'Twitter URL', 'kenza' ),
        ) );
        
        // Facebook Link---------------------------------------------------------
        $wp_customize->add_setting( 'kenza_facebook_link', array (
            'default'               => '',
            'transport'             => 'refresh',
            'sanitize_callback'     => 'esc_url_raw',
        ) );
        $wp_customize->add_control( 'kenza_facebook_link', array (
            'type'                  => 'text',
            'section'               => 'kenza_social_links',
            'label'                 => __( 'Facebook URL', 'kenza' ),
        ) );
        
        // Instagram Link---------------------------------------------------------
        $wp_customize->add_setting( 'kenza_instagram_link', array (
            'default'               => '',
            'transport'             => 'refresh',
            'sanitize_callback'     => 'esc_url_raw',
        ) );
        $wp_customize->add_control( 'kenza_instagram_link', array (
            'type'                  => 'text',
            'section'               => 'kenza_social_links',
            'label'                 => __( 'Instagram URL', 'kenza' ),
        ) );
        
        // Dribbble Link---------------------------------------------------------
        $wp_customize->add_setting( 'kenza_dribbble_link', array (
            'default'               => '',
            'transport'             => 'refresh',
            'sanitize_callback'     => 'esc_url_raw',
        ) );
        $wp_customize->add_control( 'kenza_dribbble_link', array (
            'type'                  => 'text',
            'section'               => 'kenza_social_links',
            'label'                 => __( 'Dribbble URL', 'kenza' ),
        ) );
        
    $wp_customize->add_section( 'kenza_footer_name', array (
        'title'                 => __( 'Company Branding', 'kenza' ),
        'panel'                 => 'kenza_footer'
    ) );
    
        // Footer Company Name---------------------------------------------------
        $wp_customize->add_setting( 'kenza_company_name', array (
            'default'               => __( 'Powered by WordPress', 'kenza' ),
            'transport'             => 'refresh',
            'sanitize_callback'     => 'sanitize_text_field',
        ) );
        $wp_customize->add_control( 'kenza_company_name', array (
            'type'                  => 'text',
            'section'               => 'kenza_footer_name',
            'label'                 => __( 'Company Name', 'kenza' ),
        ) );
        
        // Footer Company Link---------------------------------------------------
        $wp_customize->add_setting( 'kenza_company_url', array (
            'default'               => 'http://www.wordpress.org/',
            'transport'             => 'refresh',
            'sanitize_callback'     => 'esc_url_raw',
        ) );
        $wp_customize->add_control( 'kenza_company_url', array (
            'type'                  => 'text',
            'section'               => 'kenza_footer_name',
            'label'                 => __( 'Company URL', 'kenza' ),
        ) );
$wp_customize->add_section( 'kenza_footer_cta', array (
        'title'                 => __( 'Footer Call to Action', 'kenza' ),
        'panel'                 => 'kenza_footer'
    ) );

    $wp_customize->add_setting( 'kenza_footer_cta_post', array (
        'default'               => 'none',
        'transport'             => 'refresh',
        'sanitize_callback'     => 'kenza_sanitize_post'
    ) );
    
    $wp_customize->add_control( 'kenza_footer_cta_post', array(
        'type'                  => 'select',
        'section'               => 'kenza_footer_cta',
        'label'                 => __( 'Selected Featured Post', 'kenza' ),
        'choices'               => kenza_all_posts_array( true )
    ) );
    
    $wp_customize->add_setting( 'kenza_footer_cta_button_text', array (
        'default'               => 'Read More',
        'transport'             => 'refresh',
        'sanitize_callback'     => 'sanitize_text_field'
    ) );
    
    $wp_customize->add_control( 'kenza_footer_cta_button_text', array(
        'type'                  => 'text',
        'section'               => 'kenza_footer_cta',
        'label'                 => __( 'Button Text', 'kenza' )
    ) );

function kenza_sanitize_post( $input ) {
    $valid_keys = kenza_all_posts_array( true );
    if ( array_key_exists( $input, $valid_keys ) ) {
        return $input;
    } else {
        return '';
    }
}