<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\BaseController;
use App\Models\Admin;
use Illuminate\Http\Request;
use Illuminate\Contracts\View\View;
use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\RedirectResponse;
use Illuminate\Support\Facades\Hash;

class AccountController extends BaseController
{
    public function index(): View
    {
        return view('pages.user.account');
    }

    public function update(Request $request): RedirectResponse
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

        User::find(auth('user')->user()->id)->update($data);

        return $this->redirectBack([
            'status' => 'success',
            'message' => 'Berhasil update akun'
        ]);
    }
}
