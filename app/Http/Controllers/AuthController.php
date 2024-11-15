<?php

namespace App\Http\Controllers;

use App\Models\Pengguna;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class AuthController extends Controller
{
    public function showRegisterForm()
    {
        return view('register');
    }

    public function register(Request $request)
    {
        $request->validate([
            'name' => 'required',
            'email' => 'required|email|unique:pengguna,email',
            'password' => 'required|min:6',
            'role' => 'required|in:admin,librarian'
        ]);

        Pengguna::create([
            'name' => $request->name,
            'email' => $request->email,
            'password' => Hash::make($request->password),
            'role' => $request->role,
        ]);

        return redirect()->route('login')->with('success', 'Registration successful. Please login.');
    }

    public function showLoginForm()
    {
        return view('login');
    }

    public function login(Request $request)
{
    // Validasi input
    $request->validate([
        'email' => 'required|email',
        'password' => 'required|min:6',
    ]);

    // Mencari pengguna berdasarkan email
    $user = Pengguna::where('email', $request->email)->first();

    // Cek apakah pengguna ditemukan
    if (!$user) {
        return redirect()->back()->withErrors('User not found.');
    }

    // Cek apakah password yang dimasukkan cocok dengan password yang ada di database
    if (!Hash::check($request->password, $user->password)) {
        return redirect()->back()->withErrors('Invalid credentials.');
    }

    // Cek peran pengguna dan arahkan ke route yang sesuai
    if ($user->role === 'admin') {
        return redirect()->route('admin'); // redirect ke halaman admin
    } elseif ($user->role === 'librarian') {
        return redirect()->route('librarian'); // redirect ke halaman librarian
    }

    // Jika tidak ada peran yang cocok, arahkan kembali dengan error
    return redirect()->back()->withErrors('Invalid credentials.');
}



    public function dashboard()
    {
        return view('dashboard');
    }

    public function logout(Request $request)
    {
        auth()->logout();
        return redirect('/login');
    }
}
