<?php

namespace App\Http\Controllers;

use App\Models\Copy;
use App\Models\Edition;
use Illuminate\Http\Request;

class CopyController extends Controller
{
    public function index(){
        return view('copies', [
            'copies' => Copy::all()->sortBy('id')]);
    }

    public function show(string $id){
        return view('copy', [
            'copy' => Copy::all()->where('id', $id)->first()
        ]);
    }

    public function create(){
        return view('copy_create', [
            'editions' => Edition::all()
        ]);
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'edition_id' => 'integer',
            'wear_coefficient' => 'required|numeric|min:0|max:1'
        ]);

        $copy= new Copy($validated);
        $copy->save();
        return redirect('/copy');
    }

    public function edit(string $id){
        return view('copy_edit', [
            'copy' => Copy::all()->where('id', $id)->first(),
            'editions' => Edition::all()
        ]);
    }

    public function update(Request $request, string $id)
    {
        $validated = $request->validate([
            'edition_id' => 'integer',
            'wear_coefficient' => 'required|numeric|min:0|max:1'
        ]);

        $copy = Copy::all()->where('id', $id)->first();
        $copy->edition_id = $validated['edition_id'];
        $copy->wear_coefficient = $validated['wear_coefficient'];
        $copy->save();
        return redirect('/copy');
    }

    public function destroy(string $id){
        Copy::destroy($id);
        return redirect('/copy');
    }
}
