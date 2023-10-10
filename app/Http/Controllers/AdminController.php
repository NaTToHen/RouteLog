<?php

namespace App\Http\Controllers;

use App\Models\Entrega;
use App\Models\Produto;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Http;

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


    //------------------- Produtos ---------------------

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
        $request->validate([
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

    public function editarProduto(Request $request, $id) {
        $request->validate([
            'nome' => ['required'],
            'descricao' => ['required'],
            'fornecedora' => ['required'],
            'quantidade' => ['required'],
            'valor' => ['required'],
            'fk_usuario' => ['required']
        ]);

        $produto = Produto::find($id);
        $produto->update([
            'nome' => $request->input('nome'),
            'descricao' => $request->input('descricao'),
            'fornecedora' => $request->input('fornecedora'),
            'quantidade' => $request->input('quantidade'),
            'valor' => $request->input('valor'),
            'fk_usuario' => $request->input('fk_usuario')
        ]);

        return redirect()->route('admin.produtos')->with('success', 'Produto editado com sucesso.');
    }

    public function excluir($id) {
        $produto = Produto::findOrFail($id);
        $produto->delete();
        return redirect()->route('admin.produtos')->with('success', 'Produto excluído com sucesso.');
    }

    //------------------- Entregas ---------------------

    public function entregas() {
        if (Auth::check()) {
            $entregas = Entrega::all();
            $user = Auth::user();
            $numEntregas = Entrega::where('fk_usuario', $user->id)->count();

            $response = Http::get('https://servicodados.ibge.gov.br/api/v1/localidades/estados/RS/municipios');
            $cidades = $response->json();

            return view('adminPages.entregas', compact('entregas', ['numEntregas', 'user', 'cidades']));
        } else {
            return redirect()->route('login');
        }
    }

    public function adicionarEntrega(Request $request) {
        $request->validate([
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

        return redirect()->route('admin.entregas')->with('success', 'Entrega registrada com sucesso.');
    }

}

