<?php

namespace App\Models;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Itens extends Model
{
    use HasFactory;
    
    protected $fillable = [
        'name',
        'description',
        'price',
        'image',
        'expiration_date',
        'sku',
        'category_id'
    ];

    // Mutator para formatar o preço
    public function getPriceAttribute($value)
    {
        // Formata o preço como R$ 000.000.000.000.000,00
        return 'R$ ' . number_format($value, 2, ',', '.');
    }

    // Mutator para formatar a data de vencimento
    public function getExpirationDateAttribute($value)
    {
        // Usa o Carbon para converter a data para o formato dd/mm/YYYY
        return Carbon::parse($value)->format('d/m/Y');
    }
}