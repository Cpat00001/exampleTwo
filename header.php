<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
    <?php wp_head(); ?>
</head>
<body <?php body_class('classname');?> id="body">
    
<div class="container" id="header_one">
    <div class="row">
        <div class="col-6 d-flex justify-content-start">
            <a href="<?php echo get_home_url();?>"><h1>Logo IMG</h1></a>
        </div>
        <div class="col-6 container d-flex justify-content-end align-items-center">
            <?php wp_nav_menu(array('theme_location' => 'header_menu')); ?>
        </div>
    </div>
    
</div>