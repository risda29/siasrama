<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\M_Data_Pengguna;
use App\Models\M_Data_Santri;
use Illuminate\Support\Facades\Hash;
use Illuminate\Auth\Events\Registered;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;

class Login extends Controller
{
    public function index()
    {
        return view('auth.login');
    }

    // public function login(Request $request)
    // {
    //     $request->validate([
    //         'email' => 'required',
    //         'password' => 'required'
    //     ], [
    //         'email.required' => 'email Wajib Diisi!!',
    //         'password.required' => 'Password Wajib Diisi!!',
    //     ]);

    //     $infologin = [
    //         'email' => $request->email,
    //         'password' => $request->password,
    //     ];

    //     // $pengguna = M_Data_Pengguna::where('email', $request->email)->first();

    //     // if ($pengguna && password_verify($request->password, $pengguna->password)) {
    //     //     return redirect('/dashboard');
    //     // } else {
    //     //     return redirect('/login')->withErrors('email dan password yang dimasukkan tidak sesuai')->withInput();
    //     // }

    //     if (Auth::attempt($infologin)) {
    //         if (Auth::user()->level == 'Admin') {
    //             return redirect('/level/admin');
    //         } elseif (Auth::user()->level == 'Kepala Yayasan') {
    //             return redirect('/level/kepala');
    //         } elseif (Auth::user()->level == 'Santri') {
    //             return redirect('/level/santri');
    //         } else {
    //             return redirect('/login')->withErrors('Username dan password yang dimasukkan tidak sesuai')->withInput();
    //         }
    //     }
    // }

    public function login(Request $request)
    {
        $request->validate([
            'email' => 'required|email',
            'password' => 'required',
        ]);

        $credentials = $request->only('email', 'password');

        if (Auth::attempt($credentials)) {
            $user = Auth::user();

            if ($user->level === 'Admin') {
                return redirect('/level/admin');
            } elseif ($user->level === 'Kepala Yayasan') {
                return redirect('/level/kepala');
            } elseif ($user->level === 'Santri') {
                return redirect('/level/santri');
            }
        }

        return back()->withErrors('Login gagal, periksa kembali email dan password!');
    }

    // if (Auth::attempt($infologin)) {
    //         return redirect('/dashboard');
    //     } else {
    //         return redirect('/login')->withErrors('Username dan password yang dimasukkan tidak sesuai')->withInput();
    //     }
    // }

    function logout()
    {
        Auth::logout();
        return redirect('/');
    }

    function dashboard_admin()
    {
        return view('admin.dashboard');
    }

    function dashboard()
    {
        return view('admin.dashboard');
    }


    function dashboard_santri()
    {
        return view('admin.dashboard');
    }

    function dashboard_kepala()
    {
        return view('admin.dashboard');
    }

    public function register()
    {
        return view('auth.register');
    }


    // public function store(Request $request)
    // {
    //     $request->validate([
    //         'nm_santri' => 'required',
    //         'email' => 'required|email|unique:data_pengguna,email',
    //         'tanggal_lahir' => 'required',
    //         'tempat_lahir' => 'required',
    //         'jenis_kelamin' => 'required',
    //         'alamat' => 'required',
    //     ]);

    //         $pengguna = M_Data_Pengguna::create([
    //             'username' => $request->username,
    //             'email' => $request->email,
    //             'password' => Hash::make($request->password),
    //             'level' => 'Santri',
    //         ]);


    //         $santri = M_Data_Santri::where('nm_santri', $request->username)->first();


    //         if (!$santri) {
    //             M_Data_Santri::create([
    //                 'nm_santri' => $request->username,
    //                 'tempat_lahir' => $request->tempat_lahir,
    //                 'tanggal_lahir' => $request->tanggal_lahir,
    //                 'jenis_kelamin' => $request->jenis_kelamin,
    //                 'alamat' => $request->alamat,
    //             ]);
    //         } else {

    //             $santri->update([
    //                 'tempat_lahir' => $request->tempat_lahir,
    //                 'tanggal_lahir' => $request->tanggal_lahir,
    //                 'jenis_kelamin' => $request->jenis_kelamin,
    //                 'alamat' => $request->alamat,
    //             ]);
    //         }

    //         DB::commit();

    //         return redirect('/login')->with('success', 'Registrasi berhasil! Silakan login.');
    //     } catch (\Exception $e) {
    //         DB::rollBack();

    //         return redirect('/register')->withErrors('Registrasi gagal, silakan coba lagi.')->withInput();
    //     }


    // }

    public function store(Request $request)
    {

        $nisn = $request->input('nisn');

        M_Data_Pengguna::create([
            'id' => $nisn,
            'username' => $request->input('nm_santri'),
            'email' => $request->input('email'),
            'password' => password_hash($request->email, PASSWORD_DEFAULT),
            'level' => 'Santri',
        ]);

        $request->validate([
            'nm_santri' => 'required',
            'nisn' => 'required',
            'email' => 'required',
            'tempat_lahir' => 'required',
            'jenis_kelamin' => 'required',
            'tanggal_lahir' => 'required|date',
            'alamat' => 'required',
            'nama_ibu' => 'required',
            'nama_ayah' => 'required',
        ]);


        M_Data_Santri::create([

            'nm_santri' => $request->nm_santri,
            'nisn' => $request->nisn,
            'tempat_lahir' => $request->tempat_lahir,
            'jenis_kelamin' => $request->jenis_kelamin,
            'tanggal_lahir' => $request->tanggal_lahir,
            'alamat' => $request->alamat,
            'nama_ibu' => $request->nama_ibu,
            'nama_ayah' => $request->nama_ayah,
            'email' => $request->email,
            'user_id' => $request->nisn,
        ]);


        return redirect('login')->with('success', 'Berhasil membuat akun.');
    }
}