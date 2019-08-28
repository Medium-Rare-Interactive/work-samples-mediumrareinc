<?php
/**
 * The template for displaying the footer
 *
 * Contains the closing of the #content div and all content after.
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package oubari_gulf
 */

?>

<footer>
	<div class="container">
		<div class="row">
			<div class="col-lg-2 col-12">
				<a href="<?php echo home_url(); ?>" class="foot_logo"><img src="<?php echo get_template_directory_uri(); ?>/images/oubari-logo.svg" alt="oubari-logo"></a>
			</div>
			<div class="col-lg-7 d-none d-lg-block">
				<div class="row">
					<div class="col-md-3">
						<h5>Products</h5>
						<ul>
							<?php
							$terms = get_terms( array( 
								'taxonomy' => 'products-cat',
								'parent'   => 0
							) );
							if ( ! empty( $terms ) && ! is_wp_error( $terms ) ) {
								foreach ( $terms as $term ) {
									$term_id = $term->term_id;
									?>
									<li>
										<a href="<?php echo esc_url( get_term_link( $term ) ); ?>">
											<?php echo $term->name; ?>
										</a>
									</li>
									<?php
								}
							} wp_reset_query(); ?>
						</ul>
					</div>
					<div class="col-md-3">
						<h5>Company</h5>
						<ul>
							<li><a href="#">Oubari Gulf Profile</a></li>
							<li><a href="#">Brands Partners</a></li>
						</ul>
					</div>
					<div class="col-md-3">
						<h5>Terms</h5>
						<ul>
							<li><a href="#">Privacy Policy</a></li>
							<li><a href="#">Terms of Services</a></li>
						</ul>
					</div>
					<div class="col-md-3">
						<h5>Location</h5>
						<ul>
							<li><a href="#">Contact Us</a></li>
							<li><a href="#">Location Map</a></li>
						</ul>
					</div>
				</div>
			</div>
			<div class="col-lg-3 col-12">
				<h5>Follow us</h5>
				<ul class="foot_social">
					<li><a href="#" target="_blank"><i class="fab fa-twitter"></i></a></li>
					<li><a href="#" target="_blank"><i class="fab fa-facebook-f"></i></a></li>
					<li><a href="#" target="_blank"><i class="fab fa-instagram"></i></a></li>
					<li><a href="#" target="_blank"><i class="fab fa-youtube"></i></a></li>
				</ul>
			</div>
		</div>
		<hr>
		<div class="copy">
			© <?php echo date('Y') ?> Oubari Gulf. All rights reserved
		</div>
	</div>
</footer>
<?php if (is_archive()) { ?>
<div class="modal fade" id="prod_modal" tabindex="-1" role="dialog" aria-labelledby="prod_modal">
	<div class="modal-dialog modal-lg" role="document">
		<div class="modal-content comm_modal">
			<div class="prod_modalimg d-none d-md-block">
				<img src="<?php echo get_template_directory_uri(); ?>/images/1.jpg" alt="image">
			</div>
			<h3>Message.</h3>
			<div class="modal_form">
				<?php echo do_shortcode( '[contact-form-7 id="11" title="Contact Form"]' ); ?>
			</div>
			<div class="clearfix"></div>
		</div>
	</div>
</div>
<?php 
$c = 0;
if (have_posts()) {
	while (have_posts()) {
		the_post();
		$c++;
		?>
		<div class="modal fade" id="cont_modal<?php echo $c; ?>" tabindex="-1" role="dialog">
			<div class="modal-dialog modal-lg" role="document">
				<div class="modal-content comm_modal content_modal">
					<div class="comm_text">
						<div class="close_mod" data-dismiss="modal"><img src="<?php echo get_template_directory_uri(); ?>/images/64-px-close.svg" alt="close"></div>
						<h2>Product Information</h2>
						<?php the_content(); ?>
					</div>
				</div>
			</div>
		</div>
		<?php
	}
} ?>
<?php } ?>

