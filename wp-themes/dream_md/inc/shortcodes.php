<?php
/**
 * Register all shortcodes
 *
 * @return null
 */
function register_shortcodes() {
    add_shortcode( 'testimonials', 'shortcode_testislider' );
    add_shortcode( 'insurancelist', 'shortcode_insurancelist' );
    add_shortcode( 'locations', 'shortcode_locations' );
    add_shortcode( 'appointment', 'shortcode_appointment' );
    add_shortcode( 'button', 'shortcode_button' );
}
add_action( 'init', 'register_shortcodes' );

/**
 * Testimonials Shortcode Callback
 *
 * @return contents
 */
function shortcode_testislider() {
    global $wp_query,
        $post;

    $loop = new WP_Query( array(
        'posts_per_page'    => 10,
        'post_type'         => 'testimonials'
    ) );
    
    if( ! $loop->have_posts() ) {
        return false;
    } else {
        echo '<div class="testi_slider">';
        while( $loop->have_posts() ) {
            $loop->the_post();
            ?>
            <div class="testi_slider__item">
                <?php the_content(); ?>
                <p>
                    <i class="fas fa-star"></i>
                    <i class="fas fa-star"></i>
                    <i class="fas fa-star"></i>
                    <i class="fas fa-star"></i>
                    <i class="fas fa-star"></i>
                </p>
                <p><em><?php the_title(); ?></em></p>
            </div>
            <?php
        }
        echo '</div>';
    }

    wp_reset_postdata();
}

/**
 * Button Shortcode Callback
 *
 * @return contents
 */
function shortcode_button( $atts, $content = null ) {
    extract( shortcode_atts( array(
        'url'    => '',
    ), $atts ) );
    $content = $text ? $text : $content;
    if ( $url ) {
        $link_attr = array(
            'href'   => esc_url( $url ),
            'class'  => 'btn btn-primary space'
        );
        $link_attrs_str = '';
        foreach ( $link_attr as $key => $val ) {
            if ( $val ) {
                $link_attrs_str .= ' ' . $key . '="' . $val . '"';
            }
        }
        return '<a' . $link_attrs_str . '><span>' . do_shortcode( $content ) . '</span></a>';
    }
    else {
        return '<span class="myprefix-button"><span>' . do_shortcode( $content ) . '</span></span>';
    }
}

/**
 * Locations Shortcode Callback
 *
 * @return contents
 */
function shortcode_locations($atts) {
    global $wp_query,
        $post;

    $loop = new WP_Query( array(
        'posts_per_page'    => 1,
        'post_type'         => 'locations',
        'post__in' => array( sanitize_title($atts['id']) )
    ) );

    if( ! $loop->have_posts() ) {
        return false;
    } else {
        while( $loop->have_posts() ) {
            $loop->the_post();
            $current_id = get_the_ID();
            echo'<p>'.get_field('address', $current_id).'</p>';
        }
    }

    wp_reset_postdata();
}

/**
 * Insurance Shortcode Callback
 *
 * @return contents
 */
function shortcode_insurancelist() {
    global $wp_query,
        $post;

    $loop = new WP_Query( array(
        'posts_per_page'    => -1,
        'post_type'         => 'insurance',
        'order' => 'desc'
    ) );

    $html_content = "";

    if( ! $loop->have_posts() ) { ?>
        <?php return false;
    } else {
        $items_per_column = $loop->post_count / 3;
        $current_item = 1;
        $html_content .= '<div class="col-12 insurances"><div class="insure_search"><input type="text" class="form-control" placeholder="Search by Insurance" id="insureInput" onkeyup="myFunction()" /></div>' . "\n";
        $html_content .= '<div id="insure_lists" class="row insure_lists">' . "\n";
        while( $loop->have_posts() ) : $loop->the_post();
            if ( $current_item == 1 ) :
                $html_content .= '<ul class="col-md-4 ' . $items_per_column . " " . $current_item . " " . $loop->post_count . '">' . "\n";
            endif;

            if ( $current_item > 3 && $current_item % $items_per_column == 0 ) :
                $html_content .= '<ul class="col-md-4 ' . $items_per_column . " " . $current_item . " " . $loop->post_count . '">' . "\n";
            endif;
            
                $html_content .= '<li class="insurance-item ' . $items_per_column . " " . $current_item  . " " . ($current_item % $items_per_column) . '"><a>' . "\n";
                $html_content .= get_field('insurance_name') . "\n";
                $html_content .= '</a></li>' . "\n";
            
            if ( $current_item != 0 && ($current_item+1) % $items_per_column == 0 ) :
                $html_content .= '</ul>' . "\n";
            endif;
            $current_item++;
        endwhile;
        $html_content .= '</ul>'  . "\n";
        $html_content .= '</div>' . "\n";
        return $html_content;
    }

     wp_reset_postdata();
}

/**
 * Locations Shortcode Callback
 *
 * @return contents
 */
function shortcode_appointment() {
    if( have_rows('make_appointment', 'options') ) {
        while( have_rows('make_appointment', 'options') ) {
            the_row();
            echo '<div class="make_appoint" style="background-color: '.get_sub_field('bg_color').'">';
            ?>
            <div class="container">
                <div class="row">
                    <?php if(get_sub_field('title') || get_sub_field('description')) ?>
                    <div class="col-12">
                        <div class="make_appoint__inn">
                            <?php 
                            echo get_sub_field('main_icon');
                            if(get_sub_field('title')) echo '<h2>'.get_sub_field('title').'</h2>';
                            if(get_sub_field('description')) echo '<p>'.get_sub_field('description').'</p>';
                            ?>
                        </div>
                    </div>
                    <?php if( have_rows('details', 'options') ) {
                        while( have_rows('details', 'options') ) {
                            echo '<div class="col-md-6 col-12"><div class="make_appoint__inn">';
                            the_row();
                            echo get_sub_field('icon');
                            if(get_sub_field('sub_title')) echo '<h3>'.get_sub_field('sub_title').'</h3>';
                            if(get_sub_field('contents')) echo '<p>'.get_sub_field('contents').'</p>';
                            echo '</div></div>';
                        }
                    } ?>
                </div>
            </div>
            <?php 
            echo '</div>';
        }
    }
}