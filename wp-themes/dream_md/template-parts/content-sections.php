<?php
/**
 * Template part for displaying sections layouts.
 *
 * @link https://codex.wordpress.org/Template_Hierarchy
 *
 * @package dream_md
 */

get_header();

$team_cats = 0;
$team_thumb = 0;
if (have_posts()) {
	while (have_posts()) {
		the_post();
		if( have_rows('sections_layout') ) {
			while ( have_rows('sections_layout') ) {
				the_row();

				if( get_row_layout() == 'home_slider' ) {
					if( have_rows('slider_item') ) {
						echo '<div class="home_slider comm_text">';
						while ( have_rows('slider_item') ) {
							the_row();
							?>
							<div class="home_slider__item" style="background-image: url('<?php the_sub_field('image'); ?>');">
								<div class="container">
									<div class="row">
										<div class="col-lg-10 col-12">
											<h2><?php echo get_sub_field('title'); ?></h2>
											<p><?php the_sub_field('contents'); ?></p>
											<?php
											if ( have_rows('call_actions') ) {
												echo '<ul class="list-inline">';
												while ( have_rows('call_actions') ) {
													the_row();
													?>
													<li class="list-inline-item"><a href="<?php the_sub_field('action_link'); ?>" class="btn btn-lg btn-primary"><?php the_sub_field('action_text'); ?></a></li>
													<?php
												}
												echo '</ul>';
											} ?>
										</div>
									</div>
								</div>
							</div>
							<?php
						}
						echo '</div>';
					}
				}

				if( get_row_layout() == 'normal_banner' ) {
					$bg_image = get_sub_field('image') ? get_sub_field('image') : 'none';
					$text_color = get_sub_field('text_color') ? get_sub_field('text_color') : 'text_dark';
					?>
					<div class="comm_banner <?php echo $text_color; ?>" style="background-image: url('<?php echo $bg_image; ?>');">
						<div class="container">
							<?php the_sub_field('contents'); ?>
						</div>
					</div>
					<?php
				}

				if( get_row_layout() == 'highlight_text' ) {
					$bg_color = get_sub_field('bg_color') ? get_sub_field('bg_color') : 'transparent';
						$text_color = get_sub_field('text_color') ? get_sub_field('text_color') : 'text_dark';
					?>
					<div class="high_text <?php echo $text_color; ?>" style="background-color: <?php echo $bg_color; ?>;">
						<div class="container">
							<p><?php the_sub_field('text'); ?></p>
						</div>
					</div>
					<?php
				}

				if( get_row_layout() == 'icon_lists' ) {
					$bg_color = get_sub_field('bg_color') ? get_sub_field('bg_color') : 'transparent';
					$text_color = get_sub_field('text_color') ? get_sub_field('text_color') : 'text_dark';
					if( have_rows('icon_list') ) {
						echo '<div class="icon_lists sm_padd '.$text_color.'" style="background-color: '.$bg_color.';"><div class="container"><div class="row">';
						while ( have_rows('icon_list') ) {
							the_row();
							?>
							<div class="col-xl-2 col-sm-4 col-6">
								<div class="icon_lists__item">
									<?php
									if(get_sub_field('image')) {
										if(get_sub_field('url')) {
											echo '<a href="'.get_sub_field('url').'">';
										} ?>
										<img src="<?php the_sub_field('image'); ?>" alt="<?php the_sub_field('text'); ?>">
										<?php
										if(get_sub_field('url')) {
											echo '</a>';
										}
									} ?>
									<p><?php the_sub_field('text'); ?></p>
								</div>
							</div>
							<?php
						}
						echo '</div></div></div>';
					}
				}

				if( get_row_layout() == 'sideways_imagecontent' ) {
					$extra_btm = get_sub_field('extra_btm') ? 'extra_btm' : '';
					$bg_color = get_sub_field('bg_color') ? get_sub_field('bg_color') : 'transparent';
					$image_position = get_sub_field('image_position');
					$text_color = get_sub_field('text_color') ? get_sub_field('text_color') : 'text_dark';
					?>
					<div class="sideway_cont <?php echo $extra_btm; ?> <?php echo $image_position; ?> <?php echo $text_color; ?>" style="background-color: <?php echo $bg_color; ?>;">
						<div class="sideway_cont__img" style="background-image: url('<?php the_sub_field('side_image'); ?>');"></div>
						<div class="container">
							<div class="row align-items-center">
								<div class="col-lg-6 col-12 order-<?php if($image_position == 'left') echo '1'; else echo '2'; ?>"></div>
								<div class="col-lg-6 col-12 order-<?php if($image_position == 'left') echo '2'; else echo '1'; ?>">
									<div class="comm_text">
										<?php
										the_sub_field('contents');
										if ( have_rows('call_actions') ) {
											echo '<ul class="list-inline">';
											while ( have_rows('call_actions') ) {
												the_row();
												?>
												<li class="list-inline-item"><a href="<?php the_sub_field('link'); ?>" class="btn btn-primary"><?php the_sub_field('title'); ?></a></li>
												<?php
											}
											echo '</ul>';
										} ?>
									</div>
								</div>
							</div>
						</div>
					</div>
					<?php
				}

				if( get_row_layout() == 'panels' ) {
					$bg_color = get_sub_field('bg_color') ? get_sub_field('bg_color') : 'transparent';
					$text_color = get_sub_field('text_color') ? get_sub_field('text_color') : 'text_dark';
					?>
					<div class="panels_heads <?php echo $text_color; ?>" style="background-color: <?php echo $bg_color; ?>;">
						<div class="container">
							<div class="row">
								<?php
								if ( have_rows('panels_items') ) {
									$panels_id = 0;
									?>
									<div class="col-12">
										<ul>
											<?php
											while ( have_rows('panels_items') ) {
												the_row();
												$panels_id++;
												?>
												<li class="<?php if($panels_id == 1) echo 'active'; ?>">
													<a href="#panels_<?php echo $panels_id; ?>">
														<?php
														if(get_sub_field('icon')) echo '<img src="'.get_sub_field('icon').'" alt="icon" />';
														echo '<strong>'.get_sub_field('title').'</strong>';
														if(get_sub_field('sub_title')) the_sub_field('sub_title');
														?>
													</a>
												</li>
												<?php
											} ?>
										</ul>
									</div>
									<?php
								} ?>
							</div>
						</div>
					</div>
					<div class="panels_boxes <?php echo $text_color; ?>" style="background-color: <?php echo $bg_color; ?>;">
						<div class="container">
							<div class="row">
								<?php
								if ( have_rows('panels_items') ) {
									$panels_id = 0;
									while ( have_rows('panels_items') ) {
										the_row();
										$panels_id++;
										$content_position = get_sub_field('content_position');
										?>
										<div id="panels_<?php echo $panels_id; ?>" class="col-12 panel_inn <?php if($panels_id == 1) echo 'active'; ?>">
											<div class="row align-items-center justify-content-between">
												<div class="col-md-5 col-12 order-md-<?php if($content_position == 'left') echo '2'; else echo '1'; ?>">
													<?php
													if(get_sub_field('cta_image')) {
														echo '<img class="panel_image" src="'.get_sub_field('cta_image').'" alt="Image"/>';
													} ?>
												</div>
												<div class="col-md-7 col-lg-6 col-12 order-md-<?php if($content_position == 'left') echo '1'; else echo '2'; ?>">
													<div class="comm_text">
														<?php
														the_sub_field('contents');
														if ( have_rows('call_actions') ) {
															echo '<ul class="list-inline">';
															while ( have_rows('call_actions') ) {
																the_row();
																?>
																<li class="list-inline-item"><a href="<?php the_sub_field('link'); ?>" class="btn btn-primary"><?php the_sub_field('title'); ?></a></li>
																<?php
															}
															echo '</ul>';
														} ?>
													</div>
												</div>
											</div>
										</div>
										<?php
									}
								} ?>
							</div>
						</div>
					</div>
					<?php
				}

				if( get_row_layout() == 'box_imagecontents' ) {
					$column_number = get_sub_field('column_number');
					$bg_color = get_sub_field('bg_color') ? get_sub_field('bg_color') : 'transparent';
					$text_color = get_sub_field('text_color') ? get_sub_field('text_color') : 'text_dark';
					?>
					<div class="box_cont sm_padd <?php echo $text_color; ?>" style="background-color: <?php echo $bg_color; ?>;">
						<div class="container">
							<?php if(get_sub_field('title_contents')) { ?>
							<div class="row">
								<div class="col-12">
									<div class="comm_title comm_text">
										<?php the_sub_field('title_contents'); ?>
									</div>
								</div>
							</div>
							<?php }
							if ( have_rows('image_content_boxes') ) {
								echo '<div class="row">';
								while ( have_rows('image_content_boxes') ) {
									the_row();
									?>
									<div class="col-lg-<?php echo $column_number; ?> col-sm-6 col-12">
										<div class="box_cont__item">
											<?php
											if(get_sub_field('link_column')) echo '<a href="'.get_sub_field('link_column').'">';
											?>
											<img src="<?php the_sub_field('image'); ?>" alt="image">
											<?php
											the_sub_field('contents');
											if(get_sub_field('link_column')) echo '</a>';
											?>
										</div>
									</div>
									<?php
								}
								echo '</div>';
							} ?>
						</div>
					</div>
					<?php
				}

				if( get_row_layout() == 'custom_blog_boxes' ) {
					$column_number = get_sub_field('column_number');
					$bg_color = get_sub_field('bg_color') ? get_sub_field('bg_color') : 'transparent';
					$text_color = get_sub_field('text_color') ? get_sub_field('text_color') : 'text_dark';
					?>
					<div class="box_cont sm_padd <?php echo $text_color; ?>" style="background-color: <?php echo $bg_color; ?>;">
						<div class="container">
							<?php if(get_sub_field('title_contents')) { ?>
							<div class="row">
								<div class="col-12">
									<div class="comm_title comm_text">
										<?php the_sub_field('title_contents'); ?>
									</div>
								</div>
							</div>
							<?php }
							if ( have_rows('blog_boxes') ) {
								echo '<div class="row">';
								while ( have_rows('blog_boxes') ) {
									the_row();
									?>
									<div class="col-lg-<?php echo $column_number; ?> col-sm-6 col-12">
										<div class="box_cont__item">
											<?php
											$post_object = get_sub_field('blog_post');
											if( $post_object ) {
												$post = $post_object;
												setup_postdata( $post );
												?>
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
												<?php
												wp_reset_postdata();
											} ?>
										</div>
									</div>
									<?php
								}
								echo '</div>';
							} ?>
						</div>
					</div>
					<?php
				}

				if( get_row_layout() == 'blog_posts' ) {
					$column_number = get_sub_field('column_number');
					$blogs_number = get_sub_field('blogs_number');
					$bg_color = get_sub_field('bg_color') ? get_sub_field('bg_color') : 'transparent';
					$text_color = get_sub_field('text_color') ? get_sub_field('text_color') : 'text_dark';
					?>
					<div class="box_cont sm_padd <?php echo $text_color; ?>" style="background-color: <?php echo $bg_color; ?>;">
						<div class="container">
							<?php if(get_sub_field('title_contents')) { ?>
							<div class="row">
								<div class="col-12">
									<div class="comm_title comm_text">
										<?php the_sub_field('title_contents'); ?>
									</div>
								</div>
							</div>
							<?php }
							$args = array('post_type' => 'post', 'posts_per_page' => $blogs_number);
							query_posts($args);
							if(have_posts()) {
								echo '<div class="row">';
								while (have_posts()) {
									the_post();
									?>
									<div class="col-lg-<?php echo $column_number; ?> col-sm-6 col-12">
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
							<div class="sm_padd text-center">
								<hr><br>
								<a href="/blog" class="btn btn-primary">More Blog Items <i class="fas fa-chevron-right"></i></a>
							</div>
						</div>
					</div>
					<?php
				}

				if( get_row_layout() == 'common_sec' ) {
					$bg_color = get_sub_field('bg_color') ? get_sub_field('bg_color') : 'transparent';
					$bg_img = get_sub_field('bg_image');
					$text_color = get_sub_field('text_color') ? get_sub_field('text_color') : 'text_dark';
					?>
					<div class="comm_content sm_padd <?php echo $text_color; ?>" style="background-color: <?php echo $bg_color; ?>; background-image: url('<?php echo $bg_img; ?>');">
						<div class="container">
							<div class="row">
								<div class="col-12 comm_text">
									<?php
									the_sub_field('contents');
									if(get_sub_field('buttons_align')) {
										echo '<div class="text-center">';
									}
									if ( have_rows('call_actions') ) {
										echo '<ul class="list-inline">';
										while ( have_rows('call_actions') ) {
											the_row();
											?>
											<li class="list-inline-item"><a href="<?php the_sub_field('link'); ?>" class="btn btn-primary"><?php the_sub_field('title'); ?></a></li>
											<?php
										}
										echo '</ul>';
									}
									if(get_sub_field('buttons_align')) {
										echo '</div>';
									} ?>
								</div>
							</div>
						</div>
					</div>
					<?php
				}

				if( get_row_layout() == 'column_contents' ) {
					$column_number = get_sub_field('column_number');
					$bg_color = get_sub_field('bg_color') ? get_sub_field('bg_color') : 'transparent';
					$vertical_center = get_sub_field('vertical_center');
					$text_color = get_sub_field('text_color') ? get_sub_field('text_color') : 'text_dark';
					?>
					<div class="sm_padd col_boxes <?php echo $text_color; ?>" style="background-color: <?php echo $bg_color; ?>;">
						<div class="container">
							<?php
							if ( have_rows('content_boxes') ) {
								if($vertical_center) {
									echo '<div class="row align-items-center">';
								} else {
									echo '<div class="row">';
								}
								while ( have_rows('content_boxes') ) {
									the_row();
									?>
									<div class="col-lg-<?php echo $column_number; ?> col-12 comm_text">
										<div class="col_boxes__item">
											<?php the_sub_field('contents'); ?>
										</div>
									</div>
									<?php
								}
								echo '</div>';
							} ?>
						</div>
					</div>
					<?php
				}

				if( get_row_layout() == 'call_action_area' ) {
					$bg_color = get_sub_field('bg_color') ? get_sub_field('bg_color') : 'transparent';
					$text_color = get_sub_field('text_color') ? get_sub_field('text_color') : 'text_dark';
					?>
					<div class="call_action sm_padd <?php echo $text_color; ?>" style="background-color: <?php echo $bg_color; ?>;">
						<div class="container text-center">
							<?php
							the_sub_field('text');
							if(get_sub_field('call_action_link') && get_sub_field('call_action_text')) {
								?>
								<a href="<?php the_sub_field('call_action_link'); ?>" class="btn btn-lg btn-primary"><?php the_sub_field('call_action_text'); ?></a>
							<?php } ?>
						</div>
					</div>
					<?php
				}

				if( get_row_layout() == 'image_title_sec' ) {
					$bg_color = get_sub_field('bg_color') ? get_sub_field('bg_color') : 'transparent';
					$text_color = get_sub_field('text_color') ? get_sub_field('text_color') : 'text_dark';
					$column_number = get_sub_field('column_number');
					?>
					<div class="image_iconbox <?php echo $text_color; ?>" style="background-color: <?php echo $bg_color; ?>;">
						<div class="container">
							<?php
							if ( have_rows('image_content_boxes') ) {
								echo '<div class="row">';
								while ( have_rows('image_content_boxes') ) {
									the_row();
									?>
									<div class="col-lg-<?php echo $column_number; ?> col-md-4 col-6">
										<div class="image_iconbox__item">
											<img src="<?php the_sub_field('image'); ?>" alt="<?php the_sub_field('text_content'); ?>">
											<p><?php the_sub_field('text_content'); ?></p>
										</div>
									</div>
									<?php
								}
								echo '</div>';
							} ?>
						</div>
					</div>
					<?php
				}

				if( get_row_layout() == 'left_icon_section' ) {
					$bg_color = get_sub_field('bg_color') ? get_sub_field('bg_color') : 'transparent';
					$text_color = get_sub_field('text_color') ? get_sub_field('text_color') : 'text_dark';
					$column_number = get_sub_field('column_number');
					?>
					<div class="left_iconbox <?php echo $text_color; ?>" style="background-color: <?php echo $bg_color; ?>;">
						<div class="container">
							<?php
							if ( have_rows('image_content_boxes') ) {
								echo '<div class="row">';
								while ( have_rows('image_content_boxes') ) {
									the_row();
									?>
									<div class="col-lg-<?php echo $column_number; ?> col-sm-6 col-12 comm_text">
										<div class="left_iconbox__item">
											<img src="<?php the_sub_field('image'); ?>" alt="Icon">
											<p><?php the_sub_field('text_content'); ?></p>
										</div>
									</div>
									<?php
								}
								echo '</div>';
							} ?>
						</div>
					</div>
					<?php
				}

				if( get_row_layout() == 'info_box_sec' ) {
					$bg_color = get_sub_field('bg_color') ? get_sub_field('bg_color') : 'transparent';
					$text_color = get_sub_field('text_color') ? get_sub_field('text_color') : 'text_dark';
					$column_number = get_sub_field('column_number');
					?>
					<div class="info_boxes comm_text <?php echo $text_color; ?>" style="background-color: <?php echo $bg_color; ?>;">
						<div class="container">
							<?php
							if ( have_rows('info_boxes') ) {
								echo '<div class="row">';
								while ( have_rows('info_boxes') ) {
									the_row();
									?>
									<div class="col-lg-<?php echo $column_number; ?> col-12">
										<div class="info_boxes__item">
											<?php the_sub_field('contents'); ?>
										</div>
									</div>
									<?php
								}
								echo '</div>';
							} ?>
						</div>
					</div>
					<?php
				}

				if( get_row_layout() == 'accordion_sec' ) {
					$bg_color = get_sub_field('bg_color') ? get_sub_field('bg_color') : 'transparent';
					$text_color = get_sub_field('text_color') ? get_sub_field('text_color') : 'text_dark';
					?>
					<div class="sm_padd <?php echo $text_color; ?>" style="background-color: <?php echo $bg_color; ?>;">
						<div class="container">
							<?php
							if ( have_rows('accordion_data') ) {
								echo '<div class="row"><div class="col-12"><div class="accord_box comm_text">';
								while ( have_rows('accordion_data') ) {
									the_row();
									?>
									<div class="accord_box__item">
										<div class="accord_toggle"><?php the_sub_field('title'); ?></div>
										<div class="accord_inn">
											<?php the_sub_field('contents'); ?>
										</div>
									</div>
									<?php
								}
								echo '</div></div></div>';
							} ?>
						</div>
					</div>
					<?php
				}

				if( get_row_layout() == 'content_with_sidebar' ) {
					$bg_color = get_sub_field('bg_color') ? get_sub_field('bg_color') : 'transparent';
					$text_color = get_sub_field('text_color') ? get_sub_field('text_color') : 'text_dark';
					?>
					<div class="sm_padd sidebar_box <?php echo $text_color; ?>" style="background-color: <?php echo $bg_color; ?>;">
						<div class="container">
							<div class="row">
								<div class="col-md-4 col-lg-3 col-12 sidebar_box__sec">
									<?php the_sub_field('sidebar_contents'); ?>
								</div>
								<div class="col-md-8 col-lg-9 col-12 comm_text">
									<?php the_sub_field('main_contents'); ?>
								</div>
							</div>
						</div>
					</div>
					<?php
				}

				if( get_row_layout() == 'posts_slide_box' ) {
					$cat = get_sub_field('select_category');
					?>
					<div class="sm_padd">
						<div class="container">
							<div class="row">
								<div class="col-12">
									<?php
									wp_reset_query();
									$args = array('post_type' => 'post', 'posts_per_page' => 10, 'cat' => $cat);
									query_posts($args);
									if (have_posts()) {
										echo '<div class="press_slider">';
										while (have_posts()) {
											the_post();
											?>
											<div class="press_slider__item">
												<a href="<?php the_permalink(); ?>"></a>
												<h5><?php echo get_cat_name($cat); ?></h5>
												<h3><?php the_title(); ?></h3>
												<p><?php the_time('F jS, Y') ?></p>
											</div>
											<?php
										}
										echo '</div>';
										?>
										<div class="text-center">
											<a href="<?php echo get_term_link( $cat ); ?>" class="btn btn-primary">View All <?php echo get_cat_name($cat); ?></a>
										</div>
										<?php
									} wp_reset_query(); ?>
								</div>
							</div>
						</div>
					</div>
					<?php
				}

				if( get_row_layout() == 'two_col_image_cont' ) {
					$extra_btm = get_sub_field('extra_btm') ? 'extra_btm' : '';
					$bg_color = get_sub_field('bg_color') ? get_sub_field('bg_color') : 'transparent';
					$bg_img = get_sub_field('bg_image');
					$text_color = get_sub_field('text_color') ? get_sub_field('text_color') : 'text_dark';
					?>
					<div class="comm_padd <?php echo $extra_btm; ?> <?php echo $text_color; ?>" style="background-color: <?php echo $bg_color; ?>; background-image: url('<?php echo $bg_img; ?>');">
						<div class="container">
							<div class="row align-items-center">
								<div class="col-lg-6 col-12 order-lg-<?php if(get_sub_field('content_position') == 'left') echo '2'; else echo '1'; ?>">
									<img src="<?php the_sub_field('image'); ?>" alt="Image">
								</div>
								<div class="col-lg-6 col-12 order-lg-<?php if(get_sub_field('content_position') == 'left') echo '1'; else echo '2'; ?>">
									<div class="comm_text">
										<?php
										the_sub_field('contents');
										if ( have_rows('call_actions') ) {
											echo '<ul class="list-inline">';
											while ( have_rows('call_actions') ) {
												the_row();
												?>
												<li class="list-inline-item"><a href="<?php the_sub_field('link'); ?>" class="btn btn-primary"><?php the_sub_field('title'); ?></a></li>
												<?php
											}
											echo '</ul>';
										} ?>
									</div>
								</div>
							</div>
						</div>
					</div>
					<?php
				}

				if( get_row_layout() == 'intro_texts' ) {
					$extra_top = get_sub_field('extra_top') ? 'marg_top' : '';
					$bg_color = get_sub_field('bg_color') ? get_sub_field('bg_color') : 'transparent';
					$bg_img = get_sub_field('bg_image');
					$column_number = get_sub_field('column_number');
					$text_color = get_sub_field('text_color') ? get_sub_field('text_color') : 'text_dark';
					?>
					<div class="sm_padd intro_items <?php echo ''.$extra_top.' '; echo $text_color; ?>" style="background-color: <?php echo $bg_color; ?>; background-image: url('<?php echo $bg_img; ?>');">
						<div class="container">
							<?php
							if ( have_rows('intro_boxes') ) {
								echo '<div class="row">';
								while ( have_rows('intro_boxes') ) {
									the_row();
									$box_color = get_sub_field('box_color') ? get_sub_field('box_color') : '#fff';
									?>
									<div class="col-md-<?php echo $column_number; ?> col-12">
										<div class="intro_item" style="background-color: <?php echo $box_color ?>;">
											<p>
												<strong><?php the_sub_field('title'); ?></strong>
												<?php the_sub_field('contents'); ?>
											</p>
										</div>
									</div>
									<?php
								}
								echo '</div>';
							} ?>
						</div>
					</div>
					<?php
				}

				if( get_row_layout() == 'faq_section' ) {
					$bg_color = get_sub_field('bg_color') ? get_sub_field('bg_color') : 'transparent';
					$text_color = get_sub_field('text_color') ? get_sub_field('text_color') : 'text_dark';
					?>
					<div class="comm_padd faq_box <?php echo $text_color; ?>" style="background-color: <?php echo $bg_color; ?>;">
						<div class="container">
							<div class="row">
								<div class="col-12">
									<h2><?php the_sub_field('main_title'); ?></h2>
									<?php
									$custom_terms = get_terms('faq-cat');
									if($custom_terms) {
										echo '<ul class="faq_tabslist"><li><a class="spec" href="#all">All</a></li>';
										foreach($custom_terms as $custom_term) {
											echo '<li><a href="#faq_'.$custom_term->term_id.'">'.$custom_term->name.'</a></li>';
										}
										echo '</ul>';
									} ?>
								</div>
								<div class="col-12">
									<?php
									$custom_terms = get_terms('faq-cat');
									foreach($custom_terms as $custom_term) {
										wp_reset_query();
										$args = array(
											'post_type' => 'faq',
											'tax_query' => array(
												array(
													'taxonomy' => 'faq-cat',
													'field' => 'term_id',
													'terms' => $custom_term->term_id
												),
											),
										);
										query_posts($args);
										if(have_posts()) {
											echo '<div class="faq_out" id="faq_'.$custom_term->term_id.'"><h3>'.$custom_term->name.'</h3><div class="faq_out__box">';
											while (have_posts()) {
												the_post();
												?>
												<div class="faq_inn">
													<h4><?php the_title(); ?></h4>
													<div class="faq_inn__cont">
														<?php the_content(); ?>
													</div>
												</div>
												<?php
											}
											echo '</div></div>';
										}
									} wp_reset_query(); ?>
								</div>
							</div>
						</div>
					</div>
					<?php
				}

				if( get_row_layout() == 'doctors_list' ) {
					$category = get_sub_field('category') ? get_sub_field('category') : '';
					$extra_top = get_sub_field('extra_top') ? 'marg_top' : '';
					$bg_color = get_sub_field('bg_color') ? get_sub_field('bg_color') : 'transparent';
					$bg_img = get_sub_field('bg_image');
					$text_color = get_sub_field('text_color') ? get_sub_field('text_color') : 'text_dark';
					?>
					<div class="sm_padd doctors_list <?php echo ''.$extra_top.' '; echo $text_color; ?>" style="background-color: <?php echo $bg_color; ?>; background-image: url('<?php echo $bg_img; ?>');">
						<div class="container <?php if(get_sub_field('display_as_grid')) echo 'doctors_list__grid' ?>">
							<div class="row">
								<?php
								if($category) {
									$args = array(
										'post_type' => 'teams',
										'posts_per_page' => -1,
										'tax_query' => array(
											array(
												'taxonomy' => 'teams-cat',
												'field' => 'id',
												'terms' => $category
											)
										));
								} else {
									$args = array('post_type' => 'teams', 'posts_per_page' => -1);
								}
								query_posts($args);
								while (have_posts()) {
									the_post();
									$subtitle_content = get_field('position_name') ? get_field('position_name') : "";
									$qualification_string = get_field('intro_qualification') ? ",<em>" . get_field('intro_qualification') . "</em>" : "";
									$team_thumb++;
									?>
									<div class="col-lg-3 col-6">
										<div class="doctors_list__item">
											<a href="#team_cat__<?php echo $team_thumb; ?>">
												<?php
												$img_url = get_the_post_thumbnail_url( $post->ID, 'full');
												$image_call = aq_resize( $img_url, 262, 262, true, true, true );
												?>
												<img src="<?php echo $image_call; ?>" alt="<?php the_title(); ?>">
												<span class="doctors_list__grid">
													<strong><?php the_title(); ?></strong>
													<em><?php echo get_field('intro_qualification'); ?></em><br/>
													<em><?php echo $subtitle_content; ?></em><br/>
													<em style="font-weight: 300;"><?php echo jh_get_department($post->ID); ?></em>
												</span>
											</a>
										</div>
									</div>
									<?php
								} wp_reset_query(); ?>
							</div>
						</div>
					</div>
					<?php
				}

				if( get_row_layout() == 'team_catwise_list' ) {
					$category = get_sub_field('select_team_cat');
					$args = array(
						'post_type' => 'teams',
						'posts_per_page' => -1,
						'tax_query' => array(
							array(
								'taxonomy' => 'teams-cat',
								'field' => 'id',
								'terms' => $category
							)
						));
					query_posts($args);
					while (have_posts()) {
						the_post();
						$team_cats++;
						echo '<div id="team_cat__'.$team_cats.'">';
						get_template_part( 'template-parts/content', 'teams' );
						echo '</div>';
					} wp_reset_query();
				}

				if( get_row_layout() == 'team_side_category_wise' ) {
					$category = get_sub_field('select_team_cat');
					$bg_color = get_sub_field('bg_color') ? get_sub_field('bg_color') : 'transparent';
					$text_color = get_sub_field('text_color') ? get_sub_field('text_color') : 'text_dark';
					$args = array(
						'post_type' => 'teams',
						'posts_per_page' => -1,
						'tax_query' => array(
							array(
								'taxonomy' => 'teams-cat',
								'field' => 'id',
								'terms' => $category
							)
						));
					query_posts($args);
					if(have_posts()) {
						$c=0;
						echo '<div class="comm_teamside '.$text_color.'" style="background-color: '.$bg_color.';"><div class="container">';
						while (have_posts()) {
							the_post();
							$c++;
							$team_cats++;
							echo '<div class="comm_teamside__in">';
							$img_url = get_the_post_thumbnail_url( $post->ID, 'full');
							$image_call = aq_resize( $img_url, 340, 340, true, true, true );
							?>
							<div class="row align-items-center">
								<div class="col-md-6 col-12 <?php if($c==1) { ?>order-md-1<?php } else { echo 'order-md-2'; } ?>">
									<img src="<?php echo $image_call; ?>" alt="<?php the_title(); ?>">
								</div>
								<div class="col-md-6 col-12 <?php if($c==2) { ?>order-md-1 text-right<?php $c=0; } else { echo 'order-md-2'; } ?> cust_left">
									<div class="comm_teamside__cont">
										<h3><?php the_title(); ?></h3>
										<?php
										if(get_field('position_name')) {
											echo '<p>'.get_field('position_name').'</p>';
										} ?>
										<?php
										if ( have_rows('board_certifications') ) {
											echo '<h4>Board Certification</h4><ul class="border_list">';
											while ( have_rows('board_certifications') ) {
												the_row();
												?>
												<li><?php the_sub_field('name'); ?></li>
												<?php
											}
											echo '</ul>';
										} ?>
										<a href="<?php the_permalink(); ?>" class="btn btn-primary">READ MORE</a>
									</div>
								</div>
							</div>
							<?php
							echo '</div>';
						}
						echo '</div></div>';
					} wp_reset_query();
				}

				if( get_row_layout() == 'team_profile' ) {
					$post_objects = get_sub_field('select_team_member');
					if( $post_objects ) {
						foreach( $post_objects as $post) {
							setup_postdata($post);
							get_template_part( 'template-parts/content', 'teams' );
						}
						wp_reset_postdata();
					}
				}

				if( get_row_layout() == 'locations_section' ) {
					$post_objects = get_sub_field('select_location');
					if( $post_objects ) {
						foreach( $post_objects as $post) {
							setup_postdata($post);
							get_template_part( 'template-parts/content', 'locations' );
						}
						wp_reset_postdata();
					}
				}

				if( get_row_layout() == 'appointment_box' ) {
					echo do_shortcode( '[appointment]' );
				}

				if( get_row_layout() == 'gallery_grid' ) {
					$images = get_sub_field('gallery');
					$column_number = get_sub_field('column_number');
					if( $images ) {
						?>
						<div class="comm_padd doctors_list">
							<div class="container<?php if(get_sub_field('full_width')) { echo '-fluid doctors_list__grid__none'; } ?> doctors_list__grid">
								<div class="row">
									<?php foreach( $images as $image ) {
										$img_url = $image['url'];
										$image_call = aq_resize( $img_url, 350, 310, true, true, true );
										$image_big = aq_resize( $img_url, 750, 500, true, true, true );
										?>
										<div class="col-sm-<?php echo $column_number; ?> col-6">
											<div class="gallery_sec__img" data-target="#gal_Modal" data-toggle="modal" data-bigimage="<?php echo $image_big; ?>">
												<i class="fas fa-search"></i>
												<img src="<?php echo $image_call; ?>" alt="<?php echo $image['alt']; ?>" />
											</div>
										</div>
									<?php } ?>
								</div>
							</div>
						</div>
					<?php }
				}

				if( get_row_layout() == 'gallery' ) {
					$images = get_sub_field('gallery');
					$column_number = get_sub_field('column_number');
					if( $images ) {
						?>
						<div class="container gallery_sec">
							<div class="row">
								<?php foreach( $images as $image ) {
									$img_url = $image['url'];
									$image_call = aq_resize( $img_url, 350, 232, true, true, true );
									$image_big = aq_resize( $img_url, 750, 500, true, true, true );
									?>
									<div class="col-sm-<?php echo $column_number; ?> col-6">
										<div class="gallery_sec__img" data-target="#gal_Modal" data-toggle="modal" data-bigimage="<?php echo $image_big; ?>">
											<i class="fas fa-search"></i>
											<img src="<?php echo $image_call; ?>" alt="<?php echo $image['alt']; ?>" />
										</div>
									</div>
								<?php } ?>
							</div>
						</div>
					<?php }
				}

				if( get_row_layout() == 'highlight_boxes' ) {
					$column_number = get_sub_field('column_number');
					$bg_color = get_sub_field('bg_color') ? get_sub_field('bg_color') : 'transparent';
					?>
					<div class="box_cont sm_padd <?php echo $text_color; ?>" style="background-color: <?php echo $bg_color; ?>;">
						<div class="container">
							<?php
							if ( have_rows('highlight_box') ) {
								echo '<div class="row text-center">';
								while ( have_rows('highlight_box') ) {
									the_row();
									$bg_color = get_sub_field('bg_color') ? get_sub_field('bg_color') : 'transparent';
									$text_color = get_sub_field('text_color') ? get_sub_field('text_color') : 'text_dark';
									?>
									<div class="highlight_box__item col-lg-<?php echo $column_number; ?> col-sm-6 col-12">
										<div class="highlight_box <?php echo $text_color; ?>" style="background-color: <?php echo $bg_color; ?>">
											<?php
											if(get_sub_field('icon')) echo '<img src="'.get_sub_field('icon').'" alt="image">';
											the_sub_field('contents');
											if ( have_rows('call_actions') ) {
												echo '<ul class="list-inline">';
												while ( have_rows('call_actions') ) {
													the_row();
													?>
													<li class="list-inline-item">
														<a href="<?php the_sub_field('link') ?>" class="btn btn-primary"><?php the_sub_field('text'); ?></a>
													</li>
													<?php
												}
												echo '</ul>';
											} ?>
										</div>
									</div>
									<?php
								}
								echo '</div>';
							} ?>
						</div>
					</div>
					<?php
				}

			}
		} else {
			if(is_singular( 'teams' )) {
				get_template_part( 'template-parts/content', 'teams' );
			} else if(is_singular( 'locations' )) {
				get_template_part( 'template-parts/content', 'locations' );
			} else if(is_singular( 'post' )) {
				get_template_part( 'template-parts/content', 'post' );
			} else {
				get_template_part( 'template-parts/content', 'page' );
			}
		}
	}
}

get_footer();
