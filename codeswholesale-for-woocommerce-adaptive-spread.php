<?php
/*
Plugin Name: Adaptive spread for CodesWholesale for WooCommerce
Description: Automatic spread based on product prices for CodesWholesale for WooCommerce
Version: 1.0.0
Author: Olav Småriset
*/

add_filter('codeswholesale_calculate_spread', 'calculateSpreadCustom', 10, 2);
add_filter('codeswholesale_update_product_price', 'updateProductPrice', 10, 3);

/**
 * Update price and stock.
 *
 * When CW send request or when post is updated.
 * @param double $priceSpread
 * @param double $price
 * @return double
 */
function calculateSpreadCustom($priceSpread, $price) {
    if ($price>=50) {
        $priceSpread = 5;
    } elseif ($price >= 45) {
        $priceSpread = 10;
    } elseif ($price >= 40) {
        $priceSpread = 15;
    } elseif ($price >= 35) {
        $priceSpread = 20;
    } elseif ($price >= 30) {
        $priceSpread = 25;
    } elseif ($price >= 25) {
        $priceSpread = 30;
    } elseif ($price >= 20) {
        $priceSpread = 35;
    } elseif ($price >= 15) {
        $priceSpread = 40;
    } elseif ($price >= 10) {
        $priceSpread = 45;
    } elseif ($price < 5) {
        $priceSpread = 50;
    }

    $price = $price + ($price / 100 * $priceSpread);
    return round($price, 2);
}

/**
 * @param true $doUpdatePrice
 * @param int $postId
 * @param double $newPrice
 * @return false
 */
function updateProductPrice($doUpdatePrice, $postId, $newPrice){
    if ($newPrice > 0) {
        update_post_meta($postId, '_price', $newPrice);
        update_post_meta($postId, '_sale_price', $newPrice);
    }
    return !$doUpdatePrice;
}