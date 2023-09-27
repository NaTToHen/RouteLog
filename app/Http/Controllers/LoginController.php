<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class LoginController extends Controller
{
    public function auth(Request $request) {
        $dados = $request->validate([
            'nome' => ['required'],
            'password' => ['required']
        ]);
        if(Auth::attempt($dados)) {
            $request->session()->regenerate();
            return redirect()->intended('admin');
        } else {
            return redirect()->back()->with('erro', 'Usuario ou senha invalidos');
        }

    }
}
