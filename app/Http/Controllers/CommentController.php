<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\Comment;
use App\Models\Song;
use App\Models\User;
use App\Models\Message;
use Cloudinary; 
use Storage;
use App\Http\Requests\CommentRequest;


class CommentController extends Controller
{
    //アーティストが投稿画面でコメントを書き込む際の保存処理
    public function store(CommentRequest $request, Comment $comment, Song $song)
    {
        $comment = new Comment();
        $comment->song_id = $song->id;
        $comment->body = $request->body;
        $comment->user_id = Auth::user()->id;
        
        //編曲した動画ファイルなどはコメントに投稿してもしなくてもいい
        if($request->hasFile('audio')){
            $audio_url = Cloudinary::upload($request->file('audio')->getRealPath(), ['resource_type' => 'video'])->getSecurePath();
            $comment->audio = $audio_url;
        }
        $song->comments()->save($comment);

        return redirect('/index')->with(['song' => $song, 'comments' => $comment->get()]);

    }

    //リスナーがホーム画面でレコメンド曲に対しのコメントを書き込む際の保存処理
    public function store_second(CommentRequest $request, Song $song, Message $message)
    {
        
        $comment = new Comment();
        $comment->song_id = $song->id;
        $comment->body = $request->body;
        $comment->user_id = Auth::user()->id;
        
        if($request->hasFile('audio')){
            $audio_url = Cloudinary::upload($request->file('audio')->getRealPath(), ['resource_type' => 'video'])->getSecurePath();
            $comment->audio = $audio_url;
        }
        $song->comments()->save($comment);

        return redirect('/home')->with(['messages' => $message, 'comments' => $comment->get()]);
    }
}
