@extends('layout.master')

@section('Title' , 'Tags')

@section('Content')

<h1 class="text-center m-5">Get the most frequently used tag</h1>

<div class="relative overflow-x-auto m-5">
    <table class="w-full text-sm text-left rtl:text-right text-gray-500 dark:text-gray-400">
        <thead class="text-xs text-gray-700 uppercase bg-gray-50 dark:bg-gray-700 dark:text-gray-400">
            <tr>
                <th scope="col" class="px-6 py-3">
                    Tags (ERM)
                </th>
                <th scope="col" class="px-6 py-3">
                    Most Used (ERM)
                </th>

                <th scope="col" class="px-6 py-3">
                    Tags (Query Builder)
                </th>
                <th scope="col" class="px-6 py-3">
                    Most Used (Query Builder)
                </th>
            </tr>
        </thead>
        <tbody>
            <tr class="bg-white border-b dark:bg-gray-800 dark:border-gray-700">
                <th scope="row" class="px-6 py-4 font-medium text-gray-900 whitespace-nowrap dark:text-white">
                    <span class="bg-blue-100 w-fit text-blue-800 text-xs font-medium me-2 px-2.5 py-0.5 rounded dark:bg-blue-900 dark:text-blue-300">{{ $frequentERM->tag }}</span>
                </th>
                <td class="px-6 py-4">
                    {{ $frequentERM->posts_count }}
                </td>

                <th scope="row" class="px-6 py-4 font-medium text-gray-900 whitespace-nowrap dark:text-white">
                    <span class="bg-blue-100 w-fit text-blue-800 text-xs font-medium me-2 px-2.5 py-0.5 rounded dark:bg-blue-900 dark:text-blue-300">{{ $frequentQB->tag }}</span>
                </th>
                <td class="px-6 py-4">
                    {{ $frequentQB->post_count  }}
                </td>
            </tr>
        </tbody>
    </table>
</div>

@endsection
