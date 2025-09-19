<?php

namespace App\Http\Controllers;

use App\Models\Lending;
use Illuminate\Http\Request;

class LendingControllerApi extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return response(Lending::all());
    }

    public function show(string $id)
    {
        return response(Lending::find($id));
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
