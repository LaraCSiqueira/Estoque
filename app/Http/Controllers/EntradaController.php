<?php

namespace App\Http\Controllers;

use App\Models\Entrada;
use Illuminate\Http\Request;

class EntradaController extends Controller
{
     public function index() {
	$entrada = Entrada::all();
      return response()->json ($entrada);
    }


 public function store(Request $request) {
       $entrada = Entrada::create([
       'id_produto' => $request->id_produto,
       'quantidade' => $request->quantidade
       ]);

      return response()->json($entrada);
    }


    public function update(Request $request, $id) {
        $entrada = Entrada::find($id);

        if (!$entrada) {
            return response()->json('Entrada não encontrada');
        }

        if (isset($request -> id_produto)){
            $entrada->id_produto = $request -> id_produto;

            return response()->json($entrada);
        }

       if (isset($request -> quantidade)){
            $entrada -> quantidade = $request -> quantidade;

            return response()->json($entrada);
        }

    }

    
    public function delete($id){
        $entrada = Entrada::find($id);

        if (!$entrada) {
            return response()->json('Entrada não identificada');
        }

        $entrada->delete();

        return response()->json('Exclusão bloqueada');
    }

}