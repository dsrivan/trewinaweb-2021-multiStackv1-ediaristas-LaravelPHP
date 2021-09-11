<?php

namespace App\Rules;

use App\Services\ViaCEP;
use Illuminate\Contracts\Validation\Rule;

class ValidaCep implements Rule
{
    /**
     * Create a new rule instance.
     *
     * @return void
     */
    
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
        public ViaCEP $viaCep
    ){}

    /**
     * Determine if the validation rule passes.
     *
     * @param  string  $attribute
     * @param  mixed  $value
     * @return bool
     */
    public function passes($attribute, $value)
    {
        $cep = str_replace(['-'], '', $value);

        /*
            os !! força que sempre seja retornado um bool
            se retornar 
            false = false
            array = true
        */
        return !! $this->viaCep->buscar($cep);        
    }

    /**
     * Get the validation error message.
     *
     * @return string
     */
    public function message()
    {
        return 'CEP inválido.';
    }
}
