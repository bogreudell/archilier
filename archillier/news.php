<?php 

/*
 * Template name: News
 */

get_header(); 

	$news = get_category_by_slug('news')->term_id;
	$news_args = array( 'category' => $news, 'posts_per_page' => -1 );
	$news_posts = get_posts( $news_args );

?>
</div>
<nav id="sub">
	<ul class="content-wrapper">
		<li>
			<button id="media">Media</button>
		</li>
		<li>
			<button id="press">Press</button>
		</li>
		<li>
			<button id="events">Events</button>
		</li>
		<li class="date-list">
			<ul>
				<?php 
					foreach( $news_posts as $post ) : setup_postdata( $post );

						$post_year = get_the_date('Y');

						echo '<li data-id="' . $post_year . '" class="' . $post_year . '"><button id="' . $post_year . '">' . $post_year . '</button></li>';

					endforeach;
					wp_reset_postdata();
				?>
			</ul>
		</li>
		<li>
			<button id="dates">Dates</button>
		</li>
		<li>
			<button id="all">All</button>
		</li>
	</ul>
</nav>

<div class="content-wrapper">
<div class="posts-container">
	<ul class="posts masonry">
		<li class="grid-sizer"></li>
		<?php 	

			foreach ( $news_posts as $post ) : setup_postdata( $post );

				$post_categories = get_the_category( $post );

				$thumb_proportions = get_field( 'thumbnail_proportions' );
				$thumb_class = strtolower( $thumb_proportions );
				$bg_image = wp_get_attachment_image_src( get_post_thumbnail_id(), 'single-post-thumbnail' );
				$post_preview = get_field( 'post_preview' );
				$post_year = get_the_date('Y');

		?>

		<li class="post grid-item <?php echo $post_year . " "; if ( !has_post_thumbnail() ) { echo 'no-img'; } else { echo 'img '; } foreach ($post_categories as $category) { $category_name = $category->slug; echo $category_name . " "; } ?>">
			<a href="<?php the_permalink(); ?>" class="post-inner">
				<?php echo the_post_thumbnail( 'large' ); ?>
				<div class="post-meta">
					<div class="post-date">
						<?php the_date( 'j F Y' ); ?>
					</div>
					<div class="post-title">
						<?php the_title(); ?>
					</div>
					<div class="post-preview">
						<?php echo $post_preview; ?>
					</div>
				</div>
			</a>
		</li>

		<?php 

			endforeach; 
			wp_reset_postdata();

		?>
	</ul>
</div>

<?php get_footer(); ?>

