@extends('layout.master')

@section('Title' , 'Users')

@section('Content')

<h1 class="text-center m-5">Find total posts and comments for each user</h1>

<div class="relative flex flex-wrap overflow-x-auto m-5">
    <table class="w-[49%] text-sm text-left rtl:text-right text-gray-500 dark:text-gray-400">
        <thead class="text-xs text-gray-700 uppercase bg-gray-50 dark:bg-gray-700 dark:text-gray-400">
            <tr>
                <th scope="col" class="px-6 py-3">
                    User (ERM)
                </th>
                <th scope="col" class="px-6 py-3">
                    Total Posts
                </th>
                <th scope="col" class="px-6 py-3">
                    Total Comments
                </th>
            </tr>
        </thead>
        <tbody>
            @foreach($usersERM as $user)
                <tr class="bg-white border-b dark:bg-gray-800 dark:border-gray-700">
                    <td class="px-6 py-4 font-medium text-gray-900 whitespace-nowrap dark:text-white">
                        {{ $user->name }}
                    </td>
                    <td class="px-6 py-4 font-medium text-gray-900 whitespace-nowrap dark:text-white">
                        {{ $user->posts_count }}
                    </td>
                    <td class="px-6 py-4 font-medium text-gray-900 whitespace-nowrap dark:text-white">
                        {{ $user->comments_count }}
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>

    <table class="w-[49%] text-sm text-left rtl:text-right text-gray-500 dark:text-gray-400">
        <thead class="text-xs text-gray-700 uppercase bg-gray-50 dark:bg-gray-700 dark:text-gray-400">
            <tr>
                <th scope="col" class="px-6 py-3">
                    User (QB)
                </th>
                <th scope="col" class="px-6 py-3">
                    Total Posts
                </th>
                <th scope="col" class="px-6 py-3">
                    Total Comments
                </th>
            </tr>
        </thead>
        <tbody>
            @foreach($usersQB as $user)
                <tr class="bg-white border-b dark:bg-gray-800 dark:border-gray-700">
                    <td class="px-6 py-4 font-medium text-gray-900 whitespace-nowrap dark:text-white">
                        {{ $user->name }}
                    </td>
                    <td class="px-6 py-4 font-medium text-gray-900 whitespace-nowrap dark:text-white">
                        {{ $user->total_posts }}
                    </td>
                    <td class="px-6 py-4 font-medium text-gray-900 whitespace-nowrap dark:text-white">
                        {{ $user->total_comments }}
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>

</div>

@endsection
