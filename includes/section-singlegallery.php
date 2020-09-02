<div class="single-gallery-div">

		<?php

	    	if ( $gallery = get_post_gallery( get_the_ID(), false ) ) :
	      
	        	foreach ( $gallery['src'] AS $src ) {
	                    ?>
	                    <div class="mySlides">
							<img src="<?php echo $src; ?>">
						</div>                
	        	<?php
        		}
        	endif;
        ?>

        <div class="gallery-nav-div">
        	<div>
		    	<a class="prev" onclick="plusSlides(-1)">&#10094;</a>
		    </div>

		    <div>
		    	<a class="next" onclick="plusSlides(1)">&#10095;</a>
		    </div>
	    </div>

		</div>
		<br>

		<script>
		var slideIndex = 1;
		showSlides(slideIndex);

		function plusSlides(n) {
		  showSlides(slideIndex += n);
		}

		function currentSlide(n) {
		  showSlides(slideIndex = n);
		}

		function showSlides(n) {
			console.log(n)
			var i;
	        var slides = document.getElementsByClassName("mySlides");
	        console.log(slides)
		    if (n > slides.length) {slideIndex = 1}    
		    if (n < 1) {slideIndex = slides.length}
		    for (i = 0; i < slides.length; i++) {
		        slides[i].style.display = "none";  
		    }
		    slides[slideIndex-1].style.display = "block";  
		}
		</script>

	</div>