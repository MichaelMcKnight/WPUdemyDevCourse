<?php 

function r_activate_plugin(){
    if( version_compare( get_bloginfo( 'version' ), '5.0', '<' ) ){
        wp_die( __('You must update Wordpress to use this plugin.', 'recipe' ) );
    }

    recipe_init();
    flush_rewrite_rules();

    global $wpdb;
     $table_name = $wpdb->prefix . 'recipe_ratings';
     $wpdb_collate = $wpdb->collate;
     $sql =
         "CREATE TABLE {$table_name} (
         id bigint(20) unsigned NOT NULL auto_increment ,
         recipe_id bigint(20) unsigned NOT NULL,
         rating float(3,2) unsigned NOT NULL,
         user_ip varchar(50) NOT NULL,
         PRIMARY KEY  (id),
         KEY recipe_id (recipe_id),
         KEY rating (rating),
         KEY user_ip (user_ip)
         )
         COLLATE {$wpdb_collate}";
 
     require_once(ABSPATH . 'wp-admin/includes/upgrade.php');
     dbDelta( $sql );

     wp_schedule_event( time(), 'daily', 'r_daily_recipe_hook' );
}