@extends('layouts.app')

@section('content')
    <div class="pt-12 lg:pt-0 px-4 bg-[#1650d0] pb-36 dark:bg-[#051139]">
        <h1 class="text-lg font-thin text-white  pt-12 lg:pl-4">Teachers</h1>
        <div class="mt-6 text-end">
            <a href="{{ route('teacher.create') }}"
                class="bg-gray-300 text-[#1650d0] hover:bg-transparent border-2 hover:border-gray-300 hover:text-gray-200 duration-1000 text-sm font-semibold py-2 px-4 rounded-full">
                Register
            </a>
        </div>
    </div>
    @include('layouts.message')
    <div class="p-4 mx-3 lg:mx-5 overflow-x-auto overflow-y-hidden bg-white dark:bg-[#111c44]  rounded-xl shadow-md -mt-28">
        <table id="table" class="w-full text-center">
            <thead>
                <tr class="border border-gray-300">
                    <td class="font-bold py-2 border border-gray-300 px-2">
                        S.N.</td>
                    <td class="font-extrabold py-2 border border-gray-300 px-2">Name</td>
                    <td class="font-extrabold py-2 border border-gray-300 px-2">Email</td>
                    <td class="font-extrabold py-2 border border-gray-300 px-2">Phone</td>
                    <td class="font-extrabold py-2 border border-gray-300 px-2">Address</td>
                    <td class="font-extrabold py-2 border border-gray-300 px-2">Role</td>
                    <td class="font-extrabold py-2 border border-gray-300 px-2">Action</td>
                </tr>
            </thead>
            <tbody>
                @foreach ($teachers as $teacher)
                    <tr class="border border-gray-300">
                        <td class="py-2  border border-gray-300 px-2">{{ $loop->iteration }}</td>

                        <td class="py-2  border border-gray-300 px-2">{{ $teacher->name }}</td>
                        <td class="py-2  border border-gray-300 px-2">{{ $teacher->email }}</td>
                        <td class="py-2  border border-gray-300 px-2">{{ $teacher->phone }}</td>
                        <td class="py-2  border border-gray-300 px-2">{{ $teacher->address }}</td>
                        <td class="py-2  border border-gray-300 px-2">{{ $teacher->role }}</td>

                        <td class="py-2  border border-gray-300 px-2">
                            <div class="flex items-center justify-center gap-1">
                                <div>
                                    <button>
                                        <a href="{{ route('teacher.edit', $teacher->id) }}" title="Edit"
                                            class="bg-[#1650d0] text-white hover:bg-transparent border-2 hover:border-[#1650d0] hover:text-[#1650d0] duration-1000  px-2 pt-1 pb-0.5 rounded-md shadow-md shadow-blue-200 dark:shadow-gray-600">
                                            <i class="ri-edit-box-line"></i>
                                        </a>
                                    </button>
                                </div>
                                <div>
                                    <button title="Delete"
                                        class="px-2 py-[1.5px] rounded-md  text-white bg-[#b21f31] hover:bg-transparent border-2  hover:text-[#b21f31] shadow-md shadow-red-200 hover:border-[#b21f31] duration-1000 dark:shadow-gray-600"
                                        onclick="showdelete({{ $teacher->id }})">
                                        <i class="ri-delete-bin-line"></i>
                                    </button>
                                </div>
                            </div>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>

    {{-- Delete Modal --}}
    <div id="deletemodal"
        class="white-card hidden dark:bg-white dark:bg-opacity-10 overflow-y-auto overflow-x-hidden fixed inset-0 z-50 justify-center items-center md:h-full md:inset-0">
        <div class="relative px-4 w-full max-w-md h-full md:h-auto mx-auto mt-[15%]">
            <!-- Modal content -->
            <div class="relative bg-white rounded-lg shadow dark:bg-slate-800">
                <form class="px-6 pb-4 space-y-6 lg:px-8 sm:pb-6 xl:pb-8" method="POST"
                    action="{{ route('teacher.delete') }}">
                    @csrf
                    <h3 class="text-2xl font-bold text-slate-900 dark:text-white pt-6 mb-0 text-center">Are You Sure to
                        Delete ?</h3>
                    <p class="text-center mt-0 text-red-500">The action is irreversible</p>
                    <input type="hidden" id="dataid" name="dataid">
                    <div class="flex justify-center">
                        <button type="submit"
                            class="py-2 px-4 mx-2 rounded-md text-white bg-indigo-600 shadow-md shadow-indigo-200 hover:bg-indigo-800 hover:shadow-sm dark:shadow-gray-600">Yes
                            ! Delete</button>
                        <a class="py-2 px-4 mx-2 rounded-md cursor-pointer text-white bg-red-500 shadow-md shadow-red-200 hover:bg-red-600 hover:text-white hover:shadow-sm dark:shadow-gray-600"
                            onclick="hidedelete()">Cancel</a>
                    </div>
                </form>
            </div>
        </div>
    </div>
    {{-- End of delete modal --}}
@endsection


@section('js')
    <script>
        $(document).ready(function() {
            $('#table').DataTable();
        });
    </script>


    <script>
        function showdelete($id) {

            $('#deletemodal').removeClass('hidden');

            document.getElementById('dataid').value = $id;

        }

        function hidedelete() {

            $('#deletemodal').addClass('hidden');

        }
    </script>
@endsection
