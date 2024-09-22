@extends('layout.master')

@section('Title' , 'Users')

@section('Content')

<h1 class="text-center m-5">Get users who have authored posts with a specific tag</h1>

<div class="relative overflow-x-auto m-5">
    <table class="w-full text-sm text-left rtl:text-right text-gray-500 dark:text-gray-400">
        <thead class="text-xs text-gray-700 uppercase bg-gray-50 dark:bg-gray-700 dark:text-gray-400">
            <tr>
                <th scope="col" class="px-6 py-3">Users (ERM)</th>
                <th scope="col" class="px-6 py-3">Users (Query Builder)</th>
            </tr>
        </thead>
        <tbody>
            @for ($i = 0; $i < max($usersERM->count(), $usersQB->count()); $i++)
                <tr class="bg-white border-b dark:bg-gray-800 dark:border-gray-700">
                    <td class="px-6 py-4">{{ $usersERM[$i]->name ?? '' }}</td>
                    <td class="px-6 py-4">{{ $usersQB[$i]->name ?? '' }}</td>
                </tr>
            @endfor

        </tbody>
    </table>
</div>


@endsection
