<?php
require_once "./admin/components/checkToken.php";
$page = "Dashboard";
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
            class="col-span-12 xl:col-span-10 min-h-screen overflow-auto bg-green-100 dark:bg-emerald-900 shadow-md p-5 sm:pb-0">
            <?php include "./admin/components/header.php" ?>

            <div class="grid grid-cols-2 md:grid-cols-3 lg:grid-cols-4 gap-5 mt-5">
                <div
                    class="h-full flex items-center gap-5 flex-col lg:flex-row p-3 px-5 bg-white dark:bg-gray-800 rounded-lg">
                    <i class="fa-solid fa-people-group text-2xl bg-lime-600 p-3 py-4 rounded-full text-white "></i>
                    <div class="text-lime-600 text-center lg:text-left">
                        <p class="font-medium ">Total Visitor</p>
                        <h1 class="font-extrabold ">538 <i class="fa-solid fa-arrow-trend-up ms-1 "></i>
                        </h1>
                    </div>
                </div>

                <div
                    class="h-full flex items-center gap-5 flex-col lg:flex-row p-3 px-5 bg-white dark:bg-gray-800 rounded-lg">
                    <i class="fa-solid fa-building-columns text-2xl bg-teal-500 p-3 rounded-full text-white"></i>
                    <div class="text-teal-500 text-center lg:text-left">
                        <p class="font-medium ">Total Buildings</p>
                        <h1 class="font-extrabold ">538 <i class="fa-solid fa-arrow-trend-up ms-1 "></i>
                        </h1>
                    </div>
                </div>
                <div
                    class="h-full flex items-center gap-5 flex-col lg:flex-row p-3 px-5 bg-white dark:bg-gray-800 rounded-lg">
                    <i class="fa-solid fa-house-user text-2xl bg-emerald-500 p-3 rounded-full text-white"></i>
                    <div class="text-emerald-500 text-center lg:text-left">
                        <p class="font-medium ">Total Facilities</p>
                        <h1 class="font-extrabold ">538 <i class="fa-solid fa-arrow-trend-up ms-1 "></i>
                        </h1>
                    </div>
                </div>
                <div
                    class="h-full flex items-center gap-5 flex-col lg:flex-row p-3 px-5 bg-white dark:bg-gray-800 rounded-lg">
                    <i class="fa-solid fa-users text-2xl bg-green-500 p-3 py-4 rounded-full text-white "></i>
                    <div class="text-green-500 text-center lg:text-left">
                        <p class="font-medium ">Total Accounts</p>
                        <h1 class="font-extrabold ">538 <i class="fa-solid fa-arrow-trend-up ms-1 "></i>
                        </h1>
                    </div>
                </div>
            </div>

            <div class="grid grid-cols-12 gap-5 mt-5">
                <div class="col-span-12 lg:col-span-8 bg-white dark:bg-gray-800 p-5 rounded-lg h-full flex flex-col">
                    <div class="flex justify-between items-center">
                        <h1 class="font-medium text-lg text-gray-900 dark:text-white">Yearly Visitor Statistics</h1>
                        <select id="yearFilter"
                            class="bg-gray-50 dark:bg-gray-700 border border-gray-300 dark:border-gray-600 text-xs text-gray-900 dark:text-white rounded-lg focus:ring-green-500 focus:border-green-500">
                        </select>
                    </div>
                    <div class="mt-3">
                        <button type="button"
                            class="text-white text-[10px] bg-green-700 hover:bg-green-800 focus:ring-4 focus:outline-none focus:ring-green-300 dark:focus:ring-green-800 cursor-pointer font-medium rounded-lg px-4 py-2.5 text-center inline-flex items-center me-2">
                            <i class="fa-solid fa-file-export me-2"></i>
                            PDF
                        </button>
                        <button type="button"
                            class="text-white text-[10px] bg-green-700 hover:bg-green-800 focus:ring-4 focus:outline-none focus:ring-green-300 dark:focus:ring-green-800 cursor-pointer font-medium rounded-lg px-4 py-2.5 text-center inline-flex items-center me-2">
                            <i class="fa-solid fa-file-export me-2"></i>
                            XLS
                        </button>
                    </div>
                    <canvas id="yearlyVisitor" class="mt-5 flex-grow "></canvas>
                </div>


                <div class="col-span-12 lg:col-span-4 h-full">
                    <div
                        class="bg-white dark:bg-gray-800 rounded-lg shadow-sm p-4 md:p-6 h-full flex flex-col justify-between">
                        <div>
                            <div class="flex justify-between">
                                <div>
                                    <h5 class="leading-none text-3xl font-bold text-gray-900 dark:text-white pb-2">32.4k
                                    </h5>
                                    <p class="text-base font-normal text-gray-500 dark:text-gray-400">Visitors this week
                                    </p>
                                </div>
                            </div>
                            <div id="area-chart" class="mt-4"></div>
                        </div>

                        <div class="grid grid-cols-1 border-gray-200 dark:border-gray-700 border-t pt-5">
                            <select id="dayRangeSelector"
                                class="text-xs font-medium text-gray-500 dark:text-gray-300 hover:text-gray-900 dark:hover:text-white inline-flex items-center bg-gray-50 dark:bg-gray-700 border border-gray-300 dark:border-gray-600 rounded-lg focus:ring-green-500 focus:border-green-500">
                                <option value="yesterday">Yesterday</option>
                                <option value="today">Today</option>
                                <option value="last7">Last 7 days</option>
                                <option value="last30">Last 30 days</option>
                                <option value="last90">Last 90 days</option>
                            </select>
                            <div class="flex flex-wrap mt-3">
                                <button type="button"
                                    class="text-white text-[10px] bg-green-700 hover:bg-green-800 focus:ring-4 focus:outline-none focus:ring-green-300 dark:focus:ring-green-800 cursor-pointer font-medium rounded-lg px-4 py-2.5 text-center inline-flex items-center me-2">
                                    <i class="fa-solid fa-file-export me-2"></i>
                                    PDF
                                </button>
                                <button type="button"
                                    class="text-white text-[10px] bg-green-700 hover:bg-green-800 focus:ring-4 focus:outline-none focus:ring-green-300 dark:focus:ring-green-800 cursor-pointer font-medium rounded-lg px-4 py-2.5 text-center inline-flex items-center me-2">
                                    <i class="fa-solid fa-file-export me-2"></i>
                                    XLS
                                </button>
                            </div>
                        </div>
                    </div>

                </div>
            </div>

            <div class="grid grid-cols-12 gap-5 mt-5 mb-5">
                <div
                    class="col-span-12 lg:col-span-4 grid grid-rows-none grid-cols-1 sm:grid-cols-2 lg:grid-cols-none lg:grid-rows-2 gap-5">
                    <!-- Doughnut Chart -->
                    <!-- Doughnut Chart -->
                    <div class="bg-white dark:bg-gray-800 rounded-lg p-4 shadow">
                        <div class="flex flex-wrap mt-3 justify-center">
                            <button type="button"
                                class="text-white text-[10px] bg-green-700 hover:bg-green-800 focus:ring-4 focus:outline-none focus:ring-green-300 dark:focus:ring-green-800 cursor-pointer font-medium rounded-lg px-4 py-2.5 text-center inline-flex items-center me-2">
                                <i class="fa-solid fa-file-export me-2"></i>
                                PDF
                            </button>
                            <button type="button"
                                class="text-white text-[10px] bg-green-700 hover:bg-green-800 focus:ring-4 focus:outline-none focus:ring-green-300 dark:focus:ring-green-800 cursor-pointer font-medium rounded-lg px-4 py-2.5 text-center inline-flex items-center me-2">
                                <i class="fa-solid fa-file-export me-2"></i>
                                XLS
                            </button>
                        </div>
                        <canvas id="doughnutChart" class=" mt-3"></canvas>
                    </div>

                    <!-- Pie Chart -->
                    <div class="bg-white dark:bg-gray-800 rounded-lg p-4 shadow">
                        <div class="flex flex-wrap mt-3 justify-center">
                            <button type="button"
                                class="text-white text-[10px] bg-green-700 hover:bg-green-800 focus:ring-4 focus:outline-none focus:ring-green-300 dark:focus:ring-green-800 cursor-pointer font-medium rounded-lg px-4 py-2.5 text-center inline-flex items-center me-2">
                                <i class="fa-solid fa-file-export me-2"></i>
                                PDF
                            </button>
                            <button type="button"
                                class="text-white text-[10px] bg-green-700 hover:bg-green-800 focus:ring-4 focus:outline-none focus:ring-green-300 dark:focus:ring-green-800 cursor-pointer font-medium rounded-lg px-4 py-2.5 text-center inline-flex items-center me-2">
                                <i class="fa-solid fa-file-export me-2"></i>
                                XLS
                            </button>
                        </div>
                        <canvas id="pieChart" class=" mt-3"></canvas>
                    </div>

                </div>
                <div class="col-span-12 lg:col-span-8">
                    <iframe
                        src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3904.573551760292!2d122.96748287504143!3d10.74329908940348!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x33aed6939b70f2a7%3A0x476610a2fa8f42b4!2sCarlos%20Hilado%20Memorial%20State%20University!5e1!3m2!1sen!2sph!4v1749137579415!5m2!1sen!2sph"
                        class="w-full h-[800px] lg:h-full" style="border:0;" allowfullscreen="" loading="lazy"
                        referrerpolicy="no-referrer-when-downgrade"></iframe>
                </div>
            </div>


        </div>
    </div>

    <script>
        // Sample data: Total visitors per month for each year
        const yearlyTotalData = {
            "2025": [88, 109, 116, 138, 122, 144, 150, 158, 166, 155, 139, 129],
            "2024": [69, 79, 82, 94, 94, 110, 111, 116, 121, 112, 103, 94]
        };

        const currentYear = new Date().getFullYear();
        const start = 2024;

        // Populate year dropdown
        for (let i = currentYear; i >= start; i--) {
            $("#yearFilter").append(`<option value="${i}">${i}</option>`);
        }

        const ctx = $("#yearlyVisitor");

        function getDatasetForYear(year) {
            const data = yearlyTotalData[year];
            return [{
                label: 'Total Visitors',
                data: data,
                backgroundColor: "#4e73df",
                borderColor: "#4e73df",
                borderWidth: 1
            }];
        }

        const chart = new Chart(ctx, {
            type: "bar",
            data: {
                labels: [
                    "January", "February", "March", "April", "May", "June",
                    "July", "August", "September", "October", "November", "December"
                ],
                datasets: getDatasetForYear(`${currentYear}`)
            },
            options: {
                responsive: true,
                scales: {
                    y: {
                        beginAtZero: true,
                        stacked: false
                    },
                    x: {
                        stacked: false
                    }
                },
                plugins: {
                    legend: {
                        position: "top"
                    }
                }
            }
        });

        $("#yearFilter").on("change", function() {
            const selectedYear = $(this).val();
            chart.data.datasets = getDatasetForYear(selectedYear);
            chart.update();
        });

        const options = {
            chart: {
                height: "100%",
                maxWidth: "100%",
                type: "area",
                fontFamily: "Inter, sans-serif",
                dropShadow: {
                    enabled: false,
                },
                toolbar: {
                    show: false,
                },
            },
            tooltip: {
                enabled: true,
                x: {
                    show: false,
                },
            },
            fill: {
                type: "gradient",
                gradient: {
                    opacityFrom: 0.55,
                    opacityTo: 0,
                    shade: "#1C64F2",
                    gradientToColors: ["#1C64F2"],
                },
            },
            dataLabels: {
                enabled: false,
            },
            stroke: {
                width: 6,
            },
            grid: {
                show: false,
                strokeDashArray: 4,
                padding: {
                    left: 2,
                    right: 2,
                    top: 0
                },
            },
            series: [{
                name: "New users",
                data: [6500, 6418, 6456, 6526, 6356, 6456],
                color: "#1A56DB",
            }],
            xaxis: {
                categories: ['01 February', '02 February', '03 February', '04 February', '05 February', '06 February',
                    '07 February'
                ],
                labels: {
                    show: false,
                },
                axisBorder: {
                    show: false,
                },
                axisTicks: {
                    show: false,
                },
            },
            yaxis: {
                show: false,
            },
        }

        if (document.getElementById("area-chart") && typeof ApexCharts !== 'undefined') {
            const chart = new ApexCharts(document.getElementById("area-chart"), options);
            chart.render();
        }
    </script>

    <script>
        // Sample data
        const data = {
            labels: ['Red', 'Blue', 'Yellow'],
            datasets: [{
                label: 'Sample Data',
                data: [30, 40, 30],
                backgroundColor: [
                    'rgb(255, 99, 132)',
                    'rgb(54, 162, 235)',
                    'rgb(255, 205, 86)'
                ],
                hoverOffset: 10
            }]
        };

        // Doughnut Chart
        new Chart(document.getElementById('doughnutChart'), {
            type: 'doughnut',
            data: data,
            options: {
                responsive: true,
                plugins: {
                    title: {
                        display: true,
                        text: 'Total Visitors'
                    }
                }
            }
        });

        // Pie Chart
        new Chart(document.getElementById('pieChart'), {
            type: 'pie',
            data: data,
            options: {
                responsive: true,
                plugins: {
                    title: {
                        display: true,
                        text: 'Total Locations Per Building'
                    }
                }
            }
        });
    </script>

</body>

</html>