<?php
/*
Template Name: Works
*/
?>


<?php get_header();?>

<?php get_template_part('includes/section','sidebarnav');?>

<div id="content-section">

	<div id="works-div">
		
		<?php
		    $args = array(
		        'post_type' => 'post',
		        'order' => 'ASC'
 		    );

		    $post_query = new WP_Query($args);

		    if($post_query->have_posts() ) {
		        while($post_query->have_posts() ) {
		            $post_query->the_post();
		            ?>
		         
		            <li>
		            	<a href=<?php the_permalink();?>> 
		            		<img src="<?php the_post_thumbnail_url('full');?>">
		            	</a>
		            	<div class=image-padding></div>

		            	<a href=<?php the_permalink();?>> 
		            		<div class="single-title-div">
		            			<p><?php the_title() ;?></p>
		            		</div>
		            	</a>
		            </li>

		            <?php

		            }
		        }
		?>
		<?php wp_reset_query() ?>

	</div>

</div>

</div></div>

<?php get_footer();?>