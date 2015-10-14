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

?>
<div class="content-wrapper narrow">
	<?php if ( $slideshow_shortcode == null ) : ?>
	<div class="single-featured-img">
		<?php echo the_post_thumbnail( 'full' ); ?>
	</div>
	<?php else : ?>
	<div class="single-featured-img">
		<?php echo do_shortcode( $slideshow_shortcode ); ?>
	</div>
	<?php endif; ?>
	<div class="content">
		<aside class="text">
			<div class="post-title">
				<h2><?php the_title(); ?></h2>
				<p class="project-location"><?php echo $project_location; ?></p>
			</div>
			<div class="project-meta">
				<p><strong>Site Area</strong>: <?php echo $site_area; ?></p>
				<p><strong>GFA</strong>: <?php echo $gfa; ?></p>
				<p><strong>Height</strong>: <?php echo $height; ?></p>
				<p><strong>Keys</strong>: <?php echo $keys; ?></p>
			</div>
			<div class="post-content">
				<?php the_content(''); ?>
			</div>
		</aside>
		<div class="second-project-img">
			<?php if ( $project_secondary_img != null ) : ?>

				<img src="<?php echo $project_secondary_img; ?>" alt="<?php the_title(); ?>" />
		
			<?php endif; ?>
		</div>
	</div>
</div>
<?php 

	endwhile; endif;

	get_footer(); 

?>