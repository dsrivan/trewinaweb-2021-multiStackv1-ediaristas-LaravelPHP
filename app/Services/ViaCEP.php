<?php

namespace App\Services;

use Illuminate\Support\Facades\Http;

class ViaCEP
{
    // Consulta de CEP no Via CEP

    public function buscar(string $cep)
    {
        $url = sprintf('https://viacep.com.br/ws/%s/json', $cep);

        // cliente HTTP Laravel
        $resposta = Http::get($url);

        //dd($resposta);

        if ($resposta->failed())
        {
            return false;
        }

        $dados = $resposta->json();
        //dd($dados);

        if (isset($dados['erro']) && $dados['erro'])
        {
            // se existe a posição erro no array e se for true
            return false;
        }

        /*
            se chegar aqui
            é porque a request não falhou
            não existe erro no array (é como se erro = false)
        */
        return $dados;
    }
}