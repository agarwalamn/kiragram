@extends('layouts.app')

@section('content')
    <div class="container">
        @if (count($posts) == 0)
            <div class="row justify-content-center" >
                <div class="card p-5 align-items-center col" style="background: linear-gradient(to bottom, #D5DEE7 0%, #E8EBF2 50%, #E2E7ED 100%), linear-gradient(to bottom, rgba(0,0,0,0.02) 50%, rgba(255,255,255,0.02) 61%, rgba(0,0,0,0.02) 73%), linear-gradient(33deg, rgba(255,255,255,0.20) 0%, rgba(0,0,0,0.20) 100%);
                background-blend-mode: normal,color-burn;" >
                <h1>Welcome to <span style="font-family: 'Russo One', sans-serif; ">Kiragram</span></h1>
                <p>An Instagram replica made for fun you can use it as you please!</p>
                <p >(follow your friends to see their post)<hr></p>
                <br><br>
                <p>Have fun! :D</p>
                </div>
            </div>
        @endif
        @foreach ($posts  as $post)
        <div class="row">
            <div class="col-6 offset-3">
            <a href="/p/{{$post->id}}"><img src="/storage/{{$post->image}}" class="w-100"></a>
            </div>
        </div>
        <div class="row pt-1 pb-4">
            <div class="col-5 offset-3">    
                <p>
                    <span class="font-weight-bold">
                        <a href="/profile/{{$post->user->id}}"><span class="text-dark">{{$post->user->username}}  </span></a>
                    </span>
                     {{$post->caption}}</p>
            </div>
        </div>
        @endforeach
        <div class="row">
            <div class="col-12 d-flex justify-content-center    ">
                {{$posts->links()}}
            </div>
        </div>
    </div>
@endsection
