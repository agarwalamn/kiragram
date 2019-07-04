<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Profile extends Model
{
    protected $guarded = [];
    public function profileImage()
    {
        if($this->image){
            $imagePath=$this->image;
        }
        else{
            $imagePath='profile/no_avatar.jpg';
        }
        return '/storage/'. $imagePath;
    }
    public function user(){
        return $this->belongsTo(User::class);
    }
    public function followers()
    {
        return $this->belongsToMany(User::class);
    }
}
