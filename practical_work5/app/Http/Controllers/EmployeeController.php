<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;

class EmployeeController extends Controller
{
    public function index()
    {
        return view('get-employee-data');
    }

    public function getPath(Request $request)
{
    $path = $request->path();
    return $path;
}

public function getUrl(Request $request)
{
    $url = $request->url();
    return $url;
}

    public function update(Request $request, $id)
    {
        $path = $this->getPath($request);
        $url = $this->getUrl($request);
    
        // Здесь можно добавить логику для обновления данных в базе данных
        // Например:
        // Employee::find($id)->update([
        //     'name' => $request->input('name'),
        //     'email' => $request->input('email'),
        //     'surname' => $request->input('surname'),
        //     'position' => $request->input('position'),
        //     'address' => $request->input('address')
        // ]);
    
        return redirect()->back()->with('success', 'Данные успешно обновлены');
    }
    
    public function store(Request $request)
    {
        $path = $this->getPath($request);
        $url = $this->getUrl($request);
    
        $name = $request->input('name');
        $email = $request->input('email');
        $surname = $request->input('surname');
        $position = $request->input('position');
        $address = $request->input('address');
    
        // Здесь можно добавить логику для сохранения данных в базу данных
        // Например:
        // Employee::create([
        //     'name' => $name,
        //     'email' => $email,
        //     'surname' => $surname,
        //     'position' => $position,
        //     'address' => $address
        // ]);
    
        return redirect()->back()->with('success', 'Данные успешно сохранены');
    }
    



}
