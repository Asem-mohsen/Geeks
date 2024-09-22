@extends('layout.master')

@section('Title', 'Users')

@section('Content')

<h1 class="text-center m-5">Top 3 Tags Used by Most Active User</h1>

<div class="relative overflow-x-auto m-5">
    <table class="w-full text-sm text-left rtl:text-right text-gray-500 dark:text-gray-400">
        <thead class="text-xs text-gray-700 uppercase bg-gray-50 dark:bg-gray-700 dark:text-gray-400">
            <tr>
                <th scope="col" class="px-6 py-3">Top 3 Tags (ERM)</th>
                <th scope="col" class="px-6 py-3">Usage Count (ERM)</th>

                <th scope="col" class="px-6 py-3">Top 3 Tags (QB)</th>
                <th scope="col" class="px-6 py-3">Usage Count (QB)</th>
            </tr>
        </thead>
        <tbody>
            @for ($i = 0; $i < max($top3TagsERM->count(), $top3TagsQB->count()); $i++)
                <tr class="bg-white border-b dark:bg-gray-800 dark:border-gray-700">
                    <td class="px-6 py-4">
                        {{ $top3TagsERM[$i]->tag }}
                    </td>
                    <td class="px-6 py-4">
                        {{ $top3TagsERM[$i]->tag_count}}
                    </td>
                    <td class="px-6 py-4">
                        {{ $top3TagsQB[$i]->tag }}
                    </td>
                    <td class="px-6 py-4">
                        {{ $top3TagsQB[$i]->tag_count}}
                    </td>
                </tr>
            @endfor
        </tbody>
    </table>
</div>

@endsection