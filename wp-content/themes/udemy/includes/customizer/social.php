<?php

function ju_social_customizer_section( $wp_customize ){
    $wp_customize->add_setting( 'ju_facebook_handle', [
        'default'   =>  '',
    ]);

    $wp_customize->add_setting( 'ju_twitter_handle', [
        'default'   =>  '',
    ]);

    $wp_customize->add_setting( 'ju_instagram_handle', [
        'default'   =>  '',
    ]);

    $wp_customize->add_setting( 'ju_email', [
        'default'   =>  '',
    ]);

    $wp_customize->add_setting( 'ju_phone_number', [
        'default'   =>  '',
    ]);

    $wp_customize->add_section( 'ju_social_section', [
        'title'             =>  __( 'Udemy Social Settings', 'udemy' ),
        'priority'          =>  30,
        'panel'             =>  'udemy'
    ]);

    $wp_customize->add_control( new WP_Customize_Control(
        $wp_customize,
        'ju_social_facebook_input',
        array(
            'label'         =>  __( 'Facebook Handle', 'udemy' ),
            'section'       =>  'ju_social_section',
            'settings'      =>  'ju_facebook_handle',
            'type'          =>  'text'
        )
    ));

    $wp_customize->add_control( new WP_Customize_Control(
        $wp_customize,
        'ju_social_twitter_input',
        array(
            'label'         =>  __( 'Twitter Handle', 'udemy' ),
            'section'       =>  'ju_social_section',
            'settings'      =>  'ju_twitter_handle',
            'type'          =>  'text'
        )
    ));

    $wp_customize->add_control( new WP_Customize_Control(
        $wp_customize,
        'ju_social_instagram_input',
        array(
            'label'         =>  __( 'Instagram Handle', 'udemy' ),
            'section'       =>  'ju_social_section',
            'settings'      =>  'ju_instagram_handle',
            'type'          =>  'text'
        )
    ));

    $wp_customize->add_control( new WP_Customize_Control(
        $wp_customize,
        'ju_email_input',
        array(
            'label'         =>  __( 'Email', 'udemy' ),
            'section'       =>  'ju_social_section',
            'settings'      =>  'ju_email',
            'type'          =>  'text'
        )
    ));

    $wp_customize->add_control( new WP_Customize_Control(
        $wp_customize,
        'ju_phone_number_input',
        array(
            'label'         =>  __( 'Phone Number', 'udemy' ),
            'section'       =>  'ju_social_section',
            'settings'      =>  'ju_phone_number',
            'type'          =>  'text'
        )
    ));
}