<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin - Dashboard</title>
    <meta name="keywords" content="HTML, CSS, Youcode, tailwindCSS, Wikinamek,Wiki, Wikis">
    <meta name="author" content="Zaiid Moumnii">
    <meta name="description" content="WikiNamek .. Your Gateway to infinit Insights">
    <link rel="stylesheet" href="public/assets/dist/output.css">
    <link rel="shortcut icon" href="<?= URL_DIR ?>public/assets/images/favicon.png" type="image/x-icon">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300&display=swap" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Salsa&display=swap" rel="stylesheet">
</head>

<body class="bg-gray-300 dark:bg-gray-900 text-gray-900 font-poppins">
    <?php
    include "../app/View/includes/navbar.php";
    ?>
    <!-- Dashboard Content -->
    <main id="main" class="px-28">
        <div class="pt-24 h-screen overflow-y-auto">
            <div class="container px-6 mx-auto grid">
                <h4 class="ml-16 mt-6 font-semibold font-poppins tracking-widest text-gray-700 dark:text-gray-200">
                    DASHBOARD
                </h4>
                <p class="ml-16 mb-6 text-gray-600 dark:text-gray-700">
                    Admin/Dashboard
                </p>
                <!-- Cards -->
                <div class="grid gap-10 mb-8 md:grid-cols-2 xl:grid-cols-3">
                    <!-- Card -->
                    <div id="users" class="flex items-center p-4 bg-white darl rounded-lg shadow-xs dark:bg-gray-800">
                        <div class="p-3 mr-4 rounded-full">
                            <span class="h-12 w-12 dark:bg-white bg-black rounded-full flex justify-center items-center">
                                <svg xmlns="http://www.w3.org/2000/svg" class="text-white dark:text-black" width="26" height="20" viewBox="0 0 30 24">
                                    <path fill="currentColor" d="M4.5 10.5C6.15469 10.5 7.5 9.15469 7.5 7.5C7.5 5.84531 6.15469 4.5 4.5 4.5C2.84531 4.5 1.5 5.84531 1.5 7.5C1.5 9.15469 2.84531 10.5 4.5 10.5ZM25.5 10.5C27.1547 10.5 28.5 9.15469 28.5 7.5C28.5 5.84531 27.1547 4.5 25.5 4.5C23.8453 4.5 22.5 5.84531 22.5 7.5C22.5 9.15469 23.8453 10.5 25.5 10.5ZM27 12H24C23.175 12 22.4297 12.3328 21.8859 12.8719C23.775 13.9078 25.1156 15.7781 25.4062 18H28.5C29.3297 18 30 17.3297 30 16.5V15C30 13.3453 28.6547 12 27 12ZM15 12C17.9016 12 20.25 9.65156 20.25 6.75C20.25 3.84844 17.9016 1.5 15 1.5C12.0984 1.5 9.75 3.84844 9.75 6.75C9.75 9.65156 12.0984 12 15 12ZM18.6 13.5H18.2109C17.2359 13.9688 16.1531 14.25 15 14.25C13.8469 14.25 12.7687 13.9688 11.7891 13.5H11.4C8.41875 13.5 6 15.9188 6 18.9V20.25C6 21.4922 7.00781 22.5 8.25 22.5H21.75C22.9922 22.5 24 21.4922 24 20.25V18.9C24 15.9188 21.5812 13.5 18.6 13.5ZM8.11406 12.8719C7.57031 12.3328 6.825 12 6 12H3C1.34531 12 0 13.3453 0 15V16.5C0 17.3297 0.670312 18 1.5 18H4.58906C4.88438 15.7781 6.225 13.9078 8.11406 12.8719Z" />
                                </svg>
                            </span>
                        </div>
                        <div>
                            <p class="mb-2 text-sm font-medium text-gray-600 dark:text-gray-400">
                                Total Users
                            </p>
                            <p class="text-lg font-semibold text-gray-700 dark:text-gray-200">
                                Statistics </p>
                        </div>
                    </div>
                    <div id="Authors" class="flex items-center p-4 bg-white rounded-lg shadow-xs dark:bg-gray-800">
                        <div class="p-3 mr-4 rounded-full">
                            <span class="h-12 w-12 border border-black bg-white rounded-full flex justify-center items-center">
                                <svg width="24" height="24" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                                    <path d="M12 4.354C12.5374 3.7447 13.2477 3.31351 14.0362 3.11779C14.8247 2.92208 15.6542 2.97112 16.4142 3.2584C17.1741 3.54568 17.8286 4.05757 18.2905 4.72596C18.7524 5.39435 18.9998 6.18754 18.9998 7C18.9998 7.81246 18.7524 8.60565 18.2905 9.27404C17.8286 9.94243 17.1741 10.4543 16.4142 10.7416C15.6542 11.0289 14.8247 11.0779 14.0362 10.8822C13.2477 10.6865 12.5374 10.2553 12 9.646M15 21H3V20C3 18.4087 3.63214 16.8826 4.75736 15.7574C5.88258 14.6321 7.4087 14 9 14C10.5913 14 12.1174 14.6321 13.2426 15.7574C14.3679 16.8826 15 18.4087 15 20V21ZM15 21H21V20C21.0001 18.9467 20.723 17.9119 20.1965 16.9997C19.6699 16.0875 18.9125 15.3299 18.0004 14.8032C17.0882 14.2765 16.0535 13.9992 15.0002 13.9992C13.9469 13.9991 12.9122 14.2764 12 14.803M13 7C13 8.06087 12.5786 9.07828 11.8284 9.82843C11.0783 10.5786 10.0609 11 9 11C7.93913 11 6.92172 10.5786 6.17157 9.82843C5.42143 9.07828 5 8.06087 5 7C5 5.93913 5.42143 4.92172 6.17157 4.17157C6.92172 3.42143 7.93913 3 9 3C10.0609 3 11.0783 3.42143 11.8284 4.17157C12.5786 4.92172 13 5.93913 13 7Z" stroke="#000000" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" />
                                </svg>
                            </span>
                        </div>
                        <div>
                            <p class="mb-2 text-sm font-medium text-gray-600 dark:text-gray-400">
                                Authors </p>
                            <p class="text-lg font-semibold text-gray-700 dark:text-gray-200">
                                Statistics </p>
                        </div>
                    </div>
                    <!-- Card -->
                    <div id="Readers" class="flex items-center p-4 bg-white rounded-lg shadow-xs dark:bg-gray-800">
                        <div class="p-3 mr-4 rounded-full">
                            <span class="h-12 w-12 border border-black bg-white rounded-full flex justify-center items-center">
                                <svg width="24" height="24" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                                    <path d="M12 4.354C12.5374 3.7447 13.2477 3.31351 14.0362 3.11779C14.8247 2.92208 15.6542 2.97112 16.4142 3.2584C17.1741 3.54568 17.8286 4.05757 18.2905 4.72596C18.7524 5.39435 18.9998 6.18754 18.9998 7C18.9998 7.81246 18.7524 8.60565 18.2905 9.27404C17.8286 9.94243 17.1741 10.4543 16.4142 10.7416C15.6542 11.0289 14.8247 11.0779 14.0362 10.8822C13.2477 10.6865 12.5374 10.2553 12 9.646M15 21H3V20C3 18.4087 3.63214 16.8826 4.75736 15.7574C5.88258 14.6321 7.4087 14 9 14C10.5913 14 12.1174 14.6321 13.2426 15.7574C14.3679 16.8826 15 18.4087 15 20V21ZM15 21H21V20C21.0001 18.9467 20.723 17.9119 20.1965 16.9997C19.6699 16.0875 18.9125 15.3299 18.0004 14.8032C17.0882 14.2765 16.0535 13.9992 15.0002 13.9992C13.9469 13.9991 12.9122 14.2764 12 14.803M13 7C13 8.06087 12.5786 9.07828 11.8284 9.82843C11.0783 10.5786 10.0609 11 9 11C7.93913 11 6.92172 10.5786 6.17157 9.82843C5.42143 9.07828 5 8.06087 5 7C5 5.93913 5.42143 4.92172 6.17157 4.17157C6.92172 3.42143 7.93913 3 9 3C10.0609 3 11.0783 3.42143 11.8284 4.17157C12.5786 4.92172 13 5.93913 13 7Z" stroke="#000000" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" />
                                </svg>
                            </span>
                        </div>
                        <div>
                            <p class="mb-2 text-sm font-medium text-gray-600 dark:text-gray-400">
                                Readers
                            </p>
                            <p class="text-lg font-semibold text-gray-700 dark:text-gray-200">
                                Statistics </p>
                        </div>
                    </div>
                    <!-- Card -->
                    <div id="Wikis" class="flex items-center p-4 bg-white rounded-lg shadow-xs dark:bg-gray-800">
                        <div class="p-3 mr-4 rounded-full">
                            <span class="h-12 w-12 dark:bg-white bg-black rounded-full flex justify-center items-center">
                                <svg xmlns="http://www.w3.org/2000/svg" width="30" height="30" viewBox="0 0 24 24" class="text-white dark:text-black">
                                    <path fill="currentColor" d="M5.615 20q-.69 0-1.152-.462Q4 19.075 4 18.385V5.615q0-.69.463-1.152Q4.925 4 5.615 4h12.77q.69 0 1.152.463q.463.462.463 1.152v12.77q0 .69-.462 1.152q-.463.463-1.153.463zM7.5 16.5h6v-1h-6zm0-4h9v-1h-9zm0-4h9v-1h-9z" />
                                </svg>
                            </span>
                        </div>
                        <div>
                            <p class="mb-2 text-sm font-medium text-gray-600 dark:text-gray-400">
                                Posted Wikis
                            </p>
                            <p class="text-lg font-semibold text-gray-700 dark:text-gray-200">
                                Statistics </p>
                        </div>

                    </div>
                    <!-- Card -->
                    <div id="Approved" class="flex items-center p-4 bg-white rounded-lg shadow-xs dark:bg-gray-800">
                        <div class="p-3 mr-4 rounded-full">
                            <span class="h-12 w-12 border border-black bg-white rounded-full flex justify-center items-center">
                                <svg xmlns="http://www.w3.org/2000/svg" width="30" height="30" viewBox="0 0 24 24">
                                    <path fill="none" stroke="currentColor" stroke-linecap="round" stroke-width="2" d="M19.548 7.267a2 2 0 1 0-3.096-2.533L8.666 14.25L6.2 12.4a2 2 0 0 0-2.4 3.2l3.233 2.425a3 3 0 0 0 4.122-.5z" />
                                </svg>
                            </span>
                        </div>
                        <div>
                            <p class="mb-2 text-sm font-medium text-gray-600 dark:text-gray-400">
                                Approved
                            </p>
                            <p class="text-lg font-semibold text-gray-700 dark:text-gray-200">
                                Statistics </p>
                        </div>
                    </div>
                    <!-- Card -->
                    <div id="Denied" class="flex items-center p-4 bg-white rounded-lg shadow-xs dark:bg-gray-800">
                        <div class="p-3 mr-4 rounded-full">
                            <span class="h-12 w-12 border border-black bg-white rounded-full flex justify-center items-center">
                                <svg xmlns="http://www.w3.org/2000/svg" width="30" height="30" viewBox="0 0 48 48">
                                    <path fill="currentColor" fill-rule="evenodd" d="M31.695 10.08a3 3 0 0 1 4.61 3.84L27.905 24l8.4 10.08a3 3 0 1 1-4.61 3.84L24 28.687l-7.695 9.235a3 3 0 1 1-4.61-3.841l8.4-10.08l-8.4-10.08a3 3 0 0 1 4.61-3.84L24 19.313zm2.945 1.152a1 1 0 0 0-1.408.128l-.768-.64l.768.64l-8.464 10.156a1 1 0 0 1-1.536 0L14.768 11.36a1 1 0 1 0-1.536 1.28l8.933 10.72a1 1 0 0 1 0 1.28l-8.933 10.72a1 1 0 1 0 1.536 1.28l8.464-10.156a1 1 0 0 1 1.536 0l8.464 10.156a1 1 0 0 0 1.536-1.28l-8.933-10.72a1 1 0 0 1 0-1.28l8.933-10.72a1 1 0 0 0-.128-1.408" clip-rule="evenodd" />
                                </svg>
                            </span>
                        </div>
                        <div>
                            <p class="mb-2 text-sm font-medium text-gray-600 dark:text-gray-400">
                                Denied
                            </p>
                            <p class="text-lg font-semibold text-gray-700 dark:text-gray-200">
                                Statistics </p>
                        </div>
                    </div>
                    <!-- Card -->
                    <div id="Categories" class="flex items-center p-4 bg-white rounded-lg shadow-xs dark:bg-gray-800">
                        <div class="p-3 mr-4 rounded-full">
                            <span class="h-12 w-12 dark:bg-white bg-black rounded-full flex justify-center items-center">
                                <svg xmlns="http://www.w3.org/2000/svg" width="30" height="30" viewBox="0 0 20 20" class="text-white dark:text-black">
                                    <path fill="currentColor" d="M5 7h13v10H2V4h7l2 2H4v9h1z" />
                                </svg>
                            </span>
                        </div>
                        <div>
                            <p class="mb-2 text-sm font-medium text-gray-600 dark:text-gray-400">
                                Categories
                            </p>
                            <p class="text-lg font-semibold text-gray-700 dark:text-gray-200">
                                Statistics </p>
                        </div>

                    </div>
                    <!-- Card -->
                    <div id="Approved" class="flex items-center p-4 bg-white rounded-lg shadow-xs dark:bg-gray-800">
                        <div class="p-3 mr-4 rounded-full">
                            <span class="h-12 w-12 border border-black bg-white rounded-full flex justify-center items-center">
                                <svg xmlns="http://www.w3.org/2000/svg" width="30" height="30" viewBox="0 0 24 24">
                                    <path fill="none" stroke="currentColor" stroke-linecap="round" stroke-width="2" d="M19.548 7.267a2 2 0 1 0-3.096-2.533L8.666 14.25L6.2 12.4a2 2 0 0 0-2.4 3.2l3.233 2.425a3 3 0 0 0 4.122-.5z" />
                                </svg>
                            </span>
                        </div>
                        <div>
                            <p class="mb-2 text-sm font-medium text-gray-600 dark:text-gray-400">
                                Approved
                            </p>
                            <p class="text-lg font-semibold text-gray-700 dark:text-gray-200">
                                Statistics </p>
                        </div>
                    </div>
                    <!-- Card -->
                    <div id="Denied" class="flex items-center p-4 bg-white rounded-lg shadow-xs dark:bg-gray-800">
                        <div class="p-3 mr-4 rounded-full">
                            <span class="h-12 w-12 border border-black bg-white rounded-full flex justify-center items-center">
                                <svg xmlns="http://www.w3.org/2000/svg" width="30" height="30" viewBox="0 0 48 48">
                                    <path fill="currentColor" fill-rule="evenodd" d="M31.695 10.08a3 3 0 0 1 4.61 3.84L27.905 24l8.4 10.08a3 3 0 1 1-4.61 3.84L24 28.687l-7.695 9.235a3 3 0 1 1-4.61-3.841l8.4-10.08l-8.4-10.08a3 3 0 0 1 4.61-3.84L24 19.313zm2.945 1.152a1 1 0 0 0-1.408.128l-.768-.64l.768.64l-8.464 10.156a1 1 0 0 1-1.536 0L14.768 11.36a1 1 0 1 0-1.536 1.28l8.933 10.72a1 1 0 0 1 0 1.28l-8.933 10.72a1 1 0 1 0 1.536 1.28l8.464-10.156a1 1 0 0 1 1.536 0l8.464 10.156a1 1 0 0 0 1.536-1.28l-8.933-10.72a1 1 0 0 1 0-1.28l8.933-10.72a1 1 0 0 0-.128-1.408" clip-rule="evenodd" />
                                </svg>
                            </span>
                        </div>
                        <div>
                            <p class="mb-2 text-sm font-medium text-gray-600 dark:text-gray-400">
                                Denied
                            </p>
                            <p class="text-lg font-semibold text-gray-700 dark:text-gray-200">
                                Statistics </p>
                        </div>
                    </div>
                </div>


            </div>
        </div>
    </main>
    <!-- Footer -->
    <?php include "../app/View/includes/footer.php"; ?>



</body>
<script src="public/assets/js/dashboard.js"></script>
<script src="public/assets/js/theme.js"></script>

</html>