<?php
/**
 * Empty cart page
 *
 * @author 		WooThemes
 * @package 	WooCommerce/Templates
 * @version     2.0.0
 */

if ( ! defined( 'ABSPATH' ) ) exit; // Exit if accessed directly

?>

<p class="purple"><?php _e( 'You have 0 items in your cart!', 'woocommerce' ) ?></p>

<?php do_action('woocommerce_cart_is_empty'); ?>

<p><a class="button grid-right" href="<?php echo get_permalink(woocommerce_get_page_id('shop')); ?>"><?php _e( 'continue shopping', 'woocommerce' ) ?></a></p>