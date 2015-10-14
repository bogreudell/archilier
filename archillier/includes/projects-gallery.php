<div class="posts-container">
	<!-- <button class="toggle">view projects on map</button> -->
	<ul class="posts masonry">
		<li class="grid-sizer"></li>
		<?php 

			$projects = get_category_by_slug('projects')->term_id;
			$projects_args = array( 'category' => $projects, 'posts_per_page' => -1 );
			$projects_posts = get_posts( $projects_args );

			foreach ( $projects_posts as $post ) : setup_postdata( $post );

				$post_id = $post->term_id;
                $post_categories = get_the_category($post_id);

				$thumb_proportions = get_field( 'thumbnail_proportions' );
				$thumb_class = strtolower( $thumb_proportions );
				$bg_image = wp_get_attachment_image_src( get_post_thumbnail_id(), 'single-post-thumbnail' );
				$post_location = get_field( 'project_location' );

		?>

		<li class="post grid-item visible <?php echo $thumb_class . " "; if ( !has_post_thumbnail() ) { echo 'no-img '; } else { echo 'img '; } foreach ($post_categories as $category) { $category_name = $category->slug; echo $category_name . " "; } ?>">
			<a href="<?php the_permalink(); ?>" class="post-inner">
				<div class="post-inner-wrap">
					<div class="post-meta">
						<div class="project-location">
							<?php echo $post_location; ?>
						</div>
						<div class="post-title">
							<?php the_title(); ?>
						</div>
					</div>
				</div>
				<?php //best way to optimize would be to generate different thumbnail sizes based on proportions
				the_post_thumbnail( array( 800, 800 ) ); ?>
			</a>
		</li>

		<?php 

			endforeach; 
			wp_reset_postdata();

		?>
	</ul>
</div>
<div class="map-container">
	<button class="toggle">view project list</button>
	<div id="project-map"></div>
</div>