<?php
/**
 * Template Name: Contact
 *
 * @link https://codex.wordpress.org/Template_Hierarchy
 *
 * @package nt_beverages
 */

get_header(); ?>

<div class="contact_map">
	<iframe src="https://www.google.com/maps/embed?pb=!1m14!1m8!1m3!1d62329.75606998796!2d130.9179907562191!3d-12.475689170965477!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x0%3A0x79feb0f5d0521d5!2sNT+Beverages+Group+Pty+Ltd.!5e0!3m2!1sen!2sin!4v1505420106626" width="600" height="450" frameborder="0" style="border:0" allowfullscreen></iframe>
</div>
<div class="comm_padd comm_text contact_sec">
	<div class="container">
		<h2 class="wow fadeInUp" data-wow-duration="0.50s" data-wow-delay="0.55s"><?php the_title(); ?></h2>
		<div class="row">
			<div class="col-sm-5 col-xs-12 wow fadeInLeft" data-wow-duration="0.50s" data-wow-delay="0.55s">
				<?php echo do_shortcode('[contact-form-7 id="54" title="Contact Form"]'); ?>
			</div>
			<div class="col-md-5 col-sm-6 pull-right contact_right col-xs-12 wow fadeInRight" data-wow-duration="0.50s" data-wow-delay="0.55s">
				<?php
				if (have_posts()) {
					while (have_posts()) {
						the_post();
						the_content();
					}
				}
				?>
			</div>
		</div>		
	</div>
</div>

<?php
get_footer();
