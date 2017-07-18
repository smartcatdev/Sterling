<?php
$wp_customize->add_panel( 'sterling_appearance_panel', array (
    'title'                 => __( 'Appearance', 'sterling' ),
    'description'           => __( 'Customize your site colors, fonts and other appearance settings', 'sterling' ),
    'priority'              => 2
) );
        // ---------------------------------------------
    // Fonts
    // ---------------------------------------------
    $wp_customize->add_section( 'sterling_fonts_section', array(
        'title'                 => __( 'Fonts', 'sterling'),
        'description'           => __( 'Customize the fonts in use on your header', 'sterling' ),
        'panel'                 => 'sterling_appearance_panel'
    ) );
        // Primary Font Family
        $wp_customize->add_setting( 'sterling_font_primary', array (
            'default'               => 'Trirong, serif',
            'transport'             => 'refresh',
            'sanitize_callback'     => 'sterling_sanitize_font'
        ) );
        $wp_customize->add_control( 'sterling_font_primary', array(
            'type'                  => 'select',
            'section'               => 'sterling_fonts_section',
            'label'                 => __( 'Header Font', 'sterling' ),
            'description'           => __( 'Select the header font of the theme', 'sterling' ),
            'choices'               => sterling_fonts(),
        ) );
        // Body Font Family
        $wp_customize->add_setting( 'sterling_font_body', array (
            'default'               => 'Trirong, serif',
            'transport'             => 'refresh',
            'sanitize_callback'     => 'sterling_sanitize_font'
        ) );
        $wp_customize->add_control( 'sterling_font_body', array(
            'type'                  => 'select',
            'section'               => 'sterling_fonts_section',
            'label'                 => __( 'Header Font', 'sterling' ),
            'description'           => __( 'Select the header font of the theme', 'sterling' ),
            'choices'               => sterling_fonts(),
        ) );