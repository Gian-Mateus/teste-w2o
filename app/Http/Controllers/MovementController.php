<?php

namespace App\Http\Controllers;

use App\Models\Itens;
use App\Models\Movement;
use Illuminate\Http\Request;

class MovementController extends Controller
{
    public function index(){
        
        $entries = Movement::where('type', 0)->get()->toArray();
        $exits = Movement::where('type', 1)->get()->toArray();
        $items = Itens::all()->toArray();
        foreach ($entries as &$entry) {
            $item = Itens::find($entry['item_id']);
            $entry['item_name'] = $item->name;
            $entry['created_at'] = date('d/m/Y', strtotime($entry['created_at']));
        }
        foreach ($exits as &$exit) {
            $item = Itens::find($exit['item_id']);
            $exit['item_name'] = $item->name;
            $exit['created_at'] = date('d/m/Y', strtotime($exit['created_at']));
        }
        return view('movements', ['entries' => $entries,'exits' => $exits, 'items' => $items]);
    }


    public function create(){
        //
    }

    public function store(Request $request){
        $request['quantity'] = intval($request->quantity);
        $request->validate([
            'item_id' => 'required|integer|exists:itens,id',
            'quantity' => 'required|integer|min:1',
            'type' => 'required|integer|in:0,1'
        ]);
        // dd($request->all());
        Movement::create($request->all());

        return redirect()->route('movimentacao.index')->with('success', 'Movimenta o realizada com sucesso!');
    }

    public function show($id){
        //
    }

    public function edit($id){
        //
    }

    public function update(Request $request, $id){
        //
    }

    public function destroy($id){
        //
    }
    
}
