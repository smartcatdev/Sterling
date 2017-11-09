<?php
$wp_customize->add_panel( 'kenza_appearance_panel', array (
    'title'                 => __( 'Appearance', 'kenza' ),
    'description'           => __( 'Customize your site colors, fonts and other appearance settings', 'kenza' ),
    'priority'              => 3
) );

    // ---------------------------------------------
    // Fonts
    // ---------------------------------------------
    $wp_customize->add_section( 'kenza_fonts_section', array(
        'title'                 => __( 'Fonts', 'kenza'),
        'description'           => __( 'Select one of the following Google fonts', 'kenza' ),
        'panel'                 => 'kenza_appearance_panel',
        'priority'              => 3
    ) );
    
        // Primary Font Family
        $wp_customize->add_setting( 'kenza_font_primary', array (
            'default'               => 'Trirong, serif',
            'transport'             => 'refresh',
            'sanitize_callback'     => 'kenza_sanitize_font'
        ) );
        $wp_customize->add_control( 'kenza_font_primary', array(
            'type'                  => 'select',
            'section'               => 'kenza_fonts_section',
            'label'                 => __( 'Header Font', 'kenza' ),
            'description'           => __( 'Select the header font of the theme', 'kenza' ),
            'choices'               => kenza_fonts(),
        ) );
        
        // Body Font Family
        $wp_customize->add_setting( 'kenza_font_body', array (
            'default'               => 'Titillium Web, sans-serif',
            'transport'             => 'refresh',
            'sanitize_callback'     => 'kenza_sanitize_font'
        ) );
        $wp_customize->add_control( 'kenza_font_body', array(
            'type'                  => 'select',
            'section'               => 'kenza_fonts_section',
            'label'                 => __( 'Body Font', 'kenza' ),
            'description'           => __( 'Select the body font of the theme', 'kenza' ),
            'choices'               => kenza_fonts(),
        ) );
        
    // ---------------------------------------------
    // Skins
    // ---------------------------------------------
    $wp_customize->add_section( 'kenza_skins_section', array(
        'title'                 => __( 'Skins', 'kenza'),
        'description'           => __( 'Customize the colors in use on your site', 'kenza' ),
        'panel'                 => 'kenza_appearance_panel'
    ) );
    
    if ( ! function_exists( 'kenza_pro_init') ) :
        
        // Color Choice Family
        $wp_customize->add_setting( 'kenza_skins_color', array (
            'default'               => 'e5bc6e',
            'transport'             => 'refresh',
            'sanitize_callback'     => 'kenza_sanitize_color'
        ) );
        $wp_customize->add_control( 'kenza_skins_color', array(
            'type'                  => 'select',
            'section'               => 'kenza_skins_section',
            'label'                 => __( 'Site Skin Color', 'kenza' ),
            'description'           => __( 'Select the color of the theme', 'kenza' ),
            'choices'               => array(
                'e5bc6e' => __( 'Gold', 'kenza' ),
                'e8280b' => __( 'Red', 'kenza' ),
            ),
        ) );     
        
    endif; 
    
