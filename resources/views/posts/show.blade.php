@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-6">
                    <img src="/storage/{{$post->image}}" class="w-100">
            </div>
            <div class="col-3">
               <div class="d-flex align-items-center">
                   <div class="pr-4">
                       <img src="{{$post->user->profile->profileImage()}}" alt="" class="w-100 rounded-circle" style="max-width:40px;">
                   </div>
                </div>
                <hr>
                <p>
                    <span class="font-weight-bold">
                        <a href="/profile/{{$post->user->id}}"><span class="text-dark">{{$post->user->username}}  </span></a>
                    </span>
                     {{$post->caption}}</p>
            </div>
        </div>
    </div>
@endsection
