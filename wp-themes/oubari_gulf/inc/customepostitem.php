<?php 
function codex_custom_init() {
   $args = array(
      'public' => true,
      'label'  => 'Products',
      'menu_icon' => 'dashicons-cart',
      'supports' => array( 'title', 'thumbnail', 'editor' )
      );
   register_post_type( 'products', $args );

    register_taxonomy(
      'products-cat',
      'products',
      array(
        'label' => __( 'Product Category' ),
        'rewrite' => array( 'slug' => 'products-cat' ),
        'hierarchical' => true
        )
      );

   $args = array(
      'public' => true,
      'label'  => 'Contacts',
      'menu_icon' => 'dashicons-location-alt',
      'supports' => array( 'title', 'thumbnail', 'editor' )
      );
   register_post_type( 'contact', $args );
}
add_action( 'init', 'codex_custom_init' );
