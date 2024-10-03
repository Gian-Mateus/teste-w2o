<?php

namespace App\Http\Controllers;

use App\Models\Categories;
use App\Models\Itens;
use Illuminate\Http\Request;
use Illuminate\Support\Number;

class ItensController extends Controller
{

    public function index(Request $itens){
        $itens = Itens::all()->toArray();
        // Tratando os dados
        foreach($itens as &$item){
            // Formatando o preço para real
            $item['price'] = Number::format($item['price'], locale: 'pt_BR');
            // Buscando o nome da categoria através do ID
            $item['category_name'] = Categories::find($item['category_id'])->category_name;
            unset($item['category_id']);
        }
        // dd($itens);
        return view('products', ['itens' => $itens]);
    }

    
    public function create()
    {
        $categories = Categories::all();
        return view('create', ['categories' => $categories]);
    }

    public function store(Request $request)
    {
        $item = new Itens();
        $item->name = $request->input('name');
        $item->description = $request->input('description');
        $item->price = $request->input('price');
        $item->category_id = $request->input('category_id');
        $item->save();
        return redirect()->route('produtos.index');
    }


    public function show()
    {
        return redirect()->route('produtos.index');
    }



    public function edit($id){
        $item = Itens::find($id)->toArray();

            // Formatando o preço para real
            $item['price'] = Number::format($item['price'],locale: 'pt_BR');
            // Buscando o nome da categoria através do ID
            $item['category_name'] = Categories::find($item['category_id'])->category_name;
            unset($item['category_id']);

        // dd($item);
        return view('edit-products', compact('item'));
    }


    public function update(Request $request, $id)
    {
        $item = Itens::find($id);
        $item->name = $request->input('name');
        $item->description = $request->input('description');
        $item->price = $request->input('price');
        $item->category_id = $request->input('category_id');
        $item->save();
        return redirect()->route('produtos.index');
    }

    public function destroy($id){
        Itens::destroy($id);
        return redirect()->route('produtos.index');
    }}
