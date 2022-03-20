<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class LoginController extends Controller
{

    public function login()
    {
        return view('admin.login');
    }

    public function logout()
    {
        Auth::logout();
        return redirect()->to('/');
    }
}