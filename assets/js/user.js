document.addEventListener('DOMContentLoaded', () => {
    const updateBtn = document.querySelector('.update-account-btn');
    const updateForm = document.getElementById('account-update-form');
    const displayElements = {
        username: document.getElementById('account-username'),
        name: document.getElementById('account-name'),
        email: document.getElementById('account-email'),
        subscription: document.getElementById('account-subscription'),
        phoneNumber: document.getElementById('account-phoneNumber'),
        streetAddress: document.getElementById('account-streetAddress'),
        city: document.getElementById('account-city'),
        zipCode: document.getElementById('account-zipCode'),
    };

    const userId = getUserId(); 
    const apiEndpoint = `${API_CONFIG.users}/${userId}`;

    // Toggle form visibility
    if (updateBtn && updateForm) {
        updateBtn.addEventListener('click', () => {
            const isVisible = updateForm.style.display === 'block';
            updateForm.style.display = isVisible ? 'none' : 'block';
        });
    }

    // Fetch and display user data
    async function fetchUser() {
        try {
            const response = await fetch(apiEndpoint);
            if (!response.ok) throw new Error("Failed to fetch user data");
            const user = await response.json();

            // Populate display
            for (let key in displayElements) {
                if (user[key]) {
                    displayElements[key].textContent = user[key];
                }
            }

            // Populate form
            updateForm.querySelectorAll("input").forEach(input => {
                if (user[input.name]) {
                    input.value = user[input.name];
                }
            });
        } catch (error) {
            console.error("Error loading user data:", error);
        }
    }

    // Submit updated account info
    if (updateForm) {
        updateForm.addEventListener("submit", async (e) => {
            e.preventDefault();
            const formData = new FormData(updateForm);
            const data = Object.fromEntries(formData.entries());

            try {
                const response = await fetch(apiEndpoint, {
                    method: "POST",
                    headers: { "Content-Type": "application/json" },
                    body: JSON.stringify(data),
                });

                if (!response.ok) throw new Error("Failed to update account");
                const result = await response.json();
                alert("Account updated successfully!");

                // Re-fetch user to update displayed info
                fetchUser();
                updateForm.style.display = "none";
            } catch (error) {
                console.error("Update failed:", error);
                alert("Failed to update account. Please try again.");
            }
        });
    }

    // Initialize user data fetch
    fetchUser();
});
