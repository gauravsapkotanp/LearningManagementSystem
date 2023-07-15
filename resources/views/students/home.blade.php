@extends('layouts.master')

@section('content')
    <div class="bg-gray-100 min-h-screen py-6 xl:px-24 lg:px-16 sm:px-12 px-4">
        <div class="2xl:max-w-[1600px] xl:max-w-[1280px] w-full mx-auto">
            <div>
                <h1 class="text-2xl border-b-2 border-[#034c83]">Notices</h1>

            </div>
            @foreach ($notices as $notice)
                <div
                    class="p-4 md:grid md:grid-cols-2 lg:grid-cols-3 gap-8 hover:bg-gray-300 border-b rounded wow animated fadeInLeft">
                    <div class="lg:col-span-2">
                        <h2 class="md:text-xl text-lg font-bold">
                            {{ $notice->title }}
                        </h2>
                        <p class="text-sm">
                            <span class="font-bold">Date :</span>
                            {{ $notice->date }}
                        </p>
                    </div>
                    <div class="mt-4 mb-4 md:mb-0 text-sm md:text-base">
                        <a href="{{ asset('img/files/' . $notice->file) }}" target="_blank"
                            class="py-2 px-4 bg-slate-200 rounded-md mx-2">
                            <i class="fa fa-eye"></i> View
                        </a>

                        <a href="{{ asset('img/files/' . $notice->file) }}" class="py-2 px-4 bg-slate-200 rounded-md mx-2"
                            download="Untitled">
                            <i class="fa fa-download"></i> Download Now
                        </a>
                    </div>
                </div>
            @endforeach
        </div>
    </div>
@endsection
