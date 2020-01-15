<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Auth\LoginController as BaseLoginController;
use Illuminate\Foundation\Auth\AuthenticatesUsers;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class LoginController extends BaseLoginController
{
    use AuthenticatesUsers;

    public function redirectPath()
    {
        return route('admin.dashboard');
    }

    protected function guard()
    {
        return Auth::guard('admin');
    }

    public function showLoginForm()
    {
        return view('admin.login');
    }
}
