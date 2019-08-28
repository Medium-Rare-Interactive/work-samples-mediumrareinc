<?php
/**
 * The template for displaying search results pages
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/#search-result
 *
 * @package dream_md
 */

get_header();
?>

	<div class="comm_padd">
		<div class="container">
			<div class="comm_text text-center">
				<h2>
					<?php 
					if(get_search_query() == '') {
						echo 'Search Results';
					} else {
						printf( esc_html__( 'Search Results for: %s', 'dream_md' ), '<span>' . get_search_query() . '</span>' );
					} ?>
				</h2>
			</div>
			<div class="row justify-content-center">
				<?php
				if (have_posts()) {
					while (have_posts()) {
						the_post();
						?>
						<div class="col-12 col-lg-8 col-md-10 comm_text">
							<div class="search_out">
								<a href="<?php the_permalink(); ?>"></a>
								<?php 
								if(has_post_thumbnail()) {
									$img_url = get_the_post_thumbnail_url( $post->ID, 'full');
									$image_call = aq_resize( $img_url, 262, 262, true, true, true );
									?>
									<div class="search_image" style="background-image: url('<?php echo $image_call; ?>');"></div>
									<?php
								} else { ?>
									<div class="search_image no_bg" style="background-image: url('<?php echo get_field('logo', 'options'); ?>');"></div>
								<?php } ?>
								<div class="search_cont">
									<h4><?php the_title(); ?></h4>
									<p><?php the_excerpt(); ?></p>
								</div>
							</div>
						</div>
						<?php
					}
				} else { ?>
					<div class="col-12">
						<div class="comm_text text-center">
							<p><strong><?php esc_html_e( 'Sorry, but nothing matched your search terms. Please try again with some different keywords.', 'throughput' ); ?></strong></p>
						</div>
						<div class="row justify-content-center">
							<div class="col-12">
								<form class="form_404" action="<?php echo home_url(); ?>/" method="get">
									<div class="form-row align-items-center justify-content-center">
										<div class="col-sm-6 col-9 my-1">
											<div class="input-group">
												<input type="text" name="s" id="search" class="form-control" value="<?php the_search_query(); ?>" placeholder="Type here...">
											</div>
										</div>
										<div class="col-auto my-1">
											<button type="submit" class="btn btn-primary"><i class="fas fa-search"></i></button>
										</div>
									</div>
								</form>
							</div>
						</div>
					</div>
				<?php } ?>
			</div>
		</div>
	</div>

<?php
get_footer();
