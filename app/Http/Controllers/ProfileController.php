<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\User;

class ProfileController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index()
    {
        $userId = Auth::user()->id;
        $user = User::findOrFail($userId);

        return view('profile.index', [
            'user' => $user,
        ]);
    }

    public function edit() 
    {
        $user = User::findOrFail(Auth::user()->id);

        return view('profile.edit', compact('user'));
    }

    public function update()
    {
        $user = User::findOrFail(Auth::user()->id);

        $user->update($this->validateData());
        
        return redirect('/profile');
    }

    protected function validateData() 
    {
        return request()->validate([
            'name' => 'required',
            'email' => 'required|email',
        ]);
    }

}
