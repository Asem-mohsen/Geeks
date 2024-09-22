@extends('layout.master')

@section('Title' , 'Tags Questions')

@section('Content')

<h1 class="text-center m-5">Questions</h1>

<div class="relative overflow-x-auto m-5">
    <table class="w-full text-sm text-left rtl:text-right text-gray-500 dark:text-gray-400">
        <thead class="text-xs text-gray-700 uppercase bg-gray-50 dark:bg-gray-700 dark:text-gray-400">
            <tr>
                <th scope="col" class="px-6 py-3">
                    #
                </th>
                <th scope="col" class="px-6 py-3">
                    Question
                </th>
                <th scope="col" class="px-6 py-3">
                    link
                </th>
            </tr>
        </thead>
        <tbody>
            <tr class="bg-white border-b dark:bg-gray-800 dark:border-gray-700">
                <td class="px-6 py-4">
                    1
                </td>
                <th scope="row" class="px-6 py-4 font-medium text-gray-900 whitespace-nowrap dark:text-white">
                    Retrieve tags used more than 10 times
                </th>
                <td class="px-6 py-4">
                    <a href="{{route('tags-used-10Times')}}">solution</a>
                </td>
            </tr>

            <tr class="bg-white border-b dark:bg-gray-800 dark:border-gray-700">
                <td class="px-6 py-4">
                    2
                </td>
                <th scope="row" class="px-6 py-4 font-medium text-gray-900 whitespace-nowrap dark:text-white">
                    Get the most frequently used tag
                </th>
                <td class="px-6 py-4">
                    <a href="{{route('MostFrequentTag')}}">solution</a>
                </td>
            </tr>

            <tr class="bg-white border-b dark:bg-gray-800 dark:border-gray-700">
                <td class="px-6 py-4">
                    3
                </td>
                <th scope="row" class="px-6 py-4 font-medium text-gray-900 whitespace-nowrap dark:text-white">
                    Find tags not used by any post
                </th>
                <td class="px-6 py-4">
                    <a href="{{route('notUsedTags')}}">solution</a>
                </td>
            </tr>
        </tbody>
    </table>
</div>


@endsection
