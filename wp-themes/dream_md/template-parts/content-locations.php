<?php
/**
 * Template part for displaying locations details
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package dream_md
 */

?>

<div class="profile_sec">
	<div class="container-fluid">
		<div class="row">
			<?php $img_url = get_the_post_thumbnail_url( $post->ID, 'full'); ?>
			<div class="col-lg-4 col-sm-6 col-12 profile_sec__item profile_sec__item__bg" style="background-image: url('<?php echo $img_url; ?>');">
				<div class="profile_sec__left">
					<h2><?php the_title(); ?></h2>
					<?php if(get_field('intro_content')) echo '<p>'.get_field('intro_content').'</p>'; ?>
				</div>
			</div>
			<div class="col-lg-4 col-sm-6 col-12 profile_sec__item">
				<div class="profile_sec__cont">
					<h2><?php the_title(); ?></h2>
					<?php the_field('detailed_data'); ?>
				</div>
			</div>
			<div class="col-lg-4 col-12 profile_sec__item profile_sec__last">
				<div class="profile_sec__right">
					<?php
					if(get_field('address')) echo '<h3>Address</h3><p>'.get_field('address').'</p>';
					if(get_field('map_link')) echo '<a target="_blank" class="btn btn-primary" href="'.get_field('map_link').'">Get Directions</a>';
					if ( have_rows('contact_info') ) {
						echo '<h3>Contact Info</h3><ul class="list-inline">';
						while ( have_rows('contact_info') ) {
							the_row();
							?>
							<li class="list-inline-item">
								<a <?php if(get_sub_field('link')) { ?>href="<?php the_sub_field('link'); ?>"<?php } ?> class="location_links d-none d-md-block"><?php the_sub_field('icon'); echo ' '; the_sub_field('info'); ?></a>
								<a <?php if(get_sub_field('link')) { ?>href="<?php the_sub_field('link'); ?>"<?php } ?> class="btn btn-primary d-block d-md-none"><?php the_sub_field('icon'); echo ' '; the_sub_field('info'); ?></a>
							</li>
							<?php
						}
						echo '</ul>';
					}
					if ( have_rows('expertise') ) {
						echo '<h3>Expertise</h3>';
						while ( have_rows('expertise') ) {
							the_row();
							?>
							<li style="display: block;"><?php echo get_sub_field('name'); ?></li>
							<?php
						}
						echo '</ul>';
					}
					if ( have_rows('serving_areas') ) {
						echo '<h3>Servicing Areas</h3><ul class="border_list">';
						while ( have_rows('servicing_areas') ) {
							the_row();
							?>
							<li><?php the_sub_field('name'); ?></li>
							<?php
						}
						echo '</ul>';
					}
					if(get_field('building_details')) echo '<h3>Primary Building</h3><p>'.get_field('building_details').'</p>';
					$images = get_field('gallery');
					$images_grid = get_field('gallery_grid');
					if( $images || $images_grid ) echo '<h3>Gallery</h3>';
					if( $images ) {
						?>
						<div class="comm_slider">
							<?php foreach( $images as $image ) {
								$img_url = $image['url'];
								$image_call = aq_resize( $img_url, 400, 210, true, true, true );
								?>
								<div class="comm_slider__item">
									<img src="<?php echo $image_call; ?>" alt="<?php echo $image['alt']; ?>" />
								</div>
							<?php } ?>
						</div>
					<?php } 
					if( $images_grid ) {
						?>
						<div class="grid_gallery">
							<?php foreach( $images_grid as $image ) {
								$img_url = $image['url'];
								$image_call = aq_resize( $img_url, 400, 310, true, true, true );
								$image_big = aq_resize( $img_url, 750, 500, true, true, true );
								?>
								<div class="grid_gallery__item">
									<div class="gallery_sec__img" data-target="#gal_Modal" data-toggle="modal" data-bigimage="<?php echo $image_big; ?>" <?php if($image['title']) { ?>data-title="<?php echo $image['title']; ?>"<?php } else { echo 'data-title="none"'; } ?> <?php if($image['description']) { ?>data-description="<?php echo $image['description']; ?>"<?php } else { echo 'data-description="none"'; } ?>>
										<i class="fas fa-search"></i>
										<img src="<?php echo $image_call; ?>" alt="<?php echo $image['alt']; ?>" />
									</div>
								</div>
							<?php } ?>
						</div>
					<?php } ?>
				</div>
			</div>
		</div>
	</div>
</div>
