<?php

	/*
	 * Template Name: Contact
	 */

	get_header();

?>

</div>

<nav id="sub-page">
	<ul class="content-wrapper">
		<li>
			<a href="#careers">Join</a>
		</li>
		<li>
			<a class="active" href="#studios">Studios</a>
		</li>
	</ul>
</nav>

<div class="content-wrapper narrow">

<div class="main active" id="studios">
	<div class="studios-inner">
		<div class="contact-map-wrapper">
			<img src="<?php bloginfo('url'); ?>/wp-content/themes/archillier/img/map-contact.svg" alt="Archilier" />	
			<a data-city="nyc" class="contact-hover" id="contact-china" href="https://www.google.com/maps/place/GIRDEAR+%EF%BC%88Siping+Road%EF%BC%89,+Wujiaochang,+Yangpu,+Shanghai,+China,+200433/@31.2984574,121.5087071,14.22z/data=!4m2!3m1!1s0x35b273c2ea16dc0f:0xbb091437369adb21" target="_blank"></a>
			<a data-city="shanghai" class="contact-hover" id="contact-nyc" href="https://www.google.com/maps/place/589+8th+Ave,+New+York,+NY+10018/@40.7271371,-74.0633676,11z/data=!3m1!4b1!4m2!3m1!1s0x89c259acdec357a3:0x25fd7e9975e1d4d8" target="_blank"></a>
		</div>
		<div class="address-wrapper">
			<div class="address" id="nyc">
				<a href="https://www.google.com/maps/place/589+8th+Ave,+New+York,+NY+10018/@40.7271371,-74.0633676,11z/data=!3m1!4b1!4m2!3m1!1s0x89c259acdec357a3:0x25fd7e9975e1d4d8" target="_blank">
					<h1>New York City</h1>
					<p>
						589 8th Avenue, 11th floor <br />
						New York, NY 10018 <br />
						T: 212 564 4080 <br />
						<!--T/F: 212 564 4077 <br />-->
						<span class="email-copy">info@archilier.com</span>
					</p>
				</a>
			</div>
			<div class="address" id="shanghai">
				<a href="https://www.google.com/maps/place/GIRDEAR+%EF%BC%88Siping+Road%EF%BC%89,+Wujiaochang,+Yangpu,+Shanghai,+China,+200433/@31.2984574,121.5087071,14.22z/data=!4m2!3m1!1s0x35b273c2ea16dc0f:0xbb091437369adb21" target="_blank">
					<h1>Shanghai</h1>
					<p>
						1758 Siping Road <br />
						Shanghai 200433 <br />
						T: 21 6147 2749 <br />
						<!--T/F: 21 6147 2746 <br />-->
						<span class="email-copy">info@archilier.com</span>
					</p>
				</a>
			</div>
		</div>
	</div>
</div>

<div class="main" id="careers">
	<div class="careers-inner" style="background:url('<?php echo get_field('careers_background'); ?>') center center no-repeat; background-size:cover;"></div>
	<?php get_template_part( 'includes/contact', 'careers' ); ?>	
</div>


<?php get_footer(); ?>