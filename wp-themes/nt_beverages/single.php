<?php
/**
 * The template for displaying all single posts
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/#single-post
 *
 * @package nt_beverages
 */

get_header(); ?>

<div class="comm_padd comm_text bg_white">
	<div class="container">
		<h2 class="wow fadeInUp" data-wow-duration="0.50s" data-wow-delay="0.55s">
		<?php 
		if(is_singular('career')) {
			echo 'Careers';
		} else {
			the_title();
		}
		?>
		</h2>
		<?php
		if (have_posts()) {
			while (have_posts()) {
				the_post();
				if(is_singular('career')) {
					?>
					<div class="career_titlefields">
						<div class="row">
							<div class="col-sm-9 col-xs-12 wow fadeInLeft" data-wow-duration="0.50s" data-wow-delay="0.55s">
								<h3><?php the_title(); ?></h3>
								<span><?php the_field('cat_location'); ?>, <?php the_field('cat_type'); ?></span>
							</div>
							<div class="col-sm-3 col-xs-12 text-right cust_left wow fadeInRight" data-wow-duration="0.50s" data-wow-delay="0.55s">
								<a href="<?php echo get_permalink(30); ?>?post=<?php echo get_the_id(); ?>" class="more_btn">I'm Intersted</a>
							</div>
						</div>
					</div>
					<?php
				}
				echo '<div class="wow fadeInUp" data-wow-duration="0.50s" data-wow-delay="0.55s">';
				the_content();
				echo '</div>';
			}
		}
		?>
	</div>
</div>

<?php
get_footer();
