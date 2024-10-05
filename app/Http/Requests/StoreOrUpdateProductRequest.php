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

    protected function formatPriceTofloat($value)
    {
        $value = str_replace(['R$ ', ' '], [''], $value);

        $value = str_replace(',', '.', $value);

        return (float) $value;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array<mixed>|string>
     */
    public function rules(): array{
        $rules = [
            'name' => 'required|string|max:55',
            'description' => 'nullable|string',
            // 'price' => 'required|string', // Validação como string para o tratamento de máscara
            'category_id' => 'required|exists:categories,id',
            'sku' => [
                'required', 
                'string', 
                'max:100', 
                Rule::unique('itens')->ignore($this->route('produto')), // Ignora SKU duplicado no update
            ],
            'expiration_date' => [
                'nullable',
                // 'date_format:d/m/Y', // Data no formato brasileiro na view
                // Não colocamos a regra "after:today" aqui, será tratada no `withValidator()`
            ],
            'image' => 'nullable|image|mimes:jpeg,png,jpg,svg,gif,webp|max:5120', // Máximo de 5MB, apenas JPEG e PNG
        ];

        // No caso de criar um novo produto, a imagem é obrigatória
        if ($this->isMethod('post')) {
            $rules['image'] = 'required|image|mimes:jpeg,png|max:5120';
        }



        return $rules;
    }

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


    // protected function prepareForValidation()
    // {
    //     // Converte o campo de preço (com máscara) para o formato float
    //     if ($this->filled('price')) {
    //         $this->merge([
    //             'price' => $this->formatPriceTofloat($this->price),
    //         ]);
    //     }

    //     // Converte o campo de data de dd/mm/yyyy para yyyy-mm-dd (padrão ISO para o banco de dados)
    //     if ($this->filled('expiration_date')) {
    //         $this->merge([
    //             'expiration_date' => Carbon::createFromFormat('d/m/Y', $this->expiration_date)->format('Y-m-d'),
    //         ]);
    //     }
    // }

    protected function withValidator($validator){

        // Recupera o ID do produto da rota
        $produtoId = $this->route('produto'); // Isso deve ser o ID do produto

        // Recupera o produto do banco de dados pelo ID
        $produto = Itens::find($produtoId);

        // Recupera o produto da rota
        if ($produto && $this->filled('expiration_date')) {
            // Pega a data de expiração atual do banco de dados (formato Y-m-d)
            $currentExpirationDate = $produto->expiration_date;

            // Verifica se a data enviada é diferente da data atual no banco
            if ($this->expiration_date != $currentExpirationDate) {
                // Se for diferente, verifica se a nova data é retroativa (anterior à data atual)
                if (Carbon::parse($this->expiration_date)->isBefore(Carbon::now())) {
                    $validator->errors()->add('expiration_date', 'A nova data de expiração não pode ser retroativa.');
                }
            }
        }

        // Converte o campo de preço (com máscara) para o formato float
        if ($this->filled('price')) {
            $this->merge([
                'price' => $this->formatPriceTofloat($this->price),
            ]);
        }

        // Converte o campo de data de dd/mm/yyyy para yyyy-mm-dd (padrão ISO para o banco de dados)
        if ($this->filled('expiration_date')) {
            $this->merge([
                'expiration_date' => Carbon::createFromFormat('d/m/Y', $this->expiration_date)->format('Y-m-d'),
            ]);
        }
    }

}
