<?php
// templates/account.php
?>

<section id="account" class="ecommerce-section" style="display: none;">
    <h2>My Account</h2>
    <p>Welcome back! Here’s your account summary.</p>
    <ul class="account-details" id="account-display">
        <li><strong>User Name:</strong> <span id="account-username">doejohn</span></li>
        <li><strong>Name:</strong> <span id="account-name">John Doe</span></li>
        <li><strong>Email:</strong> <span id="account-email">john@example.com</span></li>
        <li><strong>Subscription:</strong> <span id="account-subscription">Unlimited Monthly</span></li>
        <li><strong>Phone Number:</strong> <span id="account-phoneNumber">123-456-7890</span></li>
        <li><strong>Street Address:</strong> <span id="account-streetAddress">123 Main St, Anytown, USA</span></li>
        <li><strong>City:</strong> <span id="account-city">Anytown</span></li>
        <li><strong>Zip Code:</strong> <span id="account-zipCode">12345</span></li>
    </ul>

    <button class="btn btn-lg btn-success update-account-btn" onclick="toggleUpdateForm()">Update Account</button>

    <form id="account-update-form" action="" method="post" style="display: none; margin-top: 1em;">
        <h3>Update Account Information</h3>
        <ul class="account-details">
            <li><label><strong>User Name:</strong> <input type="text" name="username" value="doejohn"></label></li>
            <li><label><strong>Name:</strong> <input type="text" name="name" value="John Doe"></label></li>
            <li><label><strong>Email:</strong> <input type="email" name="email" value="john@example.com"></label></li>
            <li><label><strong>Subscription:</strong> <input type="text" name="subscription" value="Unlimited Monthly"></label></li>
            <li><label><strong>Phone Number:</strong> <input type="text" name="phoneNumber" value="123-456-7890"></label></li>
            <li><label><strong>Street Address:</strong> <input type="text" name="streetAddress" value="123 Main St, Anytown, USA"></label></li>
            <li><label><strong>City:</strong> <input type="text" name="city" value="Anytown"></label></li>
            <li><label><strong>Zip Code:</strong> <input type="text" name="zipCode" value="12345"></label></li>
        </ul>
        <button type="submit" class="btn btn-primary">Save Changes</button>
    </form>

    <a href="#logout" class="ecommerce-link" data-view="logout">Logout</a>
</section>
