<?php

namespace App\Http\Requests;

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
        $value = str_replace('.', '', $value);
        $value = str_replace(',', '.', $value);
        $value = floatval($value);
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
                'price' => 'required|decimal:2',
                'category_id' => 'required|exists:categories,id',
                'sku' => [
                    'required',
                    'string',
                    'max:100',
                    Rule::unique('itens')->ignore($this->route('produto')), // Ignora SKU duplicado no update
                ],
                'expiration_date' => 'nullable|date_format:Y-m-d|after:today', // Data no formato dd/mm/yyyy e não pode ser retroativa
                'image' => 'required|image|mimes:jpeg,png,jpg,svg,gif,webp|max:5120', // Máximo de 5MB, apenas JPEG e PNG
            ];

            return $rules;

        }elseif($routeName === 'produtos.update'){

            $rules = [
                'name' => 'nullable|string|max:55',
                'description' => 'nullable|string',
                'price' => 'nullable|decimal:2', 
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
}
