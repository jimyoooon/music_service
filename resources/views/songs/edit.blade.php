<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('投稿編集画面') }}
        </h2>
    </x-slot>
    
    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 bg-white border-b border-gray-200">
                    <div class='body'>
                        <h1 class="title">編集画面</h1>
                        <div class="content">
                            <form action="/songs/{{ $song->id }}" method="POST" enctype="multipart/form-data">
                                @csrf
                                @method('PUT')
                                <div class='content__body'>
                                    <h2>曲名</h2>
                                    <input type='text' name='song[name]' value="{{ $song->name }}">
                                    <h2>曲の制作背景</h2>
                                    <input type='text' name='song[background]' value="{{ $song->background }}">
                                    <h2>曲の概要</h2>
                                    <input type='text' name='song[overview]' value='{{ $song->overview }}'>
                                    <div class="body">
                                        <div class='image'>
                                            画像登録：<input type="file" name="image" value='{{ $song->image }}'>
                                        </div>
                                        <div class='movie'>
                                            動画登録：<input type='file' name='movie' value='{{ $song->movie }}'>
                                        </div>
                                        <div class='audio'>
                                            音声登録：<input type='file' name='audio' value='{{ $song->audio }}'>   
                                        </div>
                                    </div>
                                    <div class="melodies">
                                        <h2>[曲調]</h2>
                                            @foreach($melodies as $melody)
                                                <label>
                                                    <input type="radio" value="{{ $melody->id }}" name="melodies_array[]">
                                                        {{$melody->name}}
                                                    </input>
                                                </label>
                                            @endforeach         
                                    </div>
                                    <div class="status">
                                        <h2>[ステータス]</h2>
                                            @foreach($statuses as $status)
                                                <label>
                                                    <input type="radio" value='{{ $status->id}}' name="statuses_array[]">
                                                        {{$status->name}}
                                                    </input>
                                                </label>
                                            @endforeach
                                    </div>
                                    
                                </div>
                                <input type="submit" value="[保存]">
                            </form>
                        <div class="footer">
                            <a href="/songs/{{ $song->id }}">[戻る]</a>
                        </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</x-app-layput>


