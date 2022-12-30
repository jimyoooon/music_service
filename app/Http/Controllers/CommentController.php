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
use Storage;
use App\Http\Requests\CommentRequest;


class CommentController extends Controller
{
    public function store(Request $request, Comment $comment, Song $song)
    {
        $comment = new Comment();
        $comment->song_id = $song->id;
        $comment->body = $request->body;
        $comment->audio = $request->audio;
        $comment->user_id = Auth::user()->id;
        
        $audio_url = Cloudinary::upload($request->file('audio')->getRealPath(), ['resource_type' => 'video'])->getSecurePath();
        $comment->audio = $audio_url;
        $song->comments()->save($comment);

        return redirect('/index')->with(['song' => $song, 'comments' => $comment->get()]);

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

    public function store_second(Request $request, Song $song, Message $message)
    {
        
        $comment = new Comment();
        $comment->song_id = $song->id;
        $comment->body = $request->body;
        //$comment->audio = $request->audio;
        $comment->user_id = Auth::user()->id;
        //dd($request);
        //dd($request->body);
        $audio_url = Cloudinary::upload($request->file('audio')->getRealPath(), ['resource_type' => 'video'])->getSecurePath();
        $comment->audio = $audio_url;
        $song->comments()->save($comment);


        return redirect('/home')->with(['messages' => $message, 'comments' => $comment->get()]);
    }
}
