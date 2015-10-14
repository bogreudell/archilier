<?php 
  

  function prep_map_data() {

    if (!WP_DEBUG && $out = get_transient( 'prep_map_data' ) ) 
      return wp_localize_script( 'location_data', 'location_data', $out);

    $args = array(
      'category_name' => 'projects',
      'posts_per_page' => -1
    );

    $query = new WP_Query( $args );

    $return = array();

    if ($query->have_posts()) : while ( $query->have_posts() ) : $query->the_post(); 
      
        $map = get_post_meta(get_the_ID(), 'map', true);
        $address = get_post_meta(get_the_ID(), 'address', true);
        $title = get_the_title();
        $project_location = get_field('project_location');
        $project_thumb = wp_get_attachment_image_src( get_post_thumbnail_id(), 'single-post-thumbnail', true );
        $permalink = get_the_permalink();


        if ( !$map ) 
          continue;

        $return[] = array (
          'map' => $map,
          'address' => $address,
          'title' => $title,
          'projectLocation' => $project_location,
          'projectThumb' => $project_thumb[0],
          'permalink' => $permalink

        );

    endwhile; endif;   

    !WP_DEBUG && set_transient( 'prep_map_data', $return );

    wp_localize_script( 'location_data', 'location_data', $return);

    wp_reset_query();

  }

  function ar_get_scripts() {

    //wp_enqueue_script('google-maps', '//maps.google.com/maps/api/js?sensor=false', false, null, true );
    wp_enqueue_script('google-maps', '//maps.googleapis.com/maps/api/js?key=AIzaSyCp6WMCF0GTwGBNU1cibhr_Hzd3VePozbA', false, null, true );
    wp_enqueue_script('location_data',  get_template_directory_uri() . '/js/map-data.js', false, null, true );

  }

  add_action( 'wp_enqueue_scripts', 'ar_get_scripts', 100 );
  add_action( 'wp_enqueue_scripts', 'prep_map_data', 102 );




