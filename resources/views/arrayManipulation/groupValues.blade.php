@extends('layout.master')

@section('Title' , 'Array Manipulation')

@section('Content')

<h1 class="text-center m-5">Group Associative Array by Key Value</h1>

<div class="relative overflow-x-auto m-5">
    <table class="w-full text-sm text-left rtl:text-right text-gray-500 dark:text-gray-400">
        <thead class="text-xs text-gray-700 uppercase bg-gray-50 dark:bg-gray-700 dark:text-gray-400">
            <tr>
                <th scope="col" class="px-6 py-3">
                    Group
               </th>
                <th scope="col" class="px-6 py-3">
                     Key
                </th>
                <th scope="col" class="px-6 py-3">
                     Value
                </th>
            </tr>
        </thead>
        <tbody>
            @foreach ($groups as $group => $items )
                @foreach ($items as $item )
                    @foreach ($item as $key => $value)
                        <tr class="bg-white border-b dark:bg-gray-800 dark:border-gray-700">
                            <th scope="row" class="px-6 py-4 font-medium text-gray-900 whitespace-nowrap dark:text-white">
                                {{$group}}
                            </th>
                            <td class="px-6 py-4">
                                {{$key}}
                            </td>
                            <td class="px-6 py-4">
                                {{$value}}
                            </td>
                        </tr>
                    @endforeach
                @endforeach
            @endforeach

        </tbody>

@endsection
