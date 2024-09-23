@extends('layout.master')
@section('Title' , 'Comments')

@section('Content')

<h1 class="text-center m-5">Find all users who have commented on posts authored by other users</h1>

<div class="relative flex flex-wrap overflow-x-auto m-5">
    <table class="w-[49%] text-sm text-left rtl:text-right text-gray-500 dark:text-gray-400">
        <thead class="text-xs text-gray-700 uppercase bg-gray-50 dark:bg-gray-700 dark:text-gray-400">
            <tr>
                <th scope="col" class="px-6 py-3">
                    Users (ERM)
                </th>
            </tr>
        </thead>
        <tbody>
            @if($usersERM->isEmpty())
                <tr class="bg-white border-b dark:bg-gray-800 dark:border-gray-700">
                    <td class="px-6 py-4 font-medium text-gray-900 whitespace-nowrap dark:text-white">
                        {{"No Users"}}
                    </td>
                </tr>
            @else
                @foreach ($usersERM as $user)
                    <tr class="bg-white border-b dark:bg-gray-800 dark:border-gray-700">
                        <td class="px-6 py-4 font-medium text-gray-900 whitespace-nowrap dark:text-white">
                            {{ $user->name }}
                        </td>
                    </tr>
                @endforeach
            @endif
        </tbody>
    </table>

    <table class="w-[49%] text-sm text-left rtl:text-right text-gray-500 dark:text-gray-400">
        <thead class="text-xs text-gray-700 uppercase bg-gray-50 dark:bg-gray-700 dark:text-gray-400">
            <tr>
                <th scope="col" class="px-6 py-3">
                    Users (QB)
                </th>
            </tr>
        </thead>
        <tbody>
            @if($usersQB->isEmpty())
                <tr class="bg-white border-b dark:bg-gray-800 dark:border-gray-700">
                    <td class="px-6 py-4 font-medium text-gray-900 whitespace-nowrap dark:text-white">
                        {{"No Users"}}
                    </td>
                </tr>
            @else
                @foreach ($usersQB as $user)
                    <tr class="bg-white border-b dark:bg-gray-800 dark:border-gray-700">
                        <td class="px-6 py-4 font-medium text-gray-900 whitespace-nowrap dark:text-white">
                            {{ $user->name }}
                        </td>
                    </tr>
                @endforeach
            @endif
        </tbody>
    </table>

</div>

@endsection
