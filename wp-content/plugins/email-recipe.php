<?php 

/**
 * Plugin Name: Recipe E-mail Rating
 * Description: This plugin extends the Recipe plugin. 
 */

 add_action( 'recipe_rated', function( $arr ){
    $post                   =   get_post( $arr['post_id'] );
    $usr_email              =   get_the_author_meta( 'user_email', $post->post_author );
    $subject                =   'Your recipe has received a new rating.',
    $message                =   'Your recipie ' . $post->post_title . ' has received a rating of ' . $arr['rating'] . '.';

    wp_mail( $usr_email, $subject, $message );
 });