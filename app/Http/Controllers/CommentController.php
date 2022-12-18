<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\Comment;
use App\Models\Song;
use App\Models\User;


class CommentController extends Controller
{
    public function store(Request $request, Comment $comment)
    {
        $input = $request['comment'];
        $comment->fill($input)->save();
        return view("/songs/index".$song->id);
    }

}
