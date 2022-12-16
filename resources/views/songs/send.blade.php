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
                            <form method='POST' action="/messages" enctype="multipart/form-data">
                                @csrf
                                @foreach($songs as $song)
                                    <input type='radio' value="{{ $song->name}}" name="song">{{ $song->name }}
                                @endforeach
                                <div class="messages">
                                    <h2>メッセージ</h2>
                                    <input type="text" name="message[body]" placeholder="メッセージ入力" value="{{old("message.body") }}"/>
                                </div>
                                <input type="submit" value="<この曲を送る>">
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</x-app-layput>

