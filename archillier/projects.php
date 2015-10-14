<?php 

/*
 * Template name: Projects
 */

get_header(); ?>
</div>
<nav id="sub">
	<ul class="content-wrapper">
		<li>
			<button id="master-plan">Master Plan</button>
		</li>
		<li>
			<button id="mix-use">Mix Use</button>
		</li>
		<li>
			<button id="retail">Retail</button>
		</li>
		<li>
			<button id="hospitality">Hospitality</button>
		</li>
		<li>
			<button id="all">All</button>
		</li>
	</ul>
</nav>

<div class="content-wrapper">

<div data-section="master-plan" class="main active">
	<?php get_template_part( 'includes/projects', 'gallery' ); ?>
</div>

<!--<div data-section="hospitality" class="main">
	<?php // get_template_part( 'includes/projects', 'hospitality' ); ?>
</div>

<div data-section="retail" class="main">
	<?php // get_template_part( 'includes/projects', 'retail' ); ?>
</div>

<div data-section="mix-use" class="main">
	<?php // get_template_part( 'includes/projects', 'mix-use' ); ?>
</div>-->


<?php get_footer(); ?>

