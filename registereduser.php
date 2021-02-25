<?php

function display_user_data(){
    echo "<h5>Registered user data</h5>";
}
add_shortcode('registered_user_details','display_user_data');
?>