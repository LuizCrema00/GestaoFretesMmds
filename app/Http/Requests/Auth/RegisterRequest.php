<?php

namespace App\Http\Requests\Auth;

use App\Rules\Cpf;
use Illuminate\Foundation\Http\FormRequest;

class RegisterRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, mixed>
     */
    public function rules()
    {
        return [
            //
            'frete.Cliente' => 'required',
            'frete.DataFrete' => 'required',
            'frete.CTe' => 'required',
            'frete.ValorNF' => 'required',
            'frete.CidadeOrigem' => 'required',
            'frete.UFOrigem' => 'required',
            'frete.CidadeDestino' => 'required',
            'frete.UFDestino' => 'required',
            'frete.Motorista' => 'required',
            'frete.DataFim' => 'nullable',
            'frete.LucroFrete' => 'nullable',
        ];
    }
}
