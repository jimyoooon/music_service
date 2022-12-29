<!DOCTYPE html>
<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('投稿ホーム画面') }}
        </h2>
    </x-slot>
    
    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 bg-white border-b border-gray-200">
                    <div class='body'>
                        <a href='/songs/create'>[create]</a>
                        <div class='profile'>
                            @foreach ($songs as $song)
                                <a href="/songs/{{ $song->id }}">[詳細画面へ]</a>
                                <p class='name'> 名前：{{ $song->name }}</p>
                                <p class='background'>曲の作成背景：{{ $song->background }}</p>
                                <p class='overview'>曲の概要：{{ $song->overview }}</p>
                                <div class='path'>
                                    画像：<img src="{{$song->image}}" width='300' height='200'>
                                </div>
                                <div class='movie'>
                                    <video controls preload='auto'>
                                        動画：<source src="{{$song->movie}}" width='300' height='200'>
                                    </video>
                                </div>
                                <div class='audio'>
                                    <video controls preload="auto">
                                        音声：<source src="{{$song->audio}}" width='300' height='200'>
                                    </video>
                                </div>
                            <h1>コメント入力</h1>             <!--コメント機能 -->
                            <ul>
                                <li>
                                    <form method='POST' action='/songs/{{ $song->id }}/comment' enctype="multipart/form-data">
                                        @csrf
                                        <input type='text' name='body' value='{{ old("comment.body")}}'>
                                        <p class="background__error" style="color:red">{{ $errors->first('comment.body') }}</p>
                                        <!--画像登録  -->
                                        <div class='audio'>
                                            <input type='file' name='audio'>
                                        </div>
                                        <!--画像登録  -->
                                        <button type='submit'>add</button>                            
                                    </form>
                                </li>
                            </ul>
                                @if($comments)
                                    <div class="comments">
                                        @foreach($comments->where('song_id', $song->id) as $comment)         <!--foreachで先にmessageを回してるからそれに関連するcommentを回すときにwhereで制限かける。上でforeach回してもうmessageに関連ついているからmessage->commentとかはしなくていい-->
                                            <li>
                                                <div>{{ $comment->body }}</div>
                                                @if($comment->audio)
                                                    <video controls preload="auto">
                                                        音声：<source src="{{$comment->audio}}" width='100' height='100'>
                                                    </video>
                                                @endif
                                            </li>
                                        @endforeach
                                    </div>    
                                @endif                             <!--コメント機能  -->
                                
                                <h5 class='melody'>
                                    @foreach($song->melodies as $melody)   
                                        メロディー：{{ $melody->name }} 
                                    @endforeach
                                </h5>
                                <h5 class='status'>
                                    @foreach($song->statuses as $status)   
                                        ステータス：{{ $status->name }} 
                                    @endforeach
                                </h5>
                                <p>-------------------------------</p>
                                <div class='paginate'>
                                    {{ $songs->links() }}
                                </div>
                            @endforeach
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</x-app-layput>
