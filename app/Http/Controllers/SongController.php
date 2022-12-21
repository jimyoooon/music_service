<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Song;
use App\Models\Melody;
use App\Models\User;
use Storage;
use Illuminate\Support\Facades\Auth;
use Cloudinary; 
use App\Models\Status;
use App\Models\Comment;
use App\Models\Reply;
use App\Models\Message;

class SongController extends Controller
{
    public function index(Comment $comment, Song $song, User $user)
    {
        
        $auth = auth()->user()->id;
        $user = User::where('id', $auth)->first();
        $song = $user->songs()->paginate(1);
        $comment = Comment::where('song_id', '=', $song->id)->get();
        dd($comment);
        
        return view('songs/index')->with(['songs' => $song, 'comments' => $comment->get()]);
        
        //$comment = Comment::where('song_id', '=', $song->id); //コメント機能
        //return view('songs/index')->with(['songs' => $song->get()])->with(['comments' => $comment->get()]); //コメント機能
        
    }
    
    public function show(Song $song, Comment $comment)
    {
        //$comment = Comment::where('song_id', '=', $song->id);
        return view('songs/show')->with(['song' => $song])->with(['comments' => $comment]);
    }

    public function create(Melody $melody, Status $status, Song $song)
    {
        
        return view('songs/create')->with(['melodies' => $melody->get()])->with(['statuses' => $status->get()]);
    }
    
    public function store(Request $request, Song $song)
    {
        $input_song = $request['song'];
        $input_melodies = $request->melodies_array; 
        $song->fill($input_song)->save();
        $song->melodies()->attach($input_melodies);  //中間テーブルmelodyタグリレーション
        
        
        $input_song = $request['song'];
        $input_statuses = $request->statuses_array;
        $song->fill($input_song)->save();
        $song->statuses()->attach($input_statuses); //中間テーブルstatusタグリレーション
        
        $user = Auth::id();
        $song->users()->attach($user);  //中間テーブルsong_userリレーション
        


        $input = $request['song'];
        $image_url = Cloudinary::upload($request->file('image')->getRealPath())->getSecurePath(); 
        $movie_url = Cloudinary::upload($request->file('movie')->getRealPath())->getSecurePath(); 
        $audio_url = Cloudinary::upload($request->file('audio')->getRealPath())->getSecurePath(); 
        $input += ['image' => $image_url];
        $input += ['movie' => $movie_url];
        $input += ['audio' => $audio_url];                                       //画像,音声,動画登録
        
        $song->fill($input)->save();
        
        return redirect('/songs/' . $song->id);
    }
    
    public function edit(Song $song)
    {
        return view('songs/edit')->with(['song' => $song]);
    }
    
    public function update(Request $request, Song $song)
    {
        $input_song = $request['song'];
        $song->fill($input_song)->save();
        return redirect('/songs/' . $song->id);
        
    }
    
    public function select(User $user)
    {   
        //$user=User::where('overview', null)->where('sns', null)->get();
        $user = User::where("id" , "!=" , Auth::user()->id);
        return view('songs/select')->with(['users'=> $user->get()]);
    }
    

    
}
