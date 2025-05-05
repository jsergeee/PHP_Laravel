<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User; // Убедитесь, что это правильный путь к модели User
use Barryvdh\DomPDF\Facade as PDF;


class PdfGeneratorController extends Controller
{
    public function index($id)
    {
        $user = User::findOrFail($id);
        $pdf = PDF::loadView('pdf.user', ['user' => $user]); // Используйте фасад для генерации PDF
        return $pdf->download('user_' . $user->id . '.pdf');
    }
}
