<?php

namespace App\Http\Controllers;

use App\Models\Produto;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AdminController extends Controller
{
    public function index() {
        if (Auth::check()) {
            return view('adminPages.dashboard');
        } else {
            return redirect()->route('login');
        }
    }

    public function produtos() {
        if (Auth::check()) {
            $produtos = Produto::all();
            $user = Auth::user();
            $numProdutos = Produto::where('fk_usuario', $user->id)->count();
            return view('adminPages.produtos', compact('produtos', 'numProdutos'));
        } else {
            return redirect()->route('login');
        }
    }
}

