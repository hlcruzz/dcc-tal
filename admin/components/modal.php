<!-- Main modal -->
<div id="add-building-modal" tabindex="-1" aria-hidden="true"
    class="hidden overflow-y-auto overflow-x-hidden fixed top-0 right-0 left-0 z-50 justify-center items-center w-full md:inset-0 h-[calc(100%-1rem)] max-h-full">
    <div class="relative p-4 w-full max-w-md max-h-full">
        <!-- Modal content -->
        <div class="relative bg-white dark:bg-gray-800 rounded-lg shadow-sm">
            <!-- Modal header -->
            <div
                class="flex items-center justify-between p-4 md:p-5 border-b border-gray-200 dark:border-gray-600 rounded-t">
                <h3 class="text-lg font-semibold text-gray-900 dark:text-white">
                    Add New Building
                </h3>
                <button type="button"
                    class="text-gray-400 bg-transparent hover:bg-gray-200 dark:hover:bg-gray-700 hover:text-gray-900 dark:hover:text-white rounded-lg text-sm w-8 h-8 ms-auto inline-flex justify-center items-center"
                    data-modal-hide="add-building-modal">
                    <svg class="w-3 h-3" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 14 14">
                        <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                            d="m1 1 6 6m0 0 6 6M7 7l6-6M7 7l-6 6" />
                    </svg>
                    <span class="sr-only">Close modal</span>
                </button>
            </div>
            <!-- Modal body -->
            <form id="add-building-form" class="p-4 md:p-5" method="POST">
                <div class="grid gap-4 mb-4 grid-cols-2">
                    <div class="col-span-2">
                        <label class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Upload
                            Images</label>
                        <input
                            class="block w-full text-sm text-gray-900 dark:text-white border border-gray-300 dark:border-gray-600 rounded-lg cursor-pointer bg-gray-50 dark:bg-gray-700"
                            aria-describedby="file_input_help" id="building_img" name="building_img[]" type="file"
                            multiple accept=".jpg, .png, .jpeg" required>
                        <p class="mt-1 text-[10px] text-gray-500 dark:text-gray-400">PNG, JPG, JPEG (MAX PER FILE :
                            5MB).</p>
                    </div>
                    <div class="col-span-2">
                        <label for="building_name"
                            class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Building Name</label>
                        <input type="text" name="building_name" id="building_name"
                            class="bg-gray-50 dark:bg-gray-700 border border-gray-300 dark:border-gray-600 text-gray-900 dark:text-white text-sm rounded-lg focus:ring-green-600 focus:border-green-600 block w-full p-2.5"
                            placeholder="Enter Building Name" maxlength="50" required>
                    </div>
                    <div class="col-span-2 flex items-center gap-3">
                        <p class="flex items-center text-sm text-gray-500 dark:text-gray-400">Is it structured?
                            <button data-popover-target="popover-is-structured" data-popover-placement="bottom-end"
                                type="button">
                                <i class="fa-solid fa-circle-question ms-2"></i>
                            </button>
                        </p>
                        <div data-popover id="popover-is-structured" role="tooltip"
                            class="absolute z-10 invisible inline-block text-sm text-gray-500 dark:text-gray-400 transition-opacity duration-300 bg-white dark:bg-gray-800 border border-gray-200 dark:border-gray-600 rounded-lg shadow-xs opacity-0 w-72">
                            <div class="p-3 space-y-2">
                                <h3 class="font-semibold text-gray-900 dark:text-white">Is it structured?</h3>
                                <p>This option indicates whether the building has individual rooms or offices (like
                                    classrooms, labs, or admin offices).</p>
                                <p>If the building is a single open space (like a gymnasium, oval, or parking lot),
                                    leave this unchecked.</p>
                                <h3 class="font-semibold text-gray-900 dark:text-white">Purpose</h3>
                                <p>This helps the system know if floor numbers and room details should be added for this
                                    location.</p>
                            </div>
                            <div data-popper-arrow></div>
                        </div>
                        <input id="is_structured" name="is_structured" type="checkbox" value="1"
                            class="w-4 h-4 text-green-600 bg-gray-100 dark:bg-gray-700 border-gray-300 dark:border-gray-600 rounded-sm focus:ring-green-500">
                    </div>
                    <div class="col-span-2 sm:col-span-1">
                        <label for="latitude"
                            class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Latitude</label>
                        <input type="number" name="latitude" id="latitude"
                            class="bg-gray-50 dark:bg-gray-700 border border-gray-300 dark:border-gray-600 text-gray-900 dark:text-white text-sm rounded-lg focus:ring-green-600 focus:border-green-600 block w-full p-2.5"
                            placeholder="Enter Latitude" step="any" required>
                    </div>
                    <div class="col-span-2 sm:col-span-1">
                        <label for="longitude"
                            class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Longitude</label>
                        <input type="number" name="longitude" id="longitude"
                            class="bg-gray-50 dark:bg-gray-700 border border-gray-300 dark:border-gray-600 text-gray-900 dark:text-white text-sm rounded-lg focus:ring-green-600 focus:border-green-600 block w-full p-2.5"
                            placeholder="Enter Longitude" step="any" required>
                    </div>
                </div>
                <button type="button"
                    class="get-location text-white bg-green-700 hover:bg-green-800 focus:ring-4 focus:outline-none focus:ring-green-300 font-medium rounded-lg text-sm px-5 py-2.5 w-full">
                    <i class="fa-solid fa-location-dot me-1"></i> Get Current Location
                </button>
                <button type="submit"
                    class="text-white bg-green-700 hover:bg-green-800 focus:ring-4 focus:outline-none focus:ring-green-300 font-medium rounded-lg text-sm px-5 py-2.5 w-full mt-3">
                    <i class="fa-solid fa-plus me-1"></i> Add Building
                </button>
            </form>
        </div>
    </div>
