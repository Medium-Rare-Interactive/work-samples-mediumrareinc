<?php 
function codex_custom_init() {
    $args = array(
      'public' => true,
      'label'  => 'Slider',
      'menu_icon' => 'dashicons-format-gallery',
      'supports' => array( 'title', 'editor', 'thumbnail' )
    );
    register_post_type( 'slider', $args );

    $args = array(
      'public' => true,
      'label'  => 'Career',
      'menu_icon' => 'dashicons-welcome-learn-more',
      'supports' => array( 'title', 'editor', 'thumbnail' )
    );
    register_post_type( 'career', $args );

    register_taxonomy(
      'department',
      'career',
      array(
        'label' => __( 'Department' ),
        'rewrite' => array( 'slug' => 'department' ),
        'hierarchical' => true
        )
      );

    $args = array(
      'public' => true,
      'label'  => 'Distributors',
      'menu_icon' => 'dashicons-location-alt',
      'supports' => array( 'title', 'thumbnail' )
    );
    register_post_type( 'distributor', $args );

    register_taxonomy(
    	'location',
    	'distributor',
    	array(
    		'label' => __( 'Location' ),
    		'rewrite' => array( 'slug' => 'location' ),
    		'hierarchical' => true
    		)
    	);

    $args = array(
      'public' => true,
      'label'  => 'Investors',
      'menu_icon' => 'dashicons-share-alt',
      'supports' => array( 'title', 'editor', 'thumbnail' )
    );
    register_post_type( 'investor', $args );
}
add_action( 'init', 'codex_custom_init' );