<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
<script src="<?php echo get_template_directory_uri(); ?>/js/slick.min.js"></script>
<script type="text/javascript">
	$(document).ready(function() {
		$(function() {
			var header = $("header");
			var body_item = $("body");
			$(window).scroll(function() {
				var scroll = $(window).scrollTop();
				if (scroll >= 70) {
					header.addClass("active");
					body_item.addClass("active");
				} else {
					header.removeClass("active");
					body_item.removeClass("active");
				}
			});
			$(window).ready(function() {
				var scroll = $(window).scrollTop();
				if (scroll >= 70) {
					header.addClass("active");
					body_item.addClass("active");
				} else {
					header.removeClass("active");
					body_item.removeClass("active");
				}
			});
		});

		<?php if (is_home() || is_front_page()) { ?>
		(function() {
			'use strict';
			var $links = $('.main_menu > li > a'),
			$sections = getSections($links),
			$root = $('html, body');
			$(window).on('scroll', function() {
				activateLink($sections, $links);
			});
			$(window).on('load', function() {
				activateLink($sections, $links);
			});
			$('.main_menu > li > a, .banner_link').on('click', function() {
				var href = $.attr(this, 'href');
				$root.animate({
					scrollTop: $(href).offset().top
				}, 500);
				return false;
			});
			function getSections($links) {
				var linksHref,
				hashes = '';
				for (var i = 0, len = $links.length; i < len; i++) {
					linksHref = $links.eq(i).attr('href');
					if (linksHref.charAt(0) === '#') {
						hashes += linksHref + ',';
					}
				}
				hashes = hashes.slice(0, -1);
				return $(hashes);
			}
			function activateLink($sections, $links) {
				var $section,
				yPosition = $(window).scrollTop();
				for (var i = $sections.length - 1; i >= 0; i--) {
					$section = $sections.eq(i);
					if (yPosition >= $section.offset().top-30)  {
						for (var j = 0, linksLen = $links.length; j < linksLen; j++) {
							$links.eq(j).removeClass('active');
						}
						$links.filter('[href="#' + $section.attr('id') + '"]').addClass('active');
						return;
					}
				}
			}
		}());

		$('.mob_menu li a').click(function(e){
			e.preventDefault();
			$('.mob_menu li').removeClass('active');
			$(this).parent().addClass('active');
			var var_href = $(this).attr('href');
			var anchor = $(this);
			$('html, body').stop().animate({
				scrollTop: $(anchor.attr('href')).offset().top-120
			}, 600);
			$('.menu_toggle').trigger( "click" );
		});
		$('.address_list a').click(function(e){
			e.preventDefault();
			$('.address_list li, .address_cont').removeClass('active');
			$(this).parent().addClass('active');
			var var_href = $(this).attr('href');
			$(var_href).addClass('active');
		});
		$('.news_tablist li a').click(function(e){
			e.preventDefault();
			$('.news_tablist li, .news_tabcont').removeClass('active');
			$(this).parent().addClass('active');
			var var_href = $(this).attr('href');
			$(var_href).addClass('active');
			$('.news_slider').slick('setPosition', 0);
		});
		$('.prod_catslider').slick({
			dots: false,
			infinite: false,
			speed: 700,
			slidesToShow: 6,
			autoplay : false,
			pauseOnHover : false,
			slidesToScroll : 1,
			draggable : false,
			responsive: [
			{
				breakpoint: 992,
				settings: {
					slidesToShow: 4
				}
			},
			{
				breakpoint: 768,
				settings: {
					slidesToShow: 3
				}
			},
			{
				breakpoint: 600,
				settings: {
					slidesToShow: 2
				}
			},
			{
				breakpoint: 400,
				settings: {
					slidesToShow: 2
				}
			}
			]
		});
		$('#news_tab1 .news_slider, #news_tab2 .news_slider, #news_tab3 .news_slider, #news_tab4 .news_slider, #news_tab5 .news_slider, #news_tab6 .news_slider, #news_tab7 .news_slider').slick({
			dots: false,
			infinite: false,
			speed: 700,
			slidesToShow: 1,
			autoplay : false,
			pauseOnHover : false,
			slidesToScroll : 1,
			draggable : false
		});
		<?php } ?>

		$('.menu_toggle').on('click', function(e) {
			$(this).toggleClass('active');
			$('header').toggleClass('active');
		});
		<?php if(is_archive()) { ?>
		$('.prod_btmbtn a.left').click(function(){
			var src_val = $(this).data('src');;
			$('.prod_modalimg img').attr('src', src_val);
		});
		$('.side_toggle').on('click', function(e) {
			e.preventDefault();
			$(this).toggleClass('active');
			$('.side_bar').toggleClass('active');
		});
		$('.side_bar > ul > li > a').click(function(e){
			e.preventDefault();
			if ($(this).parent().hasClass('active')) {
				$('.side_bar > ul > li').removeClass('active');
			} else {
				$('.side_bar > ul > li').removeClass('active');
				$(this).parent().addClass('active');
			}
		});
		$('#prodcomm_1 .prod_inn_slider, #prodcomm_2 .prod_inn_slider, #prodcomm_3 .prod_inn_slider, #prodcomm_4 .prod_inn_slider, #prodcomm_5 .prod_inn_slider, #prodcomm_6 .prod_inn_slider, #prodcomm_7 .prod_inn_slider, #prodcomm_8 .prod_inn_slider, #prodcomm_9 .prod_inn_slider').slick({
			dots: false,
			infinite: false,
			speed: 700,
			slidesToShow: 1,
			autoplay : false,
			pauseOnHover : false,
			slidesToScroll : 1,
			draggable : false
		});
		<?php } ?>
	});
