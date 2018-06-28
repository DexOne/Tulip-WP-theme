<!DOCTYPE html>
    <html lang="en" <?php language_attributes();?>>
        <head>
            <meta charset="<?php bloginfo('charset')?>" />
            <title>
                <?php wp_title('|', 'true', 'right') ?>
                <?php bloginfo('name');?></title>
            <link rel="pingback" href="<?php bloginfo('pingback_url');?>">
            <!-- For Working On RESPONSIVE -->
            <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1">
            
            <!-- Basic meta tags helps in SEO -->
            <meta name="description" content="Keywords">
            <meta name="author" content="Name">
            <?php wp_head();?>
            
            <!-- Add Pingback -->
            <link rel="pingback" href="<?php bloginfo('pingback_url'); ?>" />
			<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
        </head>
        <?php
        // add a class to single page
        if(is_single){
            $single = array('single-page');
        } else{
            $single = array('');
        }
        ?>
        <body <?php body_class($single);?> >
            <header class="header">
                <nav class="navbar navbar-inverse custom-nav">
                        <div class="navbar-nav nav-header navbar-fixed-top">
                            <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1" aria-expanded="false">
                                <span class="sr-only">Toggle navigation</span>
                                <span class="icon-bar"></span>
                                <span class="icon-bar"></span>
                                <span class="icon-bar"></span>
                            </button>
                            <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
                                <?php tulip_header_navwp_nav_menu('primary-menu') ?>
                            </div>
                            <p class="site-description"><?php bloginfo('description'); ?> </p>
                        </div>
                    </nav>
                    <div class="xs-col-12 site-info">
                        <div class="col-md-6 logo">
                            <?php theme_prefix_the_custom_logo()?>
                        </div>
                        <div class="col-md-6 site-head">
                            <h1 class="site-name">
								<a href="<?php echo get_home_url(); ?>" class="site-name-link">
								<?php bloginfo( 'name' ); ?>
								</a>
                            </h1>
                        </div>
                    </div>
            </header>
            <div class="clearfix"></div>