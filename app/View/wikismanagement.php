<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Wikis Management - Admin</title>
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

    <main id="main" class="md:h-screen md:px-28 px-16 ">
        <h2 class="pt-36 text-4xl font-semibold text-center font-poppins tracking-widest text-gray-700 dark:text-gray-200">
            <span class="text-black dark:text-gray-400">Shared</span> Wikis
        </h2>
        <div class="w-full mb-4 overflow-hidden rounded-lg shadow-xs">
            <div class="w-full overflow-x-auto">
                <table class=" mt-8  w-full whitespace-no-wrap">
                    <thead>
                        <tr class="text-xs font-semibold tracking-wide text-left text-gray-500 uppercase border-b dark:border-gray-700 bg-gray-50 dark:text-gray-400 dark:bg-gray-800">
                            <th class="px-4 py-3">Wiki Title</th>
                            <th class="px-4 py-3">Description</th>
                            <th class="px-4 py-3">Shared By</th>
                            <th class="px-4 py-3">Status</th>
                            <!-- <th class="px-4 py-3">Purshased Tickets</th> -->
                            <!-- <th class="px-4 py-3"></th> -->
                            <th class="px-4 py-3">Actions</th>
                        </tr>
                    </thead>
                    <tbody class="bg-white divide-y dark:divide-gray-700 dark:bg-gray-800">
                        <?php foreach ($wikis as $wiki) { ?>
                            <tr class="text-gray-700 dark:text-gray-400">
                                <td class="px-4 py-3">
                                    <div class="flex items-center text-sm">
                                        <!-- Avatar with inset shadow -->
                                        <!-- <div class="relative hidden w-8 h-8 mr-3 rounded-full md:block">
                                            <img src="<?= URL_DIR ?>public/assets/uploads/<?= $wiki['profile_picture'] ?>" alt="Profile" class="object-cover w-full h-full rounded-full" />
                                            <div class="absolute inset-0 rounded-full shadow-inner" aria-hidden="true"></div>
                                        </div> -->
                                        <div>
                                            <p class="font-semibold"><?= $wiki['title'] ?></p>
                                            <p class="text-xs text-gray-600     :text-gray-400">
                                                <?= $wiki['creation_date'] ?>
                                            </p>
                                        </div>
                                    </div>
                                </td>
                                <td class="px-4 py-3 text-sm">
                                    <?= $wiki['description'] ?>
                                </td>
                                <td class="px-4 py-3 text-sm">
                                    <?= $wiki['author'] ?>
                                </td>
                                <td class="px-4 py-3 text-sm">
                                    <?= $wiki['status'] ?>
                                </td>

                                <td class="px-4 py-3">
                                    <div class="flex items-center space-x-4 text-sm">
                                        <!-- <a href="users/displayedituser/<?= $user['id'] ?>"> -->
                                        <?php if ($wiki['status'] === 'pending') : ?>
                                            <a href="Wikismanagement/approve/?id=<?= $wiki['id'] ?>">
                                                <button data-user_Id="<?= $wiki['id'] ?>" class=" approvewiki flex items-center justify-between px-2 py-2 text-sm font-medium leading-5 text-purple-600 rounded-lg dark:text-gray-400 focus:outline-none focus:shadow-outline-gray" aria-label="approve">
                                                    <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" viewBox="0 0 16 16">
                                                        <path fill="currentColor" fill-rule="evenodd" d="M3 13.5a.5.5 0 0 1-.5-.5V3a.5.5 0 0 1 .5-.5h9.25a.75.75 0 0 0 0-1.5H3a2 2 0 0 0-2 2v10a2 2 0 0 0 2 2h10a2 2 0 0 0 2-2V9.75a.75.75 0 0 0-1.5 0V13a.5.5 0 0 1-.5.5zm12.78-8.82a.75.75 0 0 0-1.06-1.06L9.162 9.177L7.289 7.241a.75.75 0 1 0-1.078 1.043l2.403 2.484a.75.75 0 0 0 1.07.01z" clip-rule="evenodd" />
                                                    </svg>
                                                </button>
                                            </a>
                                            <a href="Wikismanagement/deny/?id=<?= $wiki['id'] ?>">
                                                <button data-user_Id="<?= $wiki['id'] ?>" class=" approvewiki flex items-center justify-between px-2 py-2 text-sm font-medium leading-5 text-purple-600 rounded-lg dark:text-gray-400 focus:outline-none focus:shadow-outline-gray" aria-label="deny">
                                                    <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" viewBox="0 0 24 24">
                                                        <path fill="currentColor" d="M12 2c5.5 0 10 4.5 10 10s-4.5 10-10 10S2 17.5 2 12S6.5 2 12 2m0 2c-1.9 0-3.6.6-4.9 1.7l11.2 11.2c1-1.4 1.7-3.1 1.7-4.9c0-4.4-3.6-8-8-8m4.9 14.3L5.7 7.1C4.6 8.4 4 10.1 4 12c0 4.4 3.6 8 8 8c1.9 0 3.6-.6 4.9-1.7" />
                                                    </svg>
                                                </button>
                                            </a>
                                            <a href="Wikismanagement/archive/?id=<?= $wiki['id'] ?>">
                                                <button data-user_Id="<?= $wiki['id'] ?>" class=" archivewiki flex items-center justify-between px-2 py-2 text-sm font-medium leading-5 text-purple-600 rounded-lg dark:text-gray-400 focus:outline-none focus:shadow-outline-gray" aria-label="archive">
                                                    <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" viewBox="0 0 24 24">
                                                        <path fill="currentColor" d="m12 18l4-4l-1.4-1.4l-1.6 1.6V10h-2v4.2l-1.6-1.6L8 14zm-7 3q-.825 0-1.412-.587T3 19V6.525q0-.35.113-.675t.337-.6L4.7 3.725q.275-.35.687-.538T6.25 3h11.5q.45 0 .863.188t.687.537l1.25 1.525q.225.275.338.6t.112.675V19q0 .825-.587 1.413T19 21zm.4-15h13.2l-.85-1H6.25z" />
                                                    </svg>
                                                </button>
                                            </a>
                                            <a href="Wikismanagement/delete/?id=<?= $wiki['id'] ?>">
                                                <button onclick="return confirm('Are you Sure you want to delete this wiki?');" class=" deletewiki flex items-center justify-between px-2 py-2 text-sm font-medium leading-5 text-purple-600 rounded-lg dark:text-gray-400 focus:outline-none focus:shadow-outline-gray" aria-label="Delete">
                                                    <svg class="w-5 h-5" aria-hidden="true" fill="currentColor" viewBox="0 0 20 20">
                                                        <path fill-rule="evenodd" d="M9 2a1 1 0 00-.894.553L7.382 4H4a1 1 0 000 2v10a2 2 0 002 2h8a2 2 0 002-2V6a1 1 0 100-2h-3.382l-.724-1.447A1 1 0 0011 2H9zM7 8a1 1 0 012 0v6a1 1 0 11-2 0V8zm5-1a1 1 0 00-1 1v6a1 1 0 102 0V8a1 1 0 00-1-1z" clip-rule="evenodd"></path>
                                                    </svg>
                                                </button>
                                            </a>
                                        <?php elseif ($wiki['status'] === 'approved') : ?>
                                            <a href="Wikismanagement/archive/?id=<?= $wiki['id'] ?>">
                                                <button data-user_Id="<?= $wiki['id'] ?>" class=" archivewiki flex items-center justify-between px-2 py-2 text-sm font-medium leading-5 text-purple-600 rounded-lg dark:text-gray-400 focus:outline-none focus:shadow-outline-gray" aria-label="archive">
                                                    <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" viewBox="0 0 24 24">
                                                        <path fill="currentColor" d="m12 18l4-4l-1.4-1.4l-1.6 1.6V10h-2v4.2l-1.6-1.6L8 14zm-7 3q-.825 0-1.412-.587T3 19V6.525q0-.35.113-.675t.337-.6L4.7 3.725q.275-.35.687-.538T6.25 3h11.5q.45 0 .863.188t.687.537l1.25 1.525q.225.275.338.6t.112.675V19q0 .825-.587 1.413T19 21zm.4-15h13.2l-.85-1H6.25z" />
                                                    </svg>
                                                </button>
                                            </a>
                                            <a href="Wikismanagement/delete/?id=<?= $wiki['id'] ?>">
                                                <button onclick="return confirm('Are you Sure you want to delete this wiki?');" class=" deletewiki flex items-center justify-between px-2 py-2 text-sm font-medium leading-5 text-purple-600 rounded-lg dark:text-gray-400 focus:outline-none focus:shadow-outline-gray" aria-label="Delete">
                                                    <svg class="w-5 h-5" aria-hidden="true" fill="currentColor" viewBox="0 0 20 20">
                                                        <path fill-rule="evenodd" d="M9 2a1 1 0 00-.894.553L7.382 4H4a1 1 0 000 2v10a2 2 0 002 2h8a2 2 0 002-2V6a1 1 0 100-2h-3.382l-.724-1.447A1 1 0 0011 2H9zM7 8a1 1 0 012 0v6a1 1 0 11-2 0V8zm5-1a1 1 0 00-1 1v6a1 1 0 102 0V8a1 1 0 00-1-1z" clip-rule="evenodd"></path>
                                                    </svg>
                                                </button>
                                            </a>
                                        <?php elseif ($wiki['status'] === 'archived') : ?>
                                            <a href="Wikismanagement/approve/?id=<?= $wiki['id'] ?>">
                                                <button data-user_Id="<?= $wiki['id'] ?>" class=" archivewiki flex items-center justify-between px-2 py-2 text-sm font-medium leading-5 text-purple-600 rounded-lg dark:text-gray-400 focus:outline-none focus:shadow-outline-gray" aria-label="archive">
                                                    <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" viewBox="0 0 24 24">
                                                        <path fill="currentColor" d="m12 10l-4 4l1.4 1.4l1.6-1.6V18h2v-4.2l1.6 1.6L16 14zM5 21q-.825 0-1.412-.587T3 19V6.525q0-.35.113-.675t.337-.6L4.7 3.725q.275-.35.687-.538T6.25 3h11.5q.45 0 .863.188t.687.537l1.25 1.525q.225.275.338.6t.112.675V19q0 .825-.587 1.413T19 21zm.4-15h13.2l-.85-1H6.25z" />
                                                    </svg>
                                                </button>
                                            </a>
                                            <a href="Wikismanagement/delete/?id=<?= $wiki['id'] ?>">
                                                <button onclick="return confirm('Are you Sure you want to delete this wiki?');" class=" deletewiki flex items-center justify-between px-2 py-2 text-sm font-medium leading-5 text-purple-600 rounded-lg dark:text-gray-400 focus:outline-none focus:shadow-outline-gray" aria-label="Delete">
                                                    <svg class="w-5 h-5" aria-hidden="true" fill="currentColor" viewBox="0 0 20 20">
                                                        <path fill-rule="evenodd" d="M9 2a1 1 0 00-.894.553L7.382 4H4a1 1 0 000 2v10a2 2 0 002 2h8a2 2 0 002-2V6a1 1 0 100-2h-3.382l-.724-1.447A1 1 0 0011 2H9zM7 8a1 1 0 012 0v6a1 1 0 11-2 0V8zm5-1a1 1 0 00-1 1v6a1 1 0 102 0V8a1 1 0 00-1-1z" clip-rule="evenodd"></path>
                                                    </svg>
                                                </button>
                                            </a>
                                        <?php endif ?>
                                    </div>
                                </td>
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