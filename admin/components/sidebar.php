<div
    class="col-span-2 p-5 hidden xl:flex flex-col bg-white dark:bg-gray-800 shadow-md w-full sticky vh-100 overflow-hidden left-0 top-0">
    <div class="flex gap-3 items-center">
        <img loading="lazy" src="./assets/img/chmsu-logo.png" class="w-[50px] h-[50px] object-cover" alt="">
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
                class="flex rounded-lg transition-all ease-in-out duration-300 <?php echo $page == 'Visitors' ? 'bg-green-500 text-white' : 'text-gray-600 hover:bg-green-100 dark:text-gray-300 dark:hover:bg-green-800' ?> text-sm">
                <a href="#" class="w-full p-4 ps-6">
                    <i class="fa-solid fa-user-group me-2"></i>Visitors
                </a>
            </li>

            <li
                class="flex rounded-lg transition-all ease-in-out duration-300 <?php echo $page == 'Buildings' ? 'bg-green-500 text-white' : 'text-gray-600 hover:bg-green-100 dark:text-gray-300 dark:hover:bg-green-800' ?> text-sm">
                <a href="/buildings" class="w-full p-4 ps-6">
                    <i class="fa-solid fa-building me-2"></i>Buildings
                </a>
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