<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Qrs;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    public function home()
    {
        $qrs = Qrs::orderBy('id', 'DESC')->get();
        return view('admin.home', [
            'qrs' => $qrs
        ]);
    }

    public function upload()
    {
        return view('admin.upload');
    }
}