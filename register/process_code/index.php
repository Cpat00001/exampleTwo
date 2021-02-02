<?php

$path = preg_replace('/wp-content.*$/','',__DIR__);

require_once($path."wp-load.php");

// get submitted values
if(isset($_POST['register_submit'])){
    // echo print_r($_POST);
    $email = sanitize_text_field($_POST['user_email']);
    $username = sanitize_text_field($_POST['user_username']);

   echo "Thank you for submitting form. You are registered with <br> email: " . $email . " <br> and username: " . $username;
}

?>