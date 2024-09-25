@extends('layout.master')

@section('Title' , 'Home')

@section('Content')


<h1 class="text-center m-5">Questions</h1>

<div class="relative overflow-x-auto m-5">
    <a href="{{route('export-excel')}}" class="btn p-3 m-3 border-neutral-400">Export Excel Sheet</a>
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
                    Find posts with a specific tag
                </th>
                <td class="px-6 py-4">
                    <a href="{{route('posts-by-tag' , 'entertainment')}}">solution</a>
                </td>
            </tr>

            <tr class="bg-white border-b dark:bg-gray-800 dark:border-gray-700">
                <td class="px-6 py-4">
                    2
                </td>
                <th scope="row" class="px-6 py-4 font-medium text-gray-900 whitespace-nowrap dark:text-white">
                    Count the number of posts for each tag
                </th>
                <td class="px-6 py-4">
                    <a href="{{route('list-tags-posts-cont')}}">solution</a>
                </td>
            </tr>

            <tr class="bg-white border-b dark:bg-gray-800 dark:border-gray-700">
                <td class="px-6 py-4">
                    3
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
                    4
                </td>
                <th scope="row" class="px-6 py-4 font-medium text-gray-900 whitespace-nowrap dark:text-white">
                    Find posts with at least two specific tags
                </th>
                <td class="px-6 py-4">
                    <a href="{{route('posts-atLeast-2Tags')}}">solution</a>
                </td>
            </tr>

            <tr class="bg-white border-b dark:bg-gray-800 dark:border-gray-700">
                <td class="px-6 py-4">
                    5
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
                    6
                </td>
                <th scope="row" class="px-6 py-4 font-medium text-gray-900 whitespace-nowrap dark:text-white">
                    Find tags not used by any post
                </th>
                <td class="px-6 py-4">
                    <a href="{{route('notUsedTags')}}">solution</a>
                </td>
            </tr>

            <tr class="bg-white border-b dark:bg-gray-800 dark:border-gray-700">
                <td class="px-6 py-4">
                    7
                </td>
                <th scope="row" class="px-6 py-4 font-medium text-gray-900 whitespace-nowrap dark:text-white">
                    Get users who have authored posts with a specific tag
                </th>
                <td class="px-6 py-4">
                    <a href="{{route('usersWithTag' , 'funny')}}">solution</a>
                </td>
            </tr>

            <tr class="bg-white border-b dark:bg-gray-800 dark:border-gray-700">
                <td class="px-6 py-4">
                    8
                </td>
                <th scope="row" class="px-6 py-4 font-medium text-gray-900 whitespace-nowrap dark:text-white">
                    Retrieve top 3 tags used by the most active user
                </th>
                <td class="px-6 py-4">
                    <a href="{{route('topTagsByMostActiveUser')}}">solution</a>
                </td>
            </tr>

            <tr class="bg-white border-b dark:bg-gray-800 dark:border-gray-700">
                <td class="px-6 py-4">
                    9
                </td>
                <th scope="row" class="px-6 py-4 font-medium text-gray-900 whitespace-nowrap dark:text-white">
                    Retrieve posts that have all specified tags
                </th>
                <td class="px-6 py-4">
                    <a href="{{ route('getPostsByTags', ['tags' => ['funny', 'lifestyle']]) }}">solution</a>
                </td>
            </tr>

            <tr class="bg-white border-b dark:bg-gray-800 dark:border-gray-700">
                <td class="px-6 py-4">
                    10
                </td>
                <th scope="row" class="px-6 py-4 font-medium text-gray-900 whitespace-nowrap dark:text-white">
                    Find top 5 users with the most comments
                </th>
                <td class="px-6 py-4">
                    <a href="{{ route('topUsersComments') }}">solution</a>
                </td>
            </tr>

            <tr class="bg-white border-b dark:bg-gray-800 dark:border-gray-700">
                <td class="px-6 py-4">
                    11
                </td>
                <th scope="row" class="px-6 py-4 font-medium text-gray-900 whitespace-nowrap dark:text-white">
                    Get posts with no comments
                </th>
                <td class="px-6 py-4">
                    <a href="{{ route('noCommentsPosts') }}">solution</a>
                </td>
            </tr>

            <tr class="bg-white border-b dark:bg-gray-800 dark:border-gray-700">
                <td class="px-6 py-4">
                    12
                </td>
                <th scope="row" class="px-6 py-4 font-medium text-gray-900 whitespace-nowrap dark:text-white">
                    Find average comments per post for each user
                </th>
                <td class="px-6 py-4">
                    <a href="{{ route('avgCommentsUser') }}">solution</a>
                </td>
            </tr>

            <tr class="bg-white border-b dark:bg-gray-800 dark:border-gray-700">
                <td class="px-6 py-4">
                    13
                </td>
                <th scope="row" class="px-6 py-4 font-medium text-gray-900 whitespace-nowrap dark:text-white">
                    Retrieve tags associated with the most unique users
                </th>
                <td class="px-6 py-4">
                    <a href="{{ route('tagsUniqueUsers') }}">solution</a>
                </td>
            </tr>

            <tr class="bg-white border-b dark:bg-gray-800 dark:border-gray-700">
                <td class="px-6 py-4">
                    14
                </td>
                <th scope="row" class="px-6 py-4 font-medium text-gray-900 whitespace-nowrap dark:text-white">
                    Find posts from the last month with multiple tags
                </th>
                <td class="px-6 py-4">
                    <a href="{{ route('lastMonthPosts') }}">solution</a>
                </td>
            </tr>

            <tr class="bg-white border-b dark:bg-gray-800 dark:border-gray-700">
                <td class="px-6 py-4">
                    15
                </td>
                <th scope="row" class="px-6 py-4 font-medium text-gray-900 whitespace-nowrap dark:text-white">
                    Get users who commented on their own posts
                </th>
                <td class="px-6 py-4">
                    <a href="{{ route('selfCommented') }}">solution</a>
                </td>
            </tr>

            <tr class="bg-white border-b dark:bg-gray-800 dark:border-gray-700">
                <td class="px-6 py-4">
                    16
                </td>
                <th scope="row" class="px-6 py-4 font-medium text-gray-900 whitespace-nowrap dark:text-white">
                    Find total posts and comments for each user
                </th>
                <td class="px-6 py-4">
                    <a href="{{ route('totalPostsandComments') }}">solution</a>
                </td>
            </tr>

            <tr class="bg-white border-b dark:bg-gray-800 dark:border-gray-700">
                <td class="px-6 py-4">
                    17
                </td>
                <th scope="row" class="px-6 py-4 font-medium text-gray-900 whitespace-nowrap dark:text-white">
                    Find posts with the most comments and at least three tags
                </th>
                <td class="px-6 py-4">
                    <a href="{{ route('mostCommentsand3tags') }}">solution</a>
                </td>
            </tr>

            <tr class="bg-white border-b dark:bg-gray-800 dark:border-gray-700">
                <td class="px-6 py-4">
                    18
                </td>
                <th scope="row" class="px-6 py-4 font-medium text-gray-900 whitespace-nowrap dark:text-white">
                    Get the user with the most published posts
                </th>
                <td class="px-6 py-4">
                    <a href="{{ route('mostPublishedPosts') }}">solution</a>
                </td>
            </tr>

            <tr class="bg-white border-b dark:bg-gray-800 dark:border-gray-700">
                <td class="px-6 py-4">
                    19
                </td>
                <th scope="row" class="px-6 py-4 font-medium text-gray-900 whitespace-nowrap dark:text-white">
                    Find posts with comments from at least two different users
                </th>
                <td class="px-6 py-4">
                    <a href="{{ route('postsWithcomments2differentUsers') }}">solution</a>
                </td>
            </tr>

            <tr class="bg-white border-b dark:bg-gray-800 dark:border-gray-700">
                <td class="px-6 py-4">
                    20
                </td>
                <th scope="row" class="px-6 py-4 font-medium text-gray-900 whitespace-nowrap dark:text-white">
                    Find users who have never posted but have commented
                </th>
                <td class="px-6 py-4">
                    <a href="{{ route('usersNeverPosted') }}">solution</a>
                </td>
            </tr>

            <tr class="bg-white border-b dark:bg-gray-800 dark:border-gray-700">
                <td class="px-6 py-4">
                    21
                </td>
                <th scope="row" class="px-6 py-4 font-medium text-gray-900 whitespace-nowrap dark:text-white">
                    Retrieve tags on posts created by multiple users
                </th>
                <td class="px-6 py-4">
                    <a href="{{ route('tagsMultiUsers') }}">solution</a>
                </td>
            </tr>

            <tr class="bg-white border-b dark:bg-gray-800 dark:border-gray-700">
                <td class="px-6 py-4">
                    22
                </td>
                <th scope="row" class="px-6 py-4 font-medium text-gray-900 whitespace-nowrap dark:text-white">
                    Get the user with the most tags across their posts
                </th>
                <td class="px-6 py-4">
                    <a href="{{ route('userWithMostTags') }}">solution</a>
                </td>
            </tr>

            <tr class="bg-white border-b dark:bg-gray-800 dark:border-gray-700">
                <td class="px-6 py-4">
                    23
                </td>
                <th scope="row" class="px-6 py-4 font-medium text-gray-900 whitespace-nowrap dark:text-white">
                    Count posts by status (draft, published) for each user
                </th>
                <td class="px-6 py-4">
                    <a href="{{ route('countPostsByStatus') }}">solution</a>
                </td>
            </tr>

            <tr class="bg-white border-b dark:bg-gray-800 dark:border-gray-700">
                <td class="px-6 py-4">
                    24
                </td>
                <th scope="row" class="px-6 py-4 font-medium text-gray-900 whitespace-nowrap dark:text-white">
                    Find posts tagged with all tags starting with 'L'. Return
                </th>
                <td class="px-6 py-4">
                    <a href="{{ route('Ltags') }}">solution</a>
                </td>
            </tr>

            <tr class="bg-white border-b dark:bg-gray-800 dark:border-gray-700">
                <td class="px-6 py-4">
                    25
                </td>
                <th scope="row" class="px-6 py-4 font-medium text-gray-900 whitespace-nowrap dark:text-white">
                    Identify top 3 users with the highest average post length
                </th>
                <td class="px-6 py-4">
                    <a href="{{ route('usersHighestAvgPosts') }}">solution</a>
                </td>
            </tr>

            <tr class="bg-white border-b dark:bg-gray-800 dark:border-gray-700">
                <td class="px-6 py-4">
                    26
                </td>
                <th scope="row" class="px-6 py-4 font-medium text-gray-900 whitespace-nowrap dark:text-white">
                    Get users who authored posts each month of the current year
                </th>
                <td class="px-6 py-4">
                    <a href="{{ route('usersPostsEachMonth') }}">solution</a>
                </td>
            </tr>

            <tr class="bg-white border-b dark:bg-gray-800 dark:border-gray-700">
                <td class="px-6 py-4">
                    27
                </td>
                <th scope="row" class="px-6 py-4 font-medium text-gray-900 whitespace-nowrap dark:text-white">
                    Retrieve posts tagged with at least one tag used by the most active user
                </th>
                <td class="px-6 py-4">
                    <a href="{{ route('postsLeastTagActiveUser') }}">solution</a>
                </td>
            </tr>

            <tr class="bg-white border-b dark:bg-gray-800 dark:border-gray-700">
                <td class="px-6 py-4">
                    28
                </td>
                <th scope="row" class="px-6 py-4 font-medium text-gray-900 whitespace-nowrap dark:text-white">
                    Find users who both authored and commented on posts with a specific tag
                </th>
                <td class="px-6 py-4">
                    <a href="{{ route('authoredAndCommented', 'funny') }}">solution</a>
                </td>
            </tr>

            <tr class="bg-white border-b dark:bg-gray-800 dark:border-gray-700">
                <td class="px-6 py-4">
                    29
                </td>
                <th scope="row" class="px-6 py-4 font-medium text-gray-900 whitespace-nowrap dark:text-white">
                    Count comments made by users on posts authored by others
                </th>
                <td class="px-6 py-4">
                    <a href="{{ route('countCommentsOthers') }}">solution</a>
                </td>
            </tr>

            <tr class="bg-white border-b dark:bg-gray-800 dark:border-gray-700">
                <td class="px-6 py-4">
                    30
                </td>
                <th scope="row" class="px-6 py-4 font-medium text-gray-900 whitespace-nowrap dark:text-white">
                    Find all users who have commented on posts authored by other users
                </th>
                <td class="px-6 py-4">
                    <a href="{{ route('allUsersCommentedOthers') }}">solution</a>
                </td>
            </tr>
        </tbody>
    </table>
</div>

@endsection
