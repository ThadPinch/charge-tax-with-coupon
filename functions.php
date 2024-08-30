<?php
/**
 * Plugin Name: Woo Charge Tax on Pre Coupon Subtotal
 * Description: Ensures tax is calculated on the full subtotal even when coupons cover the entire amount.
 * Version: 1.0
 * Author: Thaddeus Pinch
 */

if (!defined('ABSPATH')) {
    exit; // Exit if accessed directly
}

// Add a dynamic fee (8.1% of the subtotal) to the cart, after coupons have been applied
add_action('woocommerce_cart_calculate_fees', 'custom_cart_fee', 9999);
// 
function custom_cart_fee($cart) {
    if (is_admin() && !defined('DOING_AJAX')) {
        return;
    }

    // Calculate the fee as 8.1% of the subtotal before discounts
    $subtotal = $cart->get_subtotal();
    $tax_that_should_be_charged = $subtotal * 0.081;
    $total_tax = floatval($cart->get_total_tax());
    $total_discounts = $cart->get_cart_discount_total();
    if ($total_discounts > 0) {
        $total_taxable = $subtotal - $total_discounts;
        $amount_already_being_taxed = $total_taxable * 0.081;
        $tax_difference = $tax_that_should_be_charged - $amount_already_being_taxed;
        $cart->add_fee(__('Tax (remainder from subtotal)', 'custom-fee-plugin'), $tax_difference, false, '');
    }

}
