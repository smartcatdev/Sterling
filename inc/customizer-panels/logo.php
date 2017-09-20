<?php

    // Use Custom Logo Height?
    $wp_customize->add_setting( 'sterling_custom_logo_height_toggle', array (
        'default'               => 'off',
        'transport'             => 'refresh',
        'sanitize_callback'     => 'sterling_sanitize_on_off_toggle',
    ) );
    $wp_customize->add_control( 'sterling_custom_logo_height_toggle', array(
        'type'                  => 'radio',
        'section'               => 'title_tagline',
        'label'                 => __( 'Use the Custom Logo Height value below?', 'sterling' ),
        'choices'               => array(
            'on'        => __( 'On', 'sterling' ),
            'off'       => __( 'Off', 'sterling' ),
    ) ) );

    // Custom Logo Height Value
    $wp_customize->add_setting( 'sterling_custom_logo_height', array (
        'default'               => 96,
        'transport'             => 'refresh',
        'sanitize_callback'     => 'sterling_sanitize_integer',
    ) );
    $wp_customize->add_control( 'sterling_custom_logo_height', array(
        'type'                  => 'number',
        'section'               => 'title_tagline',
        'label'                 => __( 'Custom Logo Height', 'sterling' ),
        'description'           => __( 'Set in pixels. Width will automatically maintain the image aspect ratio.', 'sterling' ),
        'input_attrs'           => array(
            'min' => 20,
            'max' => 500,
            'step' => 1,
    ) ) );