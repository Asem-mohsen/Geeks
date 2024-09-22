@extends('layout.master')

@section('Title' , 'Posts')

@section('Content')

<h1 class="text-center m-5">Count the number of posts for each tag</h1>

<div class="relative overflow-x-auto m-5">
    <table class="w-full text-sm text-left rtl:text-right text-gray-500 dark:text-gray-400">
        <thead class="text-xs text-gray-700 uppercase bg-gray-50 dark:bg-gray-700 dark:text-gray-400">
            <tr>
                <th scope="col" class="px-6 py-3">
                    Tags
                </th>
                <th scope="col" class="px-6 py-3">
                    Products associated with the tag (ERM)
                </th>
                <th scope="col" class="px-6 py-3">
                    Products associated with the tag (Query Builder)
                </th>
            </tr>
        </thead>
        <tbody>
            @foreach ($tags as $index => $tag)
                <tr class="bg-white border-b dark:bg-gray-800 dark:border-gray-700">
                    <th scope="row" class="px-6 py-4 font-medium text-gray-900 whitespace-nowrap dark:text-white">
                        {{ $tag->tag }}
                    </th>
                    <td class="px-6 py-4">
                        {{ $tagsEloquent[$index]['post_count'] }}
                    </td>
                    <td class="px-6 py-4">
                        {{ $tagsQueryBuilder[$index]->post_count }}
                    </td>
                </tr>
            @endforeach

        </tbody>
    </table>
</div>


@endsection
