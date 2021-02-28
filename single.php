<?php get_header(); ?>

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
    // include 'comments.php';
        if(comments_open() || get_comments_number()){
            comments_template('/comments.php');
        }
    ?>
    <div class="alert alert-secondary" role="alert" id="tags">
        <?php
            the_tags('Tags: ');
        ?>
    </div>
</div>

<?php get_footer(); ?>





