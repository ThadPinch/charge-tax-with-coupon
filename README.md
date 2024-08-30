# Woo Charge Tax on Pre Coupon Subtotal

**Plugin Name:** Woo Charge Tax on Pre Coupon Subtotal  
**Description:** This WooCommerce plugin ensures that tax is calculated on the full subtotal before any coupons are applied, even when coupons cover the entire amount. This guarantees that customers still pay the appropriate tax based on the original subtotal, maintaining accurate tax calculations.

**Version:** 1.0  
**Author:** Thaddeus Pinch  

## Table of Contents
- [Description](#description)
- [Usage](#usage)
- [How It Works](#how-it-works)
- [Customization](#customization)
- [Changelog](#changelog)
- [License](#license)

## Description

Woo Charge Tax on Pre Coupon Subtotal is a WooCommerce plugin designed to address a common issue where tax calculations are reduced when coupons are applied, potentially lowering the total tax paid by the customer. This plugin ensures that tax is calculated based on the subtotal before any discounts or coupons are applied, enforcing accurate tax collection.

## Usage

Once installed and activated, the plugin automatically calculates and applies the appropriate tax based on the original subtotal before coupons. No additional configuration is required.

### Example Scenario

- **Cart Subtotal:** $100
- **Coupon Applied:** $100
- **Tax Rate:** 8.1%

Normally, the tax would be $0 after the coupon is applied, but with this plugin, the tax will be $8.10 (8.1% of $100), ensuring the correct tax amount is charged.

## How It Works

The plugin hooks into the WooCommerce cart fee calculation process:

1. **Calculate the Original Subtotal:** The plugin first calculates the tax that should be charged based on the original subtotal before any coupons are applied.
2. **Compare with Current Tax:** It then compares this amount with the tax that WooCommerce is planning to charge after the coupon is applied.
3. **Apply the Difference:** If there’s a difference, the plugin adds a custom fee to the cart equal to the difference, ensuring that the customer pays the correct tax amount.

## Customization

While the plugin is set to calculate tax based on a fixed rate of 8.1%, you can modify this rate directly in the plugin code by changing the `0.081` value in the `custom_cart_fee` function.

Example:
```php
$tax_rate = 0.081; // Change this value to your desired tax rate
```

## Changelog

### 1.0
- Initial release of Woo Charge Tax on Pre Coupon Subtotal.
- Ensures tax is calculated on the full subtotal before discounts.

## License

This plugin is licensed under the [GPLv2 or later](https://www.gnu.org/licenses/gpl-2.0.html). You are free to modify and distribute this plugin as per the terms of this license.