</div>

<!-- Main modal -->
<div id="edit-building-modal" tabindex="-1" aria-hidden="true"
    class="hidden overflow-y-auto overflow-x-hidden fixed top-0 right-0 left-0 z-50 justify-center items-center w-full md:inset-0 h-[calc(100%-1rem)] max-h-full">
    <div class="relative p-4 w-full max-w-md max-h-full">
        <!-- Modal content -->
        <div class="relative bg-white dark:bg-gray-800 rounded-lg shadow-sm ">
            <!-- Modal header -->
            <div
                class="flex items-center justify-between p-4 md:p-5 border-b rounded-t border-gray-200 dark:border-gray-700">
                <h3 class="text-lg font-semibold text-gray-900 dark:text-gray-100">
                    Edit Academic Building
                </h3>
                <button type="button"
                    class="text-gray-400 bg-transparent hover:bg-gray-200 hover:text-gray-900 dark:hover:bg-gray-700 dark:hover:text-white rounded-lg text-sm w-8 h-8 ms-auto inline-flex justify-center items-center "
                    data-modal-hide="edit-building-modal">
                    <svg class="w-3 h-3" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 14 14">
                        <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                            d="m1 1 6 6m0 0 6 6M7 7l6-6M7 7l-6 6" />
                    </svg>
                    <span class="sr-only">Close modal</span>
                </button>
            </div>
            <!-- Modal body -->
            <form id="edit-academics-form" class="p-4 md:p-5" method="POST">
                <div class="grid gap-4 mb-4 grid-cols-2">
                    <input type="hidden" id="edit_building_id" name="edit_building_id">
                    <div class="col-span-2">
                        <div class="swiper mySwiper w-full h-96">
                            <div class="swiper-wrapper" id="edit-academics-swiper">
                                <!-- Slides go here dynamically -->
                            </div>

                            <!-- Navigation buttons (optional) -->
                            <div class="swiper-button-next"></div>
                            <div class="swiper-button-prev"></div>
                        </div>
                    </div>
                    <div class="col-span-2">
                        <label class="block mb-2 text-sm font-medium text-gray-900 dark:text-gray-300">Upload
                            Images</label>
                        <input
                            class="block w-full text-sm text-gray-900 border border-gray-300 rounded-lg cursor-pointer bg-gray-50 dark:bg-gray-700 dark:text-gray-200 dark:border-gray-600"
                            aria-describedby="edit_building_img" id="edit_building_img" name="edit_building_img[]"
                            type="file" multiple accept=".jpg, .png, .jpeg">
                        <p class="mt-1 text-[10px] text-gray-500 dark:text-gray-400">PNG, JPG, JPEG (MAX PER FILE :
                            5MB).</p>

                    </div>
                    <div class="col-span-2">
                        <label for="edit_building_name"
                            class="block mb-2 text-sm font-medium text-gray-900 dark:text-gray-300">Building
                            Name</label>
                        <input type="text" name="edit_building_name" id="edit_building_name"
                            class="bg-gray-50 border border-gray-300 text-gray-900 dark:bg-gray-700 dark:border-gray-600 dark:text-gray-200 text-sm rounded-lg focus:ring-green-600 focus:border-green-600 block w-full p-2.5 "
                            placeholder="Enter Building Name" maxlength="50" required>
                    </div>
                    <div class="col-span-2 flex items-center gap-3">
                        <p class="flex items-center text-sm text-gray-500 dark:text-gray-400">Is it structured?<button
                                data-popover-target="edit-popover-is-structured" data-popover-placement="bottom-end"
                                type="button"><i class="fa-solid fa-circle-question ms-2"></i></button></p>
                        <div data-popover id="edit-popover-is-structured" role="tooltip"
                            class="absolute z-10 invisible inline-block text-sm text-gray-500 dark:text-gray-400 transition-opacity duration-300 bg-white dark:bg-gray-800 border border-gray-200 dark:border-gray-700 rounded-lg shadow-xs opacity-0 w-72">
                            <div class="p-3 space-y-2">
                                <h3 class="font-semibold text-gray-900 dark:text-gray-100">Is it structured?</h3>
                                <p>This option indicates whether the building has individual rooms or offices (like
                                    classrooms, labs, or admin offices).</p>
                                <p>If the building is a single open space (like a gymnasium, oval, or parking lot),
                                    leave this unchecked.</p>
                                <h3 class="font-semibold text-gray-900 dark:text-gray-100">Purpose</h3>
                                <p>This helps the system know if floor numbers and room details should be added for this
                                    location.</p>
                            </div>
                            <div data-popper-arrow></div>
                        </div>
                        <input id="edit_is_structured" name="edit_is_structured" type="checkbox"
                            class="w-4 h-4 text-green-600 bg-gray-100 border-gray-300 dark:bg-gray-700 dark:border-gray-600 rounded-sm focus:ring-green-500 ">

                    </div>
                    <div class="col-span-2 sm:col-span-1">
                        <label for="edit_academics_latitude"
                            class="block mb-2 text-sm font-medium text-gray-900 dark:text-gray-300">Latitude</label>
                        <input type="number" name="edit_academics_latitude" id="edit_academics_latitude"
                            class="bg-gray-50 border border-gray-300 text-gray-900 dark:bg-gray-700 dark:border-gray-600 dark:text-gray-200 text-sm rounded-lg focus:ring-green-600 focus:border-green-600 block w-full p-2.5"
                            placeholder="Enter Latitude" step="any" required>
                    </div>
                    <div class="col-span-2 sm:col-span-1">
                        <label for="edit_academics_longitude"
                            class="block mb-2 text-sm font-medium text-gray-900 dark:text-gray-300">Longitude</label>
                        <input type="number" name="edit_academics_longitude" id="edit_academics_longitude"
                            class="bg-gray-50 border border-gray-300 text-gray-900 dark:bg-gray-700 dark:border-gray-600 dark:text-gray-200 text-sm rounded-lg focus:ring-green-600 focus:border-green-600 block w-full p-2.5"
                            placeholder="Enter Longitude" step="any" required>
                    </div>
                </div>
                <button type="button"
                    class="get-location text-white bg-green-700 hover:bg-green-800 focus:ring-4 focus:outline-none focus:ring-green-300 font-medium rounded-lg text-sm px-5 py-2.5 w-full">
                    <i class="fa-solid fa-location-dot me-1"></i> Get Current Location
                </button>
                <button
                    class="text-white bg-green-700 hover:bg-green-800 focus:ring-4 focus:outline-none focus:ring-green-300 font-medium rounded-lg text-sm px-5 py-2.5 w-full mt-3"
                    type="submit">Save Changes</button>
            </form>
        </div>
    </div>
