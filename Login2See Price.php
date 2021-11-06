<?php
/**
 * Plugin Name: Login2See Price For WooCommerce
 * Description: This Plugin is Designed That You Have To Login To See Price 
 * Version: 1.1
 * Tested up to: 5.8.1
 * Author: UATech10
 * Author URI: https://github.com/UATech10
 * License: GPL v3 or later
 * License URI: https://www.gnu.org/licenses/gpl-3.0.html
 */

add_filter( 'woocommerce_get_price_html', 'UATech10_hide_price_addcart_not_logged_in', 9999, 2 );
 
function UATech10_hide_price_addcart_not_logged_in( $price, $product ) {
   if ( ! is_user_logged_in() ) { 
      $price = '<div><a href="' . get_permalink( wc_get_page_id( 'myaccount' ) ) . '">' . __( 'Please Login To Price', 'UATech10' ) . '</a></div>';
      remove_action( 'woocommerce_after_shop_loop_item', 'woocommerce_template_loop_add_to_cart', 10 );
      remove_action( 'woocommerce_single_product_summary', 'woocommerce_template_single_add_to_cart', 30 );
   }
   return $price;
}
