@extends('layout.master')

@section('Title' , 'Users')

@section('Content')

<h1 class="text-center m-5">Retrieve tags associated with the most unique users</h1>

<div class="flex gap-3">
    <div class="w-[50%]">
        <h2 class="text-center m-5">Using Eloquent Relationships</h2>
        <table class="w-full text-sm text-left rtl:text-right text-gray-500 dark:text-gray-400">
            <thead class="text-xs text-gray-700 uppercase bg-gray-50 dark:bg-gray-700 dark:text-gray-400">
                <tr>
                    <th scope="col" class="px-6 py-3">Tag</th>
                    <th scope="col" class="px-6 py-3">Unique User Count</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($tagsWithUniqueUsersERM as $tag)
                    <tr class="bg-white border-b dark:bg-gray-800 dark:border-gray-700">
                        <td  class="px-6 py-4 font-medium text-gray-900 whitespace-nowrap dark:text-white text-center">
                            {{ $tag->tag }}
                        </td>
                        <td>{{ $tag->unique_user_count }}</td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>

    <div class="w-[50%]">
        <h2 class="text-center m-5">Using Query Builder</h2>
        <table class="w-full text-sm text-left rtl:text-right text-gray-500 dark:text-gray-400">
            <thead class="text-xs text-gray-700 uppercase bg-gray-50 dark:bg-gray-700 dark:text-gray-400">
                <tr>
                    <th scope="col" class="px-6 py-3">Tag</th>
                    <th scope="col" class="px-6 py-3">Unique User Count</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($tagsWithUniqueUsersQB as $tag)
                <tr class="bg-white border-b dark:bg-gray-800 dark:border-gray-700">
                        <td class="px-6 py-4 font-medium text-gray-900 whitespace-nowrap dark:text-white text-center">
                            {{ $tag->tag }}
                        </td>
                        <td>{{ $tag->unique_user_count }}</td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>
</div>
@endsection