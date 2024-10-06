<?php

namespace App\Http\Requests;

use App\Models\Itens;
use Carbon\Carbon;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class StoreOrUpdateProductRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     */
    public function authorize(): bool
    {
        return true;
    }

    /**
     * Função auxiliar para formatar o preço para float (formato americano)
     */
    protected function formatPriceToFloat($value)
    {
        $value = str_replace('R$ ', '', $value);
        $value = str_replace('.', '!', $value);
        $value = str_replace([',', '!'], ['.', ''], $value);
        $value = floatval(preg_replace("/[^-0-9\.]/", "", $value));
        return $value;
    }

    protected function prepareForValidation()
    {

        if ($this->filled('price')) {
            $this->merge([
                'price' => $this->formatPriceToFloat($this->price),
            ]);
        }

        // Converte o campo de data para o formato americano
        if ($this->filled('expiration_date')) {
            $this->merge([
                'expiration_date' => Carbon::createFromFormat('d/m/Y', $this->expiration_date)->format('Y-m-d'),
            ]);
        }
    }

    /**
     * Get the validation rules that apply to the request.
     */
    public function rules(): array
    {

        $routeName = $this->route()->getName();

        if($routeName === 'produtos.store'){
            $rules = [
                'name' => 'required|string|max:55',
                'description' => 'nullable|string',
                'price' => 'required|decimal:0', // Validação como string para o tratamento de máscara
                'category_id' => 'required|exists:categories,id',
                'sku' => [
                    'required',
                    'string',
                    'max:100',
                    Rule::unique('itens')->ignore($this->route('produto')), // Ignora SKU duplicado no update
                ],
                'expiration_date' => 'nullable|date_format:Y-d-m|after:today', // Data no formato dd/mm/yyyy e não pode ser retroativa
                'image' => 'required|image|mimes:jpeg,png,jpg,svg,gif,webp|max:5120', // Máximo de 5MB, apenas JPEG e PNG
            ];

            return $rules;

        }elseif($routeName === 'produtos.update'){

            $rules = [
                'name' => 'nullable|string|max:55',
                'description' => 'nullable|string',
                'price' => 'nullable|decimal:0', // Validação como string para o tratamento de máscara
                'category_id' => 'nullable|exists:categories,id',
                'sku' => [
                    'nullable',
                    'string',
                    'max:100',
                    Rule::unique('itens')->ignore($this->route('produto')), // Ignora SKU duplicado no update
                ],
                'expiration_date' => [
                    'nullable'
                ], 
                // 'expiration_date' => [
                //     'nullable|date_format:Y-d-m|after:today'
                // ], // Data no formato dd/mm/yyyy e não pode ser retroativa
                'image' => 'nullable|image|mimes:jpeg,png,jpg,svg,gif,webp|max:5120', // Máximo de 5MB, apenas JPEG e PNG
            ];
            return $rules;

        }
    }

    /**
     * Customiza as mensagens de erro (opcional).
     */
    public function messages()
    {
        return [
            'name.required' => 'O nome do produto é obrigatório.',
            'price.required' => 'O preço do produto é obrigatório.',
            'category_id.required' => 'A categoria é obrigatória.',
            'sku.required' => 'O SKU é obrigatório.',
            'expiration_date.after' => 'A data de vencimento não pode ser retroativa.',
            'image.max' => 'A imagem não pode ser maior que 5MB.',
        ];
    }

    /**
     * Preparação da validação para manipular a requisição antes de validar
     */

    // protected function withValidator($validator)
    // {
    //     $routeName = $this->route()->getName();
    //     if($routeName === 'produtos.update'){

    //         // Recupera o ID do produto da rota
    //         $produtoId = $this->route('produtos'); // Isso deve ser o ID do produto
            
    //         // Recupera o produto do banco de dados pelo ID
    //         $produto = Itens::find($produtoId);
            
    //         if($this->filled('expiration_date')) {
    //             // Pega a data de expiração atual do banco de dados (formato Y-m-d)
    //             $currentExpirationDate = $produto->expiration_date;
                
    //             // Verifica se a data enviada é diferente da data atual no banco
    //             if ($this->expiration_date != $currentExpirationDate) {
    //                 // Se for diferente, verifica se a nova data é retroativa (anterior à data atual)
    //                 if (Carbon::parse($this->expiration_date)->isBefore(Carbon::now())) {
    //                     $validator->errors()->add('expiration_date', 'A nova data de expiração não pode ser retroativa.');
    //                 }
    //             }
    //         }
    //     }
    // }
}
