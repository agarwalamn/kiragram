@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-3">
                <img src="{{$user->profile->profileImage()}}"
                class="rounded-circle p-5 w-100">
            </div>
            <div class="col-6 pt-5">
                <div class="d-flex justify-content-between align-items-baseline">
                 <h1>{{ $user->username }}</h1>
                 @cannot('update', $user->profile)
                <follow-button user-id="{{$user->id}}" follows="{{$follows}}"></follow-button>
                @endcannot
                 @can('update', $user->profile)
                 <a href="/p/create">Add New Post</a>
                @endcan
                </div>
                @can('update', $user->profile)
                <a href="/p/{{$user->id}}/edit" style="float: right">Edit Profile</a>
                @endcan
                
                <div class="d-flex">
                <div class="pr-3"><strong>{{$postCount}}</strong> posts</div>
                <div class="pr-3"><strong>{{$followersCount}}</strong> followers</div>
                <div class="pr-3"><strong>{{$followingCount}}</strong> following</div>
                </div>
            <div class="pt-3 font-weight-bold">{{$user->profile->title}}</div>
            <div class=>{{$user->profile->description}}</div>
            <div><a href="{{$user->profile->url}}" class="font-weight-bold">{{$user->profile->url}}</a></div>
            </div>
        </div>
        <div class="row p-5 container">         
            @foreach ($user->posts as $post)
            <div class="col-4 pb-4">
            <a href="/p/{{$post->id}}">
                    <img src="/storage/{{ $post->image }}" class="w-100">
                </a> 
                </div>  
            @endforeach
        </div>
    </div>

@endsection
