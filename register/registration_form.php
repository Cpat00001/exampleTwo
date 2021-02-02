<?php
/*
Plugin name: Registration form
Description: simply form to register new user in DB
*/

function add_registration_form(){
    $content = '';

    $content .= '<form method="post" action="'.plugin_dir_url(__FILE__).'process_code/">';
    $content .= '<div class="form-group">';
    $content .= ' <label for="registeremial">Your email:</label><br>';
    $content .= '<input type="text" class="form-control" name="user_email" id="emial_registration" placeholder="Enter email">';
    $content .= '</div>';
    $content .= '<div class="form-group">';
    $content .= '<label for="username">Username:</label><br>';
    $content .= '<input type="text" class="form-control" name="user_username" id="username_registration" placeholder="Enter username">';
    $content .= '</div>';
    $content .= '<button type="submit" class="btn btn-primary" name="register_submit">Register</button>';
    $content .= '</form>';

    return $content;
}
add_shortcode('registration_form','add_registration_form');

?>
