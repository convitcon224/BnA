<?php

namespace App\Controllers\Guest;

use App\Controllers\BaseController;

class Login extends BaseController
{
    public function index(): string
    {
        return view('guest/Login');
    }
}
