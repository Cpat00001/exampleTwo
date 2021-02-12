<?php

/*
Plugin name: Login form
Description: simply form to login new user
*/

function add_login_form(){

    $content = '';

    $content .= '<form method="post" action="'. plugin_dir_url(__FILE__).'/process_login">';
    $content .= '<div class="form-group">';
    $content .= '<label for="loginemail">Email address</label>';
    $content .= '<input type="email" class="form-control" id="loginemail" aria-describedby="emailHelp" placeholder="Enter email">';
    $content .= '<small id="emailHelp" class="form-text text-muted">Use your email from registration process</small>';
    $content .= '</div>';
    $content .= ' <div class="form-group">';
    $content .= '<label for="loginPassword">Password</label>';
    $content .= '<input type="password" class="form-control" id="loginPassword" placeholder="Password">';
    $content .= '</div>';
    $content .= '<button type="submit" class="btn btn-primary" name="register_submit">Register</button>';
    $content .= '</form>';

    return $content;
}

add_shortcode('login_form','add_login_form');

?>