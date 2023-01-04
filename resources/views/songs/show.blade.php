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
                    <div class='body space-y-4'>
                        <div class='space-y-4'>
                            <div class='movie'>
                                <video controls preload='auto'>
                                    <source src="{{$song->movie}}" width='300' height='200'>
                                </video>
                            </div>
                            <div class='grid md:grid-cols-4 gap-8 lg:gap-12'>
                                <div class='song-name'>
                                    <p class='font-extrabold text-2xl'>{{ $song->name }}</p>
                                </div>
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
                        <div class='gap-4 space-y-1'>
                            <p class='font-extrabold'>曲の作成背景</p>
                            <div class='background bg-gray-100 rounded-lg relative p-5 pt-8 rounded-lg border border-gray-300'>
                                <p>{{ $song->background }}</p>
                            </div>
                            <p class='font-extrabold'>曲の概要</p>
                            <div class='background bg-gray-100 rounded-lg relative p-5 pt-8 rounded-lg border border-gray-300'>
                                <p>{{ $song->overview }}</p>
                            </div>
                        </div>
                    </div>
                    <div class='flex flex-row-reverse space-y-4'>
                        <p class="edit space-y-4 inline-flex items-center justify-center rounded-md border border-transparent bg-sky-600 px-1 py-1 text-base font-medium text-white"><a href="/songs/{{ $song->id }}/edit">edit</a></p>
                    </div>
                    <div class="footer">
                        <a href="/index" class='footer bg-white hover:bg-gray-100 text-gray-800 font-semibold py-1 px-1 border border-gray-400 rounded shadow'>戻る</a>
                    </div>
                </div>
            </div>
        </div>
    </div>
</x-app-layput>