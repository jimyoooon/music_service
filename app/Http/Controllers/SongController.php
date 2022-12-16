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
use App\Models\Message;

class SongController extends Controller
{
    public function index(Song $song, User $user)
    {
        
        $auth = auth()->user()->id;
        $user = User::where('id', $auth)->first();
        $song = $user->songs()->paginate(1);
        return view('songs/index')->with(['songs' => $song]);
    }
    
    public function show(Song $song)
    {
        return view('songs/show')->with(['song' => $song]);
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
        $input += ['image' => $image_url];
        $movie_url = Cloudinary::upload($request->file('movie')->getRealPath())->getSecurePath(); 
        $input += ['movie' => $movie_url];
        $audio_url = Cloudinary::upload($request->file('audio')->getRealPath())->getSecurePath(); 
        $input += ['audio' => $audio_url];  //画像,音声,動画登録
        

        $song->fill($input)->save();
        
        return redirect('/songs/' . $song->id);
    }
    
    public function messages_store(Request $request, Message $message)
    {
        $user = Auth::id();
        $song = $user->songs();
        $send_user_id = 
        $input_message = $request['message'];
        dd($input_message);
        $message->fill($input_message)->save(); //曲とメッセージを送るときの保存処理(曲に関してはもうすでに設定してあるのでメッセージのみ）
        return view('songs/send' . $message->id);        
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
    
    public function select()
    {   
        $user=User::where('overview', null)->where('sns', null)->get();
        return view('songs/select')->with(['users'=> $user]);
    }
    
    public function home(Message $message)
    {
        return view('songs/home')->with(['messages' => $message]);
    }
    
    public function send(Song $song, User $user)
    {
        $auth = auth()->user()->id;
        $user = User::where('id', $auth)->first();
        $song = $user->songs();
        return view('songs/send')->with(['songs' => $song->get()]);
    }
    

    
}
