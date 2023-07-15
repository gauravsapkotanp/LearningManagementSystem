<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Learning Management System</title>

    {{-- font --}}
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Poppins&display=swap" rel="stylesheet">

    {{-- link --}}
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/@fancyapps/ui/dist/fancybox.css" />
    <link href="https://cdn.jsdelivr.net/npm/remixicon@2.5.0/fonts/remixicon.css" rel="stylesheet">



    <!-- Scripts -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
    @vite(['resources/css/app.css', 'resources/js/app.js'])
    <script src="https://cdn.jsdelivr.net/npm/@fancyapps/ui@4.0/dist/fancybox.umd.js"></script>


    <style>
        .white-card {
            background: rgba(66, 133, 212, 0.35);
            box-shadow: 0 8px 32px 0 rgba(31, 38, 135, 0.37);
            backdrop-filter: blur(9px);
            -webkit-backdrop-filter: blur(9px);
        }

        .logoutbar {
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

    <nav class="bg-[#034C83] py-3 sticky top-0  z-50 xl:px-12 lg:px-8 px-6">
        <div class="text-white flex items-center justify-between 2xl:max-w-[1600px] xl:max-w-[1280px] w-full mx-auto">
            <h1 class="text-xl"><a href="{{ route('studentHome') }}">Student Portal</a></h1>
            <div class="relative">
                @php
                    $student = Auth::user();
                @endphp
                <button id="mypic">
                    <img class="w-12 h-12 rounded-full object-cover"
                        src="{{ asset('profiles/' . $student->photopath) }}" alt="">
                </button>
                <div class="absolute right-2 top-12  w-60 pt-4 bg-white  shadow logoutbar hidden" id="dropDown">

                    <div class="px-4 border-b pb-2 font-bold">
                        <h3 class="text-xl text-gray-700">{{ $student->name }}</h3>
                    </div>
                    <ul>
                        <a href="{{ route('studentHome') }}">
                            <li
                                class="text-gray-700 px-4 py-2 border-b hover:bg-gray-200 hover:text-[#1650d0] flex items-center gap-x-2">
                                <i class="ri-home-3-fill"></i>
                                <span>Home</span>
                            </li>
                        </a>

                        <a href="#">
                            <li
                                class="text-gray-700 px-4 py-2 border-b hover:bg-gray-200 hover:text-[#1650d0] flex items-center gap-x-2">
                                <i class="ri-user-3-fill"></i>
                                <span>Profile</span>
                            </li>
                        </a>
                    </ul>
                    <form action="{{ route('logout') }}" method="POST">
                        @csrf
                        <button type="submit"
                            class="flex items-center text-lg cursor-pointer text-gray-700 px-4 hover:bg-gray-200 hover:text-[#225fa2] py-2 w-full gap-2">
                            <i class="ri-logout-circle-r-line"></i>
                            <p>Logout</p>
                        </button>
                    </form>
                </div>
            </div>
        </div>
    </nav>


    @yield('content')

    {{-- Footer --}}
    <div class="bg-[#0b2469] py-12 xl:px-12 lg:px-8 px-6">
        <div
            class="2xl:max-w-[1600px] xl:max-w-[1280px] w-full mx-auto grid sm:grid-cols-2 xl:grid-cols-4 gap-y-10 gap-x-20">
            <div>
                {{-- <h1 class="2xl:text-2xl xl:text-xl text-lg uppercase font-bold text-white">About Us</h1> --}}
                <img class="w-60" src="https://publicspeakingschool.org/wp-content/uploads/2021/11/logo.png"
                    alt="">
                <div class="mt-6">
                    <p class="text-gray-100 2xl:text-base text-sm">
                        The 1st dedicated public speaking destination in Egypt & the Middle East with in-depth
                        handling
                        for every public speaking angle out there through a specially customized learning journey
                        for
                        kids, youth, professionals, executives and spokespersons.
                    </p>
                    <div class="flex items-center gap-x-5 mt-6">
                        <a href="#" title="facebook"
                            class="border-2 border-white w-12 h-12 rounded-full text-white flex items-center justify-center hover:bg-white hover:text-[#0b2469] duration-1000 hover:-translate-y-3">
                            <i class="ri-facebook-fill text-3xl"></i>
                        </a>

                        <a href="#" title="instagram"
                            class="border-2 border-white w-12 h-12 rounded-full text-white flex items-center justify-center  hover:bg-white hover:text-[#0b2469] duration-1000 hover:-translate-y-3">
                            <i class="ri-instagram-fill text-3xl"></i>
                        </a>

                        <a href="#" title="linkedin"
                            class="border-2 border-white w-12 h-12 rounded-full text-white flex items-center justify-center  hover:bg-white hover:text-[#0b2469] duration-1000 hover:-translate-y-3">
                            <i class="ri-linkedin-fill text-3xl"></i>
                        </a>
                    </div>
                </div>
            </div>

            <div>
                <h1 class="2xl:text-2xl xl:text-xl text-lg uppercase font-bold text-white">Contact</h1>
                <div class="mt-6">
                    <div class="flex items-center gap-x-2">
                        <i class="ri-map-2-fill text-xl text-gray-100"></i>
                        <div>
                            <p class="text-xs text-gray-100">
                                Visit our Main office
                            </p>
                            <p class="2xl:text-base text-sm text-gray-100">
                                Cairo, Egypt
                            </p>
                        </div>
                    </div>

                    <div class="flex items-center gap-x-2 mt-4">
                        <i class="ri-phone-fill text-xl text-gray-100"></i>
                        <div>
                            <p class="text-xs text-gray-100">
                                Sunday-Thursday: 10 am-5 pm
                            </p>
                            <a href="tel:+61 431 407 058" class="hover:underline 2xl:text-base text-sm text-gray-100">
                                (+2) 01064927722
                            </a>
                        </div>
                    </div>

                    <div class="flex items-center gap-x-2 mt-4">
                        <i class="ri-mail-fill text-xl text-gray-100"></i>
                        <div>
                            <p class="text-xs text-gray-100">
                                Looking for collaboration?
                            </p>
                            <a href="mailto:info@gmail.com" class="hover:underline 2xl:text-base text-sm text-gray-100">
                                info@gmail.com
                            </a>
                        </div>
                    </div>
                </div>
            </div>


            <div>
                <h1 class="2xl:text-2xl xl:text-xl text-lg uppercase font-bold text-white">Services</h1>
                <div class="mt-6">
                    <ul>
                        <li class="text-gray-100">
                            <a href="#" class="hover:underline">
                                Executive Speech Coaching
                            </a>
                        </li>

                        <li class="text-gray-100 mt-2">
                            <a href="#" class="hover:underline">
                                Professional Coaching
                            </a>
                        </li>

                        <li class="text-gray-100 mt-2">
                            <a href="#" class="hover:underline">
                                Development Consultation
                            </a>
                        </li>

                        <li class="text-gray-100  mt-2">
                            <a href="#" class="hover:underline">
                                Formal Speech
                            </a>
                        </li>

                        <li class="text-gray-100  mt-2">
                            <a href="#" class="hover:underline">
                                Consultation
                            </a>
                        </li>
                    </ul>
                </div>
            </div>

            <div>
                <h1 class="2xl:text-2xl xl:text-xl text-lg uppercase font-bold text-white">Training Programs</h1>
                <div class="mt-6">
                    <ul>
                        <li class="text-gray-100">
                            <a href="#" class="hover:underline">
                                Professionals Tracks
                            </a>
                        </li>

                        <li class="text-gray-100 mt-2">
                            <a href="#" class="hover:underline">
                                Executives, Spokespersons & Public Figures Track
                            </a>
                        </li>

                        <li class="text-gray-100  mt-2">
                            <a href="#" class="hover:underline">
                                Startups Track
                            </a>
                        </li>

                        <li class="text-gray-100  mt-2">
                            <a href="#" class="hover:underline">
                                Kids Track
                            </a>
                        </li>

                        <li class="text-gray-100  mt-2">
                            <a href="#" class="hover:underline">
                                Youth Track
                            </a>
                        </li>
                    </ul>
                </div>
            </div>
        </div>
    </div>
    <div class="xl:px-12 lg:px-8 px-6 bg-[#12328a] py-4">
        <div
            class="2xl:max-w-[1600px] xl:max-w-[1280px] w-full mx-auto md:flex items-center justify-between text-center">
            <p class="2xl:text-base md:text-sm text-xs text-gray-100">
                Copyright &copy; {{ now()->year }}
                <span class="font-bold text-white">
                    PSS.
                </span> All rights reserved
            </p>
            <p class="2xl:text-base md:text-sm text-xs mt-4 md:mt-0 text-gray-100">
                Powered by
                <a href="https://bitmapitsolution.com/" target="_blank" class="font-bold hover:underline text-white">
                    Bitmap I.T. Solution Pvt. Ltd.
                </a>
            </p>
        </div>
    </div>
    {{-- End Footer --}}

    <script>
        function showDropdown() {
            if (document.getElementById('dropDown').style.display != 'block') {
                document.getElementById('dropDown').style.display = 'block';
            } else {
                hideDropdown();
            }
        }

        function hideDropdown() {
            document.getElementById('dropDown').style.display = 'none';
        }
        var container = document.getElementById('dropDown');
        var pic = document.getElementById('mypic');
        $(document).mouseup(function(e) {
            if (!container.contains(e.target) && container.style.display == 'block') {
                hideDropdown();
            } else if (pic.contains(e.target)) {
                showDropdown();
            }
        });
    </script>
</body>

</html>
