<?php 

	/*
	 * Template name: Profile Page
	 */

	get_header(); 

	if ( have_posts() ) : while ( have_posts() ) : the_post();

		$aside_img_1 = get_field('profile_aside_img_1');
		$aside_img_2 = get_field('profile_aside_img_2');
		$aside_img_3 = get_field('profile_aside_img_3');
		$aside_img_4 = get_field('profile_aside_img_4');
		$profile_content = get_field('profile_content');

		$team_aside_img_1 = get_field('team_aside_1');
		$team_aside_img_2 = get_field('team_aside_2');
		$team_aside_img_3 = get_field('team_aside_3');
		$team_aside_img_4 = get_field('team_aside_4');
		$team_content = get_field('team_content');

?>

</div>

<nav id="sub-page">
	<ul class="content-wrapper">
		<li>
			<!--<button id="team">Team</button>-->
			<a href="#team">Team</a>
		</li>
		<li>
			<!--<button class="active" id="profile">Profile</button>-->
			<a class="active" href="#header">Profile</a>
		</li>
	</ul>
</nav>

<div class="content-wrapper narrow">
	<!-- remove data-section if auto-scroll interaction is confirmed -->	
	<div class="main active" data-section="profile" id="profile">
		<div class="content">
			<aside class="text-overlay text">
				<div class="post-title">
					<p class="aside-subheader">Archilier</p>
					<h2><?php the_title(); ?></h2>
					<button class="toggle-overlay">Hide Info</button>
				</div>
				<div class="aside-content">
					<?php echo $profile_content; ?>
				</div>
			</aside>
			<div data-lightbox="<?php echo $aside_img_1; ?>" class="lightbox_trigger  img-aside">
				<!-- do they want the option for four images? -->
				<img src="<?php echo $aside_img_1; ?>" alt="<?php the_title(); ?>" />
			</div>
		</div>
	</div>
	<!-- remove data-section if auto-scroll interaction is confirmed -->
	<div class="main" data-section="team" id="team">
		<div class="content">
			<aside class="text-overlay text">
				<div class="post-title">
					<p class="aside-subheader">Archilier</p>
					<h2>Team</h2>
					<button class="toggle-overlay">Hide Info</button>
				</div>
				<div class="aside-content">
					<?php echo $team_content; ?>
				</div>
			</aside>
			<div class="img-aside">
				<div class="lightbox_trigger first height-1" data-lightbox="<?php echo $team_aside_img_1; ?>" style="background:url('<?php echo $team_aside_img_1; ?>') center center no-repeat;"></div>
				<div class="lightbox_trigger second height-2" data-lightbox="<?php echo $team_aside_img_2; ?>" style="background:url('<?php echo $team_aside_img_2; ?>') center center no-repeat;"></div>
				<div class="lightbox_trigger third height-2" data-lightbox="<?php echo $team_aside_img_3; ?>" style="background:url('<?php echo $team_aside_img_3; ?>') center center no-repeat;"></div>
				<div class="lightbox_trigger fourth height-1" data-lightbox="<?php echo $team_aside_img_4; ?>" style="background:url('<?php echo $team_aside_img_4; ?>') center center no-repeat;"></div>
			</div>
		</div>
	</div>

<?php 

	endwhile; endif;

	get_footer(); 

?>