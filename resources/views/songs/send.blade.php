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
                                <div class='space-y-4'>
                                    <div class='song'>
                                        @foreach($songs as $song)
                                            <input type='radio' value="{{ $song->id}}" name="message[song_id]" required>{{ $song->name }}</input>
                                            <p class="message.song_id__error" style="color:red">{{ $errors->first('message[song_id]') }}</p>
                                        @endforeach
                                        <input type='hidden' value='{{auth()->user()->id}}' name='message[user]'>
                                    </div>
                                    <div class='movie grid md:grid-cols-1 gap-8 lg:gap-12' style="border: solid 3px #333; ">
                                        <div>
                                            <h1 class='text-red-500'>注意事項</h1>
                                            <p>・一日に10件までしか投稿できません</p>
                                            <p>・24時になったらリセットされます</p>
                                            <p>・送る曲と送る相手に対するメッセージは必ず選択・記入してください</p>
                                        </div>
                                    </div>
                                    <div class="messages">
                                        <h2>メッセージ</h2>
                                        <textarea type='text' name='message[body]' required placeholder="メッセージ入力" value="{{ old('message.body') }}" rows="4" class="block p-2.5 w-full text-sm text-gray-900 bg-gray-50 rounded-lg border border-gray-300 focus:ring-blue-500 focus:border-blue-500 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500">{{old("message[body]") }}</textarea>
                                        <p class="message.body__error" style="color:red">{{ $errors->first('message[body]') }}</p>
                                    </div>
                                </div>
                                <button type="submit" class='"inline-flex items-center justify-center rounded-md border border-transparent bg-indigo-600 px-2 py-2 text-base font-medium text-white"'>この曲を送る</button>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</x-app-layput>

