@extends('layout.master')

@section('Title' , 'Tags')

@section('Content')

<h1 class="text-center m-5">Retrieve tags used more than 10 times</h1>

<div class="relative overflow-x-auto m-5">
    <table class="w-full text-sm text-left rtl:text-right text-gray-500 dark:text-gray-400">
        <thead class="text-xs text-gray-700 uppercase bg-gray-50 dark:bg-gray-700 dark:text-gray-400">
            <tr>
                <th scope="col" class="px-6 py-3">
                    Tags (ERM)
                </th>
                <th scope="col" class="px-6 py-3">
                    Post Count (ERM)
                </th>

                <th scope="col" class="px-6 py-3">
                    Tags (Query Builder)
                </th>
                <th scope="col" class="px-6 py-3">
                    Post Count (Query Builder)
                </th>
            </tr>
        </thead>
        <tbody>
            @foreach ($tagsERM as $index => $tag)
                <tr class="bg-white border-b dark:bg-gray-800 dark:border-gray-700">
                    <th scope="row" class="px-6 py-4 font-medium text-gray-900 whitespace-nowrap dark:text-white">
                        <span class="bg-blue-100 w-fit text-blue-800 text-xs font-medium me-2 px-2.5 py-0.5 rounded dark:bg-blue-900 dark:text-blue-300">{{ $tag->tag }}</span>
                    </th>
                    <td class="px-6 py-4">
                        {{ $tag->posts->count() }}
                    </td>

                    <th scope="row" class="px-6 py-4 font-medium text-gray-900 whitespace-nowrap dark:text-white">
                        <span class="bg-blue-100 w-fit text-blue-800 text-xs font-medium me-2 px-2.5 py-0.5 rounded dark:bg-blue-900 dark:text-blue-300">{{ $tagsQB[$index]->tag ?? 'N/A' }}</span>
                    </th>
                    <td class="px-6 py-4">
                        {{ $tagsQB[$index]->post_count ?? 0 }}
                    </td>
                </tr>
            @endforeach

        </tbody>
    </table>
</div>

@endsection
