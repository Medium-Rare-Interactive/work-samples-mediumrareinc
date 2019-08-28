<?php
/**
 * Template part for displaying top banner
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package dream_md
 */

$page_type = get_queried_object();
$bg_color = get_field('bg_color', $page_type) ? get_field('bg_color', $page_type) : '#07517c';
$bg_image = get_field('bg_image', $page_type) ? get_field('bg_image', $page_type) : '';
$text_color = get_field('text_color', $page_type) ? get_field('text_color', $page_type) : 'text_light';
?>

<div class="alter_banner <?php echo $text_color; ?>" style="background-color: <?php echo $bg_color; ?>; background-image: url('<?php echo $bg_image; ?>');">
	<div class="container text-center">
		<h2>
			<?php
			if(is_archive()) {
				the_archive_title();
			} else {
				the_title();
			} ?>
		</h2>
	</div>	
</div>