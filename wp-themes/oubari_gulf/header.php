<?php
/**
 * The header for our theme
 *
 * This is the template that displays all of the <head> section and everything up until <div id="content">
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package oubari_gulf
 */

?>
<!doctype html>
<html <?php language_attributes(); ?>>
<head>
	<meta charset="<?php bloginfo( 'charset' ); ?>">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<link rel="profile" href="http://gmpg.org/xfn/11">

	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css">
	<link rel="stylesheet" href="<?php echo get_template_directory_uri(); ?>/css/slick.css">
	<link rel="stylesheet" href="<?php echo get_template_directory_uri(); ?>/css/slick-theme.css">
	<link rel="stylesheet" href="<?php echo get_template_directory_uri(); ?>/css/style.css">
	<link href="https://fonts.googleapis.com/css?family=Abril+Fatface|Montserrat:300,300i,400,400i,500,500i,600,600i" rel="stylesheet">
	<link href="https://use.fontawesome.com/releases/v5.0.6/css/all.css" rel="stylesheet">

	<?php wp_head(); ?>
</head>

<body <?php body_class(); if (is_home() || is_front_page()) { ?> data-spy="scroll" data-target="#spy"<?php } ?>>
	<div id="section_1"></div>
	<header>
		<div class="head_top">
			<div class="container">
				<div class="row">
					<div class="col-md-5 col-8">
						<a href="<?php echo home_url(); ?>" class="logo"><img src="<?php echo get_template_directory_uri(); ?>/images/logo.svg" alt="logo"></a>
					</div>
					<div class="col-4 d-block d-md-none text-right">
						<a href="#" class="menu_toggle" data-toggle="collapse" data-target="#mobile_menu" aria-expanded="false"><i class="fas fa-bars"></i></i></a>
					</div>
					<div class="col-md-7 text-right d-none d-md-block">
						<ul class="country_list">
							<li>
								<img src="<?php echo get_template_directory_uri(); ?>/images/lb.svg" alt="country">
								LEBANON
							</li>
							<li>
								<img src="<?php echo get_template_directory_uri(); ?>/images/ae.svg" alt="country">
								UAE
							</li>
							<li>
								<img src="<?php echo get_template_directory_uri(); ?>/images/eg.svg" alt="country">
								EGYPT
							</li>
							<li>
								<img src="<?php echo get_template_directory_uri(); ?>/images/jo.svg" alt="country">
								JORDAN
							</li>
							<li>
								<img src="<?php echo get_template_directory_uri(); ?>/images/et.svg" alt="country">
								ETHIOPIA
							</li>
						</ul>
					</div>
				</div>
			</div>
		</div>
		<div class="head_menu d-none d-md-block">
			<div class="container">
				<a href="<?php echo home_url(); ?>" class="fix_logo"><img src="<?php echo get_template_directory_uri(); ?>/images/logo.svg" alt="logo"></a>
				<div class="row">
					<div class="col-lg-3 col-md-2"></div>
					<div class="col-lg-6 col-md-7 text-center">
						<nav id="spy">
							<ul class="nav main_menu">
								<li><a href="<?php if (!is_home() && !is_front_page()) {echo home_url('/');} ?>#section_1">About us</a></li>
								<li><a href="<?php if (!is_home() && !is_front_page()) {echo home_url('/');} ?>#section_2">Products</a></li>
								<li><a href="<?php if (!is_home() && !is_front_page()) {echo home_url('/');} ?>#section_3">News & Event</a></li>
								<li><a href="<?php if (!is_home() && !is_front_page()) {echo home_url('/');} ?>#section_4">Contacts</a></li>
							</ul>
						</nav>
					</div>
					<div class="col-md-3 text-right">
						<ul class="top_social">
							<li><a href="#" target="_blank"><i class="fab fa-twitter"></i></a></li>
							<li><a href="#" target="_blank"><i class="fab fa-facebook-f"></i></a></li>
							<li><a href="#" target="_blank"><i class="fab fa-instagram"></i></a></li>
							<li><a href="#" target="_blank"><i class="fab fa-youtube"></i></a></li>
						</ul>
					</div>
				</div>
			</div>
		</div>
	</header>
	<div class="d-block d-md-none menu_togglebox">
		<div class="collapse navbar-collapse" id="mobile_menu">
			<div class="container">
				<ul class="nav navbar-nav mob_menu">
					<li><a href="<?php if (!is_home() && !is_front_page()) {echo home_url('/');} ?>#section_1">About us</a></li>
					<li><a href="<?php if (!is_home() && !is_front_page()) {echo home_url('/');} ?>#section_2">Products</a></li>
					<li><a href="<?php if (!is_home() && !is_front_page()) {echo home_url('/');} ?>#section_3">News & Event</a></li>
					<li><a href="<?php if (!is_home() && !is_front_page()) {echo home_url('/');} ?>#section_4">Contacts</a></li>
				</ul>
			</div>
		</div>
	</div>