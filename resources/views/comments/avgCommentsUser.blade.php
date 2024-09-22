@extends('layout.master')

@section('Title' , 'Comments')

@section('Content')

<h1 class="text-center m-5">Find average comments per post for each user</h1>

<div class="relative flex flex-wrap overflow-x-auto m-5">
    <table class="w-[49%] text-sm text-left rtl:text-right text-gray-500 dark:text-gray-400">
        <thead class="text-xs text-gray-700 uppercase bg-gray-50 dark:bg-gray-700 dark:text-gray-400">
            <tr>
                <th scope="col" class="px-6 py-3">
                    User (ERM)
                </th>
                <th scope="col" class="px-6 py-3">
                    AVG number of comments on thier posts (ERM)
                </th>
            </tr>
        </thead>
        <tbody>
            @foreach($avgCommentsUserERM as $user)
                <tr class="bg-white border-b dark:bg-gray-800 dark:border-gray-700">
                    <td class="px-6 py-4 font-medium text-gray-900 whitespace-nowrap dark:text-white">
                        {{ $user->name }}
                    </td>
                    <td>{{ number_format($user->average_comments_per_post, 2) }}</td>
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
                    AVG number of comments on thier posts (QB)
                </th>
            </tr>
        </thead>
        <tbody>
            @foreach($avgCommentsUserQB as $user)
                <tr class="bg-white border-b dark:bg-gray-800 dark:border-gray-700">
                    <td class="px-6 py-4 font-medium text-gray-900 whitespace-nowrap dark:text-white">
                        {{ $user->name }}
                    </td>
                    <td>{{ number_format($user->avg_comments_per_post, 2) }}</td>
                </tr>
            @endforeach
        </tbody>
    </table>

</div>

@endsection