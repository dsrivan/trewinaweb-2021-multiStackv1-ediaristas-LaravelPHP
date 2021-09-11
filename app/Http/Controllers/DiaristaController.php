<?php

namespace App\Http\Controllers;

use App\Http\Requests\DiaristaRequest; // contém as regras para os campos do form
use App\Models\Diarista;
use App\Services\ViaCEP;
use Illuminate\Http\Request;

class DiaristaController extends Controller
{
    /*
        até a versão 7.4 do PHP, fazer dessa forma:

        protected ViaCEP $viaCep;
        public function __construct(
            ViaCEP $viaCep
        ) {
            $this->viaCep = $viaCep;
        }
    */

    /*
        acima da versão 8 do PHP, fazer dessa forma:
        utiliza o conceito de 'promoção de propriedade no construtor'
    */
    public function __construct(
        protected ViaCEP $viaCep
    ) {}

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
    public function store(DiaristaRequest $request)
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
        /*
            preencher o código IBGE automaticamente

            OBS: como o ViaCEP vai ser utilizado em 1+ lugares,
            então ele é instanciado no construtor da classe
        */
        $dados['codigo_ibge'] = $this->viaCep->buscar($dados['cep'])['ibge'];

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
    public function update(DiaristaRequest $request, int $id)
    {
        // busca no banco, retorna um 404 se não encontrar 
        $diarista = Diarista::findOrFail($id);

        // vai receber os dados, ignorando o _token e o _method
        $dados = $request->except('_token', '_method');

        // remoção dos caracs inseridos pelas máscaras
        $dados['cpf'] = str_replace(['.', '-'], '', $dados['cpf']);
        $dados['cep'] = str_replace(['-'], '', $dados['cep']);
        $dados['telefone'] = str_replace(['(', ')', ' ', '-'], '', $dados['telefone']);
        /*
            preencher o código IBGE automaticamente

            OBS: como o ViaCEP vai ser utilizado em 1+ lugares,
            então ele é instanciado no construtor da classe
        */
        $dados['codigo_ibge'] = $this->viaCep->buscar($dados['cep'])['ibge'];

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
