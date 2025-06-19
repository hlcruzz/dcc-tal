<!-- drawer component -->
<div id="building-drawer"
    class="fixed top-0 left-0 z-40 h-screen p-4 overflow-y-auto transition-transform -translate-x-full bg-white dark:bg-gray-800"
    style="width: 45%" tabindex="-1" aria-labelledby="drawer-left-label">
    <h5 id="drawer-left-label"
        class="inline-flex items-center mb-4 text-base font-semibold text-gray-500 dark:text-gray-400"><svg
            class="w-4 h-4 me-2.5" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="currentColor"
            viewBox="0 0 20 20">
            <path
                d="M10 .5a9.5 9.5 0 1 0 9.5 9.5A9.51 9.51 0 0 0 10 .5ZM9.5 4a1.5 1.5 0 1 1 0 3 1.5 1.5 0 0 1 0-3ZM12 15H8a1 1 0 0 1 0-2h1v-3H8a1 1 0 0 1 0-2h2a1 1 0 0 1 1 1v4h1a1 1 0 0 1 0 2Z" />
        </svg>Building Information</h5>
    <button type="button" data-drawer-hide="building-drawer" aria-controls="building-drawer"
        class="text-gray-400 bg-transparent hover:bg-gray-200 hover:text-gray-900 rounded-lg text-sm w-8 h-8 absolute top-2.5 end-2.5 inline-flex items-center justify-center dark:hover:bg-gray-600 dark:hover:text-white">
        <svg class="w-3 h-3" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 14 14">
            <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                d="m1 1 6 6m0 0 6 6M7 7l6-6M7 7l-6 6" />
        </svg>
        <span class="sr-only">Close menu</span>
    </button>
    <div>
        <div class="swiper mySwiper w-full h-96">
            <div class="swiper-wrapper" id="building-swiper">

            </div>
            <!-- Navigation buttons (optional) -->
            <div class="swiper-button-next"></div>
            <div class="swiper-button-prev"></div>
        </div>
        <div class="mt-5">
            <h1 class="building-name text-2xl font-bold text-gray-800 dark:text-white mb-2"></h1>
            <p id="building-desc" class="text-sm text-gray-600 dark:text-gray-300 leading-relaxed">
            </p>
            <div class="mt-6">
                <form id="routeForm" class="space-y-4">
                    <input type="hidden" id="buildingId" name="buildingId">
                    <input type="hidden" id="buildingName" name="buildingName">
                    <!-- <label for="destination" class="block text-sm font-medium text-gray-700">Select your destination
                        inside <span class="building-name"></span></label>
                    <select id="destination" name="destination"
                        class="w-full px-4 py-2 text-sm border border-gray-300 rounded-lg focus:ring-green-500 focus:border-green-500">
                        <option value="" selected hidden>Select a room or office</option>
                        <option value="Main Library">Campus Library</option>
                        <option value="LSAB Room 310">LSAB Room 310</option>
                        <option value="LSAB Room 311">LSAB Room 311</option>
                        <option value="LSAB Room 312">LSAB Room 312</option>
                        <option value="LSAB Room 313">LSAB Room 313</option>
                        <option value="LSAB Room 314">LSAB Room 314</option>
                        <option value="LSAB Room 315">LSAB Room 315</option>
                    </select> -->

                    <label for="visitPurpose" class="block text-sm font-medium text-gray-700">Purpose of Visit</label>
                    <textarea id="visitPurpose" name="visitPurpose" rows="4" required
                        placeholder="Type your purpose here"
                        class="w-full px-4 py-2 text-sm border border-gray-300 rounded-lg focus:ring-green-500 focus:border-green-500"></textarea>

                    <button type="submit"
                        class="w-full inline-flex items-center justify-center px-4 py-3 text-sm font-medium text-white bg-green-600 rounded-lg hover:bg-green-700 focus:ring-4 focus:ring-green-300 cursor-pointer">
                        <i class="fa-solid fa-route me-1"></i> View Route
                    </button>
                </form>
            </div>
        </div>
    </div>
</div>