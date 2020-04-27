<!doctype html>
<html lang="en">

<head>
    <meta charset="<?php bloginfo('charset'); ?>">
    <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no">
    <title><?php bloginfo('name'); ?></title>
    <?php wp_head(); ?>
</head>

<body>
   <!-- container -->
    <div class="container-fluid">

        <!-- header -->
        <header>
            <!-- nav -->
            <nav class="navbar navbar-expand-lg navbar-light bg-light" role="navigation">
                <a class="navbar-brand" href="#">ARABELLA</a>
                <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="#navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                    <span class="navbar-toggler-icon"></span>
                </button>

                <div class="collapse navbar-collapse" id="navbarSupportedContent">
                    <?php
                        wp_nav_menu( array(
                            'theme_location'    => 'primary',
                            'depth'             => 1,
                            'container'         => 'div',
                            'container_class'   => 'collapse navbar-collapse',
                            'container_id'      => 'navbarSupportedContent',
                            'menu_class'        => 'navbar-nav mr-auto',
                            'fallback_cb'       => 'WP_Bootstrap_Navwalker::fallback',
                            'walker'            => new WP_Bootstrap_Navwalker()
                        ) );
                    ?>
                    <form class="form-inline">
                        <div class="input-group">
                            <input type="search" class="form-control" aria-label="Username" aria-describedby="Search">
                            <div class="input-group-prepend">
                                <button class="input-group-text" type="submit">Search</button>
                            </div> 
                        </div>
                    </form>
                </div>
            
            </nav>
            <!-- nav -->
        </header>
        <!-- header -->