<!DOCTYPE html>
<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('選択画面') }}
        </h2>
    </x-slot>
    
    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 bg-white border-b border-gray-200">
                    <div class='body'>
                        <div class='songs'>
                            @foreach($songs as $song)
                                <p>名前：{{ $song->name }}</p>
                                <P>曲の作成背景：{{ $song->background }}</P>
                                <p>曲の概要：{{ $song->overview }}</p>
                                <P>音声ファイル：{{ $song->audio}}</P>
                                <img src="{{$song->image}}">
                            @endforeach
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</x-app-layput>

