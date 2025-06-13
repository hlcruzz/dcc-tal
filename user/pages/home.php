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
    <div class="border-2 h-screen w-screen relative">
        <div id="home-map" class="w-full h-full">

        </div>
        <div class="absolute top-0 left-0 z-10 bg-white">
            <div class="flex flex-col justify-center items-center text-center h-full">
                <img src="./assets/img/chmsu-logo.png" class="w-[50px] h-[50px] object-cover" alt="">
                <h1 class="text-2xl mt-3">Digital Campus Concierge - Talisay</h1>
            </div>

        </div>
        <div class="fixed bottom-0 left-0 z-12 w-full bg-transparent p-3"></div>
        <!-- <div class="bg-gray-800 w-full h-full relative">
            <div id="home-map" class="w-full h-full"></div>
            <div class="absolute top-0 left-0 w-full h-full z-10" style="pointer-events: none;"></div>
        </div>
        <div class="p-10">
            <div class="flex flex-col justify-center items-center text-center">
                <img src="./assets/img/chmsu-logo.png" class="w-[50px] h-[50px] object-cover" alt="">
                <h1 class="text-2xl mt-3">Digital Campus Concierge - Talisay</h1>
            </div>
            <div class="mt-5">
                <form action="" class="overflow-auto p-2">
                    <div>
                        <div class="relative w-full">
                            <div class="absolute inset-y-0 start-0 flex items-center ps-3 pointer-events-none">
                                <i class="fa-solid fa-magnifying-glass text-gray-500 text-lg ms-1"></i>
                            </div>
                            <input type="text" id="simple-search"
                                class="bg-gray-50 border ps-11 border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-green-500 focus:border-green-500 block w-full p-2.5  dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-green-500 dark:focus:border-green-500"
                                placeholder="Search Building Name..." required />
                        </div>
                    </div>
                    
                    <div class="mt-5">
                        <label for="countries" class="block mb-2 text-sm font-medium text-gray-900 ">Select Room /
                            Office Name</label>
                        <select id="countries"
                            class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-green-500 focus:border-green-500 block w-full p-2.5 ">
                            <option selected hidden>Choose an option</option>
                            <option value="US">Administration Building</option>
                            <option value="CA">LSAB Building</option>
                            <option value="FR">Girls Dormitory</option>
                            <option value="DE">Sipaktakraw Court</option>
                            <option value="DE">Basketball & Volleybal Court</option>
                            <option value="DE">Teachers Education Building</option>
                            <option value="DE">Ceramics Building</option>
                            <option value="DE">Machine Shop Building</option>
                            <option value="DE">Water Tank</option>
                            <option value="DE">Hometel</option>
                            <option value="DE">School Garage</option>
                            <option value="DE">Existing Automotive & RAC Building</option>
                        </select>
                    </div>
                    <div class="grid md:grid-cols-2 md:gap-6 mt-5">
                        <div class="w-full">
                            <label for="countries" class="block mb-2 text-sm font-medium text-gray-900 ">Floor #</label>
                            <select id="countries"
                                class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-green-500 focus:border-green-500 block w-full p-2.5 ">
                                <option selected hidden>Choose an option</option>
                                <option value="">1st (Ground Floor)</option>
                                <option value="">2nd</option>
                                <option value="">3rd</option>
                                <option value="">4th</option>
                            </select>
                        </div>
                        <div class="w-full">
                            <label for="countries" class="block mb-2 text-sm font-medium text-gray-900 ">Room #</label>
                            <select id="countries"
                                class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-green-500 focus:border-green-500 block w-full p-2.5 ">
                                <option selected hidden>Choose an option</option>
                                <option value="">310</option>
                                <option value="">311</option>
                                <option value="">312</option>
                                <option value="">313</option>
                            </select>
                        </div>
                    </div>
                    <div class="mt-5">

                        <label for="message"
                            class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Purpose</label>
                        <textarea id="message" rows="4"
                            class="block p-2.5 w-full text-sm text-gray-900 bg-gray-50 rounded-lg border border-gray-300 focus:ring-green-500 focus:border-green-500 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-green-500 dark:focus:border-green-500"
                            placeholder="Type your visit purpose here..."></textarea>

                    </div>
                    <div class="mt-5">
                        <button type="submit"
                            class="w-full text-white bg-green-700 hover:bg-green-800 focus:ring-4 focus:outline-none focus:ring-green-300 font-medium rounded-lg text-sm px-5 py-2.5 text-center dark:bg-green-600 dark:hover:bg-green-700 dark:focus:ring-green-800">Submit
                        </button>
                </form>
            </div>
        </div> -->
    </div>
</body>

</html>