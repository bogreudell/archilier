<?php 

	get_header(); 

	if ( have_posts() ) : while ( have_posts() ) : the_post();

?>

<div class="blog-wrapper">
	
	<?php echo the_post_thumbnail( 'full' ); ?>

	<div class="single-post-title">
		<p class="post-date"><?php the_date( 'j F Y' ); ?></p>
		<h1 class="single-title"><?php the_title(); ?></h1>
		<!-- share goes here -->
	</div>

	<div class="post-content">
		<?php the_content(''); ?>
	</div>

</div>

<?php 

	endwhile; endif;

	get_footer(); 

?>