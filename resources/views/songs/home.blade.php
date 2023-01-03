<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('ホーム画面') }}
        </h2>
    </x-slot>
    
    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-blue-50 overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 bg-white border-b border-gray-200 ">
                    <div class='body'>
                        @foreach($messages as $message)
                            <div class='message'>
                                <div class='space-y-4'>
                                    <div class='movie'>
                                        <video controls preload='auto'>
                                            <source src="{{$message->song->movie}}">
                                        </video>
                                    </div>
                                    <div class='grid md:grid-cols-4 gap-8 lg:gap-12'>
                                        <div class='song-name'>
                                            <p class='font-extrabold text-2xl'>{{ $message->song->name}}</p>
                                        </div>
                                        <div class='song-melody'>
                                            @foreach($message->song->melodies as $melody)   
                                                <p class='font-semibold'>[今風・エモい・楽しい・シネマティック]</p>
                                                <p class='inline-flex items-center justify-center rounded-md border border-transparent bg-sky-600 px-2 py-2 text-base font-medium text-white'>{{ $melody->name }}</p> 
                                            @endforeach
                                        </div>
                                        <div class='song-status'>
                                            @foreach($message->song->statuses as $status)   
                                                <p class='font-semibold'>[編集可・編集不可・アドバイスください]</p>
                                                <p class='inline-flex items-center justify-center rounded-md border border-transparent bg-sky-600 px-2 py-2 text-base font-medium text-white'>{{ $status->name }}</p> 
                                            @endforeach
                                        </div>
                                        <div class='users'>
                                            @foreach($users->where('id', $message->user_id) as $user)
                                                <div class='user_name flex justify-center font-semibold'>
                                                    {{ $user->name }}
                                                </div>
                                                <div class='image flex justify-center'>
                                                    <img src='{{ $user->image }}' width='100' height='100' class='rounded-full h-16 w-16 flex m-2'>
                                                </div>
                                                <div class='sns'>
                                                    SNS:{{ $user->sns }}
                                                </div>
                                            @endforeach
                                        </div>
                                    </div>
                                </div>
                                <div class='space-y-4'>
                                    <div class='gap-4 space-y-1'>
                                        @foreach($users->where('id', $message->user_id) as $user)
                                            <h2 class='font-extrabold'>アーティスト概要</h2>
                                            <div class='overview bg-gray-100 rounded-lg relative p-5 pt-8'>
                                                <p>{{ $user->overview }}</p>
                                            </div>
                                        @endforeach   
                                        <h2 class='font-extrabold'>メッセージ</h2>
                                        <div class = "messages bg-gray-100 rounded-lg relative p-5 pt-8">
                                            <p>{{$message->body}}</p>
                                        </div>
                                        <h2 class='font-extrabold'>曲の作成背景</h2>
                                        <div class='background bg-gray-100 rounded-lg relative p-5 pt-8'>
                                            <p>{{ $message->song->background }}</p>
                                        </div>
                                        <h2 class='font-extrabold'>曲の概要</h2>
                                        <div class='overview bg-gray-100 rounded-lg relative p-5 pt-8'>
                                            <p>{{ $message->song->overview }}</p>
                                        </div>
                                    </div>
                                    <div class="comment-post ">    <!-- コメント欄実装 -->
                                        <h1 class='font-extrabold'>コメント欄</h1>
                                        <form action="/songs/{{ $message->song->id }}/comment/second" method="POST" enctype="multipart/form-data">
                                            @csrf
                                            <div class='comments bg-gray-100 rounded-lg relative p-5 pt-8'>
                                                <div class='comment'>
                                                    <textarea type='text' name='body' placeholder='コメント投稿' value='{{ old("comment.body")}}' class='block p-2.5 w-full text-sm text-gray-900 bg-gray-50 rounded-lg border border-gray-300 focus:ring-blue-500 focus:border-blue-500 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500'>{{old('body')}}</textarea>
                                                    <p class="background__error" style="color:red">{{ $errors->first('comment.body') }}</p>
                                                </div>
                                                <div class='file'>
                                                    <input type='file' name='audio'>
                                                    <div class='flex flex-row-reverse'>
                                                        <button type='submit' class="inline-flex items-center justify-center rounded-md border border-transparent bg-indigo-600 px-2 py-2 text-base font-medium text-white">add</button>
                                                    </div>
                                                </div>
                                            </div>
                                        </form>
                                    </div>
                                </div>
                                @if($comments)                                  
                                    <div class="w-300 flex flex-col space-y-4 overflow-scroll p-3 h-64 bg-gray-100 rounded-lg relative p-5 pt-8">
                                        @foreach($comments->where('song_id', $message->song_id) as $comment)  <!--foreachで先にmessageを回してるからそれに関連するcommentを回すときにwhereで制限かける。上でforeach回してもうmessageに関連ついているからmessage->commentとかはしなくていい-->
                                            <div>
                                                <li>{{ $comment->body }}</li>
                                                @if($comment->audio)
                                                    <video controls preload="auto">
                                                        音声：<source src="{{$comment->audio}}" width='100' height='100'>
                                                    </video>
                                                @endif
                                            </div>
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