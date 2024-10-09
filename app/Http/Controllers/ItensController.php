<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreOrUpdateProductRequest;
use App\Models\Categories;
use App\Models\Itens;
use App\Models\Movement;
use Illuminate\Http\Request;
use Illuminate\Support\Carbon;
use Illuminate\Support\Facades\Storage;

class ItensController extends Controller
{

    public function index(Request $itens){
        $itens = Itens::all()->toArray();

        foreach($itens as &$item){
            // Buscando o nome da categoria através do ID
            $item['category_name'] = Categories::findOrFail($item['category_id'])->category_name;
            unset($item['category_id']);

            // Calculando o estoque
            $item['stock'] = Movement::where('item_id', $item['id'])->where('type', 0)->sum('quantity') - Movement::where('item_id', $item['id'])->where('type', 1)->sum('quantity');
        }

        // dd($itens);
        return view('products', ['itens' => $itens]);
    }

    
    public function create(){
        $categories = Categories::all()->toArray();
        return view('new-product', ['categories' => $categories]);
    }

    public function store(StoreOrUpdateProductRequest $request)
    {
        $data = $request->validated();

        // Verifica se uma imagem foi enviada
        if ($request->hasFile('image')) {
            $data['image'] = $request->file('image')->store('products');
        }

        // Cria um novo item com os dados validados
        Itens::create($data);

        return redirect()->route('produtos.index')->with('success', 'Produto criado com sucesso!');
    }



    public function show()
    {
        return redirect()->route('produtos.index');
    }



    public function edit($id){
        $item = Itens::findOrFail($id)->toArray();

        $categories = Categories::all()->toArray();
        
        // Buscando o nome da categoria através do ID
        $item['category_name'] = Categories::findOrFail($item['category_id'])->category_name;

        // dd($item);
        return view('edit-products', ['item' => $item, 'categories' => $categories]);
    }


    public function update(StoreOrUpdateProductRequest $request, $id)
    {
        // Busca o item no banco de dados
        $item = Itens::findOrFail($id);

        // Valida os dados
        $data = $request->validated();
        // dd($data);

        // Se uma nova imagem for enviada, atualiza o campo de imagem
        if ($request->hasFile('image')) {
            if(Storage::exists($item->image)){
                Storage::delete($item->image);
            }
            $data['image'] = $request->file('image')->store('products');
        }

        $dateFromModel = Carbon::createFromFormat('d/m/Y', $item->expiration_date)->format('Y-m-d');

        if($dateFromModel !=  $data['expiration_date']){
            if($data['expiration_date'] < Carbon::now()){
                return redirect()->back()->withErrors(['expiration_date' => 'A nova data de expiração não pode ser retroativa.']);
            }
        }

        // Atualiza o item com os dados enviados (mantendo os valores antigos para os campos não enviados)
        $item->update($data);

        return redirect()->route('produtos.index')->with('success', 'Produto atualizado com sucesso!');
    }

    public function destroy($id){
        Itens::destroy($id);
        return redirect()->route('produtos.index');
    }}
