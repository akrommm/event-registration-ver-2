<?php

namespace App\Http\Controllers;

use illuminate\Support\Str;
use App\Http\Controllers\Controller;
use App\Models\Admin\User;
use App\Models\User as ModelsUser;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class AuthController extends Controller
{
    public function login()
    {
        return view('auth.login');
    }

    function showRegis()
    {
        return view('auth.regis');
    }

    public function store(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'nama' => 'required|regex:/^[A-Za-z\s]*$/',
            'username' => 'required',
            'email' => 'required|email|min:5|max:60',
            'no_hp' => 'required',
            'password' => 'required|min:8',
            'confirm_password' => 'required|same:password',
        ], [
            'nama.regex' => 'Nama lengkap tidak boleh menggunakan angka!',
            'nama.required' => 'Nama Harus Diisi',
            'username.required' => 'Username Harus Diisi',
            'email.required' => 'Email Harus Diisi',
            'email.email' => 'Harus Email Yang Valid',
            'no_hp.required' => 'Nomor HP Harus Diisi',
            'password.required' => 'Password Harus Diisi',
            'password.min' => 'Password minimal 8 huruf',
            'confirm_password.same' => 'Konfirmasi password tidak sama!'
        ]);

        if ($validator->fails()) {
            return redirect(url()->previous())
                ->withErrors($validator)
                ->withInput();
        }

        $user = new ModelsUser();
        $user->nama = request('nama');
        $user->email = request('email');
        $user->username = request('username');
        $user->type = 'USER';
        $user->no_hp = request('no_hp');
        $user->password = request('password');
        $user->save();

        return redirect('login')->with('success', 'Daftar Berhasil');
    }

    public function loginProcess()
    {
        $guard = null;
        $userid = request('userid');
        if (Str::contains($userid, '@')) {
            $field = 'email';
        } else {
            $userid = str_replace(" ", "", $userid);
            $strlen = Str::length($userid);
            if ($strlen == 17) {
                $field = 'nip';
            } else if ($strlen == 10) {
                $field = 'nim';
                $guard = 'mahasiswa';
            } else {
                $field = 'username';
            }
        }

        $credential = [
            $field => request('userid'),
            'password' => request('password')
        ];

        $req_remember = request('remember');
        $remember = (isset($req_remember)) ? true : false;

        if ($guard) {
            if (auth()->guard('mahasiswa')->attempt($credential, $remember)) {
                $user = auth()->guard('mahasiswa')->user();
                if ($user->is_alumni) return redirect('alumni/dashboard')->with('success', 'Login berhasil');
                return redirect('mahasiswa/dashboard')->with('success', 'Login berhasil');
            } else {
                return view('auth.login', ['message' => 'Login gagal, silahkan cek email dan password anda']);
            }
        } else {
            if (auth()->attempt($credential, $remember)) {
                $user = auth()->user();
                return $this->manageRedirect($user);
            } else {
                return view('auth.login', ['message' => 'Login gagal, silahkan cek email dan password anda']);
            }
        }
    }


    // public function loginProcess()
    // {
    //     $credential = [
    //         'email' => request('email'),
    //         'password' => request('password')
    //     ];

    //     if (auth()->attempt($credential)) {
    //         $user = auth()->user();
    //         if ($user->type == 'ADMIN') {
    //             return redirect('admin/dashboard')->with('success', 'Login Berhasil');
    //         } else {
    //             return redirect('beranda')->with('success', 'Login Berhasil');
    //         }
    //     } else {
    //         return back()->with('danger', 'Login Gagal, Silahkan Cek Email dan Password');
    //     }
    // }

    public function logout()
    {
        auth()->logout();

        return redirect('login');
    }

    public function manageRedirect($user)
    {
        $list_role =  $user->role;
        $firstRole = $list_role->first();
        $url = $firstRole->module->url;
        return redirect($url);
    }
}
