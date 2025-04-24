<?php
/*
Plugin Name: E-commerce Website
Plugin URI: https://example.com/ecommerce-website
Description: A simple e-commerce website plugin for WordPress.
Version: 1.0.0
Author: Michael Shepherd
Author URI: https://example.com
License: GPL3
License URI: https://www.gnu.org/licenses/gpl-3.0.html
Text Domain: ecommerce-website
Domain Path: /languages
*/

// Enqueue styles and scripts
function ecommerce_api_enqueue_assets() {
    wp_enqueue_style('bootstrap-css', 'https://cdn.jsdelivr.net/npm/bootstrap@5.0.1/dist/css/bootstrap.min.css');
    wp_enqueue_style('ecommerce-style', plugin_dir_url(__FILE__) . 'assets/css/style.min.css');
    wp_enqueue_script('jquery');
    wp_enqueue_script('bootstrap-js', 'https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js', array('jquery'), null, true);
    wp_enqueue_script('ecommerce-modal-handler', plugin_dir_url(__FILE__) . 'assets/js/modal-handler.js', array('jquery'), null, true);
    wp_enqueue_script('ecommerce-account-handler', plugin_dir_url(__FILE__) . 'assets/js/account-handler.js', array('jquery'), null, true);
}
add_action('wp_enqueue_scripts', 'ecommerce_api_enqueue_assets');

// Add cart and login modals to the footer
function ecommerce_api_add_modals() {
    include plugin_dir_path(__FILE__) . 'templates/cart-modal.php';
    include plugin_dir_path(__FILE__) . 'templates/login-modal.php';
}
add_action('wp_footer', 'ecommerce_api_add_modals');

// Register account page shortcode
//[account_page]
function ecommerce_api_account_shortcode() {
    ob_start();
    include plugin_dir_path(__FILE__) . 'templates/account-template.php';
    return ob_get_clean();
}
add_shortcode('account_page', 'ecommerce_api_account_shortcode');

// Register product shortcode
//[product id="1"]
function ecommerce_api_product_shortcode($atts) {
    $atts = shortcode_atts(array(
        'id' => '',
    ), $atts);

    // Fetch product data from API
    $response = wp_remote_get('https://fakestoreapi.com/products/' . $atts['id']);
    if (is_wp_error($response)) {
        return '<p>Unable to fetch product data.</p>';
    }

    $product = json_decode(wp_remote_retrieve_body($response), true);

    if (empty($product)) {
        return '<p>Product not found.</p>';
    }

    ob_start();
    ?>
    <div class="product-card">
        <img src="<?php echo esc_url($product['image']); ?>" alt="<?php echo esc_attr($product['title']); ?>" class="img-fluid">
        <h3><?php echo esc_html($product['title']); ?></h3>
        <p><?php echo esc_html($product['description']); ?></p>
        <p>Price: $<?php echo esc_html($product['price']); ?></p>
        <button class="btn btn-primary add-to-cart" data-id="<?php echo esc_attr($product['id']); ?>">Add to Cart</button>
    </div>
    <?php
    return ob_get_clean();
}
add_shortcode('product', 'ecommerce_api_product_shortcode');