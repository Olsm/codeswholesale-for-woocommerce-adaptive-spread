<?php
/*
Plugin Name: CodesWholesale for WooCommerce Adaptive spread
Description: Automatic spread based on product prices for CodesWholesale for WooCommerce
Version: 1.0.0
Author: Olav Småriset
*/

add_filter('codeswholesale_calculate_spread', 'calculateSpreadCustom', 10, 2);

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