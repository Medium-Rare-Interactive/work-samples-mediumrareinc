<?php
/**
 * Template Name: Home
 *
 * @link https://codex.wordpress.org/Template_Hierarchy
 *
 * @package oubari_gulf
 */

get_header();
$src = wp_get_attachment_image_src( get_post_thumbnail_id($post_id), 'full' );
$url = $src[0]; ?>

<div>
	<div class="banner">
		<div class="image_bg" style="background-image: url('<?php echo $url; ?>');"></div>
		<div class="container-fluid">
			<div class="row justify-content-end">
				<div class="col-md-8 col-12">
					<div class="banner_cont cust_center">
						<?php the_field('banner_contents'); ?>
						<ul>
							<li><a class="banner_link" href="#section_4">Send Inquiry</a></li>
							<li><a class="banner_video" href="#"><img src="<?php echo get_template_directory_uri(); ?>/images/player.svg" alt="player"> Watch <span>Video</span></a></li>
						</ul>
					</div>
				</div>
			</div>
		</div>
	</div>
	<section class="intro_company">
		<div class="container">
			<div class="row">
				<div class="col-12 comm_text">
					<h2>Company Information</h2>
				</div>
				<div class="col-md-6 col-12 comm_text">
					<?php 
					if (have_posts()) {
						while (have_posts()) {
							the_post();
							the_content();
						}
					}
					?>
				</div>
				<div class="col-md-5 col-12 text-right intro_side ml-auto">
					<div class="brands">
						<div class="comm_text">
							<h4>Our Brands Partners</h4>
						</div>
						<?php the_field('brands_image_list'); ?>
					</div>
					<div class="location">
						<div class="comm_text">
							<h4>Office Location</h4>
						</div>
						<?php the_field('office_location'); ?>
					</div>
				</div>
			</div>
		</div>
	</section>
</div>
<div id="section_2">
	<div class="our_products">
		<div class="container text-center">
			<div class="comm_text">
				<h2>Our Products</h2>
				<h4>Discover our top product categories</h4>
			</div>
			<div class="prod_catslider">
				<?php
				$terms = get_terms( array( 
					'taxonomy' => 'products-cat',
					'parent'   => 0
				) );
				if ( ! empty( $terms ) && ! is_wp_error( $terms ) ) {
					foreach ( $terms as $term ) {
						$term_id = $term->term_id;
						?>
						<div class="prod_catitem">
							<a href="<?php echo esc_url( get_term_link( $term ) ); ?>">
								<?php z_taxonomy_image($term_id); ?>
								<?php
								echo tep_break_at_first_word( $term->name );
								?>
							</a>
						</div>
						<?php
					}
				} wp_reset_query(); ?>
			</div>
		</div>
	</div>
	<div class="featured_prods">
		<div class="container text-center">
			<div class="comm_text">
				<h2>Featured</h2>
			</div>
			<div class="row">
				<?php
				$terms = get_terms( array( 
					'taxonomy' => 'products-cat',
					'parent'   => 0,
					'hide_empty' => false,
				) );
				if ( ! empty( $terms ) && ! is_wp_error( $terms ) ) {
					foreach ( $terms as $term ) {
						$term_id = $term->term_id;
						$image = get_field('featured_image', $term);
						$feature_type = get_field('feature_type', $term);
						$new_arrival = get_field('new_arrival', $term);
						if ($feature_type == 1) {
						?>
						<div class="col-md-4 col-6 comm_featured">
							<a href="<?php echo esc_url( get_term_link( $term ) ); ?>">
								<?php if ($new_arrival) {
									echo '<span class="tag">NEW</span>';
								} ?>
								<img src="<?php echo $image; ?>" alt="<?php echo $term->name; ?>">
								<strong><?php echo $term->name; ?></strong>
								<span class="count"><?php echo get_field('stock_details', $term); ?></span>
							</a>
						</div>
						<?php
						}
					}
				} wp_reset_query(); ?>
			</div>
		</div>
	</div>
