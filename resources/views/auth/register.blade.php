<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Register</title>
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
        <div class="h-screen flex items-center justify-center">
            <div class="border-2 glass rounded-2xl p-8  w-[50rem]">


                <div>
                    <img class="w-80 mx-auto rounded-full" src="{{ asset('images/elms-logo-1200x738.png') }}"
                        alt="">
                    <h1 class="text-center heading text-2xl py-5 font-bold text-white">Fill up the given form to
                        Register 😊</h1>
                </div>

                <form method="POST" action="{{ route('register') }}">
                    @csrf

                    <div class="grid lg:grid-cols-2 gap-2">
                        <div class="py-2">
                            <label for="name" class="text-white">Name <span class="text-red-500">*</span></label>
                            <input type="text"
                                class="rounded-lg h-12 mt-1 bg-gray-100 shadow-md border border-transparent focus:ring-indigo-700 w-full  focus:border-indigo-600"
                                name="name" placeholder="Please enter your name" value="{{ old('name') }}"
                                required>
                            @if ($errors->has('name'))
                                <span class="invalid-feedback  text-red-500">
                                    <strong>{{ $errors->first('name') }}</strong>
                                </span>
                            @endif
                        </div>


                        <div class="py-2">
                            <label for="phone" class="text-white">Mobile Number <span
                                    class="text-red-500">*</span></label>
                            <input type="text"
                                class="rounded-lg h-12 mt-1 bg-gray-100 shadow-md border border-transparent focus:ring-indigo-700 w-full  focus:border-indigo-600"
                                name="phone" placeholder="Please enter your mobile number" value="{{ old('phone') }}"
                                required>
                            @if ($errors->has('phone'))
                                <span class="invalid-feedback  text-red-500">
                                    <strong>{{ $errors->first('phone') }}</strong>
                                </span>
                            @endif
                        </div>
                    </div>

                    <div class="grid lg:grid-cols-2 gap-2">
                        <div class="py-2">
                            <label for="email" class="text-white">Email <span class="text-red-500">*</span></label>
                            <input type="email"
                                class="rounded-lg h-12 mt-1 bg-gray-100 shadow-md border border-transparent focus:ring-indigo-700 w-full  focus:border-indigo-600"
                                name="email" placeholder="Please enter your email" value="{{ old('email') }}"
                                required>
                            @if ($errors->has('email'))
                                <span class="invalid-feedback  text-red-500">
                                    <strong>{{ $errors->first('email') }}</strong>
                                </span>
                            @endif
                        </div>

                        <div class="py-2">
                            <label for="address" class="text-white">Address <span class="text-red-500">*</span></label>
                            <input type="text"
                                class="rounded-lg h-12 mt-1 bg-gray-100 shadow-md border border-transparent focus:ring-indigo-700 w-full  focus:border-indigo-600"
                                name="address" placeholder="Please enter your address" value="{{ old('address') }}"
                                required>
                            @if ($errors->has('address'))
                                <span class="invalid-feedback  text-red-500">
                                    <strong>{{ $errors->first('address') }}</strong>
                                </span>
                            @endif
                        </div>
                    </div>


                    <div class="py-2">
                        <label for="faculty" class="text-white">Faculty <span class="text-red-500">*</span></label>

                        <select name="faculty" id="faculty"
                            class="rounded-lg h-12 mt-1 bg-gray-100 shadow-md border border-transparent focus:ring-indigo-700 w-full  focus:border-indigo-600">
                            <option disabled selected>-- Select faculty --</option>
                            <option value="BCA">BCA</option>
                            <option value="BIT">BIT</option>
                            <option value="BIM">BIM</option>
                            <option value="BSIT">BSIT</option>
                            <option value="CSIT">CSIT</option>
                        </select>

                        @if ($errors->has('faculty'))
                            <span class="invalid-feedback  text-red-500">
                                <strong>{{ $errors->first('faculty') }}</strong>
                            </span>
                        @endif
                    </div>



                    <div class="py-2">
                        <label for="password" class="text-white">Password <span class="text-red-500">*</span></label>
                        <input type="password" name="password"
                            class="rounded-lg h-12 mt-1 bg-gray-100 shadow-md border border-transparent focus:ring-indigo-700 w-full  focus:border-indigo-600"
                            placeholder="Set the login password" value="{{ old('password') }}" required>
                        @if ($errors->has('password'))
                            <span class="invalid-feedback text-red-500">
                                <strong>{{ $errors->first('password') }}</strong>
                            </span>
                        @endif
                    </div>



                    <div class="py-2">
                        <label for="password_confirmation" class="text-white">Confirm Password <span
                                class="text-red-500">*</span></label>
                        <input type="password" name="password_confirmation"
                            class="rounded-lg h-12 mt-1 bg-gray-100 shadow-md border border-transparent focus:ring-indigo-700 w-full  focus:border-indigo-600"
                            placeholder="Enter the confirm password again" value="{{ old('password') }}" required>
                        @if ($errors->has('password_confirmation'))
                            <span class="invalid-feedback text-red-500">
                                <strong>{{ $errors->first('password_confirmation') }}</strong>
                            </span>
                        @endif
                    </div>


                    <input type="hidden" name="role" value="Student">


                    <div class="form-group">
                        <p><input type="file" class="form-control" accept="image/*" name="profile_photo"
                                id="file" onchange="loadFile(event)" style="display: none;"></p>

                        <p
                            class="bg-[#1650d0] text-white hover:bg-[#2966e9] duration-1000 py-2 px-4 mt-4 float-left rounded-lg cursor-pointer">
                            <label for="file" style="cursor: pointer;">
                                Profile Photo
                            </label>
                        </p>

                        <p class="pt-16"><img id="output" width="100" /></p>

                        <script>
                            var loadFile = function(event) {

                                var image = document.getElementById('output');

                                image.src = URL.createObjectURL(event.target.files[0]);

                            };
                        </script>
                        @if ($errors->has('profile_photo'))
                            <span class="invalid-feedback  text-red-500">
                                <strong>{{ $errors->first('profile_photo') }}</strong>
                            </span>
                        @endif
                    </div>
                    <div class="flex justify-center py-2">
                        <input type="submit" value="Register"
                            class="px-20 py-2 mx-2 bg-blue-700 text-white rounded-lg shadow-md hover:bg-blue-900 cursor-pointer ">
                    </div>
                </form>

                <div class="mt-2">
                    <p class=" text-center">
                        <span>Already have an account?</span>

                        <a href="{{ route('login') }}" class="text-[#f07d00]">Login Now</a>
                    </p>
                </div>

            </div>
        </div>
    </section>

</body>

</html>
