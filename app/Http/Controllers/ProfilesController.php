<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;
use Illuminate\Support\Facades\Cache;
use Intervention\Image\Facades\Image;
class ProfilesController extends Controller
{
    //
    public function index($user)
    {
        $follows =(auth()->user()) ? auth()->user()->following->contains($user): false;
        $user=User::findOrFail($user);

        $postCount = Cache::remember('count.posts.'.$user->id ,
        now()->addSeconds(30),
        function() use($user){
            return $user->posts->count();
        });
        $followersCount = Cache::remember('count.posts.'.$user->id ,
        now()->addSeconds(30),
        function() use($user){
            return $user->profile->followers->count();
        });
        $followingCount = Cache::remember('count.posts.'.$user->id ,
        now()->addSeconds(30),
        function() use($user){
            return $user->following->count();
        });
        
        return view('profiles.index',compact('user','follows','postCount','followersCount','followingCount'));
    }
    public function edit(\App\User $user)
    {
        $this->authorize('update',$user->profile);
        return view('profiles.edit',compact('user'));
    }
    public function update(User $user)
    {   
        $this->authorize('update',$user->profile);
       $data = \request()->validate([
           'title'=> 'required',
           'description'=>'required',
           'url'=>'url',
           'image'=>'image'
       ]);
       $imagePath =$user->profile->image;
       $imageArray = ['image'=>$imagePath];
       if(\request('image')){
        $imagePath = request("image")->store('profile','public');
        $image = Image::make(public_path("storage/".$imagePath))->fit(1000,1000)->save();
        $imageArray = ['image'=>$imagePath];
       }
       
       auth()->user()->profile->update(array_merge($data,$imageArray));

        return redirect("/profile/{$user->id}");
    }


}
