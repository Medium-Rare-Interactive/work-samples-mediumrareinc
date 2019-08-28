<?php
/**
 * Template Name: Media Contact
 *
 * @link https://codex.wordpress.org/Template_Hierarchy
 *
 * @package nt_beverages
 */

get_header(); ?>

<div class="comm_padd comm_text bg_white">
	<div class="container text-center">
		<h2 class="wow fadeInUp" data-wow-duration="0.50s" data-wow-delay="0.55s"><?php the_title(); ?></h2>
		<div class="wow fadeInUp" data-wow-duration="0.50s" data-wow-delay="0.55s">
			<?php
			if (have_posts()) {
				while (have_posts()) {
					the_post();
					the_content();
				}
			}
			?>
			<a href="#media_contat" id="media_contactbtn" class="comm_more">Click here to send us an Email</a>
			<div class="media_contact hidden">
				<?php echo do_shortcode('[contact-form-7 id="177" title="Media Contact"]'); ?>
			</div>
		</div>
	</div>
</div>

<?php
get_footer();
