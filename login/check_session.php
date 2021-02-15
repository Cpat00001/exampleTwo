<?php

/*
Plugin name: Session checker
Description: checks users session
*/


// session checker
function check_session(){
    if(!isset($_SESSION['user_id'])){
        // $output = '';
        // $output .= print_r("you dont have a session,you will be redirectected shortly");
        //user doesnt have a session -> redirect to login page
        header("Location: http://localhost/exampleTwo/login/");
        // return $output;
    }else{
      
        $output = '';
        $output .= print_r("you have your session");
        
        return $output;
    }
}
add_shortcode('session_checker','check_session');

?>