<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Message extends Model
{
    use HasFactory;
    
    protected $fillable = [ 'send_user_id',
                            'body',
                            'user_id',
                            'song_id'];
                            
    protected $table = 'messages';
    
    public function users()
    {
        return $this->belongsTo(User::class);
    }
    
    public function song()
    {
        return $this->belongsTo(Song::class);
    }
    
}
