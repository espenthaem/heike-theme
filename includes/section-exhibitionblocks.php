<!-- Loops through exhibition posts and displays them in rows containing 2 posts each -->
<?php

$args = array(
    'category_name' => 'Exhibition Views',
    'order_by' => 'date',
    'order' => 'DESC'
);

$the_query = new WP_Query($args);

if ($the_query->have_posts()) {
	$counter = 0;  
	while ($the_query->have_posts()){
		$the_query->the_post(); 
		/* Open flex row div if first element */
		if ($counter % 2 == 0) { 
			echo '  <div class="views-row-div">';
		} ?>
		<!-- Fill exhibition block with the appropriate content -->
		<div class="views-single-div">
			
			<div class="single-title-div">
				<p><?php the_title();?></p>
			</div>

			<div style="padding-top: 20px;">
			</div>

			<div class="single-video-div">
				<iframe src="<?php echo get_post_meta(get_the_ID(), 'vimeo-link', true);?>?title=0&byline=0&portrait=0"> </iframe>
			</div>

			<a href="<?php the_permalink(); ?>">
				<div class="single-text-div">
					<div style="height: 50px; display:block; overflow:hidden;">
					<?php the_excerpt(); ?>
					</div>
				</div>
			</a>

			<div style="padding-top: 20px;">
			</div>

		</div>

		<?php
		/* Close flex row div after second element */
		if ($counter % 2 == 1) { 
			echo '  </div>';
		} 
		/* Update counter */
		++$counter;
    }      
	} ?>

<?php wp_reset_postdata(); ?>