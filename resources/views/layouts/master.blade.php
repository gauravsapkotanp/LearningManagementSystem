<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>E-Learning Management System</title>
    <link rel="icon" type="image/x-icon" href="{{ asset('images/light-logo.png') }}">
    <style>
        @import url('https://fonts.googleapis.com/css2?family=Lato&family=Philosopher&display=swap');
        @import url('https://fonts.googleapis.com/css2?family=Poppins&display=swap');
        @import url('https://fonts.googleapis.com/css2?family=Kumbh+Sans&display=swap');

        body {
            /* font-family: 'Lato', sans-serif; */
            font-family: 'Kumbh Sans', sans-serif;
        }

        .heading {
            font-family: 'Philosopher', sans-serif;
        }
    </style>
    <!-- Scripts -->
    @vite(['resources/css/app.css', 'resources/js/app.js'])
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css"
        integrity="sha512-iecdLmaskl7CVkqkXNQ/ZH/XLlvWZOJyj7Yy7tcenmpD1ypASozpmT/E0iPtmFIB46ZmdtAc9eNBvH0H/ZpiBw=="
        crossorigin="anonymous" referrerpolicy="no-referrer" />
</head>



<body>
    <header class="  sticky top-0 bg-white backdrop-blur-lg bg-opacity-20 ">

        {{-- desktop nav bar  --}}
        <section class="xl:px-16 lg:px-8">
            <div class="sticky top-0   xl:max-w-[1080px]  hidden lg:block w-full  mx-auto">
                <div class="flex justify-between items-center ">
                    <div class="flex items-center gap-5">
                        {{-- <img class="h-16 w-16 p-2" src="{{ asset('images/favicon.png') }}" alt=""> --}}
                        <h1 class="heading text-5xl "><span class="font-bold">Edu</span><span>Hash</span></h1>
                    </div>
                    <ul class=" p-8 flex gap-8  justify-between items-center">
                        <li class="font-bold text-sm hover:text-[#20ad96] transition-all"><a href="#">HOME</a>
                        </li>
                        <li class="font-bold text-sm hover:text-[#20ad96] transition-all"><a href="#">ABOUT US</a>
                        </li>
                        <li class="font-bold text-sm hover:text-[#20ad96] transition-all"><a href="#">COURCES</a>
                        </li>
                        <li class="font-bold text-sm hover:text-[#20ad96] transition-all"><a href="#">BLOGS</a>
                        </li>
                        <li class="font-bold text-sm hover:text-[#20ad96] transition-all"><a href="#">CONTACT</a>
                        </li>
                    </ul>
                    <div>
                        <a href="{{ route('login') }}"> <button
                                class="font-bold text-black hover:bg-gray-700 hover:text-white transition-all ease-in-out duration-150 delay-150 border-2 border-black  rounded-lg px-6 py-2">LOGIN</button></a>
                        <a href="{{ route('register') }}"><button
                                class="font-bold text-white bg-[#20ad96] hover:bg-gray-700 hover:text-white transition-all ease-in-out duration-150 delay-150 border-[#20ad96] hover:border-gray-700 border-2  rounded-lg px-6 py-2">SIGNUP</button></a>
                    </div>
                </div>

            </div>
        </section>

    </header>

    @yield('content')

    <footer class="bg-[#20ad96] ">
        <h1 class="text-xl text-center heading">Hello this is the footer section</h1>
    </footer>

</body>

</html>
