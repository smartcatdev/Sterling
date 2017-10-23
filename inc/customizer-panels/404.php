<?php
$wp_customize->add_section( 'kenza_404_text', array (
    'title'                 => __( '404', 'kenza' ),
    'priority'              => 4
) );

    // 404 Title ---------------------------------------------------------------
    $wp_customize->add_setting( 'kenza_404_title', array (
        'default'               => __( 'Oops!', 'kenza' ),
        'transport'             => 'refresh',
        'sanitize_callback'     => 'sanitize_text_field',
    ) );
    $wp_customize->add_control( 'kenza_404_title', array (
        'type'                  => 'text',
        'section'               => 'kenza_404_text',
        'label'                 => __( '404 Title', 'kenza' ),
    ) );
    
    // 404 Message -------------------------------------------------------------
    $wp_customize->add_setting( 'kenza_404_message', array (
        'default'               => __( "We're sorry, something seems to have gone wrong.", 'kenza' ),
        'transport'             => 'refresh',
        'sanitize_callback'     => 'sanitize_text_field',
    ) );
    $wp_customize->add_control( 'kenza_404_message', array (
        'type'                  => 'text',
        'section'               => 'kenza_404_text',
        'label'                 => __( '404 Message', 'kenza' ),
    ) );
