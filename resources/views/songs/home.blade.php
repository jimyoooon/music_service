<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('ホーム画面') }}
        </h2>
    </x-slot>
    
    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-blue-50 overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 bg-blue-800 border-b border-gray-200">
                    <div class='body'>
                        @foreach($messages as $message)
                            <div class='content'>
                                <h2>送られてきた曲</h2>
                                <div class = 'name'>
                                    曲名：{{ $message->song->name}}
                                </div>
                                <div class = "messages">
                                    メッセージ: {{$message->body}}
                                </div>
                                <div class='path'>
                                    画像：<img src="{{$message->song->image}}" width='300' height='200'> <!--message モデルrelation -->
                                </div>
                                <div class='movie'>
                                    <video controls preload='auto'>
                                        動画：<source src="{{$message->song->movie}}" width='300' height='200'>
                                    </video>
                                </div>
                                <div class='audio'>
                                    <video controls preload="auto">
                                        音声：<source src="{{$message->song->audio}}" width='300' height='200'>
                                    </video>
                                </div>
                                    <div class="comment-post">        <!-- コメント欄実装 -->
                                        <h3>コメント投稿</h3>          
                                        <form action="/songs/{{ $message->song->id }}/comment/second" method="POST" enctype="multipart/form-data">
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
                                    </div>               
                                @if($comments)                                  
                                    <div class="comments">
                                        @foreach($comments->where('song_id', $message->song_id) as $comment)  <!--foreachで先にmessageを回してるからそれに関連するcommentを回すときにwhereで制限かける。上でforeach回してもうmessageに関連ついているからmessage->commentとかはしなくていい-->
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
                                @endif                                 <!-- コメント欄機能ここまで-->
                            </div>
                            <p>--------------------------------------</p>
                        @endforeach
                    </div>                            
                </div>
            </div>
        </div>
    </div>
</x-app-layput>