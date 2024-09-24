@extends('layout.master')

@section('Title' , 'Array Manipulation')

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
                    Rename Keys in an Associative Array
                </th>
                <td class="px-6 py-4">
                    <a href="{{route('renaming')}}">solution</a>
                </td>
            </tr>

            <tr class="bg-white border-b dark:bg-gray-800 dark:border-gray-700">
                <td class="px-6 py-4">
                    2
                </td>
                <th scope="row" class="px-6 py-4 font-medium text-gray-900 whitespace-nowrap dark:text-white">
                    Swap Keys and Values in an Associative Array
                </th>
                <td class="px-6 py-4">
                    <a href="{{route('swap')}}">solution</a>
                </td>
            </tr>


            <tr class="bg-white border-b dark:bg-gray-800 dark:border-gray-700">
                <td class="px-6 py-4">
                    3
                </td>
                <th scope="row" class="px-6 py-4 font-medium text-gray-900 whitespace-nowrap dark:text-white">
                    Remove Specific Keys from an Associative Array
                </th>
                <td class="px-6 py-4">
                    <a href="{{route('removeKey')}}">solution</a>
                </td>
            </tr>
            <tr class="bg-white border-b dark:bg-gray-800 dark:border-gray-700">
                <td class="px-6 py-4">
                    4
                </td>
                <th scope="row" class="px-6 py-4 font-medium text-gray-900 whitespace-nowrap dark:text-white">
                    Change Key Case (Uppercase/Lowercase) in an Associative Array
                </th>
                <td class="px-6 py-4">
                    <a href="{{route('changeKeyCase')}}">solution</a>
                </td>
            </tr>

            <tr class="bg-white border-b dark:bg-gray-800 dark:border-gray-700">
                <td class="px-6 py-4">
                    5
                </td>
                <th scope="row" class="px-6 py-4 font-medium text-gray-900 whitespace-nowrap dark:text-white">
                    Sort Associative Array by Keys
                </th>
                <td class="px-6 py-4">
                    <a href="{{route('sortByKeys')}}">solution</a>
                </td>
            </tr>

            <tr class="bg-white border-b dark:bg-gray-800 dark:border-gray-700">
                <td class="px-6 py-4">
                    6
                </td>
                <th scope="row" class="px-6 py-4 font-medium text-gray-900 whitespace-nowrap dark:text-white">
                    Merge Two Associative Arrays by Overwriting Keys
                </th>
                <td class="px-6 py-4">
                    <a href="{{route('mergeAssociative')}}">solution</a>
                </td>
            </tr>

            <tr class="bg-white border-b dark:bg-gray-800 dark:border-gray-700">
                <td class="px-6 py-4">
                    7
                </td>
                <th scope="row" class="px-6 py-4 font-medium text-gray-900 whitespace-nowrap dark:text-white">
                    Find Missing Keys in an Associative Array
                </th>
                <td class="px-6 py-4">
                    <a href="{{route('missingKeys')}}">solution</a>
                </td>
            </tr>

            <tr class="bg-white border-b dark:bg-gray-800 dark:border-gray-700">
                <td class="px-6 py-4">
                    8
                </td>
                <th scope="row" class="px-6 py-4 font-medium text-gray-900 whitespace-nowrap dark:text-white">
                    Reorder Associative Array Keys
                </th>
                <td class="px-6 py-4">
                    <a href="{{route('reorder')}}">solution</a>
                </td>
            </tr>

            <tr class="bg-white border-b dark:bg-gray-800 dark:border-gray-700">
                <td class="px-6 py-4">
                    9
                </td>
                <th scope="row" class="px-6 py-4 font-medium text-gray-900 whitespace-nowrap dark:text-white">
                    Replace Specific Keys with New Keys
                </th>
                <td class="px-6 py-4">
                    <a href="{{ route('replacekeysNew') }}">solution</a>
                </td>
            </tr>

            <tr class="bg-white border-b dark:bg-gray-800 dark:border-gray-700">
                <td class="px-6 py-4">
                    10
                </td>
                <th scope="row" class="px-6 py-4 font-medium text-gray-900 whitespace-nowrap dark:text-white">
                    Group Associative Array by Key Value
                </th>
                <td class="px-6 py-4">
                    <a href="{{ route('groupValues') }}">solution</a>
                </td>
            </tr>

            <tr class="bg-white border-b dark:bg-gray-800 dark:border-gray-700">
                <td class="px-6 py-4">
                    11
                </td>
                <th scope="row" class="px-6 py-4 font-medium text-gray-900 whitespace-nowrap dark:text-white">
                    Extract a Subset of an Associative Array Based on Keys
                </th>
                <td class="px-6 py-4">
                    <a href="{{ route('extractSubset') }}">solution</a>
                </td>
            </tr>

            <tr class="bg-white border-b dark:bg-gray-800 dark:border-gray-700">
                <td class="px-6 py-4">
                    12
                </td>
                <th scope="row" class="px-6 py-4 font-medium text-gray-900 whitespace-nowrap dark:text-white">
                    Add Prefix or Suffix to Keys in an Associative Array
                </th>
                <td class="px-6 py-4">
                    <a href="{{ route('addPrefixSuffixToKeys') }}">solution</a>
                </td>
            </tr>

            <tr class="bg-white border-b dark:bg-gray-800 dark:border-gray-700">
                <td class="px-6 py-4">
                    13
                </td>
                <th scope="row" class="px-6 py-4 font-medium text-gray-900 whitespace-nowrap dark:text-white">
                    Create an Associative Array from Two Indexed Arrays:
                </th>
                <td class="px-6 py-4">
                    <a href="{{ route('createAssociativeArray') }}">solution</a>
                </td>
            </tr>

            <tr class="bg-white border-b dark:bg-gray-800 dark:border-gray-700">
                <td class="px-6 py-4">
                    14
                </td>
                <th scope="row" class="px-6 py-4 font-medium text-gray-900 whitespace-nowrap dark:text-white">
                    Rename Keys Based on a Mapping Array
                </th>
                <td class="px-6 py-4">
                    <a href="{{ route('renameKeysWithMapping') }}">solution</a>
                </td>
            </tr>

            <tr class="bg-white border-b dark:bg-gray-800 dark:border-gray-700">
                <td class="px-6 py-4">
                    15
                </td>
                <th scope="row" class="px-6 py-4 font-medium text-gray-900 whitespace-nowrap dark:text-white">
                    Check for Duplicate Keys Across Multiple Arrays
                </th>
                <td class="px-6 py-4">
                    <a href="{{ route('findDuplicateKeys') }}">solution</a>
                </td>
            </tr>


        </tbody>
    </table>
</div>

@endsection
