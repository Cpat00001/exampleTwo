<?php

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
    global $xyz;
    wp_json_encode(var_dump($xyz));
    //$value = $wpdb->get_var($wpdb->prepare("SELECT username,email FROM {$wpdb->prefix}registered WHERE id = %d" , $email));
    //var_dump($value);
}
add_shortcode('show_userdata','show_credentials');
?>