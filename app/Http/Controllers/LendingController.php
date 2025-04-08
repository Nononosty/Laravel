<?php

namespace App\Http\Controllers;

use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\Copy;
use App\Models\Edition;
use Illuminate\Support\Facades\Gate;
use App\Models\User;

class LendingController extends Controller
{
    public function create($copyId = null)
    {
        if (!Gate::allows('lend-copy')) {
            return redirect()->intended('/copy')->withErrors([
                'lend' => 'У вас нет прав на выдачу экземпляров.',
            ]);
        }
    
        return view('lending_create', [
            'users' => User::all(),
            'copies' => Copy::all(),
            'selectedCopyId' => $copyId
        ]);
    }
    
    public function store(Request $request)
    {
        if (!Gate::allows('lend-copy')) {
            return redirect()->intended('/copy')->withErrors([
                'lend' => 'У вас нет прав на выдачу экземпляров.',
            ]);
        }
    
        $request->validate([
            'user_id' => 'required|exists:users,id',
            'copy_id' => 'required|exists:copies,id',
            'lending_date' => 'required|date',
            'plan_return_date' => 'required|date|after_or_equal:lending_date',
            'fact_return_date' => 'nullable|date|after_or_equal:lending_date',
        ]);
    
        $user = User::find($request->user_id);
        $user->copies()->attach($request->copy_id, [
            'lending_date' => $request->lending_date,
            'plan_return_date' => $request->plan_return_date,
            'fact_return_date' => $request->fact_return_date
        ]);
        
    
        return redirect()->back()->with('success', 'Книга успешно выдана!');
    }

    public function allLendings()
    {
        if (!Gate::allows('lend-copy')) {
            return redirect()->intended('/copy')->withErrors([
                'lend' => 'У вас нет прав для просмотра всех выдач.',
            ]);
        }

        $users = User::with(['copies'])->get();

        return view('all_lendings', compact('users'));
    }
    
    public function userLendings()
{
    $user = Auth::user();

    if (!$user) {
        return redirect()->route('login')->withErrors(['auth' => 'Сначала войдите в систему.']);
    }

    $user = User::with('copies.edition')->find(Auth::id());


    return view('user_lendings', ['user' => $user]);
}



}