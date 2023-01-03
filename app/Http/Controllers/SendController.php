<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Song;
use App\Models\User;
use Illuminate\Support\Facades\Auth;
use Cloudinary; 
use App\Models\Comment;
use App\Models\Reply;
use App\Models\Message;
use App\Http\Requests\MessageRequest;



class SendController extends Controller
{
    public function send(Request $request, Song $song, User $user)    
    {
        $auth = auth()->user()->id;                        //ログインユーザーのid取得
        $user = User::where('id', $auth)->first();         
        $song = $user->songs();    //そのユーザーが投稿した曲のみ取り出す
        $input_user = $request->input('send_user_id');
        session(['send_user_id' => $input_user]);
        
        
        return view('songs/send')->with(['songs' => $song->get()]);
    }
    
    public function store(Request $request, Message $message) 
    {
        //$test = $request->session()->get('send_user_id');
        //$user = Auth::id();                     //user_id取得
        //$input_message = $request['message'];
        //$message->send_user_id = $test;

        //$message->fill($input_message)->save(); 
        
        //return redirect('/index');
        
        $now_date = date('Y-m-d');
        //dd($now_date);
        $user_count = Message::where('user_id', auth()->user()->id)->where('created_at', 'like', $now_date.'%')->count();
        //dd($user_count);
        if($user_count <= 9){
        $validated = $request->validateWithBag('error', [
        'message.song_id' => 'required',
        'message.body' => 'required',
        ]);
        
        $test = session('send_user_id');
        $user = Auth::id();
        $message->user_id = $user;//user_id取得
        $input_message = $request['message'];
        //dd($input_message);
        $message->send_user_id = $test;

        $message->fill($input_message)->save(); 
        

        return redirect('/index')->withErrors($validated, 'error');       
        }else{
            return redirect('/home');
            
        }
    }
    
    public function home(Message $message, Comment $comment, Song $song, User $user)  //Comment, Song = comment関連
    {
        $message = Message::where('send_user_id', auth()->user()->id);
        //$comment = Comment::where('song_id', $message->song_id);  //Messagesテーブルからsend_user_idに送られてきた曲のidに
        return view('songs/home')->with(['messages' => $message->get()->sortByDesc('created_at'), 'songs' => $song->get(), 'comments' => $comment->get()->sortByDesc('created_at'), 'users' => $user->get()]); //コメント機能実装前
    }


}
