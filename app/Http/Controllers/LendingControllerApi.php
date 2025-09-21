<?php

namespace App\Http\Controllers;

use App\Models\Lending;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class LendingControllerApi extends Controller
{
    /**
     * Display a listing of the resource.
     */
/*     public function index()
    {
        return response(Lending::all());
    } */

    // LendingController.php
/*     public function index()
    {
        $users = User::with(['copies.edition'])->get();
        return response()->json($users);
    } */

        // LendingController.php
    public function index()
    {
        $user = Auth::user();

        // Проверяем, аутентифицирован ли пользователь
        if (!$user) {
            return response()->json(['error' => 'Неавторизованный доступ'], 401);
        }

        // Если пользователь администратор
        if ($user->is_admin) {
            $users = User::with(['copies.edition'])->get();
        } else {
            // Для обычного пользователя возвращаем только его данные
            $users = User::with(['copies.edition'])
                ->where('id', $user->id)
                ->get();
        }

        return response()->json($users);
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
