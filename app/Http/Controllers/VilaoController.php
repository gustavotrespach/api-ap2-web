<?php

namespace App\Http\Controllers;

use App\Models\Vilao;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class VilaoController extends Controller
{
    public function listar()
    {
        $customers = Vilao::all();
        return response()->json([
            'status' => true,
            'message' => 'Vilões listados com sucesso meu bommmm!!',
            'data' => $customers
        ], 200);
    }

    public function listarPorId($id)
    {
        $customer = Vilao::findOrFail($id);
        return response()->json([
            'status' => true,
            'message' => 'Vilão listado pelo ID com sucesso meu bommm!!',
            'data' => $customer
        ], 200);
    }

    public function criar(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'nome' => 'required|string|max:200',
            'universo' => 'required|string|max:100',
            'poder'=> 'required|numeric',
        ]);

        if ($validator->fails()) {
            return response()->json([
                'status' => false,
                'message' => 'Validation error',
                'errors' => $validator->errors()
            ], 422);
        }

        $customer = Vilao::create($request->all());
        return response()->json([
            'status' => true,
            'message' => 'Vilão criado com sucesso meu bommmm!!',
            'data' => $customer
        ], 201);
    }

    public function editar(Request $request, $id)
    {
        $validator = Validator::make($request->all(), [
            'nome' => 'required|string|max:200',
            'universo' => 'required|string|max:100',
            'poder'=> 'required|numeric',
        ]);

        if ($validator->fails()) {
            return response()->json([
                'status' => false,
                'message' => 'Validation error',
                'errors' => $validator->errors()
            ], 422);
        }

        $customer = Vilao::findOrFail($id);
        $customer->update($request->all());

        return response()->json([
            'status' => true,
            'message' => 'Vilão atualizado com sucesso meu bommm!!',
            'data' => $customer
        ], 200);
    }

    public function deletar($id)
    {
        $customer = Vilao::findOrFail($id);
        $customer->delete();
        
        return response()->json([
            'status' => true,
            'message' => 'Vilão deletado com sucesso meu bommm!!'
        ], 204);
    }
}