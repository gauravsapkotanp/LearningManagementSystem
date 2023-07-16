{{-- @extends('layouts.app')
@section('content')
    <Dashboard class="text-4xl heading text-center">
        <h1>Welcome to the dashboard !!</h1>
        <h1>You are logged in Successfully 😊</h1>
    </Dashboard>
@endsection --}}


@extends('layouts.app')
@section('content')
    <div class="pt-12 lg:pt-0 px-4 bg-[#1650d0] pb-40 dark:bg-[#051139]  dark:text-gray-100">
        <h1 class="text-lg font-thin text-white dark:text-gray-100 pt-12 pl-4">DASHBOARD</h1>
    </div>

    <div class="grid xl:grid-cols-3 -mt-24">
        <div class="bg-[#1939c9] text-white dark:text-gray-100 dark:bg-[#111c44] m-4 rounded-xl h-36 shadow-md">
            <div class="p-8">
                <div
                    class="w-12 h-12 bg-white text-[#1939c9] dark:bg-[#1939c9] rounded-full flex items-center justify-center">
                    <i class="ri-questionnaire-fill dark:text-gray-100  text-3xl"></i>
                </div>
                <div class="flex items-end justify-between ">
                    <p class="md:text-lg font-bold  mt-4"></p>
                    <p class="text-4xl font-bold"></p>
                </div>
            </div>
        </div>
        <div class="bg-red-600 text-white dark:text-gray-100 dark:bg-[#111c44] m-4 rounded-xl h-36 shadow-md">
            <div class="p-8">
                <div class="w-12 h-12 bg-white text-red-600 dark:bg-red-600 rounded-full flex items-center justify-center">
                    <i class="ri-team-fill dark:text-gray-100 text-3xl"></i>
                </div>
                <div class="flex items-end justify-between">
                    <p class="md:text-lg font-bold  mt-4">
                    </p>
                    <p class="text-4xl font-bold"></p>
                </div>
            </div>
        </div>

        <div class="bg-[#50970e] text-white dark:text-gray-100 dark:bg-[#111c44] m-4 rounded-xl h-36 shadow-md">
            <div class="p-8">
                <div
                    class="w-12 h-12 bg-white text-[#50970e] dark:bg-[#50970e] rounded-full flex items-center justify-center">
                    <i class="ri-earth-fill dark:text-gray-100 text-3xl"></i>
                </div>
                <div class="flex items-end justify-between">
                    <p class="md:text-lg font-bold  mt-4">
                    </p>
                    <p class="text-4xl font-bold"></p>
                </div>
            </div>
        </div>
    </div>
    {{-- Visits --}}
    {{-- <div class="flex items-center justify-center  py-8 px-4 bg-white dark:bg-[#111c44] mx-4 rounded-xl shadow-md">
        <div class="w-full">
            <div class="flex flex-col justify-between h-full">
                <div>
                    <div class="lg:flex w-full justify-between">
                        <h3 class="text-gray-600 dark:text-gray-100  leading-5 text-base md:text-xl font-bold">Details
                            of Visits</h3>
                    </div>

                </div>
                <div class="mt-2">
                    <canvas id="myChart" width="1025" height="400" role="img"
                        aria-label="line graph to show selling overview in terms of months and numbers"></canvas>
                </div>
            </div>
        </div>
    </div> --}}
    {{-- End Visits --}}




    {{-- <script src="https://cdn.jsdelivr.net/npm/chart.js@2.8.0"></script>
    <script>
        const chart = new Chart(document.getElementById("myChart"), {
            type: "line",
            data: {
                labels: {!! json_encode($visitdate) !!},
                datasets: [{
                    label: "No of Visits",
                    borderColor: "#1357a6",
                    data: {!! json_encode($visits) !!},
                    fill: true,
                    pointBackgroundColor: "#1357a6",
                    borderWidth: "3",
                    pointBorderWidth: "4",
                    pointHoverRadius: "6",
                    pointHoverBorderWidth: "8",
                    pointHoverBorderColor: "rgb(74,85,104,0.2)"
                }]
            },
            options: {
                legend: {
                    position: false
                },
                scales: {
                    yAxes: [{
                        gridLines: {
                            display: true
                        },
                        display: false
                    }]
                }
            }
        });
    </script> --}}
@endsection
