<?php

use App\Http\Controllers\ProfileController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

Route::get('/', [\App\Http\Controllers\ArticleController::class, 'showArticles']);
Route::get('/article/{articleId}', [\App\Http\Controllers\ArticleController::class, 'showArticleById']);
Route::get('/editArticle/{articleId}', [\App\Http\Controllers\ArticleController::class, 'showEditArticle']);
Route::post('/editArticle', [\App\Http\Controllers\ArticleController::class, 'editArticle']);
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

Route::post('/addComment', function (Request $request){
    $userId = auth()->user()->getAuthIdentifier();
    $commentField = $request->comment;
    $articleId = $request->articleId;
    $comment = new \App\Models\Comment();
    $comment->comment = $commentField;
    $comment->user_id = $userId;
    $comment->article_id = $articleId;
    $comment->save();
    return redirect()->intended('/article/'.$articleId); // Идём на страницу со статьёй и смотрим результат
})->middleware('auth');

Route::get('/profile', function (){
    $user = auth()->user();
    return view('pages.profile', ['user'=>$user]);
})->name('profile');
Route::post('/updateUserAvatar', function (Request $request){
    $path = \Illuminate\Support\Facades\Storage::disk('public')
        ->putFile('avatars', $request
            ->file('userAvatar'));
    $user = \App\Models\User::where('id', auth()->user()->getAuthIdentifier())->first();
    $user->avatar = $path;
    $user->save();
    return redirect()->intended('/profile');
});

//Route::get('/dashboard', function () {
//    return view('dashboard');
//})->middleware(['auth', 'verified'])->name('dashboard');

//Route::middleware('auth')->group(function () {
//    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
//    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
//    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
//});

require __DIR__.'/auth.php';
