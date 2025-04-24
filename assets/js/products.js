document.addEventListener("DOMContentLoaded", () => {
    const productsContainer = document.querySelector("#products-container");

    if (!productsContainer) {
        console.warn("Products container not found. Ensure the container with ID 'products-container' exists.");
        return;
    }

    const apiEndpoint = API_CONFIG.products;
    const cartEndpoint = API_CONFIG.cartAdd; 

    // Fetch products from the API
    async function fetchProducts() {
        productsContainer.innerHTML = "<p>Loading products...</p>";
        try {
            const response = await fetch(apiEndpoint);
            if (!response.ok) throw new Error(`Error fetching products: ${response.statusText}`);

            const products = await response.json();
            displayProducts(products);
        } catch (error) {
            console.error(error);
            productsContainer.innerHTML = "<p>Failed to load products. Please try again later.</p>";
        }
    }

    // Render products into the DOM
    function displayProducts(products) {
        productsContainer.innerHTML = "";

        if (products.length === 0) {
            productsContainer.innerHTML = "<p>No products available at the moment.</p>";
            return;
        }

        products.forEach(product => {
            const productElement = document.createElement("div");
            productElement.classList.add("product");

            productElement.innerHTML = `
                <img src="${product.image}" alt="${product.title}" class="product-image" />
                <h3 class="product-name">${product.title}</h3>
                <p class="product-price">$${product.price.toFixed(2)}</p>
                <button class="add-to-cart" data-id="${product.id}">Add to Cart</button>
            `;

            productsContainer.appendChild(productElement);
        });
    }

    // Add to cart with fetch
    async function addToCart(productId) {
        try {
            const response = await fetch(cartEndpoint, {
                method: "POST",
                headers: { "Content-Type": "application/json" },
                body: JSON.stringify({ productId, quantity: 1 })
            });

            if (!response.ok) throw new Error("Failed to add product to cart");
            const result = await response.json();
            alert("Added to cart!");
        } catch (error) {
            console.error("Add to cart error:", error);
            alert("Could not add product to cart.");
        }
    }

    // Use event delegation for dynamic buttons
    productsContainer.addEventListener("click", (e) => {
        if (e.target.classList.contains("add-to-cart")) {
            const productId = e.target.dataset.id;
            addToCart(productId);
        }
    });

    // Kick it off
    fetchProducts();
});
