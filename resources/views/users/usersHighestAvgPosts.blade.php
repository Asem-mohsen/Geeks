@extends('layout.master')
@section('Title' , 'Posts')

@section('Content')

<h1 class="text-center m-5">Identify top 3 users with the highest average post length</h1>

<div class="relative flex flex-wrap overflow-x-auto m-5">
    <table class="w-[49%] text-sm text-left rtl:text-right text-gray-500 dark:text-gray-400">
        <thead class="text-xs text-gray-700 uppercase bg-gray-50 dark:bg-gray-700 dark:text-gray-400">
            <tr>
                <th scope="col" class="px-6 py-3">
                    Users (ERM)
                </th>
                <th scope="col" class="px-6 py-3">
                    Average (ERM)
                </th>
            </tr>
        </thead>
        <tbody>
            @foreach ($usersERM as $user)
                <tr class="bg-white border-b dark:bg-gray-800 dark:border-gray-700">
                    <td class="px-6 py-4 font-medium text-gray-900 whitespace-nowrap dark:text-white">
                        {{ $user->user->name }}
                    </td>
                    <td class="px-6 py-4">
                        {{ $user->avg_post_length }}
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>

    <table class="w-[49%] text-sm text-left rtl:text-right text-gray-500 dark:text-gray-400">
        <thead class="text-xs text-gray-700 uppercase bg-gray-50 dark:bg-gray-700 dark:text-gray-400">
            <tr>
                <th scope="col" class="px-6 py-3">
                    Users (QB)
                </th>
                <th scope="col" class="px-6 py-3">
                    Average (QB)
                </th>
            </tr>
        </thead>
        <tbody>
            @foreach ($usersQB as $user)
                <tr class="bg-white border-b dark:bg-gray-800 dark:border-gray-700">
                    <td class="px-6 py-4 font-medium text-gray-900 whitespace-nowrap dark:text-white">
                        {{ $user->name }}
                    </td>
                    <td class="px-6 py-4">
                        {{ $user->avg_post_length }}
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>

</div>

@endsection
