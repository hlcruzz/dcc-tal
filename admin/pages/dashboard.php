<?php
require_once "./admin/components/checkToken.php";
?>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Dashboard</title>
    <?php include "./global/links.php" ?>
</head>
<?php
$page = "Dashboard";
include "./admin/components/drawer.php";
?>

<body>
    <div
        class="grid grid-cols-12 transition-all ease-in-out duration-500 h-full max-h-full overflow-hidden bg-green-100">
        <?php include "./admin/components/sidebar.php" ?>

        <!-- Main Content Area -->
        <div
            class="col-span-12 2xl:col-span-10 min-h-full overflow-auto bg-green-100 rounded-lg shadow-md p-5 flex flex-col gap-5">
            <div class="bg-white p-5 flex justify-between items-center">
                <div class="flex items-center gap-5">
                    <div class="cursor-pointer block 2xl:hidden" data-drawer-target="sidebar-drawer"
                        data-drawer-show="sidebar-drawer" data-drawer-placement="left" aria-controls="sidebar-drawer">
                        <i class="fa-solid fa-bars text-2xl "></i>
                    </div>
                    <h1 class="font-extrabold">Page / Dashboard</h1>
                </div>
                <div class="flex items-center gap-5">
                    <div class="relative w-10 h-10 flex items-center justify-center cursor-pointer"
                        data-drawer-target="notif-drawer" data-drawer-show="notif-drawer" data-drawer-placement="right"
                        aria-controls="notif-drawer">
                        <i class="fa-solid fa-bell text-2xl text-green-600"></i>
                        <span
                            class="top-0 right-0 absolute border-gray-300 bg-red-500 text-[8px] p-1 rounded-full text-white">22</span>
                    </div>
                    <div class="relative border rounded-full border-gray-300">
                        <img class="w-10 h-10 rounded-full object-contain" src="./assets/img/default.jpg" alt="">
                        <span
                            class="top-0 left-7 absolute  w-3.5 h-3.5 bg-green-400 border-2 border-gray-300  rounded-full"></span>
                    </div>
                </div>

            </div>

        </div>
    </div>
</body>

</html>