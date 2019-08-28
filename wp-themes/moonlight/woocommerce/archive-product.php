<?php
/**
 * The Template for displaying product archives, including the main shop page which is a post type archive
 *
 * This template can be overridden by copying it to yourtheme/woocommerce/archive-product.php.
 *
 * HOWEVER, on occasion WooCommerce will need to update template files and you
 * (the theme developer) will need to copy the new files to your theme to
 * maintain compatibility. We try to do this as little as possible, but it does
 * happen. When this occurs the version of the template file will be bumped and
 * the readme will list any important changes.
 *
 * @see https://docs.woocommerce.com/document/template-structure/
 * @package WooCommerce/Templates
 * @version 3.4.0
 */

defined( 'ABSPATH' ) || exit;

get_header( 'shop' );

/**
 * Hook: woocommerce_before_main_content.
 *
 * @hooked woocommerce_output_content_wrapper - 10 (outputs opening divs for the content)
 * @hooked woocommerce_breadcrumb - 20
 * @hooked WC_Structured_Data::generate_website_data() - 30
 */
//do_action( 'woocommerce_before_main_content' );

$brand = $_GET['brand'];
if($brand && $brand != -1) $rec_brand = get_term_by('id', $brand, 'products-brands');
$prodcat = $_GET['prod_cat'];
if($prodcat && $prodcat != -1) $rec_cat = get_term_by('id', $prodcat, 'product_cat');
?>
<div class="shop_banner">
	<div class="container">
		<div class="row">
			<div class="col s12 center-align" data-aos="fade-up">
				<h2>
					You’re looking for 
					<select id="brand_cat">
						<option value="-1">Everything</option>
						<?php 
						if($brand && $brand != -1) {
							echo '<option selected value="'.$brand.'">'.$rec_brand->name.'</option>';
						} ?>
						<?php
						if($brand && $brand != -1) {
							$brands = get_terms( 'products-brands', array(
								'exclude' => array( $brand ),
							));
						} else {
							$brands = get_terms( 'products-brands' );
						}
						if ( ! empty( $brands ) && ! is_wp_error( $brands ) ){
							foreach ( $brands as $brandis ) {
								echo '<option value="' . $brandis->term_id . '">' . $brandis->name . '</option>';
							}
						} ?>
					</select><br>
					in 
					<div class="sec">
						<select id="shop_cat">
							<option value="-1">all collections</option>
							<?php
							if($prodcat && $prodcat != -1) {
								echo '<option selected value="'.$prodcat.'">'.$rec_cat->name.'</option>';
							} ?>
							<?php
							if($prodcat && $prodcat != -1) {
								$prodcats = get_terms( 'product_cat', array(
									'exclude' => array( $prodcat ),
								));
							} else {
								$prodcats = get_terms( 'product_cat' );
							}
							if ( ! empty( $prodcats ) && ! is_wp_error( $prodcats ) ){
								foreach ( $prodcats as $prodcatis ) {
									echo '<option value="' . $prodcatis->term_id . '">' . $prodcatis->name . '</option>';
								}
							} ?>
						</select>
					</div>
				</h2>
			</div>
		</div>
	</div>
</div>
<?php
//if ( woocommerce_product_loop() ) {

	/**
	 * Hook: woocommerce_before_shop_loop.
	 *
	 * @hooked wc_print_notices - 10
	 * @hooked woocommerce_result_count - 20
	 * @hooked woocommerce_catalog_ordering - 30
	 */
	//do_action( 'woocommerce_before_shop_loop' );

	//woocommerce_product_loop_start();

	//if ( wc_get_loop_prop( 'total' ) ) {
		?>
		<div class="shop_grids">
			<div class="container">
				<div class="row">
					<div class="col s12">
						<div class="row">
							<?php
							wp_reset_query();
							if($brand && $brand != -1 && $prodcat &&  $prodcat != -1) {
								$args = array(
									'post_type' => 'product',
									'tax_query' => array(
										'relation' => 'AND',
										array(
											'taxonomy' => 'products-brands',
											'field'    => 'term_id',
											'terms'    => array( $brand )
										),
										array(
											'taxonomy' => 'product_cat',
											'field'    => 'term_id',
											'terms'    => array( $prodcat )
										)
									)
								);
							} elseif($brand && $brand != -1) {
								$args = array(
									'post_type' => 'product',
									'tax_query' => array(
										array(
											'taxonomy' => 'products-brands',
											'field'    => 'term_id',
											'terms'    => array( $brand )
										)
									),
								);
							} elseif($prodcat && $prodcat != -1) {
								$args = array(
									'post_type' => 'product',
									'tax_query' => array(
										array(
											'taxonomy' => 'product_cat',
											'field'    => 'term_id',
											'terms'    => array( $prodcat )
										)
									),
								);
							} else {
								$args = array('post_type' => 'product', 'posts_per_page' => -1, );
							}
							query_posts($args);
							if(have_posts()) {
								while (have_posts()) {
									the_post();
									?>
									<div class="col l3 m4 s6" data-aos="fade-up">
										<a href="<?php the_permalink(); ?>" class="shop_item">
											<span class="shop_item__img">
												<span class="shop_item__bg"></span>
												<?php 
												$img_url = get_the_post_thumbnail_url( get_the_ID(), 'full' );
												$img_call = aq_resize( $img_url, 475, 675, true, true, true );
												?>
												<img src="<?php echo $img_call; ?>" alt="<?php the_title(); ?>">
											</span>
											<span class="prod_cont_inn">
												<strong><?php the_title(); ?></strong>
												<span class="shop_item__type">
													<?php 
													$terms = get_the_terms( $post->ID , 'products-brands' );
													echo $terms[0]->name;
													?>
												</span>
											</span>
										</a>
									</div>
									<?php
								} ?>
							</div>
							<!-- <div class="col s12 center-align">
								<a href="#" class="load_more">Load more</a>
							</div> -->
							<?php
						} else {
							?>
							<div class="col s12" data-aos="fade-up">
								<div class="video_text shop_nofound">
									<h2>No Products were found!</h2>
									<p>Please search with any other categories</p>
								</div>
							</div>
							<?php
						} wp_reset_query(); ?>
					</div>
				</div>
			</div>
		</div>	
		<?php
	//}

	//woocommerce_product_loop_end();

	/**
	 * Hook: woocommerce_after_shop_loop.
	 *
	 * @hooked woocommerce_pagination - 10
	 */
	//do_action( 'woocommerce_after_shop_loop' );
 //}else {
	/**
	 * Hook: woocommerce_no_products_found.
	 *
	 * @hooked wc_no_products_found - 10
	 */
	//do_action( 'woocommerce_no_products_found' );
//}

/**
 * Hook: woocommerce_after_main_content.
 *
 * @hooked woocommerce_output_content_wrapper_end - 10 (outputs closing divs for the content)
 */
//do_action( 'woocommerce_after_main_content' );

/**
 * Hook: woocommerce_sidebar.
 *
 * @hooked woocommerce_get_sidebar - 10
 */
//do_action( 'woocommerce_sidebar' );

get_footer( 'shop' );
