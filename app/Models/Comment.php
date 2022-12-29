<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Comment extends Model
{
    use HasFactory;
    
        protected $fillable = [
        'body',
        'audio',
        'song_id',
        'user_id',
        'audio_url',
    ];
    
    public function users()
    {
        return $this->belongsToMany(User::class);
    }
    
    public function replies()
    {
        return $this->hasMany(Reply::class);
    }
    
    public function song()
    {
        return $this->belongsTo(Song::class);
    }
    
    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
