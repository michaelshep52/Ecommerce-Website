<?php
// Prevent direct access
defined('ABSPATH') || exit;

// Define the base API URL
$apiBase = "https://fakestoreapi.com/";

// Define specific API endpoints
$apiEndpoints = [
    'products'   => $apiBase . "products",
    'categories' => $apiBase . "products/categories",
    'cart'       => $apiBase . "carts",
    'users'      => $apiBase . "users",
];
?>
<script>
    const API_CONFIG = <?php echo json_encode($apiEndpoints, JSON_UNESCAPED_SLASHES | JSON_HEX_TAG); ?>;
</script>
