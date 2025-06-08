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
    include "./admin/include.php";
    ?>

</head>

<body>
    <div
        class="grid grid-cols-12 transition-all ease-in-out duration-500 h-screen max-h-screen overflow-auto bg-green-100 pb-10 sm:pb-0">
        <?php include "./admin/components/sidebar.php" ?>

        <!-- Main Content Area -->
        <div class="col-span-12 xl:col-span-10 min-h-screen overflow-auto bg-green-100 shadow-md p-5 sm:pb-0">
            <?php include "./admin/components/header.php" ?>

            <div class="grid grid-cols-2 md:grid-cols-3 lg:grid-cols-4 gap-5 mt-5">
                <div class="h-full flex items-center gap-5 flex-col lg:flex-row p-3 px-5 bg-white rounded-lg">
                    <i class="fa-solid fa-people-group text-3xl bg-lime-600 p-3 py-4 rounded-full text-white"></i>
                    <div class="text-lime-600 text-center lg:text-left">
                        <p class="font-medium ">Total Visitor</p>
                        <h1 class="font-extrabold ">538 <i class="fa-solid fa-arrow-trend-up ms-1 "></i>
                        </h1>
                    </div>
                </div>

                <div class="h-full flex items-center gap-5 flex-col lg:flex-row p-3 px-5 bg-white rounded-lg">
                    <i class="fa-solid fa-people-group text-3xl bg-teal-500 p-3 py-4 rounded-full text-white"></i>
                    <div class="text-teal-500 text-center lg:text-left">
                        <p class="font-medium ">Total Visitor</p>
                        <h1 class="font-extrabold ">538 <i class="fa-solid fa-arrow-trend-up ms-1 "></i>
                        </h1>
                    </div>
                </div>
                <div class="h-full flex items-center gap-5 flex-col lg:flex-row p-3 px-5 bg-white rounded-lg">
                    <i class="fa-solid fa-people-group text-3xl bg-emerald-500 p-3 py-4 rounded-full text-white"></i>
                    <div class="text-emerald-500 text-center lg:text-left">
                        <p class="font-medium ">Total Visitor</p>
                        <h1 class="font-extrabold ">538 <i class="fa-solid fa-arrow-trend-up ms-1 "></i>
                        </h1>
                    </div>
                </div>
                <div class="h-full flex items-center gap-5 flex-col lg:flex-row p-3 px-5 bg-white rounded-lg">
                    <i class="fa-solid fa-people-group text-3xl bg-green-500 p-3 py-4 rounded-full text-white"></i>
                    <div class="text-green-500 text-center lg:text-left">
                        <p class="font-medium ">Total Visitor</p>
                        <h1 class="font-extrabold ">538 <i class="fa-solid fa-arrow-trend-up ms-1 "></i>
                        </h1>
                    </div>
                </div>
            </div>

            <div class="grid grid-cols-12 gap-5 mt-5">
                <div class="col-span-12 lg:col-span-8 bg-white p-5 rounded-lg h-full flex flex-col">
                    <div class="flex justify-between items-center">
                        <h1 class="font-medium text-lg">Yearly Visitor Statistics</h1>
                        <select id="yearFilter"
                            class="bg-gray-50 border-gray-300 text-xs text-gray-900 rounded-lg focus:ring-green-500 focus:border-green-500">
                        </select>
                    </div>
                    <div class="mt-3">
                        <button type="button"
                            class="text-white text-[10px] bg-green-700 hover:bg-green-800 focus:ring-4 focus:outline-none focus:ring-green-300 cursor-pointer font-medium rounded-lg px-4 py-2.5 text-center inline-flex items-center me-2">
                            <i class="fa-solid fa-file-export me-2"></i>
                            PDF
                        </button>
                        <button type="button"
                            class="text-white text-[10px] bg-green-700 hover:bg-green-800 focus:ring-4 focus:outline-none focus:ring-green-300 cursor-pointer font-medium rounded-lg px-4 py-2.5 text-center inline-flex items-center me-2">
                            <i class="fa-solid fa-file-export me-2"></i>
                            CSV
                        </button>
                        <button type="button"
                            class="text-white text-[10px] bg-green-700 hover:bg-green-800 focus:ring-4 focus:outline-none focus:ring-green-300 cursor-pointer font-medium rounded-lg px-4 py-2.5 text-center inline-flex items-center me-2">
                            <i class="fa-solid fa-file-export me-2"></i>
                            XLS
                        </button>
                    </div>
                    <canvas id="yearlyVisitor" class="mt-5 flex-grow"></canvas>
                </div>

                <div class="col-span-12 lg:col-span-4 h-full">
                    <div class="bg-white rounded-lg shadow-sm p-4 md:p-6 h-full flex flex-col justify-between">
                        <div>
                            <div class="flex justify-between">
                                <div>
                                    <h5 class="leading-none text-3xl font-bold text-gray-900 pb-2">32.4k</h5>
                                    <p class="text-base font-normal text-gray-500">Visitors this week</p>
                                </div>
                                <div
                                    class="flex items-center px-2.5 py-0.5 text-base font-semibold text-green-500 text-center">
                                    12%
                                    <svg class="w-3 h-3 ms-1" xmlns="http://www.w3.org/2000/svg" fill="none"
                                        viewBox="0 0 10 14">
                                        <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round"
                                            stroke-width="2" d="M5 13V1m0 0L1 5m4-4 4 4" />
                                    </svg>
                                </div>
                            </div>
                            <div id="area-chart" class="mt-4"></div>
                        </div>

                        <div class="grid grid-cols-1 border-gray-200 border-t pt-5">
                            <select id="dayRangeSelector"
                                class="text-xs font-medium text-gray-500 hover:text-gray-900 inline-flex items-center bg-gray-50 border border-gray-300 rounded-lg focus:ring-green-500 focus:border-green-500">
                                <option value="yesterday">Yesterday</option>
                                <option value="today">Today</option>
                                <option value="last7">Last 7 days</option>
                                <option value="last30">Last 30 days</option>
                                <option value="last90">Last 90 days</option>
                            </select>
                            <div class="flex flex-wrap mt-3">
                                <button type="button"
                                    class="text-white text-[10px] bg-green-700 hover:bg-green-800 focus:ring-4 focus:outline-none focus:ring-green-300 cursor-pointer font-medium rounded-lg px-4 py-2.5 text-center inline-flex items-center me-2">
                                    <i class="fa-solid fa-file-export me-2"></i>
                                    PDF
                                </button>
                                <button type="button"
                                    class="text-white text-[10px] bg-green-700 hover:bg-green-800 focus:ring-4 focus:outline-none focus:ring-green-300 cursor-pointer font-medium rounded-lg px-4 py-2.5 text-center inline-flex items-center me-2">
                                    <i class="fa-solid fa-file-export me-2"></i>
                                    CSV
                                </button>
                                <button type="button"
                                    class="text-white text-[10px] bg-green-700 hover:bg-green-800 focus:ring-4 focus:outline-none focus:ring-green-300 cursor-pointer font-medium rounded-lg px-4 py-2.5 text-center inline-flex items-center me-2">
                                    <i class="fa-solid fa-file-export me-2"></i>
                                    XLS
                                </button>
                            </div>
                        </div>

                    </div>
                </div>
            </div>

            <div class="grid grid-cols-12 gap-5 mt-5">
                <div
                    class="col-span-12 lg:col-span-4 grid grid-rows-none grid-cols-1 sm:grid-cols-2 lg:grid-cols-none lg:grid-rows-2 gap-5">
                    <!-- Doughnut Chart -->
                    <div class="bg-white rounded-lg p-4 shadow">
                        <div class="flex flex-wrap mt-3 justify-center">
                            <button type="button"
                                class="text-white text-[10px] bg-green-700 hover:bg-green-800 focus:ring-4 focus:outline-none focus:ring-green-300 cursor-pointer font-medium rounded-lg px-4 py-2.5 text-center inline-flex items-center me-2">
                                <i class="fa-solid fa-file-export me-2"></i>
                                PDF
                            </button>
                            <button type="button"
                                class="text-white text-[10px] bg-green-700 hover:bg-green-800 focus:ring-4 focus:outline-none focus:ring-green-300 cursor-pointer font-medium rounded-lg px-4 py-2.5 text-center inline-flex items-center me-2">
                                <i class="fa-solid fa-file-export me-2"></i>
                                CSV
                            </button>
                            <button type="button"
                                class="text-white text-[10px] bg-green-700 hover:bg-green-800 focus:ring-4 focus:outline-none focus:ring-green-300 cursor-pointer font-medium rounded-lg px-4 py-2.5 text-center inline-flex items-center me-2">
                                <i class="fa-solid fa-file-export me-2"></i>
                                XLS
                            </button>
                        </div>
                        <canvas id="doughnutChart"></canvas>
                    </div>

                    <!-- Pie Chart -->
                    <div class="bg-white rounded-lg p-4 shadow">
                        <div class="flex flex-wrap mt-3 justify-center">
                            <button type="button"
                                class="text-white text-[10px] bg-green-700 hover:bg-green-800 focus:ring-4 focus:outline-none focus:ring-green-300 cursor-pointer font-medium rounded-lg px-4 py-2.5 text-center inline-flex items-center me-2">
                                <i class="fa-solid fa-file-export me-2"></i>
                                PDF
                            </button>
                            <button type="button"
                                class="text-white text-[10px] bg-green-700 hover:bg-green-800 focus:ring-4 focus:outline-none focus:ring-green-300 cursor-pointer font-medium rounded-lg px-4 py-2.5 text-center inline-flex items-center me-2">
                                <i class="fa-solid fa-file-export me-2"></i>
                                CSV
                            </button>
                            <button type="button"
                                class="text-white text-[10px] bg-green-700 hover:bg-green-800 focus:ring-4 focus:outline-none focus:ring-green-300 cursor-pointer font-medium rounded-lg px-4 py-2.5 text-center inline-flex items-center me-2">
                                <i class="fa-solid fa-file-export me-2"></i>
                                XLS
                            </button>
                        </div>
                        <canvas id="pieChart"></canvas>
                    </div>
                </div>
                <div class="col-span-12 lg:col-span-8">
                    <iframe
                        src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3904.573551760292!2d122.96748287504143!3d10.74329908940348!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x33aed6939b70f2a7%3A0x476610a2fa8f42b4!2sCarlos%20Hilado%20Memorial%20State%20University!5e1!3m2!1sen!2sph!4v1749137579415!5m2!1sen!2sph"
                        class="w-full min-h-[800px] h-full" style="border:0;" allowfullscreen="" loading="lazy"
                        referrerpolicy="no-referrer-when-downgrade"></iframe>
                </div>
            </div>


        </div>
    </div>

    <script>
        // Sample data per visitor type, per month
        const yearlyData = {
            "2025": {
                "Student": [50, 60, 70, 80, 60, 75, 85, 90, 100, 95, 85, 80],
                "Faculty": [10, 15, 12, 18, 20, 22, 19, 21, 20, 18, 16, 14],
                "Staff": [15, 18, 20, 22, 24, 26, 25, 24, 23, 21, 19, 18],
                "Alumni": [5, 6, 5, 7, 6, 8, 9, 10, 9, 8, 7, 6],
                "Guest": [8, 10, 9, 11, 12, 13, 12, 13, 14, 13, 12, 11],
            },
            "2024": {
                "Student": [40, 45, 50, 55, 50, 60, 65, 70, 75, 70, 65, 60],
                "Faculty": [8, 10, 9, 12, 14, 16, 15, 14, 13, 12, 11, 10],
                "Staff": [12, 13, 14, 15, 16, 18, 17, 16, 15, 14, 13, 12],
                "Alumni": [3, 4, 3, 4, 5, 6, 5, 6, 7, 6, 5, 4],
                "Guest": [6, 7, 6, 8, 9, 10, 9, 10, 11, 10, 9, 8],
            }
        };

        const colors = {
            Student: "#4e73df",
            Faculty: "#1cc88a",
            Staff: "#36b9cc",
            Alumni: "#f6c23e",
            Guest: "#e74a3b"
        };

        const currentYear = new Date().getFullYear();
        const start = 2024;

        for (let i = currentYear; i >= start; i--) {
            $("#yearFilter").append(`<option value="${i}">${i}</option>`);
        }

        const ctx = $("#yearlyVisitor");

        function getDatasetsForYear(year) {
            const data = yearlyData[year];
            return Object.keys(data).map(type => ({
                label: type,
                data: data[type],
                backgroundColor: colors[type],
                borderColor: colors[type],
                borderWidth: 1,
            }));
        }

        const chart = new Chart(ctx, {
            type: "bar",
            data: {
                labels: [
                    "January", "February", "March", "April", "May", "June",
                    "July", "August", "September", "October", "November", "December"
                ],
                datasets: getDatasetsForYear(`${currentYear}`)
            },
            options: {
                responsive: true,
                scales: {
                    y: {
                        beginAtZero: true,
                        stacked: false // not stacked = grouped bars
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
            chart.data.datasets = getDatasetsForYear(selectedYear);
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
            }, ],
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