<?php

namespace App\Http\Controllers;

use App\Models\Cliente;
use Illuminate\Http\Request;

class ClienteController extends Controller
{
     public function index() {
	$cliente = Cliente::all();
      return response()->json ($cliente);
    }


 public function store(Request $request) {

       $verificacao = Cliente::where('cpf', '=', $request->cpf)->first();

       if($verificacao == null) {
         $cliente = Cliente::create([
       'nome' => $request->nome,
       'cpf' => $request->cpf,
       'idade' => $request->idade
       ]);

      return response()->json($cliente);
    } else {
        return response()->json('O cpf já está cadastrado');
    }

 }


    public function update(Request $request, $id) {
        $cliente = Cliente::find($id);

        if (!$cliente) {
            return response()->json('Cliente não encontrado');
        }

        if (isset($request -> nome)){
            $cliente->nome = $request -> nome;

            return response()->json($cliente);
        }

       if (isset($request -> cpf)){
            $cliente -> cpf = $request -> cpf;

            return response()->json($cliente);
        }

         if (isset($request -> idade)){
            $cliente-> idade = $request-> idade;

            return response()->json($cliente);
        }
        
        return response()->json($cliente);
    }
    
    public function delete($id){
        $cliente = Cliente::find($id);

        if (!$cliente) {
            return response()->json('Cliente não encontrado');
        }

        $cliente->delete();

        return response()->json('Cliente excluido com sucesso');
    }
}
