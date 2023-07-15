<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.Learning Management System', 'Learning Management System') }}</title>


    {{-- Data Table --}}
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bulma@0.9.3/css/bulma.min.css">
    <link rel="stylesheet" href="https://cdn.datatables.net/1.11.5/css/dataTables.bulma.min.css">

    {{-- link --}}
    <link href="https://cdn.jsdelivr.net/npm/remixicon@2.5.0/fonts/remixicon.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/animate.css/4.1.1/animate.min.css">


    {{-- Font --}}
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Poppins&display=swap" rel="stylesheet">



    <!-- Scripts -->
    @vite(['resources/css/app.css', 'resources/js/app.js'])
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
    <script src="https://cdn.datatables.net/1.11.5/js/jquery.dataTables.min.js"></script>
    <script src="https://cdn.datatables.net/1.11.5/js/dataTables.bulma.min.js"></script>


    <script>
        // On page load or when changing themes, best to add inline in `head` to avoid FOUC
        if (localStorage.getItem('color-theme') === 'dark' || (!('color-theme' in localStorage) && window.matchMedia(
                '(prefers-color-scheme: dark)').matches)) {
            document.documentElement.classList.add('dark');
        } else {
            document.documentElement.classList.remove('dark')
        }
    </script>



    <style>
        .white-card {
            background: rgba(66, 133, 212, 0.35);
            box-shadow: 0 8px 32px 0 rgba(31, 38, 135, 0.37);
            backdrop-filter: blur(9px);
            -webkit-backdrop-filter: blur(9px);
        }

        .hide-bar::-webkit-scrollbar {
            display: none;
        }

        .profilecard {
            -webkit-animation: slide-top 0.5s cubic-bezier(0.25, 0.46, 0.45, 0.94) both;
            animation: slide-top 0.5s cubic-bezier(0.25, 0.46, 0.45, 0.94) both;
        }

        @-webkit-keyframes slide-top {
            0% {
                -webkit-transform: translateY(100px);
                transform: translateY(100px);
            }

            100% {
                -webkit-transform: translateY(0);
                transform: translateY(0);
            }
        }

        @keyframes slide-top {
            0% {
                -webkit-transform: translateY(100px);
                transform: translateY(100px);
            }

            100% {
                -webkit-transform: translateY(0);
                transform: translateY(0);
            }
        }
    </style>

</head>

