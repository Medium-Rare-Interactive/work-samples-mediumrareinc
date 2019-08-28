<?php 
function codex_custom_init() {
   $args = array(
      'public' => true,
      'label'  => 'Teams',
      'menu_icon' => 'dashicons-businessman',
      'supports' => array( 'title', 'thumbnail' )
      );
   register_post_type( 'teams', $args );

   register_taxonomy(
      'teams-cat',
      'teams',
      array(
         'label' => __( 'Category' ),
         'rewrite' => array( 'slug' => 'teams-cat' ),
         'hierarchical' => true
      )
   );

   $args = array(
      'public' => true,
      'label'  => 'Testimonials',
      'menu_icon' => 'dashicons-format-quote',
      'supports' => array( 'title', 'thumbnail', 'editor' )
      );
   register_post_type( 'testimonials', $args );

   $args = array(
      'public' => true,
      'label'  => 'Locations',
      'menu_icon' => 'dashicons-location',
      'supports' => array( 'title', 'thumbnail' )
      );
   register_post_type( 'locations', $args );

   $args = array(
      'public' => true,
      'label'  => 'FAQ',
      'menu_icon' => 'dashicons-edit',
      'supports' => array( 'title', 'editor' )
      );
   register_post_type( 'faq', $args );

   register_taxonomy(
      'faq-cat',
      'faq',
      array(
         'label' => __( 'Category' ),
         'rewrite' => array( 'slug' => 'faq-cat' ),
         'hierarchical' => true
      )
   );

   $args = array(
      'public' => true,
      'label'  => 'Ads',
      'menu_icon' => 'dashicons-art',
      'supports' => array( 'title', 'thumbnail', 'editor' )
      );
   register_post_type( 'ads', $args );
}
add_action( 'init', 'codex_custom_init' );
