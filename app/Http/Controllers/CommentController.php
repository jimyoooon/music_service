<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\Comment;
use App\Models\Song;
use App\Models\User;
use App\Models\Reply;
use App\Models\Message;
use Cloudinary; 



class CommentController extends Controller
{
    public function store(Request $request, Comment $comment, Song $song)
    {
        //$input = $request['comment'];
        //$comment->fill($input)->save();
        //return redirect("/songs/index".$song->id); //リダイレクト先はhomeとindex
        $comment = new Comment();
        $comment->song_id = $song->id;
        $comment->body = $request->body;
        $comment->file = $request->file;
        $comment->user_id = Auth::user()->id;
        $song->comments()->save($comment);
        //return redirect('/index')->with(['song' => $song, 'comments' => $comment->get()]);
        return redirect('/index')->with(['songs' => $song, 'comments' => $comment->where('song_id', '=', $song->id)->get()]);
    }


    //public function reply_store()
    //{
        //$reply = new Reply();
        //$reply->comment_id = $comment->id;
        //$reply->body = $request->body;
        //$reply->file = $request->file;
        //$reply->user_id = Auth::user()->id;
        //$comment->replies()->save($reply);
        //return view('songs/show');
    //}

}
