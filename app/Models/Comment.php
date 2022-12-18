<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Comment extends Model
{
    use HasFactory;
    
        protected $fillable = [
        'file',
        'body',
        'song_id',
        'users',
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
