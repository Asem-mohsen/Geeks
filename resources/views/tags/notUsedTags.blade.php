@extends('layout.master')

@section('Title' , 'Tags')

@section('Content')

<h1 class="text-center m-5">Find tags not used by any post</h1>

<div class="relative overflow-x-auto m-5">
    <table class="w-full text-sm text-left rtl:text-right text-gray-500 dark:text-gray-400">
        <thead class="text-xs text-gray-700 uppercase bg-gray-50 dark:bg-gray-700 dark:text-gray-400">
            <tr>
                <th scope="col" class="px-6 py-3">
                    Tags (ERM)
                </th>

                <th scope="col" class="px-6 py-3">
                    Tags (Query Builder)
                </th>
            </tr>
        </thead>
        <tbody>
            @if ($unassociatedTagERM->isEmpty() && $unassociatedTagQB->isEmpty())
                <tr>
                    <td colspan="2" class="px-6 py-4 font-medium text-gray-900 whitespace-nowrap dark:text-white text-center">
                        All tags have been used in both methods.
                    </td>
                </tr>
            @else
                @foreach ($unassociatedTagERM as $ERMtag)
                    <tr class="bg-white border-b dark:bg-gray-800 dark:border-gray-700">
                        <td class="px-6 py-4 font-medium text-gray-900 whitespace-nowrap dark:text-white">
                            <span class="bg-blue-100 w-fit text-blue-800 text-xs font-medium me-2 px-2.5 py-0.5 rounded dark:bg-blue-900 dark:text-blue-300">
                                {{ $ERMtag->tag ?? "N/A" }}
                            </span>
                        </td>
                        <td></td>
                    </tr>
                @endforeach

                @foreach ($unassociatedTagQB as $QBtag)
                    <tr class="bg-white border-b dark:bg-gray-800 dark:border-gray-700">
                        <td></td>
                        <td class="px-6 py-4 font-medium text-gray-900 whitespace-nowrap dark:text-white">
                            <span class="bg-blue-100 w-fit text-blue-800 text-xs font-medium me-2 px-2.5 py-0.5 rounded dark:bg-blue-900 dark:text-blue-300">
                                {{ $QBtag->tag ?? "N/A" }}
                            </span>
                        </td>
                    </tr>
                @endforeach
            @endif
        </tbody>
    </table>
</div>

@endsection
