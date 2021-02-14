<?php

function check_session(){
    if(isset($_SESSION['user_id'])){
        $output = '';
        $output .= print_r("you have your session");
        return $output;
    }else{
        $output = '';
        $output .= print_r("you dont have a session,you will be redirectected shortly");
        return $output;
    }
}
add_shortcode('session_checker','check_session');

?>