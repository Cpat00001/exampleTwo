<?php get_header(); 

/*
Template Name: Shop Page
*/


?>
<div class="page_container container">
    <!-- display content from CMS-->
    <?php
            
            if(have_posts()): 
                while(have_posts()): the_post();
                ?>
                    <?php the_title('<h1>','</h1>') ?>
                    <p><?php the_content(); ?></p>
                <?php
                endwhile;
            endif;
    ?>
    
</div>

<?php get_footer(); ?>


