<?php 

function r_recipe_alt_auth_form_shortcode() {
    if ( is_user_logged_in() ) {
        return '';
    }
    $formHTML               =   '<div class="col-one-third nobottommargin">';
    $errors                 =   isset( $_GET['login'] ) ? explode( ',', $_GET['login'] ) : [];

    foreach ( $errors as $error ) {
        if ( $error === 'empty_username' ){
            $formHTML       .=  '<div class="alert alert-danger">Please enter username or email address.</div>';
        }
        if ( $error === 'empty_password' ){
            $formHTML       .=  '<div class="alert alert-danger">Please enter a password.</div>';
        }
        if ( $error === 'invalid_username' ){
            $formHTML       .=  '<div class="alert alert-danger">Username or email is incorrect.</div>';
        }
        if ( $error === 'incorrect_username' ){
            $formHTML       .=  '<div class="alert alert-danger">Password is incorrect.</div>';
        }
    }

    $formHTML               .=  wp_login_form([
        'echo'              =>  false,
        'redirect'          =>  home_url( '/' )
    ]);

    $formHTML               .=  '</div>';

    return $formHTML;
}

function r_alt_authenticate( $user, $username, $password ) {
    if ( $_SERVER['REQUEST_METHOD'] !== 'POST' ) {
        return $user;
    }

    if ( !is_wp_error( $user ) ) {
        return $user;
    }

    $error_codes            =   join( ',', $user->get_error_codes() );
    $login_url              =   home_url( 'my-account' );
    $login_url              =   add_query_arg(
        'login',
        $error_codes,
        $login_url
    );

    wp_redirect( $login_url );
    exit;
}