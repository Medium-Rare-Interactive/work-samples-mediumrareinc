<?php
/**
 * Template Name: Journal
 *
 * @link https://codex.wordpress.org/Template_Hierarchy
 *
 * @package moonlight
 */

get_header(); ?>
    
    <?php
    wp_reset_query();
    $args = array('post_type' => 'post', 'posts_per_page' => 1);
    query_posts($args);
    while (have_posts()) {
        the_post();
        ?>
        <a href="<?php the_permalink(); ?>">
            <div class="home_news journal">
                <div class="journal_top_img">
                    <?php 
                    $img_url = get_the_post_thumbnail_url( get_the_ID(), 'full' );
                    $img_call = aq_resize( $img_url, 1400, 800, true, true, true );
                    ?>
                    <img src="<?php echo $img_call; ?>" alt="<?php the_title(); ?>">
                </div>
                <div class="valign-wrapper">
                    <div class="news_cont">
                        <div class="news_cont__inn" data-aos="fade-up">
                            <h5><?php the_time( 'F Y' ); ?></h5>
                            <h2><?php the_title(); ?></h2>
                            <span class="comm_more">READ THE ARTICLE</span>
                        </div>
                    </div>
                    <div class="news_image">
                        <div class="parallax-container">
                            <div class="parallax">
                                <img src="<?php echo $img_call; ?>" alt="<?php the_title(); ?>">
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </a>
        <?php
    } wp_reset_query(); ?>
    <div class="news_repeat">
        <div class="container">
            <?php
            wp_reset_query();
            $args = array('post_type' => 'post', 'posts_per_page' => 1);
            query_posts($args);
            while (have_posts()) {
                the_post();
                $img_url = get_the_post_thumbnail_url( get_the_ID(), 'full' );
                ?>
                <div class="col s12 news_item">
                    <a href="#" class="video_text">
                        <span data-aos="fade-up" class="newsimg_repeat" style="background-image: url('<?php echo $img_url; ?>');"></span>
                        <div data-aos="fade-up">
                            <h5><?php the_time( 'F Y' ); ?></h5>
                            <h2><?php the_title(); ?></h2>
                            <p><?php echo wp_trim_words( get_the_content(), 30, '...' ); ?></p>
                        </div>
                    </a>
                </div>
                <div class="col s12 news_item">
                    <a href="#" class="video_text">
                        <span data-aos="fade-up" class="newsimg_repeat" style="background-image: url('<?php echo $img_url; ?>');"></span>
                        <div data-aos="fade-up">
                            <h5><?php the_time( 'F Y' ); ?></h5>
                            <h2><?php the_title(); ?></h2>
                            <p><?php echo wp_trim_words( get_the_content(), 30, '...' ); ?></p>
                        </div>
                    </a>
                </div>
                <div class="col s12 news_item">
                    <a href="#" class="video_text">
                        <span data-aos="fade-up" class="newsimg_repeat" style="background-image: url('<?php echo $img_url; ?>');"></span>
                        <div data-aos="fade-up">
                            <h5><?php the_time( 'F Y' ); ?></h5>
                            <h2><?php the_title(); ?></h2>
                            <p><?php echo wp_trim_words( get_the_content(), 30, '...' ); ?></p>
                        </div>
                    </a>
                </div>
                <?php
            } wp_reset_query(); ?>
            <div class="col s12 news_more center-align">
                <a href="#" class="load_more">Load more stories</a>
            </div>
        </div>
    </div>
    <div class="instgram_area">
        <div class="container">
            <div class="row">
                <div class="col s12 center-align">
                    <div class="comm_text" data-aos="fade-up">
                        <h2>We’re on Instagram</h2>
                        <a href="#" class="insta_link">#BOUGUESSA</a>
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
