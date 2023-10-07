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
        ],
        [
            'nome.required' => "Usuario invalido ou vazio",
            'password.required' => "Senha invalida ou vazia"
        ]);
        if(Auth::attempt($dados)) {
            $request->session()->regenerate();
            return redirect()->intended('admin');
        } else {
            return redirect()->back()->with('erro', 'Usuario ou senha invalidos');
        }
    }

    public function logout(Request $request) {
            Auth::logout();
            return redirect('/');
    }
}
