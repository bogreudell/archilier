<?php 

	get_header(); 

	if ( have_posts() ) : while ( have_posts() ) : the_post();

		$project_location = get_field('project_location');
		$site_area = get_field('site_area');
		$gfa = get_field('gfa');
		$height = get_field('height');
		$keys = get_field('keys');
		$project_secondary_img = get_field('project_secondary_image');
		$slideshow_shortcode = get_field('slideshow_shortcode');
		$hero_img_url = wp_get_attachment_image_src( get_post_thumbnail_id( get_the_ID() ), 'single-post-thumbnail' );

?>
</div>
<div class="main content-wrapper">
	<div class="single-feature-img">
		<?php 

			if ( $slideshow_shortcode == null ) : 

		?>
		<div class="main content-wrapper">
			<div class="single-feature-img">
		<?php

				echo the_post_thumbnail( 'full' );

			else : 

				echo do_shortcode( $slideshow_shortcode );

		 	endif; 
		
		?>
		<?php if ( $site_area || $gfa || $height || $keys ) : ?> 
			<div class="single-overlay">
				<div class="text-overlay">
					<button id="close-overlay">Close</button>
					<div class="post-title">
						<h2><?php the_title(); ?></h2>
						<p class="project-location"><?php echo $project_location; ?></p>
					</div>
					<div class="project-meta">
						<?php if ( $site_area ) : ?><p><strong>Site Area</strong>: <?php echo $site_area; ?></p><?php endif; ?>
						<?php if ( $gfa ) : ?><p><strong>GFA</strong>: <?php echo $gfa; ?></p><?php endif; ?>
						<?php if ( $height ) : ?><p><strong>Height</strong>: <?php echo $height; ?></p><?php endif; ?>
						<?php if ( $keys ) : ?><p><strong>Keys</strong>: <?php echo $keys; ?></p><?php endif; ?>
					</div>
					<div class="post-content">
						<?php the_content(''); ?>
					</div>
				</div>
				<button id="show-overlay" class="show-overlay">info</button>
			</div>
		<?php endif; ?>
	</div>
	</div>
</div>
<?php 

	endwhile; endif;

	get_footer(); 

?>