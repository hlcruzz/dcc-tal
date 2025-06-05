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
</head>

<body>
    <div class="grid h-full grid-cols-1 lg:grid-cols-2">
        <iframe
            src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3904.573551760292!2d122.96748287504143!3d10.74329908940348!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x33aed6939b70f2a7%3A0x476610a2fa8f42b4!2sCarlos%20Hilado%20Memorial%20State%20University!5e1!3m2!1sen!2sph!4v1749042554748!5m2!1sen!2sph"
            class="w-full h-[500px] lg:h-full" style="border:0;" allowfullscreen="false" loading="lazy"
            referrerpolicy="no-referrer-when-downgrade"></iframe>
        <div class="p-10">
            <div class="flex flex-col justify-center items-center text-center">
                <img src="./assets/img/chmsu-logo.png" class="w-[50px] h-[50px] object-cover" alt="">
                <h1 class="text-2xl mt-3">Digital Campus Concierge - Talisay</h1>
            </div>
            <div class="mt-5">
                <form action="" class="overflow-auto">
                    <div>
                        <label for="countries" class="block mb-2 text-sm font-medium text-gray-900 ">Select Building
                            Name</label>
                        <select id="countries"
                            class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 ">
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

                    <div class="mt-5">
                        <label for="countries" class="block mb-2 text-sm font-medium text-gray-900 ">Select Room /
                            Office Name</label>
                        <select id="countries"
                            class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 ">
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
                                class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 ">
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
                                class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 ">
                                <option selected hidden>Choose an option</option>
                                <option value="">310</option>
                                <option value="">311</option>
                                <option value="">312</option>
                                <option value="">313</option>
                            </select>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
</body>

</html>