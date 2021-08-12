<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Cliente;
use Illuminate\Support\Facades\Validator;

class ClienteController extends Controller
{
    public function index()
    {
    $clientes = Cliente::all();

       return response()->json([
        "success" => true,
        "message" => "Listado Clientes",
        "data" => $clientes
    ]);
}


public function store(Request $request)
{
    $data = $request->all();

    $validator = Validator::make($data, [
        'nombre' =>'required|min:2|max:255',
        'apellido' => 'required|min:2|max:255',
        'cedula' => 'required'
    ]);

    if($validator->fails()){
        return response()->json(
            ["success" => false,
             "message" => $validator->errors()
            ]
        );
    }

    $cliente = Cliente::create($data);

    return response()->json([
        "success" => true,
        "message" => "Product created successfully.",
        "data" => $cliente
    ]);

}

public function show($id)
    {
        $success = true;
        $msg = "Datos del cliente encontrados";
        $cliente = Cliente::find($id);

        if (is_null($cliente)) {
                  $success = false;
                  $msg = "Cliente no existe";
                  $cliente = array();
            }

        return response()->json([
            "success" => true,
            "message" => $msg,
            "data" => $cliente
        ]);

    }

    public function update(Request $request, Cliente $cliente)
    {
        $data = $request->all();

        $validator = Validator::make($data, [
            'nombre' =>'required|min:2|max:255',
            'apellido' => 'required|min:2|max:255',
            'cedula' => 'required'
        ]);

        if($validator->fails()){
            return response()->json(
                ["success" => false,
                 "message" => $validator->errors()
                ]
            );
        }

        $cliente->nombre = $data['nombre'];
        $cliente->apellido = $data['apellido'];
        $cliente->cedula = $data['cedula'];
        $cliente->save();

        return response()->json([
            "success" => true,
            "message" => "Datos actualizado correctamente.",
            "data" => $cliente
        ]);
    }

    public function destroy(Cliente $cliente)
    {
        $cliente->delete();

        return response()->json([
            "success" => true,
            "message" => "Cliente eliminado.",
            "data" => $cliente
        ]);
    }

}
