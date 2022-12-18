<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('ホーム画面') }}
        </h2>
    </x-slot>
    
    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 bg-white border-b border-gray-200">
                    <div class='body'>
                        @foreach($messages as $message)
                            <div class='content'>
                                <h2>送られてきた曲</h2>
                                <div class = "messages">
                                    メッセージ: {{$message->body}}
                                </div>
                                <div class='movie'>
                                    動画：<img src="{{$message->song->image}}"> <!--message モデルrelation -->
                                </div>
                            </div>
                            <p>--------------------------------------</p>
                        @endforeach
                    </div>                            
                </div>
            </div>
        </div>
    </div>
</x-app-layput>