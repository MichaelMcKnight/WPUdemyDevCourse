<?php

function recipe_admin_init(){
    include( 'columns.php' );
    include( 'enqueue.php' );
    include( 'settings-api.php' );

    add_filter( 'manage_recipe_posts_columns', 'r_add_new_recipe_columns' );
    add_action( 'manage_recipe_posts_custom_column', 'r_manage_recipe_columns', 10, 2 );
    add_action( 'admin_enqueue_scripts', 'r_admin_enqueue' );
    add_action( 'admin_post_r_save_options', 'r_save_options' );

    r_settings_api();
}