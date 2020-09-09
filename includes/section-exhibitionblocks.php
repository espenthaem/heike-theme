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
			?>
			<div class="views-row-div" id="row_<?php echo $counter / 2;?>">
			<?php
		} ?>
		<!-- Fill exhibition block with the appropriate content -->
		<div class="views-single-div"> 
			
			<div class="single-title-div">
				<p><?php the_title();?></p>
			</div>

			<div style="padding-top: 20px;">
			</div>

			<div class="single-video-div" style="display:block;">
				<?php 
				if (metadata_exists('post', get_the_ID(), 'vimeo-link')) {
					?>
					<iframe src="<?php echo get_post_meta(get_the_ID(), 'vimeo-link', true);?>?title=0&byline=0&portrait=0"> </iframe>
				<?php
				}?>
				
			</div>

			<a href="<?php the_permalink(); ?>">
				<div class="single-text-div">
					<div style="height: auto; display:block;">
					<?php echo get_excerpt(150); ?> 
					</div>
				</div>
			</a>

			<div style="padding-top: 20px;">
			</div>

		</div>

		<?php
		/* Close flex row div after second element */
		if ($counter % 2 == 1) { 
			?>
			</div>

			<!-- Force same title-div-height within the row using js */ -->
			<script>
				var row = document.getElementById('row_' + '<?php echo ($counter - 1) / 2;?>');
				var title_divs = row.getElementsByClassName('single-title-div');

				var max_div_height = Math.max(title_divs[0].clientHeight, title_divs[1].clientHeight);
				
				for (i=0; i<title_divs.length; ++i) {
					title_divs[i].setAttribute("style", "height:" + max_div_height + "px")
				}
			</script>


		<?php
		}?>
		
		<?php
		/* Update counter */
		++$counter;
    } 

} ?>

<?php wp_reset_postdata(); ?>