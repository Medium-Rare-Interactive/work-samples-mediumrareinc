<?php
/**
 * The header for our theme
 *
 * This is the template that displays all of the <head> section and everything up until <div id="content">
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package nt_beverages
 */

?>
<!doctype html>
<html <?php language_attributes(); ?>>
<head>
	<meta charset="<?php bloginfo( 'charset' ); ?>">
	<meta name="viewport" content="width=device-width, initial-scale=1">

	<style>
        .loader,
        .loader:before,
        .loader:after {
            border-radius: 50%;
            width: 18px;
            height: 18px;
            -webkit-animation-fill-mode: both;
            animation-fill-mode: both;
            -webkit-animation: load7 1.8s infinite ease-in-out;
            animation: load7 1.8s infinite ease-in-out;
        }
        .loader {
            color: #00a6c8;
            font-size: 10px;
            top: 50%;
            left: 50%;
            margin: 10px 0 0;
            position: relative;
            z-index: 999;
            text-indent: -9999em;
            -webkit-transform: translateZ(0);
            -ms-transform: translateZ(0);
            transform: translateZ(0);
            -webkit-animation-delay: -0.16s;
            animation-delay: -0.16s;
        }
        .loader:before,
        .loader:after {
            content: '';
            position: absolute;
            top: 0;
        }
        .loader:before {
            left: -3.5em;
            -webkit-animation-delay: -0.32s;
            animation-delay: -0.32s;
        }
        .loader:after {
            left: 3.5em;
        }
        @-webkit-keyframes load7 {
            0%,
            80%,
            100% {
                box-shadow: 0 2.5em 0 -1.3em;
            }
            40% {
                box-shadow: 0 2.5em 0 0;
            }
        }
        @keyframes load7 {
            0%,
            80%,
            100% {
                box-shadow: 0 2.5em 0 -1.3em;
            }
            40% {
                box-shadow: 0 2.5em 0 0;
            }
        }
        .load_outer {
            height: 100%;
            width: 100%;
            position: fixed;
            top: 0;
            left: 0;
            z-index: 9999;
            background: #fff;
        }
        #load_logo img {
            display: block;
            width: 154px;
            position: fixed;
            left: 50%;
            top: 50%;
            z-index: 1;
            margin: -130px 0 0 -72px;
        }
    </style>
    <script>
        var myVar;
        function myFunction() {
            myVar = setTimeout(showPage, 0);
        }
        function showPage() {
            document.getElementById("load_outer").style.display = "none";
        }
    </script>
    
    <link rel="apple-touch-icon" sizes="180x180" href="<?php echo get_template_directory_uri(); ?>/images/apple-touch-icon.png">
    <link rel="icon" type="image/png" sizes="32x32" href="<?php echo get_template_directory_uri(); ?>/images/favicon-32x32.png">
    <link rel="icon" type="image/png" sizes="16x16" href="<?php echo get_template_directory_uri(); ?>/images/favicon-16x16.png">
    <link rel="manifest" href="<?php echo get_template_directory_uri(); ?>/images/manifest.json">
    <link rel="mask-icon" href="<?php echo get_template_directory_uri(); ?>/images/safari-pinned-tab.svg" color="#00a6c8">
    <link rel="shortcut icon" href="<?php echo get_template_directory_uri(); ?>/images/favicon.ico">
    <meta name="msapplication-config" content="<?php echo get_template_directory_uri(); ?>/images/browserconfig.xml">
    <meta name="theme-color" content="#00a6c8">
    <link href="<?php echo get_template_directory_uri(); ?>/css/animate.css" rel="stylesheet" type="text/css">
    <link href="<?php echo get_template_directory_uri(); ?>/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css?family=Ubuntu:300,300i,400,400i,500,500i,700,700i" rel="stylesheet">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.6.1/css/font-awesome.min.css">
    <?php if(is_home() || is_front_page()) { ?>
    <link rel="stylesheet" href="<?php echo get_template_directory_uri(); ?>/css/slick.css">
    <link rel="stylesheet" href="<?php echo get_template_directory_uri(); ?>/css/slick-theme.css">
	<?php } ?>

    <!-- HTML5 shim and Respond.js for IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
    <script src="https://oss.maxcdn.com/html5shiv/3.7.3/html5shiv.min.js"></script>
    <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
    <![endif]-->

	<link rel="profile" href="http://gmpg.org/xfn/11">
	<?php wp_head(); ?>
    <link href="<?php echo get_template_directory_uri(); ?>/css/style.css" rel="stylesheet">

</head>

<body <?php body_class(); ?> onload="myFunction()">

	<div id="load_outer" class="load_outer">
        <div class="loader">Loading...</div>
        <div id="load_logo"><img src="<?php echo get_template_directory_uri(); ?>/images/logo.png" alt="NT Beverages"></div>
    </div>
	
	<div id="main_outer" class="main_outer">
		<header>
			<div class="container text-center">
                <a href="<?php echo home_url(); ?>" class="logo wow fadeInDown" data-wow-duration="0.6s" data-wow-delay="0.65s"><img src="<?php echo get_template_directory_uri(); ?>/images/logo.png" alt="logo"></a>
                <div class="col-sm-5 col-xs-12 main_menu hidden-xs wow fadeInLeft" data-wow-duration="0.50s" data-wow-delay="0.55s">
                    <?php wp_nav_menu( array('container_class'=>'','theme_location'=>'menu-1', 'container'=>'','menu_class'=>'')); ?>
                </div>
                <div class="col-sm-5 pull-right main_menu col-xs-12 hidden-xs wow fadeInRight" data-wow-duration="0.50s" data-wow-delay="0.55s">
                    <?php wp_nav_menu( array('container_class'=>'','theme_location'=>'menu-2', 'container'=>'','menu_class'=>'')); ?>
                </div>
                <div class="col-xs-12 visible-xs">
                    <div class="proj-bar">
                        <a class="proj-menu-toggle"></a>
                    </div>
                    <?php wp_nav_menu( array('container_class'=>'','theme_location'=>'menu-4', 'container'=>'','menu_class'=>'mobile_menu')); ?>
                </div>
            </div>
		</header>
        <?php if(!is_home() && !is_front_page() && !is_page(55)) { ?>
        <?php if(is_singular('career')) { ?>
        <div class="banner_out">
            <div class="page_banner wow fadeIn" data-wow-duration="0.50s" data-wow-delay="0.55s" style="background-image: url('<?php echo get_template_directory_uri(); ?>/images/vacancies.jpg');">
                <img class="hidden" src="<?php echo get_template_directory_uri(); ?>/images/vacancies.jpg" alt="<?php the_title(); ?>">
            </div>
        </div>
        <?php } else {
            if(get_field('banner_image')) { ?>
            <div class="banner_out">
                <div class="page_banner wow fadeIn" data-wow-duration="0.50s" data-wow-delay="0.55s" style="background-image: url('<?php the_field('banner_image'); ?>');">
                    <img class="hidden" src="<?php the_field('banner_image'); ?>" alt="<?php the_title(); ?>">
                </div>
            </div>
            <?php } else { ?>
            <div class="banner_out">
                <div class="page_banner wow fadeIn" data-wow-duration="0.50s" data-wow-delay="0.55s" style="background-image: url('<?php echo get_template_directory_uri(); ?>/images/our-story.jpg');">
                    <img class="hidden" src="<?php echo get_template_directory_uri(); ?>/images/our-story.jpg" alt="<?php the_title(); ?>">
                </div>
            </div>
        <?php } } } ?>