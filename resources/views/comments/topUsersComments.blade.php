@extends('layout.master')

@section('Title' , 'Comments')

@section('Content')

<h1 class="text-center m-5">Find top 5 users with the most comments</h1>

<div class="relative overflow-x-auto m-5">
    <table class="w-full text-sm text-left rtl:text-right text-gray-500 dark:text-gray-400">
        <thead class="text-xs text-gray-700 uppercase bg-gray-50 dark:bg-gray-700 dark:text-gray-400">
            <tr>
                <th scope="col" class="px-6 py-3">
                    Users (ERM)
                </th>
                <th scope="col" class="px-6 py-3">
                    Users (Query Builder)
                </th>
            </tr>
        </thead>
        <tbody>
            @for ($i = 0; $i < $maxCount; $i++)
                <tr class="bg-white border-b dark:bg-gray-800 dark:border-gray-700">
                    <td class="px-6 py-4 font-medium text-gray-900 whitespace-nowrap dark:text-white">
                        @if(isset($topUsersERM[$i]))
                            {{$topUsersERM[$i]->name}}
                        @endif
                    </td>
                    <td class="px-6 py-4 font-medium text-gray-900 whitespace-nowrap dark:text-white">
                        @if(isset($topUsersDQ[$i]))
                            {{$topUsersDQ[$i]->name}}
                        @endif
                    </td>
                </tr>
            @endfor
        </tbody>
    </table>
</div>


@endsection