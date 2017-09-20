<?php
$wp_customize->add_section( 'sterling_404_text', array (
    'title'                 => __( '404', 'sterling' ),
    'priority'              => 4
) );

    // 404 Title ---------------------------------------------------------------
    $wp_customize->add_setting( 'sterling_404_title', array (
        'default'               => __( 'Oops!', 'sterling' ),
        'transport'             => 'refresh',
        'sanitize_callback'     => 'sanitize_text_field',
    ) );
    $wp_customize->add_control( 'sterling_404_title', array (
        'type'                  => 'text',
        'section'               => 'sterling_404_text',
        'label'                 => __( '404 Title', 'sterling' ),
    ) );
    
    // 404 Message -------------------------------------------------------------
    $wp_customize->add_setting( 'sterling_404_message', array (
        'default'               => __( "We're sorry, something seems to have gone wrong.", 'sterling' ),
        'transport'             => 'refresh',
        'sanitize_callback'     => 'sanitize_text_field',
    ) );
    $wp_customize->add_control( 'sterling_404_message', array (
        'type'                  => 'text',
        'section'               => 'sterling_404_text',
        'label'                 => __( '404 Message', 'sterling' ),
    ) );
