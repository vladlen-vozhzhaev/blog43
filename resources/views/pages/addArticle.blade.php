@extends('template')
@section('content')
    <div class="container py-5">
        <h1 class="text-center">Добавить статью</h1>
        <div class="col-6 mx-auto">
            <form action="/addArticle" method="post">
                @csrf
                <div class="mb-3">
                    <label for="title">Заголовок статьи</label>
                    <input name="title" type="text" class="form-control" id="title" placeholder="Заголовок">
                </div>
                <div class="mb-3">
                    <label for="content">Статья</label>
                    <textarea name="contentField" id="content" class="form-control" placeholder="Контент"></textarea>
                </div>
                <div class="mb-3">
                    <label for="author">Автор</label>
                    <input name="author" id="author" type="text" class="form-control" placeholder="Автор">
                </div>
                <div class="mb-3">
                    <input type="submit" class="btn btn-primary form-control" value="Добавить статью">
                </div>
            </form>
        </div>
    </div>
@endsection
