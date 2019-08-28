<?php
/**
 * The Template for displaying all single products
 *
 * This template can be overridden by copying it to yourtheme/woocommerce/single-product.php.
 *
 * HOWEVER, on occasion WooCommerce will need to update template files and you
 * (the theme developer) will need to copy the new files to your theme to
 * maintain compatibility. We try to do this as little as possible, but it does
 * happen. When this occurs the version of the template file will be bumped and
 * the readme will list any important changes.
 *
 * @see         https://docs.woocommerce.com/document/template-structure/
 * @author      WooThemes
 * @package     WooCommerce/Templates
 * @version     1.6.4
 */

if ( ! defined( 'ABSPATH' ) ) {
    exit; // Exit if accessed directly
}

global $product;
get_header( 'shop' ); ?>

    <?php $attachment_ids = $product->get_gallery_attachment_ids(); ?>
    <div class="pop_gallery">
        <div class="close_menu modal-close"></div>
        <div class="pop_gallery__lg">
            <div class="pop_gallery__lg__img" data-scale="1.1" data-image="<?php echo wp_get_attachment_url($attachment_ids[0]); ?>"></div>
        </div>
        <div class="pop_gallery__thumbs">
            <?php
            $count = 0;
            foreach( $attachment_ids as $attachment_id ) {
                $count++;
                $image_link = wp_get_attachment_url( $attachment_id );
                echo '<a id="click_'.$count.'" class="pop_gallery__thumb" href="'.$image_link.'"><img src="';
                echo $image_link;
                echo '" alt="gallery"></a>';
            } ?>
        </div>
    </div>
    <div class="single_product">
        <div id="product-<?php the_ID(); ?>" <?php wc_product_class(); ?>>
            <div class="prev_link"><?php previous_post_link(); ?></div>
            <div class="next_link"><?php next_post_link(); ?></div>
            <div class="container">
                <?php while ( have_posts() ) : the_post(); ?>
                    <div class="row">
                        <div class="col s12">
                            <ul class="product_topnav">
                                <li><a href="<?php echo get_permalink( woocommerce_get_page_id( 'shop' ) ); ?>">Shop</a></li>
                                <?php $terms = get_the_terms( $post->ID , 'products-brands' ); ?>
                                <li><a href="/shop/?brand=<?php echo $terms[0]->term_id; ?>&prod_cat=-1"><img src="<?php echo get_template_directory_uri(); ?>/images/arrow-black.svg" alt="arrow-black"> <?php echo $terms[0]->name; ?></a></li>
                                <li class="active"><a><img src="<?php echo get_template_directory_uri(); ?>/images/arrow-black.svg" alt="arrow-black"> <?php the_title(); ?></a></li>
                            </ul>
                            <div class="row">
                                <div class="col m7 s12">
                                    <?php $attachment_ids = $product->get_gallery_attachment_ids(); ?>
                                    <div class="side_gallery">
                                        <div class="gallery_box">
                                            <img class="prodlg_image" src="<?php echo wp_get_attachment_url($attachment_ids[0]); ?>" alt="<?php the_title(); ?>" data-thumb="">
                                        </div>
                                        <div class="side_thumbnails">
                                            <?php
                                            $count = 0;
                                            foreach( $attachment_ids as $attachment_id ) {
                                                $count++;
                                                $image_link = wp_get_attachment_url( $attachment_id );
                                                if ($count == 1) echo '<a data-thumb="#click_'.$count.'" class="thumbnail_item active" href="'.$image_link.'"><img src="';
                                                else echo '<a data-thumb="#click_'.$count.'" class="thumbnail_item" href="'.$image_link.'"><img src="';
                                                echo $image_link;
                                                echo '" alt="gallery"></a>';
                                            } ?>
                                        </div>
                                    </div>
                                </div>
                                <div class="col m5 s12">
                                    <div class="video_text product_right">
                                        <?php do_action( 'woocommerce_single_product_summary' ); ?>
                                        <div class="prod_misc">
                                            <ul>
                                                <li><a data-target="modal1" class="prod_misc__cont modal-trigger" href="#">DETAILS</a></li>
                                                <li><a data-target="modal2" class="prod_misc__size modal-trigger" href="#">SIZE CHART</a></li>
                                                <li><a href="mailto:info@themoonlightstore.com">CONTACT</a></li>
                                            </ul>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                <?php endwhile; ?>
            </div>
        </div>
    </div>
    <div class="simialr_prod">
        <div class="container">
            <div class="row">
                <div class="col s12">
                    <h3 data-aos="fade-up"><span>You may also like</span></h3>
                    <div class="row">
                        <?php
                        wp_reset_query();
                        $args = array('post_type' => 'product', 'posts_per_page' => 4, 'orderby' => 'rand', 'post__not_in' => array( $product->id ));
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

    <div id="modal1" class="modal">
        <div class="modal-content">
            <div class="close_menu modal-close"></div>
            <div class="detail_pop__left">
                <div class="video_text">
                    <h5>INFORMATIONS</h5>
                    <h2>More details</h2>
                    <?php
                    if (have_posts()) {
                        while (have_posts()) {
                            the_post();
                            the_content();
                        }
                    } ?>
                </div>
            </div>
            <div class="detail_pop__right">
                <?php 
                $img_url = get_the_post_thumbnail_url( get_the_ID(), 'full' );
                $img_call = aq_resize( $img_url, 360, 600, true, true, true );
                ?>
                <img src="<?php echo $img_call; ?>" alt="<?php the_title(); ?>">
            </div>
        </div>
    </div>

    <div id="modal2" class="modal">
        <div class="modal-content">
            <div class="video_text">
                <h5>FIND YOUR SIZE</h5>
                <h2>Size calculator</h2>
            </div>
            <div class="close_menu modal-close"></div>
            <img src="/wp-content/uploads/2018/09/size-chart.png" alt="size chart">
            <div class="size_left">
                <ul class="size_list">
                    <li class="active"><a data-size="inch" href="#">INCHES</a></li>
                    <li><a data-size="cm" href="#">CM</a></li>
                </ul>
                <p>Select your measurements using the dropdown lists below and our size calculator will recommend the best size for you</p>
                <div id="size_cont_11" class="size_cont active">
                    <ul>
                        <li>
                            <strong>Bust</strong>
                            Measure across the fullest part of the bust.
                            <div class="size_cont__right">
                                <select class="bust_list">
                                    <option value="33">33</option>
                                    <option value="35">35</option>
                                    <option value="37">37</option>
                                    <option value="38">38</option>
                                    <option value="40">40</option>
                                </select>
                            </div>
                        </li>
                        <li>
                            <strong>Natural waist</strong>
                            The narrowest part, usually below your rib cage and above your belly button.
                            <div class="size_cont__right">
                                <select class="waist_list">
                                    <option value="26">26</option>
                                    <option value="28">28</option>
                                    <option value="30">30</option>
                                    <option value="31">31</option>
                                    <option value="33">33</option>
                                </select>
                            </div>
                        </li>
                        <li>
                            <strong>Hips</strong>
                            Hip measurements should be taken 20cm below your natural waistline.
                            <div class="size_cont__right">
                                <select class="hip_list">
                                    <option value="37">37</option>
                                    <option value="39">39</option>
                                    <option value="40">40</option>
                                    <option value="42">42</option>
                                    <option value="44">44</option>
                                </select>
                            </div>
                        </li>
                    </ul>
                </div>
                <div id="size_cont_12" class="size_cont">
                    <ul>
                        <li>
                            <strong>Bust</strong>
                            Measure across the fullest part of the bust.
                            <div class="size_cont__right">
                                <select class="bust_list">
                                    <option value="84">84</option>
                                    <option value="89">89</option>
                                    <option value="94">94</option>
                                    <option value="96">96</option>
                                    <option value="101.5">101.5</option>
                                </select>
                            </div>
                        </li>
                        <li>
                            <strong>Natural waist</strong>
                            The narrowest part, usually below your rib cage and above your belly button.
                            <div class="size_cont__right">
                                <select class="waist_list">
                                    <option value="66">66</option>
                                    <option value="71">71</option>
                                    <option value="76">76</option>
                                    <option value="79">79</option>
                                    <option value="84">84</option>
                                </select>
                            </div>
                        </li>
                        <li>
                            <strong>Hips</strong>
                            Hip measurements should be taken 20cm below your natural waistline.
                            <div class="size_cont__right">
                                <select class="hip_list">
                                    <option value="94">94</option>
                                    <option value="99">99</option>
                                    <option value="101.5">101.5</option>
                                    <option value="106.5">106.5</option>
                                    <option value="112">112</option>
                                </select>
                            </div>
                        </li>
                    </ul>
                </div>
                <div id="size_cont_21" class="size_cont">
                    <ul>
                        <li>
                            <strong>Bust</strong>
                            Measure across the fullest part of the bust.
                            <div class="size_cont__right">
                                <select class="bust_list">
                                    <option value="32">32</option>
                                    <option value="34">34</option>
                                    <option value="36">36</option>
                                    <option value="37">37</option>
                                    <option value="39">39</option>
                                </select>
                            </div>
                        </li>
                        <li>
                            <strong>Natural waist</strong>
                            The narrowest part, usually below your rib cage and above your belly button.
                            <div class="size_cont__right">
                                <select class="waist_list">
                                    <option value="25">25</option>
                                    <option value="27">27</option>
                                    <option value="29">29</option>
                                    <option value="30">30</option>
                                    <option value="32">32</option>
                                </select>
                            </div>
                        </li>
                        <li>
                            <strong>Hips</strong>
                            Hip measurements should be taken 20cm below your natural waistline.
                            <div class="size_cont__right">
                                <select class="hip_list">
                                    <option value="35">35</option>
                                    <option value="37">37</option>
                                    <option value="39">39</option>
                                    <option value="40">40</option>
                                    <option value="43">43</option>
                                </select>
                            </div>
                        </li>
                    </ul>
                </div>
                <div id="size_cont_22" class="size_cont">
                    <ul>
                        <li>
                            <strong>Bust</strong>
                            Measure across the fullest part of the bust.
                            <div class="size_cont__right">
                                <select class="bust_list">
                                    <option value="81">81</option>
                                    <option value="86">86</option>
                                    <option value="91.5">91.5</option>
                                    <option value="94">94</option>
                                    <option value="99">99</option>
                                </select>
                            </div>
                        </li>
                        <li>
                            <strong>Natural waist</strong>
                            The narrowest part, usually below your rib cage and above your belly button.
                            <div class="size_cont__right">
                                <select class="waist_list">
                                    <option value="63.5">63.5</option>
                                    <option value="68.5">68.5</option>
                                    <option value="73.5">73.5</option>
                                    <option value="76">76</option>
                                    <option value="81">81</option>
                                </select>
                            </div>
                        </li>
                        <li>
                            <strong>Hips</strong>
                            Hip measurements should be taken 20cm below your natural waistline.
                            <div class="size_cont__right">
                                <select class="hip_list">
                                    <option value="84">84</option>
                                    <option value="94">94</option>
                                    <option value="99">99</option>
                                    <option value="101.5">101.5</option>
                                    <option value="109">109</option>
                                </select>
                            </div>
                        </li>
                    </ul>
                </div>
                <div class="main_size hide_md">
                    YOUR BEST SIZE IS
                    <strong>XS</strong>
                </div>
            </div>
            <div class="size_right">
                <div class="select_size">
                    Select your fit 
                    <select>
                        <option value="standard">Standard</option>
                        <option value="petite">Petite</option>
                    </select>
                </div>
                <table class="size_tables">
                    <thead>
                        <tr>
                            <th>Size</th>
                            <th>Bust</th>
                            <th>Waist</th>
                            <th>Hips</th>
                            <th>Shoulders</th>
                        </tr>
                    </thead>
                    <tbody id="size_table_1" class="size_table active">
                        <tr>
                            <th>XS</th>
                            <td>33</td>
                            <td>26</td>
                            <td>37</td>
                            <td>15</td>
                        </tr>
                        <tr>
                            <th>S</th>
                            <td>35</td>
                            <td>28</td>
                            <td>39</td>
                            <td>15.5</td>
                        </tr>
                        <tr>
                            <th>M</th>
                            <td>37</td>
                            <td>30</td>
                            <td>40</td>
                            <td>15.5</td>
                        </tr>
                        <tr>
                            <th>L</th>
                            <td>38</td>
                            <td>31</td>
                            <td>42</td>
                            <td>16</td>
                        </tr>
                        <tr>
                            <th>XL</th>
                            <td>40</td>
                            <td>33</td>
                            <td>44</td>
                            <td>16.5</td>
                        </tr>
                    </tbody>
                    <tbody id="size_table_2" class="size_table">
                        <tr>
                            <th>XS</th>
                            <td>32</td>
                            <td>25</td>
                            <td>35</td>
                            <td>13.75</td>
                        </tr>
                        <tr>
                            <th>S</th>
                            <td>34</td>
                            <td>27</td>
                            <td>37</td>
                            <td>14.25</td>
                        </tr>
                        <tr>
                            <th>M</th>
                            <td>36</td>
                            <td>29</td>
                            <td>39</td>
                            <td>14.75</td>
                        </tr>
                        <tr>
                            <th>L</th>
                            <td>37</td>
                            <td>30</td>
                            <td>40</td>
                            <td>15.5</td>
                        </tr>
                        <tr>
                            <th>XL</th>
                            <td>39</td>
                            <td>32</td>
                            <td>43</td>
                            <td>15.75</td>
                        </tr>
                    </tbody>
                    <tbody id="size_table_3" class="size_table">
                        <tr>
                            <th>XS</th>
                            <td>84</td>
                            <td>66</td>
                            <td>94</td>
                            <td>38</td>
                        </tr>
                        <tr>
                            <th>S</th>
                            <td>89</td>
                            <td>71</td>
                            <td>99</td>
                            <td>39.5</td>
                        </tr>
                        <tr>
                            <th>M</th>
                            <td>94</td>
                            <td>76</td>
                            <td>101.5</td>
                            <td>39.5</td>
                        </tr>
                        <tr>
                            <th>L</th>
                            <td>96</td>
                            <td>79</td>
                            <td>106.5</td>
                            <td>40.5</td>
                        </tr>
                        <tr>
                            <th>XL</th>
                            <td>101.5</td>
                            <td>84</td>
                            <td>112</td>
                            <td>42</td>
                        </tr>
                    </tbody>
                    <tbody id="size_table_4" class="size_table">
                        <tr>
                            <th>XS</th>
                            <td>81</td>
                            <td>63.5</td>
                            <td>84</td>
                            <td>35</td>
                        </tr>
                        <tr>
                            <th>S</th>
                            <td>86</td>
                            <td>68.5</td>
                            <td>94</td>
                            <td>36</td>
                        </tr>
                        <tr>
                            <th>M</th>
                            <td>91.5</td>
                            <td>73.5</td>
                            <td>99</td>
                            <td>37.5</td>
                        </tr>
                        <tr>
                            <th>L</th>
                            <td>94</td>
                            <td>76</td>
                            <td>101.5</td>
                            <td>39.5</td>
                        </tr>
                        <tr>
                            <th>XL</th>
                            <td>99</td>
                            <td>81</td>
                            <td>109</td>
                            <td>40</td>
                        </tr>
                    </tbody>
                </table>
            </div>
            <div class="main_size vis_md">
                YOUR BEST SIZE IS
                <strong>XS</strong>
            </div>
            <div class="clearfix"></div>
        </div>
    </div>

<?php get_footer( 'shop' );
