@extends('template')
@section('content')
    <div class="container">
        <h1>{{$article->title}}</h1>
        <div>{{$article->content}}</div>
        <hr>
        <p>Автор: {{$article->author}}</p>
        <a href="/editArticle/{{$article->id}}" class="btn btn-primary">редактировать</a>
    </div>
@endsection
