<?php

/*
 * Hide admin bar on site front-end.
 */

show_admin_bar( false );

/*
 * Register theme for thumbnails.
 */

add_theme_support( 'post-thumbnails' );

/*
 * Register metabox map.
 */

require_once locate_template( 'map.php' );
require_once locate_template( 'map-data.php' );

?>