<?php

function add_exampletwo_theme_scripts(){
    //wp_register_style();
    wp_enqueue_style( 'slider', get_template_directory_uri() . '/style.css',false,'1.1','all');
    wp_enqueue_script('custom_js',get_template_directory_uri().'js/scriptone.js',array('jquery'),1,true);
}
add_action('wp_enqueue_scripts','add_exampletwo_theme_scripts');

// register menu in header
function register_header_menu(){
    register_nav_menu('header_menu',__('Header Menu'));
}
add_action('init','register_header_menu');



?>