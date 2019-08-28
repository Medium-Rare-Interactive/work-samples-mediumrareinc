<?php
/**
 * Template part for displaying teams details
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package dream_md
 */

?>

<div class="profile_sec">
	<div class="container-fluid">
		<div class="row <?php if ( !have_rows('education_training') && !have_rows('certifications') && !have_rows('board_certifications')) { echo 'align-items-center'; } ?>">
			<div class="col-lg-4 col-sm-6 col-12 profile_sec__item profile_sec__item__bg" style="background-image: url('<?php the_field('profile_image'); ?>');">
			</div>
			<div class="<?php if ( !have_rows('education_training') && !have_rows('certifications') && !have_rows('board_certifications')) { echo 'col-lg-6'; } else { echo 'col-lg-4'; } ?> col-sm-6 col-12 profile_sec__item">
				<div class="profile_sec__cont">
					<h3>
						<?php
						the_title();
						if(get_field('intro_qualification')) {
							echo ', '.get_field('intro_qualification');
						} ?>
					</h3>
					<?php 
					if(get_field('position_name')) echo '<h4>'.get_field('position_name').'</h4>';
					if(get_field('short_bio')) echo '<p>'.get_field('short_bio').'</p>';
					if ( have_rows('areas_of_expertise') ) {
						echo '<h3>Areas of Expertise &amp; Interests</h3><ul class="border_list">';
						while ( have_rows('areas_of_expertise') ) {
							the_row();
							?>
							<li><?php the_sub_field('area_name'); ?></li>
							<?php
						}
						echo '</ul>';
					} ?>
				</div>
			</div>
			<div class="col-lg-4 col-12 profile_sec__item profile_sec__last <?php if ( !have_rows('education_training') && !have_rows('certifications') && !have_rows('board_certifications')) { echo 'd-none'; } ?>">
				<div class="profile_sec__right">
					<?php
					if ( have_rows('education_training') ) {
						echo '<h3>Education &amp; Training</h3><ul class="border_list">';
						while ( have_rows('education_training') ) {
							the_row();
							?>
							<li><?php the_sub_field('education_name'); ?></li>
							<?php
						}
						echo '</ul>';
					}
					if ( have_rows('certifications') ) {
						echo '<h3>Certifications</h3><ul class="certif_list">';
						while ( have_rows('certifications') ) {
							the_row();
							?>
							<li><img src="<?php the_sub_field('image'); ?>" alt="<?php the_sub_field('name'); ?>"></li>
							<?php
						}
						echo '</ul>';
					}
					if ( have_rows('board_certifications') ) {
						echo '<h3>Board Certification</h3><ul class="border_list">';
						while ( have_rows('board_certifications') ) {
							the_row();
							?>
							<li><?php the_sub_field('name'); ?></li>
							<?php
						}
						echo '</ul>';
					} ?>
				</div>
			</div>
		</div>
	</div>
</div>