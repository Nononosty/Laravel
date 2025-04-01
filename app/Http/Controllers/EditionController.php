<?php

namespace App\Http\Controllers;
use App\Models\Edition; 
use Illuminate\Http\Request;

class EditionController extends Controller
{
    public function index()
    {
        return view('editions', [
            'editions' => Edition::all()
        ]);
    }

    public function show(string $id){
        return view('edition', [
            'edition' => Edition::all()->where('id', $id)->first()
        ]);
    }
}
