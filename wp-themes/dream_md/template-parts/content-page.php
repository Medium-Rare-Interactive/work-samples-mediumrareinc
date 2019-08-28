<?php
/**
 * Template part for displaying page content in page.php
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package dream_md
 */

get_template_part( 'template-parts/content', 'banner' );
?>

<div class="comm_padd">
	<div class="container">
		<div class="row justify-content-md-between">
			<div class="col-md-8 col-12 order-md-2">
				<div class="comm_text">
					<?php
					echo '<h2>'.get_the_title().'</h2>';
					the_content();
					?>
				</div>
			</div>
			<?php get_sidebar(); ?>
		</div>
	</div>
</div>