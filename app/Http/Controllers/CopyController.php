<?php

namespace App\Http\Controllers;

use App\Models\Copy;
use App\Models\Edition;
use Illuminate\Support\Facades\Gate;
use Illuminate\Http\Request;

class CopyController extends Controller
{
    public function index(Request $request){
        $perpage = $request->perpage ?? 2;
        return view('copies', [
            'copies' => Copy::paginate($perpage)->withQueryString()
        ]);
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
        if ((! Gate::allows('edit-copy', Copy::all()->where('id', $id)->first()))){
            return redirect('/error')->with('message', 'У вас нет прав для редактирования экземпляра № ' . $id);
        }

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
        if(! Gate::allows('destroy-copy', Copy::all()->where('id', $id)->first())){
            return redirect('/error')->with('message', 'У вас нет разрешения на удаление экземпляра № ' . $id);    
        }

        Copy::destroy($id);
        return redirect('/copy');
    }
}
