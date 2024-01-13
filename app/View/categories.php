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
        <h2 class=" text-4xl mb-8 font-semibold text-center font-poppins tracking-widest text-gray-700 dark:text-gray-200">
            <span class="text-black dark:text-gray-400">Available</span> Categories
        </h2>
        <button type="button" id="Create_Category" class="text-white bg-gray-700 hover:bg-gray-900 focus:outline-none focus:ring-4 focus:ring-gray-300 font-medium rounded-lg text-sm px-5 py-2.5 me-2 mb-2 dark:bg-gray-800 dark:hover:bg-gray-700 dark:focus:ring-gray-700 dark:border-gray-700">Create a Category</button>
        <div class="w-full overflow-hidden rounded-lg shadow-xs">
            <div class="w-full overflow-x-auto">
                <table class="w-full my-8 whitespace-no-wrap">
                    <thead>
                        <tr class="text-l font-semibold h-8 tracking-wide text-left  text-gray-500 uppercase border-b dark:border-gray-700 bg-gray-50 dark:text-gray-400 dark:bg-gray-800">
                            <th class="px-4 py-3">Category Name</th>
                            <th class="px-4 py-3">N-- Of Wikis</th>
                            <!-- <th class="px-4 py-3">Type</th> -->
                            <!-- <th class="px-4 py-3">Purshased Tickets</th> -->
                            <!-- <th class="px-4 py-3"></th> -->
                            <th class="px-4 py-3">Actions</th>
                        </tr>
                    </thead>
                    <tbody class="bg-white divide-y dark:divide-gray-700 dark:bg-gray-800">
                        <?php foreach ($categories as $category) : ?>
                            <tr class="text-gray-700 dark:text-gray-400">
                                <td class="px-4 py-3">
                                    <div class="flex items-center text-sm">
                                        <div>
                                            <p class="font-semibold"><?= $category['name'] ?></p>
                                        </div>
                                    </div>
                                </td>
                                <td class="px-4 py-3 text-sm">
                                    <?= $wikiCount[$category['id']] ?>
                                </td>
                                <td class="px-4 py-3">
                                    <div class="flex items-center space-x-4 text-sm">
                                        <button data-id="<?= $category['id'] ?>" class="editCategory flex items-center justify-between px-2 py-2 text-sm font-medium leading-5 text-purple-600 rounded-lg dark:text-gray-400 focus:outline-none focus:shadow-outline-gray" aria-label="Edit">
                                            <svg class="w-5 h-5" aria-hidden="true" fill="currentColor" viewBox="0 0 20 20">
                                                <path d="M13.586 3.586a2 2 0 112.828 2.828l-.793.793-2.828-2.828.793-.793zM11.379 5.793L3 14.172V17h2.828l8.38-8.379-2.83-2.828z"></path>
                                            </svg>
                                        </button>

                                        <a href="Categories/deletecat/?id=<?= $category['id'] ?>">
                                            <button onclick="confirmDelete()" class="flex items-center justify-between px-2 py-2 text-sm font-medium leading-5 text-purple-600 rounded-lg dark:text-gray-400 focus:outline-none focus:shadow-outline-gray" aria-label="Delete">
                                                <svg class="w-5 h-5" aria-hidden="true" fill="currentColor" viewBox="0 0 20 20">
                                                    <path fill-rule="evenodd" d="M9 2a1 1 0 00-.894.553L7.382 4H4a1 1 0 000 2v10a2 2 0 002 2h8a2 2 0 002-2V6a1 1 0 100-2h-3.382l-.724-1.447A1 1 0 0011 2H9zM7 8a1 1 0 012 0v6a1 1 0 11-2 0V8zm5-1a1 1 0 00-1 1v6a1 1 0 102 0V8a1 1 0 00-1-1z" clip-rule="evenodd"></path>
                                                </svg>
                                            </button>
                                        </a>
                                    </div>
                                </td>
                            </tr>
                            <div id="cat-modal-<?= $category['id'] ?>" class="modification_modal hidden overflow-y-auto overflow-x-hidden fixed w-1/2 rounded-xl border top-1/2 left-1/2 transform -translate-y-1/2 -translate-x-1/2 z-100 justify-center items-center dark:bg-gray-700 bg-gray-700 overflow-auto bg-opacity-70">
                                <div aria-hidden="true" class="flex flex-col justify-center px-2 py-12 lg:px-2 text-gray-900 dark:text-white">
                                    <div class="sm:w-full sm:max-w-sm flex self-center justify-between items-center">
                                        <h2 class="self-center font-poppins text-center text-4xl font-bold leading-9 tracking-wider">Update Category</h2>
                                        <span class="close cursor-pointer">&times;</span>
                                    </div>

                                    <div class="mt-10 self-center w-1/2">
                                        <form action="Categories/editCat" method="POST" enctype="multipart/form-data">
                                            <input type="number" name="id" id="catId" class="hidden" value="<?= $category['id'] ?>">
                                            <div class="grid gap-4 sm:grid-cols-2 sm:gap-6">
                                                <div class="sm:col-span-2">
                                                    <label for="name" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">name <span class="text-red-500 text-l"> *</span></label>
                                                    <input type="text" name="name" id="name" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-primary-600 focus:border-primary-600 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-primary-500 dark:focus:border-primary-500" placeholder="<?= $category['name'] ?>" required="">
                                                </div>
                                                <button type="submit" data-id="<?= $category['id'] ?>" class="px-5 py-2.5 mt-4 sm:mt-6 text-sm font-medium text-center text-white bg-gray-700 rounded-lg focus:ring-4 focus:ring-gray-200 dark:focus:ring-gray-900 hover:bg-gray-800">
                                                    P O S T
                                                </button>
                                        </form>
                                    </div>
                                </div>
                            </div>
                        <?php endforeach ?>

                    </tbody>
                </table>
            </div>

        </div>
        <div id="Add_new_category" class=" hidden overflow-y-auto overflow-x-hidden fixed w-1/2 rounded-xl border top-1/2 left-1/2 transform -translate-y-1/2 -translate-x-1/2 z-100 justify-center items-center dark:bg-gray-700 bg-gray-700 overflow-auto bg-opacity-70">
        <div aria-hidden="true" class="flex flex-col justify-center px-2 py-12 lg:px-2 text-gray-900 dark:text-white">
            <div class="sm:w-full sm:max-w-sm flex self-center justify-between items-center">
                <h2 class="self-center font-poppins text-center text-4xl font-bold leading-9 tracking-wider">Create a new Category</h2>
                <span id="closeCreation" class="close cursor-pointer">&times;</span>
            </div>

            <div class="mt-10 self-center w-1/2">
                <form action="Categories/createNew" method="POST" enctype="multipart/form-data">
                    <div class="grid gap-4 sm:grid-cols-2 sm:gap-6">
                        <div class="sm:col-span-2">
                            <label for="name" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">name <span class="text-red-500 text-l"> *</span></label>
                            <input type="text" name="name" id="name" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-primary-600 focus:border-primary-600 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-primary-500 dark:focus:border-primary-500" placeholder="Category Name" required="">
                        </div>
                        <button type="submit" class="px-5 py-2.5 mt-4 sm:mt-6 text-sm font-medium text-center text-white bg-gray-700 rounded-lg focus:ring-4 focus:ring-gray-200 dark:focus:ring-gray-900 hover:bg-gray-800">
                            P O S T
                        </button>
                </form>
            </div>
        </div>
    </div>

    </main>

    <!-- Creation Modal -->
    
    <!-- Footer -->
    <?php include "../app/View/includes/footer.php"; ?>



</body>
<script>
    function confirmDelete() {
        var confirmation = confirm(`Are you sure you want to delete this category??`);
        return confirmation;
    }
</script>
<script src="public/assets/js/categories.js"></script>
<script src="public/assets/js/dashboard.js"></script>
<script src="public/assets/js/theme.js"></script>

</html>