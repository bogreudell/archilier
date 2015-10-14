<?php 

	/*
	 * Template name: Home
	 */

	get_header(); 

	$wrapper_bg1 = get_field('wrapper_bg');
	$wrapper_bg2 = get_field('wrapper_bg_2');
	$wrapper_bg3 = get_field('wrapper_bg_3');
	$wrapper_bg = array($wrapper_bg1, $wrapper_bg2, $wrapper_bg3);
	$projects_bg = get_field('projects_bg');
	$profile_bg = get_field('profile_bg');
	$contact_bg = get_field('contact_bg');
	$news_bg = get_field('news_bg');
	$process_bg = get_field('process_bg');

?>

<div class="index-links" style="background:url('<?php echo $wrapper_bg[array_rand($wrapper_bg)]; ?>') center center no-repeat;">
	<a href="<?php bloginfo('url'); ?>/projects" class="index-link" id="projects">
		<div class="index-link-inner" style="background:url('<?php echo $projects_bg; ?>') center center no-repeat;">
			<div class="index-link-container">
				<p>projects</p>
			</div>
		</div>
	</a>
	<a href="<?php bloginfo('url'); ?>/profile" class="index-link" id="profile">
		<div class="index-link-inner" style="background:url('<?php echo $profile_bg; ?>') center center no-repeat;">
			<div class="index-link-container">
				<p>profile</p>
			</div>
		</div>
	</a>
	<a href="<?php bloginfo('url'); ?>/contact" class="index-link" id="contact">
		<div class="index-link-inner" style="background:url('<?php echo $contact_bg; ?>') center center no-repeat;">
			<div class="index-link-container">
				<p>contact</p>
			</div>
		</div>
	</a>
	<a href="<?php bloginfo('url'); ?>/news" class="index-link" id="news">
		<div class="index-link-inner" style="background:url('<?php echo $news_bg; ?>') center center no-repeat;">
			<div class="index-link-container">
				<p>news</p>
			</div>
		</div>
	</a>
	<a href="<?php bloginfo('url'); ?>/process" class="index-link" id="process">
		<div class="index-link-inner" style="background:url('<?php echo $process_bg; ?>') center center no-repeat;">
			<div class="index-link-container">
				<p>process</p>
			</div>
		</div>
	</a>
</div>

<?php //echo do_shortcode('[test_contact_form]'); ?>

<?php get_footer(); ?>