<?php
/**
 * Template Name: Contact
 *
 * @link https://codex.wordpress.org/Template_Hierarchy
 *
 * @package moonlight
 */

get_header(); ?>

    <div class="home_news journal contact_top">
        <div class="journal_top_img">
            <img src="<?php echo get_template_directory_uri(); ?>/images/contact.jpg" alt="contact">
        </div>
        <div class="valign-wrapper">
            <div class="news_cont" data-aos="fade-up">
                <div class="news_cont__inn">
                    <h5>CONTACT US</h5>
                    <h2>MOONLIGHT BOUTIQUE</h2>
                    <p>
                        Clover Bay Tower - Office 1804 <br>
                        Business Bay - Burj Khalifa <br>
                        P.O. Box 74065, Dubai, UAE
                    </p>
                    <hr>
                    <p>
                        <a>TEL: +971 4 369 9919</a> <br>
                        <a>FAX: +971 4 362 3220</a>
                    </p>
                    <p>
                        <a href="mailto:CONTACT@BOUGUESSA.COM">CONTACT@BOUGUESSA.COM</a>
                    </p>
                </div>
            </div>
            <div class="news_image" data-aos="fade-up">
                <div class="parallax-container">
                    <div class="parallax">
                        <img src="<?php echo get_template_directory_uri(); ?>/images/contact.jpg" alt="contact">
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="news_repeat contact_repeat">
        <div class="container">
            <div class="col s12 news_item">
                <a class="video_text">
                    <span data-aos="fade-up" class="newsimg_repeat" style="background-image: url('<?php echo get_template_directory_uri(); ?>/images/3.jpg');"></span>
                    <div data-aos="fade-up">
                        <h5>MORE INFOS</h5>
                        <h2>FOR ADVERTISING & MARKETING</h2>
                        <hr>
                        <p>
                            <span>TEL: +974 44472010</span><br>
                            <span>info@themoonlightstore.com</span>
                        </p>
                    </div>
                </a>
            </div>
            <div class="col s12 news_item news_item_right">
                <a class="video_text">
                    <span data-aos="fade-up" class="newsimg_repeat" style="background-image: url('<?php echo get_template_directory_uri(); ?>/images/4.jpg');"></span>
                    <div data-aos="fade-up">
                        <h5>MORE INFOS</h5>
                        <h2>FOR INTERNATIONAL ORDER</h2>
                        <hr>
                        <p>
                            <span>TEL: +974 44472010</span><br>
                            <span>customercare@themoonlightstore.com</span>
                        </p>
                    </div>
                </a>
            </div>
        </div>
    </div>

<?php
get_footer();
