<div class="bg-white dark:bg-gray-800 p-3 px-6 rounded-lg flex justify-between items-center">
    <div class="flex items-center gap-5">
        <div class="cursor-pointer block xl:hidden" data-drawer-target="sidebar-drawer"
            data-drawer-show="sidebar-drawer" data-drawer-placement="left" aria-controls="sidebar-drawer">
            <i class="fa-solid fa-bars text-2xl text-gray-800 dark:text-white"></i>
        </div>
        <h1 class="text-sm text-gray-800 dark:text-white">Dashboard / <?php echo $page ?></h1>
    </div>
    <div class="flex items-center gap-5">
        <div class="relative w-10 h-10 flex items-center justify-center cursor-pointer"
            data-drawer-target="notif-drawer" data-drawer-show="notif-drawer" data-drawer-placement="right"
            aria-controls="notif-drawer">
            <i class="fa-solid fa-bell text-2xl text-green-600 dark:text-green-400"></i>
            <span
                class="top-0 right-0 absolute border-gray-300 dark:border-gray-700 bg-red-500 text-[8px] p-1 rounded-full text-white">22</span>
        </div>
        <div class="relative border rounded-full border-gray-300 dark:border-gray-600">
            <img class="w-10 h-10 rounded-full object-contain" src="./assets/img/default.jpg" alt="">
            <span
                class="top-0 left-7 absolute w-3.5 h-3.5 bg-green-400 border-2 border-gray-300 dark:border-gray-600 rounded-full"></span>
        </div>
    </div>
</div>