@extends('layout.master')

@section('Title' , 'Home')

@section('Content')


{{-- <div class="w-1/2 lg:w-1/3 flex flex-col gap-3 mx-auto mt-5"> --}}


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
        </tbody>
    </table>
</div>



    <!-- Post -->
    {{-- @for (post of posts; track $index) {
      <div class="bg-white rounded-lg p-5 flex flex-col gap-3">

        <!-- header -->
        <div class="flex gap-3 items-center">
            <img class="w-11 rounded-full" [src]="post.user.photo" [alt]="post.user.name">
            <div class="font-medium">
              <h3>{{post.user.name}}</h3>
              <span class="text-gray-500">{{post.createdAt | date}}</span>
            </div>
        </div>

        <!-- content -->
        <p>{{post.body}}</p>
        <img [src]="post.image" class="rounded-lg" alt="">

        <!-- Comments -->
        <p class="text-slate-400 cursor-pointer" #showComments>Show Comments</p>
        @defer (on interaction(showComments)) {
          <app-post-comments [postId]="post.id" ></app-post-comments>
        }

        <!-- type comment -->
        <app-create-comment [postId]="post.id"></app-create-comment>
                   {{-- Comments --}}
                   {{-- <div class="flex flex-col gap-3">
                        
                    <div class="bg-slate-200 p-5 rounded-lg">
                    <div class="flex gap-1 items-center">
                        <img class="w-8 rounded-full" src="{{asset('imgs/avatar.svg')}}">
                        <h5>{{'author name'}}</h5>
                        <span class="text-gray-500 font-light">{{ $comment->created_at}}</span>
                    </div>
                    <p>{{$comment->content}}</p>
                    </div>
                
                </div>

    </div> --}}

  {{-- </div> --}}

@endsection
