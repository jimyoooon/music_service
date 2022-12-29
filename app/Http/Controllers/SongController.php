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
use App\Http\Requests\SongRequest;

class SongController extends Controller
{
    public function index(Comment $comment, Song $song, User $user)
    {
        
        $auth = auth()->user()->id;
        $user = User::where('id', $auth)->first();  //usersテーブルの中でidとログインユーザーのidが一致しているモノの一番初めのユーザーを取ってくる＝一人しかいない
        $song = $user->songs()->latest()->paginate(1);
        return view('songs/index')->with(['songs' => $song, 'comments' => $comment->get()->sortByDesc('created_at')]);

    }
    
    public function show(Song $song, Comment $comment)
    {
        return view('songs/show')->with(['song' => $song])->with(['comments' => $comment]);
    }

    public function create(Melody $melody, Status $status, Song $song)
    {
        
        return view('songs/create')->with(['melodies' => $melody->get()])->with(['statuses' => $status->get()]);
    }
    
    public function store(SongRequest $request, Song $song)
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
        $movie_url = Cloudinary::upload($request->file('movie')->getRealPath(), ['resource_type' => 'video',])->getSecurePath(); 
        $audio_url = Cloudinary::upload($request->file('audio')->getRealPath(), ['resource_type' => 'video',])->getSecurePath(); 
        $input += ['image' => $image_url];
        $input += ['movie' => $movie_url];
        $input += ['audio' => $audio_url];                                       //画像,音声,動画登録
        
        $song->fill($input)->save();
        
        return redirect('/songs/' . $song->id);
    }
    
    public function edit(Song $song, Melody $melody, Status $status)
    {
        return view('songs/edit')->with(['song' => $song])->with(['melodies' => $melody->get()])->with(['statuses' => $status->get()]);
    }
    
    public function update(Request $request, Song $song, Melody $melody, Status $status)
    {
        $input_song = $request['song'];
        $input_melodies = $request->melodies_array; 
        $song->fill($input_song)->save();
        $song->melodies()->sync($input_melodies);  //中間テーブルmelodyタグリレーション
        
        
        $input_song = $request['song'];
        $input_statuses = $request->statuses_array;
        $song->fill($input_song)->save();
        $song->statuses()->sync($input_statuses); //中間テーブルstatusタグリレーション
        
        //$user = Auth::id();
        //$song->users()->attach($user);  //中間テーブルsong_userリレーション
        $input = $request['song'];
        $image_url = Cloudinary::upload($request->file('image')->getRealPath())->getSecurePath(); 
        $movie_url = Cloudinary::upload($request->file('movie')->getRealPath(), ['resource_type' => 'video',])->getSecurePath(); 
        $audio_url = Cloudinary::upload($request->file('audio')->getRealPath(), ['resource_type' => 'video',])->getSecurePath(); 
        $input += ['image' => $image_url];
        $input += ['movie' => $movie_url];
        $input += ['audio' => $audio_url];                                       //画像,音声,動画登録
        
        $song->fill($input)->save();
        
        return redirect('/songs/' . $song->id);

    }
    
    public function select(User $user)
    {   
        //$user=User::where('overview', null)->where('sns', null)->get();
        $user = User::where("id" , "!=" , Auth::user()->id);
        return view('songs/select')->with(['users'=> $user->get()]);
    }
    

    
}
