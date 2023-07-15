@extends('layouts.app')
@section('content')
    <div class="pt-12 lg:pt-0 px-4 bg-[#1650d0] pb-36 dark:bg-[#051139]">
        <h1 class="text-lg font-thin text-white pt-12 lg:pl-4">REGISTER</h1>
    </div>
    @include('layouts.message')
    <div class="pb-8 p-4 bg-white dark:bg-[#111c44] rounded-xl shadow-md -mt-28 mx-3 lg:mx-5 ">
        <form method="POST" action="{{ route('teacher.store') }}">
            @csrf
            <div class="py-2">
                <label for="name">Name</label>
                <input type="text"
                    class="rounded-lg h-12 mt-2 bg-gray-100 shadow-md border border-transparent focus:ring-indigo-700 w-full  focus:border-indigo-600"
                    name="name" placeholder="Enter your name" value="{{ old('name') }}" required>
                @if ($errors->has('name'))
                    <span class="invalid-feedback">
                        <strong class="text-red-500">{{ $errors->first('name') }}</strong>
                    </span>
                @endif
            </div>


            <div class="py-2">
                <label for="email">Email</label>
                <input type="email"
                    class="rounded-lg h-12 mt-2 bg-gray-100 shadow-md border border-transparent focus:ring-indigo-700 w-full  focus:border-indigo-600"
                    name="email" placeholder="Enter email" value="{{ old('email') }}" required>
                @if ($errors->has('email'))
                    <span class="invalid-feedback">
                        <strong class="text-red-500">{{ $errors->first('email') }}</strong>
                    </span>
                @endif
            </div>

            <div class="py-2">
                <label for="phone">Phone</label>
                <input type="text"
                    class="rounded-lg h-12 mt-2 bg-gray-100 shadow-md border border-transparent focus:ring-indigo-700 w-full  focus:border-indigo-600"
                    name="phone" placeholder="Enter phone" value="{{ old('phone') }}" required>
                @if ($errors->has('phone'))
                    <span class="invalid-feedback">
                        <strong class="text-red-500">{{ $errors->first('phone') }}</strong>
                    </span>
                @endif
            </div>

            <input type="hidden" name="status" value="Approved">
            <input type="hidden" name="role" value="Teacher">


            <div class="py-2">
                <label for="address">Address</label>
                <input type="text"
                    class="rounded-lg h-12 mt-2 bg-gray-100 shadow-md border border-transparent focus:ring-indigo-700 w-full  focus:border-indigo-600"
                    name="address" placeholder="Enter address" value="{{ old('address') }}" required>
                @if ($errors->has('address'))
                    <span class="invalid-feedback">
                        <strong class="text-red-500">{{ $errors->first('address') }}</strong>
                    </span>
                @endif
            </div>

            <div class="py-2">
                <label for="password">Password</label>
                <input type="password" name="password"
                    class="rounded-lg h-12 mt-2 bg-gray-100 shadow-md border border-transparent focus:ring-indigo-700 w-full  focus:border-indigo-600"
                    placeholder="Enter Password" value="{{ old('password') }}" required>
                @if ($errors->has('password'))
                    <span class="invalid-feedback">
                        <strong class="text-red-500">{{ $errors->first('password') }}</strong>
                    </span>
                @endif
            </div>

            <div class="py-2">
                <label for="password_confirmation">Confirm Password</label>
                <input type="password" name="password_confirmation"
                    class="rounded-lg h-12 mt-2 bg-gray-100 shadow-md border border-transparent focus:ring-indigo-700 w-full  focus:border-indigo-600"
                    placeholder="Enter Password" value="{{ old('password') }}" required>
                @if ($errors->has('password_confirmation'))
                    <span class="invalid-feedback">
                        <strong class="text-red-500">{{ $errors->first('password_confirmation') }}</strong>
                    </span>
                @endif
            </div>



            <div class="mt-4 flex justify-center">
                <button type="submit" name="submit"
                    class="bg-blue-700 hover:bg-transparent border-2 hover:border-blue-700 hover:text-blue-700 duration-1000 py-2.5 mx-2 w-24 text-xs  font-bold text-white shadow-md shadow-indigo-200 hover:shadow-sm dark:shadow-gray-600 rounded-full cursor-pointer">Register</button>
                <a href="{{ route('teacher.index') }}"
                    class="bg-[#F70000] hover:bg-transparent border-2 hover:border-[#F70000] hover:text-[#F70000] duration-1000 py-2.5 mx-2 w-24 text-xs text-center font-bold text-white shadow-md shadow-red-200  hover:shadow-sm dark:shadow-gray-600 rounded-full cursor-pointer">Exit</a>
            </div>
        </form>
    </div>
@endsection
