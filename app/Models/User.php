<?php

namespace App\Models;

// use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;

class User extends Authenticatable
{
    use HasApiTokens, HasFactory, Notifiable;


    protected $fillable = [
        'name',
        'email',
        'password',
        'age',
        'feeling',
        'additional_question',
        'sns',
        'overview',
        'image',
    ];

    protected $hidden = [
        'password',
        'remember_token',
    ];
    
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];
    
    public function getPaginateByLimit(int $limit_count = 10)
    {
        return $this->orderBy('updated_at', 'DESC')->paginate($limit_count);
    }
    
    
    public function followUsers()
    {
        return $this->belongsToMany('App\User', 'follows', 'followed_id', 'follower_id');
    }

    // フォロー→フォロワー
    public function follows()
    {
        return $this->belongsToMany('App\User', 'follows', 'follower_id', 'followed_id');
    }
    
    public function message_store()
    {
        return $this->belongsToMany('App\Message', 'messages', 'send_user_id');
    }
    
    public function songs()
    {
        return $this->belongsToMany(Song::class);
    }
    
    public function melodies()
    {
        return $this->belongsToMany(Melody::class);
    }
    
    public function comments()
    {
        return $this->belongsToMany(Comment::class);
    }
    
    public function replies()
    {
        return $this->belongsToMany(Reply::class);
    }

    public function messages()
    {
        return $this->hasMany(Massage::class);
    }
}