</script>
<?php if (is_home() || is_front_page()) { ?>
<script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyAyc9QKqABvWKJvdhGUHWHZD5dmhuCEiNg&callback=initMap"
async defer></script>
<script>
	function initMap() {
		var map = new google.maps.Map(document.getElementById('map'), {
			center: {lat: 25.3605574, lng: 55.4300903},
			zoom: 12,
			zoomControl: false,
			fullscreenControl: false,
			mapTypeControl: false,
			streetViewControl: false,
			styles: [
			{
				"elementType": "geometry",
				"stylers": [
				{
					"color": "#212121"
				}
				]
			},
			{
				"elementType": "labels.icon",
				"stylers": [
				{
					"visibility": "off"
				}
				]
			},
			{
				"elementType": "labels.text.fill",
				"stylers": [
				{
					"color": "#757575"
				}
				]
			},
			{
				"elementType": "labels.text.stroke",
				"stylers": [
				{
					"color": "#212121"
				}
				]
			},
			{
				"featureType": "administrative",
				"elementType": "geometry",
				"stylers": [
				{
					"color": "#757575"
				}
				]
			},
			{
				"featureType": "administrative.country",
				"elementType": "labels.text.fill",
				"stylers": [
				{
					"color": "#9e9e9e"
				}
				]
			},
			{
				"featureType": "administrative.land_parcel",
				"stylers": [
				{
					"visibility": "off"
				}
				]
			},
			{
				"featureType": "administrative.locality",
				"elementType": "labels.text.fill",
				"stylers": [
				{
					"color": "#bdbdbd"
				}
				]
			},
			{
				"featureType": "poi",
				"elementType": "labels.text.fill",
				"stylers": [
				{
					"color": "#757575"
				}
				]
			},
			{
				"featureType": "poi.park",
				"elementType": "geometry",
				"stylers": [
				{
					"color": "#181818"
				}
				]
			},
			{
				"featureType": "poi.park",
				"elementType": "labels.text.fill",
				"stylers": [
				{
					"color": "#616161"
				}
				]
			},
			{
				"featureType": "poi.park",
				"elementType": "labels.text.stroke",
				"stylers": [
				{
					"color": "#1b1b1b"
				}
				]
			},
			{
				"featureType": "road",
				"elementType": "geometry.fill",
				"stylers": [
				{
					"color": "#2c2c2c"
				}
				]
			},
			{
				"featureType": "road",
				"elementType": "labels.text.fill",
				"stylers": [
				{
					"color": "#8a8a8a"
				}
				]
			},
			{
				"featureType": "road.arterial",
				"elementType": "geometry",
				"stylers": [
				{
					"color": "#373737"
				}
				]
			},
			{
				"featureType": "road.highway",
				"elementType": "geometry",
				"stylers": [
				{
					"color": "#3c3c3c"
				}
				]
			},
			{
				"featureType": "road.highway.controlled_access",
				"elementType": "geometry",
				"stylers": [
				{
					"color": "#4e4e4e"
				}
				]
			},
			{
				"featureType": "road.local",
				"elementType": "labels.text.fill",
				"stylers": [
				{
					"color": "#616161"
				}
				]
			},
			{
				"featureType": "transit",
				"elementType": "labels.text.fill",
				"stylers": [
				{
					"color": "#757575"
				}
				]
			},
			{
				"featureType": "water",
				"elementType": "geometry",
				"stylers": [
				{
					"color": "#000000"
				}
				]
			},
			{
				"featureType": "water",
				"elementType": "labels.text.fill",
				"stylers": [
				{
					"color": "#3d3d3d"
				}
				]
			}
			]
		});
	}
</script>
<?php } ?>

<?php wp_footer(); ?>

</body>
</html>
