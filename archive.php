<?php get_header(); ?>

<div class="archive_container container">
    <!-- display posts from CMS-->
    <?php
    
    if(have_posts()): 
        while(have_posts()): the_post();
        ?>
            <a href="<?php the_permalink();?>" id="post_link"><?php the_title('<h1>','</h1>'); ?></a>
            <p><?php the_content(); ?></p>
        <?php
        endwhile;
    endif;
    ?>
    
</div>

<?php get_footer(); ?>