<?php

namespace App\Http\Controllers;

use App\Models\Book;
use Illuminate\Http\Request;

class BookController extends Controller
{
    /**
     * Возвращает страницу с формой добавления книги.
     *
     * @return \Illuminate\View\View
     */
    public function index()
    {
        return view('form'); // возвращает вид с нашей формой
    }

    /**
     * Обрабатывает отправленные данные из формы и добавляет книгу в базу данных.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\RedirectResponse
     */
    public function store(Request $request)
    {
        // Валидируем полученные данные
        $validatedData = $request->validate([
            'title' => 'required|unique:books,title|max:255', // Название обязательно, уникальное и максимум 255 символов
            'author' => 'required|max:100',                   // Автор обязателен, максимум 100 символов
            'genre' => 'required',                            // Обязательное поле жанры
        ]);
        
        // Создаем объект книги и сохраняем в базу данных
        Book::create($validatedData);
        
        // Перенаправляем пользователя обратно на форму с сообщением успеха
        return redirect()->route('book.index')->with('success', 'Книга успешно добавлена!');
    }
    public function showList()
    {
        // Получаем все книги из базы данных
        $books = Book::all();

        // Передаем список книг в шаблон list.blade.php
        return view('list', compact('books'));
    }
}
