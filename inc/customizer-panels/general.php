<?php

$wp_customize->add_panel( 'sterling_general', array (
    'title'                 => __( 'General', 'sterling' ),
    'description'           => __( 'Customize your header', 'sterling' ),
    'priority'              => 2
) );

    $wp_customize->add_section( 'sterling_heights_section', array (
        'title'                 => __( 'Nav Bar Heights', 'sterling' ),
        'panel'                 => 'sterling_general'
    ) );

        // Header Height Desktop
        $wp_customize->add_setting( 'sterling_custom_header_height_desktop', array (
            'default'               => 96,
            'transport'             => 'refresh',
            'sanitize_callback'     => 'sterling_sanitize_integer',
        ) );
        $wp_customize->add_control( 'sterling_custom_header_height_desktop', array(
            'type'                  => 'number',
            'section'               => 'sterling_heights_section',
            'label'                 => __( 'Navigation Bar Height - Desktop', 'sterling' ),
            'description'           => __( 'Adjust the height of the navigation bar header for desktop screens (Browsers 992px and wider)', 'sterling' ),
            'input_attrs'           => array(
                'min' => 56,
                'max' => 500,
                'step' => 1,
        ) ) );

        // Header Height Mobile
        $wp_customize->add_setting( 'sterling_custom_header_height_mobile', array (
            'default'               => 64,
            'transport'             => 'refresh',
            'sanitize_callback'     => 'sterling_sanitize_integer',
        ) );
        $wp_customize->add_control( 'sterling_custom_header_height_mobile', array(
            'type'                  => 'number',
            'section'               => 'sterling_heights_section',
            'label'                 => __( 'Navigation Bar Height - Mobile', 'sterling' ),
            'description'           => __( 'Adjust the height of the navigation bar header for desktop screens (Browsers 991px and narrower)', 'sterling' ),
            'input_attrs'           => array(
                'min' => 56,
                'max' => 500,
                'step' => 1,
        ) ) );

    $wp_customize->add_section( 'sterling_contact_links', array (
        'title'                 => __( 'Contact Links', 'sterling' ),
        'panel'                 => 'sterling_general'
    ) );
    
        //  Location Link---------------------------------------------------------
        $wp_customize->add_setting( 'sterling_location_link', array (
            'default'               => '',
            'transport'             => 'refresh',
            'sanitize_callback'     => 'esc_url_raw',
        ) );
        $wp_customize->add_control( 'sterling_location_link', array (
            'type'                  => 'text',
            'section'               => 'sterling_contact_links',
            'label'                 => __( 'Business Location', 'sterling' ),
        ) );
        
        //  Email Link---------------------------------------------------------
        $wp_customize->add_setting( 'sterling_email_link', array (
            'default'               => '',
            'transport'             => 'refresh',
            'sanitize_callback'     => 'sanitize_text_field',
        ) );
        $wp_customize->add_control( 'sterling_email_link', array (
            'type'                  => 'text',
            'section'               => 'sterling_contact_links',
            'label'                 => __( 'Business Email', 'sterling' ),
        ) );
        
        
