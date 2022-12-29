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
                        <h1 class="title">編集画面</h1>
                        <div class="content">
                            <form action="/users/{{ $user->id }}" method="POST" enctype="multipart/form-data">
                                @csrf
                                @method('PUT')
                                <div class='content__body'>
                                    <h2>名前</h2>
                                    <input type='text' name='user[name]' value="{{ $user->name }}">
                                    <p class="name__error" style="color:red">{{ $errors->first('user.name') }}</p>
                                    <h2>年齢</h2>
                                    <input type='text' name='user[age]' value="{{ $user->age }}">
                                    <p class="age__error" style="color:red">{{ $errors->first('user.age') }}</p>
                                    <div class='image'>
                                        画像登録：<input type="file" name="image">
                                    </div>
                                    <h2>どんな曲が聞きたい？</h2>
                                    <input type='text' name='user[additional_question]' value="{{ $user->additional_question }}">
                                    <p class="additional_question__error" style="color:red">{{ $errors->first('user.additional_question') }}</p>
                                    <h2>今の気分</h2>
                                    <input type='text' name='user[feeling]' value='{{ $user->feeling }}'>
                                    <p class="feeling__error" style="color:red">{{ $errors->first('user.feeling') }}</p>
                                    <h2>概要</h2>
                                    <input type='text' name='user[overview]' value="{{ $user->overview }}">
                                    <h2>SNS</h2>
                                    <input type='text' name='user[sns]' value='{{ $user->sns }}'>
                                </div>
                                <input type="submit" value="[保存]">
                            </form>
                        <div class="footer">
                            <a href="/users/show">[戻る]</a>
                        </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</x-app-layput>
