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
use App\Http\Requests\SongRequest;

class SongController extends Controller
{
    public function index(Comment $comment, Song $song, User $user)
    {
        //ログインユーザーに関連する投稿データの表示
        $auth = auth()->user()->id;
        $user = User::where('id', $auth)->first(); 
        $song = $user->songs()->latest()->paginate(5);
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
        //中間テーブルmelody_songリレーション
        $input_song = $request['song'];
        $input_melodies = $request->melodies_array; 
        $song->fill($input_song)->save();
        $song->melodies()->attach($input_melodies); 
        
        //中間テーブルsong_statusリレーション
        $input_song = $request['song'];
        $input_statuses = $request->statuses_array;
        $song->fill($input_song)->save();
        $song->statuses()->attach($input_statuses); 
        
        //中間テーブルsong_userリレーション(user(アーティストとリスナー)は互いに多対多の関係であり、userとsong(投稿データ)も多対多の関係)
        $user = Auth::id();
        $song->users()->attach($user);  
        
        //動画登録:cloudinaryへ保存
        $input = $request['song'];
        $movie_url = Cloudinary::upload($request->file('movie')->getRealPath(), ['resource_type' => 'video',])->getSecurePath(); 
        $input += ['movie' => $movie_url];
        $song->fill($input)->save();
        
        return redirect('/songs/' . $song->id);
    }
    
    public function edit(Song $song, Melody $melody, Status $status)
    {
        return view('songs/edit')->with(['song' => $song])->with(['melodies' => $melody->get()])->with(['statuses' => $status->get()]);
    }
    
    public function update(Request $request, Song $song, Melody $melody, Status $status)
    {
        //中間テーブルmelody_songリレーション
        $input_song = $request['song'];
        $input_melodies = $request->melodies_array; 
        $song->fill($input_song)->save();
        $song->melodies()->sync($input_melodies); 
        
        //中間テーブルsong_statusリレーション
        $input_song = $request['song'];
        $input_statuses = $request->statuses_array;
        $song->fill($input_song)->save();
        $song->statuses()->sync($input_statuses); 
        
        //動画登録:cloudinaryへ保存
        $input = $request['song'];
        if($request->hasFile('movie')){
            $movie_url = Cloudinary::upload($request->file('movie')->getRealPath(), ['resource_type' => 'video',])->getSecurePath(); 
            $input += ['movie' => $movie_url];
        }
        $song->fill($input)->save();
        
        return redirect('/songs/' . $song->id);

    }
    
    public function select(User $user)
    {   
        //ログインユーザー以外のユーザー情報(プロフィール記入時の情報)を表示
        $user = User::where("id" , "!=" , Auth::user()->id);
        return view('songs/select')->with(['users'=> $user->get()]);
    }
    

    
}
