@extends('layouts.user')
@section('content')
    <div class="flex flex-wrap justify-center w-full">
        <div class="grid grid-cols-2 gap-2 lg:flex flex-wrap w-full py-3 px-2 lg:px-[15rem]">
            @if ($todo->count())
                @foreach ($todo as $todos)
                    <div
                        class="flex flex-nowrap justify-arround w-full px-1 py-3 bg-white rounded-md shadow-lg hover:bg-sky-400 hover:-translate-y-1">
                        <div class="flex overflow-hidden lg:overflow-visible w-full">
                            <p class="text-lg lg:text-xl text-black font-bold w-full">{{ $todos->todo }}</p>
                        </div>
                        <div class="flex">
                            <a href="/update/{{ $todos->id }}">
                                <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5"
                                    stroke="currentColor" class="w-6 h-6">
                                    <path stroke-linecap="round" stroke-linejoin="round"
                                        d="M16.862 4.487l1.687-1.688a1.875 1.875 0 112.652 2.652L10.582 16.07a4.5 4.5 0 01-1.897 1.13L6 18l.8-2.685a4.5 4.5 0 011.13-1.897l8.932-8.931zm0 0L19.5 7.125M18 14v4.75A2.25 2.25 0 0115.75 21H5.25A2.25 2.25 0 013 18.75V8.25A2.25 2.25 0 015.25 6H10" />
                                </svg>
                            </a>
                            <a href="/delete/{{ $todos->id }}">
                                <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24"
                                    stroke-width="1.5" stroke="currentColor" class="w-6 h-6">
                                    <path stroke-linecap="round" stroke-linejoin="round"
                                        d="M10.125 2.25h-4.5c-.621 0-1.125.504-1.125 1.125v17.25c0 .621.504 1.125 1.125 1.125h12.75c.621 0 1.125-.504 1.125-1.125v-9M10.125 2.25h.375a9 9 0 019 9v.375M10.125 2.25A3.375 3.375 0 0113.5 5.625v1.5c0 .621.504 1.125 1.125 1.125h1.5a3.375 3.375 0 013.375 3.375M9 15l2.25 2.25L15 12" />
                                </svg>
                            </a>
                        </div>
                    </div>
                @endforeach
            @else
            <p class="text-md lg:text-3xl font-bold text-center w-full py-20">Nothing todo's</p>
            @endif
        </div>
    </div>
@endsection
