<div id="content-menu">
	
	<div id="heike-head"><a href="http://heike.test">Heike Baranowsky</a></div>

	<ul>
		<li class="main-nav">
			<a href="<?php get_site_url();?>/news">News</a>
		</li>

		<li class="main-nav">
			<a href="<?php get_site_url();?>/works">Works</a>

				<ul class="sub-nav">
				
					<?php
						$args = array(
						    'post_type' => 'post',
						    'order_by' => 'date',
							'order' => 'DESC',
							'category_name' => 'Work'
						 	);

						$post_query = new WP_Query($args);

						if($post_query->have_posts() ) {
							while($post_query->have_posts() ) {
								$post_query->the_post();
						    ?>
								         
						    <li><a href=<?php the_permalink();?>> 
						    <?php the_title() ;?></a></li>

						    <?php
								            }
						    } wp_reset_query();
					?>
															
				</ul>
			
		</li>

		<li class="main-nav">
			<a href="<?php get_site_url();?>/exhibition-views">Exhibition Views</a>

				<ul class="sub-nav">
				
					<?php
						$args = array(
						    'post_type' => 'post',
						    'order-by' => 'date',
							'order' => 'DESC',
							'category_name' => 'Exhibition Views'
						 	);

						$post_query = new WP_Query($args);

						if($post_query->have_posts() ) {
							while($post_query->have_posts() ) {
								$post_query->the_post();
						    ?>
								         
						    <li><a href=<?php the_permalink();?>> 
						    <?php the_title() ;?></a></li>

						    <?php
								            }
						    } wp_reset_query();
					?>
															
				</ul>
			
		</li>

		<li class="main-nav">
			<a href="<?php get_site_url();?>/texts">Texts</a>
		</li>

		<li class="main-nav">
			<a href="<?php get_site_url();?>/biography">Biography</a>
		</li>

		<li class="main-nav">
			<a href="<?php get_site_url();?>/contact">Contact</a>
		</li>
	</ul>
	
</div>