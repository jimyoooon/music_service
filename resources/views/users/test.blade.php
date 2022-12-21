<!DOCTYPE HTML>
<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('プロフィール') }}
        </h2>
    </x-slot>
      <form action="/posts" method="GET">
        <input type="search" placeholder="キーワード検索" name="search" value="@if (isset($search)) {{ $search }} @endif">
        <div>
          <button type="submit">検索</button>
          <button>
            <a href="/posts">
              クリア
            </a>
          </button>
        </div>
      </form>
      <div class="posts">
        <a href="/post/create">[create]</a>
        @foreach($posts as $post)
          <div class="post">
            <h1><a href="/post/{{ $post->id }}">{{ $post->title }}</a></h1>
            <p>{{ $post->body }}</p>
            <p>{{ $post->user->name }}</p>
            <p>{{ $post->updated_at }}</p>
            <form action='/post/{{ $post->id }}' method='post' style='display:inline' id="form_delete">
                @csrf
                @method('DELETE')
                <input type="submit" value="delete" onclick="return deletePost(this);">
            </form>
          </div><!-- /.post -->
        @endforeach
        <div class="paginate">
          {{ $posts->links() }}
        </div>
      </div><!-- /.posts -->

      <script>
      function deletePost(e){
          'use strict';
          if(confirm('削除すると復元できません。\n本当に削除しますか？')){
              document.getElementById('form_delete').submit();
          }
      }
      </script>
</x-app-layput>
