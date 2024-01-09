<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?= $wiki['title'] ?></title>
    <meta name="keywords" content="HTML, CSS, Youcode, tailwindCSS, Wikinamek,Wiki, Wikis">
    <meta name="author" content="Zaiid Moumnii">
    <meta name="description" content="WikiNamek .. Your Gateway to infinit Insights">
    <link rel="stylesheet" href="public/assets/dist/output.css">
    <link rel="shortcut icon" href="<?= URL_DIR ?>public/assets/images/favicon.png" type="image/x-icon">
</head>

<body class="bg-gray-300 dark:bg-gray-900 text-gray-900 font-poppins">
    <?php
    include "../app/View/includes/navbar.php";
    ?>
    <!-- Content Section -->
    <section class="bg-white dark:bg-gray-900 pt-24">
        <div class="gap-16 items-center py-8 px-4 mx-auto max-w-screen-xl lg:flex lg:flex-col lg:py-16 lg:px-6">
            <div class="font-light text-center sm:text-lg dark:text-gray-400">
                <h2 class="mb-8 text-4xl tracking-wider font-salsa font-extrabold text-gray-900 dark:text-white"><?= $wiki['title'] ?></h2>
                <p class="text-black dark:text-gray-500 "><?= $wiki['description'] ?></p>
                <p class="mt-8 text-left text-gray-500 dark:text-gray-700 mb-4">by : <?= $wiki['author_id'] ?> <br> at <?= $wiki['creation_date'] ?><p>
            </div>
            <div class="mt-2 self-center">
                <img class=" rounded-lg" src="public/assets/uploads/<?= $wiki['picture'] ?>" alt="<?= $wiki['title']?>">
            </div>
            <div class="mt-2 text-black dark:text-gray-300">
                <p class="mb-4"><?= $wiki['content'] ?>
            </div>
        </div>
    </section>
    <!-- Footer -->
    <?php include "../app/View/includes/footer.php"; ?>



</body>
<script src="public/assets/js/navbar.js"></script>
<script src="public/assets/js/theme.js"></script>

</html>