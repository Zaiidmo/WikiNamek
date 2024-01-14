<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?= $_SESSION['user_name'] ?></title>
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

<body class="font-poppins bg-gray-300  dark:bg-gray-800">
    <?php include "../app/View/includes/navbar.php"; ?>
    <main id="main" class="h-screen">
        <div id="profile-card" class="p-16 lg:pl-24">

            <div class="p-8 bg-white rounded-lg  dark:bg-gray-900 shadow mt-24">
                <div class="grid grid-cols-1 md:grid-cols-3">
                    <div class="grid grid-cols-2 lg:grid-cols-3 text-center order-last md:order-first mt-20 md:mt-0">
                        <div>
                            <p class="font-bold dark:text-white text-gray-700 text-xl"><?= $counts['all'] ?></p>
                            <p class="dark:text-white text-gray-400">Posted Wikis</p>
                        </div>
                        <div>
                            <p class="font-bold dark:text-white text-gray-700 text-xl"><?= $counts['approved'] ?></p>
                            <p class="dark:text-white text-gray-400">Approved</p>
                        </div>
                        <div>
                            <p class="font-bold dark:text-white text-gray-700 text-xl"><?= $counts['denied'] ?></p>
                            <p class=" dark:text-white text-gray-400">Denied</p>
                        </div>
                    </div>
                    <div class="relative justify-center">
                        <div class="w-48 h-48 bg-indigo-100 mx-auto rounded-full shadow-2xl absolute inset-x-0 top-0 -mt-24 flex items-center justify-center dark:text-white text-indigo-500">
                            <img class="rounded-full " src=<?= URL_DIR . "public/assets/uploads/" . $_SESSION['profile_picture'] ?> alt="profile">
                        </div>
                    </div>
                    <div class="lg:space-x-8 py-1 flex justify-center lg:justify-between mt-32 md:mt-0 md:justify-center">
                        <button id="editprofile" class="text-black bg-gray-300 dark:bg-gray-700 dark:text-white py- px-4 uppercase rounded bg-primary-100 hover:bg-primary-200 shadow hover:shadow-lg font-poppins font-bold transition transform hover:-translate-y-0.5">
                            Edit Profile
                        </button>
                    </div>
                </div>
                <?php
                $errors = $_SESSION['errors'] ?? [];
                unset($_SESSION['errors']);
                if (!empty($errors)) {
                    foreach ($errors as $error) {
                        // echo '<div class="mt-10 border border-red-500 text-red-500 px-4 py-3 rounded relative text-center" role="alert">';
                        echo "<span class='block text-red-500 sm:inline'><br>
            $error</span>";
                        // echo '</div>';
                    }
                }
                ?>
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
        <div id="History" class="p-8 lg:p-16 lg:pt-0 lg:pl-24">
            <div class="p-8 bg-white rounded-lg dark:bg-gray-900 shadow">
                <h1 class="tracking-widest text-gray-800 mb-10 dark:text-white">My Already Posted Wikis</h1>
                <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-5">
                    <?php if (empty($wikis)) : ?>
                        <h4 class="tracking-widest text-gray-800 dark:text-white">No Wikis Available</h4>
                    <?php else : ?>
                        <?php foreach ($wikis as $wiki) : ?>
                            <div id="wiki" class="w-full md:w-80 rounded-xl mb-5 bg-white dark:bg-gray-800 shadow-2xl">
                                <img src="public/assets/uploads/<?= $wiki['picture'] ?>" class="h-48 w-full rounded-t-xl flex flex-col justify-between p-4 bg-cover  bg-center">
                                <div class="p-4 rounded-b-xl">
                                    <div class="flex items-center justify-between">
                                        <h1 class="text-black dark:text-white font-medium"><?= $wiki['title'] ?></h1>
                                        <button data-id="<?= $wiki['id'] ?>" class="editwiki text-black dark:text-white">
                                            <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 5v.01M12 12v.01M12 19v.01M12 6a1 1 0 110-2 1 1 0 010 2zm0 7a1 1 0 110-2 1 1 0 010 2zm0 7a1 1 0 110-2 1 1 0 010 2z" />
                                            </svg>
                                        </button>
                                    </div>
                                    <p class="text-black dark:text-white text-sm my-1"><?= $wiki['description'] ?></p>
                                    <?php if ($wiki['status'] == 'pending') : ?>
                                        <span class="uppercase text-xs bg-gray-300 p-0.5 px-3 rounded-full border-black border text-black font-bold"><?= $wiki['status'] ?></span>
                                    <?php elseif ($wiki['status'] == 'approved') : ?>
                                        <span class="uppercase text-xs bg-green-50 p-0.5 px-3 rounded-full border-green-500 border text-green-700 font-bold"><?= $wiki['status'] ?></span>
                                    <?php elseif ($wiki['status'] == 'denied') : ?>
                                        <span class="uppercase text-xs bg-red-500 p-0.5 px-3 border-red-500 border rounded-full text-white font-bold"><?= $wiki['status'] ?></span>
                                    <?php elseif ($wiki['status'] == 'archived') : ?>
                                        <span class="uppercase text-xs bg-blue-200 p-0.5 px-3 border-blue-500 border rounded-full text-black font-medium"><?= $wiki['status'] ?></span>
                                    <?php elseif ($wiki['status'] == 'deleted') : ?>
                                        <span class="uppercase text-xs bg-black p-0.5 px-3 border-black border rounded-full text-white font-medium"><?= $wiki['status'] ?></span>
                                    <?php endif; ?>
                                </div>
                            </div>
                        <?php endforeach ?>
                    <?php endif ?>
                </div>
            </div>
        </div>

        <div id="modification-modal" class="modification_modal hidden overflow-y-auto overflow-x-hidden fixed w-1/2 rounded-xl border top-1/2 left-1/2 transform -translate-y-1/2 -translate-x-1/2 z-100 justify-center items-center dark:bg-gray-700 overflow-auto bg-opacity-50">
            <div aria-hidden="true" class="flex flex-col justify-center px-2 py-12 lg:px-2 text-gray-900 dark:text-white">
                <div class="sm:w-full sm:max-w-sm flex self-center justify-between items-center">
                    <h2 class="self-center font-poppins text-center text-4xl font-bold leading-9 tracking-wider">Edit Your Profile</h2>
                    <span id="closeedit" class="closeedit cursor-pointer">&times;</span>
                </div>

                <div class="mt-10 self-center w-1/2">
                    <form id="editform" class="space-y-6" action="Profile/editprofile" method="POST" enctype="multipart/form-data">
                        <input type="number" name="id" id="userid" class="hidden" value="<?= $_SESSION['id'] ?>">
                        <div>
                            <label for="UserName" class="block text-sm font-medium leading-6">New User Name</label>
                            <div class="mt-2">
                                <input type="text" id="UserName" name="user_name" class="shadow-sm bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-primary-500 focus:border-primary-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-primary-500 dark:focus:border-primary-500 dark:shadow-sm-light" placeholder="New User Name" value="<?= $_SESSION['user_name'] ?>">
                            </div>
                        </div>
                        <div>
                            <label for="email" class="block text-sm font-medium leading-6">New email</label>
                            <div class="mt-2">
                                <input type="text" id="email" name="email" class="shadow-sm bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-primary-500 focus:border-primary-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-primary-500 dark:focus:border-primary-500 dark:shadow-sm-light" placeholder="New email" value="<?= $_SESSION['email'] ?>">
                            </div>
                        </div>
                        <div>
                            <label for="password" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Password</label>
                            <input type="password" name="password" id="password" placeholder="Password is required" class="bg-gray-50 border border-gray-300 text-gray-900 sm:text-sm rounded-lg focus:ring-primary-600 focus:border-primary-600 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" required>
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

        <?php foreach ($wikis as $wiki) : ?>

            <div id="wiki-modal-<?= $wiki['id'] ?>" class="modification_modal hidden overflow-y-auto overflow-x-hidden fixed w-1/2 rounded-xl border top-1/2 left-1/2 transform -translate-y-1/2 -translate-x-1/2 z-100 justify-center items-center dark:bg-gray-700 bg-black overflow-auto bg-opacity-70">
                <div aria-hidden="true" class="flex flex-col justify-center px-2 py-12 lg:px-2 text-gray-900 dark:text-white">
                    <div class="sm:w-full sm:max-w-sm flex self-center justify-between items-center">
                        <h2 class="self-center font-poppins text-center text-4xl font-bold leading-9 tracking-wider">Wiki Update</h2>
                        <span class="close cursor-pointer">&times;</span>
                    </div>

                    <div class="mt-10 self-center w-1/2">
                        <form action="Profile/edit_wiki" method="POST" enctype="multipart/form-data">
                            <input type="number" name="id" id="wikiId" class="hidden" value="<?= $wiki['id'] ?>">
                            <div class="grid gap-4 sm:grid-cols-2 sm:gap-6">
                                <div class="sm:col-span-2">
                                    <label for="title" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Title <span class="text-red-500 text-l"> *</span></label>
                                    <input type="text" name="title" id="title" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-primary-600 focus:border-primary-600 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-primary-500 dark:focus:border-primary-500" placeholder="<?= $wiki['title'] ?>" required="">
                                </div>
                                <div class="sm:col-span-2">
                                    <label for="Description" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Description </label>
                                    <input type="text" name="Description" id="Description" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-primary-600 focus:border-primary-600 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-primary-500 dark:focus:border-primary-500" placeholder="<?= $wiki['description'] ?>"" required="">
                            </div>
                            <div>
                                <label for=" category" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Category</label>
                                    <select id="category" name="category" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-primary-500 focus:border-primary-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-primary-500 dark:focus:border-primary-500">
                                        <option selected disabled>Select category</option>
                                        <?php foreach ($categories as $category) : ?>
                                            <option value="<?= $category['id']; ?>"><?= $category['name']; ?></option>
                                        <?php endforeach; ?>
                                    </select>
                                </div>
                                <div>
                                    <label for="picture" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Wiki Photo</label>
                                    <input type="file" name="picture" id="picture" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-primary-600 focus:border-primary-600 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-primary-500 dark:focus:border-primary-500">
                                </div>
                                <div class="sm:col-span-2">
                                    <label for="Content" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Content</label>
                                    <textarea id="Content" name="content" rows="8" class="block p-2.5 w-full text-sm text-gray-900 bg-gray-50 rounded-lg border border-gray-300 focus:ring-primary-500 focus:border-primary-500 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-primary-500 dark:focus:border-primary-500" placeholder="Your Content here"></textarea>
                                </div>
                            </div>
                            <button type="submit" data-id="<?= $wiki['id'] ?>" class="px-5 py-2.5 mt-4 sm:mt-6 text-sm font-medium text-center text-white bg-gray-700 rounded-lg focus:ring-4 focus:ring-gray-200 dark:focus:ring-gray-900 hover:bg-gray-800">
                                P O S T
                            </button>
                        </form>
                    </div>
                </div>
            </div>
        <?php endforeach ?>

    </main>
    <?php include "../app/View/includes/footer.php"; ?>


</body>
<script src="public/assets/js/profile.js"></script>
<script src="public/assets/js/theme.js"></script>
<script src="https://cdn.jsdelivr.net/npm/tw-elements/dist/js/tw-elements.umd.min.js"></script>

</html>