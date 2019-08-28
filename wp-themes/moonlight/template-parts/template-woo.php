<?php
/**
 * Template Name: Woo Templates
 *
 * @link https://codex.wordpress.org/Template_Hierarchy
 *
 * @package moonlight
 */

get_header(); ?>
    
    <div class="shop_banner page_banner">
        <div class="container">
            <div class="row">
                <div class="col-12 center-align" data-aos="fade-up">
                    <h2><?php the_title(); ?></h2>
                </div>
            </div>
        </div>
    </div>
    <div class="page_area">
        <div class="container">
            <div class="row">
                <div class="col-12">
                    <div class="page_content woo" data-aos="fade-up">
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
    </div>

<?php
get_footer();
