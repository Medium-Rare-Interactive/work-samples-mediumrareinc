<?php
/**
 * Template Name: Reports
 *
 * @link https://codex.wordpress.org/Template_Hierarchy
 *
 * @package nt_beverages
 */

get_header(); ?>

<div class="comm_padd comm_text report_lists bg_white">
	<div class="container">
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
		</div>
	</div>
</div>

<?php
get_footer();
