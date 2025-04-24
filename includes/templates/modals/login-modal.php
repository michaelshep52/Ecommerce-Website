<div class="modal fade" id="loginModal" tabindex="-1" aria-labelledby="loginModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="loginModalLabel">Sign In / Register</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <form id="loginForm">
                    <div class="mb-3">
                        <label for="email" class="form-label">Email address</label>
                        <input type="email" class="form-control" id="email" placeholder="name@example.com">
                    </div>
                    <div class="mb-3">
                        <label for="password" class="form-label">Password</label>
                        <input type="password" class="form-control" id="password" placeholder="Password">
                    </div>
                    <button type="submit" class="btn btn-primary">Sign In</button>
                </form>
                <hr>
                <p>Don't have an account? <a href="#">Register here</a>.</p>
            </div>
        </div>
    </div>
</div>
<?php
// templates/modal/login-modal.php
?>
<div id="login-modal" class="ecommerce-modal" style="display: none;">
    <div class="modal-content">
        <span class="close-modal" data-close="login-modal">&times;</span>
        <h2>Ecommerce Storefront Login</h2>
        <form class="modal-login-form">
            <label for="modal-login-email">Email</label>
            <input type="email" id="modal-login-email" name="email" required>

            <label for="modal-login-password">Password</label>
            <input type="password" id="modal-login-password" name="password" required>

            <button type="submit">Log In</button>
        </form>
        <hr>
<!-- Register template and modals need to be created for this -->
        <p>Don't have an account? <a href="#">Register here</a>.</p>
    </div>
</div>
