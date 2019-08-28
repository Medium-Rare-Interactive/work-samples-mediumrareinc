<?php
/**
 * Template part for displaying content in single post
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

<div class="alter_banner alter_banner__post <?php echo $text_color; ?>" style="background-color: <?php echo $bg_color; ?>; background-image: url('<?php echo $bg_image; ?>');">
	<div class="container text-center">
		<div class="row justify-content-center">
			<div class="col-lg-6 col-md-8 col-12">
				<h2><?php the_title(); ?></h2>
				<p><em><?php the_time('l jS F, Y') ?></em></p>
				<div class="author_details">
					<div class="author_bio">
						<?php 
						$author_id=$post->post_author;
						the_author_meta( 'user_description' , $author_id );
						$author_img = get_field('author_img', 'user_'. $author_id );
						$position_name = get_field('position_name', 'user_'. $author_id );
						?>
					</div>
					<div class="author_image">
						<?php if($author_img) { ?>
							<img src="<?php echo $author_img; ?>" alt="<?php the_author_meta( 'user_firstname' , $author_id ); ?>">
						<?php } else { ?>
							<img src="<?php echo get_field('site_icon', 'options'); ?>" alt="<?php the_author_meta( 'user_firstname' , $author_id ); ?>">
						<?php } ?>
						<p <?php if(!$position_name) echo 'class="no_social"'; ?>>
							<strong><?php the_author_meta( 'user_firstname' , $author_id ); ?> <?php the_author_meta( 'user_lastname' , $author_id ); ?></strong>
							<?php echo $position_name; ?>
						</p>
					</div>
				</div>
			</div>
		</div>
	</div>	
</div>

<div class="comm_padd">
	<div class="container">
		<div class="row justify-content-md-between">
			<div class="col-md-8 col-12 order-md-2">
				<div class="comm_text">
					<?php
					echo '<h3 class="comm_text__posttitle">'.get_the_title().'</h3>';
					the_content();
					?>
					<div class="share_btns">
						<ul class="list-inline">
							<li class="list-inline-item">
								<a class="twitter" target="_blank" href="http://twitter.com/intent/tweet?text=<?php if(get_field('twitter_share_info')) { the_field('twitter_share_info'); } else { ?>Currently reading <?php the_title(); } ?>&amp;url=<?php the_permalink(); ?>">
									<i class="fab fa-twitter"></i> 
									Tweet
								</a>
							</li>
							<li class="list-inline-item">
								<a class="fb" target="_blank" href="https://www.facebook.com/sharer?u=<?php the_permalink();?>&t=<?php the_title(); ?>"><i class="fab fa-facebook-f"></i> Share</a>
							</li>
							<li class="list-inline-item">
								<a href="mailto:?subject=<?php if(get_field('email_share_subject')) { the_field('email_share_subject'); } else { ?>I wanted you to see this site<?php } ?>&amp;body=<?php if(get_field('email_share_info')) { the_field('email_share_info'); } else { ?>Check out this site: <?php the_permalink(); } ?>" title="Share by Email"><i class="fas fa-envelope"></i> Email</a>
							</li>
							<li class="list-inline-item">
								<a class="linkedin" href="http://www.linkedin.com/shareArticle?mini=true&url=<?php the_permalink() ?>&title=<?php the_title(); ?>&summary=&source=<?php bloginfo('name'); ?>" target="_new"><i class="fab fa-linkedin-in"></i> Share</a>
							</li>
						</ul>
					</div>
					<div class="author_details padded">
						<?php 
						$author_id=$post->post_author;
						$linkedin_url = get_field('linkedin_url', 'user_'. $author_id );
						$twitter_url = get_field('twitter_url', 'user_'. $author_id );
						?>
						<div class="author_image">
							<?php if($author_img) { ?>
								<img src="<?php echo $author_img; ?>" alt="<?php the_author_meta( 'user_firstname' , $author_id ); ?>">
							<?php } else { ?>
								<img src="<?php echo get_field('site_icon', 'options'); ?>" alt="<?php the_author_meta( 'user_firstname' , $author_id ); ?>">
							<?php } ?>
							<h5 <?php if(!$twitter_url && !$linkedin_url) echo 'class="no_social"'; ?>>Written By</h5>
							<p>
								<strong><?php the_author_meta( 'user_firstname' , $author_id ); ?> <?php the_author_meta( 'user_lastname' , $author_id ); ?></strong>
							</p>
							<?php if($twitter_url || $linkedin_url) { ?>
								<ul class="author_links">
									<?php if($linkedin_url) { ?>
										<li><a target="_blank" href="<?php echo $linkedin_url; ?>">LinkedIn</a></li>
									<?php } if($twitter_url) { ?>
										<li><a target="_blank" href="<?php echo $twitter_url; ?>">Twitter</a></li>
									</ul>
								<?php }
							} ?>
						</div>
					</div>
				</div>
			</div>
			<?php get_sidebar(); ?>
		</div>
		<div class="row">
			<div class="col-12">
				<div class="comm_title comm_text">
					<br>
					<h3 class="text-left">Related Posts</h3>
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
	</div>
</div>