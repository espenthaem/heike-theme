jQuery(function($){ // use jQuery code inside this to avoid "$ is not defined" error
	
	$('.loadmore').click(function(){
		//custom query on front-page.php
		var button = $(this),
		    data = {
			'action': 'loadmore',
			'query': posts_myajax,
			'page' : current_page_myajax
		};

		console.log(JSON.parse(posts_myajax))

		$.ajax({
			url : loadmore_params.ajaxurl, // AJAX handler
			data : data,
			type : 'POST',
			beforeSend : function ( xhr ) {
				button.text('Loading...'); // change the button text, you can also add a preloader image
			},
			success : function( data ){
				if( data ) { 
					button.text( 'More posts' ).prev().after(data); // insert new posts
					current_page_myajax++;
 
					if ( current_page_myajax == max_page_myajax )
						button.remove(); // if last page, remove the button
				} else {
					//button.remove(); // if no data, remove the button as well
				}
			}
		});
	});	

});