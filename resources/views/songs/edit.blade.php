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
                        <div class="content">
                            <form action="/songs/{{ $song->id }}" method="POST" enctype="multipart/form-data">
                                @csrf
                                @method('PUT')
                                <div class='content__body space-y-4'>
                                    <div>
                                        <h2 class='font-extrabold'>曲名</h2>
                                        <input type='text' name='song[name]' value="{{ $song->name }}" class="block p-2.5 w-full text-sm text-gray-900 bg-gray-50 rounded-lg border border-gray-300 focus:ring-blue-500 focus:border-blue-500 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500">
                                    </div>
                                    <div>
                                        <h2 class='font-extrabold'>曲の制作背景</h2>
                                        <textarea type='text' name='song[background]' value="{{ $song->background }}" class="block p-2.5 w-full text-sm text-gray-900 bg-gray-50 rounded-lg border border-gray-300 focus:ring-blue-500 focus:border-blue-500 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500">{{old('song[background]', $song->background)}}</textarea>
                                    </div>
                                    <div>
                                        <h2 class='font-extrabold'>曲の概要</h2>
                                        <textarea type='text' name='song[overview]' value='{{ $song->overview }}' class="block p-2.5 w-full text-sm text-gray-900 bg-gray-50 rounded-lg border border-gray-300 focus:ring-blue-500 focus:border-blue-500 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500">{{ old('song[overview]', $song->overview)}}</textarea>
                                    </div>
                                    <div class="body">
                                        <h2 class='font-extrabold'>動画登録</h2>
                                            <div class='movie grid md:grid-cols-2 gap-8 lg:gap-12' style="border: solid 3px #333;">
                                                <div>
                                                    <h1 class='text-red-500'>注意事項</h1>
                                                    <p>・動画付きのファイルである</p>
                                                    <p>・動画が画像でも可</p>
                                                </div>
                                                <div>
                                                    <input type='file' name='movie' value='{{ $song->movie }}'>
                                                </div>
                                            </div>
                                    </div>
                                    <div class="melodies">
                                        <h2 class='font-extrabold'>[曲調]</h2>
                                            @foreach($melodies as $melody)
                                                <label>
                                                    <input type="radio" value="{{ $melody->id }}" name="melodies_array[]">
                                                        {{$melody->name}}
                                                    </input>
                                                </label>
                                            @endforeach         
                                    </div>
                                    <div class="status">
                                        <h2 class='font-extrabold'>[ステータス]</h2>
                                            @foreach($statuses as $status)
                                                <label>
                                                    <input type="radio" value='{{ $status->id}}' name="statuses_array[]" required>
                                                        {{$status->name}}
                                                    </input>
                                                </label>
                                            @endforeach
                                    </div>
                                </div>
                                <div class='flex flex-row-reverse'>
                                    <button type="submit" class='inline-flex items-center justify-center rounded-md border border-transparent bg-indigo-600 px-2 py-2 text-base font-medium text-white'>保存</button>
                                </div>
                            </form>
                        <div class="footer">
                            <a href="/songs/{{ $song->id }}" class='footer bg-white hover:bg-gray-100 text-gray-800 font-semibold py-1 px-1 border border-gray-400 rounded shadow'>戻る</a>
                        </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</x-app-layput>


