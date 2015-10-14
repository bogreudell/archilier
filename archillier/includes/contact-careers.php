<div class="blog-wrapper careers">
	<h1 id="available-positions">Available Positions</h1>
	<?php 

		$careers = get_category_by_slug('careers')->term_id;
		$careers_args = array( 'category' => $careers, 'posts_per_page' => -1 );
		$careers_posts = get_posts( $careers_args );

		foreach ( $careers_posts as $post ) : setup_postdata( $post );

			$post_id = $post->term_id;
            $post_categories = get_the_category($post_id);
			
			$location = get_field( 'position_location' );

	?>
	<div class="career-post">
		<div class="post-title">
			<h1 class="career-title"><?php the_title(); ?></h1>
			<p class="career-location"><?php echo $location; ?></p>
		</div>
		<div class="post-content">
			<?php the_content(''); ?>
		</div>
		<!--<strong class="apply-here"><a href="#">Apply Here</a></strong>-->
	</div>
	<?php 

		endforeach;
		wp_reset_postdata();

	?>
</div>
<div class="join-form">
	<h1>Join</h1>
	<form action="join">
		<p>
			<label for="first_name">First name*</label>
			<input type="text" name="first_name" class="width-1">
		</p>
		<p>
			<label for="last_name">Last name*</label>
			<input type="text" name="last_name" class="width-1">
		</p>
		<p>
			<label for="contact_number">Contact number including country and local area code*</label>
			<input type="text" name="contact_number" class="width-2">
		</p>
		<p>
			<label for="email_address">Email address*</label>
			<input type="text" name="email_address" class="width-1">
		</p>
		<p class="half margin">
			<label for="current_location">Current location*</label>
			<select name="current_location" class="width-3">
				<option>Please select</option>
			<select>
		</p>
		<p class="half">
			<label for="current_position">Current position</label>
			<input type="text" name="current_position" class="width-3">
		</p>
		<p class="half  margin">
			<label for="city">City*</label>
			<input type="text" name="city" class="width-3">
		</p>
		<p class="half">
			<label for="experience_years">Years of experience</label>
			<input type="text" name="experience_years" class="width-3">
		</p>
		<p>
			<label for="qualifications">Qualifications</label>
			<input type="text" name="qualifications" class="width-1">
		</p>
		<p>
			<label for="position">Position applied for*</label>
			<select name="current_location" class="width-1">
				<option>Please select</option>
			<select>
		</p>
		<p class="half margin">
			<label for="applied_location">Location applied for*</label>
			<select name="applied_location" class="width-3">
				<option>All locations</option>
			<select>
		</p>
		<p class="half">
			<label for="expected_salary">Expected salary</label>
			<input type="text" name="expected_salary" class="width-3">
		</p>
		<p>
			<label for="availability">Availability</label>
			<input type="text" name="availability" class="width-1">
		</p>
		<p>
			<label for="referral_source">Referral source</label>
			<select name="referral_source" class="width-1">
				<option>Please select</option>
			<select>
		</p>
		<p>
			<label for="upload_resume">Upload Resume*</label>
			<input name="upload_resume" type="file" value="choose file" class="width-1">
		</p>
		<!--<p>
			<label for="upload_portfolio">Upload Portfolio</label>
			<input name="upload_portfolio" type="file" value="choose file" class="width-1">
		</p>
		<p>If you apply for an architectual or landscape position, it is mandatory to upload your portfolio. Max file is 10mb. Accepted file types: pdf, doc, docx.</p>-->
		<p>
			<input type="submit" value="submit">
		</p>
	</form>
</div>