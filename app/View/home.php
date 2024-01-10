<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>WikiNamek</title>
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
    <!-- Hero Section -->
    <section class="bg-gray-300 dark:bg-gray-900 pt-24">
        <div class="grid max-w-screen-xl px-4 py-8 mx-auto justify-center items-center align-middle lg:gap-8 xl:gap-0 lg:py-16 lg:grid-cols-12">
            <div class="lg:mt-0 md:hidden lg:col-span-5 lg:flex">
                <img src="<?= URL_DIR ?>public/assets/images/Hero_image.jpg" alt="wikiNamek">
            </div>
            <div class="mr-auto place-self-center text-center lg:col-span-7">
                <h1 class="max-w-2xl mb-4 text-4xl  tracking-tight font-salsa leading-none md:text-5xl xl:text-6xl dark:text-white">Welcome To WikiNamek</h1>
                <p class="max-w-2xl mb-6 font-light text-gray-700 lg:mb-8 md:text-lg lg:text-xl dark:text-gray-400">your digital haven for boundless knowledge. Immerse yourself in a world of discovery, where curiosity knows no bounds. Explore meticulously
                    curated articles, unravel fascinating insights, and embark on a journey of continuous learning. At Wikinamek, we believe in the power of shared
                    wisdom to inspire and enlighten. Join our community, and let the adventure of knowledge unfold before your eyes."</p>
                <a href="wikis" class="inline-flex items-center justify-center px-5 py-3 text-base font-medium text-center text-gray-900 border border-gray-800  rounded-lg hover:bg-gray-100 focus:ring-4 focus:ring-gray-100 dark:text-white dark:border-gray-700 dark:hover:bg-gray-700 dark:focus:ring-gray-800">
                    Discover Wikis
                </a>
                <?php if(!isset($_SESSION)):?>
                <a href="signin" class="inline-flex items-center justify-center px-5 py-3 mr-3 text-base font-medium text-center text-gray-800 dark:text-white rounded-lg bg-primary-700 hover:bg-primary-800 focus:ring-4 focus:ring-primary-300 dark:focus:ring-primary-900">
                    Get started
                    <svg class="w-5 h-5 ml-2 -mr-1" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg">
                        <path fill-rule="evenodd" d="M10.293 3.293a1 1 0 011.414 0l6 6a1 1 0 010 1.414l-6 6a1 1 0 01-1.414-1.414L14.586 11H3a1 1 0 110-2h11.586l-4.293-4.293a1 1 0 010-1.414z" clip-rule="evenodd"></path>
                    </svg>
                </a>
                <?php endif?>
            </div>
        </div>
    </section>

    <!-- Recent Wikis -->
    <section class="bg-white dark:bg-gray-800">
        <div class="py-8 px-4 mx-auto max-w-screen-xl lg:px-6 ">
            <div class="mx-auto max-w-screen-sm text-center mb-8 lg:mb-16">
                <h2 class="mb-4 text-4xl tracking-wider font-bold text-gray-900 dark:text-white">Explore the last posted Wikis</h2>
            </div>
            <div class="grid gap-8 mb-6 lg:mb-16 md:grid-cols-2 lg:grid-cols-3">
                <?php foreach ($wikis as $wiki) : ?>
                    <div class="max-w-sm bg-gray-300 border border-gray-200 rounded-lg shadow dark:bg-gray-900 dark:border-gray-700">
                        <img class="rounded-t-lg" src="public/assets/uploads/<?= $wiki['picture'] ?>" alt="Wiki Picture">
                        <div class="p-5">
                            <h5 class="mb-2 text-2xl font-bold tracking-tight text-gray-900 dark:text-white"><?= $wiki['title'] ?></h5>
                            <p class="mb-3 font-normal text-gray-700 dark:text-gray-400"><?= $wiki['description'] ?></p>
                            <form action="singlepage" method="POST">
                                <input type="hidden" name="id" value="<?= $wiki['id'] ?>">
                                <button type="submit" href="singlepage" class="inline-flex items-center px-3 py-2 text-sm font-medium text-center text-white bg-blue-700 rounded-lg hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800">
                                    Read more
                                    <svg class="rtl:rotate-180 w-3.5 h-3.5 ms-2" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 14 10">
                                        <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M1 5h12m0 0L9 1m4 4L9 9">
                                    </svg>
                                </button>
                                </form>
                        </div>
                    </div>
                <?php endforeach ?>
            </div>
        </div>
    </section>

    <!-- Most Popular Authors -->

    <section>
        <div class="py-8 px-4 mx-auto max-w-screen-xl lg:px-6 ">
            <div class="mx-auto max-w-screen-sm text-center mb-8 lg:mb-16">
                <h2 class="mb-4 text-4xl tracking-wider font-bold text-gray-900 dark:text-white">Our Most Popular Authors</h2>
                <!-- <p class="font-light text-gray-500 lg:mb-16 sm:text-xl dark:text-gray-400">Explore the whole collection of open-source web components and elements built with the utility classes from Tailwind</p> -->
            </div>
            <div class="grid gap-8 mb-6 lg:mb-16 md:grid-cols-2 lg:grid-cols-3">
                <?php foreach ($authors as $author):?>
                <div class="w-full max-w-sm bg-white border border-gray-200 rounded-lg shadow py-5 dark:bg-gray-800 dark:border-gray-700">
                    <div class="flex flex-col items-center">
                        <img class="w-24 h-24 mb-3 rounded-full shadow-lg" src="public/assets/uploads/<?= $author['profile']?>" alt="Author" />
                        <h5 class="mb-1 text-xl font-medium text-gray-900 dark:text-white"><?= $author['user_name']?></h5>
                        <span class="text-sm text-gray-500 dark:text-gray-400"><?= $author['email']?></span>
                        <div class="flex mt-4 md:mt-6">
                            <a href="wikis" class="inline-flex items-center px-4 py-2 text-sm font-medium text-center text-gray-900 bg-white border border-gray-300 rounded-lg hover:bg-gray-100 focus:ring-4 focus:outline-none focus:ring-gray-200 dark:bg-gray-800 dark:text-white dark:border-gray-600 dark:hover:bg-gray-700 dark:hover:border-gray-700 dark:focus:ring-gray-700 ms-3">Browse Wikis</a>
                        </div>
                    </div>
                </div>
                <?php endforeach?>

            </div>
        </div>
    </section>

    <!-- Footer -->
    <?php include "../app/View/includes/footer.php"; ?>



</body>
<script src="public/assets/js/navbar.js"></script>
<script src="public/assets/js/theme.js"></script>

</html>