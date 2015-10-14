<?php 

	/*
	 * Template name: Process
	 */

	get_header(); 

	if ( have_posts() ) : while ( have_posts() ) : the_post();

		$workflow_aside_img_1 = get_field('workflow_aside_1');
		$workflow_aside_img_2 = get_field('workflow_aside_2');
		$workflow_aside_img_3 = get_field('workflow_aside_3');
		$workflow_aside_img_4 = get_field('workflow_aside_4');
		$workflow_content = get_field('workflow_content');

		$printing_aside_img_1 = get_field('printing_aside_1');
		$printing_aside_img_2 = get_field('printing_aside_2');
		$printing_aside_img_3 = get_field('printing_aside_3');
		$printing_aside_img_4 = get_field('printing_aside_4');
		$printing_content = get_field('printing_content');

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
				<!-- <button id="3d-printing">3D Printing</button> -->
				<a href="#3d-printing">3D Printing</a>
			</li>
			<li>
				<!-- <button class="active" id="workflow">Workflow</button> -->
				<a class="active" href="#header">Workflow</a>
			</li>
		</ul>
	</nav>

	<div class="content-wrapper">
	<!-- remove data-section if scrolling interaction confirmed -->	
	<div class="main active" data-section="workflow" id="workflow">
		<div class="content" id="">
			<aside class="text-overlay text">
				<div class="post-title">
					<p class="aside-subheader">Archilier</p>
					<h2>Workflow</h2>
					<button class="toggle-overlay">Hide Info</button>
				</div>
				<div class="aside-content">
					<?php echo $workflow_content; ?>
				</div>
			</aside>
			<div class="page-img">
				<div class="lightbox_trigger first height-1" data-lightbox="<?php echo $workflow_aside_img_1; ?>" style="background:url('<?php echo $workflow_aside_img_1; ?>') center center no-repeat;"></div>
				<div class="lightbox_trigger second height-2" data-lightbox="<?php echo $workflow_aside_img_2; ?>" style="background:url('<?php echo $workflow_aside_img_2; ?>') center center no-repeat;"></div>
				<div class="lightbox_trigger third height-2" data-lightbox="<?php echo $workflow_aside_img_3; ?>" style="background:url('<?php echo $workflow_aside_img_3; ?>') center center no-repeat;"></div>
				<div class="lightbox_trigger fourth height-1" data-lightbox="<?php echo $workflow_aside_img_4; ?>" style="background:url('<?php echo $workflow_aside_img_4; ?>') center center no-repeat;"></div>
			</div>
		</div>
	</div>
	<!-- remove data-section if scrolling interaction confirmed -->	
	<div class="main" data-section="3d-printing" id="3d-printing">
		<div class="content">
			<aside class="text-overlay text">
				<div class="post-title">
					<p class="aside-subheader">Archilier</p>
					<h2>3D Printing</h2>
					<button class="toggle-overlay">Hide Info</button>
				</div>
				<div class="aside-content">
					<?php echo $printing_content; ?>
				</div>
			</aside>
			<div class="page-img">
				<div class="lightbox_trigger first height-1" data-lightbox="<?php echo $printing_aside_img_1; ?>" style="background:url('<?php echo $printing_aside_img_1; ?>') center center no-repeat;"></div>
				<div class="lightbox_trigger second height-2" data-lightbox="<?php echo $printing_aside_img_2; ?>" style="background:url('<?php echo $printing_aside_img_2; ?>') center center no-repeat;"></div>
				<div class="lightbox_trigger third height-2" data-lightbox="<?php echo $printing_aside_img_3; ?>" style="background:url('<?php echo $printing_aside_img_3; ?>') center center no-repeat;"></div>
				<div class="lightbox_trigger fourth height-1" data-lightbox="<?php echo $printing_aside_img_4; ?>" style="background:url('<?php echo $printing_aside_img_4; ?>') center center no-repeat;"></div>
			</div>
		</div>
	</div>

<!--	<div class="main" data-section="team">
		<div class="content">
			<aside class="text aside-text">
				<div class="post-title">
					<p class="aside-subheader">Archilier</p>
					<h2>Team</h2>
				</div>
				<div class="aside-content">
					<?php//// echo $team_content; ?>
				</div>
			</aside>
			<div class="img-aside">
				<div class="first height-1" style="background:url('<?php //echo $team_aside_img_1; ?>') center center no-repeat;"></div>
				<div class="second height-2" style="background:url('<?php //echo $team_aside_img_2; ?>') center center no-repeat;"></div>
				<div class="third height-2" style="background:url('<?php //echo $team_aside_img_3; ?>') center center no-repeat;"></div>
				<div class="fourth height-1" style="background:url('<?php //echo $team_aside_img_4; ?>') center center no-repeat;"></div>
			</div>
		</div>
	</div>-->

<?php 

	endwhile; endif;

	get_footer(); 

?>