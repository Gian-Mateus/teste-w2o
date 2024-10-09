<?php

namespace App\Http\Controllers;

use App\Models\Itens;
use App\Models\Movement;
use Illuminate\Http\Request;

class Report extends Controller
{
    public function index()
    {
        // Pegar todos os itens e ordenar pela quantidade de saídas
        $items = Itens::all()->sortByDesc(function ($item) {
            return Movement::where('item_id', $item->id)->where('type', 1)->sum('quantity');
        });

        // Pegar os 10 itens com maior saída
        $top10 = $items->take(10);

        // Criar as variáveis para o gráfico
        $labels = [];
        $data = [];

        foreach ($top10 as $item) {
            $labels[] = $item->name; 
            $data[] = Movement::where('item_id', $item->id)->where('type', 1)->sum('quantity');
        }

        return view('report', compact('top10', 'labels', 'data'));
    }

}
