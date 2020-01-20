<?php

namespace App\Http\Controllers;

use Request;
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
        $userId = Request::input('userId');
        $user = User::find($userId);

        if($userId == null) {
            $user = Auth::user();
        }

        //Prevent broken access control
        $authenticated_user = Auth::user();
        if ($authenticated_user->id != $user->id) {
            return 'Unauthorised';
        }

        if ($user) {
            $user->update($this->validateData());
            return redirect('/profile');
        }
        else {
            return 'No user was found';
        }

    }

    protected function validateData() 
    {
        return request()->validate([
            'name' => 'required',
            'email' => 'required|email',
        ]);
    }

}
