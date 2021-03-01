<?php

function display_user_data(){
    global $wpdb;
    global $u;
   $us = $_SESSION['regusername'];
   var_dump($us);

   //select user
  
    echo "<h1>Hello from show_user_details</h1>";
    echo "<h5>Registered user data $us</h5>";

    unset($_SESSION['regusername']);
}
add_shortcode('registered_user_details','display_user_data');
?>

