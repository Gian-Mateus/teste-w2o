<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreOrUpdateProductRequest;
use App\Models\Categories;
use App\Models\Itens;
use Illuminate\Http\Request;
use Illuminate\Support\Carbon;
use Illuminate\Support\Facades\Storage;

class ItensController extends Controller
{

    public function index(Request $itens){
        $itens = Itens::all()->toArray();
        // Tratando os dados
        foreach($itens as &$item){
            // Buscando o nome da categoria através do ID
            $item['category_name'] = Categories::findOrFail($item['category_id'])->category_name;
            unset($item['category_id']);
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
        // Cria um novo item com os dados validados
        Itens::create($request->validated());

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

        // Atualiza os dados
        $data = $request->validated();

        // Se uma nova imagem for enviada, atualiza o campo de imagem
        if ($request->hasFile('image')) {
            if(Storage::exists($item->image)){
                Storage::delete($item->image);
            }
            $data['image'] = $request->file('image')->store('products');
        }

        if(Carbon::createFromFormat('d/m/Y', $item->expiration_date)->format('Y-m-d') !=  $data['expiration_date']){
            if($data['expiration_date'] > Carbon::now()){
                $data['expiration_date'] = $data['expiration_date'];
                $request->errors()->add('expiration_date', 'A nova data de expiração não pode ser retroativa.');
            }
        }
        // dd(Carbon::createFromFormat('d/m/Y', $item->expiration_date)->format('Y-m-d'));

        // Atualiza o item com os dados enviados (mantendo os valores antigos para os campos não enviados)
        $item->update($data);

        return redirect()->route('produtos.index')->with('success', 'Produto atualizado com sucesso!');
    }

    public function destroy($id){
        Itens::destroy($id);
        return redirect()->route('produtos.index');
    }}
