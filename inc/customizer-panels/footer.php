<?php
$wp_customize->add_panel( 'sterling_footer', array (
    'title'                 => __( 'Footer', 'sterling' ),
    'description'           => __( 'Customize your footer', 'sterling' ),
    'priority'              => 4
) );

    $wp_customize->add_section( 'sterling_social_links', array (
        'title'                 => __( 'Social Links', 'sterling' ),
        'panel'                 => 'sterling_footer'
    ) );
    
        // Twitter Link---------------------------------------------------------
        $wp_customize->add_setting( 'sterling_twitter_link', array (
            'default'               => '',
            'transport'             => 'refresh',
            'sanitize_callback'     => 'sanitize_text_field',
        ) );
        $wp_customize->add_control( 'sterling_twitter_link', array (
            'type'                  => 'text',
            'section'               => 'sterling_social_links',
            'label'                 => __( 'Twitter Address', 'sterling' ),
        ) );
        
        // Facebook Link---------------------------------------------------------
        $wp_customize->add_setting( 'sterling_facebook_link', array (
            'default'               => '',
            'transport'             => 'refresh',
            'sanitize_callback'     => 'sanitize_text_field',
        ) );
        $wp_customize->add_control( 'sterling_facebook_link', array (
            'type'                  => 'text',
            'section'               => 'sterling_social_links',
            'label'                 => __( 'Facebook Address', 'sterling' ),
        ) );
        
        // Instagram Link---------------------------------------------------------
        $wp_customize->add_setting( 'sterling_instagram_link', array (
            'default'               => '',
            'transport'             => 'refresh',
            'sanitize_callback'     => 'sanitize_text_field',
        ) );
        $wp_customize->add_control( 'sterling_instagram_link', array (
            'type'                  => 'text',
            'section'               => 'sterling_social_links',
            'label'                 => __( 'Instagram Address', 'sterling' ),
        ) );
        
        // Dribbble Link---------------------------------------------------------
        $wp_customize->add_setting( 'sterling_dribbble_link', array (
            'default'               => '',
            'transport'             => 'refresh',
            'sanitize_callback'     => 'sanitize_text_field',
        ) );
        $wp_customize->add_control( 'sterling_dribbble_link', array (
            'type'                  => 'text',
            'section'               => 'sterling_social_links',
            'label'                 => __( 'Dribbble Address', 'sterling' ),
        ) );
        
    $wp_customize->add_section( 'sterling_footer_name', array (
        'title'                 => __( 'Company Name', 'sterling' ),
        'panel'                 => 'sterling_footer'
    ) );
    
        // Footer Company Name---------------------------------------------------
        $wp_customize->add_setting( 'sterling_company_name', array (
            'default'               => __( 'Wordpress', 'sterling' ),
            'transport'             => 'refresh',
            'sanitize_callback'     => 'sanitize_text_field',
        ) );
        $wp_customize->add_control( 'sterling_company_name', array (
            'type'                  => 'text',
            'section'               => 'sterling_footer_name',
            'label'                 => __( 'Company Name', 'sterling' ),
        ) );
        
        // Footer Company Link---------------------------------------------------
        $wp_customize->add_setting( 'sterling_company_url', array (
            'default'               => 'http://www.wordpress.org/',
            'transport'             => 'refresh',
            'sanitize_callback'     => 'esc_url_raw',
        ) );
        $wp_customize->add_control( 'sterling_company_url', array (
            'type'                  => 'text',
            'section'               => 'sterling_footer_name',
            'label'                 => __( 'Company URL', 'sterling' ),
        ) );

