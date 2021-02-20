<?php 

/*
Plugin name: Logout user
Description: logout user from webpage
*/

// Logout user -> destroy session()
function logout_destroy_session(){
    session_destroy();
    echo "<h1>Session destroyed</h1>";
}
add_shortcode('logoutuser','logout_destroy_session');

?>