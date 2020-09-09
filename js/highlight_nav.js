jQuery(function highlight_nav($) {
	var post_slug = highlight_params.post_slug
	var firstA = document.querySelector("#main-" + post_slug + " > a:first-of-type");
	firstA.setAttribute("style", "text-decoration: underline");

	var sub_nav = document.getElementById('sub-' + post_slug);
	if (sub_nav !== null) {
		sub_nav.setAttribute("style", "display : block");
	}
});