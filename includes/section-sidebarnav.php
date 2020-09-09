<div id="content-menu">
	
	<div id="heike-head"><a href="<?php echo get_site_url();?>">HEIKE<br> BARANOWSKY</a></div>

	<ul>
		<li class="main-nav" id="main-news">
			<a href="<?php echo get_site_url();?>/news">NEWS</a>
		</li>

		<li class="main-nav" id="main-works">
			<a href="<?php echo get_site_url();?>/works">WORKS</a>

				<ul class="sub-nav" id="sub-works">
				
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

		<li class="main-nav" id="main-exhibition-views">
			<a href="<?php echo get_site_url();?>/exhibition-views">EXHIBITION VIEWS</a>

				<ul class="sub-nav" id="sub-exhibition-views">
				
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

		<li class="main-nav" id="main-texts">
			<a href="<?php echo get_site_url();?>/texts">TEXTS</a>
		</li>

		<li class="main-nav" id="main-biography">
			<a href="<?php echo get_site_url();?>/biography">BIOGRAPHY</a>
		</li>

		<li class="main-nav" id="main-contact">
			<a href="<?php echo get_site_url();?>/contact">CONTACT</a>
		</li>
	</ul>
	
</div>