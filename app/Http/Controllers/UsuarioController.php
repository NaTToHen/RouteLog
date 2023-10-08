<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class UsuarioController extends Controller
{
    public function index() {
        if (Auth::check()) {
            return view('adminPages.usuario');
        } else {
            return redirect()->route('usuario');
        }
    }
}