<body class="font-[Poppins]">
    <div class="bg-gray-200 dark:bg-[#051139] dark:text-gray-100 min-h-screen pb-4">
        <div
            class="lg:hidden fixed top-0 left-0 right-0 px-3 bg-white dark:bg-[#111c44] shadow py-2 z-50 flex items-center justify-between">
            <div onclick="shownav()">
                <i class="ri-menu-line text-3xl"></i>
            </div>
        </div>

        <div class="fixed lg:absolute z-50 right-4 top-[11px] lg:top-11">

            <div class="relative">
                <div class="flex items-center gap-x-2">
                    <div class="cursor-pointer" onclick="showProfileCard()">
                        @php
                            $user = Auth::user()->name;
                        @endphp
                        <div class="flex items-center lg:text-white">
                            <p class="text-sm">{{ $user }}</p>
                            <i class="ri-arrow-down-s-line"></i>
                        </div>
                    </div>
                    <div>
                        <button id="theme-toggle" type="button"
                            class="text-gray-300 dark:text-gray-300 hover:bg-gray-400 border-gray-300 dark:hover:bg-gray-700 dark:border-gray-700 focus:outline-none rounded-lg text-sm  lg:py-0.5 lg:px-3 py-0.5 px-2">
                            <p id="theme-toggle-dark-icon" class="hidden  lg:text-sm">
                                <i class="ri-moon-fill"></i>
                            </p>
                            <p id="theme-toggle-light-icon" class="hidden  lg:text-sm">
                                <i class="ri-sun-fill"></i>
                            </p>
                        </button>
                    </div>
                </div>
                <div class="absolute right-2 top-8 rounded-md w-60 py-2 bg-white  shadow profilecard hidden"
                    id="profilecard">

                    <ul class="border-b">
                        <a href="{{ route('profile.edit') }}">
                            <li
                                class="text-gray-700 px-4 py-2 hover:bg-gray-200 hover:text-[#1650d0] flex items-center gap-x-2">
                                <i class="ri-user-3-fill"></i>
                                <span>Profile</span>
                            </li>
                        </a>
                    </ul>
                    <form action="{{ route('logout') }}" method="POST">
                        @csrf
                        <button type="submit"
                            class="flex items-center cursor-pointer text-gray-700 px-4 hover:bg-gray-200 hover:text-[#1650d0] py-2 w-full gap-2">
                            <i class="ri-logout-circle-r-line"></i>
                            <p>Logout</p>
                        </button>
                    </form>
                </div>
            </div>
        </div>
        <div class="fixed left-0 top-0 bottom-0 w-60 z-50 bg-white dark:bg-[#111c44] dark:text-gray-100  shadow-lg shadow-[#213a57] overflow-auto hide-bar hidden lg:block"
            id="shownav">
            <div class="h-6 w-6 bg-gray-200 invisible text-blue-500 rounded-full flex items-center justify-center float-right mt-2 lg:hidden"
                onclick="hidenav()">
                <i class="ri-close-line text-xl"></i>
            </div>

            <div class="mx-4 mt-4 border-b pb-8 dark:bg-white py-1 px-4 dark:rounded-xl">
                <img class="w-28 mx-auto" src="{{ asset('images/elms-logo-1200x738.png') }}" alt="">
            </div>
            <div class="mt-4 mx-4">
                <ul>
                    <a href="{{ route('dashboard') }}">
                        <li
                            class="text-xl font-medium  p-2  flex items-center dark:text-gray-100 gap-2   hover:bg-gradient-to-r hover:from-[#1650d0] hover:to-[#264381]  hover:text-white  hover:rounded-md hover:shadow-md hover:shadow-blue-200 hover:dark:shadow-gray-600  @if (request()->routeIs('dashboard')) bg-gradient-to-r from-[#1650d0] to-[#264381] text-white  rounded-md shadow-md shadow-blue-200 dark:shadow-gray-600 @endif">
                            <i class="ri-dashboard-fill text-2xl"></i>
                            <span class="text-sm font-thin">Dashboard</span>
                        </li>
                    </a>


                    @if (Auth::user()->role == 'Superadmin')
                        <a href="{{ route('teacher.index', 'Pending') }}">
                            <li
                                class="text-xl font-medium mt-2  p-2  flex items-center dark:text-gray-100 gap-2   hover:bg-gradient-to-r hover:from-[#1650d0] hover:to-[#264381]  hover:text-white  hover:rounded-md hover:shadow-md hover:shadow-blue-200 hover:dark:shadow-gray-600  @if (request()->routeIs('teacher.*')) bg-gradient-to-r from-[#1650d0] to-[#264381] text-white  rounded-md shadow-md shadow-blue-200 dark:shadow-gray-600 @endif">
                                <i class="ri-team-fill text-2xl"></i>
                                <span class="text-sm font-thin">Teachers</span>
                            </li>
                        </a>
                    @endif



                    <a href="{{ route('student.index', 'Pending') }}">
                        <li
                            class="text-xl font-medium mt-2  p-2  flex items-center dark:text-gray-100 gap-2   hover:bg-gradient-to-r hover:from-[#1650d0] hover:to-[#264381]  hover:text-white  hover:rounded-md hover:shadow-md hover:shadow-blue-200 hover:dark:shadow-gray-600  @if (request()->routeIs('student.*')) bg-gradient-to-r from-[#1650d0] to-[#264381] text-white  rounded-md shadow-md shadow-blue-200 dark:shadow-gray-600 @endif">
                            <i class="ri-user-2-fill text-2xl"></i>
                            <span class="text-sm font-thin">Students</span>
                        </li>
                    </a>


                    <li>
                        <form action="{{ route('logout') }}" method="POST">
                            @csrf
                            <button type="submit"
                                class="text-xl font-medium w-full   p-2 mt-4   flex items-center gap-2 hover:bg-gradient-to-r hover:from-[#1650d0] hover:to-[#264381]  hover:text-white  hover:rounded-md hover:shadow-md hover:shadow-blue-200 hover:dark:shadow-gray-600">
                                <i class="ri-logout-box-r-line text-2xl"></i>
                                <span class="text-sm font-thin">Logout</span>
                            </button>
                        </form>
                    </li>
                </ul>
            </div>
        </div>
        <div class="lg:pl-60">

            <div>
                @yield('content')
            </div>
        </div>
    </div>

    @yield('js')


    <script>
        var themeToggleDarkIcon = document.getElementById('theme-toggle-dark-icon');
        var themeToggleLightIcon = document.getElementById('theme-toggle-light-icon');

        // Change the icons inside the button based on previous settings
        if (localStorage.getItem('color-theme') === 'dark' || (!('color-theme' in localStorage) && window.matchMedia(
                '(prefers-color-scheme: dark)').matches)) {
            themeToggleLightIcon.classList.remove('hidden');
        } else {
            themeToggleDarkIcon.classList.remove('hidden');
        }

        var themeToggleBtn = document.getElementById('theme-toggle');

        themeToggleBtn.addEventListener('click', function() {

            // toggle icons inside button
            themeToggleDarkIcon.classList.toggle('hidden');
            themeToggleLightIcon.classList.toggle('hidden');

            // if set via local storage previously
            if (localStorage.getItem('color-theme')) {
                if (localStorage.getItem('color-theme') === 'light') {
                    document.documentElement.classList.add('dark');
                    localStorage.setItem('color-theme', 'dark');
                } else {
                    document.documentElement.classList.remove('dark');
                    localStorage.setItem('color-theme', 'light');
                }

                // if NOT set via local storage previously
            } else {
                if (document.documentElement.classList.contains('dark')) {
                    document.documentElement.classList.remove('dark');
                    localStorage.setItem('color-theme', 'light');
                } else {
                    document.documentElement.classList.add('dark');
                    localStorage.setItem('color-theme', 'dark');
                }
            }

        });
    </script>

    <script>
        function shownav() {
            document.getElementById('shownav').style.display = 'block';
        }

        function hidenav() {
            document.getElementById('shownav').style.display = 'none';
            if (screen.width > 768) {
                document.getElementById('shownav').style.display = 'block';

            }
        }

        var container = document.getElementById('shownav');

        $(document).mouseup(function(e) {
            if (!container.contains(e.target)) {
                hidenav();
            }
        });
    </script>

    <script>
        function showProfileCard() {
            if (document.getElementById('profilecard').style.display == 'block') {
                document.getElementById('profilecard').style.display = 'none';
            } else {
                document.getElementById('profilecard').style.display = 'block';
            }
        }
    </script>
</body>

</html>
