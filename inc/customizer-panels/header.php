<?php

$wp_customize->add_panel( 'sterling_header', array (
    'title'                 => __( 'Header', 'sterling' ),
    'description'           => __( 'Customize your header', 'sterling' ),
    'priority'              => 1
) );

    $wp_customize->add_section( 'sterling_contact_links', array (
        'title'                 => __( 'Contact Links', 'sterling' ),
        'panel'                 => 'sterling_header'
    ) );
//        Location Link---------------------------------------------------------
        $wp_customize->add_setting( 'sterling_location_link', array (
            'default'               => __( '#', 'sterling' ),
            'transport'             => 'refresh',
            'sanitize_callback'     => 'sanitize_text_field',
        ) );
        $wp_customize->add_control( 'sterling_location_link', array (
            'type'                  => 'text',
            'section'               => 'sterling_contact_links',
            'label'                 => __( 'Business Location', 'sterling' ),
        ) );
//        Email Link---------------------------------------------------------
        $wp_customize->add_setting( 'sterling_email_link', array (
            'default'               => __( '#', 'sterling' ),
            'transport'             => 'refresh',
            'sanitize_callback'     => 'sanitize_text_field',
        ) );
        $wp_customize->add_control( 'sterling_email_link', array (
            'type'                  => 'text',
            'section'               => 'sterling_contact_links',
            'label'                 => __( 'Business Email', 'sterling' ),
        ) );
