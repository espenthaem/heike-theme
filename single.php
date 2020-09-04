<?php get_header();?>
	
<?php get_template_part('includes/section','sidebarnav');?>

<div id="content-section">

	<div style="padding-top: 50px;">
    </div>

	<div class="single-title-div">
		<p><?php the_title();?></p>
	</div>


	<!-- Load feature image or vimeo link based on Work vs. View -->
	<?php        
		if(has_term('Work', 'category', $post)) { ?>

			<div class="single-image-div">
				<img src="<?php the_post_thumbnail_url('full');?>" alt="<?php the_title();?>">
			</div>

		<?php }
		else if(has_term('Exhibition Views', 'category', $post)) { ?>

			<div style="padding-top: 20px">
			</div>

			<div class="single-video-div">
				<iframe src="<?php echo get_post_meta(get_the_ID(), 'vimeo-link', true);?>?title=0&byline=0&portrait=0" frameborder="0" allow="autoplay; fullscreen" allowfullscreen></iframe>
			</div>

		<?php }; 	
	?>

	<div class="single-text-div">
		
		<p><?php the_content();?></p> 

	</div>

	<!--Load Gallery if category is Work -->
	<?php        
		if(has_term('Work', 'category', $post)) { 
			get_template_part('includes/section','singlegallery');
		} 
	?>

	
</div>

<?php get_footer();?>