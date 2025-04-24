document.addEventListener("DOMContentLoaded", () => {
    const sections = document.querySelectorAll(".ecommerce-section");
    const navLinks = document.querySelectorAll(".ecommerce-nav a[data-view]");

    function showSection(id) {
        sections.forEach(section => {
            section.style.display = "none";
        });

        navLinks.forEach(link => {
            link.classList.remove("active");
        });

        const target = document.querySelector(`#${id}`);
        const activeLink = document.querySelector(`.ecommerce-nav a[data-view="${id}"]`);

        if (target) target.style.display = "block";
        if (activeLink) activeLink.classList.add("active");
    }

    navLinks.forEach(link => {
        link.addEventListener("click", (e) => {
            e.preventDefault();
            const target = link.getAttribute("data-view");
            if (target) {
                window.location.hash = target; // So they can bookmark or refresh to the same tab
            }
        });
    });

    window.addEventListener("hashchange", () => {
        const hash = window.location.hash.replace("#", "");
        if (hash) showSection(hash);
    });

    const initialView = window.location.hash.replace("#", "") || sections[0]?.id;
    if (initialView) showSection(initialView);


    // --- Cart Modal Functionality ---
    const cartModal = document.querySelector("#cart-modal");
    const cartButton = document.querySelector("#cart-button");
    const closeButton = document.querySelector("#close-cart-modal");

    if (cartButton && cartModal && closeButton) {
        cartButton.addEventListener("click", () => {
            cartModal.classList.add("open");
        });

        closeButton.addEventListener("click", () => {
            cartModal.classList.remove("open");
        });
    }
});
