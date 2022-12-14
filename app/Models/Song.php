<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;


class Song extends Model
{
    use Notifiable,HasFactory, HasApiTokens;
    
    
    protected $fillable = [
        'name',
        'background',
        'overview',
        'audio',
        'image',
        'movie',
        
        ];
        


        
    public function getPaginateByLimit(int $limit_count = 10)
    {
        return $this->orderBy('updated_at', 'DESC')->paginate($limit_count);
    }
    
    public function melodies()
    {
        return $this->belongsToMany(Melody::class);
    }
    
    public function users()
    {
        return $this->belongsToMany(User::class);
    }
    public function statuses()
    {
        return $this->belongsToMany(Status::class);
    }
    
    public function comments()
    {
        return $this->hasMany(Song::class);
    }
    
    public function messages()
    {
        return $this->hasMany(Message::class);
    }

}
