<?php

$path = preg_replace('/wp-content.*$/','',__DIR__);

require_once($path."wp-load.php");

// get submitted values
if(isset($_POST['register_submit'])){
    // echo print_r($_POST);
    global $xyz;
    $xyz = sanitize_text_field($_POST['user_email']);
    $username = sanitize_text_field($_POST['user_username']);

   

    //insert user data to DB table
    global $wpdb;
    // define("USER_EMAIL",$email);
    $table = 'wp_registered';
    $data = array('username'=> $username, 'email' => $xyz);
    $format = array('%s','%s');
    $success = $wpdb->insert($table,$data,$format);
    if($success){
        echo "RECORD WPISANY DO TABELI";
        // var_dump($email);
        wp_redirect('http://localhost/exampleTwo/successful-registration/');
    }
}

?>