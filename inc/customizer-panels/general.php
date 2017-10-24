<?php

$wp_customize->add_panel( 'kenza_general', array (
    'title'                 => __( 'General', 'kenza' ),
    'description'           => __( 'Customize your header', 'kenza' ),
    'priority'              => 2
) );

    $wp_customize->add_section( 'kenza_heights_section', array (
        'title'                 => __( 'Nav Bar Heights', 'kenza' ),
        'panel'                 => 'kenza_general'
    ) );

        // Header Height Desktop
        $wp_customize->add_setting( 'kenza_custom_header_height_desktop', array (
            'default'               => 96,
            'transport'             => 'refresh',
            'sanitize_callback'     => 'kenza_sanitize_integer',
        ) );
        $wp_customize->add_control( 'kenza_custom_header_height_desktop', array(
            'type'                  => 'number',
            'section'               => 'kenza_heights_section',
            'label'                 => __( 'Navigation Bar Height - Desktop', 'kenza' ),
            'description'           => __( 'Adjust the height of the navigation bar header for desktop screens (Browsers 992px and wider)', 'kenza' ),
            'input_attrs'           => array(
                'min' => 56,
                'max' => 500,
                'step' => 1,
        ) ) );

        // Header Height Mobile
        $wp_customize->add_setting( 'kenza_custom_header_height_mobile', array (
            'default'               => 64,
            'transport'             => 'refresh',
            'sanitize_callback'     => 'kenza_sanitize_integer',
        ) );
        $wp_customize->add_control( 'kenza_custom_header_height_mobile', array(
            'type'                  => 'number',
            'section'               => 'kenza_heights_section',
            'label'                 => __( 'Navigation Bar Height - Mobile', 'kenza' ),
            'description'           => __( 'Adjust the height of the navigation bar header for desktop screens (Browsers 991px and narrower)', 'kenza' ),
            'input_attrs'           => array(
                'min' => 56,
                'max' => 500,
                'step' => 1,
        ) ) );

    $wp_customize->add_section( 'kenza_contact_links', array (
        'title'                 => __( 'Contact Links', 'kenza' ),
        'panel'                 => 'kenza_general'
    ) );
    
        //  Location Link---------------------------------------------------------
        $wp_customize->add_setting( 'kenza_location_link', array (
            'default'               => '',
            'transport'             => 'refresh',
            'sanitize_callback'     => 'esc_url_raw',
        ) );
        $wp_customize->add_control( 'kenza_location_link', array (
            'type'                  => 'text',
            'section'               => 'kenza_contact_links',
            'label'                 => __( 'Business Location', 'kenza' ),
        ) );
        
        //  Email Link---------------------------------------------------------
        $wp_customize->add_setting( 'kenza_email_link', array (
            'default'               => '',
            'transport'             => 'refresh',
            'sanitize_callback'     => 'sanitize_text_field',
        ) );
        $wp_customize->add_control( 'kenza_email_link', array (
            'type'                  => 'text',
            'section'               => 'kenza_contact_links',
            'label'                 => __( 'Business Email', 'kenza' ),
        ) );
        
        
