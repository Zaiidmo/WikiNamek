document.querySelectorAll('.editCategory').forEach(function (button) {
    button.addEventListener('click', function () {
        // Extract the wiki ID from the data-id attribute
        var catId = this.getAttribute('data-id');
        // Build the corresponding modal ID
        var modalId = 'cat-modal-' + catId;
        // Find the modal using the new ID
        var modal = document.getElementById(modalId);
        // Toggle the 'hidden' class for the modal
        if (modal) {
            modal.classList.toggle('hidden');
            var closeSpan = modal.querySelector('.close');

            // Add event listener to close the modal when clicking the close span
            if (closeSpan) {
                closeSpan.addEventListener('click', function () {
                    modal.classList.add('hidden');
                });
            }
        }
        
    });
});