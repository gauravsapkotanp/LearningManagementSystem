<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Login</title>
    <link rel="icon" type="image/x-icon" href="{{ asset('images/light-logo.png') }}">

    <style>
        @import url('https://fonts.googleapis.com/css2?family=Lato&family=Philosopher&display=swap');
        @import url('https://fonts.googleapis.com/css2?family=Poppins&display=swap');
        @import url('https://fonts.googleapis.com/css2?family=Kumbh+Sans&display=swap');

        body {
            /* font-family: 'Lato', sans-serif; */
            font-family: 'Kumbh Sans', sans-serif;
            background-image: url('https://www.womenbuildingaustralia.com.au/sites/default/files/images/Poly_BG_Grad%20%281%29_0_1.png')
        }

        .heading {
            font-family: 'Philosopher', sans-serif;
        }

        .glass {
            /* From https://css.glass */
            background: rgba(255, 255, 255, 0.24);
            border-radius: 16px;
            box-shadow: 0 4px 30px rgba(0, 0, 0, 0.1);
            backdrop-filter: blur(2px);
            -webkit-backdrop-filter: blur(2px);
            border: 1px solid rgba(255, 255, 255, 1);
        }
    </style>
    <!-- Scripts -->
    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>

<body class="">
    <section>
        @include('layouts.message')
        <div class="h-screen flex items-center justify-center">
            <div class="border-2 glass  rounded-2xl p-8  w-[50rem]">

                <x-auth-session-status class="mb-4" :status="session('status')" />
                <div>
                    <img class="w-80 mx-auto rounded-full" src="{{ asset('images/elms-logo-1200x738.png') }}"
                        alt="">
                    <h1 class="text-center heading text-2xl py-5 font-bold text-white">Login Page 😊</h1>
                </div>

                <form method="POST" action="{{ route('login') }}">
                    @csrf
                    <!-- Email Address -->

                    <div class="my-4 py-2">
                        <input type="email"
                            class="rounded-lg h-12 bg-gray-100 shadow-md border border-transparent focus:ring-indigo-700 w-full  focus:border-indigo-600"
                            name="email" placeholder="Enter Email Address">
                        <x-input-error :messages="$errors->get('email')" class="mt-2" />

                    </div>
                    <!-- Password -->
                    <div class="py-2">
                        <input type="password" name="password"
                            class="rounded-lg h-12 bg-gray-100 shadow-md border border-transparent focus:ring-indigo-700 w-full  focus:border-indigo-600"
                            placeholder="Enter Password">
                        <x-input-error :messages="$errors->get('password')" class="mt-2" />

                    </div>
                    <!-- Remember Me -->
                    <div class="block mt-4">
                        <label for="remember_me" class="inline-flex items-center">
                            <input id="remember_me" type="checkbox"
                                class="rounded border-gray-300 text-indigo-600 shadow-sm focus:ring-indigo-500"
                                name="remember">
                            <span class="ml-2 text-sm text-white">{{ __('Remember me') }}</span>
                        </label>

                    </div>
                    <div class="flex items-center justify-start mt-4">
                        @if (Route::has('password.request'))
                            <a class="underline text-sm text-white hover:text-gray-900 rounded-md focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500"
                                href="{{ route('password.request') }}">
                                {{ __('Forgot your password?') }}
                            </a>
                        @endif
                    </div>
                    <!-- Login BUtton -->
                    <div class="flex justify-center py-4">
                        <input type="submit" value="Login"
                            class="px-20 py-2 mx-2 bg-blue-700 text-white rounded-lg shadow-md hover:bg-blue-900 cursor-pointer ">
                    </div>
                </form>


                <div class="mt-2">
                    <p class=" text-center">
                        <span>Don't have an account?</span>

                        <a href="{{ route('register') }}" class="text-[#f07d00]">Register Now</a>
                    </p>
                </div>

            </div>
        </div>
    </section>

</body>

</html>
