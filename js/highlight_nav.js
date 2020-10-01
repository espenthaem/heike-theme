jQuery(function highlight_nav($) {
	/* Function to change the display type of the appropriate sub-nav menu
		based on either the slug of the page, or the post category
	*/
	if (highlight_params.post_type == 'page') {
		var post_slug = highlight_params.post_slug
	}
	else if (highlight_params.post_type == 'post'){
		var post_slug = highlight_params.categories[0].slug
		// Catch category and page naming discrepancy
		if (post_slug == "work") {
			post_slug = "works"
		}
		
		// Style corresponding sub-nav link
		var sub_nav_link = document.querySelectorAll("a[href^='" + highlight_params.post_link + "']");
		if (sub_nav_link !== null) {
			sub_nav_link[0].setAttribute("style", "color: #C0C0C0;");
		}

	}

	var firstA = document.querySelector("#main-" + post_slug + " > a:first-of-type");
	firstA.setAttribute("style", "text-decoration: underline");

	var sub_nav = document.getElementById('sub-' + post_slug);
	if (sub_nav !== null) {
		sub_nav.setAttribute("style", "display : block");
	}

});