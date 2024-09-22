@extends('layout.master')

@section('Title' , 'Comments')

@section('Content')

<h1 class="text-center m-5">Get posts with no comments</h1>

<div class="flex gap-3 justify-center">
    <div class="text-center ">
        <h1 class="text-center m-5">Using select and join Without Relationships</h1>
        @if($noCommentsPostsERM->isEmpty())
            <p>All Posts Have Comments</p>
        @else
            <h1 class="text-center m-5">Using Eloquent Relationships and Methods</h1>
            @foreach($noCommentsPostsERM as $post)
                <div class="bg-white rounded-lg p-5 flex flex-col gap-3">

                    <!-- header -->
                    <div class="flex gap-3 items-center">
                        <img class="w-11 rounded-full" src="{{asset('imgs/avatar.svg')}}" alt="user photo">
                        <div class="font-medium">
                        <h3>{{ $post->user->name ?? 'Unknown Author' }}</h3>
                        <span class="text-gray-500">{{$post->created_at}}</span>
                        </div>
                    </div>

                    <!-- content -->
                    <p>{{$post->body}}</p>

                </div>
            @endforeach
        @endif
    </div>

    <div class="text-center ">
        <h1 class="text-center m-5">Using select and join Without Relationships</h1>
        @if($noCommentsPostsQB->isEmpty())
            <p>All Posts Have Comments</p>
        @else
            @foreach($noCommentsPostsQB as $post)
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

                </div>
            @endforeach
        @endif
    </div>
    
</div>
@endsection
