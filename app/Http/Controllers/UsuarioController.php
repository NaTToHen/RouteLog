<?php

namespace App\Http\Controllers;

use App\Models\Produto;
use Illuminate\Support\Facades\Auth;

class UsuarioController extends Controller
{
    public function index() {
        if (Auth::check()) {
            $user = Auth::user();
            $numProdutos = Produto::where('fk_usuario', $user->id)->count();
            return view('adminPages.usuario', compact('numProdutos'));
        } else {
            return redirect()->route('usuario');
        }
    }
}
