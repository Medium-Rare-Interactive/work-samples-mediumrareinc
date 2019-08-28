<?php
/**
 * The header for our theme
 *
 * This is the template that displays all of the <head> section and everything up until <div id="content">
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package moonlight
 */

?>
<!doctype html>
<html <?php language_attributes(); ?>>
<head>
    <meta charset="<?php bloginfo( 'charset' ); ?>">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta http-equiv="x-ua-compatible" content="ie=edge">    
    <style>
    .preload_bg {
        position: fixed;
        z-index: 9999;
        height: 100%;
        top: 0;
        left: 0;
        width: 100%;
    }
    .bg_preload {
        position: absolute;
        height: 100%;
        top: 0;
        left: 0;
        width: 100%;
        z-index: 1;
        background: #efebe9;
        transform-origin: bottom center;
        -webkit-transition: -webkit-transform .6s cubic-bezier(.895,.03,.685,.22);
        transition: -webkit-transform .6s cubic-bezier(.895,.03,.685,.22);
        transition: transform .6s cubic-bezier(.895,.03,.685,.22);
        transition: transform .6s cubic-bezier(.895,.03,.685,.22),-webkit-transform .6s cubic-bezier(.895,.03,.685,.22);
    }
    .active .bg_preload {
        transform: scaleY(0);
    }
    .preload_bg.remove {
        display: none;
    }
    .preload_wrap {
        position: absolute;
        width: 100%;
        left: 0;
        top: 50%;
        z-index: 3;
        transform: translateY(-50%);
    }
    .preload_bg p {
        text-align: center;
        color: #000;
        font-size: 13px;
        font-weight: 700;
        opacity: 0.8;
        text-transform: uppercase;
        margin: 0 0 6px;
    }
    .loader-bar {
        margin-top: 10px;
        background-color: #ccc;
        height: 2px;
        width: 65px;
        margin: 0 auto;
    }
    .intro {
        position: fixed;
        top: 0;
        left: 0;
        width: 100%;
        height: 100vh;
        z-index: 9999;
    }
    .intro.remove {
        display: none;
    }
    .intro_logo {
        position: absolute;
        top: 50%;
        left: 50%;
        z-index: 9999;
        transform: translate(-50%, -50%);
    }
    .intro-left, .intro-right {
        -webkit-transform: translateX(0) translateZ(0);
        transform: translateX(0) translateZ(0);
        -webkit-transition: -webkit-transform .6s cubic-bezier(.895,.03,.685,.22);
        transition: -webkit-transform .6s cubic-bezier(.895,.03,.685,.22);
        transition: transform .6s cubic-bezier(.895,.03,.685,.22);
        transition: transform .6s cubic-bezier(.895,.03,.685,.22),-webkit-transform .6s cubic-bezier(.895,.03,.685,.22);
        top: 0;
    }
    .intro-left {
        width: 50%;
        height: 100%;
        left: 0;
    }
    .intro.active .intro-left {
        -webkit-transform: translateX(-120%) translateZ(0);
        transform: translateX(-120%) translateZ(0); 
    }
    .intro-right {
        width: 50%;
        height: 100%;
        right: 0px!important;
        left: auto !important;
    }
    .intro.active .intro-right {
        -webkit-transform: translateX(120%) translateZ(0);
        transform: translateX(120%) translateZ(0); 
    }
    .intro-small-line {
        position: absolute;
        top: 50%;
        left: 50%;
        width: 1px;
        height: 180px;
        margin-left: -1px;
        margin-top: -90px;
        background: #000;
        -webkit-transform: rotate(20deg) scaleY(0) translateZ(0);
        transform: rotate(20deg) scaleY(0) translateZ(0);
        -webkit-transition: -webkit-transform .6s cubic-bezier(.23,1,.32,1);
        transition: -webkit-transform .6s cubic-bezier(.23,1,.32,1);
        transition: transform .6s cubic-bezier(.23,1,.32,1);
        transition: transform .6s cubic-bezier(.23,1,.32,1),-webkit-transform .6s cubic-bezier(.23,1,.32,1);
    }
    .intro-small-line {
        -webkit-transform: rotate(20deg) scaleY(1) translateZ(0);
        transform: rotate(20deg) scaleY(1) translateZ(0);
    }
    .intro.active .intro-small-line {
        opacity: 0;
    }
    .intro-line {
        position: absolute;
        top: -5%;
        left: 50%;
        width: 1px;
        height: 110%;
        margin-left: -1px;
        background: rgba(0,0,0,.1);
        -webkit-transform: rotate(20deg) scaleY(0) translateZ(0);
        transform: rotate(20deg) scaleY(0) translateZ(0);
        -webkit-transition: -webkit-transform .6s cubic-bezier(.23,1,.32,1) .1s;
        transition: -webkit-transform .6s cubic-bezier(.23,1,.32,1) .1s;
        transition: transform .6s cubic-bezier(.23,1,.32,1) .1s;
        transition: transform .6s cubic-bezier(.23,1,.32,1) .1s,-webkit-transform .6s cubic-bezier(.23,1,.32,1) .1s;
    }
    .intro-line {
        -webkit-transform: rotate(20deg) scaleY(1) translateZ(0);
        transform: rotate(20deg) scaleY(1) translateZ(0);
    }
    .intro.active .intro-line {
        opacity: 0;
    }
    .intro-left-inner, .intro-right-inner {
        -webkit-transform-style: preserve-3d;
        transform-style: preserve-3d;
        -webkit-backface-visibility: hidden;
        backface-visibility: hidden;
        -webkit-perspective: 2000px;
        perspective: 2000px;
        overflow: hidden;
        background: #fff;
        -webkit-transform: skewX(-20deg);
        transform: skewX(-20deg);
    }
    .intro-left-content, .intro-right-content {
        -webkit-transform: skewX(20deg) translateZ(0);
        transform: skewX(20deg) translateZ(0);
        -webkit-transition: -webkit-transform .6s cubic-bezier(.895,.03,.685,.22);
        transition: -webkit-transform .6s cubic-bezier(.895,.03,.685,.22);
        transition: transform .6s cubic-bezier(.895,.03,.685,.22);
        transition: transform .6s cubic-bezier(.895,.03,.685,.22),-webkit-transform .6s cubic-bezier(.895,.03,.685,.22);
    }
    .intro.active .intro-right-content {
        -webkit-transform: skewX(-20deg) translateX(-120%) translateZ(0);
        transform: skewX(-20deg) translateX(-120%) translateZ(0);
    }
    .intro.active .intro-left-content {
        -webkit-transform: skewX(20deg) translateX(120%) translateZ(0);
        transform: skewX(20deg) translateX(120%) translateZ(0);
    }
    .u-fit, .u-fit-w {
        width: 100%;
    }
    .u-fit {
        height: 100%;
    }
    .u-pos-tl {
        top: 0;
        left: 0;
    }
    .u-absolute {
        position: absolute;
    }
    .intro-left:before {
        content: "";
        position: absolute;
        top: 0;
        left: 0;
        width: 50%;
        height: 50%;
        background: #fff;
    }
    .intro-right:before {
        content: "";
        position: absolute;
        bottom: 0;
        right: 0;
        width: 50%;
        height: 50%;
        background: #fff;
    }
    .intro.active .intro-small-line {
        opacity: 0;
    }
    .intro-small-line {
        position: absolute;
        top: 50%;
        left: 50%;
        width: 1px;
        height: 180px;
        margin-left: -1px;
        margin-top: -90px;
        background: #000;
        -webkit-transform: rotate(20deg) scaleY(0) translateZ(0);
        transform: rotate(20deg) scaleY(0) translateZ(0);
        -webkit-transition: -webkit-transform .6s cubic-bezier(.23,1,.32,1);
        transition: -webkit-transform .6s cubic-bezier(.23,1,.32,1);
        transition: transform .6s cubic-bezier(.23,1,.32,1);
        transition: transform .6s cubic-bezier(.23,1,.32,1),-webkit-transform .6s cubic-bezier(.23,1,.32,1);
        -webkit-transform: rotate(20deg) scaleY(1) translateZ(0);
        transform: rotate(20deg) scaleY(1) translateZ(0);
    }
    .intro.active .intro-line {
        opacity: 0;
    }
    .intro-line {
        position: absolute;
        top: -5%;
        left: 50%;
        width: 1px;
        height: 110%;
        margin-left: -1px;
        background: rgba(0,0,0,.1);
        -webkit-transform: rotate(20deg) scaleY(0) translateZ(0);
        transform: rotate(20deg) scaleY(0) translateZ(0);
        -webkit-transition: -webkit-transform .6s cubic-bezier(.23,1,.32,1) .1s;
        transition: -webkit-transform .6s cubic-bezier(.23,1,.32,1) .1s;
        transition: transform .6s cubic-bezier(.23,1,.32,1) .1s;
        transition: transform .6s cubic-bezier(.23,1,.32,1) .1s,-webkit-transform .6s cubic-bezier(.23,1,.32,1) .1s;
        -webkit-transform: rotate(20deg) scaleY(1) translateZ(0);
        transform: rotate(20deg) scaleY(1) translateZ(0);
    }
    </style>
    <script src="https://code.jquery.com/jquery-3.3.1.min.js" integrity="sha256-FgpCb/KJQlLNfOu91ta32o/NMZxltwRo8QtmkMRdAu8=" crossorigin="anonymous"></script>
    <script type="text/javascript">
        <?php if(is_woocommerce() || is_shop() || is_product_category() || is_product() || is_cart() || is_checkout() || is_ajax()) { ?>
            document.addEventListener("DOMContentLoaded", function(){
                $('.preload_wrap').delay(300).fadeOut('slow');
                setTimeout(function(){
                    $('.preload_bg').delay(700).addClass('active');
                }, 700);
                setTimeout(function(){
                    $('.preload_bg').delay(2000).addClass('remove');
                }, 2000);
            });
        <?php } else { ?>
            document.addEventListener("DOMContentLoaded", function(){
                $('.preload_wrap').delay(300).fadeOut('slow');
                setTimeout(function(){
                    $('.preload_bg').delay(700).addClass('active');
                }, 700);
                setTimeout(function(){
                    $('.preload_bg').delay(2000).addClass('remove');
                }, 2000);
                $('.intro_logo').delay(100).fadeOut('slow');
                $('.intro').delay(300).addClass('active');
                setTimeout(function(){
                    $('.intro').delay(2000).addClass('remove');
                }, 2000);
            });
        <?php } ?>
    </script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/materialize/1.0.0-rc.2/css/materialize.min.css">
    <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
    <link href="https://use.fontawesome.com/releases/v5.0.6/css/all.css" rel="stylesheet">
    <link href="<?php echo get_template_directory_uri(); ?>/css/slick.css" rel="stylesheet">
    <link href="<?php echo get_template_directory_uri(); ?>/css/slick-theme.css" rel="stylesheet">
    <link href="<?php echo get_template_directory_uri(); ?>/css/style.css" rel="stylesheet">
    <link rel="stylesheet" href="https://unpkg.com/aos@next/dist/aos.css" />
    <link rel="profile" href="https://gmpg.org/xfn/11">

    <?php wp_head(); ?>
