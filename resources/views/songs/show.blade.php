<!DOCTYPE html>
<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('投稿詳細画面') }}
        </h2>
    </x-slot>
    
    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 bg-white border-b border-gray-200">
                    <div class='body'>
                        <p>名前：{{ $song->name }}</p>
                        <P>曲の作成背景：{{ $song->background }}</P>
                        <p>曲の概要：{{ $song->overview }}</p>
                        <div class='image'>
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
                    </div>
                    <p class="edit">[<a href="/songs/{{ $song->id }}/edit">edit</a>]</p>
                    <div class="footer">
                        <a href="/index">戻る</a>
                    </div>
                </div>
            </div>
        </div>
    </div>
</x-app-layput>