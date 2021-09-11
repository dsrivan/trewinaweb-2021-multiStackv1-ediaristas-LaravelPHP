<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Diarista extends Model
{
    use HasFactory;

    /*
        define os campos que podem ser gravados
    */
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

    /*
        no consumo de API
        não é uma boa prática receber dados que não serão usados no front
        então esse bloco visa definir quais dados serão retornados na requisição
    */
    protected $visible = [
        'nome_completo',
        'cidade', 
        'foto_usuario'
    ];

    /*
        monta a url completa de onde está salva a foto
        para ser exibido no front

        automatizando a chamada:
        coloca: get<nome_campo>Attribute
        o foto_usuario -> FotoUsuario
        Ex:getFotoUsuarioAttribute
    */
    public function getFotoUsuarioAttribute(string $valor)
    {
        /*
            RECEBE a string sendo:
            parte do caminho aonde foi salvo + nome da imagem

            SAI: o caminho completo de onde a imagem está salva na aplicação

            OBS: para isso foi configurado a variável APP_URL em env com a url local
        */

        /*
            pega a configuração APP_URL e concatena

            ainda assim, dará erro 404
            pois a pasta onde estão salvas as imagens, não há acesso público
            então necessita-se criar um 'link simbólico' para esta pasta

            foi necessário:
            (para Linux ou MacOS) no terminal:
            cd public
            ln -s ../storage/app/public public

            obs: foi criado um link simbólico 'public'
            para:../storage/app/public
        */
        return config('app.url') . '/' . $valor;
    }

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
