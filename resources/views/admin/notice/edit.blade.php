@extends('layouts.app')

@section('content')
    <div class="pt-12 lg:pt-0 px-4 bg-[#1650d0] pb-36 dark:bg-[#051139]">
        <h1 class="text-lg font-thin text-white  pt-12 lg:pl-4 uppercase">EDIT Notice</h1>
    </div>
    @include('layouts.message')
    <div class="pb-8 p-4 bg-white dark:bg-[#111c44] rounded-xl shadow-md -mt-28  mx-3 lg:mx-5">
        <form action="{{ route('notice.update', $notice->id) }}" method="POST" enctype="multipart/form-data">
            @csrf
            @method('PUT')

            <div class="py-2">
                <label for="title">Title</label>
                <input type="text"
                    class="rounded-lg h-12 mt-2 bg-gray-100 shadow-md border border-transparent focus:ring-indigo-700 w-full  focus:border-indigo-600"
                    name="title" placeholder="Enter title" value="{{ $notice->title }}" required>
            </div>

            <div class="py-2">
                <label for="date">Date</label>
                <input type="date"
                    class="rounded-lg h-12 mt-2 bg-gray-100 shadow-md border border-transparent focus:ring-indigo-700 w-full  focus:border-indigo-600"
                    name="date" placeholder="Select date" value="{{ $notice->date }}" required>
            </div>

            <div class="py-2">
                <label for="status">Status</label>
                <select name="status" id="status"
                    class="rounded-lg h-12 mt-2 bg-gray-100 shadow-md border border-transparent focus:ring-indigo-700 w-full  focus:border-indigo-600">
                    <option disabled selected>-- Select Status --</option>
                    <option value="Show" @if ($notice->status == 'Show') Selected @endif>Show</option>
                    <option value="Hide" @if ($notice->status == 'Hide') Selected @endif>Hide</option>
                </select>
            </div>


            <div class="form-group">
                <p>
                    <input type="file" class="form-control" accept="image/*" name="file" id="file"
                        onchange="loadFile(event)" style="display: none;">
                </p>
                <p
                    class="bg-[#1650d0] text-white hover:bg-[#2966e9] duration-1000 py-2 px-4 mt-4 float-left rounded-lg cursor-pointer">
                    <label for="file" style="cursor: pointer;">
                        Select Notice File
                    </label>
                </p>

                <p class="pt-16"><img src="{{ asset('img/files/' . $notice->file) }}" id="output" width="240" /></p>

                <script>
                    var loadFile = function(event) {
                        var image = document.getElementById('output');
                        image.src = URL.createObjectURL(event.target.files[0]);
                    };
                </script>
            </div>

            <div class="mt-4 flex justify-center">
                <button type="submit" name="submit"
                    class="bg-blue-700 hover:bg-transparent border-2 hover:border-blue-700 hover:text-blue-700 duration-1000 py-2.5 mx-2 w-24 text-xs  font-bold text-white shadow-md shadow-indigo-200 hover:shadow-sm dark:shadow-gray-600 rounded-full cursor-pointer">Update</button>
                <a href="{{ route('notice.index') }}"
                    class="bg-[#F70000] hover:bg-transparent border-2 hover:border-[#F70000] hover:text-[#F70000] duration-1000 py-2.5 mx-2 w-24 text-xs text-center font-bold text-white shadow-md shadow-red-200  hover:shadow-sm dark:shadow-gray-600 rounded-full cursor-pointer">Exit</a>
            </div>
        </form>
    </div>
@endsection
