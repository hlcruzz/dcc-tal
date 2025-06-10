<?php
require_once "./admin/components/checkToken.php";
if ((!isset($_GET['building_id']) || empty($_GET['building_id'])) || (!isset($_GET['building_name']) || empty($_GET['building_name'])) || (!isset($_GET['building_type']) || empty($_GET['building_type']))) {
    header("Location: /dashboard");
    exit();
}
$page = "Buildings / " . $_GET['building_type'] . " / " . $_GET['building_name'];
?>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?php echo $page ?></title>
    <?php
    include "./global/links.php";
    include "./admin/components/drawer.php";
    include "./admin/components/modal.php";
    ?>
    <script type="module" src="./admin/js/app.js"></script>

</head>

<body>

    <div class="grid grid-cols-12 transition-all ease-in-out duration-500 h-screen max-h-screen overflow-auto">
        <?php
        include "./admin/components/sidebar.php";
        include "./admin/components/switch.php";
        ?>


        <!-- Main Content Area -->
        <div
            class="col-span-12 xl:col-span-10 min-h-screen overflow-auto bg-green-100 dark:bg-emerald-900 shadow-md p-5">
            <?php include "./admin/components/header.php" ?>
            <div class="bg-white dark:bg-gray-800 rounded-lg mt-5 overflow-auto">
                <div
                    class="flex flex-col gap-5 smg:gap-0 sm:flex-row sm:items-center justify-between border-b border-gray-300 dark:border-gray-700 p-5 px-7">
                    <h1 class="font-medium text-md sm:text-xl text-gray-900 dark:text-gray-100"><?php echo $page ?>
                        Table
                    </h1>
                    <button type="button" data-modal-target="add-facility-modal" data-modal-toggle="add-facility-modal"
                        class="focus:outline-none text-xs text-white bg-green-700 hover:bg-green-800 focus:ring-4 focus:ring-green-300 dark:bg-green-600 dark:hover:bg-green-700 dark:focus:ring-green-800 font-medium rounded-lg px-5 py-2.5 me-2">
                        <i class="fa-solid fa-plus me-1"></i>Add
                    </button>
                </div>
                <div class="p-5 px-7">
                    <table id="table-facility-<?php echo $_GET['building_id'] ?>"
                        class="table w-full text-gray-900 dark:text-gray-100">
                        <thead>
                            <tr>
                                <th>
                                    <span class="flex items-center">
                                        #
                                        <svg class="w-4 h-4 ms-1" aria-hidden="true" xmlns="http://www.w3.org/2000/svg"
                                            width="24" height="24" fill="none" viewBox="0 0 24 24">
                                            <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round"
                                                stroke-width="2" d="m8 15 4 4 4-4m0-6-4-4-4 4" />
                                        </svg>
                                    </span>
                                </th>
                                <th>
                                    <span class="flex items-center text-left">
                                        Facility Name
                                        <svg class="w-4 h-4 ms-1" aria-hidden="true" xmlns="http://www.w3.org/2000/svg"
                                            width="24" height="24" fill="none" viewBox="0 0 24 24">
                                            <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round"
                                                stroke-width="2" d="m8 15 4 4 4-4m0-6-4-4-4 4" />
                                        </svg>
                                    </span>
                                </th>
                                <th>
                                    <span class="flex items-center text-left">
                                        Floor #
                                        <svg class="w-4 h-4 ms-1" aria-hidden="true" xmlns="http://www.w3.org/2000/svg"
                                            width="24" height="24" fill="none" viewBox="0 0 24 24">
                                            <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round"
                                                stroke-width="2" d="m8 15 4 4 4-4m0-6-4-4-4 4" />
                                        </svg>
                                    </span>
                                </th>

                                <th>
                                    <span class="flex items-center">
                                        Room #
                                        <svg class="w-4 h-4 ms-1" aria-hidden="true" xmlns="http://www.w3.org/2000/svg"
                                            width="24" height="24" fill="none" viewBox="0 0 24 24">
                                            <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round"
                                                stroke-width="2" d="m8 15 4 4 4-4m0-6-4-4-4 4" />
                                        </svg>
                                    </span>
                                </th>
                                <th>
                                    <span class="flex items-center">
                                        Description
                                        <svg class="w-4 h-4 ms-1" aria-hidden="true" xmlns="http://www.w3.org/2000/svg"
                                            width="24" height="24" fill="none" viewBox="0 0 24 24">
                                            <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round"
                                                stroke-width="2" d="m8 15 4 4 4-4m0-6-4-4-4 4" />
                                        </svg>
                                    </span>
                                </th>
                                <th>
                                    <span class="flex items-center">
                                        Date
                                        <svg class="w-4 h-4 ms-1" aria-hidden="true" xmlns="http://www.w3.org/2000/svg"
                                            width="24" height="24" fill="none" viewBox="0 0 24 24">
                                            <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round"
                                                stroke-width="2" d="m8 15 4 4 4-4m0-6-4-4-4 4" />
                                        </svg>
                                    </span>
                                </th>
                                <th>
                                    <span class="flex items-center">
                                        Action
                                    </span>
                                </th>
                            </tr>
                        </thead>
                        <tbody>

                        </tbody>
                    </table>
                </div>
            </div>



        </div>
    </div>

</body>

</html>