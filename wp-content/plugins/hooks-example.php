<?php
/**
 * Plugin Name: Hooks Example
 */

//  function ju_title( $title ){
//      return 'Hooked ' . $title;
//  }

//  function ju_footer_shoutout(){
//      echo 'Hook Example plugin was here. <br>';
//  }

//  function ju_footer_shoutout_v2(){
//     echo 'Hook Example plugin was here. Version 2. <br>';
// }

//  add_filter( 'the_title', 'ju_title' );
//  add_action( 'wp_footer', 'ju_footer_shoutout' );
//  add_action( 'wp_footer', 'ju_footer_shoutout_v2', 5 );

function ju_footer(){
    do_action( 'ju_custom_footer' );
}

function ju_kill_wp(){
    echo 'Hello';
}

add_action( 'wp_footer', 'ju_footer' );
add_action( 'ju_custom_footer', 'ju_kill_wp' );