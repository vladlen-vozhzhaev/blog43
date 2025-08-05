@extends('template')
@section('content')
    <div class="container py-5">
        <h1 class="text-center">Редактировать статью</h1>
        <div class="col-6 mx-auto">
            <form action="/editArticle" method="post">
                @csrf
                <input type="hidden" name="articleId" value="{{$article->id}}">
                <div class="mb-3">
                    <label for="title">Заголовок статьи</label>
                    <input name="title" type="text" class="form-control" id="title" placeholder="Заголовок" value="{{$article->title}}">
                </div>
                <div class="mb-3">
                    <label for="content">Статья</label>
                    <textarea name="contentField" id="content" class="form-control" placeholder="Контент">{{$article->content}}</textarea>
                </div>
                <div class="mb-3">
                    <label for="author">Автор</label>
                    <input name="author" id="author" type="text" class="form-control" placeholder="Автор" value="{{$article->author}}">
                </div>
                <div class="mb-3">
                    <input type="submit" class="btn btn-primary form-control" value="Сохранить изменения">
                </div>
            </form>
        </div>
    </div>
@endsection
