<?php
/**
 * The template for displaying all pages
 *
 * This is the template that displays all pages by default.
 * Please note that this is the WordPress construct of pages
 * and that other 'pages' on your WordPress site may use a
 * different template.
 *
 * @link https://codex.wordpress.org/Template_Hierarchy
 *
 * @package nt_beverages
 */
if(is_page(30)) {
	$post_id = $_GET['post'];
	if($post_id != "") {
		$post_id = $_GET['post'];
		$data_url = get_the_title($post_id);
		echo '<div class="invisible" id="data_url" data-url="'.$data_url.'"></div>';
	}
	else {
		$url = get_permalink(17);
		wp_redirect( $url );
		exit;
	}
}
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
			?>
		</div>
	</div>
</div>

<?php
get_footer();
