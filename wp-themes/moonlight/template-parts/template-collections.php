<?php
/**
 * Template Name: Collections
 *
 * @link https://codex.wordpress.org/Template_Hierarchy
 *
 * @package moonlight
 */

get_header(); ?>
    
    <div class="collections_banner hide-on-small-only">
        <div class="slide_images">
            <?php
            $get_featured_cats = array(
                'taxonomy'     => 'product_cat',
                'orderby'      => 'name'
            );
            $j = 0;
            $i = 0;
            $all_categories = get_categories( $get_featured_cats );
            foreach ($all_categories as $cat) $j++;
            $all_categories = get_categories( $get_featured_cats );
            foreach ($all_categories as $cat) {
                $i++;
                $thumbnail_id = get_woocommerce_term_meta( $cat->term_id, 'thumbnail_id', true );
                $image = wp_get_attachment_image_src( $thumbnail_id, 'full' );
                ?>
                <div class="slide_item <?php if($i == 1) echo 'is_active'; if($i == 2) echo 'is_next';  if($j == 1) echo 'is_prev'; ?>">
                    <a href="/shop/?brand=-1&prod_cat=<?php echo $cat->term_id ?>">
                        <div class="parallax-container">
                            <div class="parallax hide-on-small-only show-on-medium-and-up"><img src="<?php echo $image[0]; ?>" alt="<?php echo $cat->name; ?>"></div>
                        </div>
                    </a>
                </div>
                <?php
                $j--;
            }
            wp_reset_query(); ?>
        </div>
        <div class="slide_content">
            <div class="slide_control">
                <a href="#" class="next">→</a>
                <a href="#" class="prev">←</a>
            </div>
            <div class="slide_cont_item static">
                <a href="#">
                    <h2>
                        Spring <br>
                        <strong>Summer</strong>
                        <sup>2018</sup>
                    </h2>
                    <p>The SS18' celebrates a return to ladylike dressing with its feminine silhouettes, delicate details and elegant layering.</p>
                    <span class="comm_more">View Collection</span>
                </a>
            </div>
            <div class="slide_content__inn">
                <?php
                $get_featured_cats = array(
                    'taxonomy'     => 'product_cat',
                    'orderby'      => 'name'
                );
                $j = 0;
                $i = 0;
                $all_categories = get_categories( $get_featured_cats );
                foreach ($all_categories as $cat) $j++;
                $all_categories = get_categories( $get_featured_cats );
                foreach ($all_categories as $cat) {
                    $i++; ?>
                    <div class="slide_cont_item <?php if($j == 1) echo 'is_active'; if($j == 2) echo 'is_next';  if($i == 1) echo 'is_prev'; ?>">
                        <a href="/shop/?brand=-1&prod_cat=<?php echo $cat->term_id ?>">
                            <h2><?php echo $cat->name; ?></h2>
                            <p><?php echo $cat->description; ?></p>
                            <span class="comm_more">View Collection</span>
                        </a>
                    </div>
                    <?php
                    $j--;
                }
                wp_reset_query(); ?>
            </div>
        </div>
    </div>
    <div class="comm_slider collections_slider show-on-small hide-on-med-and-up">
        <?php
        $get_featured_cats = array(
            'taxonomy'     => 'product_cat',
            'orderby'      => 'name'
        );
        $all_categories = get_categories( $get_featured_cats );
        foreach ($all_categories as $cat) {
            $thumbnail_id = get_woocommerce_term_meta( $cat->term_id, 'thumbnail_id', true );
            $image = wp_get_attachment_image_src( $thumbnail_id, 'full' );
            ?>
            <div class="comm_slider_item" style="background-image: url('<?php echo $image[0]; ?>');">
                <div class="slide_cont_item">
                    <h2><?php echo $cat->name; ?></h2>
                    <p><?php echo $cat->description; ?></p>
                    <a href="/shop/?brand=-1&prod_cat=<?php echo $cat->term_id ?>" class="comm_more">View Collection</a>
                </div>
            </div>
            <?php
        }
        wp_reset_query(); ?>
    </div>

<?php
get_footer();
