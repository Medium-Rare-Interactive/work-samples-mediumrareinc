<?php
/**
 * Template Name: Distributors
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
			$terms = get_terms( 'location' );
			if ( ! empty( $terms ) && ! is_wp_error( $terms ) ) {
				foreach ( $terms as $term ) {
					$term_id = $term->term_id;
					echo '<div class="distri_repeat">';
					echo '<h4 class="wow fadeInUp" data-wow-duration="0.50s" data-wow-delay="0.55s">' . $term->name . '</h4>';
					$args = array(
						'post_type' => 'distributor',
						'posts_per_page' => -1,
						'tax_query' => array(
							array(
								'taxonomy' => 'location',
								'field' => 'id',
								'terms' => $term_id
								)
							)
						);
					query_posts($args);
					if (have_posts()) {
						echo '<ul class="distri_lists">';
						while (have_posts()) {
							the_post();
							?>
							<li class="wow fadeInUp" data-wow-duration="0.50s" data-wow-delay="0.55s">
								<a target="_blank" href="<?php the_field('distributor_link'); ?>">
									<?php
									//the_title();
									the_post_thumbnail('full');
									?>
								</a>
							</li>
							<?php 
						}
						echo '</ul>';
					}
					echo '</div>';
				} 
			} wp_reset_query(); ?>
		</div>
	</div>
</div>

<?php
get_footer();
