<?php
/*
Plugin Name: E-commerce Website
Plugin URI: https://example.com/ecommerce-website
Description: A simple e-commerce website plugin for WordPress.
Version: 1.0.1
Author: Michael Shepherd
Author URI: https://example.com
License: GPL3
License URI: https://www.gnu.org/licenses/gpl-3.0.html
Text Domain: ecommerce-website
Domain Path: /languages
*/

// Prevent direct access
defined('ABSPATH') || exit;

// Define plugin constants
define('ECOMMERCE_WEBSITE_PATH', plugin_dir_path(__FILE__));
define('ECOMMERCE_WEBSITE_URL', plugin_dir_url(__FILE__));

add_action('wp_enqueue_scripts', function() {
    wp_enqueue_style('ecommerce-website-style', ECOMMERCE_WEBSITE_URL . 'assets/css/style.css');
    wp_enqueue_script('ecommerce-website-script', ECOMMERCE_WEBSITE_URL . 'assets/js/init.js', [], false, true);

    // Localize API config for JavaScript
    wp_localize_script('ecommerce-website-script', 'API_CONFIG', [
        'products' => rest_url('ecommerce/v1/products'),
        'cart'     => rest_url('ecommerce/v1/cart'),
        'users'    => rest_url('ecommerce/v1/users'),
        // Add more endpoints as needed
    ]);
});


// Utility function to include templates
function ecommerce_template($file) {
    $path = ECOMMERCE_WEBSITE_PATH . 'templates/' . $file;
    if (file_exists($path)) {
        include $path;
    }
}

// Single shortcode that includes the entire storefront
add_shortcode('ecommerce_storefront', function() {
    ob_start();
    ecommerce_template('navigation.php');
    ecommerce_template('index.php');
    ecommerce_template('products.php');
    ecommerce_template('wishlist.php');
    ecommerce_template('cart.php');
    ecommerce_template('checkout.php');
    ecommerce_template('login.php');
    ecommerce_template('logout.php');
    ecommerce_template('account.php');

    // Modals
    ecommerce_template('modal/login-modal.php');
    ecommerce_template('modal/logout-modal.php');
    ecommerce_template('modal/checkout-modal.php');
    ecommerce_template('modal/cart-modal.php');

    return ob_get_clean();
});
