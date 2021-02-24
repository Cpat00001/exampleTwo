<?php 
// session checker
if(!isset($_SESSION['user_id'])){
        ?>
        <script type="text/javascript">
            window.location = "https://localhost/exampleTwo/login/";
        </script>
        <?php
        // return $output;
    }else{
      
        $output = '';
        //$output .= print_r("you have your session");
        
        return $output;
    }
?>