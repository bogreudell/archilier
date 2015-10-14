<div class="blog-wrapper careers">
	<h1 id="available-positions">Available Positions</h1>
	<?php 

		$careers = get_category_by_slug('careers')->term_id;
		$careers_args = array( 'category' => $careers, 'posts_per_page' => -1 );
		$careers_posts = get_posts( $careers_args );

		foreach ( $careers_posts as $post ) : setup_postdata( $post );

			$post_id = $post->term_id;
            $post_categories = get_the_category($post_id);
			
			$location = get_field( 'position_location' );

	?>
	<div class="career-post">
		<div class="post-title">
			<h1 class="career-title"><?php the_title(); ?></h1>
			<p class="career-location"><?php echo $location; ?></p>
		</div>
		<div class="post-content">
			<?php the_content(''); ?>
		</div>
	</div>
	<?php 

		endforeach;
		wp_reset_postdata();

	?>
</div>
<div class="join-form">
	<h1>Join</h1>
	<?php echo do_shortcode('[upload_form]'); ?>
</div>