@extends('layouts.master')
@section('content')
    <Homepage>
        {{-- First Section of Site  --}}
        <section class="bg-gray-100">
            <div class="xl:px-16 lg:px-8">
                <div class="xl:max-w-[1080px]  w-full  mx-auto">
                    <div class="">
                        <div class="flex justify-between items-center py-24 px-2">
                            <div>
                                <h1 class="font-bold tetx-xs text-[#20ad96]">EXPERT INSTRUCTION</h1>
                                <h1 class="text-5xl leading-snug text-gray-700 font-bold heading">Convenient easy way of <br>
                                    learning
                                    new skills!</h1>
                                <p class="leading-8 text-gray-800 mt-5">The ultimate planning solution for busy women who
                                    want
                                    to
                                    reach their
                                    <br>personal
                                    goals.Effortless comfortable eye-catching unique detail
                                </p>
                                <a href="#"><button
                                        class="font-bold mt-10 text-white bg-[#20ad96] hover:bg-gray-700 hover:text-white transition-all ease-in-out duration-150 delay-150 border-[#20ad96] hover:border-gray-700 border-2  rounded-lg px-6 py-3">Our
                                        Cources</button></a>
                            </div>
                            <div>
                                <img class="rounded-full" src="{{ asset('images/hero-img.png') }}" alt="">
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>

        {{-- Second section of Site  --}}
        <section class="bg-white">
            <div class="">
                <div class="xl:px-16 lg:px-8">
                    <div class="xl:max-w-[1080px] w-full mx-auto">
                        <div class="py-5">
                            <div class="grid grid-cols-3 gap-10">
                                <div class="border-dotted border-gray-300 rounded-lg p-6 border-2">
                                    <div class="py-6">
                                        <div class="text-center">
                                            <i class="fa-regular fa-flag  text-7xl " style="color: #20ad96;"></i>
                                            <h1 class="text-2xl font-semibold heading py-5">Expert teacher</h1>
                                            <p class="leading-snug px-2">Develop skills for career of various majors
                                                including
                                                computer</p>
                                        </div>
                                    </div>
                                </div>
                                <div class="border-dotted border-gray-300 rounded-lg p-6 border-2">
                                    <div class="py-6">
                                        <div class="text-center">
                                            <i class="fa-solid fa-layer-group text-7xl" style="color: #20ad96;"></i>
                                            <h1 class="text-2xl font-semibold heading py-5">Self Development</h1>
                                            <p class="leading-snug px-2">Develop skills for career of various majors
                                                including
                                                computer</p>
                                        </div>
                                    </div>
                                </div>
                                <div class="border-dotted  border-gray-300 rounded-lg p-6 border-2">
                                    <div class="py-6">
                                        <div class="text-center">
                                            <i class="fa-solid fa-laptop-file text-7xl" style="color: #20ad96;"></i>
                                            <h1 class="text-2xl font-semibold heading py-5">Remote Learning</h1>
                                            <p class="leading-snug px-2">Develop skills for career of various majors
                                                including
                                                computer</p>
                                        </div>
                                    </div>
                                </div>

                            </div>
                        </div>

                    </div>

                </div>
            </div>
            <div class="py-10">
                <div class="xl:px-16 lg:px-8">
                    <div class="xl:max-w-[1080px] w-full mx-auto">
                        <div class="py-16 flex justify-between">
                            <div>
                                <h1 class="font-bold tetx-xs text-[#20ad96]">TRENDING COURCES</h1>
                                <h1 class="font-bold text-4xl heading pt-3">Popular Online Courses Around You</h1>
                                <p>The ultimate planning solution for busy women who want to reach their personal goals</p>
                            </div>
                            <div>
                                <a href="#">
                                    <button
                                        class="font-bold mt-10 text-white bg-[#20ad96] hover:bg-gray-700 hover:text-white transition-all ease-in-out duration-150 delay-150 border-[#20ad96] hover:border-gray-700 border-2  rounded-lg px-6 text-sm py-3">ALL
                                        COURCES</button>
                                </a>
                            </div>
                        </div>
                        <div class="grid grid-cols-2 gap-5 mx-auto">
                            <div
                                class="border-dotted border-gray-300 hover:border-transparent  hover:shadow-[0px_0px_20px_rgba(0,0,0,0.2)]  transition-all ease-in-out duration-150 delay-75  rounded-lg p-6 border-2">
                                <div class="flex gap-5">
                                    <img class="rounded-full w-36 h-36" src="{{ asset('images/course-1.jpg') }}"
                                        alt="">
                                    <div>
                                        <span class="text-[#20ad96] font-black text-2xl heading">$50 <span
                                                class="text-gray-500 text-xl line-through font-black">$90</span>
                                        </span>
                                        <div
                                            class="text-2xl font-bold heading py-3 hover:cursor-pointer hover:text-[#20ad96] transition-all ease-in-out duration-150 delay-75">
                                            <a class="hover:text-[#20ad96] transition-all ease-in-out duration-150 delay-75"
                                                href="#">Information About
                                                UI/UX Design Degree</a>
                                        </div>
                                        <p class="text-sm">By <span class="text-[#20ad96]">William</span><span
                                                class="pl-2"> 82
                                                Lessons</span></p>
                                    </div>
                                </div>

                            </div>
                            <div
                                class="border-dotted border-gray-300 hover:border-transparent  hover:shadow-[0px_0px_20px_rgba(0,0,0,0.2)]  transition-all ease-in-out duration-150 delay-75  rounded-lg p-6 border-2">
                                <div class="flex gap-5">
                                    <img class="rounded-full w-36 h-36" src="{{ asset('images/course3.jpg') }}"
                                        alt="">
                                    <div>
                                        <span class="text-[#20ad96] font-black text-2xl heading">$50 <span
                                                class="text-gray-500 text-xl line-through font-black">$90</span>
                                        </span>
                                        <div
                                            class="text-2xl font-bold heading py-3 hover:cursor-pointer hover:text-[#20ad96] transition-all ease-in-out duration-150 delay-75">
                                            <a class="hover:text-[#20ad96] transition-all ease-in-out duration-150 delay-75"
                                                href="#">Photography Crash Course for Photographer</a>
                                        </div>
                                        <p class="text-sm">By <span class="text-[#20ad96]">William</span><span
                                                class="pl-2"> 82
                                                Lessons</span></p>
                                    </div>
                                </div>

                            </div>
                            <div
                                class="border-dotted border-gray-300 hover:border-transparent  hover:shadow-[0px_0px_20px_rgba(0,0,0,0.2)]  transition-all ease-in-out duration-150 delay-75  rounded-lg p-6 border-2">
                                <div class="flex gap-5">
                                    <img class="rounded-full w-36 h-36" src="{{ asset('images/course2.jpg') }}"
                                        alt="">
                                    <div>
                                        <span class="text-[#20ad96] font-black text-2xl heading">$50 <span
                                                class="text-gray-500 text-xl line-through font-black">$90</span>
                                        </span>
                                        <div
                                            class="text-2xl font-bold heading py-3 hover:cursor-pointer hover:text-[#20ad96] transition-all ease-in-out duration-150 delay-75">
                                            <a class="hover:text-[#20ad96] transition-all ease-in-out duration-150 delay-75"
                                                href="#">React – The Complete Guide (React Router)</a>
                                        </div>
                                        <p class="text-sm">By <span class="text-[#20ad96]">William</span><span
                                                class="pl-2"> 82
                                                Lessons</span></p>
                                    </div>
                                </div>

                            </div>
                            <div
                                class="border-dotted border-gray-300 hover:border-transparent  hover:shadow-[0px_0px_20px_rgba(0,0,0,0.2)]  transition-all ease-in-out duration-150 delay-75  rounded-lg p-6 border-2">
                                <div class="flex gap-5">
                                    <img class="rounded-full w-36 h-36" src="{{ asset('images/course1.jpg') }}"
                                        alt="">
                                    <div>
                                        <span class="text-[#20ad96] font-black text-2xl heading">$50 <span
                                                class="text-gray-500 text-xl line-through font-black">$90</span>
                                        </span>
                                        <div
                                            class="text-2xl font-bold heading py-3 hover:cursor-pointer hover:text-[#20ad96] transition-all ease-in-out duration-150 delay-75">
                                            <a class="hover:text-[#20ad96] transition-all ease-in-out duration-150 delay-75 "
                                                href="#">WebCrash Course for Photographer</a>
                                        </div>
                                        <p class="text-sm">By <span class="text-[#20ad96]">William</span><span
                                                class="pl-2"> 82
                                                Lessons</span></p>
                                    </div>
                                </div>

                            </div>

                        </div>
                        <div>
                            <p class="text-center pt-10">Take the control of their life back and start doing things to make
                                their dream <br> come true. <a
                                    class="font-bold underline text-[#20ad96] hover:text-gray-700 transition-all ease-in-out duration-100 delay-75"
                                    href="#">View all
                                    Cources</a></p>
                        </div>
                    </div>
                </div>
            </div>
        </section>

        {{-- Thirc section of the site  --}}
        <section class="bg-white">
            <div class="py-28">
                <div class="xl:px-16 lg:px-8">
                    <div class="xl:max-w-[1080px] w-full mx-auto">
                        <div class="py-5 grid grid-cols-2 gap-16">
                            <div class="grid grid-cols-2 gap-5">
                                <img class="rounded-xl mx-auto " src="{{ asset('images/feature1.png') }}" alt="">
                                <img class="rounded-xl  mx-auto " src="{{ asset('images/feature2.png') }}"
                                    alt="">
                                <img class="rounded-xl  mx-auto" src="{{ asset('images/feature3.png') }}" alt="">
                                <img class="rounded-xl w-80 mx-auto" src="{{ asset('images/about-img.jpg') }}"
                                    alt="">
                            </div>
                            <div class="mt-20">
                                <h1 class="font-bold text-[#20ad96] ">SELF DEVELOPMENT COURCE</h1>
                                <h1 class="heading text-5xl leading-snug text-gray-700 font-bold ">Get Instant Access To
                                    Expert solution</h1>
                                <p class="leading-8 text-gray-800 mt-5">The ultimate planning solution for busy women
                                    who want to reach their personal
                                    goals.Effortless comfortable eye-catching unique detail.Take the control of their life
                                    back and start doing things</p>
                                <a href="#"> <button
                                        class=" mt-8 font-bold text-black hover:bg-gray-700 hover:text-white transition-all ease-in-out duration-150 delay-150 border-2 border-black  rounded-lg px-8 py-3">Join
                                        Now</button></a>
                            </div>


                        </div>
                    </div>
                </div>
            </div>
        </section>
    </Homepage>
@endsection
