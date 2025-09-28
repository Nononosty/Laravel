<?php

namespace App\Http\Controllers;

use App\Models\Copy;
use Illuminate\Http\Request;

class CopyControllerApi extends Controller
{
    /**
     * Display a listing of the resource.
     */
    /*public function index()
    {
        return response(Copy::all());
    }*/

    ////////////////////////////////////////////////////////////////////////
    public function index(Request $request){
        return response(Copy::limit($request->perpage ?? 5)
        ->offset(($request->perpage ?? 5) * ($request->page ?? 0))
        ->get());
    }

    public function total(){
        return response(Copy::all()->count());
    }
////////////////////////////////////////////////////////////////////////

    public function show(string $id)
    {
        return response(Copy::find($id));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
    }


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
