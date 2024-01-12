document.addEventListener("DOMContentLoaded", function() {
    // Get modal element
    const modal = document.getElementById("deleteModal");

    // Function to toggle the modal
    function toggleModal() {
        modal.classList.toggle("hidden");
    }

    // Attach click event to all buttons with class "deleteuser"
    const deleteButtons = document.querySelectorAll(".deleteUser");
    deleteButtons.forEach(function(button) {
        button.addEventListener("click", function(event) {
            event.preventDefault();
            // Get user ID from the data attribute
            const userId = button.getAttribute("data-user-id");
            console.log(userId);
            // Customize modal content based on the user ID if needed

            // Open the modal
            toggleModal();
        });
    });

    // Close modal when close button is clicked
    const closeButton = modal.querySelector("[data-modal-toggle='deleteModal']");
    closeButton.addEventListener("click", toggleModal);

    // Close modal when clicking outside the modal content
    modal.addEventListener("click", function(event) {
        if (event.target === modal) {
            toggleModal();
        }
    });
});