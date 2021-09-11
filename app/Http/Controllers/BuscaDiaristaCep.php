<?php

namespace App\Http\Controllers;

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
        dd($endereco['ibge']);
    }
}
