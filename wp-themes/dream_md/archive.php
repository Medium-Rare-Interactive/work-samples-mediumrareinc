<?php
/**
 * The template for displaying archive pages
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package dream_md
 */

get_header();
get_template_part( 'template-parts/content', 'banner' );
?>

<div class="comm_padd">
	<div class="container">
		<div class="row justify-content-md-between">
			<div class="col-md-8 col-12 order-md-2">
				<?php
				if(have_posts()) {
					echo '<div class="row">';
					while (have_posts()) {
						the_post();
						?>
						<div class="col-sm-6 col-12 blog_item">
							<div class="blog_item__inn">
								<?php
								$img_url = get_the_post_thumbnail_url( $post->ID, 'full');
								$image_call = aq_resize( $img_url, 488, 255, true, true, true );
								if($image_call) {
									echo '<img src="'.$image_call.'" alt="image">';
								} else {
									echo '<div class="box_cont__blogimg"><img src="https://via.placeholder.com/488x255/000000/000000" alt="image"><img class="box_cont__absimg" src="'.get_field('logo', 'options').'" alt="image"></div>';
								} ?>
								<div class="blog_item__cont">
									<h3><?php the_title(); ?></h3>
									<p class="blog_date"><strong><?php the_time('M j, Y') ?></strong></p>
									<p><?php echo wp_trim_words( get_the_excerpt(), 18, '...' ); ?></p>
									<a href="<?php the_permalink(); ?>" class="btn btn-primary">Read More</a>
								</div>
							</div>
						</div>
						<?php
					}
					echo '</div>';
				} wp_reset_query(); ?>
			</div>
			<?php get_sidebar(); ?>
		</div>
	</div>
</div>	

<?php
get_footer();
