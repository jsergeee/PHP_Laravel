<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Barryvdh\DomPDF\Facade as PDF;

class UserController extends Controller
{
    // Получение всех пользователей
    public function index()
    {
        $users = User::all();
        return view('users.index', compact('users'));
    }

    // Получение одного пользователя по id
    public function show($id)
    {
        $user = User::findOrFail($id);
        return view('users.show', compact('user'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */


    // Создание нового пользователя
    public function store(Request $request)
    {
        // Валидация данных
        $validatedData = $request->validate([
            'name' => 'required|max:50', // Максимум 50 символов
            'surname' => 'required|max:50', // Максимум 50 символов
            'email' => 'required|email|unique:users|regex:/^[a-zA-Z0-9._%+-]+@[a-zA-Z0-9.-]+\.[a-zA-Z]{2,}$/', // Валидация почты
            'password' => 'required',
        ]);

        User::create($validatedData);

        return redirect()->route('users.index')->with('success', 'Пользователь успешно добавлен!');
    }

        /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $users = User::all();
        return response()->json($users);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function get($id)
    {
        $user = User::findOrFail($id);
        return response()->json($user);
    }
        /**
     * Generate a PDF for the specified user.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function generatePDF($id)
    {
        $user = User::findOrFail($id);

        $pdf = PDF::loadView('pdf.resume', compact('user'));
        return $pdf->download('resume.pdf');
    }
}
