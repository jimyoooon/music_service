<!DOCTYPE html>
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
                        <div class='profile'>
                            @foreach ($users as $user)
                                <a href="/users/{{ $user->id }}">名前：{{ $user->name }}</a>
                                <p class='age'>年齢：{{ $user->age }}</p>
                                <p class='image'>写真：{{ $user->image }}</p>
                                <p class='additional_question'>どんな曲を聴きたい？：{{ $user->additional_question }}</p>
                                <p class='feeling '>今の気分：{{ $user->feeling }}</p>
                                <p class='overview'>概要：{{ $user->overview }}</p>
                                <p class='sns'>SNS：{{ $user->sns }}</p>
                            @endforeach
                        </div>
                        <a href='/users/create'>[create]</a>
                        <div class='paginate'>
                            {{ $users->links() }}
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</x-app-layput>

