<?php

namespace App\Http\Controllers\SuperAdmin;

use App\Http\Controllers\Controller;
use App\Models\Admin\Role;
use App\Models\Admin\User;

class UserController extends Controller
{
    public function index()
    {
        $data['list_user'] = User::all();
        return view('super-admin.master-data.pengguna.index', $data);
    }


    public function store()
    {
        $user = new User();
        $user->nama = request('nama');
        $user->no_hp = request('no_hp');
        $user->alamat = request('alamat');
        $user->username = request('username');
        $user->email = request('email');
        $user->password = request('password');
        $user->save();

        $user->handleUploadFoto();

        return redirect('super-admin/pengguna')->with('success', 'Data Pengguna Berhasil Ditambahkan');
    }

    public function show($id)
    {
        $user = User::findOrFail($id);
        return view('super-admin.master-data.pengguna.show', compact('user'));
    }

    public function edit(User $user)
    {
        $data['user'] = $user;
        return view('super-admin.master-data.pengguna.edit', $data);
    }

    public function update($id)
    {
        $user = User::find($id);
        if (request('nama')) $user->nama = request('nama');
        if (request('no_hp')) $user->no_hp = request('no_hp');
        if (request('alamat')) $user->alamat = request('alamat');
        if (request('username')) $user->username = request('username');
        if (request('email')) $user->email = request('email');
        if (request('password')) $user->password = request('password');
        $user->save();

        if (request('foto')) $user->handleUploadFoto();

        return redirect('super-admin/pengguna')->with('success', 'Data Pengguna Berhasil Diedit');
    }

    public function destroy($id)
    {
        $user = User::find($id);
        $user->handleDelete();

        $list_role = Role::where('id_users', $user->id)->get();
        if ($list_role->count() > 0) {
            $list_role->each(function ($role) {
                $role->delete();
            });
        }

        $user->delete();

        return redirect('super-admin/pengguna')->with('danger', 'Data Pengguna Berhasil Dihapus');
    }
}
