@extends('layouts.user')
@section('content')
    <div class="flex flex-wrap w-full justify-center px-3 py-3">
        <form action="" method="post" class="w-full">
            @csrf
            <div class="mb-6">
                <label for="todo" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Todo</label>
                <input type="text" id="todo" name="todo"
                    class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"
                    placeholder="Your Todo" required>
            </div>
            <button class="bg-sky-400 w-full rounded-md py-2 px-2 font-bold text-white hover:bg-sky-300 hover:text-black" type="submit">Save Todo</button>
        </form>
    </div>
@endsection
