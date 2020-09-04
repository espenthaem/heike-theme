<?php


// Load Style Sheets
function load_css()
{

	wp_register_style('bootstrap', get_template_directory_uri() . '/css/bootstrap.min.css', array(), false, 'all' );
	wp_enqueue_style('bootstrap');

	wp_register_style('main', get_template_directory_uri() . '/css/main.css', array(), false, 'all' );
	wp_enqueue_style('main');



}
add_action('wp_enqueue_scripts', 'load_css');

// Load Javascript
function load_js()
{
	wp_enqueue_script('jquery');

	wp_register_script('bootstrap', get_template_directory_uri() . '/js/bootstrap.min.js', 'jquery', false, true);
	wp_enqueue_script('bootstrap');

}
add_action('wp_enqueue_scripts', 'load_js');

// Theme Options
add_theme_support('menus');
add_theme_support('post-thumbnails');

// Custom Image Sizes
add_image_size('work-large', 800, 600, false);

/**
 * Remove the output of the first gallery
 *
 * @param string $output
 * @param array $attr
 * @return string $output
 */
function remove_the_first_gallery( $output, $attr )
{
    // Run only once
    remove_filter( current_filter(), __FUNCTION__ );

    // Override the first gallery output        
    return '<!-- gallery 1 was here -->';   // Must be non-empty.
}

add_filter( 'post_gallery', 'remove_the_first_gallery', 10, 2 );

/* Change excerpt length */
function mytheme_custom_excerpt_length( $length ) {
    return 30;
}
add_filter( 'excerpt_length', 'mytheme_custom_excerpt_length', 999 );

/* Define excerpt length by character and avoids truncating the last word */
function get_excerpt($limit, $source = null){

    $excerpt = $source == "content" ? get_the_content() : get_the_excerpt();
    $excerpt = preg_replace(" (\[.*?\])",'',$excerpt);
    $excerpt = strip_shortcodes($excerpt);
    $excerpt = strip_tags($excerpt);
    $excerpt = substr($excerpt, 0, $limit);
    $excerpt = substr($excerpt, 0, strripos($excerpt, " "));
    $excerpt = trim(preg_replace( '/\s+/', ' ', $excerpt));
    $excerpt = $excerpt.'[..]';
    return $excerpt;
}
