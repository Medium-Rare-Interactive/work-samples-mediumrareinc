<?php
/**
 * The template for displaying 404 pages (not found)
 *
 * @link https://codex.wordpress.org/Creating_an_Error_404_Page
 *
 * @package dream_md
 */

get_header();
?>

<div class="comm_padd">
	<div class="container">
		<div class="comm_text text-center">
			<h2><?php esc_html_e( 'Oops! That page can&rsquo;t be found.', 'dream_md' ); ?></h2>
			<p><?php esc_html_e( 'It looks like nothing was found at this location. Maybe try one of the links below or a search?', 'dream_md' ); ?></p>
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
		<div class="row">
			<div class="col-12">
				<div class="comm_title comm_text">
					<br>
					<h3>From The Blog</h3>
				</div>
			</div>
		</div>
		<?php
		$args = array('post_type' => 'post', 'posts_per_page' => 3);
		query_posts($args);
		if(have_posts()) {
			echo '<div class="row">';
			while (have_posts()) {
				the_post();
				?>
				<div class="col-lg-4 col-sm-6 col-12">
					<div class="box_cont__item">
						<a href="<?php the_permalink(); ?>">
							<?php
							$img_url = get_the_post_thumbnail_url( $post->ID, 'full');
							$image_call = aq_resize( $img_url, 558, 306, true, true, true );
							if($image_call) {
								echo '<img src="'.$image_call.'" alt="image">';
							} else {
								echo '<div class="box_cont__blogimg"><img src="https://via.placeholder.com/558x306/000000/000000" alt="image"><img class="box_cont__absimg" src="'.get_field('logo', 'options').'" alt="image"></div>';
							} ?>
							<h3><?php the_title(); ?></h3>
							<p><?php echo wp_trim_words( get_the_excerpt(), 18, '...' ); ?></p>
							<span class="btn btn-primary">Read More</span>
						</a>
					</div>
				</div>
				<?php
			}
			echo '</div>';
		} wp_reset_query(); ?>
		<div class="sm_padd text-center">
			<hr><br>
			<a href="/blog" class="btn btn-primary">More Blog Items</a>
		</div>
	</div>
</div>

<?php
get_footer();
