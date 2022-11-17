<!DOCTYPE HTML>
<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('プロフィール') }}
        </h2>
    </x-slot>
    
    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 bg-white border-b border-gray-200">
                    <div class='body'>
                        @foreach ($users as $user)
                        <a href="/users/{{ $user->id }}">名前：{{ Auth::user()->name }} さん、こんにちは。</a>
                        @endforeach
                    </div>
                    <div class="footer">
                        <a href="/index">戻る</a>
                    </div>
                </div>
            </div>
        </div>
    </div>
</x-app-layput>
