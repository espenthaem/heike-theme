<div id="single-gallery-div">

	<?php if(get_post_meta(get_the_ID(), 'vimeo-link', false ) ) { ?>
		<div class="single-video-div">
			<iframe src="<?php echo get_post_meta(get_the_ID(), 'vimeo-link', true);?>?title=0&byline=0&portrait=0"> </iframe>
		</div>
	<?php } ?>

	<?php

    	if ( $gallery = get_post_gallery( get_the_ID(), false ) ) :
      
        	foreach ( $gallery['src'] AS $src ) {
                    ?>
                    <div class="single-image-div">
						<img src="<?php echo $src; ?>">
					</div>                
        	<?php
    		}
    	endif;
    ?>

</div>