<?php
require_once "./user/components/checkToken.php";
?>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Home</title>
    <?php include "./global/links.php" ?>
    <script src="./user/js/app.js" type="module"></script>
    <script src="./user/js/maps.js" type="module"></script>
</head>

<body>
    <?php include "./user/components/sidebar.php" ?>
    <div class="h-screen w-screen relative">
        <div id="home-map" class="w-full h-full">

        </div>
        <div class="absolute top-0 right-0 w-1/2 z-20 flex items-end">
            <div class="w-full ms-5 mt-5 me-5 relative">
                <label for="default-search"
                    class="mb-2 text-sm font-medium text-gray-900 sr-only dark:text-white">Search</label>
                <div class="relative">
                    <div class="absolute inset-y-0 start-0 flex items-center ps-4 pointer-events-none">
                        <svg class="w-4 h-4 text-gray-500 dark:text-gray-400" aria-hidden="true"
                            xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 20 20">
                            <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                d="m19 19-4-4m0-7A7 7 0 1 1 1 8a7 7 0 0 1 14 0Z" />
                        </svg>
                    </div>
                    <input type="text" id="default-search"
                        class="block w-full p-4 ps-11 text-sm text-gray-900 border-gray-300 bg-gray-50 focus:ring-green-500 focus:border-green-500 rounded-xl"
                        placeholder="Search Buildings..." />
                </div>
                <div class="bg-white absolute w-full" id="search-results">

                </div>
            </div>

            <div class="fixed bottom-0 left-0 z-12 w-full bg-transparent p-3"></div>
        </div>

    </div>


</body>

</html>