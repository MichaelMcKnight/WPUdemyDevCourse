<?php 

function ju_setup_theme(){
    add_theme_support( 'post-thumbnails' );
    add_theme_support( 'title-tag' );
    add_theme_support( 'custom-logo' );
    add_theme_support( 'automatic-feed-links' );
    add_theme_support( 'html5', array( 'comment-list', 'comment-form', 'search-form', 'gallery', 'caption' ) );
    add_theme_support( 'starter-content', [
        //Set the WP Options table option "fresh_site" to 1 in PHPMyAdmin in order to test this if the theme isn't fresly installed.
        'widgets'               =>  [
            //Place three core-defined widgets in the sidebar area.
            'ju_sidebar'        =>  [
                'text_buisess_info', 'search', 'text_about'
            ]
        ],

        //Create the custom image attachments used as post thumbnails for pages.
        'attachments'           =>  [
            'image-about'       =>  [
                'post_title'    =>  __( 'About', 'udemy' ),
                'file'          =>  '/assets/images/about/1.jpg' //URL relative to the template directory.
            ]
        ],

        //Specify the core-defined pages to create and add custom thumbnails to some of them.
        'posts'                 =>  [
            'home'              =>  array(
                'thumbnail'     =>  '{{image-about}}'
            ),
            'about'              =>  array(
                'thumbnail'     =>  '{{image-about}}'
            ),
            'contact'              =>  array(
                'thumbnail'     =>  '{{image-about}}'
            ),
            'blog'              =>  array(
                'thumbnail'     =>  '{{image-about}}'
            ),
            'homepage-section'              =>  array(
                'thumbnail'     =>  '{{image-about}}'
            ),
        ],

        //Default to a static front page and assign the front and posts page.
        'options'               =>  [
            'show_on_front'     =>  'page',
            'page_on_front'     =>  '{{home}}',
            'page_for_posts'    =>  '{{blog}}'
        ],

        //Set the front page section theme mods to the IDs of the core-registered pages.
        'theme_mods'            =>  [
            'ju_facebook_handle'    =>  'udemy',
            'ju_twitter_handle'     =>  'udemy',
            'ju_instagram_handle'   =>  'udemy',
            'ju_email'              =>  'udemy',
            'ju_phone_number'       =>  'udemy',
            'ju_header_show_search' =>  'yes',
            'ju_header_show_cart'   =>  'yes'
        ],

        //Set up nav menues for each of the areas registered in the theme.
        'nav_menus'                 =>  [
            'primary'               =>  array(
                'name'              =>  __( 'Primary Menu', 'udemy' ),
                'items'             =>  array(
                    'link_home',//Note that the core "home" page is actually a link in case a static front page is not used.
                    'page_about',
                    'page_blog',
                    'page_contact'
                )
            ),
            'secondary'               =>  array(
                'name'              =>  __( 'Secondary Menu', 'udemy' ),
                'items'             =>  array(
                    'link_home',//Note that the core "home" page is actually a link in case a static front page is not used.
                    'page_about',
                    'page_blog',
                    'page_contact'
                )
            ),
        ]
    ]);

    register_nav_menu( 'primary', __( 'Primary Menu', 'udemy' ) );
    register_nav_menu( 'secondary', __( 'Secondary Menu', 'udemy' ) );

    if (function_exists('quads_register_ad')){
        quads_register_ad( array(
            'location' => 'udemy_header', 
            'description' => 'Udemy Header position'
            ) 
        );
    }
}