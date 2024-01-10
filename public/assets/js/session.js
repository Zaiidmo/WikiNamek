
document.getElementById('sidebar-toggle-button').addEventListener('click', function() {
    document.getElementById('sidebar').classList.toggle('hidden');
    // document.getElementById('main').classList.toggle('ml-64');
})

document.body.addEventListener('click', function (event) {
    const sidebar = document.getElementById('sidebar');
    const sidebarToggleButton = document.getElementById('sidebar-toggle-button');

    // Check if the click event target is outside of the profile-menu and profile-menu-toggler
    if (!sidebar.contains(event.target) && !sidebarToggleButton.contains(event.target)) {
        sidebar.classList.add('hidden');
    }
})