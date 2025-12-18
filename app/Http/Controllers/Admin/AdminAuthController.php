<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Auth;
class AdminAuthController extends Controller
{
    public function index()
    {
         return view('admin.auth.login');
       
    }


    public function login(Request $request)
    {
        $credentials = $request->validate([
            'email' => ['required', 'email'],
            'password' => ['required'],
        ]);

        if (Auth::guard('admin')->attempt($credentials)) {

        if (Auth::guard('admin')->user()->role !== 'admin') {
            Auth::guard('admin')->logout();

            return back()->withErrors([
                'email' => 'Accès réservé aux administrateurs',
            ]);
        }

        $request->session()->regenerate();

        return redirect()->route('admin.dashboard');
    }

        return back()->withErrors([
            'email' => 'Invalide credentials',
        ]);
    } 



    public function logout(Request $request)
{
    Auth::guard('admin')->logout();        // déconnecte le guard admin
    $request->session()->invalidate();      // invalide la session
    $request->session()->regenerateToken(); // nouveau token CSRF

    return redirect()->route('admin.login'); // redirige vers login admin
}

}
