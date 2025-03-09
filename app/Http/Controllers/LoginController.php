<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class LoginController extends Controller
{
    public function index()
    {
        return view('login.index', [
            'title' => 'Login'
        ]);
    }

    public function Ceklogin(Request $request)
    {
        $request->validate([
            'email' => 'required|email',
            'password' => 'required',
        ], [
            'email.required' => "Email harus diisi",
            'email.email' => "Format email tidak valid",
            'password.required' => "Password harus diisi",
        ]);

        $credentials = $request->only('email', 'password');

        if (Auth::attempt($credentials)) {
            $user = Auth::user();

            if ($user->role == 'admin') {
                return redirect()->route('admin.dashboard');
            } else if ($user->role == 'customer') {
                return redirect()->route('customer.index');
            }
        }

        return back()->withErrors(['login' => 'Email atau password salah'])->withInput();
    }

    public function register()
    {
        return view('login.register', [
            'title' => 'Register'
        ]);
    }

    public function registerStore(Request $request)
    {
        $validatedData = $request->validate([
            'nama' => 'required',
            'email' => 'required|email|unique:users',
            'password' => 'required',
            'no_hp' => 'required',
            'foto_profil' => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:1024',
        ], [
            'nama.required' => "Nama harus diisi",
            'email.required' => "Email harus diisi",
            'email.email' => "Format email tidak valid",
            'email.unique' => "Email sudah terdaftar",
            'password.required' => "Password harus diisi",
            'no_hp.required' => "No HP harus diisi",
            'foto_profil.required' => "Foto Profil harus diisi",
            'foto_profil.mimes' => "Format gambar harus JPEG, PNG, JPG, GIF, atau SVG",
            'foto_profil.max' => "Ukuran gambar maksimal 1 MB",
        ]);

        if ($request->hasFile('foto_profil')) {
            $file = $request->file('foto_profil');
            $filePath = $file->store('foto_profil', 'public');
            $validatedData['foto_profil'] = $filePath;
        }

        $validatedData['password'] = Hash::make($validatedData['password']);
        $validatedData['role'] = 'customer';

        User::create([
            'nama' => $validatedData['nama'],
            'email' => $validatedData['email'],
            'password' => $validatedData['password'],
            'no_hp' => $validatedData['no_hp'],
            'foto_profil' => $validatedData['foto_profil'],
            'role' => $validatedData['role'],
        ]);

        return redirect()->route('login')->with('success', 'Register berhasil, silakan login');
    }


    public function logout(Request $request)
    {
        Auth::logout();
        return redirect()->route('login');
    }
}
