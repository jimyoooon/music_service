<!DOCTYPE HTML>
<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('プロフィール') }}
        </h2>
    </x-slot>
          <div class="post">
            <h1>{{ $post->title }}</h1>
            <p>{{ $post->body }}</p>
            <p>{{ $post->updated_at }}</p>
            @if($post->likes()->where('user_id', Auth::id())->exists())
              <div class="like">
                <form action="/post/{{ $post->id }}/unlike" method="POST">
                  @csrf
                  <button id="like">いいね解除</button>
                  <p>いいね数:{{ $post->likes()->count() }}</p>
                </form>
              </div><!-- /.like -->
            @else
              <div class="like">
                <form action="/post/{{ $post->id }}/like" method="POST">
                  @csrf
                    <button id="like">いいね</button>
                    <p>いいね数:{{ $post->likes()->count() }}</p>
                </form>
              </div><!-- /.like -->
            @endif
            </div><!-- /.post -->
            <!--comment一覧-->
            @if($comments)
            <div class="comments">
                @foreach($comments as $comment)
                  <div class="comment">
                    <h4>{{ $comment->comment }}</h4>
                    <p>{{ $comment->user->name }}</p>
                    <p>{{ $comment->updated_at }}</p>
                    <form action='/post/{{ $post->id}}/comment/{{ $comment->id }}' method='post' style='display:inline' id="form_delete">
                        @csrf
                        @method('DELETE')
                        <input type="submit" value="delete" onclick="return deletePost(this);">
                    </form>
                  </div>
                @endforeach
            </div>
            @endif
            <!--comment投稿-->
            <div class="comment-post">
              <h3>コメント投稿</h3>
              <form action="/post/{{ $post->id }}/comment" method="POST">
                @csrf
                <input name="comment[post_id]" type="hidden" value="{{ $post->id }}"/>
                <textarea name="comment[comment]"></textarea>
                <br>
                <button>投稿する</button>
              </form>
            </div>
          <br>
      <a href="/posts">[back]</a>
      <script>
      function deletePost(e){
          'use strict';
          if(confirm('削除すると復元できません。\n本当に削除しますか？')){
              document.getElementById('form_delete').submit();
          }
      }
      </script>
</x-app-layput>
