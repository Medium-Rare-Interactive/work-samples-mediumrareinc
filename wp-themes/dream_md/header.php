<?php
/**
 * The header for our theme
 *
 * This is the template that displays all of the <head> section and everything up until <div id="content">
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package dream_md
 */

?>
<!doctype html>
<html <?php language_attributes(); ?>>
<head>
	<meta charset="<?php bloginfo( 'charset' ); ?>">
	<meta name="viewport" content="width=device-width, initial-scale=1">

	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
    <link rel="stylesheet" href="<?php echo get_template_directory_uri(); ?>/css/slick.css">
    <link rel="stylesheet" href="<?php echo get_template_directory_uri(); ?>/css/slick-theme.css">
    <link rel="stylesheet" href="<?php echo get_template_directory_uri(); ?>/css/style.css?v=<?php the_time( 'mj-y' ); ?>">
    <link href="https://fonts.googleapis.com/css?family=Open+Sans:300,300i,400,400i,600,600i,700,700i" rel="stylesheet">
    <link href="https://use.fontawesome.com/releases/v5.0.6/css/all.css" rel="stylesheet">

	<link rel="profile" href="https://gmpg.org/xfn/11">
	<?php wp_head(); ?>
</head>

<body <?php body_class(); if(is_page()) { ?> data-landing="<?php if(get_field('mini_header')) echo 'active'; ?>"<?php } ?>>
    <?php if(is_page()) {
        if(get_field('mini_header')) { ?>
            <style type="text/css">
                <?php 
                if( have_rows('landing_bg') ) {
                    while( have_rows('landing_bg') ) { 
                        the_row();
                        ?>
                        body[data-landing="active"] {
                            background: linear-gradient(<?php echo get_sub_field('bg_1'); ?>, <?php echo get_sub_field('bg_2'); ?>, <?php echo get_sub_field('bg_3'); ?>);
                        }
                        <?php
                    }
                } ?>
            </style>
        <?php } 
    }
    if(get_field('mini_header') && !is_search()) { ?>
        <div class="mini_head__menu">
            <div class="menu_toggle">
                <i class="fas fa-bars"></i>
            </div>
        </div>
        <div class="top_mob__area mini_heads">
            <div class="container-fluid">
                <div class="row align-items-center">
                    <div class="col-3">
                        <div class="menu_toggle">
                            <i class="fas fa-times"></i>
                        </div>
                    </div>
                    <div class="col-6">
                        <a href="<?php echo home_url(); ?>" class="logo"><img src="<?php echo get_field('logo', 'options'); ?>" alt="logo"></a>
                    </div>
                    <div class="col-3">
                        <div class="search_toggle text-right">
                            <i class="fas fa-search"></i>
                        </div>
                        <form class="search_toggle__form" action="<?php echo home_url(); ?>/" method="get">
                            <i class="fas fa-times"></i>
                            <input type="text" name="s" id="search" class="form-control" value="<?php the_search_query(); ?>" placeholder="Type here...">
                            <button type="submit"><i class="fas fa-search"></i></button>
                        </form>
                    </div>
                </div>
                <?php wp_nav_menu( array('container_class'=>'','theme_location'=>'menu-5', 'container'=>'','menu_class'=>'top_mob__menu')); ?>
            </div>
        </div>
        <div class="container-fluid">
            <div class="row justify-content-center">
                <div class="col-6">
                    <a href="<?php echo home_url(); ?>" class="logo"><img src="<?php echo get_field('mini_logo', 'options'); ?>" alt="logo"></a>
                </div>
            </div>
        </div>
    <?php } else { ?>
        <header>
            <div class="top_area d-none d-lg-block">
                <div class="container-fluid">
                    <div class="row">
                        <div class="col-12">
                            <?php wp_nav_menu( array('container_class'=>'','theme_location'=>'menu-1', 'container'=>'','menu_class'=>'top_menu')); ?>
                            <div class="lg_search d-none d-lg-block">
                                <div class="lg_search_toggle">
                                    <i class="fas fa-search"></i>
                                </div>
                                <form action="<?php echo home_url(); ?>/" method="get">
                                    <i class="fas fa-times"></i>
                                    <input type="text" name="s" class="form-control" value="<?php the_search_query(); ?>" placeholder="Type here...">
                                    <button type="submit"><i class="fas fa-search"></i></button>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="top_sub_area sm_padd d-none d-lg-block ">
                <div class="container-fluid">
                    <div class="row align-items-center">
                        <div class="col-12 col-md-4 col-lg-4 offset-lg-2 col-xl-3 offset-xl-0">
                            <a href="<?php echo home_url(); ?>" class="logo"><img src="<?php echo get_field('logo', 'options'); ?>" alt="logo"></a>
                        </div>
                        <div class="col-12 col-md-4 col-lg-4 col-xl-3">
                            <img src="/wp-content/uploads/2018/11/aasm-accredited-facility-member-logo.png"/>
                        </div>
                        <div class="col-6 col-md-6 col-lg-6 offset-lg-3 col-xl-6 offset-xl-0 text-right d-none d-xl-block" >
                            <?php wp_nav_menu( array('container_class'=>'','theme_location'=>'menu-2', 'container'=>'','menu_class'=>'main_menu')); ?>
                        </div>
                        <div class="col-6 col-md-6 col-lg-6 offset-lg-3 col-xl-6 offset-xl-0 d-xl-none text-center">
                            <?php wp_nav_menu( array('container_class'=>'','theme_location'=>'menu-2', 'container'=>'','menu_class'=>'main_menu')); ?>
                        </div>
                    </div>
                </div>
            </div>
            <div class="d-block d-lg-none">
                <div class="top_mob">
                    <div class="container-fluid">
                        <div class="row align-items-center">
                            <div class="col-3">
                                <div class="menu_toggle">
                                    <i class="fas fa-bars"></i>
                                    <i class="fas fa-times"></i>
                                </div>
                            </div>
                            <div class="col-6">
                                <a href="<?php echo home_url(); ?>" class="logo"><img src="<?php echo get_field('logo', 'options'); ?>" alt="logo"></a>
                            </div>
                            <div class="col-3">
                                <div class="search_toggle text-right">
                                    <i class="fas fa-search"></i>
                                </div>
                                <form class="search_toggle__form" action="<?php echo home_url(); ?>/" method="get">
                                    <i class="fas fa-times"></i>
                                    <input type="text" name="s" id="search" class="form-control" value="<?php the_search_query(); ?>" placeholder="Type here...">
                                    <button type="submit"><i class="fas fa-search"></i></button>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="top_mob__area">
                    <div class="container-fluid">
                        <?php wp_nav_menu( array('container_class'=>'','theme_location'=>'menu-3', 'container'=>'','menu_class'=>'top_mob__menu')); ?>
                        <?php wp_nav_menu( array('container_class'=>'','theme_location'=>'menu-4', 'container'=>'','menu_class'=>'top_mob__btns')); ?>
                    </div>
                </div>
            </div>
        </header>
    <?php } ?>
