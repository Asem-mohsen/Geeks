@extends('layout.master')

@section('Title' , 'Users')

@section('Content')

<h1 class="text-center m-5">Count posts by status (draft, published) for each user</h1>

<div class="flex gap-3">
    <div class="w-[47%]">
        <h2 class="text-center m-5">Using Eloquent Relationships</h2>
        <table class="w-full text-sm text-left rtl:text-right text-gray-500 dark:text-gray-400">
            <thead class="text-xs text-gray-700 uppercase bg-gray-50 dark:bg-gray-700 dark:text-gray-400">
                <tr>
                    <th scope="col" class="px-6 py-3">Users (ERM)</th>
                    <th scope="col" class="px-6 py-3">count published</th>
                    <th scope="col" class="px-6 py-3">count drafted</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($userERM as $user)
                    <tr class="bg-white border-b dark:bg-gray-800 dark:border-gray-700">
                        <td  class="px-6 py-4 font-medium text-gray-900 whitespace-nowrap dark:text-white text-center">
                            {{ $user->name }}
                        </td>
                        <td  class="px-6 py-4 font-medium text-gray-900 whitespace-nowrap dark:text-white text-center">
                            {{ $user->published_posts_count }}
                        </td>
                        <td  class="px-6 py-4 font-medium text-gray-900 whitespace-nowrap dark:text-white text-center">
                            {{ $user->draft_posts_count }}
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>

    <div class="w-[47%]">
        <h2 class="text-center m-5">Using Query Builder</h2>
        <table class="w-full text-sm text-left rtl:text-right text-gray-500 dark:text-gray-400">
            <thead class="text-xs text-gray-700 uppercase bg-gray-50 dark:bg-gray-700 dark:text-gray-400">
                <tr>
                    <th scope="col" class="px-6 py-3">Users (QB)</th>
                    <th scope="col" class="px-6 py-3">count published</th>
                    <th scope="col" class="px-6 py-3">count drafted</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($userQB as $user)
                    <tr class="bg-white border-b dark:bg-gray-800 dark:border-gray-700">
                        <td  class="px-6 py-4 font-medium text-gray-900 whitespace-nowrap dark:text-white text-center">
                            {{ $user->name }}
                        </td>
                        <td  class="px-6 py-4 font-medium text-gray-900 whitespace-nowrap dark:text-white text-center">
                            {{ $user->published_posts_count }}
                        </td>
                        <td  class="px-6 py-4 font-medium text-gray-900 whitespace-nowrap dark:text-white text-center">
                            {{ $user->draft_posts_count }}
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>
</div>
@endsection
