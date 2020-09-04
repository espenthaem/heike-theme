<?php get_header();?>


<?php get_template_part('includes/section','sidebarnav');?>

<div id="content-section">

	<?php if(have_posts() ): while(have_posts() ): the_post();?>
				
			<div class="justify-content-center align-items-center"> 


				<?php if(has_post_thumbnail()):?>

					<img src="<?php the_post_thumbnail_url('thumbnail');?>" alt="<?php the_title();?>" width=full>

				<?php endif;?>

				<div class="blog-content">				
					<h3><?php the_title();?></h3>

					<?php the_excerpt();?>

					<a href="<?php the_permalink();?>">Read More </a>
				</div>
			</div>

	<?php endwhile; else: endif;?>

</div>


<?php get_footer();?>