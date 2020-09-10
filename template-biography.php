<?php
/*
Template Name: Biography
*/
?>

<?php get_header();?>

<?php get_template_part('includes/section','sidebarnav');?>

<div id="content-section">
	<div id="biography-div">
		<?php the_content();?>
	</div>	
</div>

<?php get_footer();?>