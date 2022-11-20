<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Song;


class SongController extends Controller
{
    public function index(Song $song)
    {
        return view('songs/index')->with(['songs' => $song->getPaginateByLimit(1)]); 
    }
    
    public function show(Song $song)
    {
        return view('songs/show')->with(['song' => $song]);
    }

    public function create(Song $song)
    {
        return view('songs/create');
    }
    
    public function store(Request $request, Song $song)
    {
        $input = $request['song'];
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
}
