<?php
/**
 * Template Name: Career Vacancy
 *
 * @link https://codex.wordpress.org/Template_Hierarchy
 *
 * @package nt_beverages
 */

get_header(); ?>

<div class="comm_padd comm_text bg_white">
	<div class="container">
		<h2 class="wow fadeInUp" data-wow-duration="0.50s" data-wow-delay="0.55s">Careers</h2>
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
<div class="career_lists bg_white">
	<div class="container">
		<?php
		$terms = get_terms( 'department' );
		if ( ! empty( $terms ) && ! is_wp_error( $terms ) ) {
			foreach ( $terms as $term ) {
				$term_id = $term->term_id;
				echo '<div class="career_repeat">';
				echo '<h3 class="wow fadeInUp" data-wow-duration="0.50s" data-wow-delay="0.55s">' . $term->name . '</h3>';
				$args = array(
					'post_type' => 'career',
					'posts_per_page' => -1,
					'tax_query' => array(
						array(
							'taxonomy' => 'department',
							'field' => 'id',
							'terms' => $term_id
							)
						)
					);
				query_posts($args);
				while (have_posts()) {
					the_post();
					?>
					<ul class="list-unstyled career_list wow fadeInUp" data-wow-duration="0.50s" data-wow-delay="0.55s">
						<li class="carerr_title"><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></li>
						<li class="carerr_cat"><?php the_field('career_category'); ?></li>
						<li class="carerr_type"><?php the_field('cat_type'); ?></li>
						<li class="carerr_loc"><?php the_field('cat_location'); ?></li>
					</ul>
					<?php 
				}
				echo '</div>';
			} 
		} wp_reset_query(); ?>
	</div>
</div>

<?php
get_footer();
