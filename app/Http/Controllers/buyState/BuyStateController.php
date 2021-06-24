<?php

namespace App\Http\Controllers\buyState;

use App\Http\Controllers\Controller;
use App\Http\Requests\BuyStateRequest;
use Illuminate\Http\Request;

class BuyStateController extends Controller
{
    public function index()
    {
        return view('buystate.index');
    }

    /**
     * Metodo usado para obtener el estado de la orden
     *
     * @param BuyStateRequest $request parametros de entrada, el idpedido
     * @return Array de respuesta con los resultados encontrados
     * @author  alejandro.carvajal <alejo.carvajal03@gmail.com>
     */
    public function getState(BuyStateRequest $request)
    {
        if($request->idpedido == 12345) {
            $response = [
                'idpedido' => $request->idpedido,
                'status' => 1,
                'message' => "Aprobado"
            ];
        }elseif ($request->idpedido == 54321) {
            $response = [
                'idpedido' => $request->idpedido,
                'status' => 2,
                'message' => "Rechazado"
            ];
        }else{
            $response = [
                'idpedido' => $request->idpedido,
                'status' => 2,
                'message' => "Sin resultados"
            ];
        }

        return view('buystate.index', compact('response'));
    }
}
