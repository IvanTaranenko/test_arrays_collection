<?php

namespace App\Http\Controllers;

use App\Models\Disneyplus;
use Barryvdh\DomPDF\Facade\Pdf;
use Illuminate\Http\Request;

class DisneyplusController extends Controller
{
    public function downloadPDF($id) {
        
        $show = Disneyplus::find($id);
        $pdf = PDF::loadView('pdf', compact('show'));

        return $pdf->download('disney.pdf');
    }
    public function index()
    {
        $shows = Disneyplus::all();

        return view('list', compact('shows'));
    }
    public function create()
    {
        return view('form');
    }

    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'surname' => 'required|max:255',
            'name' => 'required|max:255',

        ]);
        Disneyplus::create($validatedData);

        return redirect('/disneyplus/list')->with('success', 'Disney Plus Show is successfully saved');
    }
}
