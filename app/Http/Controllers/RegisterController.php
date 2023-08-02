<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\Hash;

class RegisterController extends Controller
{
    public function index()
    {
        return view('register.index', [
            'title' => 'Register'
        ]);
    }

    public function store(Request $request)
    {
        $ValidatedData = $request->validate([
            'name' => 'required',
            'username' => ['required', 'unique:users'],
            'email' => ['required', 'unique:users'],
            'password' => 'required|min:5|max:30',
            'user_level' => 'required|in:admin,owner,dapur',
        ]);

        $ValidatedData['password'] = Hash::make($ValidatedData['password']);

        User::create($ValidatedData);
        // $request->session()->flash('success', 'Registration is successful!! you can login');
        return redirect('/login')->with('success', 'Registration is successful!! you can login');
    }
}
