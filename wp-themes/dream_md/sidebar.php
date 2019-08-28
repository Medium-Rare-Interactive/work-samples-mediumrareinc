<?php
/**
 * The sidebar containing the main widget area
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package dream_md
 */

if ( ! is_active_sidebar( 'sidebar-1' ) ) {
	return;
}
?>

<aside class="col-md-4 col-12 comm_side order-md-1">
	<?php
	dynamic_sidebar( 'sidebar-1' );
	$args = array('post_type' => 'ads', 'posts_per_page' => 10);
	query_posts($args);
	if(have_posts()) {
		echo '<div class="ads_slider">';
		while (have_posts()) {
			the_post();
			?>
			<div class="ads_slider__item">
				<?php if(get_field('url')) { ?>
					<a href="<?php the_field('url'); ?>"></a>
				<?php }
				the_content(); ?>
			</div>
			<?php
		}
		echo '</div>';
	} wp_reset_query(); ?>
</aside>
