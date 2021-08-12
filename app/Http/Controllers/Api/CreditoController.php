<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Credito;
use Illuminate\Http\Request;

class CreditoController extends Controller
{
    public function credito_cliente(){
        $success = true;
        $msg = "Datos obtenidos con éxito";
        $creditos = Credito::with('clientes')->get();
        if (is_null($creditos)) {
            $success = false;
            $msg = "Tabla de creditos sin datos";
            $creditos = array();
      }
        return   response()->json([
            "success" => $success,
            "message" => $msg,
            "data" => $creditos
        ]);
    }
}
