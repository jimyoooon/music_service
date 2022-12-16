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
                        @foreach($users as $user)
                            <div class='content'>
                                <h1>名前：{{ $user->name }}</h1>
                            </div>
                            <div class='body'>
                                <h1>年齢：{{ $user->age }}</h1>
                            </div>
                                <p>写真：{{ $user->image }}</p>
                                <P>どんな曲を聴きたい？：{{ $user->additional_question}}</P>
                                <p>今の気分：{{ $user->feeling }}</p>
                                <p>概要：{{ $user->overview }}</p>
                                <p>SNS：{{ $user->sns }}</p>
                                <a href='songs/send'>[このユーザーに送る]</a>
                                <p>--------------------------------------</p>
                            </div>
                        @endforeach
                    </div>                            
                </div>
            </div>
        </div>
    </div>
</x-app-layput>