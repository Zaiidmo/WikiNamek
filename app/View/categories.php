<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Categories</title>
    <link rel="stylesheet" href="public/assets/dist/output.css">
</head>

<body class="bg-gray-300 dark:bg-gray-900 text-gray-900 font-poppins">
    <?php
    include "../app/View/includes/navbar.php";
    ?>
    <!-- Dashboard Content -->

    <main id="main" class="pt-36 px-28">
        <h2 class=" text-4xl font-semibold text-center font-poppins tracking-widest text-gray-700 dark:text-gray-200">
            <span class="text-black dark:text-gray-400">Available</span> Categories
        </h2>
        <div class="w-full overflow-hidden rounded-lg shadow-xs">
            <div class="w-full overflow-x-auto">
                <table class="w-full my-8 whitespace-no-wrap">
                    <thead>
                        <tr class="text-xs font-semibold tracking-wide text-left text-gray-500 uppercase border-b dark:border-gray-700 bg-gray-50 dark:text-gray-400 dark:bg-gray-800">
                            <th class="px-4 py-3">Category Name</th>
                            <!-- <th class="px-4 py-3">N-- Of Wikis</th> -->
                            <!-- <th class="px-4 py-3">Type</th> -->
                            <!-- <th class="px-4 py-3">Purshased Tickets</th> -->
                            <!-- <th class="px-4 py-3"></th> -->
                            <!-- <th class="px-4 py-3">Actions</th> -->
                        </tr>
                    </thead>
                    <tbody class="bg-white divide-y dark:divide-gray-700 dark:bg-gray-800">
                        <?php foreach ($categories as $category) { ?>
                            <tr class="text-gray-700 dark:text-gray-400">
                                <td class="px-4 py-3">
                                    <div class="flex items-center text-sm">
                                        <!-- Avatar with inset shadow -->
                                        <!-- <div class="relative hidden w-8 h-8 mr-3 rounded-full md:block">
                                            <img src="<?= URL_DIR ?>public/assets/uploads/<?= $user['profile_picture'] ?>" alt="Profile" class="object-cover w-full h-full rounded-full" />
                                            <div class="absolute inset-0 rounded-full shadow-inner" aria-hidden="true"></div>
                                        </div> -->
                                        <div>
                                            <p class="font-semibold"><?= $category['name'] ?></p>
                                        </div>
                                    </div>
                                </td>
                                <!-- <td class="px-4 py-3 text-sm">
                                    <?= $category['count'] ?>
                                </td> -->

                                
                                <!-- <td class="px-4 py-3">
                                    <div class="flex items-center space-x-4 text-sm">
                                        <a href="Categorie/editcat">
                                            <button data-user_Id="<?= $user['id'] ?>" class=" edituser flex items-center justify-between px-2 py-2 text-sm font-medium leading-5 text-purple-600 rounded-lg dark:text-gray-400 focus:outline-none focus:shadow-outline-gray" aria-label="Edit">
                                                <svg class="w-5 h-5" aria-hidden="true" fill="currentColor" viewBox="0 0 20 20">
                                                    <path d="M13.586 3.586a2 2 0 112.828 2.828l-.793.793-2.828-2.828.793-.793zM11.379 5.793L3 14.172V17h2.828l8.38-8.379-2.83-2.828z"></path>
                                                </svg>
                                            </button>
                                        </a>
                                        <a href="Categorie/deletecat">
                                            <button onclick="confirmDelete()" class="flex items-center justify-between px-2 py-2 text-sm font-medium leading-5 text-purple-600 rounded-lg dark:text-gray-400 focus:outline-none focus:shadow-outline-gray" aria-label="Delete">
                                                <svg class="w-5 h-5" aria-hidden="true" fill="currentColor" viewBox="0 0 20 20">
                                                    <path fill-rule="evenodd" d="M9 2a1 1 0 00-.894.553L7.382 4H4a1 1 0 000 2v10a2 2 0 002 2h8a2 2 0 002-2V6a1 1 0 100-2h-3.382l-.724-1.447A1 1 0 0011 2H9zM7 8a1 1 0 012 0v6a1 1 0 11-2 0V8zm5-1a1 1 0 00-1 1v6a1 1 0 102 0V8a1 1 0 00-1-1z" clip-rule="evenodd"></path>
                                                </svg>
                                            </button>
                                        </a>
                                    </div>
                                </td> -->
                            </tr>
                        <?php } ?>
                    </tbody>
                </table>
            </div>

        </div>
    </main>

    <!-- Footer -->
    <?php include "../app/View/includes/footer.php"; ?>



</body>
<script src="public/assets/js/dashboard.js"></script>
<script src="public/assets/js/theme.js"></script>

</html>