</div>

<div id="add-facility-modal" tabindex="-1" aria-hidden="true"
    class="hidden overflow-y-auto overflow-x-hidden fixed top-0 right-0 left-0 z-50 justify-center items-center w-full md:inset-0 h-[calc(100%-1rem)] max-h-full">
    <div class="relative p-4 w-full max-w-md max-h-full">
        <div class="relative bg-white dark:bg-gray-800 rounded-lg shadow-sm">

            <div
                class="flex items-center justify-between p-4 md:p-5 border-b border-gray-200 dark:border-gray-600 rounded-t">
                <h3 class="text-lg font-semibold text-gray-900 dark:text-white">
                    Add <?php echo $_GET['building_name'] ?? null ?> Facility
                </h3>
                <button type="button"
                    class="text-gray-400 bg-transparent hover:bg-gray-200 hover:text-gray-900 dark:hover:bg-gray-700 dark:hover:text-white rounded-lg text-sm w-8 h-8 ms-auto inline-flex justify-center items-center"
                    data-modal-hide="add-facility-modal">
                    <svg class="w-3 h-3" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 14 14">
                        <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                            d="m1 1 6 6m0 0 6 6M7 7l6-6M7 7l-6 6" />
                    </svg>
                    <span class="sr-only">Close modal</span>
                </button>
            </div>

            <form id="add-facility-form" class="p-4 md:p-5" method="POST">
                <div class="grid gap-4 mb-4 grid-cols-2">
                    <div class="col-span-2">
                        <input type="hidden" id="building_id" name="building_id"
                            value="<?php echo $_GET['building_id'] ?? null ?>">
                        <label class="block mb-2 text-sm font-medium text-gray-900 dark:text-gray-200"
                            for="facility_img">Upload file</label>
                        <input
                            class="block w-full text-sm text-gray-900 dark:text-white border border-gray-300 dark:border-gray-600 rounded-lg cursor-pointer bg-gray-50 dark:bg-gray-700"
                            aria-describedby="facility_img" id="facility_img" name="facility_img[]" type="file" multiple
                            accept=".jpg, .png, .jpeg" required>
                        <p class="mt-1 text-[10px] text-gray-500 dark:text-gray-400">PNG, JPG, JPEG (MAX PER FILE :
                            5MB).</p>
                    </div>

                    <div class="col-span-2">
                        <label for="facilityName"
                            class="block mb-2 text-sm font-medium text-gray-900 dark:text-gray-200">Facility
                            Name</label>
                        <input type="text" name="facilityName" id="facilityName"
                            class="bg-gray-50 dark:bg-gray-700 border border-gray-300 dark:border-gray-600 text-gray-900 dark:text-white text-sm rounded-lg focus:ring-green-600 focus:border-green-600 block w-full p-2.5"
                            placeholder="Enter Facility Name" maxlength="50" required>
                    </div>

                    <div class="col-span-2">
                        <div class="flex items-center gap-3">
                            <label for="hasRoomNum"
                                class="block text-sm font-medium text-gray-900 dark:text-gray-200">Has Room
                                Number?</label>
                            <input id="hasRoomNum" name="hasRoomNum" type="checkbox"
                                class="w-4 h-4 text-green-600 bg-gray-100 dark:bg-gray-700 border-gray-300 dark:border-gray-600 rounded-sm focus:ring-green-500">
                        </div>
                        <div class="mt-3 hidden" id="hasRoomNumCont">
                            <input type="number" name="roomNumber" id="roomNumber"
                                onkeypress="if(this.value.length == 5) return false"
                                class="bg-gray-50 dark:bg-gray-700 border border-gray-300 dark:border-gray-600 text-gray-900 dark:text-white text-sm rounded-lg focus:ring-green-600 focus:border-green-600 block w-full p-2.5"
                                placeholder="Enter Room Number">
                        </div>
                    </div>

                    <div class="col-span-2">
                        <div class="flex items-center gap-3">
                            <label for="hasFloorNum"
                                class="block text-sm font-medium text-gray-900 dark:text-gray-200">Has Floor
                                Number?</label>
                            <input id="hasFloorNum" name="hasFloorNum" type="checkbox"
                                class="w-4 h-4 text-green-600 bg-gray-100 dark:bg-gray-700 border-gray-300 dark:border-gray-600 rounded-sm focus:ring-green-500">
                        </div>
                        <div class="mt-3 hidden" id="hasFloorNumCont">
                            <select id="floorNumber" name="floorNumber"
                                class="bg-gray-50 dark:bg-gray-700 border border-gray-300 dark:border-gray-600 text-gray-900 dark:text-white text-sm rounded-lg focus:ring-green-500 focus:border-green-500 block w-full p-2.5">
                                <option selected hidden>Choose an option</option>
                                <option value="1st">1st (Ground Floor)</option>
                                <option value="2nd">2nd Floor</option>
                                <option value="3rd">3rd Floor</option>
                                <option value="4th">4th Floor</option>
                            </select>
                        </div>
                    </div>

                    <div class="col-span-2">
                        <label for="facility_desc"
                            class="block mb-2 text-sm font-medium text-gray-900 dark:text-gray-200">Description</label>
                        <textarea id="facility_desc" name="facility_desc" rows="4"
                            class="block p-2.5 w-full text-sm text-gray-900 dark:text-white bg-gray-50 dark:bg-gray-700 rounded-lg border border-gray-300 dark:border-gray-600 focus:ring-blue-500 focus:border-blue-500"
                            placeholder="Enter Facility Description"></textarea>
                    </div>

                    <div class="col-span-2 sm:col-span-1">
                        <label for="latitude_facility"
                            class="block mb-2 text-sm font-medium text-gray-900 dark:text-gray-200">Latitude</label>
                        <input type="number" name="latitude_facility" id="latitude_facility"
                            class="bg-gray-50 dark:bg-gray-700 border border-gray-300 dark:border-gray-600 text-gray-900 dark:text-white text-sm rounded-lg focus:ring-green-600 focus:border-green-600 block w-full p-2.5"
                            placeholder="Enter Latitude" step="any" required>
                    </div>
                    <div class="col-span-2 sm:col-span-1">
                        <label for="longitude_facility"
                            class="block mb-2 text-sm font-medium text-gray-900 dark:text-gray-200">Longitude</label>
                        <input type="number" name="longitude_facility" id="longitude_facility"
                            class="bg-gray-50 dark:bg-gray-700 border border-gray-300 dark:border-gray-600 text-gray-900 dark:text-white text-sm rounded-lg focus:ring-green-600 focus:border-green-600 block w-full p-2.5"
                            placeholder="Enter Longitude" step="any" required>
                    </div>
                </div>

                <button type="button"
                    class="get-location text-white bg-green-700 hover:bg-green-800 focus:ring-4 focus:outline-none focus:ring-green-300 dark:focus:ring-green-800 font-medium rounded-lg text-sm px-5 py-2.5 w-full">
                    <i class="fa-solid fa-location-dot me-1"></i> Get Current Location
                </button>

                <button type="submit"
                    class="text-white bg-green-700 hover:bg-green-800 focus:ring-4 focus:outline-none focus:ring-green-300 dark:focus:ring-green-800 font-medium rounded-lg text-sm px-5 py-2.5 w-full mt-3">
                    <i class="fa-solid fa-plus me-1"></i> Add Facility
                </button>
            </form>
        </div>
    </div>
