<?php

namespace App\Http\Controllers;

use App\Models\Entrega;
use App\Models\Loja;
use App\Models\Motorista;
use App\Models\Produto;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
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

    public function produtos(Request $request) {
        if (Auth::check()) {
            $user = Auth::user();
            $numProdutos = Produto::where('fk_usuario', $user->id)->count();

            if ($request->input('pesquisado')) {
                $pesquisado = $request->input('pesquisado');
                $produtos = Produto::where('nome', 'like', "%$pesquisado%")->get();
                return view('adminPages.produtos', compact('produtos', 'numProdutos'));
            } else {
                $produtos = Produto::all();
                return view('adminPages.produtos', compact('produtos', 'numProdutos'));
            }

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

    public function entregas(Request $request) {
        if (Auth::check()) {
            $user = Auth::user();
            $motoristas = Motorista::all();
            $produtos = Produto::all();
            $numEntregas = Entrega::all()->count();
            $response = Http::get('https://servicodados.ibge.gov.br/api/v1/localidades/estados/RS/municipios');
            $cidades = $response->json();
            $lojas = Loja::all();

            $entregas = DB::table('viewEntregas')->get();
            return view('adminPages.entregas', compact('entregas', ['numEntregas', 'user', 'cidades', 'motoristas', 'produtos', 'lojas']));
        } else {
            return redirect()->route('login');
        }
    }

    public function adicionarEntrega(Request $request) {
        $request->validate([
            'fk_loja' => ['required'],
            'fk_usuario' => ['required'],
            'cidadeDestino' => ['required'],
            'fk_motorista' => ['required'],
            'dataChegada' => ['required'],
            'fk_produto' => ['required'],
            'quantidadeProdutos' => ['required'],
            'statusEntrega' => ['required']
        ]);

        Entrega::create([
            'fk_loja' => $request->input('fk_loja'),
            'fk_usuario' => $request->input('fk_usuario'),
            'cidadeDestino' => $request->input('cidadeDestino'),
            'fk_motorista' => $request->input('fk_motorista'),
            'dataChegada' => $request->input('dataChegada'),
            'fk_produto' => $request->input('fk_produto'),
            'quantidadeProdutos' => $request->input('quantidadeProdutos'),
            'statusEntrega' => $request->input('statusEntrega')
        ]);

        return redirect()->route('admin.entregas')->with('success', 'Entrega registrada com sucesso.');
    }

    public function editarEntrega(Request $request, $id) {
        $request->validate([
            'fk_loja' => ['required'],
            'fk_usuario' => ['required'],
            'cidadeDestino' => ['required'],
            'fk_motorista' => ['required'],
            'dataChegada' => ['required'],
            'fk_produto' => ['required'],
            'quantidadeProdutos' => ['required'],
            'statusEntrega' => ['required']
        ]);
        $entrega = Entrega::find($id);
        $entrega->update([
            'fk_loja' => $request->input('fk_loja'),
            'fk_usuario' => $request->input('fk_usuario'),
            'cidadeDestino' => $request->input('cidadeDestino'),
            'fk_motorista' => $request->input('fk_motorista'),
            'dataChegada' => $request->input('dataChegada'),
            'fk_produto' => $request->input('fk_produto'),
            'quantidadeProdutos' => $request->input('quantidadeProdutos'),
            'statusEntrega' => $request->input('statusEntrega')
        ]);

        return redirect()->route('admin.entregas')->with('success', 'Entrega editada com sucesso.');
    }
}

