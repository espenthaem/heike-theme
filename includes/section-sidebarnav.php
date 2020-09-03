<div id="content-menu">
	
	<div id="heike-head"><a href="http://heike.test">Heike Baranowsky</a></div>

	<ul>
		<li class="main-nav">
			<a href="http://heike.test/news">News</a>
		</li>

		<li class="main-nav">
			<a href="http://heike.test/works">Works</a>

				<ul class="sub-nav">
				
					<?php
						$args = array(
						    'post_type' => 'post',
							'order' => 'ASC',
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
			<a href="http://heike.test/exhibition-videos">Exhibition Views</a>

				<ul class="sub-nav">
				
					<?php
						$args = array(
						    'post_type' => 'post',
							'order' => 'ASC',
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
			<a href="http://heike.test/texts">Texts</a>
		</li>

		<li class="main-nav">
			<a href="http://heike.test/biography">Biography</a>
		</li>

		<li class="main-nav">
			<a href="http://heike.test/contact">Contact</a>
		</li>
	</ul>
	
</div>