<?php

namespace App\Http\Controllers\Admin;

use App\Models\User;
use Illuminate\View\View;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Http\RedirectResponse;
use App\Http\Controllers\BaseController;

class UserController extends BaseController
{
    public function index(): View
    {
        return view('pages.admin.perawat.index', [
            'users' => User::all(),
        ]);
    }

    public function store(Request $request): RedirectResponse
    {
        $data = $request->validate([
            'nip' => 'required',
            'nama' => 'required',
            'email' => 'required',
            'password' => 'required',
            'jk' => 'required',
            'no_telp' => 'required',
        ]);

        $data['password'] = Hash::make($data['password']);

        User::create($data);

        return $this->redirectBack([
            'status' => 'success',
            'message' => 'Perawat baru ditambahkan',
        ]);
    }

    public function edit(User $user): View
    {
        return view('pages.admin.perawat.edit', [
            'user' => $user,
        ]);
    }

    public function update(Request $request, User $user): RedirectResponse
    {
        $data = $request->validate([
            'nip' => 'required',
            'nama' => 'required',
            'email' => 'required',
            'password' => 'nullable',
            'jk' => 'required',
            'no_telp' => 'required',
        ]);

        if (isset($data['password'])) {
            $data['password'] = Hash::make($data['password']);
        } else {
            unset($data['password']);
        }

        $user->update($data);

        return $this->redirectBack([
            'status' => 'success',
            'message' => 'Perawat diupdate',
        ]);
    }

    public function delete(User $user)
    {
        $user->delete();

        return $this->redirectBack([
            'status' => 'success',
            'message' => 'Perawat dihapus',
        ]);
    }
}
