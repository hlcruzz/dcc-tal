<div
    class="col-span-2 p-5 hidden xl:flex flex-col bg-white dark:bg-gray-800 shadow-md w-full sticky vh-100 overflow-hidden left-0 top-0">
    <div class="flex gap-3 items-center">
        <img src="./assets/img/chmsu-logo.png" class="w-[50px] h-[50px] object-cover" alt="">
        <div>
            <h1 class="text-gray-800 dark:text-white">CHMSU - DCC</h1>
            <p class="text-xs text-gray-500 dark:text-gray-400">Talisay Campus</p>
        </div>
    </div>

    <div class="flex flex-col justify-between mt-5 overflow-auto grow"
        style="scrollbar-gutter: stable; scrollbar-width: thin;">
        <ul class="flex flex-col gap-3">
            <!-- Dashboard -->
            <li
                class="flex rounded-lg transition-all ease-in-out duration-300 <?php echo $page == 'Dashboard' ? 'bg-green-500 text-white' : 'text-gray-600 hover:bg-green-100 dark:text-gray-300 dark:hover:bg-green-800' ?> text-sm">
                <a href="/dashboard" class="w-full p-4 ps-6">
                    <i class="fa-solid fa-house me-2"></i>Dashboard
                </a>
            </li>

            <!-- Visitors -->
            <li
                class="flex rounded-lg transition-all ease-in-out duration-300 <?php echo $page == 'Visitor' ? 'bg-green-500 text-white' : 'text-gray-600 hover:bg-green-100 dark:text-gray-300 dark:hover:bg-green-800' ?> text-sm">
                <a href="#" class="w-full p-4 ps-6">
                    <i class="fa-solid fa-user-group me-2"></i>Visitors
                </a>
            </li>

            <!-- Buildings Dropdown -->
            <li class="relative group">
                <a class="flex justify-between p-4 ps-6 items-center focus:outline-none group-focus-within:flex rounded-lg transition-all ease-in-out duration-300 text-gray-600 hover:bg-green-100 dark:text-gray-300 dark:hover:bg-green-800 text-sm cursor-pointer"
                    tabindex="0">
                    <span><i class="fa-solid fa-building-columns me-2"></i>Buildings</span>
                    <i
                        class="fa-solid fa-chevron-right group-focus-within:rotate-90 transition-transform ease-in-out duration-300"></i>
                </a>

                <ul
                    class="ms-2 max-h-0 overflow-hidden group-focus-within:max-h-96 bg-white dark:bg-gray-800 z-10 transition-all ease-in-out duration-500">
                    <li>
                        <a href="#"
                            class="block p-4 ps-6 hover:bg-green-100 text-gray-600 dark:text-gray-300 dark:hover:bg-green-800 hover:translate-x-2 transition-transform ease-in-out duration-300 text-sm rounded-lg">
                            <i class="fa-solid fa-briefcase me-1"></i> Administrative
                        </a>
                    </li>
                    <li>
                        <a href="/academic"
                            class="block p-4 ps-6 <?php echo $page == 'Buildings / Academic' || $page == 'Buildings / Academics / Facilities' ? 'bg-green-500 text-white' : 'text-gray-600 hover:bg-green-100 dark:text-gray-300 dark:hover:bg-green-800' ?> hover:translate-x-2 transition-transform ease-in-out duration-300 text-sm rounded-lg">
                            <i class="fa-solid fa-graduation-cap me-1"></i> Academic
                        </a>
                    </li>
                    <li>
                        <a href="#"
                            class="block p-4 ps-6 hover:bg-green-100 text-gray-600 dark:text-gray-300 dark:hover:bg-green-800 hover:translate-x-2 transition-transform ease-in-out duration-300 text-sm rounded-lg">
                            <i class="fa-solid fa-house-user me-1"></i> Residential
                        </a>
                    </li>
                    <li>
                        <a href="#"
                            class="block p-4 ps-6 hover:bg-green-100 text-gray-600 dark:text-gray-300 dark:hover:bg-green-800 hover:translate-x-2 transition-transform ease-in-out duration-300 text-sm rounded-lg">
                            <i class="fa-solid fa-futbol me-1"></i> Recreational
                        </a>
                    </li>
                    <li>
                        <a href="#"
                            class="block p-4 ps-6 hover:bg-green-100 text-gray-600 dark:text-gray-300 dark:hover:bg-green-800 hover:translate-x-2 transition-transform ease-in-out duration-300 text-sm rounded-lg">
                            <i class="fa-solid fa-wrench me-1"></i> Utility
                        </a>
                    </li>
                </ul>
            </li>

            <!-- Accounts -->
            <li
                class="flex rounded-lg transition-all ease-in-out duration-300 <?php echo $page == 'Accounts' ? 'bg-green-500 text-white' : 'text-gray-600 hover:bg-green-100 dark:text-gray-300 dark:hover:bg-green-800' ?> text-sm">
                <a href="#" class="w-full p-4 ps-6">
                    <i class="fa-solid fa-users me-2"></i>Accounts
                </a>
            </li>

            <!-- Activity Logs -->
            <li
                class="flex rounded-lg transition-all ease-in-out duration-300 <?php echo $page == 'Activity Logs' ? 'bg-green-500 text-white' : 'text-gray-600 hover:bg-green-100 dark:text-gray-300 dark:hover:bg-green-800' ?> text-sm">
                <a href="#" class="w-full p-4 ps-6">
                    <i class="fa-solid fa-arrow-trend-up me-2"></i>Activity Logs
                </a>
            </li>

            <!-- Archive -->
            <li
                class="flex rounded-lg transition-all ease-in-out duration-300 <?php echo $page == 'Archive' ? 'bg-green-500 text-white' : 'text-gray-600 hover:bg-green-100 dark:text-gray-300 dark:hover:bg-green-800' ?> text-sm">
                <a href="#" class="w-full p-4 ps-6">
                    <i class="fa-solid fa-box-archive me-2"></i>Archive
                </a>
            </li>
        </ul>

        <!-- Logout -->
        <li
            class="flex rounded-lg transition-all ease-in-out duration-300 text-gray-600 dark:text-gray-300 text-sm bg-white dark:bg-gray-800 hover:bg-green-100 dark:hover:bg-green-800 sticky bottom-0">
            <a href="/logout" class="w-full p-4 ps-6">
                <i class="fa-solid fa-right-from-bracket me-2"></i>Logout
            </a>
        </li>
    </div>
</div>