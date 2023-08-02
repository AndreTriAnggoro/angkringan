<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\Auth;

class LoginController extends Controller
{
    public function index(){
        return view('Login.index', [
            'title' => 'login'
        ]);
    }

    public function authenticate(Request $request)
    {
        $credentials = $request->validate([
            'email' => 'required',
            'password' => 'required',
            'user_level' => 'required|in:admin,owner,dapur',
        ]);

        if(Auth::attempt($credentials)) {
            $request->session()->regenerate();
            $request->session()->put('user_level', $credentials['user_level']);
            
            if ($credentials['user_level'] === 'admin') {
                return redirect('/admin');
            } elseif ($credentials['user_level'] === 'owner') {
                return redirect('/owner');
            } elseif ($credentials['user_level'] === 'dapur') {
                return redirect('/waiter');
            } else {
                // Arahkan ke halaman default jika user_level tidak sesuai
                return redirect('/login');
            }
        }
    
        return back()->with('loginError', 'Login failed!');
        }

     

    public function logout(Request $request){
        Auth::logout();

        $request->session()->invalidate();

        $request->session()->regenerateToken();

        return redirect('/login');
    }
}
