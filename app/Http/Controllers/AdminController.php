<?php

namespace App\Http\Controllers;

use App\Models\Produto;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AdminController extends Controller
{
    public function index() {
        if (Auth::check()) {
            $numProdutos = Produto::all()->count();
            return view('adminPages.dashboard', compact('numProdutos'));
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

    public function adicionarProduto(Request $request) {
        $data = $request->validate([
            'nome' => ['required'],
            'descricao' => ['required'],
            'fornecedora' => ['required'],
            'quantidade' => ['required'],
            'valor' => ['required'],
            'fk_usuario' => ['required']
        ]);

        Produto::create([
            'nome' => $request->input('nome'),
            'descricao' => $request->input('descricao'),
            'fornecedora' => $request->input('fornecedora'),
            'quantidade' => $request->input('quantidade'),
            'valor' => $request->input('valor'),
            'fk_usuario' => $request->input('fk_usuario')
        ]);

        return redirect()->route('admin.produtos')->with('success', 'Produto cadastrado com sucesso.');
    }

    public function excluir($id) {
        $produto = Produto::findOrFail($id);
        $produto->delete();
        return redirect()->route('admin.produtos')->with('success', 'Produto excluído com sucesso.');
    }
}

