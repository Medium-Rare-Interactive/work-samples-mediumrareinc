<?php
/**
 * The template for displaying the footer
 *
 * Contains the closing of the #content div and all content after.
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package dream_md
 */

if(!get_field('landing_footer')) { 
    ?>
    <div class="sm_padd text_light sm_text" style="background-color: #138ab0;">
        <div class="container">
            <div class="row">
                <div class="col-md-3 col-12">
                    <?php dynamic_sidebar( 'btm_widget_1' ); ?>
                </div>
                <div class="col-md-3 col-12">
                    <?php dynamic_sidebar( 'btm_widget_2' ); ?>
                </div>
                <div class="col-md-3 col-12">
                    <?php dynamic_sidebar( 'btm_widget_3' ); ?>
                </div>
                <div class="col-md-3 col-12">
                    <?php dynamic_sidebar( 'btm_widget_4' ); ?>
                </div>
            </div>
        </div>
        <?php if( have_rows('social_media', 'options') ) {
            echo '<ul class="social_list list-inline list-unstyled">';
            while( have_rows('social_media', 'options') ) {
                the_row();
                ?>
                <li class="list-inline-item"><a target="_blank" href="<?php echo get_sub_field('link'); ?>" target="_blank"><?php echo get_sub_field('icon'); ?></a></li>
                <?php 
            }
            echo '</ul>';
        } ?>
    </div>
    <footer class="sm_padd">
        <div class="container">
            <div class="row">
                <div class="col-12 text-center">
                    <img class="foot_logo" src="<?php echo get_field('logo', 'options'); ?>" alt="logo">
                </div>
                <div class="col-md-7 col-12">
                    <div class="row">
                        <div class="col-md-4 col-12">
                            <?php dynamic_sidebar( 'footer_1' ); ?>
                        </div>
                        <div class="col-md-4 col-12">
                            <?php dynamic_sidebar( 'footer_2' ); ?>
                        </div>
                        <div class="col-md-4 col-12">
                            <?php dynamic_sidebar( 'footer_3' ); ?>
                        </div>
                    </div>
                </div>
                <div class="col-md-5 col-12">
                    <?php echo do_shortcode( '[contact-form-7 id="143" title="Contact Form"]' ); ?>
                </div>
            </div>
        </div>
    </footer>
<?php } else { ?>
    <div class="mini_footer">
        <div class="container">
            <div class="row">
                <div class="col-12 text-center">
                    <h2>VISIT ONE OF OUR CLINICS</h2>
                </div>
                <div class="col-md-4 col-12 mini_widgets order-md-1">
                    <?php dynamic_sidebar( 'mini_footer_1' ); ?>
                </div>
                <div class="col-md-4 col-12 mini_widgets order-md-3">
                    <?php dynamic_sidebar( 'mini_footer_3' ); ?>
                </div>
                <div class="col-md-4 col-12 mini_widgets order-md-2">
                    <?php
                    dynamic_sidebar( 'mini_footer_2' );
                    if( have_rows('social_media', 'options') ) {
                        echo '<ul class="list-inline list-unstyled">';
                        while( have_rows('social_media', 'options') ) {
                            the_row();
                            ?>
                            <li class="list-inline-item"><a target="_blank" href="<?php echo get_sub_field('link'); ?>" target="_blank"><?php echo get_sub_field('icon'); ?></a></li>
                            <?php 
                        }
                        echo '</ul>';
                    } ?>
                </div>
            </div>
        </div>
    </div>
<?php } ?>
    <div class="back_drop"></div>
    <div class="contact_pop">
        <div class="contact_pop__inn comm_text">
            <?php
            if( have_rows('sidebar_forms', 'options') ) {
                $count = 0;
                while( have_rows('sidebar_forms', 'options') ) {
                    $count++;
                    the_row();
                    echo '<div class="contact_inn" id="contact_pop'.$count.'">';
                    echo do_shortcode( get_sub_field('contact_form_shortcode') );
                    echo '</div>';
                }
            } else {
                echo '<div id="contact_pop">';
                echo do_shortcode( '[contact-form-7 id="156" title="Side Modal Form"]' );
                echo '</div>';
            } ?>
        </div>
    </div>
    <div class="modal gal_modal fade" id="gal_Modal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered modal-lg"" role="document">
            <div class="modal-content">
                <div class="modal-body">
                    <div class="gal_close" data-dismiss="modal"><i class="fas fa-times"></i></div>
                    <img src="https://via.placeholder.com/750x500/000000/000000" alt="Gallery" class="gal_lgabs">
                    <div class="anim_mod"></div>
                    <img src="" id="gal_lgimg" class="gal_lgimg">
                    <div class="gallery_meta">
                        <h4></h4>
                        <p></p>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
    <script src="<?php echo get_template_directory_uri(); ?>/js/slick.min.js"></script>
    <script type="text/javascript">
        $(document).ready(function() {
            $('.menu_toggle').on('click', function(e) {
                e.preventDefault();
                $(this).toggleClass('active');
                $('body').toggleClass('menu_active');
                $('.top_mob__area').toggleClass('active');
            });
            $('a[href*="#contact_pop"]').click(function(e){
                e.preventDefault();
                $('.contact_inn').removeClass('active');
                var anchor = $(this);
                $(anchor.attr('href')).addClass('active');
                $('body, .contact_pop, .back_drop').addClass('pop_acctive');
            });
            $('.back_drop').click(function(e){
                e.preventDefault();
                $('body, .contact_pop, .back_drop').removeClass('pop_acctive');
            });
            $('.search_toggle').on('click', function(e) {
                e.preventDefault();
                $('.search_toggle__form').toggleClass('active');
            });
            $('.search_toggle__form i.fa-times').on('click', function(e) {
                e.preventDefault();
                $('.search_toggle__form').toggleClass('active');
            });
            $('.lg_search_toggle').on('click', function(e) {
                e.preventDefault();
                $('.lg_search form').toggleClass('active');
            });
            $('.lg_search i.fa-times').on('click', function(e) {
                e.preventDefault();
                $('.lg_search form').toggleClass('active');
            });
            $('.top_mob__menu > li.menu-item-has-children').append('<span><i class="fa fa-chevron-right"></i></span>');
            $('.top_mob__menu > li.menu-item-has-children > a').on('click', function(e) {
                e.preventDefault();
                $(this).parent().toggleClass('active');
                $(this).parent().find('> ul').slideToggle(200);
            });
            $('.doctors_list__item a').click(function(e){
                e.preventDefault();
                var anchor = $(this);
                $('html, body').stop().animate({
                    scrollTop: $(anchor.attr('href')).offset().top-60
                }, 600);
            });
            $('.panels_heads a').click(function(e){
                e.preventDefault();
                $('.panels_heads li, .panel_inn').removeClass('active');
                $(this).parent().addClass('active');
                var anchor = $(this);
                $(anchor.attr('href')).addClass('active');
            });
            $('.faq_out h3').click(function(e){
                e.preventDefault();
                $(this).toggleClass('active');
                $(this).parent().find('.faq_out__box').slideToggle(200);
            });
            $('.faq_inn h4').click(function(e){
                e.preventDefault();
                $(this).toggleClass('active');
                $(this).parent().find('.faq_inn__cont').slideToggle(200);
            });
            $('.faq_tabslist li a').click(function(e){
                e.preventDefault();
                $('.faq_out').slideUp(200);
                var href_item = $(this).attr('href');
                $(href_item).slideDown(200);
                $(href_item).find('h3').addClass('active');
                $(href_item).find('.faq_out__box').slideDown(200);
            });
            $('.faq_tabslist li a.spec').click(function(e){
                e.preventDefault();
                $('.faq_out h3').addClass('active');
                $('.faq_out').slideDown(200);
            });
            $('.home_slider').slick({
                dots: true,
                infinite: true,
                speed: 700,
                slidesToShow: 1,
                autoplay : true,
                autoplaySpeed : 7500,
                pauseOnHover : false,
                slidesToScroll : 1,
            });
            $('.col_boxes .gallery, .comm_slider').slick({
                dots: false,
                infinite: true,
                speed: 700,
                slidesToShow: 1,
                autoplay : true,
                autoplaySpeed : 7500,
                pauseOnHover : false,
                slidesToScroll : 1,
            });
            $('.testi_slider').slick({
                dots: false,
                infinite: true,
                speed: 700,
                slidesToShow: 1,
                autoplay : true,
                autoplaySpeed : 7500,
                pauseOnHover : false,
                slidesToScroll : 1,
            });
            $('.ads_slider').slick({
                dots: true,
                infinite: true,
                speed: 700,
                slidesToShow: 1,
                arrows: false,
                autoplay : true,
                autoplaySpeed : 8500,
                pauseOnHover : false,
                slidesToScroll : 1,
                adaptiveHeight: true
            });
            $('.accord_toggle').on('click', function(e) {
                e.preventDefault();
                $(this).toggleClass('active');
                $(this).parent().find('.accord_inn').slideToggle(200);
            });
            $('.press_slider').slick({
                dots: false,
                infinite: true,
                speed: 700,
                slidesToShow: 4,
                autoplay : false,
                pauseOnHover : false,
                slidesToScroll : 1,
                responsive: [
                {
                    breakpoint: 992,
                    settings: {
                        slidesToShow: 3
                    }
                },
                {
                    breakpoint: 768,
                    settings: {
                        slidesToShow: 2
                    }
                },
                {
                    breakpoint: 576,
                    settings: {
                        slidesToShow: 1
                    }
                }
                ]
            });

            var $imageSrc; 
            $('.gallery_sec__img').click(function() {
                $imageSrc = $(this).data('bigimage');
            });
            $('#gal_Modal').on('shown.bs.modal', function (e) {
                $("#gal_lgimg").attr('src', $imageSrc);
            });
            $('#gal_Modal').on('hide.bs.modal', function (e) {
                $("#gal_lgimg").attr('src','');
            });
            $('.gallery_sec__img').on('click', function(e) {
                e.preventDefault();
                $title = $(this).data('title');
                $description = $(this).data('description');
                if($title != 'none') {
                    $('.gallery_meta h4').addClass('active');
                    $('.gallery_meta h4').html($title);
                } else {
                    $('.gallery_meta h4').removeClass('active');
                    $('.gallery_meta h4').html('');
                }
                if($description != 'none') {
                    $('.gallery_meta p').addClass('active');
                    $('.gallery_meta p').html($description);
                } else {
                    $('.gallery_meta p').removeClass('active');
                    $('.gallery_meta p').html('');
                }
            });
            $(window).scroll(function() {
                var div1 = $(".mini_head__menu .menu_toggle");
                var div2 = $("body div.text_dark");
                var div1_top = div1.offset().top;
                var div2_top = div2.offset().top;
                var div1_bottom = div1_top + div1.height();
                var div2_bottom = div2_top + div2.height();
                if (div1_bottom >= div2_top) {
                    $(".mini_head__menu .menu_toggle").addClass('active_toggle');
                }
                else {
                    $(".mini_head__menu .menu_toggle").removeClass('active_toggle');
                }
            });​
        });
        function myFunction() {
            var input, filter, ul, li, a, i;
            input = document.getElementById("insureInput");
            filter = input.value.toUpperCase();
            ul = document.getElementById("insure_lists");
            li = ul.getElementsByTagName("li");
            for (i = 0; i < li.length; i++) {
                a = li[i].getElementsByTagName("a")[0];
                if (a.innerHTML.toUpperCase().indexOf(filter) > -1) {
                    li[i].style.display = "";
                } else {
                    li[i].style.display = "none";
                }
            }
        }
    </script>

<?php wp_footer(); ?>

</body>
</html>
