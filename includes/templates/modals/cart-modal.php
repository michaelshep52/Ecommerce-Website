<?php
// templates/modal/cart-modal.php
?>
<div id="cart-modal" class="ecommerce-modal" style="display: none;">
    <div class="modal-content">
        <span class="close-modal" data-close="cart-modal">&times;</span>
        <h2>Your Cart</h2>
        <div class="modal-cart-items">
            <!-- Cart items will be listed here dynamically -->
        </div>
        <p>Total: <span class="modal-cart-total">$0.00</span></p>
        <button class="go-to-checkout" data-modal="checkout-modal">Proceed to Checkout</button>
    </div>
</div>
