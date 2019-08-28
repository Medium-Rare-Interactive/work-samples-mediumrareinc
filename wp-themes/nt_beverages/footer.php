<?php
/**
 * The template for displaying the footer
 *
 * Contains the closing of the #content div and all content after.
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package nt_beverages
 */

?>

<footer>
	<div class="container">
		<div class="row text-center">
			<div class="col-sm-4 col-xs-12 wow fadeInLeft" data-wow-duration="0.50s" data-wow-delay="0.55s">
				<img class="foot_logo" src="<?php echo get_template_directory_uri(); ?>/images/logo.png" alt="logo">
				<ul class="list-unstyled list-inline social_links">
					<li><a href="https://www.facebook.com/ntbeverages" target="_blank"><img src="<?php echo get_template_directory_uri(); ?>/images/facebook.png" alt="facebook"></a></li>
					<li><a href="https://twitter.com/NTbeverages" target="_blank"><img src="<?php echo get_template_directory_uri(); ?>/images/twitter.png" alt="twitter"></a></li>
					<li><a href="https://www.linkedin.com/company/nt-beverages" target="_blank"><img src="<?php echo get_template_directory_uri(); ?>/images/linkedin.png" alt="linkedin"></a></li>
				</ul>
			</div>
			<div class="col-sm-4 col-xs-12 foot_addr wow fadeInUp" data-wow-duration="0.6s" data-wow-delay="0.65s">
				<?php dynamic_sidebar( 'footer-1' ); ?>
			</div>
			<div class="col-sm-4 col-xs-12 wow fadeInRight" data-wow-duration="0.50s" data-wow-delay="0.55s">
				<a href="<?php echo get_permalink(170); ?>" class="comm_more">Become a Distributor / Stockist</a>
			</div>
		</div>
	</div>
</footer>
<div class="copy_text">
	<div class="container-fluid">
		<div class="row">
			<div class="col-md-6 cust_centre col-xs-12 wow fadeInLeft" data-wow-duration="0.50s" data-wow-delay="0.55s">
				<p>
					© <?php echo date('Y') ?> NT Beverages, All Rights Reserved | <a href="https://xeedesign.com/" target="_blank"><img src="<?php echo get_template_directory_uri(); ?>/images/xee.png" alt="Xee Design"></a>
				</p>
			</div>
			<div class="col-md-6 col-xs-12 wow fadeInRight" data-wow-duration="0.50s" data-wow-delay="0.55s">
				<?php wp_nav_menu( array('container_class'=>'','theme_location'=>'menu-3', 'container'=>'','menu_class'=>'list-unstyled list-inline text-right cust_centre')); ?>
			</div>
		</div>
	</div>
</div>
</div>

<script src="<?php echo get_template_directory_uri(); ?>/js/jquery.min.js"></script>
<script src="<?php echo get_template_directory_uri(); ?>/js/bootstrap.min.js"></script>
<script src="<?php echo get_template_directory_uri(); ?>/js/wow.min.js"></script>
<script type="text/javascript">
	$(window).on('load', function() {
		wow = new WOW({
			mobile: false
		});
		wow.init();
	});
	$(document).ready(function() {
		$('.main_menu a, .mobile_menu a').click(function(e) {
			if($(this).attr("href")=="#"){
				e.preventDefault();
			}
		});
		$('.proj-bar a').click(function(e){
			$('.proj-bar').toggleClass('active');
			$('.logo').toggleClass('hide');
			$('.mobile_menu').parent().find('> ul').slideToggle(300);
		});
		$(".mobile_menu .menu-item-has-children").append('<span class="down_menu"></span>');
		$('.down_menu').click(function(e){
			e.preventDefault();
			$(this).toggleClass('active');
			$(this).parent().find('> ul.sub-menu').slideToggle(300);
		});
		$('#media_contactbtn').click(function(e){
			e.preventDefault();
			$(this).addClass('hidden');
			$('.media_contact').removeClass('hidden');
		});
		$(".page-id-170 .career_forms select.form-control option:first").attr("value", "");
		$(function() {
			var regExp = new RegExp("\\b(" + "TM" + ")\\b", "gm");
			$('.media_repeat h3, .single-post .container > h2').each(function() {
				var html = $(this).html();
				$(this).html(html.replace(regExp, "<sup>$1</sup>"));
			});
		});
	});
</script>
<?php if(is_home() || is_front_page()) { ?>
<script src="<?php echo get_template_directory_uri(); ?>/js/slick.min.js"></script>
<script type="text/javascript">
	$(document).ready(function() {
		$('.home_slider').slick({
			dots: false,
			infinite: true,
			speed: 630,
			slidesToShow: 1,
			autoplay : true,
			autoplaySpeed : 7000,
			pauseOnHover : false,
			slidesToScroll : 1
		});
	});
</script>
<script src="<?php echo get_template_directory_uri(); ?>/js/objectFitPolyfill.min.js"></script>
<?php } if(is_page(30)) { ?>
<script type="text/javascript">
	$('.career_forms .text-142').find('input').val($('#data_url').data('url'));
	document.getElementById('add_1').addEventListener('click', function() {
		document.getElementById('file_1').click();
	});
	document.getElementById('file_1').addEventListener('change', function() {
		document.getElementById('fake_1').value = this.value;
	});
	document.getElementById('add_2').addEventListener('click', function() {
		document.getElementById('file_2').click();
	});
	document.getElementById('file_2').addEventListener('change', function() {
		document.getElementById('fake_2').value = this.value;
	});
	document.getElementById('add_3').addEventListener('click', function() {
		document.getElementById('file_3').click();
	});
	document.getElementById('file_3').addEventListener('change', function() {
		document.getElementById('fake_3').value = this.value;
	});
</script>
<?php } ?>

<?php wp_footer(); ?>

</body>
</html>
