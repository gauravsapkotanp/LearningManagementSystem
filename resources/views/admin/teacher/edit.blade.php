@extends('layouts.app')

@section('content')
    <div class="pt-12 lg:pt-0 px-4 bg-[#1650d0] pb-36 dark:bg-[#051139]">
        <h1 class="text-lg font-thin text-white  pt-12 lg:pl-4 uppercase">EDIT Teacher</h1>
    </div>
    @include('layouts.message')
    <div class="pb-8 p-4 bg-white dark:bg-[#111c44] rounded-xl shadow-md -mt-28  mx-3 lg:mx-5">
        <form action="{{ route('teacher.update', $teacher->id) }}" method="POST">
            @csrf
            @method('PUT')
            <div class="mt-4">
                <label for="name" class="text-lg font-bold">Name</label>
                <input type="text" id="name" name="name" placeholder="Enter customer name"
                    class="focus:ring-0 mt-1 border-0 placeholder:text-sm dark:placeholder:text-gray-100 bg-gray-200 dark:text-white dark:bg-gray-500 block w-full py-2 rounded-md"
                    required value="{{ $teacher->name }}">
            </div>

            <div class="mt-4">
                <label for="email" class="text-lg font-bold">Email</label>
                <input type="email" id="email" name="email" placeholder="Enter email"
                    class="focus:ring-0 mt-1 border-0 placeholder:text-sm dark:placeholder:text-gray-100 bg-gray-200 dark:text-white dark:bg-gray-500 block w-full py-2 rounded-md"
                    value="{{ $teacher->email }}">
            </div>

            <div class="mt-4">
                <label for="phone" class="text-lg font-bold">Phone</label>
                <input type="text" id="phone" name="phone" placeholder="Enter phone"
                    class="focus:ring-0 mt-1 border-0 placeholder:text-sm dark:placeholder:text-gray-100 bg-gray-200 dark:text-white dark:bg-gray-500 block w-full py-2 rounded-md"
                    value="{{ $teacher->phone }}">
            </div>

            <div class="mt-4">
                <label for="address" class="text-lg font-bold">Address</label>
                <input type="text" id="address" name="address" placeholder="Enter address"
                    class="focus:ring-0 mt-1 border-0 placeholder:text-sm dark:placeholder:text-gray-100 bg-gray-200 dark:text-white dark:bg-gray-500 block w-full py-2 rounded-md"
                    value="{{ $teacher->address }}">
            </div>


            <div class="mt-4 flex justify-center">
                <button type="submit" name="submit"
                    class="bg-blue-700 hover:bg-transparent border-2 hover:border-blue-700 hover:text-blue-700 duration-1000 py-2.5 mx-2 w-24 text-xs  font-bold text-white shadow-md shadow-indigo-200 hover:shadow-sm dark:shadow-gray-600 rounded-full cursor-pointer">Update</button>
                <a href="{{ route('teacher.index', $teacher->status) }}"
                    class="bg-[#F70000] hover:bg-transparent border-2 hover:border-[#F70000] hover:text-[#F70000] duration-1000 py-2.5 mx-2 w-24 text-xs text-center font-bold text-white shadow-md shadow-red-200  hover:shadow-sm dark:shadow-gray-600 rounded-full cursor-pointer">Exit</a>
            </div>
        </form>
    </div>
@endsection
