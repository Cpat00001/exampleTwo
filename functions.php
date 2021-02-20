<?php
// start session to get data from registration form
session_start();

//check if session exists
function check_session(){
    if(!isset($_SESSION['user_id']) && is_page(array('secret-info'))){
        $output = '';
        $output .= print_r("<h5>you dont have a session,you will be redirectected shortly</h5>");
        //user doesnt have a session -> redirect to login page
        //header("Location: http://localhost/exampleTwo/login/");
        wp_redirect('http://localhost/exampleTwo/login/');
        return $output;
    }else{
      
        $output = '';
        $output .= print_r("you have your session");
        
        return $output;
    }
}
add_shortcode('session_checker','check_session');

//if registration email is taken fire action to use javascript message in registration page
// $result = $_SESSION['email_exists'];
// var_dump($result);

// if(!isset($_SESSION['email_exists'])){
//     remove_action('wp_enqueue_scripts','show_registered_email_banner'); 
// }else{
//     wp_enqueue_script('show_banner', get_template_directory_uri() .'/js/show_banner.js',1,false);
// }
//add_action('wp_enqueue_scripts','show_registered_email_banner');

function add_exampletwo_theme_scripts(){
    //wp_register_style();
    wp_enqueue_style( 'slider', get_template_directory_uri() . '/style.css',false,'1.1','all');
}
add_action('wp_enqueue_scripts','add_exampletwo_theme_scripts');

// register menu in header
function register_header_menu(){
    register_nav_menu('header_menu',__('Header Menu'));
}
add_action('init','register_header_menu');

// add JS contact details animation to footer
function contact_details_animation(){
    wp_enqueue_script( 'script', get_template_directory_uri() . '/js/contact_details.js', array ( 'jquery' ), 1, true);
}
add_action('wp_enqueue_scripts','contact_details_animation');

// create a shortcode to be able to add variables in worpdress pages
function show_credentials(){
    global $wpdb; 
    
    $session_email = $_SESSION['registered_email'];
    // $registered_user = $wpdb->get_var($wpdb->prepare("SELECT username,email FROM {$wpdb->prefix}registered WHERE email = %s" , $session_email));
    $query  = $wpdb->prepare( "SELECT email,username FROM {$wpdb->prefix}registered WHERE email = %s", $session_email );
    $results = $wpdb->get_results( $query );

    //var_dump($session_email);
    echo "<h5>Thank you. You have been registered with email: " . ($results[0]->{'email'}) . "</h5>";
    echo "<a href='..\..\plugins\login\login_form.php'><button type='button' class='btn btn-success'>Login</button></a>";
}
add_shortcode('show_userdata','show_credentials');

?>