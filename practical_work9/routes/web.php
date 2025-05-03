<?php

use App\Models\News;
use App\Events\NewsHidden;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});


Route::get('news/create-test', function () {
    $news = new News();
    $news->title = 'Test news title';
    $news->body = 'Test news body';
    $news->save();
    return $news; // Возвращаем созданную новость для подтверждения
});

Route::get('news/{id}/hide', function ($id) {
    $news = News::findOrFail($id);
    $news->hidden = true; // Изменяем поле 'hidden'
    $news->save();

    // Вызовите событие NewsHidden.
    NewsHidden::dispatch($news); // Вызываем событие

    return 'News hidden';
});