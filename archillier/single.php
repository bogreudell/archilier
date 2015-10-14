<?php

	if ( in_category('projects') ) {

		get_template_part( 'includes/projects', 'single' );

	} else {

		get_template_part( 'includes/news', 'single' );

	}

?>