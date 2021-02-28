<?php

//call comment form
comment_form(array(
    'must_log_in' => 'false',
    'logged_in_as' => 'false'
));

//check if any posts -> if yes -> display
if (have_comments()){
    ?>
    <ol class="post-comments">
        <?php
            wp_list_comments(array(
                'style'       => 'ol',
                'short_ping'  => false,
            ));
        ?>
    </ol>
    <?php
};
?>