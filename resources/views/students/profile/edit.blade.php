@extends('layouts.master')

@section('content')
    @include('layouts.message')
    <div class="xl:px-24 lg:px-16 sm:px-12 px-4 py-6 bg-gray-100">
        <div class="grid lg:grid-cols-2 gap-8 2xl:max-w-[1600px] xl:max-w-[1280px] w-full mx-auto">
            <div class="pb-8 p-4 bg-white rounded-xl shadow-md">
                <form action="{{ route('studentProfile.update', $student->id) }}" method="POST" enctype="multipart/form-data">
                    @csrf
                    @method('PUT')

                    <div class="form-group">
                        <input type="hidden" name="oldpath" id="oldpath" value="{{ $student->profile_photo }}">
                        <p><input type="file" class="form-control" accept="image/*" name="profile_photo" id="file"
                                onchange="loadFile(event)" style="display: none;"></p>

                        <label for="file" class="cursor-pointer"><img
                                class="w-40 h-40 mx-auto rounded-full border-2 border-slate-200"
                                src="{{ asset('img/profiles/' . $student->profile_photo) }}" id="output"
                                width="300" /></label>

                        <script>
                            var loadFile = function(event) {
                                var image = document.getElementById('output');
                                image.src = URL.createObjectURL(event.target.files[0]);
                            };
                        </script>
                        @if ($errors->has('profile_photo'))
                            <span class="invalid-feedback">
                                <strong class="text-red-500">{{ $errors->first('profile_photo') }}</strong>
                            </span>
                        @endif
                    </div>
                    <div class="mt-4">
                        <label for="name" class="text-lg font-bold">Name</label>
                        <input type="text" id="name" name="name" placeholder="Enter name"
                            class="focus:ring-0 mt-1 border-0 placeholder:text-sm dark:placeholder:text-gray-100 bg-gray-200  block w-full py-2 rounded-md"
                            value="{{ $student->name }}">
                        @if ($errors->has('name'))
                            <span class="invalid-feedback">
                                <strong class="text-red-500">{{ $errors->first('name') }}</strong>
                            </span>
                        @endif
                    </div>

                    <div class="mt-4">
                        <label for="email" class="text-lg font-bold">Email</label>
                        <input type="email" id="email" name="email" placeholder="Enter email"
                            class="focus:ring-0 mt-1 border-0 placeholder:text-sm dark:placeholder:text-gray-100 bg-gray-200  block w-full py-2 rounded-md"
                            value="{{ $student->email }}">
                        @if ($errors->has('email'))
                            <span class="invalid-feedback">
                                <strong class="text-red-500">{{ $errors->first('email') }}</strong>
                            </span>
                        @endif
                    </div>

                    <div class="mt-4">
                        <label for="phone" class="text-lg font-bold">Phone</label>
                        <input type="text" id="phone" name="phone" placeholder="Enter phone" required
                            class="focus:ring-0 mt-1 border-0 placeholder:text-sm dark:placeholder:text-gray-100 bg-gray-200  block w-full py-2 rounded-md"
                            value="{{ $student->phone }}">
                        @if ($errors->has('phone'))
                            <span class="invalid-feedback">
                                <strong class="text-red-500">{{ $errors->first('phone') }}</strong>
                            </span>
                        @endif
                    </div>

                    <div class="mt-4">
                        <label for="address" class="text-lg font-bold">Address</label>
                        <input type="text" id="address" name="address" placeholder="Enter address" required
                            class="focus:ring-0 mt-1 border-0 placeholder:text-sm dark:placeholder:text-gray-100 bg-gray-200  block w-full py-2 rounded-md"
                            value="{{ $student->address }}">
                        @if ($errors->has('address'))
                            <span class="invalid-feedback">
                                <strong class="text-red-500">{{ $errors->first('address') }}</strong>
                            </span>
                        @endif
                    </div>

                    <div class="mt-4 flex justify-center">
                        <button type="submit" name="submit"
                            class="bg-blue-700 hover:bg-transparent border-2 hover:border-blue-700 hover:text-blue-700 duration-1000 py-2.5 mx-2 w-24 text-xs  font-bold text-white shadow-md shadow-indigo-200 hover:shadow-sm dark:shadow-gray-600 rounded-full cursor-pointer">Update</button>
                        <a href="{{ route('studentHome') }}"
                            class="bg-[#F70000] hover:bg-transparent border-2 hover:border-[#F70000] hover:text-[#F70000] duration-1000 py-2.5 mx-2 w-24 text-xs text-center font-bold text-white shadow-md shadow-red-200  hover:shadow-sm dark:shadow-gray-600 rounded-full cursor-pointer">Exit</a>
                    </div>
                </form>
            </div>

            <div class="pb-8 p-4 bg-white rounded-xl shadow-md">
                <form action="{{ route('studentPassword.update', $student->id) }}" method="POST">
                    @csrf
                    @method('PUT')

                    <div class="mt-4">
                        <label for="current_password" class="text-lg font-bold">Password</label>
                        <input type="password" id="current_password" name="current_password"
                            placeholder="Enter current password"
                            class="focus:ring-0 mt-1 border-0 placeholder:text-sm dark:placeholder:text-gray-100 bg-gray-200  block w-full py-2 rounded-md">
                        @if ($errors->has('current_password'))
                            <span class="invalid-feedback">
                                <strong class="text-red-500">{{ $errors->first('current_password') }}</strong>
                            </span>
                        @endif
                    </div>

                    <div class="mt-4">
                        <label for="new_password" class="text-lg font-bold">New Password</label>
                        <input type="password" id="new_password" name="new_password" placeholder="Enter new password"
                            class="focus:ring-0 mt-1 border-0 placeholder:text-sm dark:placeholder:text-gray-100 bg-gray-200  block w-full py-2 rounded-md">
                        @if ($errors->has('new_password'))
                            <span class="invalid-feedback">
                                <strong class="text-red-500">{{ $errors->first('new_password') }}</strong>
                            </span>
                        @endif
                    </div>

                    <div class="mt-4">
                        <label for="confirm_password" class="text-lg font-bold">Confirm Password</label>
                        <input type="password" id="confirm_password" name="confirm_password"
                            placeholder="Enter confirm password"
                            class="focus:ring-0 mt-1 border-0 placeholder:text-sm dark:placeholder:text-gray-100 bg-gray-200  block w-full py-2 rounded-md">
                        @if ($errors->has('confirm_password'))
                            <span class="invalid-feedback">
                                <strong class="text-red-500">{{ $errors->first('confirm_password') }}</strong>
                            </span>
                        @endif
                    </div>


                    <div class="mt-4 flex justify-center">
                        <button type="submit" name="submit"
                            class="bg-blue-700 hover:bg-transparent border-2 hover:border-blue-700 hover:text-blue-700 duration-1000 py-2.5 mx-2 w-24 text-xs  font-bold text-white shadow-md shadow-indigo-200 hover:shadow-sm dark:shadow-gray-600 rounded-full cursor-pointer">Update</button>
                        <a href="{{ route('studentHome') }}"
                            class="bg-[#F70000] hover:bg-transparent border-2 hover:border-[#F70000] hover:text-[#F70000] duration-1000 py-2.5 mx-2 w-24 text-xs text-center font-bold text-white shadow-md shadow-red-200  hover:shadow-sm dark:shadow-gray-600 rounded-full cursor-pointer">Exit</a>
                    </div>
                </form>
            </div>
        </div>
    </div>
@endsection
