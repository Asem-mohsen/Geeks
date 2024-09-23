@extends('layout.master')
@section('Title' , 'Posts')

@section('Content')

<h1 class="text-center m-5">Find posts tagged with all tags starting with 'L'. Return</h1>

<div class="flex gap-3">
    <div>
        @if($postsERM->isEmpty())
            <p>No posts</p>
        @else
            <h1 class="text-center m-5">Using Eloquent Relationships and Methods</h1>
            @foreach($postsERM as $post)
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

    <div>
        @if($postsQB->isEmpty())
            <p>No posts</p>
        @else
            <h1 class="text-center m-5">Using select and join Without Relationships</h1>
            @foreach($postsQB as $post)
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
