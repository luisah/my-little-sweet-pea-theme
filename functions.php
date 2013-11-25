<?php
/**
 * A safe way of adding javascripts to a WordPress generated page.
 */
if (!is_admin())
    add_action('wp_enqueue_scripts', 'responsive_child_js');

if (!function_exists('responsive_child_js')) {

    function responsive_child_js () {
        // JavaScript at the bottom for fast page loading.
        wp_enqueue_style( 'ls-css', get_stylesheet_directory_uri() . '/css/liquid-slider.css');
		wp_enqueue_script( 'jquery-easing', get_stylesheet_directory_uri() . '/js/jquery.easing.1.3.js', array('jquery'), '', true );
		wp_enqueue_script( 'jquery-touchSwipe', get_stylesheet_directory_uri() . '/js/jquery.touchSwipe.min.js', array('jquery-easing'), '', true );
		wp_enqueue_script( 'jquery-ls', get_stylesheet_directory_uri() . '/js/jquery.liquid-slider.min.js', array('jquery-touchSwipe'), '', true );
		wp_enqueue_script( 'script', get_stylesheet_directory_uri() . '/js/script.js', array('jquery', 'jquery-ui-core', 'jquery-ui-widget', 'jquery-ui-accordion'), '', true );
    }

}

// Disable media queries
function remove_media_queries() {

    wp_dequeue_style( 'responsive-media-queries' );

}

add_action( 'wp_enqueue_scripts', 'remove_media_queries', 20 );

if ( function_exists( 'add_image_size' ) ) { 
	add_image_size( 'homepage-thumb', 340, 340, true ); //(cropped)
	add_image_size( 'page-header', 99999, 156 );
    add_image_size( 'blog-thumb', 480, 360 );
}

/**
 * WooCommerce
 *
 * Unhook/Hook the WooCommerce single product template
 */

function single_product_rearrangement() {
    remove_action( 'woocommerce_single_product_summary', 'woocommerce_template_single_title', 5 );
	remove_action( 'woocommerce_single_product_summary', 'woocommerce_template_single_price', 10 );
	remove_action( 'woocommerce_single_product_summary', 'woocommerce_template_single_excerpt', 20 );
	remove_action( 'woocommerce_single_product_summary', 'woocommerce_template_single_meta', 40 );
	remove_action( 'woocommerce_single_product_summary', 'woocommerce_template_single_sharing', 50 );

    add_action( 'woocommerce_single_product_summary', 'woocommerce_template_single_title', 5 );
	add_action( 'woocommerce_single_product_summary', 'woocommerce_template_single_price', 10 );
	add_action( 'woocommerce_single_product_summary', 'woocommerce_template_single_sharing', 20 );
	add_action( 'woocommerce_single_product_summary', 'woocommerce_template_single_excerpt', 40 );
	add_action( 'woocommerce_single_product_summary', 'woocommerce_template_single_meta', 50 );
}

add_action( 'after_setup_theme', 'single_product_rearrangement' );

/**
 * WooCommerce
 *
 * Unhook sidebar
 */
remove_action( 'woocommerce_sidebar', 'woocommerce_get_sidebar', 10);

/**
 * WooCommerce
 *
 * Unhook/Hook the WooCommerce Wrappers
 */

function responsive_child_theme_setup() {
    remove_action('woocommerce_before_main_content', 'responsive_woocommerce_wrapper', 10);
    remove_action('woocommerce_after_main_content', 'responsive_woocommerce_wrapper_end', 10);

    add_action('woocommerce_before_main_content', 'responsive_child_woocommerce_wrapper', 10);
    add_action('woocommerce_after_main_content', 'responsive_child_woocommerce_wrapper_end', 10);
 
    function responsive_child_woocommerce_wrapper() {
      echo '<div id="content-woocommerce" class="grid col-940">';
    }
 
    function responsive_child_woocommerce_wrapper_end() {
      echo '</div><!-- end of #content-woocommerce -->';
    }
}

add_action( 'after_setup_theme', 'responsive_child_theme_setup' );

add_action( 'pre_get_posts', 'custom_pre_get_posts_query' );
 
function custom_pre_get_posts_query( $q ) {
 
    if ( ! $q->is_main_query() ) return;
    if ( ! $q->is_post_type_archive() ) return;
    
    if ( ! is_admin() && is_shop() ) {
 
        $q->set( 'tax_query', array(array(
            'taxonomy' => 'product_cat',
            'field' => 'slug',
            'terms' => array( 'gift-cards' ), // Don't display products in the knives category on the shop page
            'operator' => 'NOT IN'
        )));
    
    }
 
    remove_action( 'pre_get_posts', 'custom_pre_get_posts_query' );
 
}

?>