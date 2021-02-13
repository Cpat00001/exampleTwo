<?php

$path = preg_replace('/wp-content.*$/','',__DIR__);

require_once($path."wp-load.php");

$error = '';

if(isset($_POST['login_submit']) && !empty($_POST['user_email']) && !empty($_POST['login_username'])){
    $log_email = sanitize_email($_POST['user_email']);
    //echo $log_email;
    $log_username = sanitize_user($_POST['login_username']);
    //print_r($log_username);
    echo "<h3>Submitted form not empty, lets check users existance</h3>";
    // check if user existsc in DB table and both submitted values are correct/exists
    //1) check if users with submitted email exists
    global $wpdb;

    $check_email = $wpdb->prepare("SELECT email FROM {$wpdb->prefix}registered WHERE email = %s", $log_email);
    $result = $wpdb->get_results($check_email);
    var_dump($result);

    if($result > 0){
        print_r($result);
        echo "<h1>email registered and found</h1>";
    }

    //2) check if user with submitted email has the same username as given in login form
}else{
    $log_email = sanitize_email($_POST['user_email']);
    //echo $log_email;
    $log_username = sanitize_user($_POST['login_username']);
    //print_r($log_username);
    if(empty($log_email)){
        $errors = "email is required </br>";
    }
    if(empty($log_username)){
        $errors = "username cannot be empty </br>";
    }
}
if(!empty($errors)){
    echo $errors . "</br>";
    echo "<a href='http://localhost/exampleTwo/login/'>Try Login again</a>";
}


?>