<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class AuthController extends Controller
{
    public function login()
    {
        return view('auth/login');
    }

    public function auth(Request $request)
    {
        $request->validate([
            'email' => 'required|email',
            'password' => 'required|min:6|max:255'
        ]);

        $user = User::where('email', $request->email)->first();
        if (!$user) {
            return "User Tidak Ditemukan";
        } elseif (!Hash::check($request->password, $user->password)) {
            return "password salah";
        }

        $infoLogin = [
            'email' => $request->email,
            'password' =>$request->password
        ];

        if (Auth::attempt($infoLogin)) {
            if ($user->role == "admin") {
                return redirect('/berandaadmin');
            } elseif ($user->role == "petugas") {
                return redirect('/berandapetugas');
            } elseif ($user->role == "pengunjung") {
                return redirect('/berandapengunjunglgn');
            }
        }
    }

    public function register()
    {
        return view('auth/register');
    }

    public function create(Request $request)
    {
        $request->validate([
            'fullname' => 'required|string|max:255',
            'birthplace' => 'required|string|max:64',
            'birthdate' => 'required|date',
            'gender' => 'required',
            'email' => 'required|email|unique:users,email',
            'phone' => 'required|max:32',
            'address' => 'required|max:255',
            'password' => 'required|string'
        ]);

        $data = [
            'name' => $request->fullname,
            'tempat_lahir' => $request->birthplace,
            'tanggal_lahir' => $request->birthdate,
            'jenis_kelamin' => $request->gender,
            'email' => $request->email,
            'no_hp' => $request->phone,
            'alamat' => $request->address,
            'password' => Hash::make($request->password),
            'role' => 'pengunjung'
        ];
        $state = User::create($data);
        if ($state) {
            return redirect('/auth/login');
        }
    }

    public function logout()
    {
        Auth::logout();
        return redirect('/');
    }
}
