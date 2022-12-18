<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Song;
use App\Models\User;
use Illuminate\Support\Facades\Auth;
use Cloudinary; 
use App\Models\Comment;
use App\Models\Message;


class SendController extends Controller
{
    public function send(Request $request, Song $song, User $user)
    {
        $auth = auth()->user()->id;                        //ログインユーザーのid取得
        $user = User::where('id', $auth)->first();         
        $song = $user->songs();    //そのユーザーが投稿した曲のみ取り出す
        $input_user = $request->input('send_user_id');
        $request->session()->put('send_user_id', $input_user);
        return view('songs/send')->with(['songs' => $song->get()]);
    }
    
    public function store(Request $request, Message $message)
    {
        $test = $request->session()->get('send_user_id');
        $user = Auth::id();                     //user_id取得
        $input_message = $request['message'];
        $message->send_user_id = $test;

        $message->fill($input_message)->save(); 
        
        return redirect('/index');        
    }
    
    public function home(Message $message)
    {
        //if(auth()->user()->id == message()->send_user_id){
            //return view('songs/home')->with(['messages' => $message->get()]);}
        //$message = Message::find(2);
        //$message = Message::find(2);
        $message = Message::where('send_user_id', auth()->user()->id);
        //dd($message);
        return view('songs/home')->with(['messages' => $message->get()]);
    }
    


}