</div>

<!-- Main modal -->
<div id="edit-facility-modal" tabindex="-1" aria-hidden="true"
    class="hidden overflow-y-auto overflow-x-hidden fixed top-0 right-0 left-0 z-50 justify-center items-center w-full md:inset-0 h-[calc(100%-1rem)] max-h-full">
    <div class="relative p-4 w-full max-w-md max-h-full">
        <!-- Modal content -->
        <div class="relative bg-white dark:bg-gray-800 rounded-lg shadow-sm ">
            <!-- Modal header -->
            <div
                class="flex items-center justify-between p-4 md:p-5 border-b rounded-t border-gray-200 dark:border-gray-700">
                <h3 class="text-lg font-semibold text-gray-900 dark:text-gray-100">
                    Edit <?php echo $_GET['building_name'] ?? null ?> Facility
                </h3>
                <button type="button"
                    class="text-gray-400 bg-transparent hover:bg-gray-200 hover:text-gray-900 dark:hover:bg-gray-700 dark:hover:text-white rounded-lg text-sm w-8 h-8 ms-auto inline-flex justify-center items-center "
                    data-modal-hide="edit-facility-modal">
                    <svg class="w-3 h-3" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 14 14">
                        <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                            d="m1 1 6 6m0 0 6 6M7 7l6-6M7 7l-6 6" />
                    </svg>
                    <span class="sr-only">Close modal</span>
                </button>
            </div>
            <!-- Modal body -->
            <form id="edit-facility-form" class="p-4 md:p-5" method="POST">
                <div class="grid gap-4 mb-4 grid-cols-2">
                    <input type="hidden" id="edit_facility_id" name="edit_facility_id">
                    <div class="col-span-2">
                        <div class="swiper mySwiper w-full h-96">
                            <div class="swiper-wrapper">
                                <!-- Slides go here dynamically -->
                            </div>

                            <!-- Navigation buttons (optional) -->
                            <div class="swiper-button-next"></div>
                            <div class="swiper-button-prev"></div>
                        </div>
                    </div>
                    <div class="col-span-2">
                        <label class="block mb-2 text-sm font-medium text-gray-900 dark:text-gray-300">Upload
                            Images</label>
                        <input
                            class="block w-full text-sm text-gray-900 border border-gray-300 rounded-lg cursor-pointer bg-gray-50 dark:bg-gray-700 dark:text-gray-200 dark:border-gray-600"
                            aria-describedby="edit_facility_img" id="edit_facility_img" name="edit_facility_img[]"
                            type="file" multiple accept=".jpg, .png, .jpeg">
                        <p class="mt-1 text-[10px] text-gray-500 dark:text-gray-400">PNG, JPG, JPEG (MAX PER FILE :
                            5MB).</p>

                    </div>
                    <div class="col-span-2">
                        <label for="edit_facilityName"
                            class="block mb-2 text-sm font-medium text-gray-900 dark:text-gray-200">Facility
                            Name</label>
                        <input type="text" name="edit_facilityName" id="edit_facilityName"
                            class="bg-gray-50 dark:bg-gray-700 border border-gray-300 dark:border-gray-600 text-gray-900 dark:text-white text-sm rounded-lg focus:ring-green-600 focus:border-green-600 block w-full p-2.5"
                            placeholder="Enter Facility Name" maxlength="50" required>
                    </div>

                    <div class="col-span-2">
                        <div class="flex items-center gap-3">
                            <label for="edit_hasRoomNum"
                                class="block text-sm font-medium text-gray-900 dark:text-gray-200">Has Room
                                Number?</label>
                            <input id="edit_hasRoomNum" name="edit_hasRoomNum" type="checkbox"
                                class="w-4 h-4 text-green-600 bg-gray-100 dark:bg-gray-700 border-gray-300 dark:border-gray-600 rounded-sm focus:ring-green-500">
                        </div>
                        <div class="mt-3 hidden" id="edit_hasRoomNumCont">
                            <input type="number" name="edit_roomNumber" id="edit_roomNumber"
                                onkeypress="if(this.value.length == 5) return false"
                                class="bg-gray-50 dark:bg-gray-700 border border-gray-300 dark:border-gray-600 text-gray-900 dark:text-white text-sm rounded-lg focus:ring-green-600 focus:border-green-600 block w-full p-2.5"
                                placeholder="Enter Room Number">
                        </div>
                    </div>

                    <div class="col-span-2">
                        <div class="flex items-center gap-3">
                            <label for="edit_hasFloorNum"
                                class="block text-sm font-medium text-gray-900 dark:text-gray-200">Has Floor
                                Number?</label>
                            <input id="edit_hasFloorNum" name="edit_hasFloorNum" type="checkbox"
                                class="w-4 h-4 text-green-600 bg-gray-100 dark:bg-gray-700 border-gray-300 dark:border-gray-600 rounded-sm focus:ring-green-500">
                        </div>
                        <div class="mt-3 hidden" id="edit_hasFloorNumCont">
                            <select id="edit_floorNumber" name="edit_floorNumber"
                                class="bg-gray-50 dark:bg-gray-700 border border-gray-300 dark:border-gray-600 text-gray-900 dark:text-white text-sm rounded-lg focus:ring-green-500 focus:border-green-500 block w-full p-2.5">
                                <option selected hidden>Choose an option</option>
                                <option value="1st">1st (Ground Floor)</option>
                                <option value="2nd">2nd Floor</option>
                                <option value="3rd">3rd Floor</option>
                                <option value="4th">4th Floor</option>
                            </select>
                        </div>
                    </div>

                    <div class="col-span-2">
                        <label for="edit_facility_desc"
                            class="block mb-2 text-sm font-medium text-gray-900 dark:text-gray-200">Description</label>
                        <textarea id="edit_facility_desc" name="edit_facility_desc" rows="4"
                            class="block p-2.5 w-full text-sm text-gray-900 dark:text-white bg-gray-50 dark:bg-gray-700 rounded-lg border border-gray-300 dark:border-gray-600 focus:ring-blue-500 focus:border-blue-500"
                            placeholder="Enter Facility Description"></textarea>
                    </div>

                    <div class="col-span-2 sm:col-span-1">
                        <label for="edit_latitude_facility"
                            class="block mb-2 text-sm font-medium text-gray-900 dark:text-gray-200">Latitude</label>
                        <input type="number" name="edit_latitude_facility" id="edit_latitude_facility"
                            class="bg-gray-50 dark:bg-gray-700 border border-gray-300 dark:border-gray-600 text-gray-900 dark:text-white text-sm rounded-lg focus:ring-green-600 focus:border-green-600 block w-full p-2.5"
                            placeholder="Enter Latitude" step="any" required>
                    </div>
                    <div class="col-span-2 sm:col-span-1">
                        <label for="edit_longitude_facility"
                            class="block mb-2 text-sm font-medium text-gray-900 dark:text-gray-200">Longitude</label>
                        <input type="number" name="edit_longitude_facility" id="edit_longitude_facility"
                            class="bg-gray-50 dark:bg-gray-700 border border-gray-300 dark:border-gray-600 text-gray-900 dark:text-white text-sm rounded-lg focus:ring-green-600 focus:border-green-600 block w-full p-2.5"
                            placeholder="Enter Longitude" step="any" required>
                    </div>
                </div>
                <button type="button"
                    class="get-location text-white bg-green-700 hover:bg-green-800 focus:ring-4 focus:outline-none focus:ring-green-300 font-medium rounded-lg text-sm px-5 py-2.5 w-full">
                    <i class="fa-solid fa-location-dot me-1"></i> Get Current Location
                </button>
                <button
                    class="text-white bg-green-700 hover:bg-green-800 focus:ring-4 focus:outline-none focus:ring-green-300 font-medium rounded-lg text-sm px-5 py-2.5 w-full mt-3"
                    type="submit">Save Changes</button>
            </form>
        </div>
    </div>
