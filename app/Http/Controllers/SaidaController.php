<?php

namespace App\Http\Controllers;

use App\Models\Saida;
use Illuminate\Http\Request;

class SaidaController extends Controller
{
    
 public function index() {
	$saida = Saida::all();
      return response()->json ($saida);
    }


 public function store(Request $request) {
       $saida = Saida::create([
       'id_cliente' => $request->id_cliente,
       'id_produto' => $request->id_produto,
       'quantidade' => $request->quantidade
       ]);

      return response()->json($saida);
    }


    public function update(Request $request, $id) {
        $saida = Saida::find($id);

        if (!$saida) {
            return response()->json('Saída não encontrada');
        }

        if (isset($request -> id_cliente)){
            $saida->id_cliente = $request -> id_cliente;

            return response()->json($saida);
        }

       if (isset($request -> id_produto)){
            $saida -> id_produto = $request -> id_produto;

            return response()->json($saida);
        }

         if (isset($request -> qauntidade)){
            $saida-> quantidade = $request-> quantidade;

            return response()->json($saida);
        }
    }
    
    public function delete($id){
        $saida = Saida::find($id);

        if (!$saida) {
            return response()->json('Saída não identificada');
        }

        $saida->delete();

        return response()->json('Exclusão bloqueada');
    }

}