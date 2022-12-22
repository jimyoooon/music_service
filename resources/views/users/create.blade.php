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
                    <form action="/users" method="POST">
                        @csrf
                        <div class="title">
                            <h2>Name</h2>
                            <input type="text" name="user[name]" placeholder="名前" value="{{old("user.name") }}"/>
                            <p class="name__error" style="color:red">{{ $errors->first('user.name') }}</p>
                        </div>
                        <div class="body">
                            <h2>age</h2>
                            <textarea name="user[age]" placeholder="年齢">{{old("user.age") }}</textarea>
                            <p class="age__error" style="color:red">{{ $errors->first('user.age') }}</p>
                        </div>
                        <div class="body">
                            <h2>image</h2>
                            <textarea name="user[image]" placeholder="写真">{{old("user.image") }}</textarea>
                            <p class="image__error" style="color:red">{{ $errors->first('user.image') }}</p>
                        </div>
                        <div class="body">
                            <h2>additional_question</h2>
                            <textarea name="user[additional_question]" placeholder="自由記入欄">{{old("user.additional_question") }}</textarea>
                            <p class="additional_question__error" style="color:red">{{ $errors->first('user.additional_question') }}</p>
                        </div>
                        <div class="body">
                            <h2>feeling</h2>
                            <textarea name="user[feeling]" placeholder="今の気分">{{old("user.feeling") }}</textarea>
                            <p class="feeling__error" style="color:red">{{ $errors->first('user.feeling') }}</p>
                        </div>
                        <div class="body">
                            <h2>overview</h2>
                            <textarea name="user[overview]" placeholder="概要">{{old("user.overview") }}</textarea>
                            <p class="overview__error" style="color:red">{{ $errors->first('user.overview') }}</p>
                        </div>
                        <div class="body">
                            <h2>sns</h2>
                            <textarea name="user[sns]" placeholder="SNS">{{old("user.sns") }}</textarea>
                            <p class="sns__error" style="color:red">{{ $errors->first('user.sns') }}</p>
                        </div>
                        <input type="submit" value="[store]"/>
                    </form>
                    <div class="footer">
                        <a href="/index">[戻る]</a>
                    </div>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>


