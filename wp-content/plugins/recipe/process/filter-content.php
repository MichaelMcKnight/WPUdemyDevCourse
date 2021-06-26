<?php

function r_filter_recipe_content( $content ){
    if( !is_singular( 'recipe' ) ){
        return $content;
    }

    global $post, $wpdb;
    $recipe_data            =   get_post_meta( $post->ID, 'recipe_data', true );
    $recipe_tpl_res         =   wp_remote_get(
        plugins_url( 'process/recipe-template.php', RECIPE_PLUGIN_URL )
    );
    $recipe_html            =   wp_remote_retrieve_body( $recipe_tpl_res );
    $recipe_html            =   str_replace( 'RATE_I18N', __( 'Rating', 'recipe' ), $recipe_html );
    $recipe_html            =   str_replace( 'RECIPE_ID', $post->ID, $recipe_html );
    $recipe_html            =   str_replace( 'RECIPE_RATING', $recipe_data['rating'], $recipe_html );

    $user_IP                =   $_SERVER['REMOTE_ADDR'];

    $rating_count           =   $wpdb->get_var($wpdb->prepare(
        "SELECT COUNT(*) FROM `" . $wpdb->prefix . "recipe_ratings`
        WHERE recipe_id=%d AND user_ip=%s",
        $post->ID, $user_IP
    ));

    if ( $rating_count > 0 ){
        $recipe_html        =   str_replace(
            'READONLY_PLACEHOLDER', 'data-rateit-READONLY=true', $recipe_html
        );
    } else {
        $recipe_html        =   str_replace( 'READONLY_PLACEHOLDER', '', $recipe_html );
    }

    return $recipe_html . $content;
}