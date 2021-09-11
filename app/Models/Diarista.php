<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Diarista extends Model
{
    use HasFactory;

    protected $fillable = [
        'nome_completo', 
        'cpf', 
        'email', 
        'telefone', 
        'logradouro', 
        'numero', 
        'bairro', 
        'cidade', 
        'complemento', 
        'cep', 
        'estado', 
        'codigo_ibge', 
        'foto_usuario', 
        'created_at', 
        'updated_at'
    ];

    static public function buscaPorCodigoIbge(int $codigoIbge)
    {
        /*
            usar a classe diarista
            Diarista ou self
        */

        // buscar e retorna até 6 diaristas pelo código IBGE
        return self::where('codigo_ibge', $codigoIbge)->limit(6)->get();
    }
    
    static public function quantidadePorCodigoIbge(int $codigoIbge)
    {
        /*
            usar a classe diarista
            Diarista ou self
        */

        // buscar e retorna a quantidade de diaristas cadastradas com o código IBGE
        $quantidade = self::where('codigo_ibge', $codigoIbge)->count();
        
        /*
            verifica se é maior que 6
            pois a busca primária mostra as 6 primeiras
            isso visa a não repetição na contagem
            fazendo parecer que tem mais do que realmente tem
        */
        return ($quantidade > 6) ? ($quantidade - 6) : $quantidade;
    }
}
