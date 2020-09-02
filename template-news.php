<?php
/*
Template Name: News
*/
?>


<?php get_header();?>

<?php get_template_part('includes/section','sidebarnav');?>

<div id="content-section">

	
		<?php
		    $args = array(
		        'post_type' => 'post',
		        'order' => 'DESC',
		        'category_name' => 'News'
 		    );

		    $post_query = new WP_Query($args);

		    if($post_query->have_posts() ) {
		        while($post_query->have_posts() ) {
		            $post_query->the_post();
		            ?>
		         
		            <li>

		            	<div class="single-title-div">
							<p><?php the_title();?></p>
						</div>

						<div>
		            		<img src="<?php the_post_thumbnail_url('full');?>">
		            	</div>	

						<div class="single-text-div">
							<p><?php the_content();?></p> 
						</div>

						<div class="image-padding">
                        </div>

		            </li>

		            <?php

		            }
		        }
		?>
		<?php wp_reset_query() ?>
	

</div>

</div></div>

<?php get_footer();?>