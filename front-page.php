<?php get_header(); ?>

<div class="container" id="fp_div1">
    <div class="row">
        <div class="col-12 col-md-8 " id="fp_div1_left">
            <h2>Some general info here</h2>
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
        <div class="col-12 col-md-4 " id="fp_div1_right">
            <h2>Last news</h2>
            <p>Add Sidebar</p>
        </div>
    </div>
</div>

<?php get_footer(); ?>


