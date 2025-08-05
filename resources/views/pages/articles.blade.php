@extends('template')
@section('content')
    <div class="container">
        <a href="/addArticle" class="btn btn-primary">Добавить статью</a>
        @foreach($articles as $article)
            <div>
                <h4><a href="/article/{{$article->id}}">{{$article->title}}</a></h4>
                <p>{{mb_substr($article->content, 0, 90)}}...</p>
                <p>Автор: {{$article->author}}</p>
            </div>
            <hr>
        @endforeach
    </div>
@endsection
