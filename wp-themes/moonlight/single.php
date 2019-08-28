<?php
/**
 * The template for displaying all single posts
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/#single-post
 *
 * @package moonlight
 */

get_header();
$img_url = get_the_post_thumbnail_url( get_the_ID(), 'full' );
?>

    <div class="post_top_img">
        <div class="parallax-container">
            <div class="parallax">
                <?php the_post_thumbnail( 'full' ); ?>
            </div>
        </div>
    </div>
    <div class="post_top_cont">
        <div class="video_text" data-aos="fade-up">
            <?php
            if (have_posts()) {
                while (have_posts()) {
                    the_post();
                    ?>
                    <h2><?php the_title(); ?></h2>
                    <h5><?php the_time( 'F Y' ); ?></h5>
                    <p><?php echo wp_trim_words( get_the_content(), 30, '' ); ?></p>
                    <?php
                }
            } ?>
        </div>
    </div>
    <div class="post_slider">
        <div class="post_slideitem">
            <img src="<?php echo get_template_directory_uri(); ?>/images/1.png" alt="image">
        </div>
        <div class="post_slideitem">
            <img src="<?php echo get_template_directory_uri(); ?>/images/1.png" alt="image">
        </div>
    </div>
    <div class="post_main">
        <div class="container video_text">
            <div class="row">
                <div class="col l10 s12 push-l1" data-aos="fade-up">
                    <?php
                    if (have_posts()) {
                        while (have_posts()) {
                            the_post();
                            the_content();
                        }
                    } ?>
                </div>
            </div>
        </div>
    </div>
    <div class="post_top_img post_btm">
        <div class="parallax-container">
            <div class="parallax">
                <?php the_post_thumbnail( 'full' ); ?>
            </div>
        </div>
    </div>
    <div class="post_top_cont post_btm_cont">
        <div class="video_text" data-aos="fade-up">
            <?php
            if (have_posts()) {
                while (have_posts()) {
                    the_post();
                    ?>
                    <h5>NEXT ARTICLE</h5>
                    <h2><?php the_title(); ?></h2>
                    <a href="<?php the_permalink(); ?>" class="comm_more">READ NEXT</a>
                    <?php
                }
            } ?>
        </div>
    </div>

<?php
get_footer();
