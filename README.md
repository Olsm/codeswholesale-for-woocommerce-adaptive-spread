# CodesWholesale Adaptive spread
Automatic spread based on product prices for CodesWholesale for WooCommerce

## Requirements
Codeswholesale for Woocommerce plugin 2.0

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

```

### Upload and install the plugin in wordpress
1. Download git repository as zip.
2. Go to wordpress admin -> plugins and upload the plugin.
3. Activate plugin.