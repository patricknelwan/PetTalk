<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use RealRashid\SweetAlert\Facades\Alert;

class AuthController extends Controller
{
    // Menampilkan halaman masuk
    public function showSigninPage()
    {
        return view('SignIn');
    }

    // Menampilkan halaman daftar
    public function showSignupPage()
    {
        return view('SignUp');
    }

    // Registrasi pengguna baru
    public function register(Request $request)
    {
        // Validasi data input
        $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|email|unique:users,email',
            'phone' => 'required|string|max:15',
            'address' => 'required|string|max:255',
            'password' => 'required|string|min:6',
        ], [
            'name.required' => 'Nama lengkap wajib diisi.',
            'email.required' => 'Alamat email wajib diisi.',
            'email.unique' => 'Email ini sudah terdaftar.',
            'phone.required' => 'Nomor telepon wajib diisi.',
            'address.required' => 'Alamat wajib diisi.',
            'password.required' => 'Kata sandi wajib diisi.',
            'password.min' => 'Kata sandi harus terdiri dari minimal 6 karakter.',
        ]);

        // Membuat pengguna baru
        User::create([
            'name' => $request->name,
            'email' => $request->email,
            'phone' => $request->phone,
            'address' => $request->address,
            'password' => Hash::make($request->password),
            'role' => 'customer', // Peran default
        ]);

        // Arahkan ke halaman login dengan pesan sukses
        Alert::success('Pendaftaran Berhasil 🎉', 'Akun Anda telah berhasil dibuat. Silakan masuk.');
        return redirect()->route('signin');
    }

    // Proses login pengguna
    public function login(Request $req)
    {
        $credentials = $req->only('email', 'password');

        if (Auth::attempt($credentials, $req->remember)) {
            $user = Auth::user();
            if ($user->role === 'admin') {
                Alert::success('Selamat Datang Admin 🎉', 'Anda berhasil masuk.');
                return redirect()->route('show-contacts');
            }
            Alert::success('Selamat Datang Kembali 🎉', 'Anda berhasil masuk.');
            return redirect()->route('show-blogs');
        }

        Alert::error('Gagal Masuk', 'Email atau kata sandi salah. Silakan coba lagi.');
        return redirect()->back()->withErrors(['error' => 'Kredensial tidak valid']);
    }

    // Proses logout pengguna
    public function logout()
    {
        Auth::logout();
        Alert::success('Berhasil Keluar', 'Anda telah berhasil keluar.');
        return redirect()->route('home');
    }
}
