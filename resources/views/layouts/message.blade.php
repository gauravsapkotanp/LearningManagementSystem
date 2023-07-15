@if (Session::has('success'))
    <div class="animate__animated animate__slideInRight dismissible fixed right-8 top-4 z-[999]">
        <div class="w-auto rounded-md p-2 shadow-lg bg-gray-100 dark:bg-gray-600">
            <p class="border-l-4 border-[#1650d0] px-2 text-[#1650d0] dark:text-[#1650d0] font-bold flex items-center">
                <i
                    class="ri-check-line  bg-[#1650d0] text-white px-1.5 py-0.5 rounded-full font-normal text-sm mr-1"></i>

                {{ session('success') }}
            </p>
        </div>
    </div>
    <script>
        $(function() {
            setTimeout(function() {
                $(".dismissible").addClass('animate__slideOutRight').fadeOut(1000);
            }, 2000);
        });
    </script>
@endif


@if (Session::has('error'))
    <div class="animate__animated animate__slideInRight dismissible fixed right-8 top-4 z-[999]">
        <div class="w-auto rounded-md p-2 shadow-lg bg-gray-100 dark:bg-gray-600">
            <p class="border-l-4 border-[#ea3f3f] px-2 text-[#ea3f3f] dark:text-[#ea3f3f] font-bold flex items-center">
                <i
                    class="ri-check-line  bg-[#ea3f3f] text-white px-1.5 py-0.5 rounded-full font-normal text-sm mr-1"></i>

                {{ session('error') }}
            </p>
        </div>
    </div>
    <script>
        $(function() {
            setTimeout(function() {
                $(".dismissible").addClass('animate__slideOutRight').fadeOut(1000);
            }, 2000);
        });
    </script>
@endif

@if ($errors->any())
    @foreach ($errors->all() as $error)
        <div class="animate__animated animate__slideInRight dismissible fixed right-8 top-4 z-[999]">
            <div class="w-auto rounded-md p-2 shadow-lg bg-gray-100 dark:bg-gray-600">
                <p class="border-l-4 border-red-400 px-2 text-red-900 dark:text-red-300 font-bold flex items-center">
                    <i class="ri-close-line bg-red-400 text-white px-1.5 py-0.5 rounded-full font-normal text-sm"></i>
                    {{ $error }}
                </p>
            </div>
        </div>
    @endforeach
    <script>
        $(function() {
            setTimeout(function() {
                $(".dismissible").addClass('animate__slideOutRight').fadeOut(1000);
            }, 2000);
        });
    </script>

@endif
