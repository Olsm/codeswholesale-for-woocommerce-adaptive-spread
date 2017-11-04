# Adaptive spread for CodesWholesale for WooCommerce
Automatic spread based on product prices for CodesWholesale for WooCommerce

## Requirements
Codeswholesale for Woocommerce plugin

## Installation
### Add hooks to Codeswholesale for Woocommerce
These hooks must be added to Codeswholesale for Woocommerce plugin:

```php
class SpreadCalculator implements SpreadCalculatorInterface {
    public function calculateSpread(array $spreadParams, $price) {
        ...
        // add this filter at the bottom of this method
        return apply_filters("codeswholesale_calculate_spread", $priceSpread, $price);
    }
}

class WP_Update_Price_And_Stock implements UpdatePriceAndStockInterface {
    public function updateProduct($cwProductId, $quantity, $priceSpread) {
        ...
        if (...) {
            try {
                foreach (...) {
                    ...
                    $product->set_stock($quantity);
                    
                    // Put the following code here:

                    // Start
                    
                    $newPrice = round($priceSpread * $rateFL, 2);

                    if (apply_filters("codeswholesale_update_product_price", true, $post->ID, $newPrice)) {
                        update_post_meta($post->ID, '_price', $newPrice);
                        update_post_meta($post->ID, '_regular_price', $newPrice);
                    }
                    
                    // End

                    if ($quantity == 0) {
                    ...
                }

            } catch (..) {
                ...
            }
        }
    }
}

```

### Upload and install the plugin in wordpress
1. Download git repository as zip.
2. Go to wordpress admin -> plugins and upload the plugin.
3. Activate plugin.