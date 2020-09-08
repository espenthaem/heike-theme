<?php
/*
Template Name: News
*/
?>

<?php get_header();?>

<?php get_template_part('includes/section','sidebarnav');?>

<div id="content-section">

	<div id="news-div">
	
		<?php
		    $args = array(
		        'post_type' => 'post',
		        'order-by' => 'date',
		        'order' => 'DESC',
		        'category_name' => 'News',
		        'posts_per_page' => 5
 		    );

		    $post_query = new WP_Query($args);

		    if($post_query->have_posts() ) {
		        while($post_query->have_posts() ) {
		            $post_query->the_post();
		            ?>
		         
		            <?php get_template_part('includes/section','newsblocks');?>

		            <?php

		            }
		        }
		?>

		<!-- Setup for infinite scrolling -->
		<?php if ($post_query->max_num_pages > 1) { // check if the max number of pages is greater than 1  ?>
			<button class="loadmore">More News</button>
		<?php } ?>
		
		<script>
			var posts_myajax = '<?php echo json_encode( $post_query->query_vars ) ?>',
   			current_page_myajax = 1,
    		max_page_myajax = <?php echo $post_query->max_num_pages ?>
		</script>

		<?php wp_reset_query();?>

	</div>
	
</div>

</div></div>

<?php get_footer();?>