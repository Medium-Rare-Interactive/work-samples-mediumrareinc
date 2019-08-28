<?php
/**
 * Template Name: Investors
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
			<div class="row">
				<div class="col-md-2 col-xs-12 pull-right">
					<a href="<?php echo get_permalink(193); ?>" class="comm_more">Investor LogIN</a>
					<p></p>
				</div>
				<div class="col-md-10 col-xs-12">
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
			<?php
			wp_reset_query();
			$args = array( 'post_type' => 'investor', 'posts_per_page' => -1 );
			query_posts($args);
			if (have_posts()) {
				$c=0;
				echo '<div class="row">';
				while (have_posts()) {
					the_post();
					$c++;
					?>
					<div class="invest_repeat col-sm-6 col-xs-12">
						<h4 class="invest_title wow fadeInUp" data-wow-duration="0.50s" data-wow-delay="0.55s"><?php the_title(); ?></h4>
						<div class="wow fadeInUp" data-wow-duration="0.50s" data-wow-delay="0.55s">
							<?php the_post_thumbnail('full'); ?>
						</div>
						<div class="wow fadeInUp" data-wow-duration="0.50s" data-wow-delay="0.55s">
							<?php the_content(); ?>
						</div>
					</div>
					<?php 
					if($c==2) {
						echo '<div class="clearfix"></div>';
						$c=0;
					}
				}
				echo '</div>';
			} wp_reset_query(); ?>
		</div>
	</div>
</div>

<?php
get_footer();
