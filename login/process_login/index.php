<?php
//start session for login purpose
session_start();

$path = preg_replace('/wp-content.*$/','',__DIR__);

require_once($path."wp-load.php");

$error = '';

if(isset($_POST['login_submit']) && !empty($_POST['user_email']) && !empty($_POST['login_username'])){
    $log_email = sanitize_email($_POST['user_email']);
    //echo $log_email;
    $log_username = sanitize_user($_POST['login_username']);
    //echo "sprawdzam userane z input field";
    //var_dump($log_username);
    //echo "<h3>Submitted form not empty, lets check users existance</h3>";
    // check if user existsc in DB table and both submitted values are correct/exists
    //1) check if users with submitted email exists
    global $wpdb;

    $check_email = $wpdb->prepare("SELECT id,email,username FROM {$wpdb->prefix}registered WHERE email = %s", $log_email);
    $result = $wpdb->get_results($check_email);
    //echo "rzuc wynik email i username</br>";
    //var_dump($result);

    if($result > 0){
        //print_r($result);
        //echo "<h1>email registered and found</h1>";
        //check if submitted user name during login is the same as registered
        //var_dump($log_username);
        //echo "</br>";
        $compare_user = $wpdb->prepare("SELECT id,username FROM {$wpdb->prefix}registered WHERE email= %s",$log_email );
        $user_from_db = $wpdb->get_results($compare_user);
        //echo "rzuc wynik username z DB </br>";
        //var_dump($user_from_db);
        if($user_from_db){
            foreach($user_from_db as $res){
                $registered_username = $res->username;
                $registered_username_id = $res->id;
            }
            //var_dump($username);
            if(strtolower($log_username) !== strtolower($registered_username)){
                //header("Location: http://localhost/exampleTwo/login/");
                echo "<h1>WRONG USERNAME or PASSWORD</h1>";
            }else{
                //echo "<h1>THE SAME USER SUBMITTED - WELCOME</h1>";
                //var_dump($registered_username_id);
                // give loggedIn user a session ID 
                $_SESSION['user_id'] = $registered_username_id;
                header("Location: http://localhost/exampleTwo/loggedin/");
            }
        }
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