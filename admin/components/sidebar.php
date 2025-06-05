<?php
// $styles = "";
// switch ($page) {
//     case 'Dashboard':
//         $styles = "font-medium bg-green-500 text-white";
//         break;
//     case 'Visitors':
//         $styles = "font-medium bg-green-500 text-white";
//         break;
//     default:
//         $styles = "text-gray-600 hover:bg-green-100/70";
//         break;
// }
?>
<!-- Sidebar -->
<div class="col-span-2 p-5 hidden 2xl:grid grid-rows-12 gap-5 bg-white rounded-lg shadow-md w-full ">
    <div class="flex gap-3 items-center row-span-1">
        <img src="./assets/img/chmsu-logo.png" class="w-[50px] h-[50px] object-cover" alt="">
        <div>
            <h1 class="font-extrabold text-xl">CHMSU - DCC</h1>
            <p class="text-xs">Talisay Campus</p>
        </div>
    </div>

    <div class="row-span-11 flex flex-col justify-between">
        <div class="max-h-full overflow-auto">
            <ul class="flex flex-col gap-3">
                <!-- Dashboard -->
                <li
                    class="flex rounded-lg <?php echo $page == "Dashboard" ? "font-medium bg-green-500 text-white" : "text-gray-600 hover:bg-green-100/70" ?>">
                    <a href="" class="w-full p-4 ps-6">
                        <i class="fa-solid fa-house me-2"></i>Dashboard
                    </a>
                </li>

                <!-- Visitors -->
                <li
                    class="flex rounded-lg <?php echo $page == "Visitor" ? "font-medium bg-green-500 text-white" : "text-gray-600 hover:bg-green-100/70" ?>">
                    <a href="" class="w-full p-4 ps-6">
                        <i class="fa-solid fa-user-group me-2"></i>Visitors
                    </a>
                </li>


                <!-- Buildings Dropdown -->
                <li class="relative group">
                    <a href="#"
                        class="flex justify-between p-4 ps-6 items-center focus:outline-none focus:bg-green-500 group-focus-within:flex rounded-lg text-gray-600 hover:bg-green-100/70 focus:text-white"
                        tabindex="0">
                        <span>
                            <i class="fa-solid fa-building-columns me-2 text-xl"></i>Buildings
                        </span>
                        <i
                            class="fa-solid fa-chevron-right group-focus-within:transform-[rotate(90deg)] transition-transform ease-in-out duration-300"></i>
                    </a>

                    <ul
                        class="ms-2 max-h-0 overflow-hidden group-focus-within:max-h-96 bg-white z-10 transition-all ease-in-out duration-500">
                        <li>
                            <a href="#"
                                class="block p-4 ps-6 hover:bg-green-100/70 text-gray-600 hover:translate-x-2 transition-transform ease-in-out duration-300">
                                <i class="fa-solid fa-briefcase me-1"></i> Administrative
                            </a>
                        </li>
                        <li>
                            <a href="#"
                                class="block p-4 ps-6 hover:bg-green-100/70 text-gray-600 hover:translate-x-2 transition-transform ease-in-out duration-300">
                                <i class="fa-solid fa-graduation-cap me-1"></i> Academic
                            </a>
                        </li>
                        <li>
                            <a href="#"
                                class="block p-4 ps-6 hover:bg-green-100/70 text-gray-600 hover:translate-x-2 transition-transform ease-in-out duration-300">
                                <i class="fa-solid fa-house-user me-1"></i> Residential
                            </a>
                        </li>
                        <li>
                            <a href="#"
                                class="block p-4 ps-6 hover:bg-green-100/70 text-gray-600 hover:translate-x-2 transition-transform ease-in-out duration-300">
                                <i class="fa-solid fa-futbol me-1"></i> Recreational
                            </a>
                        </li>
                        <li>
                            <a href="#"
                                class="block p-4 ps-6 hover:bg-green-100/70 text-gray-600 hover:translate-x-2 transition-transform ease-in-out duration-300">
                                <i class="fa-solid fa-wrench me-1"></i> Utility
                            </a>
                        </li>

                    </ul>
                </li>
                <li
                    class="flex rounded-lg text-gray-600 hover:bg-green-100/70  <?php echo $page == "Accounts" ? "font-medium bg-green-500 text-white" : "text-gray-600 hover:bg-green-100/70" ?>">
                    <a href="" class="w-full p-4 ps-6">
                        <i class="fa-solid fa-users me-2 text-lg"></i>Accounts
                    </a>
                </li>
                <li
                    class="flex rounded-lg text-gray-600 hover:bg-green-100/70  <?php echo $page == "Activity Logs" ? "font-medium bg-green-500 text-white" : "text-gray-600 hover:bg-green-100/70" ?>">
                    <a href="" class="w-full p-4 ps-6">
                        <i class="fa-solid fa-arrow-trend-up me-2 text-lg"></i>Activity Logs
                    </a>
                </li>

            </ul>
        </div>

        <!-- Logout -->
        <li class="flex rounded-lg text-gray-600 hover:bg-green-100/70">
            <a href="/logout" class="w-full p-4 ps-6">
                <i class="fa-solid fa-right-from-bracket text-lg me-2"></i>Logout
            </a>
        </li>
    </div>
</div>