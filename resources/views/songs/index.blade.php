<!DOCTYPE html>
<x-app-layout>
    <x-slot name="header">
        <div class='space-y-4'>
            <div>
                <h2 class="font-semibold text-xl text-gray-800 leading-tight">
                    {{ __('投稿ホーム画面') }}
                </h2>
            </div>
            <div>
                <a href='/songs/create' class='footer bg-white hover:bg-gray-100 text-gray-800 font-semibold py-1 px-1 border border-gray-400 rounded shadow'>投稿画面へ</a>
            </div>
        </div>
    </x-slot>
    
    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 bg-white border-b border-gray-200">
                    <div class='body'>
                        <div class='profile'>
                            @foreach ($songs as $song)
                                <div class='space-y-4'>
                                    <div>
                                        <a href="/songs/{{ $song->id }}" class='footer bg-white hover:bg-gray-100 text-gray-800 font-semibold py-1 px-1 border border-gray-400 rounded shadow'>[詳細画面・編集画面へ]</a>
                                    </div>
                                    <div class='space-y-4'>
                                        <div class='space-y-4'>
                                            <div class='movie'>
                                                <video controls preload='auto'>
                                                    <source src="{{$song->movie}}" width='300' height='200'>
                                                </video>
                                            </div>
                                            <div class='grid md:grid-cols-4 gap-8 lg:gap-12'>
                                                <div class='name'> 
                                                    <p class='font-extrabold text-2xl'>{{ $song->name }}</p>
                                                </div>
                                                <!--中間テーブルリレーション-->
                                                <div class='melody'>
                                                    @foreach($song->melodies as $melody)   
                                                        <p class='font-extrabold'>[今風・エモい・楽しい・シネマティック]</p>
                                                        <p class='inline-flex items-center justify-center rounded-md border border-transparent bg-sky-600 px-2 py-2 text-base font-medium text-white'>{{ $melody->name }}</p> 
                                                    @endforeach
                                                </div>
                                                <div class='status'>
                                                    @foreach($song->statuses as $status)   
                                                        <p class='font-extrabold'>[編集可・編集不可・アドバイスください]</p>
                                                        <p class='inline-flex items-center justify-center rounded-md border border-transparent bg-sky-600 px-2 py-2 text-base font-medium text-white'>{{ $status->name }} </p>
                                                    @endforeach
                                                </div>
                                            </div>
                                        </div>
                                        <div class='space-y-2'>
                                            <div class='gap-4 space-y-1'>
                                                <h2 class='font-extrabold'>曲の作成背景</h2>
                                                <div class='background bg-gray-100 rounded-lg relative p-5 pt-8 rounded-lg border border-gray-300'>
                                                    <p>{{ $song->background }}</p>
                                                </div>
                                                <h2 class='font-extrabold'>曲の概要</h2>
                                                <div class='overview bg-gray-100 rounded-lg relative p-5 pt-8 rounded-lg border border-gray-300'>
                                                    <p>{{ $song->overview }}</p>
                                                </div>
                                            </div>
                                            <div>
                                                <h2 class='font-extrabold'>コメント欄</h2>
                                                <form method='POST' action='/songs/{{ $song->id }}/comment' enctype="multipart/form-data">
                                                    @csrf
                                                    <div class='bg-gray-100 rounded-lg relative p-5 pt-8'>
                                                        <div class='comments'>
                                                            <textarea type='text' name='body' placeholder='コメント投稿' value='{{ old("comment.body")}}' class='block p-2.5 w-full text-sm text-gray-900 bg-gray-50 rounded-lg border border-gray-300 focus:ring-blue-500 focus:border-blue-500 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500'>{{old('body')}}</textarea>
                                                            <p class="background__error" style="color:red">{{ $errors->first('comment.body') }}</p>
                                                        </div>
                                                        <div class='audio'>
                                                            <input type='file' name='audio'>
                                                            <div class='flex flex-row-reverse'>
                                                                <button type='submit' class="inline-flex items-center justify-center rounded-md border border-transparent bg-indigo-600 px-2 py-2 text-base font-medium text-white">add</button>                            
                                                            </div>
                                                        </div>
                                                    </div>
                                                </form>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                @if($comments)
                                    <!--SongテーブルのidとCommentテーブルのsong_idが一致した場合、その曲に対するコメントのみ表示-->
                                    <div class="w-300 flex flex-col space-y-4 overflow-scroll p-3 h-64 bg-gray-100 rounded-lg relative p-5 pt-8">
                                        @foreach($comments->where('song_id', $song->id) as $comment)
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
                                @endif                          
                                
                                <p>-------------------------------</p>
                            @endforeach
                            <div class="paginate font-extrabold">
                                <button class='border-t-2'>{{ $songs->links('pagination::tailwind') }}</button>
                            </div>                            
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</x-app-layput>
