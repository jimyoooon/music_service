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
                        <form method ='POST' action='/songs/send'>
                        @csrf
                            @foreach($users as $user)
                                <div class='body'>
                                    <div class='grid md:grid-cols-2 gap-8 lg:gap-12'>
                                        <div class='space-y-12'>
                                            <h2><p class='font-extrabold'>名前:</p>{{ $user->name }}</h2>
                                            <h2><p class='font-extrabold'>年齢:</p>{{ $user->age }}</h2>
                                        </div>
                                    @if($user->image)
                                        <div class-'image'>
                                            <div class='font-extrabold'>画像：</div>
                                            <img src="{{$user->image}}" width='300' height='200'>
                                        </div>
                                    @endif
                                    </div>
                                    <div class='gap-4 space-y-4'>
                                        <p class='font-extrabold'>どんな曲を聴きたい？</p>
                                        <div class='bg-gray-100 rounded-lg relative p-5 pt-8'>
                                            <p>{{ $user->additional_question}}</p>
                                        </div>
                                        <p class='font-extrabold'>今の気分</p>
                                        <div class='bg-gray-100 rounded-lg relative p-5 pt-8'>
                                            <p>{{ $user->feeling }}</p>
                                        </div>
                                    @if($user->overview && $user->sns)
                                        <p class='font-extrabold'>概要</p>
                                        <div class='bg-gray-100 rounded-lg relative p-5 pt-8'>
                                            <p>{{ $user->overview }}</p>
                                        </div>
                                        <p class='font-extrabold'>SNS</p>
                                        <div class='bg-gray-100 rounded-lg relative p-5 pt-8'>
                                            <p>{{ $user->sns }}</p>
                                        </div>
                                    @endif
                                    </div>
                                    <button type='submit' value='{{$user->id}}' name='send_user_id' class="inline-flex items-center justify-center rounded-md border border-transparent bg-indigo-600 px-2 py-2 text-base font-medium text-white">このユーザーに送る</button>
                                    <!-- <button>このユーザーに送る</button> -->
                                    <p>--------------------------------------</p>
                                </div>
                            @endforeach
                        </form>
                    </div>                            
                </div>
            </div>
        </div>
    </div>
</x-app-layput>