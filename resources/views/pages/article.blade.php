@extends('template')
@section('content')
    <div class="container">
        <h1>{{$article->title}}</h1>
        <div>{{$article->content}}</div>
        <hr>
        <p>Автор: {{$article->author}}</p>
        <a href="/editArticle/{{$article->id}}" class="btn btn-primary">редактировать</a>
        <hr>
        <h4>Комментарии</h4>
        <div>
            <form action="/addComment" method="post">
                @csrf
                <input type="hidden" value="{{$article->id}}" name="articleId">
                <div class="mb-3">
                    <label for="comment">Оставить комментарий</label>
                    <textarea name="comment" id="comment" class="form-control" placeholder="Комментарий"></textarea>
                </div>
                <div class="mb-3">
                    <input type="submit" value="Добавить комментарий">
                </div>
            </form>
        </div>
        <div>

        </div>
    </div>
@endsection
