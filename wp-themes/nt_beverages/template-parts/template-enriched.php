<?php
/**
 * Template Name: Enriched
 *
 * @link https://codex.wordpress.org/Template_Hierarchy
 *
 * @package nt_beverages
 */

get_header(); ?>

<div class="comm_padd comm_text enrich_sec bg_white">
	<div class="container text-center">
		<div class="row">
			<div class="col-lg-10 col-lg-offset-1 col-xs-12">
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
	</div>
</div>

<?php
get_footer();
