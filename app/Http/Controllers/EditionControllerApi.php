<?php

namespace App\Http\Controllers;

use App\Models\Edition;
use Illuminate\Http\Request;

class EditionControllerApi extends Controller
{
    /**
     * Display a listing of the resource.
     */
   /* public function index()
    {
        return response(Edition::all());
    }*/
////////////////////////////////////////////////////////////////////////
    public function index(Request $request){
        return response(Edition::limit($request->perpage ?? 5)
        ->offset(($request->perpage ?? 5) * ($request->page ?? 0))
        ->get());
    }

    public function total(){
        return response(Edition::all()->count());
    }
////////////////////////////////////////////////////////////////////////
    public function show(string $id)
    {
        return response(Edition::find($id));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     */


    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
