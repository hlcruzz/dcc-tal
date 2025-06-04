<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Register</title>
    <?php include "./global/links.php" ?>
    <script src="./user/js/auth.js"></script>
</head>

<body>
    <div class="bg-white sm:bg-sky-200/80 h-full flex items-center justify-center overflow-auto">
        <div class="bg-white p-10 w-full max-h-full overflow-auto sm:w-[500px] ">
            <div class="flex flex-col justify-center items-center">
                <img src="./assets/img/chmsu-logo.png" class="w-[50px] h-[50px] object-cover" alt="">
                <h1 class="text-2xl mt-3">Digital Campus Concierge - Talisay</h1>
                <h1 class="text-2xl mt-3">Registration Form</h1>
            </div>
            <form class="flex flex-col mt-5" method="POST" id="registerForm">
                <div class="grid md:grid-cols-2 md:gap-6">
                    <div class="relative z-0 w-full mb-5 group">
                        <input type="text" name="fname" id="fname"
                            class="block py-2.5 px-0 w-full text-sm text-gray-900 bg-transparent border-0 border-b-2 border-gray-300 appearance-none focus:outline-none focus:ring-0 focus:border-green-600 peer"
                            placeholder=" " required maxlength="50" />
                        <label for="fname"
                            class="peer-focus:font-medium absolute text-sm text-gray-500 duration-300 transform -translate-y-6 scale-75 top-3 -z-10 origin-[0] peer-focus:start-0 rtl:peer-focus:translate-x-1/4 peer-focus:text-green-600 peer-placeholder-shown:scale-100 peer-placeholder-shown:translate-y-0 peer-focus:scale-75 peer-focus:-translate-y-6">First
                            name</label>
                    </div>
                    <div class="relative z-0 w-full mb-5 group">
                        <input type="text" name="lname" id="lname"
                            class="block py-2.5 px-0 w-full text-sm text-gray-900 bg-transparent border-0 border-b-2 border-gray-300 appearance-none focus:outline-none focus:ring-0 focus:border-green-600 peer"
                            placeholder=" " required maxlength="50" />
                        <label for="lname"
                            class="peer-focus:font-medium absolute text-sm text-gray-500 duration-300 transform -translate-y-6 scale-75 top-3 -z-10 origin-[0] peer-focus:start-0 rtl:peer-focus:translate-x-1/4 peer-focus:text-green-600 peer-placeholder-shown:scale-100 peer-placeholder-shown:translate-y-0 peer-focus:scale-75 peer-focus:-translate-y-6">Last
                            name</label>
                    </div>
                </div>
                <div class="relative z-0 w-full group">
                    <input type="number" name="phoneNum" id="phoneNum"
                        class="block py-2.5 px-0 w-full text-sm text-gray-900 bg-transparent border-0 border-b-2 border-gray-300 appearance-none focus:outline-none focus:ring-0 focus:border-green-600 peer"
                        placeholder=" " onkeypress="if(this.value.length == 10) return false" required />
                    <label for="phoneNum"
                        class="peer-focus:font-medium absolute text-sm text-gray-500 duration-300 transform -translate-y-6 scale-75 top-3 -z-10 origin-[0] peer-focus:start-0 rtl:peer-focus:translate-x-1/4 peer-focus:text-green-600 peer-placeholder-shown:scale-100 peer-placeholder-shown:translate-y-0 peer-focus:scale-75 peer-focus:-translate-y-6">Phone
                        number (09xxxxxxxxx)</label>
                </div>
                <div class="flex flex-wrap gap-4 justify-between mt-5">

                    <div class="flex items-center ">
                        <input id="Student" type="radio" value="Student" name="visitorType"
                            class="w-4 h-4 text-green-600 bg-gray-100 border-gray-300 focus:ring-green-500 ">
                        <label for="Student" class="ms-2 text-sm font-medium text-gray-600">Student</label>
                    </div>
                    <div class="flex items-center ">
                        <input id="Faculty" type="radio" value="Faculty" name="visitorType"
                            class="w-4 h-4 text-green-600 bg-gray-100 border-gray-300 focus:ring-green-500 ">
                        <label for="Faculty" class="ms-2 text-sm font-medium text-gray-600">Faculty</label>
                    </div>
                    <div class="flex items-center ">
                        <input id="Staff" type="radio" value="Staff" name="visitorType"
                            class="w-4 h-4 text-green-600 bg-gray-100 border-gray-300 focus:ring-green-500 ">
                        <label for="Staff" class="ms-2 text-sm font-medium text-gray-600">Staff</label>
                    </div>
                    <div class="flex items-center ">
                        <input id="Alumni" type="radio" value="Alumni" name="visitorType"
                            class="w-4 h-4 text-green-600 bg-gray-100 border-gray-300 focus:ring-green-500 ">
                        <label for="Alumni" class="ms-2 text-sm font-medium text-gray-600">Alumni</label>
                    </div>
                    <div class="flex items-center ">
                        <input id="Guest" type="radio" value="Guest" name="visitorType"
                            class="w-4 h-4 text-green-600 bg-gray-100 border-gray-300 focus:ring-green-500 ">
                        <label for="Guest" class="ms-2 text-sm font-medium text-gray-600">Guest</label>
                    </div>
                </div>
                <div class="mt-5">
                    <select id="province" name="province" required
                        class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 ">
                        <option selected hidden>Select Province</option>

                    </select>
                </div>
                <div class="grid md:grid-cols-2 gap-5 mt-5">
                    <select id="city" name="city" required
                        class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 ">
                        <option selected hidden>Select City/Municipality</option>

                    </select>
                    <select id="brgy" name="brgy" required
                        class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 ">
                        <option selected hidden>Select Barangay</option>
                    </select>
                </div>
                <div class="relative z-0 w-full mt-5 group">
                    <input type="text" name="street" id="street"
                        class="block py-2.5 px-0 w-full text-sm text-gray-900 bg-transparent border-0 border-b-2 border-gray-300 appearance-none focus:outline-none focus:ring-0 focus:border-green-600 peer"
                        placeholder=" " required maxlength="250" />
                    <label for="street"
                        class="peer-focus:font-medium absolute text-sm text-gray-500 duration-300 transform -translate-y-6 scale-75 top-3 -z-10 origin-[0] peer-focus:start-0 rtl:peer-focus:translate-x-1/4 peer-focus:text-green-600 peer-placeholder-shown:scale-100 peer-placeholder-shown:translate-y-0 peer-focus:scale-75 peer-focus:-translate-y-6">Street</label>
                </div>



                <div class="relative z-0 w-full mt-5 group">
                    <input type="text" name="purpose" id="purpose"
                        class="block py-2.5 px-0 w-full text-sm text-gray-900 bg-transparent border-0 border-b-2 border-gray-300 appearance-none focus:outline-none focus:ring-0 focus:border-green-600 peer"
                        placeholder=" " required maxlength="150" />
                    <label for="purpose"
                        class="peer-focus:font-medium absolute text-sm text-gray-500 duration-300 transform -translate-y-6 scale-75 top-3 -z-10 origin-[0] peer-focus:start-0 rtl:peer-focus:translate-x-1/4 peer-focus:text-green-600 peer-placeholder-shown:scale-100 peer-placeholder-shown:translate-y-0 peer-focus:scale-75 peer-focus:-translate-y-6">Purpose
                        of Visit</label>
                </div>
                <button type="submit"
                    class="text-white mt-5 bg-green-700 hover:bg-green-800 focus:ring-4 focus:outline-none focus:ring-green-300 font-medium rounded-lg text-sm w-full px-5 py-2.5 text-center cursor-pointer">Proceed
                    <i class="fa-solid fa-right-to-bracket ms-1"></i></button>

            </form>
        </div>
    </div>
</body>

</html>