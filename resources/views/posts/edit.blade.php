<!DOCTYPE HTML>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<x-app-layout>
    <x-slot name="header">

        <head>
            <meta charset="utf-8">
            <title>投稿編集</title>

            <script src="{{ asset('/js/index.js')}}"></script>
            <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-9ndCyUaIbzAi2FUVXJi0CjmCapSmO7SnpJef0486qhLnuZ2cdeRhO02iuK6FUUVM" crossorigin="anonymous">
            <link rel="stylesheet" href="{{ asset('/css/edit.css') }}">

        </head>
    </x-slot>

    <body>
        <div class="stars">
            <h1>投稿内容編集</h1>

            <form action="/posts/{{$post->id}}" method="POST">
                @csrf
                @method('PUT')

                <div class="category">
                    <p>投稿するカテゴリを選択</p>
                    <select name="post[category_id]">
                        @foreach($categories as $category)
                        <option value="{{ $category->id }}" @if ($category->id == $post->category_id) selected @endif >{{ $category->name }}
                        </option>
                        @endforeach
                    </select>

                </div>
                <div class="body">
                    <p>投稿フォーム編集</p>
                    <textarea name="post[body]" placeholder="投稿する内容を入力">{{$post->body}}</textarea>
                    <p class="body__error" style="color:red">{{ $errors->first('post.body') }}</p>
                </div>

                <button type="button" class="btn btn-primary"><input type="submit" value="保存" /></button>
            </form>
            <p>
            <div class="footer">
                <a href="/">戻る</a>
            </div>
            </p>
    </body>
    </div>
</x-app-layout>

</html>