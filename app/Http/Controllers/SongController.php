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

class SongController extends Controller
{
    public function index(Song $song, User $user)
    {
        $auth = auth()->user()->id;
        $user = User::where('id', $auth)->first();
        return view('songs/index')->with(['songs' => $song->getPaginateByLimit(10)])->with(['users' => $user]);
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
        $song->melodies()->attach($input_melodies); 
        
        $input_song = $request['song'];
        $input_statuses = $request->statuses_array;
        $song->fill($input_song)->save();
        $song->statuses()->attach($input_statuses);
        
        
        $input = $request['song'];
        $image_url = Cloudinary::upload($request->file('image')->getRealPath())->getSecurePath(); 
        $input += ['image' => $image_url];
        $movie_url = Cloudinary::upload($request->file('movie')->getRealPath())->getSecurePath(); 
        $input += ['movie' => $movie_url];
        $audio_url = Cloudinary::upload($request->file('audio')->getRealPath())->getSecurePath(); 
        $input += ['audio' => $audio_url];

        
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
        $song = new Song;
        $form = $request->all();
        $image = $request->file('image');
        $path = Storage::disk('s3')->putFile('myprefix', $image, 'public');
        $song->image = Storage::disk('s3')->url($path);

        $song->fill($input_song)->save();
        return redirect('/songs/' . $song->id);
        
    }
    
    public function select()
    {   
        $user=User::where('overview', null)->where('sns', null)->get();
        return view('songs/select')->with(['users'=> $user]);
    }
    
    public function home()
    {
        return view('songs/home');
    }
    
    public function test(Song $song)
    {
        return view('songs/test')->with(['songs' => $song]);
    }
}