</div>
<div id="section_3" class="news_tabs">
	<div class="container">
		<div class="comm_text text-center">
			<h2>News & Events</h2>
		</div>
		<div class="row justify-content-between">
			<div class="col-md-3 col-12">
				<?php
				$terms = get_terms( 'category' );
				$count = 0;
				if ( ! empty( $terms ) && ! is_wp_error( $terms ) ) {
					echo '<ul class="news_tablist">';
					foreach ( $terms as $term ) {
						$count++;
						$term_id = $term->term_id;
						?>
						<li <?php if($count == 1) { echo 'class="active"'; } ?>><a data-tab="news_tab<?php echo $count; ?>" href="#news_tab<?php echo $count; ?>"><?php echo $term->name; ?></a></li>
						<?php
					}
					echo '</ul>';
				} wp_reset_query(); ?>
			</div>
			<div class="col-md-9 col-12">
				<?php
				$terms = get_terms( 'category' );
				$count = 0;
				if ( ! empty( $terms ) && ! is_wp_error( $terms ) ) {
					foreach ( $terms as $term ) {
						$count++;
						$term_id = $term->term_id;
						$args = array(
							'post_type' => 'post',
							'posts_per_page' => -1,
							'tax_query' => array(
								array(
									'taxonomy' => 'category',
									'field' => 'id',
									'terms' => $term_id
								)
							)
						);
						query_posts($args);
						if (have_posts()) {
							?>
							<div id="news_tab<?php echo $count; ?>" class="news_tabcont <?php if($count == 1) { echo 'active'; } ?>">
								<div class="news_slider">
									<?php
									while (have_posts()) {
										the_post();
										?>
										<div class="news_item">
											<div class="row">
												<div class="col-lg-5 col-12 news_contside">
													<?php the_post_thumbnail( 'news_thumb' ); ?>
													<?php the_field('news_contact_details'); ?>
												</div>
												<div class="col-lg-7 col-12 news_conttext">
													<h3><?php the_title(); ?></h3>
													<span class="date"><?php the_time('F j, Y') ?></span>
													<?php the_content(); ?>
												</div>
											</div>
										</div>
										<?php
									} ?>
								</div>
							</div>
							<?php
						}
					}
				} 
				wp_reset_query(); ?>
			</div>
		</div>
	</div>
</div>
<div id="section_4">
	<div class="contact_sec">
		<div class="container">
			<div class="comm_text text-center">
				<h2>Contact Us</h2>
				<h3>Need help or an Inquiry</h3>
				<h4>Please get in touch with us and we’ll reply as soon as possible.</h4>
			</div>
		</div>
	</div>
	<div class="contact_formsec">
		<div class="container">
			<div class="form_head">
				<h3>Message.</h3>
			</div>
		</div>
		<div class="form_inner">
			<div class="form_data">
				<div class="map_marker">
					<img src="<?php echo get_template_directory_uri(); ?>/images/dot.svg" alt="marker">
					<span>We’re excited to hear from u!</span>
				</div>
				<?php echo do_shortcode( '[contact-form-7 id="11" title="Contact Form"]' ); ?>
			</div>
			<div id="map"></div>
		</div>
	</div>
	<div class="contact_address">
		<div class="address_list">
			<div class="container text-uppercase text-center">
				<ul>
					<?php
					wp_reset_query();
					$count = 0;
					$args = array( 'post_type' => 'contact', 'posts_per_page' => -1 );
					query_posts($args);
					if (have_posts()) {
						while (have_posts()) {
							the_post();
							$count++;
							?>
							<li <?php if($count==1) echo 'class="active"'; ?>><a href="#add<?php echo $count; ?>"><?php the_title(); ?></a></li>
							<?php 
						}
					} wp_reset_query(); ?>
				</ul>
			</div>
		</div>
		<?php
		wp_reset_query();
		$count = 0;
		$args = array( 'post_type' => 'contact', 'posts_per_page' => -1 );
		query_posts($args);
		if (have_posts()) {
			while (have_posts()) {
				the_post();
				$count++;
				?>
				<div id="add<?php echo $count; ?>" class="address_cont <?php if($count==1) echo 'active'; ?>">
					<div class="container text-center">
						<?php the_content(); ?>
					</div>
				</div>
				<?php
			}
		} wp_reset_query(); ?>
	</div>
</div>

<?php
get_footer();
