<?php

use App\Http\Controllers\ProfileController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    $articles = \App\Models\Article::all();
    return view('pages.articles', ['articles'=>$articles]);
});
Route::get('/article/{articleId}', function (Request $request){
    $article = \App\Models\Article::where('id', $request->articleId)->first();
    return view('pages.article', ['article'=>$article]);
});
// Показываем форму редактирования статьи
Route::get('/editArticle/{articleId}', function (Request $request){
    $article = \App\Models\Article::where('id', $request->articleId)->first();
    return view('pages.editArticle', ['article'=>$article]);
});
// После нажатия на кнопку сохранить статью, передаём данные из формы
Route::post('/editArticle', function (Request $request){
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
});
Route::get('/addArticle', function (){
    return view('pages.addArticle');
})->middleware('auth');
Route::post('/addArticle', function (Request $request){
    $title = $request->title;
    $content = $request->contentField;
    $author = $request->author;
    $article = new \App\Models\Article();
    $article->title = $title;
    $article->content = $content;
    $article->author = $author;
    $article->save();
    return "Статья успешно добавлена";
});

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__.'/auth.php';
