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
                        <h1 class="title font-semibold">編集画面</h1>
                        <div class="content">
                            <form action="/users/{{ $user->id }}" method="POST" enctype="multipart/form-data">
                                @csrf
                                @method('PUT')
                                <div class='content__body space-y-4'>
                                    <div class='name'>
                                        <h2>名前</h2>
                                        <textarea type='text' name='user[name]' value="{{ $user->name }}" class='block p-2.5 w-full text-sm text-gray-900 bg-gray-50 rounded-lg border border-gray-300 focus:ring-blue-500 focus:border-blue-500 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500'>{{old('user[name]', $user->name)}}</textarea>
                                        <p class="name__error" style="color:red">{{ $errors->first('user.name') }}</p>
                                    </div>
                                    <div class='age'>
                                        <h2>年齢</h2>
                                        <textarea type='text' name='user[age]' value="{{ $user->age }}" class='block p-2.5 w-full text-sm text-gray-900 bg-gray-50 rounded-lg border border-gray-300 focus:ring-blue-500 focus:border-blue-500 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500'>{{old('user[age]', $user->age)}}</textarea>
                                        <p class="age__error" style="color:red">{{ $errors->first('user.age') }}</p>
                                    </div>
                                    <div class='image'>
                                        <p>画像登録</p>
                                        <input type="file" name="image">
                                    </div>
                                    <div class='additional_questionus'>
                                        <h2>どんな曲が聞きたい？</h2>
                                        <textarea type='text' name='user[additional_question]' placeholder='（例）OO（好きなアーティスト）の曲に似ている曲・心が晴れる曲・ドライブで聞きたい曲など' value="{{ $user->additional_question }}" rows="4" class="block p-2.5 w-full text-sm text-gray-900 bg-gray-50 rounded-lg border border-gray-300 focus:ring-blue-500 focus:border-blue-500 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500">{{old("user[additional_question]", $user->additional_question) }}</textarea>
                                        <p class="additional_question__error" style="color:red">{{ $errors->first('user.additional_question') }}</p>
                                    </div>
                                    <div class='feeling'>
                                        <h2>今の気分</h2>
                                        <textarea type='text' name='user[feeling]' value='{{ $user->feeling }}' rows="4" class="block p-2.5 w-full text-sm text-gray-900 bg-gray-50 rounded-lg border border-gray-300 focus:ring-blue-500 focus:border-blue-500 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500">{{ old("user[feeling]", $user->feeling)}}</textarea>  
                                        <p class="feeling__error" style="color:red">{{ $errors->first('user.feeling') }}</p>
                                    </div>
                                    <p>--------------ここから下はアーティスト登録する人のみ記入してください----------------</p>
                                    <div claas='overview'>
                                        <h2>概要</h2>
                                        <textarea type='text' name='user[overview]' value="{{ $user->overview }}" rows="4" class="block p-2.5 w-full text-sm text-gray-900 bg-gray-50 rounded-lg border border-gray-300 focus:ring-blue-500 focus:border-blue-500 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500">{{ old("user[overview]", $user->overview)}}</textarea>
                                    </div>
                                    <div class='sns'>
                                        <h2>SNS</h2>
                                        <textarea type='text' name='user[sns]' value='{{ $user->sns }}'  rows="4" class="block p-2.5 w-full text-sm text-gray-900 bg-gray-50 rounded-lg border border-gray-300 focus:ring-blue-500 focus:border-blue-500 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500">{{ old("user[sns]", $user->sns)}}</textarea>
                                    </div>
                                    <div class='flex flex-row-reverse'>
                                        <button type="submit" class="inline-flex items-center justify-center rounded-md border border-transparent bg-indigo-600 px-2 py-1 text-base font-medium text-white">保存</button>
                                    </div>
                                </div>
                            </form>
                            <div class="footer inline-flex items-center justify-center rounded-md border border-transparent bg-indigo-600 px-2 py-1 text-base font-medium text-white">
                                <a href="/users/show">戻る</a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</x-app-layput>
