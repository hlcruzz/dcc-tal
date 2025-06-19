<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin Login</title>
    <?php include "./global/links.php" ?>
    <script src="./admin/js/auth.js" type="module"></script>
    <script src="./admin/js/maps.js" type="module"></script>
</head>

<body>
    <div class="bg-white sm:bg-sky-200/80 h-full flex items-center justify-center overflow-auto">
        <div class="bg-white p-10 w-full max-h-full overflow-auto sm:w-[500px] ">
            <div class="flex flex-col justify-center items-center text-center">
                <img loading="lazy" src="./assets/img/chmsu-logo.png" class="w-[50px] h-[50px] object-cover" alt="">
                <h1 class="text-2xl mt-3">Digital Campus Concierge - Talisay</h1>
                <h1 class="text-2xl mt-3">Admin Login</h1>
            </div>
            <form class="flex flex-col mt-5" method="POST" id="adminForm">
                <div class="text-center text-sm text-red-500 font-medium" id="authAlert"></div>
                <div class="">
                    <label for="username" class="block mb-2 text-sm font-medium text-gray-900 ">Username</label>
                    <div class="flex items-center relative">
                        <i class="fa-solid fa-user-tie text-2xl p-2 px-3 text-gray-500  absolute"></i>
                        <input type="text" id="username" name="username"
                            class="ps-11 rounded-lg bg-gray-50 border border-gray-300 text-gray-900 text-sm focus:ring-green-500 focus:border-green-500 block w-full p-3 "
                            placeholder="Enter Username" required />
                    </div>
                </div>
                <div class="mt-5">
                    <label for="password" class="block mb-2 text-sm font-medium text-gray-900 ">Password</label>
                    <div class="flex items-center relative">
                        <i class="fa-solid fa-lock text-2xl p-2 px-3 text-gray-500  absolute"></i>
                        <input type="password" id="password" name="password"
                            class="ps-11 rounded-lg bg-gray-50 border border-gray-300 text-gray-900 text-sm focus:ring-green-500 focus:border-green-500 block w-full p-3 "
                            placeholder="Enter Password" required />
                        <div class="absolute right-3">
                            <i class="fa-solid fa-eye text-lg text-gray-500  cursor-pointer" id="seePass"></i>
                        </div>
                    </div>
                </div>
                <button type="submit"
                    class="text-white mt-5 bg-green-700 hover:bg-green-800 focus:ring-4 focus:outline-none focus:ring-green-300 font-medium rounded-lg text-sm w-full px-5 py-2.5 text-center cursor-pointer">Login
                    <i class="fa-solid fa-right-to-bracket ms-1"></i></button>
            </form>
        </div>
    </div>
</body>

</html>