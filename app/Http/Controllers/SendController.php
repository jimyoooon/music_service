<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Song;
use App\Models\User;
use Illuminate\Support\Facades\Auth;
use Cloudinary; 
use App\Models\Comment;
use App\Models\Message;
use App\Http\Requests\MessageRequest;



class SendController extends Controller
{
    public function send(Request $request, Song $song, User $user)    
    {
        //ログインユーザーが投稿した曲のみ表示
        $auth = auth()->user()->id;                        
        $user = User::where('id', $auth)->first();         
        $song = $user->songs();   
        //送信時の保存処理の際にsend_user_idを持たせておくために、sessionにて送る相手であるsend_userのidを保存
        $input_user = $request->input('send_user_id');
        session(['send_user_id' => $input_user]);
        
        
        return view('songs/send')->with(['songs' => $song->get()]);
    }
    
    public function store(Request $request, Message $message) 
    {
        //送信する際にsong_idだけでなくsend_user_idに対するメッセージも送ることができる
        
        //ユーザーは一日に10件までしか送信処理ができないという制限・24時になったらリセットされる
        
        //送信する際に取り出してくるMessageテーブルのuser_idと同じ日付のcreated_atの二つが1日に10件以上データベースに保存されている場合、処理が制限される
        $now_date = date('Y-m-d');
        $user_count = Message::where('user_id', auth()->user()->id)->where('created_at', 'like', $now_date.'%')->count();
        if($user_count <= 10){
            //function sendで保持していたsession
            $test = session('send_user_id');
            $user = Auth::id();
            $message->user_id = $user;
            $input_message = $request['message'];
            $message->send_user_id = $test;
            $message->fill($input_message)->save(); 
            
            return redirect('/index'); 
        }else{
            return redirect('/select')->with('successMessage', '一日10件の投稿回数を超えたため送信できません。24時にリセットされます');
            
        }
    }
    
    public function home(Message $message, Comment $comment, Song $song, User $user) 
    {
        //ログインユーザー宛てのmessageデータのみ降順で表示
        $message = Message::where('send_user_id', auth()->user()->id);
        return view('songs/home')->with(['messages' => $message->get()->sortByDesc('created_at'), 'songs' => $song->get(), 'comments' => $comment->get()->sortByDesc('created_at'), 'users' => $user->get()]); 
    }


}
