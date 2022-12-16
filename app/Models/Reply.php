<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Reply extends Model
{
    use HasFactory;
    
        protected $fillable = [
        'file',
        'body',
        'comment_id',
    ];
    
    public function users()
    {
        return $this->belongsToMany(User::class);
    }
    
    public function comment()
    {
        return $this->belongsTo(Comment::class);
    }
}
