<?php

namespace App\Http\Controllers;

use App\Models\Diarista;
use Illuminate\Http\Request;

class DiaristaController extends Controller
{
    // exibe a view com os dados (diaristas)
    public function index()
    {
        $diaristas = Diarista::get();

        return view('index', [
            'diaristas' => $diaristas
        ]);
    }

    // exibe a view de criação
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

        // remoção dos caracs inseridos pelas máscaras
        $dados['cpf'] = str_replace(['.', '-'], '', $dados['cpf']);
        $dados['cep'] = str_replace(['-'], '', $dados['cep']);
        $dados['telefone'] = str_replace(['(', ')', ' ', '-'], '', $dados['telefone']);

        // o envio feito é de ARRAY, mas como a var dados já é um array, então ok
        Diarista::create($dados);

        // ao fim, há o redirect para a listagem das diaristas
        return redirect()->route('diaristas.index');
    }

    // rota para a alteração de um cadastro
    public function edit(int $id)
    {
        // busca no banco, retorna um 404 se não encontrar
        $diarista = Diarista::findOrFail($id);
        
        // retorna a view, enviando o dado encontrado
        return view('edit', [
            'diarista' => $diarista
        ]);
    }
    
    // rota para gravar a alteração do cadastro
    public function update(int $id, Request $request)
    {
        // busca no banco, retorna um 404 se não encontrar 
        $diarista = Diarista::findOrFail($id);

        // vai receber os dados, ignorando o _token e o _method
        $dados = $request->except('_token', '_method');

        // remoção dos caracs inseridos pelas máscaras
        $dados['cpf'] = str_replace(['.', '-'], '', $dados['cpf']);
        $dados['cep'] = str_replace(['-'], '', $dados['cep']);
        $dados['telefone'] = str_replace(['(', ')', ' ', '-'], '', $dados['telefone']);

        // verifica se há uma foto sendo enviada na requisição
        if ( $request->hasFile('foto_usuario'))
        {
            // faz upload da foto do usuário
            $dados['foto_usuario'] = $request->foto_usuario->store('public');
        }

        // atualiza de fato o cadastro
        $diarista->update($dados);
        
        // retorna para a view
        return redirect()->route('diaristas.index'); 
    }

    public function destroy(int $id)
    {
        // busca no banco, retorna um 404 se não encontrar 
        $diarista = Diarista::findOrFail($id);

        // deleta o registro
        $diarista->delete();
        
        // retorna para a view
        return redirect()->route('diaristas.index'); 
    }
}
