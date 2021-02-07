<?php
// start session
session_start();

$path = preg_replace('/wp-content.*$/','',__DIR__);

require_once($path."wp-load.php");

// get submitted values
if(isset($_POST['register_submit'])){
    // echo print_r($_POST);
    global $xyz;
    $xyz = sanitize_text_field($_POST['user_email']);
    $username = sanitize_text_field($_POST['user_username']);
    // set session variables in order to pass user input
    $_SESSION["registered_email"] = $xyz;
    //print_r($_SESSION);

    // check if submitted email is already registered
    $query  = $wpdb->prepare( "SELECT email,username FROM {$wpdb->prefix}registered WHERE email = %s", $xyz );
    $result = $wpdb->get_results( $query );
    // var_dump($result);
    if($result){
        //echo "SORRY User exists with this email";
        $_SESSION['email_exists'] = $result;
        //var_dump($_SESSION['email_exists']);
        //wp_redirect('http://localhost/exampleTwo/register');
    }else{
    //insert user data to DB table
        global $wpdb;
        $table = 'wp_registered';
        $data = array('username'=> $username, 'email' => $xyz);
        $format = array('%s','%s');
        $success = $wpdb->insert($table,$data,$format);
            //if user registered in DB redirect to Successfull page with a confirmation message
            if($success){
                echo "RECORD WPISANY DO TABELI";
                // var_dump($email);
                wp_redirect('http://localhost/exampleTwo/successful-registration/');
            }
    }
}

?>