jQuery(document).ready(function ($) {
    $('.add-to-cart').on('click', function () {
        const productId = $(this).data('id');
        alert('Product ' + productId + ' added to cart!');
        // Add AJAX logic to update the cart dynamically
    });
});