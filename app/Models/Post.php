<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Post extends Model
{
    protected $fillable = ['title','content','user_id'];

    public function user()
    {
        return $this->belongsto(User::class);
    }
    
    public function comments()
    {
        return $this->hasMany(Comment::class,'post_id','id');
    }
}

