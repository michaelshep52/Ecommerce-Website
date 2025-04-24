// Example for categories.js
document.addEventListener("DOMContentLoaded", () => {
    const categoriesContainer = document.querySelector('#categories-container');
    if (!categoriesContainer) {
    console.warn('Categories container not found.');
    } else {
    // Logic to populate categories
    }

    const apiEndpoint = API_CONFIG.categories;

    async function fetchCategories() {
        try {
            const response = await fetch(apiEndpoint);
            if (!response.ok) {
                throw new Error(`Error fetching categories: ${response.statusText}`);
            }
            const categories = await response.json();
            displayCategories(categories);
        } catch (error) {
            console.error(error);
            categoriesContainer.innerHTML = "<p>Failed to load categories.</p>";
        }
    }

    function displayCategories(categories) {
        categoriesContainer.innerHTML = categories.map(category => `<p>${category}</p>`).join("");
    }

    fetchCategories();
});