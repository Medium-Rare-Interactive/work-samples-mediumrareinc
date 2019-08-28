<?php
/**
 * Template Name: Home
 *
 * @link https://codex.wordpress.org/Template_Hierarchy
 *
 * @package nt_beverages
 */

get_header(); ?>

<div class="home_video wow fadeIn" data-wow-duration="0.50s" data-wow-delay="0.55s">
	<div class="vid_item" style="background-image: url('<?php echo get_template_directory_uri(); ?>/images/video.jpg');">
		<video data-object-fit="cover" muted preload="none" loop autoplay poster="<?php echo get_template_directory_uri(); ?>/images/video.jpg" class="img-cover hidden-xs">
			<source src="<?php echo get_template_directory_uri(); ?>/videos/video.mp4" type="video/mp4">
			<source src="<?php echo get_template_directory_uri(); ?>/videos/video.ogv" type="video/ogg">
			<source src="<?php echo get_template_directory_uri(); ?>/videos/video.webm" type="video/webm">
		</video>
	</div>
	<div style="background-image: url('<?php echo get_template_directory_uri(); ?>/images/video.jpg');" class="video_inner_mob visible-xs"></div>
</div>
<div class="home_intro comm_text bg_white">
	<div class="container text-center wow fadeInUp" data-wow-duration="0.50s" data-wow-delay="0.55s">
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
<div class="home_sourceintro home_middle wow fadeIn" data-wow-duration="0.40s" data-wow-delay="0.45s" style="background-image: url('<?php echo get_template_directory_uri(); ?>/images/home_bg2.jpg');">
	<div class="container">
		<div class="source_introbox wow fadeInUp" data-wow-duration="0.50s" data-wow-delay="0.55s">
			<?php the_field('middle_contents'); ?>
			<div class="wow fadeInUp" data-wow-duration="0.60s" data-wow-delay="0.65s">
				<a href="<?php echo get_permalink(40); ?>" class="read_more">LEARN MORE</a>
			</div>
		</div>
	</div>
</div>
<div class="home_intro comm_text bg_white">
	<div class="container-fluid text-center">
		<h2>Our Products</h2>
		<br>
		<ul class="product_list wow fadeInUp" data-wow-duration="0.50s" data-wow-delay="0.55s">
			<li><a href="https://www.akunasprings.com.au/" target="_blank"><img src="<?php echo get_template_directory_uri(); ?>/images/product_1.jpg" alt="Products"></a></li>
			<li><a href="https://www.akunablue.com.au/" target="_blank"><img src="<?php echo get_template_directory_uri(); ?>/images/akuna.jpg" alt="Products"></a></li>
			<li><a href="https://akunacustom.com.au/" target="_blank"><img src="<?php echo get_template_directory_uri(); ?>/images/product_3.jpg" alt="Products"></a></li>
		</ul>
	</div>
</div>
<div class="home_sourceintro wow fadeIn" data-wow-duration="0.40s" data-wow-delay="0.45s" style="background-image: url('<?php echo get_template_directory_uri(); ?>/images/home_bg3.jpg');">
	<div class="container">
		<div class="source_introbox wow fadeInUp" data-wow-duration="0.50s" data-wow-delay="0.55s">
			<?php the_field('bottom_contents'); ?>
			<a href="<?php echo get_permalink(45); ?>" class="read_more wow fadeInUp" data-wow-duration="0.60s" data-wow-delay="0.65s">FIND OUT MORE</a>
		</div>
	</div>
</div>

<?php
get_footer();
