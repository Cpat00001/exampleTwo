<?php get_header();?>
<?php include 'check_session.php';?>
<?php

//globals
global $wpdb;

?>

<div class="container" style="background-color:green">
    <div class="row">
        <div class="col-sm-8" id="logged_left1">
            <h5>Private posts</h5>
            <?php
//do a loop with private posts only
//prepare args for WP_Query => condition for displayed posts
$select_private_posts = array(
    'post_type' => 'post',
    'category_name' => 'hidden',
    'posts_per_page' => 3,
);
//WP_QUERY
$private_posts = new WP_Query($select_private_posts);
// do a loop and display posts
if ($private_posts->have_posts()) {
    echo '<ul>';
    while ($private_posts->have_posts()) {
        $private_posts->the_post();
        echo "<li><a href='" . get_the_permalink() . "' id='hidden_list'>" . get_the_title() . "</a></li></br>";
    }
    echo "</ul>";
    /* Restore original Post Data */
    wp_reset_postdata();
}

?>
        </div>
        <div class="col-sm-4" id="logged_right1">
            <h5>Registered Users</h5>
            <!-- display registered users -->
            <?php
$results = $wpdb->get_results("SELECT username FROM {$wpdb->prefix}registered");
//var_dump($results);

foreach ($results as $row) {
    global $u;
    $u = $row->username;
    $_SESSION['regusername'] = $u;
    //var_dump($u);
    //$us = get_query_var('username');
    //var_dump($us);
    echo "<ul>";
    // echo "<li><a href='https://localhost/exampleTwo/user-profile/$u' id='link' onclick='showUser()'>" . $row->username . "</li></a>";
    echo "<li><a href='https://localhost/exampleTwo/user-profile/' id='link' name='$u' onclick='showUser();'>" . $row->username . "</li></a>";
    //echo "<h5>".$_SESSION['regusername']."</h5>";
    echo "</ul>";
    ?>
    <script type="text/javascript">
        function showUser(e){
            //e.preventDefault();
            const out = document.getElementById('link').name;
            console.log(out);
            sessionStorage.setItem("reguser", out);

            console.log(e)
            const lin = document.getElementById('link').href;
            alert(typeof(lin) + " " + lin);
            if(lin !== 'https://localhost/exampleTwo/user-profile'){
                window.location = 'https://localhost/exampleTwo/user-profile/';
                console.log('TRUE');
                return false;
            }else{
                console.log('FALSE');
            }

        }
    </script> 
    <?php
}
?>
        </div>
    </div>
</div>

<?php get_footer();?>