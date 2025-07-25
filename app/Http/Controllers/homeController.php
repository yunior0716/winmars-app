<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class homeController extends Controller
{
    public function index()
    {
        if (!Auth::check()) {
            return redirect()->to('login')->withErrors('Para acceder inicia sesion');
        }
        return view('home.index');
    }
}
