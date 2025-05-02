<?php

namespace App\Http\Controllers;

use App\Models\User;
use Barryvdh\DomPDF\Facade as PDF;

class PdfGeneratorController extends Controller
{
    /**
     * Generate a PDF for the specified user.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function index($id)
    {
        $user = User::findOrFail($id);

        $pdf = PDF::loadView('pdf.resume', compact('user'));
        return $pdf->download('resume.pdf');
    }
}
