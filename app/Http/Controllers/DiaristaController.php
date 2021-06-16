<?php

namespace App\Http\Controllers;

use App\Models\Diarista;
use Illuminate\Http\Request;

class DiaristaController extends Controller
{
    public function index()
    {
        $diaristas = Diarista::get();

        // view = helper para exibir a view("nome_view")
        return view('index', [
            'diaristas' => $diaristas
        ]);
    }

    public function create()
    {
        return view('create');
    }

    // receberá uma request e atribui à var request
    public function store(Request $request)
    {
        // exibe todos os dados recebidos
        //dd($request->all());

        // vai receber os dados, ignorando o _token
        $dados = $request->except('_token');

        // fazer upload da foto do usuário
        $dados['foto_usuario'] = $request->foto_usuario->store('public');

        // o envio feito é de ARRAY, mas como a var dados já é um array, então ok
        Diarista::create($dados);

        // ao fim, há o redirect para a listagem das diaristas
        return redirect()->route('diaristas.index');
    }
}
