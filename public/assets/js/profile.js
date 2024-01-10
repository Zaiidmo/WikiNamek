document.getElementById('profile-menu-toggler').addEventListener('click',function(){
    document.getElementById('profile-menu').classList.toggle('hidden');
})
document.getElementById('sidebar-toggle-button').addEventListener('click', function() {
    document.getElementById('sidebar').classList.toggle('hidden');
    document.getElementById('main').classList.toggle('ml-64');
})
document.body.addEventListener('click', function (event) {
    const profileMenu = document.getElementById('profile-menu');
    const profileMenuToggler = document.getElementById('profile-menu-toggler');

    // Check if the click event target is outside of the profile-menu and profile-menu-toggler
    if (!profileMenu.contains(event.target) && !profileMenuToggler.contains(event.target)) {
        profileMenu.classList.add('hidden');
    }
})
document.body.addEventListener('click', function (event) {
    const sidebar = document.getElementById('sidebar');
    const sidebarToggleButton = document.getElementById('sidebar-toggle-button');

    // Check if the click event target is outside of the profile-menu and profile-menu-toggler
    if (!sidebar.contains(event.target) && !sidebarToggleButton.contains(event.target)) {
        sidebar.classList.add('hidden');
        document.getElementById('main').classList.remove('ml-64');
    }
})
document.getElementById('editprofile').addEventListener('click',function(){
    document.getElementById('modification-modal').classList.toggle('hidden');
})

document.querySelectorAll('.editwiki').forEach(function (button) {
    button.addEventListener('click', function () {
        // Extract the wiki ID from the data-id attribute
        var wikiId = this.getAttribute('data-id');
        // Build the corresponding modal ID
        var modalId = 'wiki-modal-' + wikiId;
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
