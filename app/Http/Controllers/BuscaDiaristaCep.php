<?php

namespace App\Http\Controllers;

use App\Models\Diarista;
use App\Services\ViaCEP;
use Illuminate\Http\Request;

class BuscaDiaristaCep extends Controller
{
    /**
     * Handle the incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function __invoke(Request $request, ViaCEP $viaCEP)
    {
        /*
            método mágico pra criar um controle com uma única ação
            permite apenas uma action para o controller

            no INSOMNIA:
            http://127.0.0.1:8000/api/diaristas-cidade?cep=02221000

            está pegando o param CEP na query da URL
        */

        /* 
            ENTRADA: CEP
            ENCONTRAR: CÓDIGO IBGE
            SAÍDA: LISTA DE DIARISTAS FILTRADAS PELO CÓDIGO IBGE
        */

        /*
            dd($request->cep); 
            executa o método buscar da classe ViaCEP
            passando o CEP da requisição(url) como param
        */

        $endereco = $viaCEP->buscar($request->cep);
        //dd($endereco['ibge']);

        if (!$endereco) 
        {
            // em caso de resposta negativa, retorna um json com a mensagem na posição erro
            return response()->json(['erro'=> "O CEP informado é inválido"], 400);
        }
        // utilizando a classe Diarista
        //$diaristas = Diarista::buscaPorCodigoIbge($endereco['ibge']);
        //dd($diaristas);

        $diaristas = [
            'diaristas' => Diarista::buscaPorCodigoIbge($endereco['ibge']),
            'quantidade_diaristas' => Diarista::quantidadePorCodigoIbge($endereco['ibge'])
        ];

        return $diaristas;         
    }
}
