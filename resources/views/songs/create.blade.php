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
                    <div class='flex flex-col space-y-4'>
                        <form method='POST' action="/songs" enctype="multipart/form-data">
                            @csrf
                            <div class='space-y-4'>
                                <div class="title">
                                    <h2 class='font-extrabold'>曲名</h2>
                                    <input type="text" name="song[name]" placeholder="曲名" value="{{old("song.name") }}" class="block p-2.5 w-full text-sm text-gray-900 bg-gray-50 rounded-lg border border-gray-300 focus:ring-blue-500 focus:border-blue-500 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"/>
                                    <p class="name__error" style="color:red">{{ $errors->first('song.name') }}</p>
                                </div>
                                <div class="body">
                                    <h2 class='font-extrabold'>曲の作成背景</h2>
                                    <textarea name="song[background]" placeholder="曲の作成背景" rows="4" class="block p-2.5 w-full text-sm text-gray-900 bg-gray-50 rounded-lg border border-gray-300 focus:ring-blue-500 focus:border-blue-500 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500">{{old("song.background") }}</textarea>
                                    <p class="background__error" style="color:red">{{ $errors->first('song.background') }}</p>
                                </div>
                                <div class="body">
                                    <h2 class='font-extrabold'>曲の概要</h2>
                                    <textarea name="song[overview]" placeholder="曲の概要" rows="4" class="block p-2.5 w-full text-sm text-gray-900 bg-gray-50 rounded-lg border border-gray-300 focus:ring-blue-500 focus:border-blue-500 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500">{{old("song.overview") }}</textarea>
                                    <p class="overview__error" style="color:red">{{ $errors->first('song.overview') }}</p>
                                </div>
                                <div class="body">
                                    <h2 class='font-extrabold'>動画登録</h2>
                                        <div class='movie grid md:grid-cols-2 gap-8 lg:gap-12' style="border: solid 3px #333; ">
                                            <div>
                                                <h1 class='text-red-500'>注意事項</h1>
                                                <p>・動画付きのファイルである</p>
                                                <p>・動画が画像でも可</p>
                                            </div>
                                            <div>
                                                <input type='file' name='movie' value='{{ old("movie")}}'>
                                                <p class="movie__error" style="color:red">{{ $errors->first('movie') }}</p>
                                            </div>
                                        </div>
                                </div>
                                <div class="melodies">
                                    <h2 class='font-extrabold'>曲調</h2>
                                        @foreach($melodies as $melody)
                                            <label>
                                                <input type="radio" value="{{ $melody->id }}" name="melodies_array[]">
                                                    {{$melody->name}}
                                                </input>
                                            </label>
                                        @endforeach         
                                </div>
                                <div class="status">
                                    <h2 class='font-extrabold'>ステータス</h2>
                                        @foreach($statuses as $status)
                                            <label>
                                                <input type="radio" value='{{ $status->id}}' name="statuses_array[]">
                                                    {{$status->name}}
                                                </input>
                                            </label>
                                        @endforeach
                                </div>
                                <div class='flex flex-row-reverse'>
                                    <button type="submit" class="inline-flex items-center justify-center rounded-md border border-transparent bg-indigo-600 px-2 py-2 text-base font-medium text-white">アップロード</button>
                                </div>
                            </div>
                        </form>
                    </div>
                    <div class="footer">
                        <a href="/index" class='footer bg-white hover:bg-gray-100 text-gray-800 font-semibold py-1 px-1 border border-gray-400 rounded shadow'>[戻る]</a>
                    </div>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>


