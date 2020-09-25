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

// Load specific Style Sheet
function wpse_enqueue_page_template_styles() {
    if ( is_page_template( 'template-texts.php' ) ) {
        wp_enqueue_style( 'template-texts', get_stylesheet_directory_uri() . '/css/texts.css' );
    }
}
add_action( 'wp_enqueue_scripts', 'wpse_enqueue_page_template_styles' );

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

/* Add nav styling */
function load_nav_script() {
 
    global $post; 
 
    // register our main script but do not enqueue it yet
    wp_register_script( 'highlight_nav', get_template_directory_uri() . '/js/highlight_nav.js', array('jquery') );
 
    wp_localize_script( 'highlight_nav', 'highlight_params', array(
        'post_slug' => $post->post_name,
        'post_type' => $post->post_type,
        'categories' => get_the_category($post->ID)
    ) );

    wp_enqueue_script('highlight_nav');
}
add_action( 'wp_enqueue_scripts', 'load_nav_script' );

/* Add infinite scrolling functionality for news page*/
function load_more_scripts() {
 
    global $wp_query; 
 
    // register our main script but do not enqueue it yet
    wp_register_script( 'loadmore_news', get_template_directory_uri() . '/js/loadmore_news.js', array('jquery') );
 
    // now the most interesting part
    // we have to pass parameters to myloadmore.js script but we can get the parameters values only in PHP
    // you can define variables directly in your HTML but I decided that the most proper way is wp_localize_script()
    wp_localize_script( 'loadmore_news', 'loadmore_params', array(
        'ajaxurl' => site_url() . '/wp-admin/admin-ajax.php', // WordPress AJAX
        'max_page' => $wp_query->max_num_pages
    ) );

    wp_enqueue_script( 'loadmore_news' );
}
 
add_action( 'wp_enqueue_scripts', 'load_more_scripts' );

/* AJAX Handler */
function loadmore_ajax_handler(){
 
    // prepare our arguments for the query
    $args = json_decode( stripslashes( $_POST['query'] ), true );

    $args['paged'] = $_POST['page'] + 1; // we need next page to be loaded
    $args['post_status'] = 'publish';

    // it is always better to use WP_Query but not here
    query_posts( $args );
    if( have_posts() ) :
 
        // run the loop
        while( have_posts() ): the_post();

            get_template_part('includes/section','newsblocks');
 
        endwhile;
 
    endif;
    die; // here we exit the script and even no wp_reset_query() required!
}
 
add_action('wp_ajax_loadmore', 'loadmore_ajax_handler'); // wp_ajax_{action}
add_action('wp_ajax_nopriv_loadmore', 'loadmore_ajax_handler'); // wp_ajax_nopriv_{action}