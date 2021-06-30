<?php

namespace App\Http\Controllers\buyState;

use App\DetailOrder;
use App\Http\Controllers\Controller;
use App\Http\Requests\BuyStateRequest;
use App\Order;
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
        $order = Order::find($request->idpedido);

        if ($order) {
            $order = $order->whereNotNull('status')->get();
            if (!$order->isEmpty()) {
                $response = [
                    'idpedido' => $request->idpedido,
                    'message' => $order[0]->status
                ];
            } else {
                $response = [
                    'idpedido' => $request->idpedido,
                    'error' => true,
                    'message' => 'Sin resultados'
                ];
            }
        } else {
            $response = [
                'idpedido' => $request->idpedido,
                'error' => true,
                'message' => 'Sin resultados'
            ];
        }
        return view('buystate.index', compact('response'));
    }
}
