<div class="single-news-container">


		<div class="single-image-div-news">
			<img src="<?php the_post_thumbnail_url('full');?>">
		</div>

	<div style="width: 75%; padding-left: 50px;">

		<div class="single-title-div">
			<p><?php the_title();?></p>
		</div>

		<div class="single-text-div single-text-div-news">
			<p><?php the_content();?></p> 
		</div>

	</div>

</div>