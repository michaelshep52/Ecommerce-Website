# Ecommerce-Website
Custom Ecommerce website powered by an external API.

=== Ecommerce Website ===
Contributors: Michael Shepherd  
Tags: Ecommerce, API, integration  
Requires at least: 5.0  
Tested up to: 6.5  
Requires PHP: 7.4  
Stable tag: 1.0.2  
License: GPLv2  
License URI: https://www.gnu.org/licenses/gpl-2.0.html  

A plugin to connect to Store API and display or manage services in WordPress.

---

## Installation

1. Download the plugin zip file.
2. Go to your WordPress admin dashboard.
3. Navigate to **Plugins → Add New**.
4. Click **Upload Plugin**, choose the zip file, and click **Install Now**.
5. After the installation, click **Activate Plugin**.

Alternatively, manually install the plugin:
- Extract the zip and upload the `Ecommerce-Website` folder to your `wp-content/plugins/` directory.
- Activate it via the **Plugins** page in the WordPress dashboard.

---

## Usage

1. Create a new page or post in WordPress.
2. Add the following shortcode to display the product data:
   ```plaintext
   [ecommerce_storefront]
   ```

---

## Changelog

### 1.0.2 - 2025-04-30
- **Updated `index.html`:**
  - Added `#account` section with placeholder user info.
  - Added `#cart-modal` modal for cart details.
  - Included API configuration script for dynamic endpoints.
  - Linked additional JavaScript files for functionality (`products.js`, `cart.js`, `user.js`, `categories.js`).
- **Updated `assets/js/init.js`:**
  - Implemented dynamic section switching based on hash navigation.
  - Added functionality for opening and closing the cart modal.
- **Updated `assets/js/cart.js`:**
  - Added dynamic rendering of cart items and totals in both the main cart section and modal.
  - Integrated API calls to fetch cart data.
- **Updated `assets/js/products.js`:**
  - Added functionality to fetch and display products dynamically from the API.
  - Implemented "Add to Cart" functionality with API integration.
- **Updated `assets/js/user.js`:**
  - Added functionality to fetch and update user account details dynamically.
  - Included form toggling for account updates.
- **Updated `assets/js/categories.js`:**
  - Added functionality to fetch and display product categories dynamically.
- **Updated `assets/css/style.css`:**
  - Enhanced styles for product cards, cart items, and modal layouts.
  - Added responsive design improvements for tablets and desktops.
- **Updated `includes/templates/account.php`:**
  - Added a detailed account summary section with update functionality.
- **Updated `includes/templates/cart.php`:**
  - Enhanced cart section to dynamically display cart items and totals.
- **Updated `includes/templates/checkout.php`:**
  - Improved checkout form layout and validation.
- **Updated `includes/templates/login.php`:**
  - Enhanced login form with better structure and placeholders.
- **Updated `includes/templates/navigation.php`:**
  - Added links for login and logout modals.
- **Updated `includes/config/settings.php`:**
  - Added dynamic API endpoint configuration for JavaScript.

### 1.0.1 - 2025-04-17
- Initial public release.

---

## Upgrade Notice

### 1.0.2
- Added dynamic API integration for products, cart, and user data.
- Enhanced UI/UX with modals and responsive design improvements.
- Ensure you clear your browser cache after updating to load the latest assets.

### 1.0.1
- Initial release with functionality to fetch product data and display via shortcode.