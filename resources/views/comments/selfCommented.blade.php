@extends('layout.master')

@section('Title', 'Comments')

@section('Content')

    <h1 class="text-center m-5">Get users who commented on their own posts</h1>

    <div class="flex gap-3">
        <div class="w-[50%]">
            <h2 class="text-center m-5">Using Eloquent Relationships</h2>
            @if($selfCommentedERM->isEmpty())
                <p>No users found commented on their own posts.</p>
            @else
                <table class="w-full text-sm text-left rtl:text-right text-gray-500 dark:text-gray-400">
                    <thead class="text-xs text-gray-700 uppercase bg-gray-50 dark:bg-gray-700 dark:text-gray-400">
                        <tr>
                            <th scope="col" class="px-6 py-3  text-center">User</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($selfCommentedERM as $user)
                            <tr class="bg-white border-b dark:bg-gray-800 dark:border-gray-700">
                                <td  class="px-6 py-4 font-medium text-gray-900 whitespace-nowrap dark:text-white text-center">
                                    {{ $user->name }}
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            @endif
        </div>

        <div class="w-[50%]">
            <h2 class="text-center m-5">Using Query Builder</h2>
            @if($selfCommentedERM->isEmpty())
                <p>No users found commented on their own posts.</p>
            @else
                <table class="w-full text-sm text-left rtl:text-right text-gray-500 dark:text-gray-400">
                    <thead class="text-xs text-gray-700 uppercase bg-gray-50 dark:bg-gray-700 dark:text-gray-400">
                        <tr>
                            <th scope="col" class="px-6 py-3 text-center">User</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($selfCommentedQB as $user)
                        <tr class="bg-white border-b dark:bg-gray-800 dark:border-gray-700">
                                <td class="px-6 py-4 font-medium text-gray-900 whitespace-nowrap dark:text-white text-center">
                                    {{ $user->name }}
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            @endif
        </div>
    </div>

@endsection