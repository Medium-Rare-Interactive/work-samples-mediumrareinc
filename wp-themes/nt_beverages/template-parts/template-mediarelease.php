<?php
/**
 * Template Name: Media Release
 *
 * @link https://codex.wordpress.org/Template_Hierarchy
 *
 * @package nt_beverages
 */

get_header(); ?>

<div class="comm_padd comm_text bg_white">
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
			wp_reset_query();
			$args = array( 'post_type' => 'post', 'posts_per_page' => -1 );
			query_posts($args);
			if (have_posts()) {
				while (have_posts()) {
					the_post();
					?>
					<div class="media_repeat wow fadeInUp" data-wow-duration="0.50s" data-wow-delay="0.55s">
						<div class="media_right">
							<div class="media_left wow fadeInLeft" data-wow-duration="0.65s" data-wow-delay="0.7s" style="background-image: url('<?php the_post_thumbnail_url('media_thumb'); ?>');">
								<?php the_post_thumbnail( 'media_thumb', array('class'=>'media_image') ); ?>
							</div>
							<div class="wow fadeInRight" data-wow-duration="0.65s" data-wow-delay="0.7s">
								<span class="media_date"><?php the_time('l, jS F Y') ?>.</span>
								<h3><?php the_title(); ?></h3>
								<p>
									<?php echo wp_trim_words( get_the_content(), 70, '...' ); ?>
								</p>
								<a href="<?php the_permalink(); ?>" class="media_more">READ MORE</a>
							</div>
						</div>
					</div>
					<?php 
				}
			} wp_reset_query(); ?>
		</div>
	</div>
</div>

<?php
get_footer();
