<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Users Management - Admin</title>
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

<body class="font-poppins bg-gray-300 dark:bg-gray-800">
    <?php include "../app/View/includes/navbar.php"; ?>
    <main id="main" class="">
        <div id="profile-card" class="p-16 pl-24">

            <div class="p-8 bg-white rounded-lg  dark:bg-gray-900 shadow mt-24">
                <div class="grid grid-cols-1 md:grid-cols-3">
                    <div class="grid grid-cols-3 text-center order-last md:order-first mt-20 md:mt-0">
                        <div>
                            <p class="font-bold dark:text-white text-gray-700 text-xl">22</p>
                            <p class="dark:text-white text-gray-400">Posted Wikis</p>
                        </div>
                        <div>
                            <p class="font-bold dark:text-white text-gray-700 text-xl">10</p>
                            <p class="dark:text-white text-gray-400">Approved</p>
                        </div>
                        <div>
                            <p class="font-bold dark:text-white text-gray-700 text-xl">89</p>
                            <p class=" dark:text-white text-gray-400">Denied</p>
                        </div>
                    </div>
                    <div class="relative justify-center">
                        
                        <div class="w-48 h-48 bg-indigo-100 mx-auto rounded-full shadow-2xl absolute inset-x-0 top-0 -mt-24 flex items-center justify-center dark:text-white text-indigo-500">
                            <img src=<?= URL_DIR . "public/assets/uploads/" . $_SESSION['profile_picture'] ?> alt="profile">
                        </div>
                    </div>
                    <div class="space-x-8 flex justify-between mt-32 md:mt-0 md:justify-center">
                        <button id="editprofile" class="text-black bg-gray-300 dark:bg-gray-700 dark:text-white py-2 px-4 uppercase rounded bg-primary-100 hover:bg-primary-200 shadow hover:shadow-lg font-poppins font-bold transition transform hover:-translate-y-0.5">
                            Edit Profile
                        </button>
                        <!-- <button class="text-white py-2 px-4 uppercase rounded bg-gray-700 hover:bg-gray-800 shadow hover:shadow-lg font-medium transition transform hover:-translate-y-0.5"> </button> -->
                    </div>
                </div>
                <div class="mt-20 text-center ">
                    <h1 class="text-4xl font-medium dark:text-white text-gray-700">
                        <?= $_SESSION['user_name'] ?>
                    </h1>
                    <p class="font-light text-gray-600 dark:text-white mt-3">
                        <?= $_SESSION['email'] ?>
                    </p>
                </div>
                <!-- <div class="mt-12 flex flex-col justify-center">
                    <p class="text-gray-600 dark:text-white text-center font-light lg:px-16">An artist of considerable range, Ryan — the name taken by Melbourne-raised, Brooklyn-based Nick Murphy — writes, performs and records all of his own music, giving it a warm, intimate feel with a solid groove structure. An artist of considerable range.</p> <button class="text-indigo-500 py-2 px-4  font-medium mt-4"> Show more</button>
                </div> -->
            </div>
        </div>
        <div id="History" class="p-16 pt-0 pl-24">
            <div class="p-8 bg-white rounded-lg  dark:bg-gray-900 shadow ">
                <h1 class="tracking-widest text-gray-800 mb-10 dark:text-white">My Already Posted Wikis</h1>
                <div class="grid grid-cols-1 md:grid-cols-5 ">
                    <div id="ticket" class="w-full md:w-80 rounded-xl mb-5 bg-white dark:bg-gray-800 shadow-2xl ">
                        <div class="h-48 w-full rounded-t-xl flex flex-col justify-between p-4 bg-cover  bg-center" style="background-image: url('https://images.pexels.com/photos/1592384/pexels-photo-1592384.jpeg?auto=compress&cs=tinysrgb&dpr=2&h=650&w=940')">
                        </div>
                        <div class="p-4 rounded-b-xl ">
                            <div class="flex items-center justify-between">
                                <h1 class="text-black dark:text-white font-medium">titan.jpg</h1> <button class="text-black dark:text-white"> <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 5v.01M12 12v.01M12 19v.01M12 6a1 1 0 110-2 1 1 0 010 2zm0 7a1 1 0 110-2 1 1 0 010 2zm0 7a1 1 0 110-2 1 1 0 010 2z" />
                                    </svg> </button>
                            </div>
                            <p class="text-black dark:text-white text-sm my-1">Jack cooper</p> <span class="uppercase text-xs bg-green-50 p-0.5 border-green-500 border rounded text-green-700 font-medium">Approved</span>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div id="modification-modal" class="modification_modal hidden overflow-y-auto overflow-x-hidden fixed w-1/2 rounded-xl border top-1/2 left-1/2 transform -translate-y-1/2 -translate-x-1/2 z-100 justify-center items-center dark:bg-gray-700 overflow-auto bg-opacity-50">
            <div aria-hidden="true" class="flex flex-col justify-center px-2 py-12 lg:px-2 text-gray-900 dark:text-white">
                <div class="sm:w-full sm:max-w-sm flex self-center justify-between items-center">
                    <h2 class="self-center font-poppins text-center text-4xl font-bold leading-9 tracking-wider">Edit Your Profile</h2>
                    <span class="close cursor-pointer">&times;</span>
                </div>

                <div class="mt-10 self-center w-1/2">
                    <form id="editform" class="space-y-6" action="Profile/editprofile" method="POST" enctype="multipart/form-data">
                        <input type="number" name="id" id="userid" class="hidden" value="<?= $_SESSION['id'] ?>">
                        <div>
                            <label for="UserName" class="block text-sm font-medium leading-6">New User Name</label>
                            <div class="mt-2">
                                <input type="text" id="UserName" name="user_name" class="shadow-sm bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-primary-500 focus:border-primary-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-primary-500 dark:focus:border-primary-500 dark:shadow-sm-light" placeholder="New User Name">
                            </div>
                        </div>
                        <div>
                            <label for="email" class="block text-sm font-medium leading-6">New email</label>
                            <div class="mt-2">
                                <input type="text" id="email" name="email" class="shadow-sm bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-primary-500 focus:border-primary-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-primary-500 dark:focus:border-primary-500 dark:shadow-sm-light" placeholder="New email">
                            </div>
                        </div>
                        <div>
                            <label for="password" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Password</label>
                            <input type="password" name="password" id="password" placeholder="••••••••" class="bg-gray-50 border border-gray-300 text-gray-900 sm:text-sm rounded-lg focus:ring-primary-600 focus:border-primary-600 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" required="">
                        </div>
                        <div>
                            <label class="block mb-2 text-sm font-medium text-gray-900 dark:text-white" for="profile_picture">Upload profile picture</label>
                            <input name="profile_picture" class="block w-full text-sm text-gray-900 border border-gray-300 rounded-lg cursor-pointer bg-gray-50 dark:text-gray-400 focus:outline-none dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400" id="profile_picture" type="file">
                        </div>
                        <div class="flex justify-center">
                            <button type="submit" class="flex w-1/2 justify-center rounded-md bg-primary-600 px-3 py-1.5 text-sm font-semibold leading-6 tracking-widest text-white shadow-sm hover:bg-primary-500 focus-visible:outline focus-visible:outline-2 focus-visible:outline-offset-2 focus-visible:outline-primary-600">Submit Edits</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </main>
    <?php include "../app/View/includes/footer.php"; ?>


</body>
<script src="public/assets/js/profile.js"></script>
<script src="public/assets/js/theme.js"></script>
<script src="https://cdn.jsdelivr.net/npm/tw-elements/dist/js/tw-elements.umd.min.js"></script>

</html>