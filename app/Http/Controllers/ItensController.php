<?php

namespace App\Http\Controllers;

use App\Models\Categories;
use App\Models\Itens;
use Illuminate\Http\Request;

class ItensController extends Controller
{
    public function index(Request $itens){
        $itens = Itens::all()->toArray();
        // Tratando os dados
        foreach($itens as &$item){
            // Formatando o preço para real
            $item['price'] = 'R$ ' . number_format($item['price'], 2, ',', '.');
            // Buscando o nome da categoria através do ID
            $item['category_name'] = Categories::find($item['category_id'])->category_name;
            unset($item['category_id']);
        }
        // dd($itens);
        return view('products', ['itens' => $itens]);
    }}
