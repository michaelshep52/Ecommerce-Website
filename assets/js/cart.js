document.addEventListener("DOMContentLoaded", () => {
    const cartSection = document.querySelector("#cart");
    const cartItemsContainer = document.querySelector(".cart-items");
    const cartTotalDisplay = document.querySelector(".cart-total");

    const cartModal = document.querySelector("#cart-modal");
    const modalItemsContainer = document.querySelector(".modal-cart-items");
    const modalTotalDisplay = document.querySelector(".modal-cart-total");

    const apiEndpoint = API_CONFIG.cart;

    async function fetchCart() {
        try {
            const response = await fetch(apiEndpoint);
            if (!response.ok) throw new Error("Failed to fetch cart");
            const cartData = await response.json();
            renderCart(cartData);
            renderModalCart(cartData);
        } catch (error) {
            console.error(error);
            cartItemsContainer.innerHTML = "<p>Unable to load cart.</p>";
            modalItemsContainer.innerHTML = "<p>Unable to load cart.</p>";
        }
    }

    function renderCart(cartData) {
        cartItemsContainer.innerHTML = "";
        let total = 0;

        cartData.items.forEach(item => {
            total += item.price * item.quantity;

            const itemElement = document.createElement("div");
            itemElement.classList.add("cart-item");

            itemElement.innerHTML = `
                <p>${item.title} x${item.quantity}</p>
                <p>$${(item.price * item.quantity).toFixed(2)}</p>
            `;

            cartItemsContainer.appendChild(itemElement);
        });

        cartTotalDisplay.textContent = `$${total.toFixed(2)}`;
    }

    function renderModalCart(cartData) {
        modalItemsContainer.innerHTML = "";
        let total = 0;

        cartData.items.forEach(item => {
            total += item.price * item.quantity;

            const itemElement = document.createElement("div");
            itemElement.classList.add("modal-cart-item");

            itemElement.innerHTML = `
                <p>${item.title} x${item.quantity}</p>
                <p>$${(item.price * item.quantity).toFixed(2)}</p>
            `;

            modalItemsContainer.appendChild(itemElement);
        });

        modalTotalDisplay.textContent = `$${total.toFixed(2)}`;
    }

    // Initial fetch
    fetchCart();
});
