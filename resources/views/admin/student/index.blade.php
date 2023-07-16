@extends('layouts.app')

@section('content')
    <div class="pt-12 lg:pt-0 px-4 bg-[#1650d0] rounded-b-3xl pb-36 dark:bg-[#051139]">
        <h1 class="text-lg font-thin text-white  pt-12 lg:pl-4 uppercase">Students</h1>
        <div class="mt-6 flex items-center gap-2 justify-end">
            <a href="{{ route('student.index', 'Pending') }}"
                @if (request()->status == 'Pending') class="bg-green-600 text-white hover:bg-white hover:text-black shadow-md duration-1000 rounded-xl py-1 px-4 "
                @else class="border-2 border-white text-white hover:border-green-600
                hover:bg-green-600 hover:text-white shadow-md duration-1000 rounded-xl py-1 px-4 @endif">
                Pending
            </a>

            <a href="{{ route('student.index', 'Approved') }}"
                @if (request()->status == 'Approved') class="bg-green-600 text-white hover:bg-white hover:text-black shadow-md duration-1000 rounded-xl py-1 px-4 "
                @else class="border-2 border-white text-white hover:border-green-600
                hover:bg-green-600 hover:text-white shadow-md duration-1000 rounded-xl py-1 px-4 @endif">
                Approved
            </a>

            <a href="{{ route('student.index', 'Rejected') }}"
                @if (request()->status == 'Rejected') class="bg-green-600 text-white hover:bg-white hover:text-black shadow-md duration-1000 rounded-xl py-1 px-4 "
                @else class="border-2  border-white text-white hover:border-green-600
                hover:bg-green-600 hover:text-white shadow-md duration-1000 rounded-xl py-1 px-4 @endif">
                Rejected
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
                    <td class="font-extrabold py-2 border border-gray-300 px-2">Faculty</td>
                    <td class="font-extrabold py-2 border border-gray-300 px-2">Profile Photo</td>
                    <td class="font-extrabold py-2 border border-gray-300 px-2">Status</td>
                    <td class="font-extrabold py-2 border border-gray-300 px-2">Action</td>
                </tr>
            </thead>
            <tbody>
                @foreach ($students as $student)
                    <tr class="border border-gray-300">
                        <td class="py-2  border border-gray-300 px-2">{{ $loop->iteration }}</td>

                        <td class="py-2  border border-gray-300 px-2">{{ $student->name }}</td>
                        <td class="py-2  border border-gray-300 px-2">{{ $student->email }}</td>
                        <td class="py-2  border border-gray-300 px-2">{{ $student->phone }}</td>
                        <td class="py-2  border border-gray-300 px-2">{{ $student->address }}</td>
                        <td class="py-2  border border-gray-300 px-2">{{ $student->faculty }}</td>
                        <td class="py-2  border border-gray-300 px-2">
                            <img class="w-10 mx-auto" src="{{ asset('img/profiles/' . $student->profile_photo) }}"
                                alt="">
                        </td>
                        <td class="py-2  border border-gray-300 px-2">{{ $student->status }}</td>

                        <td class="py-2  border border-gray-300 px-2">
                            <div class="flex items-center justify-center gap-1">
                                <div>
                                    <button onclick="showChangeStatus('{{ $student->id }}','Pending')" title="Pending"
                                        class="bg-[#f17021] text-white hover:bg-transparent border-2 hover:border-[#f17021] hover:text-[#f17021] duration-1000  px-2 py-[1.3px] rounded-md shadow-md shadow-blue-200 dark:shadow-gray-600">
                                        <i class="ri-timer-flash-line"></i>
                                    </button>
                                </div>

                                <div>
                                    <button onclick="showChangeStatus('{{ $student->id }}','Rejected')" title="Rejected"
                                        class="bg-[#da4d5d] text-white hover:bg-transparent border-2 hover:border-[#da4d5d] hover:text-[#da4d5d] duration-1000  px-2 py-[1.3px] rounded-md shadow-md shadow-blue-200 dark:shadow-gray-600">
                                        <i class="ri-close-line"></i>
                                    </button>
                                </div>
                                <div>
                                    <button onclick="showChangeStatus('{{ $student->id }}','Approved')" title="Approved"
                                        class="bg-[#1650d0] text-white hover:bg-transparent border-2 hover:border-[#1650d0] hover:text-[#1650d0] duration-1000  px-2 py-[1.3px] rounded-md shadow-md shadow-blue-200 dark:shadow-gray-600">
                                        <i class="ri-check-line"></i>
                                    </button>
                                </div>
                                <div>
                                    <button title="Delete"
                                        class="px-2 py-[1.5px] rounded-md  text-white bg-[#b21f31] hover:bg-transparent border-2  hover:text-[#b21f31] shadow-md shadow-red-200 hover:border-[#b21f31] duration-1000 dark:shadow-gray-600"
                                        onclick="showdelete({{ $student->id }})">
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
                    action="{{ route('student.delete') }}">
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


    {{-- Status Modal --}}
    <div id="statusmodal"
        class="white-card hidden dark:bg-white dark:bg-opacity-10 overflow-y-auto overflow-x-hidden fixed inset-0 z-50 justify-center items-center md:h-full md:inset-0">
        <div class="relative px-4 w-full max-w-md h-full md:h-auto mx-auto mt-[15%]">
            <!-- Modal content -->
            <div class="relative bg-white rounded-lg shadow dark:bg-slate-800">
                <form class="px-6 pb-4 space-y-6 lg:px-8 sm:pb-6 xl:pb-8" method="POST"
                    action="{{ route('student.status') }}">
                    @csrf
                    <h3 class="text-2xl font-bold text-slate-900 dark:text-white pt-6 mb-0 text-center" id="warningtext">Are
                        you sure?</h3>
                    <p class="text-center mt-0 text-red-500">You can change this later</p>
                    <input type="hidden" id="status" name="status">
                    <input type="hidden" id="statusid" name="dataid">
                    <div class="flex justify-center">
                        <button type="submit"
                            class="py-2 px-4 mx-2 rounded-md text-white bg-indigo-600 shadow-md shadow-indigo-200 hover:bg-indigo-800 hover:shadow-sm dark:shadow-gray-600">Yes
                            ! Change</button>
                        <a class="py-2 px-4 mx-2 rounded-md cursor-pointer text-white bg-red-500 shadow-md shadow-red-200 hover:bg-red-600 hover:text-white hover:shadow-sm dark:shadow-gray-600"
                            onclick="hideChangeStatus()">Cancel</a>
                    </div>
                </form>
            </div>
        </div>
    </div>
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


    {{-- Show Status Modal --}}
    <script>
        function showChangeStatus($id, $studentstatus) {
            $('#statusmodal').removeClass('hidden');
            document.getElementById('status').value = $studentstatus;
            document.getElementById('statusid').value = $id;
            $('#warningtext').text('Mark as ' + $studentstatus + ' ? ');
        }

        function hideChangeStatus() {
            $('#statusmodal').addClass('hidden');
        }
    </script>
@endsection
