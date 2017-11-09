<?php
/*
Plugin Name: CodesWholesale Adaptive spread
Description: Automatic spread based on product prices for CodesWholesale for WooCommerce
Version: 1.0.0
Author: Olav Småriset
*/

add_filter('codeswholesale_calculate_spread', 'calculateSpreadCustom', 10, 3);

/**
 * Update price and stock.
 *
 * When CW send request or when post is updated.
 * @param double $priceWithSpread
 * @param array $spreadParams
 * @param double $price
 * @return float
 */
function calculateSpreadCustom($priceWithSpread, $spreadParams, $price) {
    // Return price with fixed spread if spread type is not adaptive
    if ($spreadParams['cwSpreadType'] == 0) {
        return $priceWithSpread;
    }

    if ($price >= 40) {
        $priceSpread = 10;
    } elseif ($price >= 35) {
        $priceSpread = 15;
    } elseif ($price >= 30) {
        $priceSpread = 20;
    } elseif ($price >= 25) {
        $priceSpread = 25;
    } elseif ($price >= 20) {
        $priceSpread = 30;
    } elseif ($price >= 15) {
        $priceSpread = 35;
    } elseif ($price >= 10) {
        $priceSpread = 40;
    } elseif ($price >= 5) {
        $priceSpread = 45;
    } elseif ($price < 5) {
        $priceSpread = 50;
    }

    $price = $price + ($price / 100 * $priceSpread);
    return round($price, 2);
}