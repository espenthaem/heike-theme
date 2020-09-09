<?php
/*
Template Name: Works
*/
?>

<?php get_header();?>

<?php get_template_part('includes/section','sidebarnav');?>

<div id="content-section">

	<?php
	    $args = array(
	        'post_type' => 'post',
	        'order-by' => 'date',
	        'order' => 'DESC',
	        'category_name' => 'Work'
		    );

	    $post_query = new WP_Query($args);

	    if($post_query->have_posts() ) {
	        while($post_query->have_posts() ) {
	            $post_query->the_post();
	            ?>
	         
	            <li>
                    <div class="single-title-div">
                            <a href=<?php the_permalink();?>><p><?php the_title() ;?></p></a>
                    </div>
                    

	            	<a href=<?php the_permalink();?>> 
	            		<img class="works-page-image" src="<?php the_post_thumbnail_url('full');?>">
	            	</a>

                    <div class="image-padding">
                    </div>

	            </li>

	            <?php

	            }
	        }
	?>
	<?php wp_reset_query() ?>

	
	
</div>

<?php get_footer();?>