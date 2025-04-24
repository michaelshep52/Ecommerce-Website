<?php
// templates/checkout.php
?>
<section id="checkout" class="ecommerce-section" style="display: none;">
    <h2>Checkout</h2>
    <form class="checkout-form">
        <label for="full-name">Full Name</label>
        <input type="text" id="full-name" name="full-name" required>

        <label for="email">Email Address</label>
        <input type="email" id="email" name="email" required>

        <label for="card">Card Number</label>
        <input type="text" id="card" name="card" required>

        <label for="expiry">Expiry Date</label>
        <input type="text" id="expiry" name="expiry" placeholder="MM/YY" required>

        <label for="cvc">CVC</label>
        <input type="text" id="cvc" name="cvc" required>

        <button type="submit" class="place-order">Place Order</button>
    </form>
</section>
