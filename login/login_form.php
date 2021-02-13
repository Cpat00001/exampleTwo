<?php

/*
Plugin name: Login form
Description: simply form to login new user
*/

// dzialajacy HTML formularz logowania

function add_login_form(){

    // $content = '';
    
    // $content .= '<form method="post" action="'. plugin_dir_url(__FILE__).'/process_login">';
    // $content .= '<div class="form-group">';
    // $content .= '<label for="loginemail">Email address</label>';
    // $content .= '<input type="text" name="login_email" class="form-control" id="loginemail" aria-describedby="emailHelp" placeholder="Enter email">';
    // $content .= '<small id="emailHelp" class="form-text text-muted">Use your email from registration process</small>';
    // $content .= '</div>';
    // $content .= ' <div class="form-group">';
    // $content .= '<label for="loginPassword">Password</label>';
    // $content .= '<input type="text" class="form-control" name="login_password" id="username_registration" placeholder="Enter username">';
    // $content .= '</div>';
    // $content .= '<button type="submit" class="btn btn-primary" name="login_submit">Register</button>';
    // $content .= '</form>';

    // return $content;

    $content = '';

    $content .= '<form method="post" action="'.plugin_dir_url(__FILE__).'process_login/">';
    $content .= '<div class="form-group">';
    $content .= ' <label for="registeremial">Your email:</label><br>';
    $content .= '<input type="email" class="form-control" name="user_email" id="emial_registration" placeholder="Enter email">';
    $content .= '<small id="emailHelp" class="form-text text-muted">Use your email from registration process</small>';
    $content .= '</div>';
    $content .= '<div class="form-group">';
    $content .= '<label for="username">Username:</label><br>';
    $content .= '<input type="text" class="form-control" name="login_username" id="username_registration" placeholder="Enter username">';
    $content .= '</div>';
    $content .= '<button type="submit" class="btn btn-primary" name="login_submit">Register</button>';
    $content .= '</form>';

    return $content;
}

add_shortcode('login_form','add_login_form');

//koniec kodu do formularzu HTML logowania

//sposob WordPressa
// zaloz strone login-page.php i dodaj ponizszy kod

// $args = array(
//     'redirect'          => 'http://localhost/exampleTwo/wp-content/plugins/login/process_login/',
//     'form_id'           => 'login_form',
//     'label_username'    => 'User Email',
//     'label_password'    => 'Password',
//     'id_username'       => 'user_login',
//     'id_password'       => 'user_pass',
// );

// wp_login_form($args);

?>