@extends('layout.master')

@section('Title' , 'Users')

@section('Content')

<h1 class="text-center m-5">Get the user with the most published posts</h1>

<div class="relative flex flex-wrap overflow-x-auto m-5">
    <table class="w-[49%] text-sm text-left rtl:text-right text-gray-500 dark:text-gray-400">
        <thead class="text-xs text-gray-700 uppercase bg-gray-50 dark:bg-gray-700 dark:text-gray-400">
            <tr>
                <th scope="col" class="px-6 py-3">
                    User (ERM)
                </th>
                <th scope="col" class="px-6 py-3">
                    Total Published Posts
                </th>
            </tr>
        </thead>
        <tbody>
                <tr class="bg-white border-b dark:bg-gray-800 dark:border-gray-700">
                    <td class="px-6 py-4 font-medium text-gray-900 whitespace-nowrap dark:text-white">
                        {{ $userERM->name }}
                    </td>
                    <td class="px-6 py-4 font-medium text-gray-900 whitespace-nowrap dark:text-white">
                        {{ $userERM->posts_count }}
                    </td>
                </tr>
        </tbody>
    </table>

    <table class="w-[49%] text-sm text-left rtl:text-right text-gray-500 dark:text-gray-400">
        <thead class="text-xs text-gray-700 uppercase bg-gray-50 dark:bg-gray-700 dark:text-gray-400">
            <tr>
                <th scope="col" class="px-6 py-3">
                    User (QB)
                </th>
                <th scope="col" class="px-6 py-3">
                    Total Published Posts
                </th>
            </tr>
        </thead>
        <tbody>
            <tr class="bg-white border-b dark:bg-gray-800 dark:border-gray-700">
                <td class="px-6 py-4 font-medium text-gray-900 whitespace-nowrap dark:text-white">
                    {{ $userQB->name }}
                </td>
                <td class="px-6 py-4 font-medium text-gray-900 whitespace-nowrap dark:text-white">
                    {{ $userQB->total_posts }}
                </td>
            </tr>
        </tbody>
    </table>

</div>

@endsection
