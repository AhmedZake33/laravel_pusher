<?php

namespace App\Models;

use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use App\Scopes\UsersScope;
use Illuminate\Database\Eloquent\Builder;

class User extends Authenticatable
{
    use HasFactory, Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name', 'email', 'password'
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];

    /**
     * The attributes that should be cast to native types.
     *
     * @var array
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];

    // protected static function booted()
    // {
    //     // static::addGlobalScope(new UsersScope);

    //     static::addGlobalScope('usersScope2',function(Builder $builder){
    //         $builder->where('flag',0);
    //     });
    // }

    // public function scopeActive($query)
    // {
    //     return $query->where('flag',1);
    // }

    public function scopeOfActive($query , $active)
    {
        return $query->where('active',$active);
    }

    public function posts()
    {
        return $this->hasMany(Post::class,'user_id','id');
    }

    public function comments()
    {
        return $this->hasMany(Comment::class,'user_id','id');
    }
   
    public function videos()
    {
        return $this->belongsToMany(Video::class,'user_video','user_id','video_id');
    }

    public function subscribedUsers()
    {
        return $this->belongsToMany(User::class , 'subscribe_user' , 'user_id','subscribe_id');
    }

    public function usersSubscribed()
    {
        return $this->belongsToMany(User::class , 'subscribe_user','subscribe_id','user_id');
    }

    
}
