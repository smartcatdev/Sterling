<?php
$wp_customize->add_panel( 'sterling_404', array (
    'title'                 => __( '404', 'sterling' ),
    'description'           => __( 'Customize your 404 page', 'sterling' ),
    'priority'              => 4
) );

    $wp_customize->add_section( 'sterling_404_text', array (
        'title'                 => __( '404 Text', 'sterling' ),
        'panel'                 => 'sterling_404'
    ) );
//        404 Title-------------------------------------------------------------
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
//        404 Message-------------------------------------------------------------
        $wp_customize->add_setting( 'sterling_404_message', array (
            'default'               => __( "WE'RE SORRY, BUT SOMETHING WENT WRONG", 'sterling' ),
            'transport'             => 'refresh',
            'sanitize_callback'     => 'sanitize_text_field',
        ) );
        $wp_customize->add_control( 'sterling_404_message', array (
            'type'                  => 'text',
            'section'               => 'sterling_404_text',
            'label'                 => __( '404 Message', 'sterling' ),
        ) );
