<?php 
function codex_custom_init() {
  	$args = array(
  		'public' => true,
  		'label'  => 'Home Banner',
  		'menu_icon' => 'dashicons-format-gallery',
  		'supports' => array( 'title', 'thumbnail', 'editor' )
  	);
  	register_post_type( 'home-banner', $args );

  	register_taxonomy(
  		'products-brands',
  		'product',
  		array(
  			'label' => __( 'Product Brands' ),
  			'rewrite' => array( 'slug' => 'products-brands' ),
  			'hierarchical' => true
  		)
  	);
}
add_action( 'init', 'codex_custom_init' );
