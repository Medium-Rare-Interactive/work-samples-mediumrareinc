<?php
/**
 * The template for displaying archive pages
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package oubari_gulf
 */

get_header();
$queried_object = get_queried_object();
$tax_id = $queried_object->term_id;
$term_link = get_term_link( $queried_object );
if (isset($_GET['sortby'])) {
    echo $_GET['sortby'];
} ?>

<div class="inner_banner" style="background-image: url('<?php echo get_template_directory_uri(); ?>/images/category.jpg');">
	<div class="container text-center">
		<h2>Our Product Line</h2>
	</div>
</div>
<div class="bread">
	<div class="container">
		<div class="row">
			<div class="col-6 no_rightpadd">
				<div class="left">Machine Category <a href="#" class="side_toggle"><i class="fas fa-bars"></i></i></a>
				</div>
			</div>
			<div class="col-6 text-right no_leftpadd">
				Sort by:
				<div class="cat_filter">
					<a class="cat_filter" href="<?php echo esc_url( $term_link ); ?>?sortby=newest">Newest <img src="<?php echo get_template_directory_uri(); ?>/images/next.svg" alt="next"></a>
				</div>
			</div>
		</div>
	</div>
</div>
<div class="main_prodlist">
	<div class="container">
		<div class="side_bar">
			<ul>
				<?php
				$terms = get_terms( array( 
					'taxonomy' => 'products-cat',
					'parent'   => 0
				) );
				if ( ! empty( $terms ) && ! is_wp_error( $terms ) ) {
					foreach ( $terms as $term ) {
						$term_id = $term->term_id;
						?>
						<li <?php if($tax_id == $term_id || term_is_ancestor_of($term_id, $tax_id, 'products-cat')) echo 'class="active"'; ?>>
							<a class="parent_cat" href="#">
								<strong><?php echo get_field('nick_name', $term); ?></strong>
								<span><?php echo get_field('stock_details', $term); ?></span>
							</a>
							<?php
							$taxonomy_name = 'products-cat';
							$term_children = get_term_children( $term_id, $taxonomy_name );
							if ($term_children) {
								echo '<ul>';
								foreach ( $term_children as $child ) {
									$term_item = get_term_by( 'id', $child, $taxonomy_name );
									$sub_termid = $term_item->term_id;
									?>
									<li <?php if($tax_id == $sub_termid) echo 'class="active"'; ?>><a href="<?php echo get_term_link( $child, $taxonomy_name ); ?>"><?php echo $term_item->name; ?></a></li>
									<?php
								}
								echo '</ul>';
							}
							?> 
						</li>
						<?php
					}
				} wp_reset_query(); ?>
			</ul>
		</div>
		<div class="prod_article text-center">
			<article class="prod_mainright">
				<?php 
				$c = 0;
				$j = 0;
				$k = 0;
				if (have_posts()) {
					while (have_posts()) {
						the_post();
						$c++;
						$j++;
						$k++;
						?>
						<div id="prodcomm_<?php echo $k; ?>" class="prod_comm prod_comm<?php echo $i; if($j == 3) { $i=0; } ?> prod_comm<?php if($j != 2) echo '11'; else $j=0; ?>">
							<div class="image_box">
								<?php
								$args = array(
									'post_type' => 'attachment',
									'numberposts' => -1,
									'post_status' => null,
									'post_mime_type' => 'image',
									'post_parent' => $post->ID
								);
								$attachments = get_posts( $args );
								if ( $attachments ) {
									echo '<div class="prod_inn_slider">';
									foreach ( $attachments as $attachment ) {
										$imagethumb = wp_get_attachment_image_src($attachment->ID,'prod_sm');
										echo '<div class="prod_item"><img src="';
										echo $imagethumb[0];
										echo '" alt="Slider" /></div>';
										$img_var = $imagethumb[0];
									}
									echo '</div>';
								} else {
									echo '<div class="prod_inn_slider">';
									echo '<div class="prod_item">';
									the_post_thumbnail( 'prod_sm' );
									echo '</div>';
									echo '</div>';
								} ?>
								<?php if( get_field('new_arrivals') ) { ?>
								<span class="prod_tag">NEW</span>
								<?php } ?>
							</div>
							<div class="prod_item">
								<?php
								$first_term_name = get_the_terms( $post->ID, 'products-cat' )[0]->name;
								echo $first_term_name;
								?>
							</div>
							<div class="prod_title"><?php the_title(); ?></div>
							<div class="prod_btmbtn">
								<a data-src="<?php the_post_thumbnail_url('prod_sm'); ?>" class="left" href="#" data-toggle="modal" data-target="#prod_modal"><img src="<?php echo get_template_directory_uri(); ?>/images/bag.svg" alt="bag">Send Inquiry</a>
								<a class="right" href="#" data-toggle="modal" data-target="#cont_modal<?php echo $k; ?>"><img src="<?php echo get_template_directory_uri(); ?>/images/add-circle.svg" alt="plus">More info.</a>
							</div>
						</div>
						<?php
					}
				} ?>
				<div class="clearfix"></div>
			</article>
			<div class="page_nav text-center">
				<a href="#" class="nav_link nav_left"><img src="<?php echo get_template_directory_uri(); ?>/images/arrow-right.svg" alt=""></a>
				<div class="nav_text"><span>1</span> of &nbsp;15</div>
				<a href="#" class="nav_link nav_right"><img src="<?php echo get_template_directory_uri(); ?>/images/arrow-right.svg" alt=""></a>
			</div>
		</div>
		<div class="clearfix"></div>
	</div>
</div>

<?php
get_footer();
