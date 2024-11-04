<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\BaseController;
use App\Http\Controllers\Controller;
use App\Models\Admin;
use Illuminate\Contracts\View\View;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class AccountController extends BaseController
{
    public function index(): View
    {
        return view('pages.admin.account');
    }

    public function update(Request $request): RedirectResponse
    {
        $data = $request->validate([
            'nama' => 'required',
            'email' => 'required',
            'password' => 'nullable',
        ]);

        if (isset($data['password'])) {
            $data['password'] = Hash::make($data['password']);
        } else {
            unset($data['password']);
        }

        Admin::find(auth('admin')->user()->id)->update($data);

        return $this->redirectBack([
            'status' => 'success',
            'message' => 'Berhasil update akun'
        ]);
    }
}
