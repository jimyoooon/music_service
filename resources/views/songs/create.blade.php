<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('投稿作成画面') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 bg-white border-b border-gray-200">
                    <form method='POST' action="/songs" enctype="multipart/form-data">
                        @csrf
                        <div class="title">
                            <h2>Name</h2>
                            <input type="text" name="song[name]" placeholder="曲名" value="{{old("song.name") }}"/>
                            <p class="name__error" style="color:red">{{ $errors->first('song.name') }}</p>
                        </div>
                        <div class="body">
                            <h2>backgroud</h2>
                            <textarea name="song[background]" placeholder="曲の作成背景">{{old("song.background") }}</textarea>
                            <p class="background__error" style="color:red">{{ $errors->first('song.background') }}</p>
                        </div>
                        <div class="body">
                            <h2>overview</h2>
                            <textarea name="song[overview]" placeholder="曲の概要">{{old("song.overview") }}</textarea>
                            <p class="overview__error" style="color:red">{{ $errors->first('song.overview') }}</p>
                        </div>
                        <div class="body">
                            <div class='image'>
                                画像登録：<input type="file" name="image" value='{{ old("image")}}'>
                                 <p class="image__error" style="color:red">{{ $errors->first('image') }}</p>
                            </div>
                            <div class='movie'>
                                動画登録：<input type='file' name='movie' value='{{ old("movie")}}'>
                                 <p class="movie__error" style="color:red">{{ $errors->first('movie') }}</p>
                            </div>
                            <div class='audio'>
                                音声登録：<input type='file' name='audio' value='{{ old("audio")}}'> 
                                 <p class="audio__error" style="color:red">{{ $errors->first('audio') }}</p>
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
                        <input type="submit" value="<アップロード>">
                    </form>
                    <div class="footer">
                        <a href="/index">[戻る]</a>
                    </div>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>


