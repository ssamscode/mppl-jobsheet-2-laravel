<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use RealRashid\SweetAlert\Facades\Alert;

use App\Models\User;
use Illuminate\Support\Facades\Hash;

class AuthController extends Controller
{

    public function register()
{
    return view('register');
}

public function post_register(Request $request)
{
    $request->validate([
        'name' => 'required',
        'email' => 'required|email|unique:users,email',
        'password' => 'required|min:6'
    ]);

    User::create([
        'name' => $request->name,
        'email' => $request->email,
        'password' => Hash::make($request->password)
    ]);

    toast('Registrasi berhasil, silakan login!', 'success');

    return redirect('/');
}
     

    public function login(Request $request)
    {
        
        // VALIDASI
        $request->validate([
            'email' => 'required|email',
            'password' => 'required'
        ]);

        // LOGIN ADMIN
        if (Auth::guard('admin')->attempt([
            'email' => $request->email,
            'password' => $request->password
        ])) {
            $request->session()->regenerate();
            toast('Selamat datang admin!', 'success');
            return redirect()->route('admin.dashboard');
        }

        // LOGIN USER
        if (Auth::attempt([
            'email' => $request->email,
            'password' => $request->password
        ])) {
            $request->session()->regenerate();
            toast('Selamat datang!', 'success');
            return redirect()->route('user.dashboard');
        }

        // GAGAL LOGIN
        Alert::error('Login Gagal!', 'Email atau password tidak valid!');
        return back();
    }

    public function admin_logout(Request $request)
    {
        Auth::guard('admin')->logout();

        $request->session()->invalidate();
        $request->session()->regenerateToken();

        toast('Berhasil logout!', 'success');
        return redirect('/');
    }

    public function user_logout(Request $request)
    {
        Auth::logout();

        $request->session()->invalidate();
        $request->session()->regenerateToken();

        toast('Berhasil logout!', 'success');
        return redirect('/');
    }
}