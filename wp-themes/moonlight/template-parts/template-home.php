<?php
/**
 * Template Name: Home
 *
 * @link https://codex.wordpress.org/Template_Hierarchy
 *
 * @package moonlight
 */

get_header(); ?>
    
    <?php
    wp_reset_query();
    $args = array('post_type' => 'home-banner', 'posts_per_page' => 1);
    query_posts($args);
    while (have_posts()) {
        the_post();
        ?>
        <div class="parallax-container parallax_banner">
            <div class="parallax hide-on-small-only show-on-medium-and-up">
                <?php the_post_thumbnail( 'full' ); ?></div>
            <div class="banner_cont" data-aos="fade-up">
                <div class="home_banner show-on-small hide-on-med-and-up" style="background-image: url('<?php the_post_thumbnail_url( 'full' ); ?>');"></div>
                <div class="container">
                    <div class="row">
                        <div class="col l5 push-l7 m6 push-m6 s12">
                            <?php the_content(); ?>
                            <div class="clearfix hide-on-small-only show-on-medium-and-up"></div>
                            <?php if (get_field('read_more_link') && get_field('read_more_text')) {
                                ?>
                                <a href="<?php the_field('read_more_link'); ?>" class="sp_btn"><?php the_field('read_more_text'); ?></a>
                                <?php                            
                            } ?>                        
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <?php
    } wp_reset_query(); ?>
    <div class="hme_grids">
        <div class="right_grid" data-aos="fade-up">
            <img src="/wp-content/uploads/2018/09/3-1.jpg" alt="home">
        </div>
        <div class="left_grid" data-aos="fade-up">
            <img src="/wp-content/uploads/2018/09/2-2.jpg" alt="home">
        </div>
    </div>
    <div class="home_videosec">
        <div class="video_bg" style="background-image: url('<?php echo get_template_directory_uri(); ?>/images/poster.jpg');">
            <video class="hide-on-med-and-down show-on-large" src="https://bouguessa.com/files/templates/bouguessa/public/assets/images/homepage/loop-behind-the-brand.mp4" poster="<?php echo get_template_directory_uri(); ?>/images/poster.jpg" autoplay="" loop="" muted=""></video>
        </div>
        <div class="container">
            <div class="row">
                <div class="col push-l2 push-m1 l10 m11 s12">
                    <?php
                    if (have_posts()) {
                        while (have_posts()) {
                            the_post();
                            ?>
                            <div class="row">
                                <div class="col l5 m6 s12">
                                    <div class="video_text" data-aos="fade-up">
                                        <?php the_content(); ?>
                                        <a href="<?php echo get_permalink('2'); ?>" class="sp_btn">About</a>
                                    </div>
                                </div>
                                <div class="col l5 push-l2 m6 s12">
                                    <div class="video_img" data-aos="fade-up">
                                        <?php the_post_thumbnail( 'full' ); ?>
                                    </div>
                                </div>
                            </div>
                        <?php }
                    } ?>
                </div>
            </div>
        </div>
    </div>
    <div class="home_shop">
        <div class="container">
            <div class="row">
                <div class="col s12">
                    <div class="comm_title" data-aos="fade-up">
                        <h3>Online shop</h3>
                        <a href="<?php echo get_permalink( woocommerce_get_page_id( 'shop' ) ); ?>" class="comm_more">VISIT THE SHOP</a>
                    </div>
                </div>
                <div class="col s12">
                    <div class="row">
                        <?php
                        wp_reset_query();
                        $args = array('post_type' => 'product', 'posts_per_page' => 4);
                        query_posts($args);
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
                        } wp_reset_query(); ?>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="home_quote">
        <div class="container">
            <div class="row">
                <div class="col l8 m10 s12 push-l2 push-m1 center-align">
                    <div data-aos="fade-up">
                        <p>“Perfection is achieved, not when there is nothing more to add, but when there is nothing left to take away.” </p>
                        <h4>ANTOINE DE SAINT-EXUPERY</h4>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <?php
    wp_reset_query();
    $args = array('post_type' => 'post', 'posts_per_page' => 1);
    query_posts($args);
    while (have_posts()) {
        the_post();
        ?>
        <div class="home_news">
            <div class="valign-wrapper">
                <div class="news_image">
                    <div class="parallax-container">
                        <div class="parallax">
                            <?php 
                            $img_url = get_the_post_thumbnail_url( get_the_ID(), 'full' );
                            $img_call = aq_resize( $img_url, 1400, 800, true, true, true );
                            ?>
                            <img src="<?php echo $img_call; ?>" alt="<?php the_title(); ?>">
                        </div>
                    </div>
                </div>
                <div class="news_cont" data-aos="fade-up">
                    <div class="news_cont__inn">
                        <h5>THE JOURNAL</h5>
                        <h2><?php the_title(); ?></h2>
                        <a href="<?php the_permalink(); ?>" class="comm_more">READ THE ARTICLE</a>
                    </div>
                </div>
            </div>
        </div>
        <?php
    } wp_reset_query(); ?>
    <div class="instgram_area">
        <div class="container">
            <div class="row">
                <div class="col s12 center-align">
                    <div class="comm_text" data-aos="fade-up">
                        <h2>We’re on Instagram</h2>
                        <a target="_blank" href="https://www.instagram.com/themoonlightoffical/" class="insta_link">#MOONLIGHT</a>
                    </div>
                    <ul class="insta_images">
                        <li data-aos="fade-up"><a href="#"><img src="<?php echo get_template_directory_uri(); ?>/images/insta_1.jpg" alt="instagram"></a></li>
                        <li data-aos="fade-up"><a href="#"><img src="<?php echo get_template_directory_uri(); ?>/images/insta_2.jpg" alt="instagram"></a></li>
                        <li data-aos="fade-up"><a href="#"><img src="<?php echo get_template_directory_uri(); ?>/images/insta_3.jpg" alt="instagram"></a></li>
                        <li data-aos="fade-up"><a href="#"><img src="<?php echo get_template_directory_uri(); ?>/images/insta_1.jpg" alt="instagram"></a></li>
                    </ul>
                </div>
            </div>
        </div>
    </div>

<?php
get_footer();
