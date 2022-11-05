<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Video extends Model
{
    use HasFactory;
    protected $fillable = ['viewers','name'];
    public $timestamps = false;

    
    public function users()
    {
        return $this->belongsToMany(User::class, 'user_video','video_id','user_id');
    }
}
