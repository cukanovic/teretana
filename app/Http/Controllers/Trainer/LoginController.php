<?php

namespace App\Http\Controllers\Trainer;

use App\Http\Controllers\Auth\LoginController as BaseLoginController;
use Illuminate\Support\Facades\Auth;

class LoginController extends BaseLoginController
{

    public function redirectPath()
    {
        return route('trainer.dashboard');
    }

    public function showLoginForm()
    {
        return view('trainer.login');
    }

    protected function guard()
    {
        return Auth::guard('trainer');
    }
}
