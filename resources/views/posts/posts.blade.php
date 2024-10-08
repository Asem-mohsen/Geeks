@extends('layout.master')

@section('Title' , 'Posts')

@section('Content')

<h1 class="text-center m-5">Find posts with a specific tag</h1>

<div class="flex gap-3">
    <div>
        @if($postsEloquent->isEmpty())
            <p>No posts found with this tag.</p>
        @else
            <h1 class="text-center m-5">Using Eloquent Relationships and Methods</h1>
            @foreach($postsEloquent as $post)
                <div class="bg-white rounded-lg p-5 flex flex-col gap-3">

                    <!-- header -->
                    <div class="flex gap-3 items-center">
                        <img class="w-11 rounded-full" src="{{asset('imgs/avatar.svg')}}" alt="user photo">
                        <div class="font-medium">
                        <h3>{{ 'author name' }}</h3>
                        <span class="text-gray-500">{{$post->created_at}}</span>
                        </div>
                    </div>

                    <!-- content -->
                    <p>{{$post->body}}</p>

                    {{-- tag --}}
                    <span class="bg-blue-100 w-fit text-blue-800 text-xs font-medium me-2 px-2.5 py-0.5 rounded dark:bg-blue-900 dark:text-blue-300">{{$tagName}}</span>

                </div>
            @endforeach
        @endif
    </div>

    <div>
        @if($postsQueryBuilder->isEmpty())
            <p>No posts found with this tag.</p>
        @else
            <h1 class="text-center m-5">Using select and join Without Relationships</h1>
            @foreach($postsQueryBuilder as $post)
                <div class="bg-white rounded-lg p-5 flex flex-col gap-3">

                    <!-- header -->
                    <div class="flex gap-3 items-center">
                        <img class="w-11 rounded-full" src="{{asset('imgs/avatar.svg')}}" alt="user photo">
                        <div class="font-medium">
                        <h3>{{ 'author name' }}</h3>
                        <span class="text-gray-500">{{$post->created_at}}</span>
                        </div>
                    </div>

                    <!-- content -->
                    <p>{{$post->body}}</p>

                    {{-- tag --}}
                    <span class="bg-blue-100 w-fit text-blue-800 text-xs font-medium me-2 px-2.5 py-0.5 rounded dark:bg-blue-900 dark:text-blue-300">{{$tagName}}</span>
                </div>
            @endforeach
        @endif
    </div>

@endsection
