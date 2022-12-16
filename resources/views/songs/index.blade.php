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
                                <a href="/songs/{{ $song->id }}">名前：{{ $song->name }}</a>
                                <p class='background'>曲の作成背景：{{ $song->background }}</p>
                                <p class='overview'>曲の概要：{{ $song->overview }}</p>
                                <div class='audio'>
                                    音声：<img src="{{$song->audio}}">
                                </div>
                                画像：<img src="{{$song->image}}">
                                動画：<img src="{{$song->movie}}">
                                <h5 class='melody'>
                                    @foreach($song->melodies as $melody)   
                                        メロディー：{{ $melody->name }}
                                    @endforeach
                                </h5>
                                <h5 class='status'>
                                    @foreach($song->statuses as $status)   
                                        メロディー：{{ $status->name }}
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
