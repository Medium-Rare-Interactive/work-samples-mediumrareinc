<?php
/**
 * The template for displaying the footer
 *
 * Contains the closing of the #content div and all content after.
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package moonlight
 */   

?>

    <footer>
        <div class="container">
            <div class="row">
                <div class="col s12">
                    <div class="row">
                        <div class="col m4 s12">
                            <ul class="foot_social">
                                <li><a target="_blank" href="https://www.instagram.com/themoonlightoffical/"><i class="fab fa-instagram"></i></a></li>
                                <li><a target="_blank" href="https://twitter.com/moonlight_qatar/"><i class="fab fa-twitter"></i></a></li>
                                <li><a target="_blank" href="https://www.facebook.com/MoonlightBoutiqueQatar/"><i class="fab fa-facebook"></i></a></li>
                                <li><a target="_blank" href="https://api.whatsapp.com/send?phone=97433885574&text=Hello,%20I%20would%20like%20to%20inquire%20about%20your%20products"><i class="fab fa-whatsapp"></i></a></li>
                                <li><a target="_blank" href="https://www.snapchat.com/add/moonlight_q6r"><i class="fab fa-snapchat-ghost"></i></a></li>
                                <li><a target="_blank" href="https://www.pinterest.com/moonlight_qatar/"><i class="fab fa-pinterest-p"></i></a></li>
                                <li><a target="_blank" href="https://www.youtube.com/channel/UCZqocfHPx1CLObVgu-HsfMQ"><i class="fab fa-youtube"></i></a></li>
                            </ul>
                        </div>
                        <div class="col m8 s12 right-align hide-on-small-only">
                            <ul class="foot_menu">
                                <li><a href="#">DESIGNER</a></li>
                                <li><a href="<?php echo get_permalink( 78 ); ?>">CONTACT</a></li>
                                <li><a href="#">TERMS AND CONDITIONS</a></li>
                                <li><a href="#">PRIVACY</a></li>
                            </ul>
                        </div>
                    </div>
                    <div class="row foot_btm">
                        <div class="col m6 s12">
                            <p>Copyright © <?php echo date('Y') ?> - Moonlight. All Rights Reserved</p>
                        </div>
                        <div class="col m6 s12 right-align hide-on-small-only">
                            <a href="<?php echo home_url(); ?>"><img src=/wp-content/uploads/2018/09/Log-White.png" alt="Moonlight" style="height: 20px;"></a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </footer>
    <?php if(is_home() || is_front_page()) { ?>
    <div class="preload_bg active remove">
        <div class="bg_preload"></div>
        <div class="preload_wrap" style="display: none;">
            <p>Loading</p>
            <div class="loader-bar"></div>
        </div>
    </div>
    <?php } ?>

    <script src="https://code.jquery.com/jquery-3.3.1.min.js" integrity="sha256-FgpCb/KJQlLNfOu91ta32o/NMZxltwRo8QtmkMRdAu8=" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/materialize/1.0.0-rc.2/js/materialize.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/gsap/latest/TweenMax.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/gsap/latest/plugins/ScrollToPlugin.min.js"></script>
    <script type="text/javascript" src="<?php echo get_template_directory_uri(); ?>/js/slick.min.js"></script>
    <script type="text/javascript" src="<?php echo get_template_directory_uri(); ?>/js/scripts.js"></script>
    <script src="https://unpkg.com/aos@next/dist/aos.js"></script>
    <script>
        AOS.init({
            delay: 100,
            duration: 800,
            easing: 'ease',
        });
    </script>
    <script type="text/javascript">
        $(document).ready(function(){
            $('select').formSelect();
            $('a[href*="http"], a[href*="shop"]').on('click', function(e) {
                $('.preload_bg').removeClass('remove');
                setTimeout(function(){
                    $('.preload_bg').removeClass('active');
                }, 700);
                setTimeout(function(){
                    $('.preload_wrap').fadeIn('slow');
                }, 2000);
            });
            $('.shop_banner .dropdown-trigger, .shop_banner ul li').on('click', function(e) {
                $(this).parents('.select-wrapper').toggleClass('selected');
                $('body').toggleClass('select_element');
            });
            $(document).mouseup(function(e) {
                var container = $(".select-wrapper.selected");
                if (!container.is(e.target) && container.has(e.target).length === 0) {
                    $('.select-wrapper').removeClass('selected');
                    $('body').removeClass('select_element');
                }
            });
            $('#brand_cat').change(function(){
                var brand = $('#brand_cat').val();
                var cat_item = $('#shop_cat').val();
                var url_link = "/shop/?brand=" + brand + "&prod_cat="+ cat_item;
                window.location = url_link;
            });
            $('#shop_cat').change(function(){
                var brand = $('#brand_cat').val();
                var cat_item = $('#shop_cat').val();
                var url_link = "/shop/?brand=" + brand + "&prod_cat="+ cat_item;
                window.location = url_link;
            });
            $('.side_thumbnails a').on('click', function(e) {
                e.preventDefault();
                $('.preload_bg').delay(0).fadeOut('slow');
                $('.preload_wrap').delay(0).fadeOut();
                $('.side_thumbnails a').removeClass('active');
                $(this).addClass('active');
                var link_src = $(this).attr('href');
                $(".prodlg_image").attr("src",link_src);
                var click_src = $(this).data('thumb');
                $('.prodlg_image').attr("data-thumb", click_src);
            });
            $('.post_slider').slick({
                dots: false,
                infinite: true,
                speed: 700,
                slidesToShow: 1,
                autoplay : false,
                pauseOnHover : false,
                slidesToScroll : 1
            });
            $('.modal').modal();

            $('.pop_gallery__lg__img').on('mouseover', function(){
                //$(this).children('.pop_gallery__photo').css({'transform': 'scale('+ $(this).attr('data-scale') +')'});
                $(this).children('.pop_gallery__photo').css({'transform': 'scale(1)'});
            }).on('mouseout', function(){
                $(this).children('.pop_gallery__photo').css({'transform': 'scale(1)'});
            }).on('mousemove', function(e){
                $(this).children('.pop_gallery__photo').css({'background-position': ((e.pageX - $(this).offset().left) / $(this).width()) * 100 + '% ' + ((e.pageY - $(this).offset().top) / $(this).height()) * 100 +'%'});
            }).each(function(){
                $(this)
                .append('<div class="pop_gallery__photo"></div>')
                .children('.pop_gallery__photo').css({'background-image': 'url('+ $(this).attr('data-image') +')'});
            });
            $('img.prodlg_image').on('click', function(e) {
                $('.pop_gallery').fadeIn('slow');
                e.preventDefault();
                var click_src = $(this).attr('src');
                var click_href = $(this).data('thumb');
                $('.pop_gallery__thumb').removeClass('active');
                $(click_href).addClass('active');
                $('.pop_gallery__lg__img').attr("data-image", click_src);
                $('.pop_gallery__photo').css({'background-image': 'url('+ click_src +')'});
            });
            $('.pop_gallery__thumb').on('click', function(e) {
                e.preventDefault();
                $('.preload_bg').delay(0).fadeOut('slow');
                $('.preload_wrap').delay(0).fadeOut();
                $('.pop_gallery__thumb').removeClass('active');
                $(this).addClass('active');
                var click_src = $(this).attr('href');
                $('.pop_gallery__lg__img').attr("data-image", click_src);
                $('.pop_gallery__photo').css({'background-image': 'url('+ click_src +')'});
            });
            $('.pop_gallery .close_menu').on('click', function(e) {
                $('.pop_gallery').fadeOut('slow');
            });

            $('.select_size select').change(function(){
                var size = $('.select_size select').val();
                $('.size_table, .size_cont').removeClass('active');
                var itemSize = $('.size_list .active').find('a').data('size');
                if(size === 'standard' && itemSize === 'inch') {
                    $('#size_cont_11').addClass('active');
                    $('#size_table_1').addClass('active');
                } else if(size === 'standard' && itemSize === 'cm') {
                    $('#size_cont_12').addClass('active');
                    $('#size_table_3').addClass('active');
                } else if(size === 'petite' && itemSize === 'inch') {
                    $('#size_cont_21').addClass('active');
                    $('#size_table_2').addClass('active');
                } else if(size === 'petite' && itemSize === 'cm') {
                    $('#size_cont_22').addClass('active');
                    $('#size_table_4').addClass('active');
                }
                var bust_list = $(".size_cont.active .bust_list").prop('selectedIndex');
                var waist_list = $(".size_cont.active .waist_list").prop('selectedIndex');
                var hip_list = $(".size_cont.active .hip_list").prop('selectedIndex');
                if(bust_list === 4 || waist_list === 4 || hip_list === 4) {
                    $('.main_size strong').html('XL');
                } else if(bust_list === 3 || waist_list === 3 || hip_list === 3) {
                    $('.main_size strong').html('L');
                } else if(bust_list === 2 || waist_list === 2 || hip_list === 2) {
                    $('.main_size strong').html('M');
                } else if(bust_list === 1 || waist_list === 1 || hip_list === 1) {
                    $('.main_size strong').html('S');
                } else if(bust_list === 0 || waist_list === 0 || hip_list === 0) {
                    $('.main_size strong').html('XS');
                }
            });
            $('.size_list a').on('click', function(e) {
                e.preventDefault();
                $('.preload_bg').delay(0).fadeOut('slow');
                $('.preload_wrap').delay(0).fadeOut();
                var size = $('.select_size select').val();
                $('.size_table, .size_list li, .size_cont').removeClass('active');
                $(this).parent().addClass('active');
                var itemSize = $(this).data('size');
                if(size === 'standard' && itemSize === 'inch') {
                    $('#size_cont_11').addClass('active');
                    $('#size_table_1').addClass('active');
                } else if(size === 'standard' && itemSize === 'cm') {
                    $('#size_cont_12').addClass('active');
                    $('#size_table_3').addClass('active');
                } else if(size === 'petite' && itemSize === 'inch') {
                    $('#size_cont_21').addClass('active');
                    $('#size_table_2').addClass('active');
                } else if(size === 'petite' && itemSize === 'cm') {
                    $('#size_cont_22').addClass('active');
                    $('#size_table_4').addClass('active');
                }
                var bust_list = $(".size_cont.active .bust_list").prop('selectedIndex');
                var waist_list = $(".size_cont.active .waist_list").prop('selectedIndex');
                var hip_list = $(".size_cont.active .hip_list").prop('selectedIndex');
                if(bust_list === 4 || waist_list === 4 || hip_list === 4) {
                    $('.main_size strong').html('XL');
                } else if(bust_list === 3 || waist_list === 3 || hip_list === 3) {
                    $('.main_size strong').html('L');
                } else if(bust_list === 2 || waist_list === 2 || hip_list === 2) {
                    $('.main_size strong').html('M');
                } else if(bust_list === 1 || waist_list === 1 || hip_list === 1) {
                    $('.main_size strong').html('S');
                } else if(bust_list === 0 || waist_list === 0 || hip_list === 0) {
                    $('.main_size strong').html('XS');
                }
            });
            $('.size_cont__right select').change(function(){
                var size = $('.select_size select').val();
                $('.size_table, .size_cont').removeClass('active');
                var itemSize = $('.size_list .active').find('a').data('size');
                if(size === 'standard' && itemSize === 'inch') {
                    $('#size_cont_11').addClass('active');
                    $('#size_table_1').addClass('active');
                } else if(size === 'standard' && itemSize === 'cm') {
                    $('#size_cont_12').addClass('active');
                    $('#size_table_3').addClass('active');
                } else if(size === 'petite' && itemSize === 'inch') {
                    $('#size_cont_21').addClass('active');
                    $('#size_table_2').addClass('active');
                } else if(size === 'petite' && itemSize === 'cm') {
                    $('#size_cont_22').addClass('active');
                    $('#size_table_4').addClass('active');
                }
                var bust_list = $(".size_cont.active .bust_list").prop('selectedIndex');
                var waist_list = $(".size_cont.active .waist_list").prop('selectedIndex');
                var hip_list = $(".size_cont.active .hip_list").prop('selectedIndex');
                if(bust_list === 4 || waist_list === 4 || hip_list === 4) {
                    $('.main_size strong').html('XL');
                } else if(bust_list === 3 || waist_list === 3 || hip_list === 3) {
                    $('.main_size strong').html('L');
                } else if(bust_list === 2 || waist_list === 2 || hip_list === 2) {
                    $('.main_size strong').html('M');
                } else if(bust_list === 1 || waist_list === 1 || hip_list === 1) {
                    $('.main_size strong').html('S');
                } else if(bust_list === 0 || waist_list === 0 || hip_list === 0) {
                    $('.main_size strong').html('XS');
                }
            });
        });
    </script>

<?php wp_footer(); ?>

</body>
</html>
