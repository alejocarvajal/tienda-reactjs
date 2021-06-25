<?php

namespace App\Http\Controllers\buyState;

use App\FinalOrder;
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
        $final_order = FinalOrder::find($request->idpedido);

        if($final_order) {
                $response = [
                    'idpedido' => $request->idpedido,
                    'message' => $final_order->status
                ];
        }else {
            $response = [
                'idpedido' => $request->idpedido,
                'error' => true,
                'message' => 'Sin resultados'
            ];
        }

        return view('buystate.index', compact('response'));
    }
}