</div>

<div id="add-building-route-modal" tabindex="-1" aria-hidden="true"
    class="hidden overflow-y-auto overflow-x-hidden fixed top-0 right-0 left-0 z-50 justify-center items-center w-full md:inset-0 h-[calc(100%-1rem)] max-h-full">
    <div class="relative p-4 w-full max-w-md max-h-full">
        <div class="relative bg-white dark:bg-gray-800 rounded-lg shadow-sm">

            <div
                class="flex items-center justify-between p-4 md:p-5 border-b border-gray-200 dark:border-gray-600 rounded-t">
                <h3 class="text-lg font-semibold text-gray-900 dark:text-white">
                    Add <?php echo $_GET['building_name'] ?? null ?> Route
                </h3>
                <button type="button"
                    class="text-gray-400 bg-transparent hover:bg-gray-200 hover:text-gray-900 dark:hover:bg-gray-700 dark:hover:text-white rounded-lg text-sm w-8 h-8 ms-auto inline-flex justify-center items-center"
                    data-modal-hide="add-building-route-modal">
                    <svg class="w-3 h-3" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 14 14">
                        <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                            d="m1 1 6 6m0 0 6 6M7 7l6-6M7 7l-6 6" />
                    </svg>
                    <span class="sr-only">Close modal</span>
                </button>
            </div>

            <form id="add-building-route-form" class="p-4 md:p-5" method="POST">
                <div class="grid gap-4 mb-4 grid-cols-2">
                    <input type="hidden" id="building_route_id" name="building_route_id"
                        value="<?php echo $_GET['building_id'] ?? null ?>">
                    <div class="col-span-2">
                        <label class="block mb-2 text-sm font-medium text-gray-900 dark:text-gray-300">Upload
                            Image</label>
                        <input
                            class="block w-full text-sm text-gray-900 border border-gray-300 rounded-lg cursor-pointer bg-gray-50 dark:bg-gray-700 dark:text-gray-200 dark:border-gray-600"
                            aria-describedby="edit_facility_img" id="building_route_img" name="building_route_img"
                            type="file" accept=".jpg, .png, .jpeg" required>
                        <p class="mt-1 text-[10px] text-gray-500 dark:text-gray-400">PNG, JPG, JPEG (MAX PER FILE :
                            5MB).</p>

                    </div>
                    <div class="col-span-2 sm:col-span-1">
                        <label for="building_route_lat"
                            class="block mb-2 text-sm font-medium text-gray-900 dark:text-gray-200">Latitude</label>
                        <input type="number" name="building_route_lat" id="building_route_lat"
                            class="bg-gray-50 dark:bg-gray-700 border border-gray-300 dark:border-gray-600 text-gray-900 dark:text-white text-sm rounded-lg focus:ring-green-600 focus:border-green-600 block w-full p-2.5"
                            placeholder="Enter Latitude" step="any" required>
                    </div>
                    <div class="col-span-2 sm:col-span-1">
                        <label for="building_route_lng"
                            class="block mb-2 text-sm font-medium text-gray-900 dark:text-gray-200">Longitude</label>
                        <input type="number" name="building_route_lng" id="building_route_lng"
                            class="bg-gray-50 dark:bg-gray-700 border border-gray-300 dark:border-gray-600 text-gray-900 dark:text-white text-sm rounded-lg focus:ring-green-600 focus:border-green-600 block w-full p-2.5"
                            placeholder="Enter Longitude" step="any" required>
                    </div>
                </div>

                <button type="button"
                    class="get-location text-white bg-green-700 hover:bg-green-800 focus:ring-4 focus:outline-none focus:ring-green-300 dark:focus:ring-green-800 font-medium rounded-lg text-sm px-5 py-2.5 w-full">
                    <i class="fa-solid fa-location-dot me-1"></i> Get Current Location
                </button>

                <button type="submit"
                    class="text-white bg-green-700 hover:bg-green-800 focus:ring-4 focus:outline-none focus:ring-green-300 dark:focus:ring-green-800 font-medium rounded-lg text-sm px-5 py-2.5 w-full mt-3">
                    <i class="fa-solid fa-plus me-1"></i> Add Route
                </button>
            </form>
        </div>
    </div>
</div>