</head>

<body <?php body_class(); ?>>
    
    <?php if (!is_home() && !is_front_page() && !is_singular( 'product' ) && !is_singular( 'post' ) && !is_page_template( 'template-parts/template-collections.php' ) && !is_page_template( 'template-parts/template-contact.php' ) && !is_page_template( 'template-parts/template-journal.php' )) {
        echo '<div class="black_bg"></div>';
    } ?>
    <?php if(!is_home() && !is_front_page()) { ?>
    <div class="preload_bg">
        <div class="bg_preload"></div>
        <div class="preload_wrap">
            <p>Loading</p>
            <div class="loader-bar"></div>
        </div>
    </div>
    <?php } else { ?>
        <div class="intro">
            <div class="intro_logo">
                <img src="<?php echo get_template_directory_uri(); ?>/images/logo.jpg" alt="loader">
            </div>
            <div class="intro-left u-absolute u-pos-tl">
                <div class="intro-left-inner u-absolute u-pos-tl u-fit">
                    <div class="intro-left-content u-absolute u-pos-tl u-fit"></div>
                </div>
            </div>
            <div class="intro-right u-absolute u-pos-tl">
                <div class="intro-right-inner u-absolute u-pos-tl u-fit">
                    <div class="intro-right-content u-absolute u-pos-tl u-fit"></div>
                </div>
            </div>
            <div class="intro-small-line"></div>
            <div class="intro-line"></div>
        </div>
    <?php } ?>
    <header id="header">
        <div class="container-fluid">
            <div class="row">
                <div class="col s12 rel hide-on-med-and-down">
                    <?php wp_nav_menu( array('container_class'=>'','theme_location'=>'menu-1', 'container'=>'','menu_class'=>'main_menu')); ?>
                    <div class="hamburg_menu">
                        <span></span>
                        <span></span>
                        <span class="last"></span>
                    </div>
                </div>
                <div class="col s12 rel show-on-medium-and-down hide-on-large-only">
                    <div class="hamburg_menu">
                        <span></span>
                        <span></span>
                        <span class="last"></span>
                    </div>
                </div>
            </div>
        </div>
    </header>
    <div class="mob_menu">
        <div class="mob_menu__out">
            <div class="mob_menu__inn">
                <div class="container">
                    <div class="close_menu"></div>
                    <div class="row">
                        <div class="col m6 s12">
                            <div class="show-on-small hide-on-med-and-up">
                                <a href="<?php echo home_url(); ?>" class="logo"><img src="/wp-content/uploads/2018/09/Log-White.png" alt="logo"></a>
                            </div>
                            <?php wp_nav_menu( array('container_class'=>'','theme_location'=>'menu-1', 'container'=>'','menu_class'=>'mob_menu__left')); ?>
                        </div>
                        <div class="col l3 m4 s12 push-l3 push-m2 push-s0">
                            <div class="hide-on-small-only">
                                <a href="<?php echo home_url(); ?>" class="logo"><img src="/wp-content/uploads/2018/09/Log-White.png" alt="logo"></a>
                            </div>
                            <ul class="mob_menu__right">
                                <li><a href="#">DESIGNER</a></li>
                                <li><a href="<?php echo get_permalink( 78 ); ?>">CONTACT</a></li>
                                <li><a href="#">TERMS AND CONDITIONS</a></li>
                                <li><a href="#">PRIVACY</a></li>
                            </ul>
                            <ul class="mob_menu__social">
                                <li><a target="_blank" href="https://www.instagram.com/themoonlightoffical/"><i class="fab fa-instagram"></i></a></li>
                                <li><a target="_blank" href="https://twitter.com/moonlight_qatar/"><i class="fab fa-twitter"></i></a></li>
                                <li><a target="_blank" href="https://www.facebook.com/MoonlightBoutiqueQatar/"><i class="fab fa-facebook"></i></a></li>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>