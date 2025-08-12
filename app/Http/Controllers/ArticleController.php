<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class ArticleController extends Controller
{
    function showArticleById(Request $request){
        $article = \App\Models\Article::where('id', $request->articleId)->first();
        $comments = \App\Models\Comment::where('article_id', $article->id)->get();
        // Перебираем комметарии к статье
        foreach ($comments as $comment){
            $user = \App\Models\User::where('id', $comment->user_id)->first(); // Получаем автора коммента по его ID
            $comment->username = $user->name; // Записываем новое свойство username и сохраняем туда имя пользователя
        }
        return view('pages.article', ['article'=>$article, 'comments'=>$comments]);
    }

    function showEditArticle(Request $request){
        $article = \App\Models\Article::where('id', $request->articleId)->first();
        return view('pages.editArticle', ['article'=>$article]);
    }

    function editArticle(Request $request){
        $articleId = $request->articleId; // Получаем <input name="articleId">
        $title = $request->title; // Получаем <input name="title">
        $content = $request->contentField; // Получаем <textarea name="contentField"></textarea>
        $author = $request->author; // Получаем <input name="author">
        $article = \App\Models\Article::where('id', $articleId)->first(); // Достаём из БД статью по ID
        $article->title = $title; // Записываем новое значение
        $article->content = $content; // Записываем новое значение
        $article->author = $author; // Записываем новое значение
        $article->save(); // Сохраняем изменения в БД
        return redirect()->intended('/article/'.$articleId); // Идём на страницу со статьёй и смотрим результат
    }

    function showArticles(){
        $articles = \App\Models\Article::all();
        return view('pages.articles', ['articles'=>$articles]);
    }
}
